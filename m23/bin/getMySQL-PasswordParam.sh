#!/bin/bash

# Get the password parameter to call MySQL/MariaDB CLI tools

dbadmpass=`grep "^password" /etc/mysql/debian.cnf | tr -d '[:blank:]' | cut -d'=' -f2 | head -1`

if [ $dbadmpass ]
then
	echo -n "-p$dbadmpass"
else
	echo -n ''
fi
