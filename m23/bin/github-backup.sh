#!/bin/bash

. /mdk/bin/forkFunctions.inc

isDevelReturn
if [ $? -eq 0 ]
then
	develDirAdd='-devel'
else
	develDirAdd=''
fi

m23hgDir="/mnt/crypto/m23-hg/m23$develDirAdd"
mdkhgDir="/mnt/crypto/m23-hg/mdk$develDirAdd"



for dir in "$m23hgDir" "$mdkhgDir"
do
	backupName=$(basename "$dir") #-$(grep m23_version /m23/inc/version.php | cut -d'"' -f2)"
	backupDate=`date +"$backupName-backup from %Y-%m-%d %H:%M"`

	cd "$dir"
	pwd
	
	if [ -d .git ]
	then
		sed -i "s#git@github.com:m23project.*#git@github.com:m23project/$backupName.git#" .git/config
		git add .
		git commit -m "$backupDate"
		git push --force
	else
		git init
		echo "**/.hg
.hg
**/.bzr
.bzr
**/.git
.git
*.iso
*.7z
mailConf.php
CloudStackConf.php
vncpasswd.php
" > .gitignore
		git add .
		echo git remote add origin "git@github.com:m23project/$backupName.git"
		git remote add origin "git@github.com:m23project/$backupName.git"
		git commit -m init
		git push --force -u origin master
	fi

done
