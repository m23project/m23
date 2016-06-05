#!/bin/bash

for dskConstant in UBUNTUDESKTOP_EDUBUNTU_1604 UBUNTUDESKTOP_KUBUNTU_1604 UBUNTUDESKTOP_LUBUNTU_1604 UBUNTUDESKTOP_MYTHBUNTU_1604 UBUNTUDESKTOP_GNOME_1604 UBUNTUDESKTOP_UBUNTUSTUDIO_1604 UBUNTUDESKTOP_XUBUNTU_1604
do
	# 1. Remove DESKTOP_
	# 2. Convert all to lower case
	# 3. Upper case the 1st letter
	# 4. Upper case every letter after a _
	# 5. Remove all _

	fn=$(echo $dskConstant | sed -e 's/DESKTOP_/_/' -e 's/\([A-Z]\)/\L\1/g' -e 's/^\([a-zA-Z]\)/\U\1/g' -e 's/_\([a-zA-Z]\)/\U\1/g' -e 's/_//g')
	fn="m23${fn}Install.php"

	if [ -f "$fn" ]
	then
		echo "$fn exists. Return for overwrite, Ctrl+C to abort."
		read lala
	fi
	
	desktopUbuntuVer=$(echo $dskConstant | sed 's/UBUNTUDESKTOP_//')
	desktop=$(echo $desktopUbuntuVer | cut -d'_' -f1 | sed -e 's/\([A-Z]\)/\L\1/g' -e 's/^\([a-zA-Z]\)/\U\1/g')
	ver=$(echo $desktopUbuntuVer | cut -d'_' -f2)

echo "<?PHP
/*
Description: Installs the $desktop for Ubuntu $ver
Priority:20
*/

function run(\$id)
{
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');

	UBUNTU_desktopInstall($dskConstant, false, true, true, true, true);

	sendClientStatus(\$id,\"done\");
	sendClientStageStatus(STATUS_GREEN);

	echo(\"

rm /tmp/*.sh

rm /tmp/*.php\n\n\");

	executeNextWork();
}
?>" > "$fn"
done