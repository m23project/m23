<?PHP
/*
Description: Zarafa
Priority:20
*/





/**
**name calcRAM()
**description Generates BASH code to calculate the RAM size on the client side.
**/
function calcRAM()
{
	echo("
	#Get the size of installed RAM in KB
	ramSize=`grep MemTotal /proc/meminfo | sed 's/[^0-9]//g'`
	#Get the size of installed RAM in MB
	ramSize=`expr \$ramSize / 1024`
	");
}





/**
**name defineSetOption()
**description Defines the BASH function setOption that changes an option in a configuration file to a given value.
**/
function defineSetOption()
{
	echo('
setOption() {
	file=$1
	option=$2
	value=$3

	echo "$file: $option=$value"

	# escape &-signs, and % for sed
	value=`echo $value | sed -e \'s/\&/\\\\\\&/g\' -e \'s/\%/\\\\\\%/g\'`
	sed -i -e "s%\([[:space:]]*$option[[:space:]]*=[[:space:]]*\).*%\1$value%" $file
}
');
}





/**
**name installMySQL($p)
**description Installs MySQL, adds a MySQL Zarafa user and sets optimised cache sizes.
**parameter p: Associative array with parameters for MySQL creation.
**parameter zarafaMySQLUser: Name of the MySQL Zarafa user.
**/
function installMySQL($p, $zarafaMySQLUser)
{
echo('
debconf-set-selections <<EOF
mysql-server-5.1 mysql-server/root_password_again password '.$p['mySQLRootPW'].'
mysql-server-5.1 mysql-server/root_password password '.$p['mySQLRootPW'].'
mysql-server-5.1 mysql-server-5.1/start_on_boot boolean true
mysql-server-5.1 mysql-server-5.1/postrm_remove_databases boolean false
mysql-server-5.1 mysql-server-5.1/nis_warning note
mysql-server-5.1 mysql-server-5.1/really_downgrade boolean false
EOF

#Install MySQL
apt-get --force-yes -y install mysql-server-5.1 libmysqlclient16

#Create new DB user for Zarafa
echo "GRANT ALL PRIVILEGES ON zarafa.* TO \''.$zarafaMySQLUser.'\'@\'localhost\' IDENTIFIED BY \''.$p['mySQLZarafaPW'].'\';" | mysql -u root -p'.$p['mySQLRootPW'].'

#25% of installed RAM
innodb_buffer_pool_size=`echo "$ramSize * 0.25" | bc | cut -d\'.\' -f1`

#25% of innodb_buffer_pool_size
innodb_log_file_size=`echo "$innodb_buffer_pool_size * 0.25" | bc | cut -d\'.\' -f1`

#Make sure the log files are deleted (this needs to be done in case of changes of innodb_log_file_size)
rm /var/lib/mysql/ib_logfile* 2> /dev/null

#Write new config file
echo "[mysqld]
innodb_buffer_pool_size=${innodb_buffer_pool_size}M
innodb_log_file_size=${innodb_log_file_size}M
innodb_log_buffer_size=32M
query_cache_size=32M" > /etc/mysql/conf.d/zarafa.cnf

service mysql restart
');
}





/**
**name installApache()
**description Installs Apache.
**parameter p: Associative array with parameters.
**/
function installApache($p)
{
echo('
#Install Apache + PHP
apt-get --force-yes -y install apache2-mpm-prefork libapache2-mod-php5

a2enmod ssl

#Make sure that "register_globals" is "Off"
setOption /etc/php5/apache2/php.ini register_globals Off

#Increase the maximum upload size
setOption /etc/php5/apache2/php.ini upload_max_filesize 45M
');
}





/**
**name writeSSLPEMs($p, $sslDir, $cacertPEMFile, $serverPEMFile, $serverCRTFile, $serverKEYFile)
**description Writes the SSL PEM files containing needed certificates.
**parameter p: Associative array with parameters for the certificates.
**parameter sslDir: The directory that will store SSL PEM files.
**parameter cacertPEMFile: File name with full path ot the cacert.pem.
**parameter serverPEMFile: File name with full path ot the server.pem.
**parameter serverCRTFile: File name with full path ot the server.crt.
**parameter serverKEYFile: File name with full path ot the server.key.
**/
function writeSSLPEMs($p, $sslDir, $cacertPEMFile, $serverPEMFile, $serverCRTFile, $serverKEYFile)
{
	if ($p['SSLCertSource'] == 'erstellen')
		{
			$serverDn = array(
				"countryName" => $p['CAcountryName'],
				"stateOrProvinceName" => $p['CAstateOrProvinceName'],
				"localityName" => $p['CAlocalityName'],
				"organizationName" => $p['CAorganizationName'],
				"organizationalUnitName" => $p['CAorganizationalUnitName'],
				"commonName" => $p['CAcommonName'],
				"emailAddress" => $p['CAemailAddress']
			);

			$CADn = array(
				"countryName" => $p['ServercountryName'],
				"stateOrProvinceName" => $p['ServerstateOrProvinceName'],
				"localityName" => $p['ServerlocalityName'],
				"organizationName" => $p['ServerorganizationName'],
				"organizationalUnitName" => $p['ServerorganizationalUnitName'],
				"commonName" => $p['ServercommonName'],
				"emailAddress" => $p['ServeremailAddress']
			);

			$out = HELPER_createSelfSignedCAAndServerCertificate($CADn, $serverDn, $p['serverPEMPW'], 3560);
			$cacertPEM = $out['cacertPEM'];
			$serverPEM = $out['serverPrivateKey'].$out['serverCert'];
			$serverKEY = $out['serverPrivateKeyUnencrypted'];
		}
	else
		{
			$cacertPEM = $p['cacertPEM'];
			$serverPEM = $p['serverPEM'];
		}


	//Create the SSL directory an the PEM files
	echo("
	mkdir -p \"$sslDir\"
	chmod 700 \"$sslDir\"

	rm $cacertPEMFile 2> /dev/null
	cat >> $cacertPEMFile << \"EOF\"
$cacertPEM
EOF

	rm $serverPEMFile 2> /dev/null
	cat >> $serverPEMFile << \"EOF\"
$serverPEM
EOF
	grep -A1000 \"BEGIN CERTIFICATE\" $serverPEMFile > $serverCRTFile
	");
	
	if (isset($serverKEY{1}))
		echo("
	rm $serverKEYFile 2> /dev/null
	cat >> $serverKEYFile << \"EOF\"
$serverKEY
EOF
");
	else
		echo("
	grep -B1000 \"END RSA PRIVATE KEY\" $serverPEMFile > $serverKEYFile
	");

}





/**
**name setnoninteractive()
**description Sets APT to noninteractive mode.
**/
function setnoninteractive()
{
echo('export DEBIAN_FRONTEND=noninteractive
');
}





/**
**name installZarafa($p, $cacertPEMFile, $serverPEMFile, $sslDir, $zarafaMySQLUser)
**description Installs the Zarafa server and configures the server component.
**parameter p: Associative array with parameters for the certificates.
**parameter cacertPEMFile: File name with full path ot the cacert.pem.
**parameter serverPEMFile: File name with full path ot the server.pem.
**parameter sslDir: The directory that will store SSL PEM files.
**parameter zarafaMySQLUser: Name of the MySQL Zarafa user.
**/
function installZarafa($p, $cacertPEMFile, $serverPEMFile, $sslDir, $zarafaMySQLUser)
{
echo('

#Install Zarafa and Zarafa webAccess
apt-get --force-yes -y install zarafa libvmime0=0.7.1-34 libical0=0.44-2 zarafa-webaccess zarafa-licensed bc

# block upgrade of libical and libvmime by normal distribution packages, which are newer but incompatible
dpkg --set-selections <<EOF
libical0 hold
libvmime0 hold
EOF

/etc/init.d/apache2 restart

#Set MySQL login
setOption /etc/zarafa/server.cfg mysql_user '.$zarafaMySQLUser.'
setOption /etc/zarafa/server.cfg mysql_password "'.$p['mySQLZarafaPW'].'"

#Set the cache_cell_size to 25% of installed RAM
cache_cell_size=`echo "$ramSize * 0.25 * 1048576" | bc | cut -d\'.\' -f1`
setOption /etc/zarafa/server.cfg cache_cell_size $cache_cell_size

#Set to "estimatedUserAmounts" with 100Kb each
cache_object_size=`echo "'.$p['estimatedUserAmount'].' * 100 * 1024" | bc | cut -d\'.\' -f1`
setOption /etc/zarafa/server.cfg cache_object_size $cache_object_size

#Set to "cache_indexedobject_size" with 512Kb each
cache_indexedobject_size=`echo "'.$p['estimatedUserAmount'].' * 512 * 1024" | bc | cut -d\'.\' -f1`
setOption /etc/zarafa/server.cfg cache_indexedobject_size $cache_indexedobject_size

setOption /etc/zarafa/server.cfg attachment_storage '.$p['attachment_storage'].'
setOption /etc/zarafa/server.cfg user_plugin '.$p['user_plugin'].'
setOption /etc/zarafa/server.cfg user_safe_mode no

#SSL options
setOption /etc/zarafa/server.cfg server_ssl_enabled "yes"
setOption /etc/zarafa/server.cfg server_ssl_ca_file "'.$cacertPEMFile.'"
setOption /etc/zarafa/server.cfg server_ssl_key_file "'.$serverPEMFile.'"
setOption /etc/zarafa/server.cfg server_ssl_key_pass "'.$p['serverPEMPW'].'"
setOption /etc/zarafa/server.cfg server_ssl_ca_path '.$sslDir.'

/etc/init.d/zarafa-server restart
');

//If the SSL certificates are generated by m23, the Apache can be configured with SSL
if ($p['SSLCertSource'] == 'erstellen')
	echo(
EDIT_addIfNotExists('/etc/apache2/sites-available/zarafa-webaccess','SSLCertificateFile /etc/zarafa/ssl/server.crt','
<VirtualHost *:443>
	SSLEngine On
	SSLCertificateFile /etc/zarafa/ssl/server.crt
	SSLCertificateKeyFile /etc/zarafa/ssl/server.key
</VirtualHost>
').'
/etc/init.d/apache2 restart
');
}





/**
**name configLang($p)
**description Configures the language settings for Zarafa.
**parameter p: Associative array with parameters for the language.
**/
function configLang($p)
{
	//Take the first 2 digits of the language (e.g. "de" from "de_DE.UTF-8")
	$lang = substr($p['lang'], 0, 2);

	echo('
	
	apt-get --force-yes -y install language-pack-'.$lang.'

	echo \'
#! /bin/sh

# Create a Zarafa user for an already existing external user.  Create
# and initialize the users stores.

PATH=$PATH:/sbin:/usr/local/sbin:/usr/sbin

zarafa-admin --create-store "${ZARAFA_USER}" --lang "'.$p['lang'].'"\' > /etc/zarafa/userscripts/createuser.d/00createstore
	');
}





/**
**name configDAgent($p)
**description Configures dagent.cfg.
**parameter p: Associative array with parameters for the dagent.
**parameter serverPEMFile: File name with full path ot the server.pem.
**/
function configDAgent($p, $serverPEMFile)
{
	echo('
	setOption /etc/zarafa/dagent.cfg log_method file
	setOption /etc/zarafa/dagent.cfg log_level 3
	setOption /etc/zarafa/dagent.cfg log_file /var/log/zarafa/dagent.log
	setOption /etc/zarafa/dagent.cfg log_timestamp 1
	setOption /etc/zarafa/dagent.cfg sslkey_file "'.$serverPEMFile.'"
	setOption /etc/zarafa/dagent.cfg sslkey_pass "'.$p['serverPEMPW'].'"
	setOption /etc/zarafa/dagent.cfg spam_header_value "'.$p['spam_header_value'].'"
	setOption /etc/zarafa/dagent.cfg spam_header_name "'.$p['spam_header_name'].'"

	setOption /etc/default/zarafa-dagent DAGENT_ENABLED on

	/etc/init.d/zarafa-dagent restart
	');
}





/**
**name configGateway($p, $serverKEYFile)
**description Configures gateway.cfg.
**parameter p: Associative array with parameters for the gateway.
**parameter serverKEYFile: File name with full path ot the server.key.
**/
function configGateway($p, $serverKEYFile, $serverCRTFile)
{
	echo('
	setOption /etc/zarafa/gateway.cfg pop3s_enable yes
	setOption /etc/zarafa/gateway.cfg imaps_enable yes
	setOption /etc/zarafa/gateway.cfg ssl_private_key_file "'.$serverKEYFile.'"
	setOption /etc/zarafa/gateway.cfg ssl_certificate_file ""
	/etc/init.d/zarafa-gateway restart
	');
}





/**
**name configICal($p, $serverKEYFile, $serverCRTFile)
**description Configures ical.cfg.
**parameter p: Associative array with parameters for ICal.
**parameter serverKEYFile: File name with full path ot the server.key.
**parameter serverCRTFile: File name with full path ot the server.crt.
**/
function configICal($p, $serverKEYFile, $serverCRTFile)
{
	echo('
	setOption /etc/zarafa/ical.cfg ssl_private_key_file "'.$serverKEYFile.'"
	setOption /etc/zarafa/ical.cfg ssl_certificate_file "'.$serverCRTFile.'"
	/etc/init.d/zarafa-ical restart
	');
}





/**
**name configSpooler($p, $serverPEMFile)
**description Configures the Zarafa Spooler.
**parameter p: Associative array with parameters for the spooler.
**parameter serverPEMFile: File name with full path ot the server.pem.
**/
function configSpooler($p, $serverPEMFile)
{
	echo('
	setOption /etc/zarafa/spooler.cfg smtp_server "'.$p['smtp_host'].'"
	setOption /etc/zarafa/spooler.cfg sslkey_file "'.$serverPEMFile.'"
	setOption /etc/zarafa/spooler.cfg sslkey_pass "'.$p['serverPEMPW'].'"
	setOption /etc/zarafa/spooler.cfg always_send_delegates "'.$p['always_send_delegates'].'"
	setOption /etc/zarafa/spooler.cfg allow_redirect_spoofing "'.$p['allow_redirect_spoofing'].'"
	setOption /etc/zarafa/spooler.cfg copy_delegate_mails "'.$p['copy_delegate_mails'].'"
	setOption /etc/zarafa/spooler.cfg allow_delegate_meeting_request "'.$p['allow_delegate_meeting_request'].'"
	setOption /etc/zarafa/spooler.cfg always_send_tnef "'.$p['always_send_tnef'].'"
	/etc/init.d/zarafa-spooler restart
	');
}





/**
**name finaliseZarafa($serverPEMFile)
**description Finalises the Zarafa installation.
**parameter p: Associative array with parameters for the spooler.
**/
function finaliseZarafa($p)
{
	echo('
	zarafa-admin -s
	zarafa-admin -c '.$p['zarafaAdmin_login'].' -e '.$p['zarafaAdmin_email'].' -f "Zarafa Admin" -p '.$p['zarafaAdmin_pass'].' -a1
	');
}





function run($id)
{
	include('/m23/inc/distr/debian/clientConfigCommon.php');
	$lang=getClientLanguage();
	include("/m23/inc/i18n/".I18N_m23instLanguage($lang)."/m23inst.php");

	//Define the localtions for the SSL files
	$sslDir = "/etc/zarafa/ssl";
	$cacertPEMFile = "$sslDir/cacert.pem";
	$serverPEMFile = "$sslDir/server.pem";
	$serverCRTFile = "$sslDir/server.crt";
	$serverKEYFile = "$sslDir/server.key";

	$PKGParams = PKG_getAllParams($id);

	$zarafaMySQLUser = HELPER_randomUsername(16);

	//BASH settings
	setnoninteractive();
	calcRAM();
	defineSetOption();
	
	echo("\napt-get update\n");

	writeSSLPEMs($PKGParams, $sslDir, $cacertPEMFile, $serverPEMFile, $serverCRTFile, $serverKEYFile);
/* =====> */ MSR_statusBarIncCommand(2);


	//Installation
	installMySQL($PKGParams, $zarafaMySQLUser);
/* =====> */ MSR_statusBarIncCommand(30);
	installApache($PKGParams);
/* =====> */ MSR_statusBarIncCommand(30);
	installZarafa($PKGParams, $cacertPEMFile, $serverPEMFile, $sslDir, $zarafaMySQLUser);
/* =====> */ MSR_statusBarIncCommand(30);
	
	//Configuration
	configLang($PKGParams);
	configDAgent($PKGParams, $serverPEMFile);
/* =====> */ MSR_statusBarIncCommand(2);

	configGateway($PKGParams, $serverKEYFile, $serverCRTFile);
/* =====> */ MSR_statusBarIncCommand(2);
	configICal($PKGParams, $serverKEYFile, $serverCRTFile);
	configSpooler($PKGParams, $serverPEMFile);
/* =====> */ MSR_statusBarIncCommand(2);
	finaliseZarafa($PKGParams);


	sendClientStatus($id,"done");
	executeNextWork();
}
?>