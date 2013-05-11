function listBusyBoxVersions
{
	mkdir -p /tmp/m23BusyBoxListing
	cd /tmp/m23BusyBoxListing

	wget -o /dev/null http://www.busybox.net/downloads/

	for link in `grep "busybox-" index.html | cut -d'"' -f8 | grep tar.gz | grep -v sign | tr -s ' ' | cut -d' ' -f9 | sort -t'.' -n -k2 -r`
	do
		busyboxName=`echo $link | cut -d'/' -f8`
		echo "\"$busyboxName\" \"\" \\"
	done

	echo -n "\"\" \"\""

	rm -r /tmp/m23BusyBoxListing 2> /dev/null
}





#Shows a menu of all available BusyBox versions, downloads and extracts the selected release and assigns the BusyBox patches (if available)
function menuBusyBoxDownload
{
. /tmp/menuVars

echo '#!/bin/sh
. /mdk/bin/menuFunctions.inc

dialog --clear --title "BusyBox download and extraction" \
        --menu "Please select the BusyBox to download" 13 40 5 \' > /tmp/busyboxMenu
listBusyBoxVersions >> /tmp/busyboxMenu
echo ' 2> /tmp/busyboxDownloadm23
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

mkdir -p '$busyBoxDownloadDir'
cd '$busyBoxDownloadDir'

busyboxDownloadFile=`cat /tmp/busyboxDownloadm23`
busyboxVersion=`echo $busyboxDownloadFile |  sed "s/.tar.bz2//" |  sed "s/.tar.gz//" | sed "s/busybox-//"`

echo "Downloading BusyBox and Patches if avaiable"
wget -c http://www.busybox.net/downloads/$busyboxDownloadFile
wget -o /dev/null http://www.busybox.net/downloads/fixes-$busyboxVersion/

patchFiles=`cat index.html | cut -d"\"" -f6 | grep patch`
rm -f index.html

echo "Extracting BusyBox"
if test `file $busyboxDownloadFile | grep gzip | wc -l` -eq 1
then
	tar xfz $busyboxDownloadFile
else
	tar xfj $busyboxDownloadFile
fi

cd busybox-$busyboxVersion

for patch in $patchFiles
do
        wget -co /dev/null http://www.busybox.net/downloads/fixes-$busyboxVersion/$patch
        echo "Patching BusyBox with $patch"
        patch -p1 < $patch
done

menuVarAdd busyBoxSourceDir `echo $busyboxDownloadFile | sed "s/.tar.bz2//"`

rm `echo $busyboxDownload`

' >> /tmp/busyboxMenu

echo "Downloading the selected BusyBox"
sh /tmp/busyboxMenu
}





#Shows a menu for downloading and buildung BusyBox
function menuBusyBox()
{
mkdir -p $busyBoxStoreDir

dialog --clear --title "BusyBox" \
        --menu "Please select the BusyBox to download and make" 11 80 4 \
"Download" "Download and extract a busyBox" \
"ConfigureOld" "Configure with an old busyBox config file" \
"Menuconfig" "Use menuconfig for configuring the busyBox" \
"Compile" "Make busyBox image and modules" 2> /tmp/m23busyboxMenuSelection
retval=$?
case $retval in
	1)
		#$menuExecAfter
		exit;;
	255)
		#$menuExecAfter
		exit;;
esac

case `cat /tmp/m23busyboxMenuSelection` in
	"Download")
		menuBusyBoxDownload
		menuBusyBox
		exit;;
	"ConfigureOld")
		menuBusyBoxOldConfig
		menuBusyBox
		exit;;
	"Menuconfig")
		checkBusyBoxDir
		. /tmp/menuVars
		cd $busyBoxDownloadDir/$busyBoxDir
		make menuconfig
		backupbusyBoxConfig
		menuBusyBox
		exit;;
	"Compile")
		compileBusyBox
		menuBusyBox
		exit;;
esac
}





#check, if the variable for specifying the current BusyBox source directory from all BusyBox source directories is set
function checkBusyBoxDir
{
	. /mdk/bin/menuFunctions.inc
	. /tmp/menuVars

	#check, if the BusyBox directory is set
	if test $busyBoxDir
	then
		asdfhaskdjfh=x
	else
		#set it
		echo '#!/bin/sh

dialog --clear --title "BusyBox directory name" \
        --menu "Please select the BusyBox directory you want to use" 13 40 5 \' > /tmp/busyBoxDirMenu
 >> /tmp/busyBoxDirMenu
find $busyBoxDownloadDir -type d -printf "%f\n" -maxdepth 1 -mindepth 1 | sort -t'.' -n -k3 -r | awk '{print("\""$0"\" \"\" \\")}' >> /tmp/busyBoxDirMenu
echo -n '"" ""' >> /tmp/busyBoxDirMenu
echo ' 2> /tmp/m23busyBoxDir
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

' >> /tmp/busyBoxDirMenu

	sh /tmp/busyBoxDirMenu

	menuVarAdd busyBoxDir `cat /tmp/m23busyBoxDir`
	rm /tmp/busyBoxDirMenu /tmp/m23busyBoxDir
	fi
}





#lists all config files in the BusyBox config directory
function listBusyBoxConfigFiles
{
	. /tmp/menuVars
	cd $busyBoxConfigDir
	ls *.conf* | sort -t'.' -n -k3 -r | awk '{print("\""$0"\" \"\" \\")}'
}





#select the old configuration file from menu to copy to the new busyBox source dir and copies back the new configure file to the config dir
function menuBusyBoxOldConfig
{
	. /tmp/menuVars
	checkBusyBoxDir
	. /tmp/menuVars

#menu that shows all old configure files
echo '#!/bin/sh

dialog --clear --title "BusyBox directory name" --menu "Please select the old BusyBox config file to use for the new one" 13 60 5 \' > /tmp/busyBoxConfigMenu

#list all config files
listBusyBoxConfigFiles >> /tmp/busyBoxConfigMenu
echo -n '"none" ""' >> /tmp/busyBoxConfigMenu
echo ' 2> /tmp/m23busyBoxOldConfigFile
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

rm /tmp/busyBoxConfigMenu

' >> /tmp/busyBoxConfigMenu

sh /tmp/busyBoxConfigMenu
#rm /tmp/busyBoxConfigMenu

#name of the old configuration file
busyBoxOldConfigFile=`cat /tmp/m23busyBoxOldConfigFile`

echo "$busyBoxConfigDir/$busyBoxOldConfigFile $busyBoxStoreDir/$busyBoxDir/.config"

#copy the old configuration file to the new busyBox source directory
if test $busyBoxOldConfigFile != "none"
then
	cp $busyBoxConfigDir/$busyBoxOldConfigFile $busyBoxDownloadDir/$busyBoxDir/.config
fi

#go to the new busyBox source directory
cd $busyBoxDownloadDir/$busyBoxDir
make oldconfig
backupbusyBoxConfig
}





#copies the current BusyBox configuration to the BusyBox configuration directory
function backupbusyBoxConfig
{
	. /tmp/menuVars
	cp .config "$busyBoxConfigDir/m23-$busyBoxDir.config"
}





#compiles BusyBox for the selected architecture and copies the binary and links to the compiled directory
function compileBusyBox
{
	#loadKernelVars
	. /tmp/menuVars
	checkBusyBoxDir
	. /tmp/menuVars

	cd $busyBoxDownloadDir/$busyBoxDir

	make clean
	rm -r _install

	if test `getBuildArch` == "x86_64"
	then
		checkForx86_64Toolchain
		make CROSS_COMPILE=x86_64-unknown-linux-gnu- ARCH=x86_64
		make CROSS_COMPILE=x86_64-unknown-linux-gnu- ARCH=x86_64 install
	else
		make
		make install
	fi

	#create the directory for storing the BusyBox binary and links
	busyBoxInstDir=`getCompiledDirWithArch`/bin
	
	cd $busyBoxInstDir
	#delete all BusyBox links before copying
	find -printf "%l?%f\n" | grep ^busybox? | cut -d'?' -f2 | xargs rm

	mkdir -p $busyBoxInstDir
	cd $busyBoxDownloadDir/$busyBoxDir

	#copy the BusyBox binary
	cp _install/bin/busybox $busyBoxInstDir

	#create all symlinks
	cd $busyBoxInstDir
	makeLinks busybox `find $busyBoxDownloadDir/$busyBoxDir/_install -type l -printf "%f\n" | grep -v linuxrc | xargs echo`

	echo "Compilation done. Are there error messages?"
	read val
}
