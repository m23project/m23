#!/bin/bash

config="/m23/data+scripts/m23admin/phpldapadmin/config.php"
convertScript="/tmp/phpLDAPadminConfigMigration.php"

# Check, if there is an old config
if [ ! -f $config ]
then
	exit 0
fi

echo "<?php
include(\"/m23/inc/ldap.php\");
include(\"/m23/inc/server.php\");
include(\"/m23/inc/edit.php\");
" > $convertScript

awk "

BEGIN {
	name=host=base=port=pass=\"\";
}

{
	target=\$0
	gsub(/.* = '/, \"\",target)
	gsub(/.* = /, \"\",target)
	gsub(/';/, \"\",target)
	gsub(/;$/, \"\",target)
}

/servers\[\\\$i\]\['name'\]/ {
	name=target
}

/servers\[\\\$i\]\['host'\]/ {
	host=target
}

/servers\[\\\$i\]\['base'\]/ {
	base=target
}

/servers\[\\\$i\]\['port'\]/ {
	port=target
}

/servers\[\\\$i\]\['login_pass'\]/ {
	pass=target
	print \"LDAP_addServerTophpLdapAdmin('\"name\"','\"host\"','\"base\"','\"pass\"',\"port\");\n\"
}
" $config >> $convertScript

echo "
?>" >> $convertScript

php $convertScript