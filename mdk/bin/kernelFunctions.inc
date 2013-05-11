#variables
#version number of the kernel (2.4 or 2.6): /tmp/m23kernelBranch: $kernelBranch
#directory to download the kernel source tar.bz2 (e.g. /mdk/server/kernel): $kernelStoreDir: /tmp/m23kernelStoreDir
#directory to store the kernel config files in (e.g. /mdk/server): $kernelConfigDir: /tmp/m23kernelConfigDir`
#is it a kernel for the server installation CD (bootCD) or for the client bootimage (bootimage): $kernelType: /tmp/m23kernelType
#name of the kernel directory under the kernel download directory: $kernelDir: /tmp/m23kernelDir

#checks, if the kernel directory variable under the kernel download dir is set
#and sets it, if needed => /tmp/m23kernelDir
function checkKernelDir
{
	. /mdk/bin/menuFunctions.inc
	. /tmp/menuVars

	#check, if the kernel directory is set
	if test $kernelDir
	then
		asdfhaskdjfh=x
	else
		#set it
		echo '#!/bin/sh

dialog --clear --title "Kernel directory name" \
        --menu "Please select the kernel directory you want to use" 13 40 5 \' > /tmp/kernelDirMenu
 >> /tmp/kernelDirMenu
ls $kernelStoreDir | grep -v ".tar.bz2" | sort -t'.' -n -k3 -r | awk '{print("\""$0"\" \"\" \\")}' >> /tmp/kernelDirMenu
echo -n '"" ""' >> /tmp/kernelDirMenu
echo ' 2> /tmp/m23kernelDir
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

' >> /tmp/kernelDirMenu

	sh /tmp/kernelDirMenu
	
	menuVarAdd kernelDir `cat /tmp/m23kernelDir`
	fi
}





#checks, if the kernel branch (2.4 or 2.6) variable under the kernel download dir is set
#and sets it, if needed
function checkKernelBranch
{
	. /mdk/bin/menuFunctions.inc
	. /tmp/menuVars

	#check, if the kernel branch is set
	if test $kernelBranch
	then
		asdfhaskdjfh=x
	else
dialog --clear --title "Kernel version" \
        --menu "Please select the kernel version" 10 40 2 \
"2.4" "Linux kernel v2.4" \
"2.6" "Linux kernel v2.6" 2> /tmp/kernelMenuBranch
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

		menuVarAdd kernelBranch `cat /tmp/kernelMenuBranch`
	fi
}





#copies the current kernel configuration to the kernel configuration directory
function backupKernelConfig
{
	#loadKernelVars
	. /tmp/menuVars
	cp .config "$kernelConfigDir/m23-$kernelType-$kernelDir.conf"
}





#shows a list off all downloadable kernels of a branch in the dialog menu format
function listKernelVersions
{
	. /tmp/menuVars
	mkdir -p /tmp/m23kernelListing
	cd /tmp/m23kernelListing
	
	wget -o /dev/null ftp://ftp.kernel.org/pub/linux/kernel/v$kernelBranch/
	
	for kernelname in `grep "linux-" index.html | cut -d'"' -f2 | grep tar.bz2 | grep -v sign | tr -s ' ' | cut -d' ' -f9  | cut -d'/' -f8 | sort -t'.' -k2,3 -n -r`
	do
		echo "\"$kernelname\" \"\" \\"
	done
	
	echo -n "\"\" \"\""
	
	rm -r /tmp/m23kernelListing 2> /dev/null
}





#shows the menu for downloading a kernel from kernel.org
function menuKernelDownload
{
. /tmp/menuVars

checkKernelBranch
. /tmp/menuVars

echo '#!/bin/sh

kernelDownload=`kernelDownload 2>/dev/null` || kernelDownload=/tmp/kernelDownloadm23$$
dialog --clear --title "Kernel download and extraction" \
        --menu "Please select the kernel to download" 13 40 5 \' > /tmp/kernelMenu
listKernelVersions >> /tmp/kernelMenu
echo ' 2> $kernelDownload
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

cd '$kernelStoreDir'

kernelDownloadIFile=`echo $kernelDownload`
kernelDownloadFile=`cat $kernelDownloadIFile`

echo "Downloading the kernel"
wget -c ftp://ftp.kernel.org/pub/linux/kernel/v'$kernelBranch'/$kernelDownloadFile

echo "Extracting kernel"
tar xfj $kernelDownloadFile

echo $kernelDownloadFile | sed "s/.tar.bz2//" > /tmp/m23kernelDir

rm `echo $kernelDownload`

' >> /tmp/kernelMenu


echo "Downloading the selected kernel"
sh /tmp/kernelMenu
}





#lists all config files in the kernel config directory
function listConfigFiles
{
	. /tmp/menuVars > /dev/null
	cd $kernelConfigDir
	#ls *$kernelType*.conf | sort -t'.' -n -k3 -r | awk '{print("\""$0"\" \"\" \\")}'
	ls *.conf | sort -t'.' -n -k3 -r | awk '{print("\""$0"\" \"\" \\")}'
}





#select the old configuration file from menu to copy to the new kernel source dir and copies back the new configure file to the config dir
function menuOldConfig
{
	. /tmp/menuVars
	checkKernelDir
	. /tmp/menuVars

#menu that shows all old configure files
echo '#!/bin/sh

dialog --clear --title "Kernel directory name" \
        --menu "Please select the old kernel config file to use for the new one" 13 60 5 \' > /tmp/kernelConfigMenu

#list all config files
listConfigFiles >> /tmp/kernelConfigMenu
echo -n '"none" ""' >> /tmp/kernelConfigMenu
echo ' 2> /tmp/m23kernelOldConfigFile
retval=$?
case $retval in
	1)
		exit;;
	255)
		exit;;
esac

' >> /tmp/kernelConfigMenu

sh /tmp/kernelConfigMenu

#name of the old configuration file
kernelOldConfigFile=`cat /tmp/m23kernelOldConfigFile`
rm /tmp/m23kernelOldConfigFile

#copy the old configuration file to the new kernel source directory
if test $kernelOldConfigFile != "none"
then
	cp $kernelConfigDir/$kernelOldConfigFile $kernelStoreDir/$kernelDir/.config
fi

#go to the new kernel source directory
cd $kernelStoreDir/$kernelDir

if test `getBuildArch` == "x86"
then
	make oldconfig ARCH=i386
else
	make oldconfig ARCH=x86_64
fi
backupKernelConfig
}





#compiles the kernel
function compileKernel
{
	#loadKernelVars
	. /tmp/menuVars
	checkKernelDir
	. /tmp/menuVars

	cd $kernelStoreDir/$kernelDir

	#save the extra version number (without the m23 part)
	extraVersion=`grep ^EXTRAVERSION Makefile | cut -d' ' -f3 | cut -d'-' -f1`

	sed "s/EXTRAVERSION =.*/EXTRAVERSION = $extraVersion-m23$kernelType/" Makefile > Makefile.m23tmp
	mv Makefile.m23tmp Makefile

	#delete old kernel modules
	rm -r `getCompiledDirWithArch`/lib/modules/*

	if [ `file init/main.o | grep x86-64 -c` -eq 1 ]
	then
		lastCompilationArch="x86-64"
	else
		lastCompilationArch="x86"
	fi
	

	if test `getBuildArch` == "x86"
	then
		if [ $lastCompilationArch != "x86" ]
		then
			cp .config /tmp
			make INSTALL_MOD_PATH=`getCompiledDirWithArch` distclean
			cp  /tmp/.config .
		fi

		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=i386 dep
		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=i386 bzImage
		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=i386 modules
		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=i386 modules_install
	else

		EDIT_addIfNotExists .config "^CONFIG_IA32_EMULATION=y" "CONFIG_IA32_EMULATION=y"
		EDIT_addIfNotExists .config "^CONFIG_IA32_AOUT=y" "CONFIG_IA32_AOUT=y"
		EDIT_commentOut .config "^CONFIG_PHYSICAL_START=0x100000" "#"
		EDIT_addIfNotExists .config "^CONFIG_PHYSICAL_START=0x200000" "CONFIG_PHYSICAL_START=0x200000"

		checkForx86_64Toolchain

		if [ $lastCompilationArch != "x86-64" ]
		then
			cp .config /tmp
			make INSTALL_MOD_PATH=`getCompiledDirWithArch` distclean
			cp  /tmp/.config .
		fi

		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=x86_64 CC=gcc-4.3 dep
		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=x86_64 CC=gcc-4.3 bzImage
		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=x86_64 CC=gcc-4.3 modules
		make INSTALL_MOD_PATH=`getCompiledDirWithArch` ARCH=x86_64 CC=gcc-4.3 modules_install

		backupKernelConfig
	fi
	copyKernelNModules
}





#copies the kernel and modules to the boot CD or bootimage
function copyKernelNModules
{
	. /tmp/menuVars
	checkKernelDir
	. /tmp/menuVars

	kernelVer=`echo $kernelDir | sed 's/linux-//'`

	#calculate the amount of kernel version numbers (2.6.10 => 3, 2.6.11.11 => 4)
	parts=`echo "$kernelVer" | sed 's/\./\n/g' | wc -l`

	if test $parts == 3
	then
		kernelModulName=$kernelVer"m23"$kernelType
	else
		#this is version number with 4 parts (e.g. 2.6.11.12)
		#!!!!!should not happen!!!!!

		#main number is 2.6.11
		main=`echo "$kernelVer" | cut -d'.' -f1`"."`echo "$kernelVer" | cut -d'.' -f2`"."`echo "$kernelVer" | cut -d'.' -f3`

		#extra number is 12
		#extra=`echo "$kernelVer" | cut -d'.' -f4`

		kernelModulName=$main"m23"$kernelType
	fi

	echo "Copying the kernel"
	cp -v $kernelStoreDir/$kernelDir/arch/`getKernelArch`/boot/bzImage `getKernelStoreDirWithArch`
	echo "Done. Press Enter to return to the menu"
	read
}





#gets the ramdisk size of the kernel from the kernel config file
function getRamDiskSize()
{
	#loadKernelVars
	. /tmp/menuVars

	if test -z $kernelDir
	then
		lsCommand=$kernelConfigDir"/m23-`getDebianArch`*.conf"
		confFile=`ls -t $lsCommand | head -1`
	else
		confFile=$kernelConfigDir"/m23-`getDebianArch`-$kernelDir".conf
	fi

	grep CONFIG_BLK_DEV_RAM_SIZE $confFile | cut -d'=' -f2
}





#menu for building kernels
menuKernelBuilder()
{
. /tmp/menuVars

mkdir -p $kernelStoreDir

dialog --clear --title "Download and build the Linux kernel" \
        --menu "Used kernel: $kernelDir" 11 80 4 \
"Download" "Download and extract a kernel" \
"ConfigureOld" "Configure with an old kernel config file" \
"Menuconfig" "Use menuconfig for configuring the kernel" \
"Compile" "Make kernel image and modules & copies them to the kernel&modules dir" 2> /tmp/kernelMenuSelectionm23
retval=$?
case $retval in
	1)
		$menuExecAfter
		exit;;
	255)
		$menuExecAfter
		exit;;
esac



case `cat /tmp/kernelMenuSelectionm23` in
	"Download")
		menuKernelDownload
		. /tmp/menuVars
		menuKernelBuilder
		exit;;
	"ConfigureOld")
		menuOldConfig
		menuKernelBuilder
		exit;;
	"Menuconfig")
		checkKernelDir
		. /tmp/menuVars
		cd $kernelStoreDir/$kernelDir

		if test `getBuildArch` == "x86"
		then
			make menuconfig ARCH=i386
		else
			make menuconfig ARCH=x86_64
		fi
		
		backupKernelConfig
		menuKernelBuilder
		exit;;
	"Compile")
		compileKernel
		menuKernelBuilder
		exit;;
esac
}