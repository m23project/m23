
#get the user Apache 1 or 2 is executed under
getApacheUser()
{
	#get Apache user and group
	apacheUser=`grep "^User " /etc/apache/httpd.conf | cut -d' ' -f2`
	if [ -z $apacheUser ]
	then
		apacheUser=`grep "APACHE_RUN_USER" /etc/apache2/envvars | cut -d'=' -f2`
	fi
	echo $apacheUser
}


#get the group Apache 1 or 2 is executed under
getApacheGroup()
{
	apacheGroup=`grep "^Group " /etc/apache/httpd.conf | cut -d' ' -f2`
	if [ -z $apacheGroup ]
	then
		apacheGroup=`grep "APACHE_RUN_GROUP" /etc/apache2/envvars | cut -d'=' -f2`
	fi
	echo $apacheGroup
}



#Deletes some files before compressing the OS or VM
cleanOSForCompressing()
{
	if [ "$1" ] && [ $1 = "deleteSquidCache" ]
	then
		rm -r /var/spool/squid
		squid -z
	fi

cd /

#remove all log files
for file in `find /var/log/ -type f`
do
	rm "$file"
done

rm -r /var/www/squid-reports/*

#stop squid
 /etc/init.d/squid stop

#remove backups
	rm -r /var/backups/*

#remove sources lists
	rm /var/lib/apt/lists/*

#remove old archives
	apt-get clean

#remove make missing directories scripts
	rm /mkMissingDirectories.sh /mkAllMissingDirectories.sh

#remove BackupPC files
	rm -r /var/lib/backuppc/pc/*
	find /var/lib/backuppc -type f | xargs rm
}



#creates a tar.bz2 image of the currently installed m23 server
createOSImage()
{
. /tmp/menuVars


rm -r /tmp/m23root
mkdir /tmp/m23root

mv /root/* /tmp/m23root
mv /root/.* /tmp/m23root

#move squid cache 
	mv /var/spool/squid/ /tmp/

#move MySQL
#	mv /var/lib/mysql/ /tmp/

cleanOSForCompressing

#search for all directories and files to compress
 list=`find . -maxdepth 1 | grep -v m23 | grep -v tmp | grep matrix23 -v | grep mdk -v | grep -v brennen | grep proc -v | grep -v backup | grep updates -v | grep upl -v | cut -d'/' -f2`

#convert list to string
 dirlist=""
 for i in $list
 do
  if test $i != "."
   then
    dirlist=$dirlist" "$i
   fi
 done

cp /var/lib/dpkg/status /tmp

awk '
BEGIN {
out=1;
}

/Package: m23-/ {
out=0;
}

/Package: m23$/ {
out=0;
}

/^$/ {
out=1
}

{
if (out)
	print($0);
}

' /tmp/status > /var/lib/dpkg/status

umount /sys/
 
#compress the files
	#tar cvj --same-owner -f $ISOBuildDir/m23image.tb2 $dirlist
	#tar --exclude="boot/initrd.img*" -c --same-owner $dirlist | 7zr a -si $ISOBuildDir/m23image.tar.7z
	rm $ISOBuildDir/m23image.tar.7z
	tar --exclude="boot/initrd.img*" -c --same-owner $dirlist | 7zr a -t7z -m0=lzma -mx=9 -mfb=64 -md=32m -ms=on -si $ISOBuildDir/m23image.tar.7z

#restore squid cache
	mv /tmp/squid/ /var/spool/

#restore MySQL DB
	mv /tmp/mysql/ /var/lib/

#restart squid
 /etc/init.d/squid start

#remove make missing directories scripts
	rm /mkMissingDirectories.sh

mv /tmp/m23root/* /root
mv /tmp/m23root/.* /root

cat /tmp/status > /var/lib/dpkg/status

mount /sys/

rmdir /tmp/m23root
}





#Creates the ISO image for burnung the m23 server installation CD.
createServerInstallISO()
{
. /mdk/bin/kernelFunctions.inc
. /mdk/bin/archFunctions.inc
. /tmp/menuVars

	oldPath=`pwd`

#copy documentation to the cd
	cp $devguideDir/devguide.pdf $ISOBuildDir/doc/

#get the server IP
	serverIP=`grep address /etc/network/interfaces | cut -d's' -f3 | cut -d' ' -f2`

#replace the server IP by the replacement word and store it in the config dir
	mkdir -p $ISOBuildDir/conf
	sed "s/$serverIP/SERVERIP/g" /etc/squid.conf > $ISOBuildDir/conf/squid.conf

#get version number & codename from the php file
	m23codename=`cat /m23/inc/version.php | grep codename | cut -d"\"" -f2`
	m23version=`cat /m23/inc/version.php | grep version | cut -d"\"" -f2`

cd $ISOBuildDir

#remove backup files
	find | grep "~$" | xargs rm 2> /dev/null

#copy language files to the iso directory
	#cp $rootFSExtraDir/bin/installI18N.de $rootFSExtraDir/bin/installI18N.en $rootFSExtraDir/bin/m23InstallerConfigure.inc .

#build md5 sums
#echo -n "Building MD5s: "
#md5sum m23image.tb2 m23.tb2 mdk.tb2 | tr -s [:blank:] > md5s
#echo "done"

#write version information to file
	echo "m23 $m23codename $m23version" > version.txt
	cp version.txt $rootFSExtraDir

	createRFSImage
	createRFSBins
	createRFSCopyExtraFilesAndDirs
	createRFSBinLinks
	createRFSDevs
	createRFSFinishInitrd
	createRFSISO

#rename the ISO
	arch=`getDebianArch`
	
	#write information file about the ISO
	mv ../$bootCDPrefix-$arch.iso ../$bootCDPrefix"_$m23version"_"$m23codename".iso
	find ../$bootCDPrefix"_$m23version"_"$m23codename".iso -printf "%s Bytes %TD %TH:%TM:%TS" > $ISOBuildDir/ISO.info

	cd $oldPath
}





#writes the cleaned m23 & m23captured database to m23.sql & m23captured.sql
#	Save the m23 database of the current system to a file but removes
#	most of the data (the sources lists are remaining) so the database
#	structure is secured. This SQL dump of the database is used to
#	setup the initial database of a newly installed m23 server.
# !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
# !!!!!!parameter: list of sources lists to export or empty for all lists hardcoded in exportDBsourceslist.php!!!!!!!!!!!
# !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
exportDBInitTable()
{
. /tmp/menuVars
#cd $ISOBuildDir

dbuser=`grep "^user" /etc/mysql/debian.cnf | tr -d [:blank:] | cut -d'=' -f2 | head -1`
dbpass=`grep "^password" /etc/mysql/debian.cnf | tr -d [:blank:] | cut -d'=' -f2 | head -1`


#-----------------database: m23

#copy the database m23 to m23temp

echo -n "Creating temporary database with the data of the m23 DB..."
	#store the m23 database in /tmp/m23.sql
	mysqldump -u$dbuser -p$dbpass m23 > /tmp/m23.sql
	#make a new temporary database
	mysql -u$dbuser -p$dbpass  -e "CREATE DATABASE m23temp"
	#insert all entries from /tmp/m23.sql into the new "m23temp" database
	cat /tmp/m23.sql | mysql -u$dbuser -p$dbpass m23temp
echo " done"

echo -n "Cleaning temporary database..."
#delete database data
	for table in `mysqlshow -u$dbuser -p$dbpass m23temp | grep -v Tables | grep -v "Database:" | cut -d' ' -f2 | grep -v "+--"` # | grep -v sourceslist
	do
		mysql -u$dbuser -p$dbpass m23temp -e "delete from $table"
	done
echo " done"

echo -n "Export package sources lists..."
#store the cleaned m23 database in m23.sql
	mysqldump --skip-add-drop-table -u$dbuser -p$dbpass m23temp | sed 's/ DEFAULT CHARSET=latin1//g' | sed 's/ AUTO_INCREMENT=[0-9]*//g' > m23.sql

#export sources lists
	php /mdk/bin/exportDBsourceslist.php $@ >> m23.sql
echo " done"

echo -n "Saving SQL dump of the temporary DB..."
#add the default group that has to be always there
	echo >> m23.sql
	echo "INSERT INTO \`groups\` (groupname) VALUES ('default');" >> m23.sql

	bzip2 -f m23.sql
echo " done"

#drop the temporary database
	mysql -u$dbuser -p$dbpass  -e "DROP DATABASE m23temp"



#-----------------database: m23captured
#
echo -n "Export database for generating screenshots..."
	mysqldump --skip-add-drop-table -u$dbuser -p$dbpass m23captured | sed 's/ DEFAULT CHARSET=latin1//g' > m23captured.sql
	bzip2 -f m23captured.sql
echo " done"

echo "Are there error messages? Press \"Return\" to continue..."

#write m23MySQL-Init.sh
# 	echo "#!/bin/sh
# dbuser=\`grep \"^user\" /etc/mysql/debian.cnf | tr -d [:blank:] | cut -d'=' -f2\`
# dbpass=\`grep \"^password\" /etc/mysql/debian.cnf | tr -d [:blank:] | cut -d'=' -f2\`
# 
# echo \"CREATE DATABASE m23;\" | mysql -u\$dbuser -p\$dbpass
# bzcat m23.sql.bz2 | mysql -u\$dbuser -p\$dbpass m23
# 
# echo \"CREATE DATABASE m23captured;\" | mysql -u\$dbuser -p\$dbpass
# bzcat m23captured.sql.bz2 | mysql -u\$dbuser -p\$dbpass m23captured
# " > m23MySQL-Init.sh
}





#burns the server installation CD or the client boot CD.
burnClientOrServerISO()
{
. /mdk/bin/archFunctions.inc
. /tmp/menuVars

	if test $bootCDPrefix = "m23server"
	then
		iso=$ISOBuildDir/../$bootCDPrefix*
		errMsg="The m23 server ISO image could not be found! It was searched with: $ISOBuildDir/../$bootCDPrefix*"
	else
		arch=`getDebianArch`
		errMsg="The m23 client ISO image could not be found! It was searched with: $ISOBuildDir/../$bootCDPrefix-$arch.iso"
		iso=$ISOBuildDir/../$bootCDPrefix-$arch.iso
	fi

	iso=`findClientOrServerISO`
	if test $? = 1
	then
		echo "$iso"
		echo "Press \"Return\" to go back to the menu."
		read maha
		return `false`
	fi

	echo "Scanning for available CD recorders..."
	cdrecord --devices 2> /dev/null | egrep "^[0-9]."

	echo -n "Please enter the device name of the recorder you want to use (e.g. /dev/hdc): "
	read cdRecorder

	echo "Insert a CD(-RW) into $cdRecorder and press \"Return\" to burn the ISO"
	cdrecord blank=fast dev=$cdRecorder

	cdrecord -eject -v $iso dev=$cdRecorder
}





#Creates an archive of the files in /m23/data+scripts/distr/debian/usrm23/
mkusrm23()
{
	current=`pwd`

	cd /m23/data+scripts/distr/debian/usrm23
	tar cvz --exclude="*.svn*" -f ../usrm23.tar.gz .

	cd $current
	read lala
}