#finds the current client or server ISO and prints the full path to the ISO or an error message.
#returns: `true` if the ISO could be found otherwise `false`.
findClientOrServerISO()
{
	if test $bootCDPrefix = "m23server"
	then
		iso=$ISOBuildDir/../$bootCDPrefix*
		errmsg="The m23 server ISO image could not be found! It was searched with: $ISOBuildDir/../$bootCDPrefix*"
	else
		arch=`getDebianArch`
		errmsg="The m23 client ISO image could not be found! It was searched with: $ISOBuildDir/../$bootCDPrefix-$arch.iso"
		iso=$ISOBuildDir/../$bootCDPrefix-$arch.iso
	fi

	if test -f $iso
	then
		echo "$iso"
		return `true`
	else
		echo "$errmsg"
		return `false`
	fi
}





#updates the package info database for a locally stored sources.list and a given architecture
#set the variable "overwriteArch" extrenally to use another architecture then the selected via the menu
localArchAptUpdate()
{
	. /tmp/menuVars

	if test $overwriteArch
	then
		arch=$overwriteArch
	else
		arch=`getDebianArch`
	fi

	mkdir -p ./lists/partial
	mkdir -p ./archivs/partial
	mkdir -p ./cache
	touch ./lists/lock
	touch ./status

	apt-get update -o=Dir::Cache=./cache -o=Dir::Cache::archives=./archivs -o=Dir::State::status=./status -o=Dir::State=. -o=Dir::Etc::sourcelist=./sources.list -o=APT::Architecture=$arch
}





#downloads Debian packages with dependencies for the currently selected architecture
#set the variable "overwriteArch" extrenally to use another architecture then the selected via the menu
localArchAptDownload()
{
	. /tmp/menuVars

	if test $overwriteArch
	then
		arch=$overwriteArch
	else
		arch=`getDebianArch`
	fi

	. /tmp/menuVars
	apt-get -y -d --force-yes install -o=Dir::Cache=./cache -o=Dir::Cache::archives=./archivs -o=Dir::State::status=./status -o=Dir::State=. -o=Dir::Etc::sourcelist=./sources.list -o=APT::Architecture=$arch -o=Dir::Etc::Preferences=/dev/null $@
}





#downloads and extracts the source of the Debian packages
localArchAptSource()
{
	. /tmp/menuVars

	if test $overwriteArch
	then
		arch=$overwriteArch
	else
		arch=`getDebianArch`
	fi

	. /tmp/menuVars
	apt-get -y --force-yes source -o=Dir::Cache=./cache -o=Dir::Cache::archives=./archivs -o=Dir::State::status=./status -o=Dir::State=. -o=Dir::Etc::sourcelist=./sources.list -o=APT::Architecture=$arch $@
}





#checks if the toolchain for cross compiling to x86_64 is installed
checkForx86_64Toolchain()
{
	if test `whereis x86_64-unknown-linux-gnu-gcc | wc -w` -lt 2
	then
		if test -d /usr/x86_64-unknown-linux-gnu/bin/
		then
			export PATH=$PATH:/usr/x86_64-unknown-linux-gnu/bin/
		else
			dialog --yesno "Download and install toolchain for cross compiling x86_64?" 6 36
			
			if test $? -eq 0
			then
				#Download and install the old toolchain with the compiler
				wget -T 10 -c http://downloads.sourceforge.net/m23/toolchain-amd64_0.5.3-100097_i386.deb -O /tmp/toolchain-amd.deb
				dpkg -i /tmp/toolchain-amd.deb

				#Download and install the new binutils that can handle the new amd64 format of the Debian Lenny binary files
				wget -T 10 -c http://downloads.sourceforge.net/m23/binutils-x86-64-linux-gnu_2.17-3_i386.deb -O /tmp/binutils-amd.deb
				dpkg -i /tmp/binutils-amd.deb

				export PATH=$PATH:/usr/x86_64-unknown-linux-gnu/bin/
			else
				exit
			fi
		fi
	fi
}





#makes one or more links to an existing file
makeLinks()
{
	linkSrc=$1
	shift 1

 	if test -f $linkSrc
 	then
		for linkDst in $@
		do
			ln -s $linkSrc $linkDst
		done
	fi
}





#shows the current build architecture for m23 kernel, bootimage, rootFS
getBuildArch()
{
	#check that the architecture file exists and contains at least the 32Bit target
	if [ ! -f /tmp/m23architecture ]
	then
		echo "x86" > /tmp/m23architecture
		menuVarAdd kernelType i386
	fi

	cat /tmp/m23architecture
}





#shows the current Debian format (i386 or amd64)
getDebianArch()
{
	getBuildArch | sed 's/x86$/i386/' | sed 's/x86_64/amd64/'
}





#shows the current Kernel format (i386 or x86_64)
getKernelArch()
{
	getBuildArch | sed 's/x86$/i386/'
}





#shows the directory where the architecture dependend kernel should be stored
getKernelStoreDirWithArch()
{
	. /tmp/menuVars
	echo -n "$kernelNModulesStoreDir/`getDebianArch`"
}





#shows the directory where the architecture dependend kernel modules should be stored
getModulesStoreDirWithArch()
{
	echo -n "`getCompiledDirWithArch`/lib/modules"
}






#shows the directory where the compiled files sould be stored
getCompiledDirWithArch()
{
	. /tmp/menuVars
	echo -n "$compiledDir/`getDebianArch`"
}





#Shows a menu for selecting the current build architecture
menuSelectArch()
{
	dialog --clear --backtitle "m23 Software Development Kit (MDK)" --title "Build architecture(s)" --menu "Please choose the architecture you want to create the Linux kernel, rootFS, bootimages, etc. for." 10 77 2\
	x86 "32Bit PC systems: i486, i686, Pentium, PPro, AMD K5, K6, K7 etc."\
	x86_64 "64Bit systems with 32bit support: AMD Athlon64, Intel Pentium D, Core2Duo etc." 2> /tmp/archTmp
	
	#convert the dialog list "x86" "x86_64" to
	#x86
	#x86_64
	awk -v RS='"' -v ORS='' '{
	if (length($0) > 1)
		print($0)
	}' /tmp/archTmp > /tmp/m23architecture

	rm /tmp/archTmp

	menuVarAdd kernelType `getDebianArch`
}





#Shows the directory where to download the architecture dependend Debian executables and libraries
getRootFSDownloadDirWithArch()
{
. /tmp/menuVars

echo -n "$rootFSDownloadDir/`getDebianArch`"
}