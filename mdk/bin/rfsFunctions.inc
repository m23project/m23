# m23 extra: checkdisklabel cmount cumount initCrypt mkcimage mkcfs percent wait4go

# leer: makedevs 

# raus: fsize add gethome getkpkg getpkg getmem getserver loadmodules killmod make-ssh-keys mkrescue chkfixed net-config net-start net-stop nohup pkgadd quit savecfg save-config savehome rmpkg sfdisk snarf statusbar sub

#BB noch dazu: read shift



#get the next free loop device and assigns a file or device to it
#parameter file or device to assign to the found loop device
getNextLoop()
{
	extra=$1

	if test ! -e "$extra"
	then
		echo "The device or file named \"$extra\" doesn't exist"
		exit 42
	fi

	touch testLoopImage

	lnr=0 #start for searching a free loop device at /dev/loop0
	while `true`
	do
		if test ! -b "/dev/loop$lnr" #test if the block loop device file exists
		then
			echo "Can't bind the device/file to a loop device. Maybe you are running out of loop files and increasing the amount of loop files may help:"
			echo "	modprobe loop max_loop=255"
			echo "	for nr in \`seq 0 255\`"
			echo "	do"
			echo "		mknod /dev/loop\$nr b 7 $lnr"
			echo "	done"
			echo "The last checked loop file was: /dev/loop$lnr"
			exit 23
		fi

		#try to connect the test file to a loop device
		losetup "/dev/loop$lnr" testLoopImage 2>/dev/null
		if test $? -eq 0
		then
			#it seems to work ;)

			#unloop the test file
			losetup -d "/dev/loop$lnr"

			#bind the found loop device to the file/device
			losetup "/dev/loop$lnr" "$extra"
			echo "/dev/loop$lnr"
			rm testLoopImage
			exit 0
		fi

		lnr=`expr $lnr \+ 1`
	done
	rm testLoopImage
	exit 1	
}





#copies a single library (with full name e.g. libnss_dns.so.2) to the RFS
createRFScopyLib()
{
	. /tmp/menuVars
	lib=$1
	neededBy=$2

	#get the filename of the library without the path
	fnamelib=`echo $lib | awk '{anz=split($0,arr,"/"); print(arr[anz]);}'`

	#where to find the library in the extracted debs (with full path)
	#HINT: "sort | tail -1" ensures that the tls version of the libs is used
	libsrc=`find $extractedDebsDir -name $fnamelib -xtype f | grep lib | sort | tail -1`

	if test -z $libsrc
	then
		if test `echo -n $lib | egrep -v ^not$ | grep -v linux-gate`
		then
			echo "Error: Library $lib needed by \"$neededBy\" not found!"
			continue
		else
			continue
		fi
	fi

	#link and filename sperated with ?
	linkAndFile=`find $libsrc -printf "%l?%f"`
	
	#check if the library is a link to a real library
	if test `echo $linkAndFile | egrep -c '^\?'` -gt 0
	then
		#it's a real file
		cp -u $libsrc lib
	else
		#it's a link
		#get the link destination (the real library file)
		realFile=`echo $linkAndFile | cut -d'?' -f1`

		#copy the real library to the bootimage lib dir
		cp -u `find $extractedDebsDir -name $realFile -xtype f | grep lib | sort | tail -1` lib

		#create a symlink from the requested library name to the real library (like it was in the extracted debs dir)
		cd lib
			ln -s $realFile $fnamelib 2> /dev/null
		cd ..
	fi
}





#copies all listed executables with their libraries (and in addition their links) to the root filesystem
createRFSBins()
{
	. /tmp/menuVars

	echo -n "Copying binaries, needed libraries and symbolic links... "

	extractedDebsDir=`getRootFSDownloadDirWithArch`
	
	if [ -d $extractedDebsDir ] && [ -f $extractedDebsDir/bin/bash ]
	then
		true
	else
		echo "ERROR: The directory $extractedDebsDir that should contain the extracted Debian packages is missing or empty!!!"
		echo "Please select clientISO -> RFSdownload before building."
		echo "Press enter to exit"
		read lala
		exit 1
	fi
	

	#remove all symlinks, libs and bin directories
	rm $rootFSDir/lib/* $rootFSDir/lib64 $rootFSDir/sbin 2> /dev/null
	rm -r $rootFSDir/bin $rootFSDir/usr 2> /dev/null

	#create real directories
	mkdir -p $rootFSDir/bin $rootFSDir/lib $rootFSDir/usr
	cd $rootFSDir
	#make lib and lib64 the same
	ln -s lib lib64
	#sbin and bin should be the same too
	ln -s bin sbin
	
	cd lib
	ln -s . tls
	cd ..

	#create links to usr
	cd usr
		ln -s ../lib
		ln -s ../lib64
		ln -s ../bin
		ln -s ../sbin
	cd ..

	#halt: Now in BusyBox
	for bin in ar bzip2 cryptsetup dhclient dialog dmidecode dmraid dropbear dropbearkey e2fsck find grub grub-install grub-md5-crypt hdparm init install-mbr losetup lspci lvmiopversion mdadm mkdosfs mke2fs mkfs mkfs.minix mkfs.msdos mkfs.vfat mkreiserfs mkswap mtools nano parted partimage pivot_root scanlogd setterm testdisk ddcxinfo-knoppix hwsetup cfdisk tar wget MAKEDEV getty ping md5sum discover discover-modprobe discover-pkginstall discover-config ms-sys badblocks sfdisk tset
	do
		foundBins=`find $extractedDebsDir -name $bin -xtype f | grep bin -c`

		if test $foundBins -eq 0
		then
			echo "ERROR: $bin was not found!"
			echo "Press enter to continue"
			read lala
			continue
		fi

		#copy the executable from the extracted debs to the bootimage bin directory
		#cp `find $extractedDebsDir -name $bin -xtype f | grep bin | head -1` bin

		#try if the binary can be found as a normal file
		binSource=`find $extractedDebsDir -name $bin -type f | grep bin | head -1`

		#if not try to find a link
		if [ -z $binSource ]
		then
			binSource=`find $extractedDebsDir -name $bin -xtype f | grep bin | head -1`
		fi

		#copy the found file or link
		cp $binSource bin

		#use different methods to detect the libraries needed by the executables
		if test `getBuildArch` == "x86"
		then
			#simple ldd for same architecture as the host
			for lib in `ldd bin/$bin | cut -d " " -f1 | grep -v '(0x'`
			do
				createRFScopyLib $lib $bin
			done
		else
			if [ -f /usr/bin/x86_64-linux-gnu-objdump ]
			then
				objdump="/usr/bin/x86_64-linux-gnu-objdump"
			else
				objdump="/usr/x86_64-unknown-linux-gnu/bin/x86_64-unknown-linux-gnu-objdump"
			fi
			
			#special method for amd64
			for lib in `$objdump -x bin/$bin | grep NEEDED | tr -s [:blank:] | cut -d' ' -f3 | grep -v '(0x'`
			do
				createRFScopyLib $lib $bin
			done

			createRFScopyLib ld-linux-x86-64.so.2
			createRFScopyLib ld-2.3.6.so
		fi
	done

	#Special handling for 7-Zip
	sevenZipSource=`find $extractedDebsDir -name 7zr -type f | grep lib | head -1`
	cp $sevenZipSource bin

	#copy extra lib that is not linked against ping and wget, but that is needed for resolving hostnames
	createRFScopyLib libnss_dns.so.2
	#This is needed for authentification in dropbear.
	createRFScopyLib libnss_compat.so.2
	echo "done"
}





#creates generic device nodes in the root filesystem
createRFSDevs()
{
	. /tmp/menuVars

	cd $rootFSDir
	rm -r dev 2> /dev/null
	mkdir dev
	
	if [ $? -ne 0 ]
	then
		echo "ERROR: Directory for the device nodes could not get created!"
		read maha
	fi
	
	cd dev
	echo -n "Creating devices... "

	if test -f $devsFile
	then
		tar xfz $devsFile
	else
		if test `whoami` = "root"
		then
			../bin/MAKEDEV generic
			#needed for loadkeymap
			mkdir vc
			cd vc
			ln -s ../tty0 0
			cd ..
		else
			echo "Here we need root access"
			su -c "../bin/MAKEDEV generic"
		fi

		tar cfz $devsFile .
	fi

	echo "done"
}





#copies extra files and directories into the root filesystem
createRFSCopyExtraFilesAndDirs()
{
	echo -n "Copying extra files and directories..."
	. /tmp/menuVars

	cd $rootFSDir

	tar --same-owner -C $rootFSExtraDir -c . | tar x
	tar --same-owner -C `getRootFSDownloadDirWithArch`/completeExtracted -c . | tar x
	cp -a -i `getCompiledDirWithArch`/* .

	echo " done"
}





#Creates an empty image file for the root filesystem
createRFSImage()
{
	. /tmp/menuVars

	#create the directory where to store the initrd image
	rm -r $initrdBuildDir 2> /dev/null
	mkdir -p $initrdBuildDir
	cd $initrdBuildDir

	#create the directory where to mount initrd
	rm -r $rootFSDir 2> /dev/null
	mkdir $rootFSDir

	#size of the kernel ramdisk
	ramdiskSize=`getRamDiskSize`

	echo "Kernel ramdisk size: $ramdiskSize"

	#write the kernel ramdisk size to kernelRamDisk.inc
	if test `whoami` = "root"
	then
		echo "<?PHP" > /m23/inc/kernelRamDisk.inc
		echo "\$kernelRamDisk=$ramdiskSize;" >> /m23/inc/kernelRamDisk.inc
		echo "?>" >> /m23/inc/kernelRamDisk.inc
		chown www-data.www-data /m23/inc/kernelRamDisk.inc
		chmod 644 /m23/inc/kernelRamDisk.inc
	else
		echo "<?PHP" > /tmp/kernelRamDisk.inc
		echo "\$kernelRamDisk=$ramdiskSize;" >> /tmp/kernelRamDisk.inc
		echo "?>" >> /tmp/kernelRamDisk.inc

		diff -q /tmp/kernelRamDisk.inc /m23/inc/kernelRamDisk.inc
		if test $? -ne 0
		then
			echo "Here we need root access"
			su -c "cp /tmp/kernelRamDisk.inc > /m23/inc/kernelRamDisk.inc; chown www-data.www-data /m23/inc/kernelRamDisk.inc; chmod 644 /m23/inc/kernelRamDisk.inc"
		fi
		rm /tmp/kernelRamDisk.inc
	fi

	echo -n "Creating empty $ramdiskSize bytes image file..."
	#create an empty image file for storing the root file system
	dd if=/dev/zero of=initrd bs=1k count=$ramdiskSize 2> /dev/null
	echo " done"

	#get a free loop device and assign the initrd to it
	loopDev=`getNextLoop initrd`

	#format loop device
	echo -n "Formating image file..."
	mke2fs -m 0 -N 10000 $loopDev -q
	echo " done"

	#remove the binding between the loop device and the initrd
	#because there is no connection between the future mount point and the loop device and the loop device would not get freed automatically by unmounting
	losetup -d $loopDev

	#mount it with loop option => connection the future mount point and the loop device
	if test `whoami` = "root"
	then
		mount -o loop initrd $rootFSDir
	else
		echo "Here we need root access"
		su -c "mount -o loop initrd $rootFSDir"
	fi


}





#Umounts the initrd image, configures the kernel file and compresses initrd. These steps are needed to build the bootimages.
createRFSFinishInitrd()
{
	. /tmp/menuVars
	kernelSDir=`getKernelStoreDirWithArch`

	cd /
	#unmount the initrd
	umount $rootFSDir

	#prepare the kernel image
	chmod 0555 $kernelSDir/bzImage
	chown root:root $kernelSDir/bzImage
	rdev $kernelSDir/bzImage /dev/ram0

	#compress the initrd image and move it to the directory
	echo -n "Compressing the initrd..."
	gzip -c $initrdBuildDir/initrd > $initrdBuildDir/initrd.gz
	echo " done"
}





#creates the Etherboot bootimage from the root filesystem
createRFSEtherboot()
{
	. /tmp/menuVars

	arch=`getDebianArch`
	kernelSDir=`getKernelStoreDirWithArch`

	#create the Etherboot image
	mknbi-linux $kernelSDir/bzImage --output=/m23/tftp/m23install-$arch --ip=dhcp --rootdir=/dev/ram0 $initrdBuildDir/initrd.gz
}





#creates the PXE bootimage from the root filesystem
createRFSPXE()
{
	. /tmp/menuVars
	cd $rootFSDir

	arch=`getDebianArch`
	kernelSDir=`getKernelStoreDirWithArch`

	#copy the kernel image
	cp $kernelSDir/bzImage /m23/tftp/m23pxeinstall-$arch

	#copy the compressed initrd image to the directory
	cp $initrdBuildDir/initrd.gz /m23/tftp/initrd-$arch.gz
}





#creates a bootable ISO from the root filesystem
createRFSISO()
{
	. /tmp/menuVars

	#The m23 servername to write into the isolinux.cfg
	m23server=$1
	#Optional directory where to move the created ISO to
	isoDir=$2

	arch=`getDebianArch`

	cd $ISOBuildDir

	#adjust the size of the kernel ramdisk in the isolinux configuration
	ramdiskSize=`getRamDiskSize`
	sed "s/ramdisk_size=[0-9]*/ramdisk_size=$ramdiskSize/g" isolinux/isolinux.cfg > isolinux.cfg.tmp
	cat isolinux.cfg.tmp > isolinux/isolinux.cfg
	rm isolinux.cfg.tmp

	#copy the initrd and kernel to the dir the mkiso expects
	cp $initrdBuildDir/initrd.gz `getKernelStoreDirWithArch`/bzImage isolinux

	#Check if the optional parameter for setting the m23server in the isolinux.cfg should be set
	if [ $m23server ]
	then
		extraName="-$m23server"
		cp isolinux/isolinux.cfg /tmp/isolinux.cfg-createRFSISO.bak
		sed -i "s/APPEND/APPEND m23server=$m23server/" isolinux/isolinux.cfg
	fi

	#make the iso image
	#mkisofs -o $bootCDPrefix-$arch.iso -b isolinux/isolinux.bin -c isolinux/boot.cat -no-emul-boot -boot-load-size 4 -boot-info-table .
	mkisofs -p "The m23 team [http://m23.sf.net]" -A "MDK [m23 development kit]" -T -J -R -V $bootCDPrefix -o $bootCDPrefix-$arch$extraName.iso -b isolinux/isolinux.bin -c isolinux/boot.cat -no-emul-boot -boot-load-size 4 -boot-info-table .

	#Check if the iso should be moved to a special directory
	if [ $isoDir ]
	then
		mv $bootCDPrefix-$arch$extraName.iso $isoDir
	else
		#move it to the right directory
		mv $bootCDPrefix-$arch$extraName.iso ..
	fi

	#Copy back the unchanged cfg
	if [ $m23server ]
	then
		cat /tmp/isolinux.cfg-createRFSISO.bak > isolinux/isolinux.cfg
		rm /tmp/isolinux.cfg-createRFSISO.bak
	fi
}





#creates links to multicall binaries
createRFSBinLinks()
{
	. /tmp/menuVars

	cd "$rootFSDir/bin"

	#Checking and creating of file systems
	makeLinks mke2fs mkfs.ext2 mkfs.ext3 mkfs.ext4
	makeLinks mkcfs mkcfs.ext2 mkcfs.ext3 mkcfs.ext4
	makeLinks e2fsck fsck.ext2 fsck.ext3 fsck.ext4

	#LVM tools
	makeLinks lvmiopversion lvchange lvconvert lvcreate lvdisplay lvextend lvm lvmchange lvmdiskscan lvmsadc lvmsar lvreduce lvremove lvrename lvresize lvs lvscan pvchange pvcreate pvdisplay pvmove pvremove pvresize pvs pvscan vgcfgbackup vgcfgrestore vgchange vgck vgconvert vgcreate vgdisplay vgexport vgextend vgimport vgmerge vgmknodes vgreduce vgremove vgrename vgs vgscan vgsplit

	#Use the reset funtion of tset
	rm reset 2> /dev/null
	makeLinks tset reset
}





#Downloads basic packages of a choosen architecture and extracts the contents. The extracted files can be used to build a new root file system for the bootimage
downloadExtractRFS()
{
. /tmp/menuVars

arch=`getDebianArch`

rootTempDir=`getRootFSDownloadDirWithArch`

echo -n "Cleaning of \"$rootTempDir\"..."
rm -r -f $rootTempDir
echo " done"
mkdir -p $rootTempDir
cd $rootTempDir

echo "deb http://ftp.de.debian.org/debian/ lenny main non-free contrib
deb http://ftp.de.debian.org/archive/debian/ etch main non-free contrib
deb http://dodger-tools.sourceforge.net/debs ./
deb http://m23.sourceforge.net/m23NetBootImageExtraDebs/ ./
" > ./sources.list

localArchAptUpdate

localArchAptDownload binutils bzip2 grub busybox cryptsetup dhcp3-client dialog dmidecode dmraid dropbear e2fsprogs findutils mdadm hdparm sysvinit mbr mount pciutils makedev util-linux dosfstools reiserfsprogs lilo mtools nano coreutils partimage scanlogd snarf tar wget libblkid1 libc6 libbz2-1.0 libuuid1 libselinux1 libsepol1 libpopt0 libpci3 libdebian-installer4 e2fslibs libgcc1 libncurses5 libgcc1 makedev testdisk iputils-ping dmtools parted p7zip discover discover-data lsb-base ms-sys modutils lvm-common libdevmapper1.02 libssl0.9.7 ncurses-bin
#hwdata-knoppix ddcxinfo-knoppix hwsetup m23hwscanner  #directly extracted from the MDK deb directory

for deb in `ls archivs/*$arch*.deb archivs/*_all.deb`
do
	dpkg-deb -X $deb .
done



mkdir completeExtracted
	dpkg-deb -X /mdk/m23Debs/debs/hwsetup*$arch*.deb completeExtracted
	dpkg-deb -X /mdk/m23Debs/debs/hwdata-knoppix*.deb completeExtracted
	dpkg-deb -X /mdk/m23Debs/debs/ddcxinfo-knoppix*.deb completeExtracted
	dpkg-deb -X /mdk/m23Debs/debs/m23hwscanner_*$arch*.deb completeExtracted
	dpkg-deb -X /mdk/m23Debs/debs/m23hwscanner_*all*.deb completeExtracted
	dpkg-deb -X archivs/discover-data*.deb completeExtracted
	dpkg-deb -X archivs/lsb-base*.deb completeExtracted

	dpkg-deb -X archivs/dmtools*.deb completeExtracted

#wget http://pciids.sourceforge.net/pci.ids -O completeExtracted/usr/share/hwdata/pci.ids

echo "Packages extracted"
}
