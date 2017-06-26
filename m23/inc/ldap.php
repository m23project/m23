<?php
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for using a LDAP server
$*/


define('m23serverName',"m23 LDAP server");
define('PHPLDAPADMIN_CONFIG', '/m23/data+scripts/m23admin/phpldapadmin/config/config.php');
define('PHPLDAPADMIN_CONFIGDIR', '/m23/data+scripts/m23admin/phpldapadmin/config');




/**
**name LDAP_getTypes()
**description Returns an array with the known LDAP types.
**returns Aarray with the known LDAP types.
**/
function LDAP_getTypes()
{
	return(array('none', 'read', 'write'));
};





/**
**name LDAP_connectServer($name)
**description Connects with read/write access to the LDAP server on the m23 server.
**parameter name: name of the LDAP server stored in the configuration file
**/
function LDAP_connectServer($name)
{
	$server = LDAP_loadServer($name);
	
	$ds = LDAP_makeConnection($server['host'] , $server['base'], $server['login_pass']);

	return($ds);
};





/**
**name LDAP_makeConnection($host, $baseDN, $pwd="")
**description Connects to a LDAP server.
**parameter host: hostname or IP of the LDAP server
**parameter baseDN: baseDN for the LDAP server
**parameter pwd: password for the administrator or empty for anonymous access
**/
function LDAP_makeConnection($host, $baseDN, $pwd="")
{
// 	ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);

	$ds = ldap_connect("$host");

	ldap_set_option( $ds, LDAP_OPT_PROTOCOL_VERSION, 3 );

	if (!empty($pwd))
		$r=ldap_bind($ds,"cn=admin,$baseDN", $pwd);
	else
		$r=ldap_bind($ds);

	if ($r === FALSE)
		return($r);

	return($ds);
}





/**
**name LDAP_getValueFromConfigLine($line)
**description Returns the value from a phpLDAPadmin configuration line.
**returns Value from a phpLDAPadmin configuration line.
**/
function LDAP_getValueFromConfigLine($line)
{
	$value = preg_replace("/\\\$servers->setValue\('[^']*','[^']*',[']?/", '', $line);

	// Remove unwanted parts around the value
	$value = str_replace ('array(\'' , '' , $value);
	$value = str_replace ('\'))' , '' , $value);
	$value = str_replace ('\')' , '' , $value);
	$value = str_replace (')' , '' , $value);
	$value = trim($value);

	return($value);
}





/**
**name LDAP_listServers()
**description Returns an associative array with the LDAP server names as keys and values.
**returns Associative array with the LDAP server names as keys and values.
**/
function LDAP_listServers()
{
	$configTxt = SERVER_getFileContents(PHPLDAPADMIN_CONFIG);
	$lines = explode(';', $configTxt);

	$out = array();

	// Run thru the lines of the config file (interesting parts are separated by ';')
	foreach ($lines as $line)
	{
		// Get the lines that contain LDAP server names
		if (strpos($line, "'server','name','") !== false)
		{
			// Read out the LDAP server name and add it to the output array as key and value
			$val = LDAP_getValueFromConfigLine($line);
			$out[$val] = $val;
		}
	}

	return($out);
}





/**
**name LDAP_loadServer($name)
**description Loads the variables from a LDAP server.
**parameter name: server name
**/
function LDAP_loadServer($name)
{
	$configTxt = SERVER_getFileContents(PHPLDAPADMIN_CONFIG);
	$lines = explode(';', $configTxt);
	$serverFound = false;
	$server = array();
	
	// Array containing the variable names of the config values as key and the keys of the output array as values
	$wantedVariables = array('host' => 'host', 'base' => 'base', 'port' => 'port', 'bind_pass' => 'login_pass');

	// Run thru the lines of the config file (interesting parts are separated by ';')
	foreach ($lines as $line)
	{
		// It is time to quit, if there is another LDAP server name line after the wanted server
		if ($serverFound && (strpos($line, "'server','name','") !== false))
			return($server);

		// Check, if the line contains the correct LDAP server
		if (strpos($line, "'server','name','$name'") !== false)
		{
			$serverFound = true;
			$server['name'] = $name;
		}
		else
		{
			// Check, if the line contains wanted variable names
			foreach ($wantedVariables as $varFile => $var)
				if (strpos($line, "','$varFile',") !== false)
					$server[$var] = LDAP_getValueFromConfigLine($line);
		}
	}

	return($server);
}





/**
**name LDAP_addPosix($ldapServer,$account,$forename,$familyname,$pwd,$uid,$gid)
**description Adds a posix account to the LDAP server and encrypts the password with MD5.
**parameter ldapServer: name of the LDAP server stored in the configuration file
**parameter account: the login name
**parameter forename: the forename of the user
**parameter familyname: the familyname of the user
**parameter pwd: the unencrypted password
**parameter uid: Linux user ID
**parameter gid: Linux group ID
**returns true or error message string in case of an error.
**/
function LDAP_addPosix($ldapServer,$account,$forename,$familyname,$pwd,$uid,$gid)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	$forename=utf8_encode($forename);
	$familyname=utf8_encode($familyname);
	if (empty($familyname))
		$familyname="-";

	$server=LDAP_loadServer($ldapServer);
	$ds=LDAP_connectServer($ldapServer);
// 	print(serialize($ds));

	// Build the array for creating a new user entry
	$out=array();
	$out['uid'][0]=$account;
	$out['gn'][0]=$forename;
	$out['sn'][0]=$familyname;
	$out['cn'][0]="$forename $familyname";
	$out['userPassword'][0]='{MD5}'.base64_encode(pack('H*',md5($pwd)));
	$out['loginShell'][0]="/bin/bash";
	$out['uidNumber'][0]=$uid;
	$out['gidNumber'][0]=$gid;
	$out['homeDirectory'][0]="/home/$account";
	$out['shadowMin'][0]=-1;
	$out['shadowMax'][0]=999999;
	$out['shadowWarning'][0]=7;
	$out['shadowInactive'][0]=-1;
	$out['shadowExpire'][0]=-1;
	$out['shadowFlag'][0]=0;
	$out['objectClass'][0]="top";
	$out['objectClass'][1]="person";
	$out['objectClass'][2]="posixAccount";
	$out['objectClass'][3]="shadowAccount";
	$out['objectClass'][4]="inetOrgPerson";


	// Add the new user
	$dn = "uid=$account,ou=people,$server[base]";
// 	print("<h4>@ldap_add($ds , $dn</h4>");
// 	print_r($out);
	$ret = @ldap_add($ds , $dn, $out);
	if ($ret === false)
	{
		$err = "$I18N_LDAPcouldNotCreatePosixAccount ($dn): ".ldap_error($ds).'/'.ldap_errno($ds);
		ldap_close($ds);
		return($err);
	}
	
// 	print('<h4>'.ldap_error($ds).'</h4>');

	// Create a group name by the GID
	$groupname = "gid$gid";

	// Build the array for creating a new group entry
	$out=array();
	$out['cn'][0] = $groupname;
	$out['gidNumber'][0] = $gid;
	$out['memberUid'] = $account;
	$out['objectClass'][0]="top";
	$out['objectClass'][1]="posixGroup";

	// Try to create the new group
	$dn="cn=$groupname,ou=Group,$server[base]";
	$ret = @ldap_add($ds, $dn, $out);
// 	print('<h4>'.ldap_error($ds).'</h4>');
	if (false === $ret)
	{
		// The group seems to exist => Add the uid to list of users who are in the group
		$miniOut=array();
		$miniOut['memberUid'] = $uid;
		$ret = @ldap_mod_add($ds, $dn, $miniOut);
		if ($ret === false)
		{
			$err = "$I18N_LDAPcouldNotCreatePosixGroup ($dn): ".ldap_error($ds).'/'.ldap_errno($ds);
			ldap_close($ds);
			return($err);
		}
	}

	LDAP_addNewUserID($uid);
	LDAP_addNewGroupID($gid);

	ldap_close($ds);

	return(true);
};





/**
**name LDAP_fqdn2dn($domain)
**description Returns the DN converted from a FQDN
**parameter domain: a full qualified domain name (e.g. test.m23.de)
**/
function LDAP_fqdn2dn($domain)
{
	if (!(strpos($domain,"dc=")===FALSE))
		{
			$domain=str_replace("\.",", dc=",$domain);
			$domain="dc=".$domain;
		};
	return($domain);
};





/**
**name LDAP_installServer($host,$org,$domain,$pwd)
**description Generates a script that installs and configures an openLDAP server
**parameter host: the IP or hostname of the LDAP server
**parameter org: name of the organisation
**parameter domain: the DN (e.g. foo.m23.de)
**parameter pwd: the unencrypted password for the admin
**/
function LDAP_installServer($host,$org,$domain,$pwd,$runInScreen=true,$disablePackageInstallation=false)
{
if (!$disablePackageInstallation)
	$installCmd="apt-get update
		apt-get -y --force-yes install slapd php4-ldap ldap-utils";
	else
	$installCmd="dpkg-reconfigure slapd";

$cmd="
rm /tmp/ldapConfig

cat >> /tmp/ldapConfig << \"LDAPEOF\"
slapd slapd/password1 password $pwd
slapd slapd/internal/adminpw password 
slapd slapd/password2 password $pwd
slapd slapd/fix_directory boolean true
slapd shared/organization string $org
slapd slapd/backend select BDB
slapd slapd/allow_ldap_v2 boolean false
slapd slapd/no_configuration boolean false
slapd slapd/move_old_database boolean true
slapd slapd/suffix_change boolean false
slapd slapd/dump_database_destdir string /var/backups/slapd-VERSION
slapd slapd/autoconf_modules boolean true
slapd slapd/domain string $domain
slapd slapd/invalid_config boolean true
slapd slapd/dump_database select when needed
slapd slapd/migrate_ldbm_to_bdb boolean true
slapd slapd/purge_database boolean false
LDAPEOF

debconf-set-selections /tmp/ldapConfig

/etc/init.d/slapd stop

killall -9 slapd

export DEBIAN_FRONTEND=noninteractive

$installCmd

if test `grep -l \"^extension=ldap.so\" /etc/php4/apache/php.ini`
then
        echo \"LDAP is activated in php.ini\"
else
        echo \"Activating LDAP in php.ini\"
        echo \"extension=ldap.so\" >> /etc/php4/apache/php.ini
fi
".
	EDIT_searchLineNumber("/etc/ldap/slapd.conf","/etc/ldap/schema/inetorgperson.schema").
	EDIT_calc(SED_foundLine,"+ 1").
	EDIT_insertAfterLineNumber("/etc/ldap/slapd.conf", SED_foundLine, "include         /etc/ldap/schema/misc.schema\ninclude         /etc/ldap/schema/openldap.schema",true)
."

killall -9 slapd

/etc/init.d/slapd start
/etc/init.d/slapd restart

rm /tmp/ldap.ldif 2> /dev/null

cat >> /tmp/ldap.ldif << \"LDIFEOF\"
version: 1

# Entry 1: ou=people,dc=$domain
dn: ou=people,dc=$domain
objectClass: organizationalUnit
ou: people
LDIFEOF

sleep 5

ldapadd -x -D \"cn=admin,dc=$domain\" -w $pwd -f /tmp/ldap.ldif

/etc/init.d/apache restart
";

LDAP_addServerTophpLdapAdmin("m23 LDAP server",$host,"dc=$domain",$pwd);

if ($runInScreen)
	SERVER_runInBackground("installLDAP",$cmd);
else
	system($cmd);
};





/**
**name LDAP_addServerTophpLdapAdmin($name,$host,$base,$pwd)
**description Adds an LDAP server to the phpLDAPadmin configuration file.
**parameter name: how the LDAP server should be called
**parameter host: the IP or hostname of the LDAP server
**parameter base: the base DN (e.g. dc=m23, dc=de)
**parameter pwd: the unencrypted password for the admin
**/
function LDAP_addServerTophpLdapAdmin($name,$host,$base,$pwd,$port=389)
{

LDAP_checkphpLdapAdminConfiguration();

$cmd=
EDIT_searchLastLineNumber(PHPLDAPADMIN_CONFIG, "new Datastore();").
EDIT_insertAfterLineNumber(PHPLDAPADMIN_CONFIG, SED_foundLine, "
\$servers->newServer('ldap_pla');
\$servers->setValue('server','name','$name');
\$servers->setValue('server','host','$host');
\$servers->setValue('server','port',$port);
\$servers->setValue('server','base',array('$base'));
\$servers->setValue('login','auth_type','config');
\$servers->setValue('login','bind_id','cn=admin,$base');
\$servers->setValue('login','bind_pass','$pwd');
\$servers->setValue('server','tls',false);
\$servers->setValue('server','read_only',false);
\$servers->setValue('auto_number','enable',false);
\$servers->setValue('auto_number','mechanism','search');
\$servers->setValue('auto_number','search_base','ou=People,$base');
\$servers->setValue('auto_number','min',array('uidNumber'=>1000,'gidNumber'=>1000));
\$servers->setValue('server','visible',true);
");

system($cmd);
};





/**
**name LDAP_delServerFromphpLdapAdmin($name)
**description Deletes a LDAP server from the phpLDAPadmin configuration file.
**parameter name: the name of the LDAP server that should be deleted
**/
function LDAP_delServerFromphpLdapAdmin($name)
{
$cmd=
EDIT_searchLineNumber(PHPLDAPADMIN_CONFIG, "'server','name','$name'").
EDIT_calc(SED_foundLine,"- 2").
EDIT_deleteLinesAmount(PHPLDAPADMIN_CONFIG, SED_foundLine, 16);

system($cmd);
};





/**
**name LDAP_checkphpLdapAdminConfiguration()
**description Checks if the phpLDAPadmin configuration file is existing and creates it if it's missing
**/
function LDAP_checkphpLdapAdminConfiguration()
{
	// Check, if the new config file exists. If yes, nothing is to do here
	if (file_exists(PHPLDAPADMIN_CONFIG)) return(true);

	// Make sure the directory for storing the new openLDAPadmin config file exists
	SERVER_multiMkDir(PHPLDAPADMIN_CONFIGDIR, 0755);

$file = fopen(PHPLDAPADMIN_CONFIG, "w");
fwrite($file,"<?php
\$config->custom->appearance['friendly_attrs'] = array(
	'facsimileTelephoneNumber' => 'Fax',
	'gid'                      => 'Group',
	'mail'                     => 'Email',
	'telephoneNumber'          => 'Telephone',
	'uid'                      => 'User Name',
	'userPassword'             => 'Password'
);

\$servers = new Datastore();
?>
");
fclose($file);
};





/**
**name LDAP_showServerManagementDialog()
**description Shows a dialog for adding, removing and changing LDAP servers.
**/
function LDAP_showServerManagementDialog()
{
	$installStarted = false;
	$htmlLDAPType = '';

	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	LDAP_checkphpLdapAdminConfiguration();

	$SEL_server = isset($_POST['SEL_server']) ? $_POST['SEL_server'] : '';
	$ED_servername = isset($_POST['ED_servername']) ? $_POST['ED_servername'] : '';
	$ED_serverhost = isset($_POST['ED_serverhost']) ? $_POST['ED_serverhost'] : '';
	$ED_baseDN = isset($_POST['ED_baseDN']) ? $_POST['ED_baseDN'] : '';
	$ED_serverport = isset($_POST['ED_serverport']) ? $_POST['ED_serverport'] : '';
	
	if (empty($ED_serverport))
		$ED_serverport=389;

	$servers = LDAP_listServers();
	
	/*
		changing a LDAP server means:
		1. delete the old entry like done by BUT_delete
		2. add a new entry like done by BUT_add
	*/

	//delete a LDAP server from the configuration file
	if ((isset($_POST['BUT_delete'])) || (isset($_POST['BUT_change'])))
	{
		LDAP_delServerFromphpLdapAdmin($SEL_server);
		$servers = LDAP_listServers();
		
		//if the entry should be deleted only (not changed) the dialog values should be resetted
		if (!isset($_POST['BUT_change']))
			{
				$SEL_server=$ED_servername=$ED_serverhost=$ED_baseDN="";
				MSG_showInfo($I18N_LDAPServerDeleted);
			};
	};

	//add a new LDAP server to the configuration file
	if (isset($_POST['BUT_add']) || (isset($_POST['BUT_change'])))
	{
		if ($_POST['ED_password1'] == $_POST['ED_password2'])
			{
				if (in_array($ED_servername,$servers))
					MSG_showError($I18N_LDAPServerExists);
				elseif (LDAP_makeConnection($ED_serverhost,$ED_baseDN,$_POST['ED_password1']) === FALSE)
					MSG_showError($I18N_LDAPServerConnectionRefused);
				else
					{
						LDAP_addServerTophpLdapAdmin($ED_servername,$ED_serverhost,$ED_baseDN,$_POST['ED_password1'],$ED_serverport);
						$servers = LDAP_listServers();
						$ED_servername = $ED_serverhost = $ED_baseDN = "";
						
						if (!isset($_POST['BUT_change']))
							MSG_showInfo($I18N_LDAPServerAdded);
						else
							{	//if it should be changed, the selection should be the new server name
								MSG_showInfo($I18N_LDAPServerChanged);
								$SEL_server=$ED_servername;
							};
					}
			}
		else
			MSG_showError($I18N_passwords_dont_match);
	};


	//loads the variables from a LDAP server in the dialog
	if (isset($_POST['BUT_load']))
	{
		$server = LDAP_loadServer($SEL_server);
		$ED_servername = $server['name'];
		$ED_serverhost = $server['host'];
		$ED_baseDN = $server['base'];
		$ED_serverport = $server['port'];

		if (empty($server['login_pass']))
			$htmlLDAPType="<br><span class=\"subhighlight_red\">$I18N_readOnlyLDAPServer</span>
			<br><br>";
		else
			$htmlLDAPType="<br><span class=\"subhighlight_red\">$I18N_readWriteLDAPServer</span><br><br>";
	};

	HTML_showTableHeader();
	echo("
	<form method=\"post\">
		<tr>
			<td>".HTML_listSelection("SEL_server",$servers,$SEL_server)."</td>
			<td align=\"center\">
				<input type=\"submit\" value=\"$I18N_load\" name=\"BUT_load\">
				<input type=\"submit\" value=\"$I18N_delete\" name=\"BUT_delete\">
			</td>
		</tr>

		<tr>
			<td colspan=\"2\"><hr></td>
		</tr>

		<tr>
			<td>$I18N_LDAPServerName</td>
			<td>
				<input type=\"text\" name=\"ED_servername\" value=\"$ED_servername\" size=\"20\" maxlength=\"200\">
			</td>
		</tr>
		
		<tr>
			<td>$I18N_LDAPServerHost</td>
			<td>
				<input type=\"text\" name=\"ED_serverhost\" value=\"$ED_serverhost\" size=\"20\" maxlength=\"200\">
			</td>
		</tr>
		
		<tr>
			<td>$I18N_LDAPServerPort</td>
			<td>
				<input type=\"text\" name=\"ED_serverport\" value=\"$ED_serverport\" size=\"6\" maxlength=\"6\">
			</td>
		</tr>
		
		<tr>
			<td>$I18N_baseDN</td>
			<td>
				<input type=\"text\" name=\"ED_baseDN\" value=\"$ED_baseDN\" size=\"20\" maxlength=\"200\">
			</td>
		</tr>
		
		<tr>
			<td>$I18N_password</td>
			<td><input type=\"password\" name=\"ED_password1\" value=\"".(isset($ED_password1) ? $ED_password1 : '')."\" size=\"20\" maxlength=\"200\"></td>
		</tr>

		<tr>
			<td>$I18N_repeated_password</td>
			<td><input type=\"password\" name=\"ED_password2\" value=\"".(isset($ED_password2) ? $ED_password2 : '')."\" size=\"20\" maxlength=\"200\"></td>
		</tr>

		<tr>
			<td colspan=\"2\" align=\"center\">
			$htmlLDAPType
			<input type=\"submit\" value=\"$I18N_add\" name=\"BUT_add\">
			<input type=\"submit\" value=\"$I18N_saveChanges\" name=\"BUT_change\">
			</td>
		</tr>

		<tr>
			<td colspan=\"2\"><hr></td>
		</tr>

		<tr>
			<td colspan=\"2\" align=\"center\">
			<a href=\"/m23admin/phpldapadmin/\" target=\"_blank\"><img src=\"/gfx/phpLdapAdmin.png\"><br>$I18N_startphpLDAPadmin</a>
			</td>
		</tr>

	");
	HTML_showTableEnd();

	echo("</form>\n");
};
//ldap_delete(\$ds,\"uid=\$account,ou=people,dc=nodomain\");





/**
**name LDAP_I18NLdapType($status)
**description Returns the human readable description of the LDAP usage type 
**parameter status: status string
**/
function LDAP_I18NLdapType($status)
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	switch ($status)
	{
		case "none": return($I18N_dontUseLDAP);
		case "read": return($I18N_readLoginFromLDAP);
		case "write": return($I18N_addNewLoginToLDAP);
		default: return($I18N_dontUseLDAP);
	};
};





/**
**name LDAP_getNextID($type)
**description Returns the next higher than the highest ID
**parameter type: "user" for user IDs
**/
function LDAP_getNextID($type)
{
	$sql = "SELECT $type"."ID FROM `$type"."IDs` ORDER BY `$type"."ID` DESC LIMIT 1";
	$result = DB_query($sql);

	//Check if there is at least one ID of the choosen type in the DB
	if (mysqli_num_rows($result) > 0)
	{
		//Yes, so get it
		$line = mysqli_fetch_row($result);
		$id = $line[0];
	}
	else
	{
		//No, so add a new ID
		LDAP_addNewID($type, 1000);
		$id = 1000;
	}

	return ($id + 1);
}





/**
**name LDAP_getNextUserID()
**description Returns the next higher than the highest user ID
**/
function LDAP_getNextUserID()
{
	return(LDAP_getNextID("user"));
};





/**
**name LDAP_addNewID($type,$id)
**description Adds a new ID to the table of used IDs or returns "false" if the ID exists
**parameter type: "user" for user IDs
**parameter id: number of the new ID
**/
function LDAP_addNewID($type,$id)
{
	$sql="SELECT COUNT(*) FROM `$type"."IDs` WHERE $type"."ID=\"$id\"";
	$result=DB_query($sql);
	$line=mysqli_fetch_row($result);
	if ($line[0] > 0)
	return (false);
	
	$sql="INSERT INTO `$type"."IDs` (`$type"."ID`) VALUES ('$id');";
	DB_query($sql);
	return(true);
};





/**
**name LDAP_deleteID($type,$id)
**description Delets an ID from the table of used IDs
**parameter type: "user" for user IDs
**parameter id: number of the new ID
**/
function LDAP_deleteID($type,$id)
{
	$sql="DELETE FROM `$type"."IDs` WHERE $type"."ID=\"$id\"";
	DB_query($sql);
};





/**
**name LDAP_addNewUserID($id)
**description Adds a new user ID to the table
**parameter id: number of the new ID
**/
function LDAP_addNewUserID($id)
{
	LDAP_addNewID("user",$id);
};





/**
**name LDAP_addNewGroupID($id)
**description Adds a new user ID to the table
**parameter id: number of the new ID
**/
function LDAP_addNewGroupID($id)
{
	LDAP_addNewID("group",$id);
};





/**
**name LDAP_getNextGroupID()
**description Returns the next higher than the highest group ID
**/
function LDAP_getNextGroupID()
{
	return(LDAP_getNextID("group"));
};





/**
**name LDAP_getFreeIDs($type,$start,$amount)
**description Returns an array with free IDs of the selected type.
**parameter type: "user" for user IDs
**parameter start: start ID to check if it's free
**parameter amount: the amount of IDs to return
**/
function LDAP_getFreeIDs($type,$start,$amount)
{
	$pos=0;

	for ($id=$start; $amount > 0;)
		{
			$sql="SELECT COUNT(*) FROM `$type"."IDs` WHERE $type"."ID=\"$id\"";
			$result=DB_query($sql);
			$line=mysqli_fetch_row($result);
			if ($line[0] == 0)
				{
					$out[$pos++]=$id;
					$amount--;
				};
			$id++;
		};

	return($out);
}





/**
**name LDAP_getFreeUserIDs($start,$amount)
**description Returns an array with free user IDs of the selected type.
**parameter start: start ID to check if it's free
**parameter amount: the amount of IDs to return
**/
function LDAP_getFreeUserIDs($start,$amount)
{
	return(LDAP_getFreeIDs("user",$start,$amount));
};





/**
**name LDAP_getFreeGroupIDs($start,$amount)
**description Returns an array with free group IDs of the selected type.
**parameter start: start ID to check if it's free
**parameter amount: the amount of IDs to return
**/
function LDAP_getFreeGroupIDs($start,$amount)
{
	return(LDAP_getFreeIDs("group",$start,$amount));
};





/**
**name LDAP_matchLDAPserver($host,$base)
**description Searches for the name of a LDAP server and returns the name of the found server or false
**parameter host: the IP or hostname of the LDAP server
**parameter base: the base DN (e.g. dc=m23, dc=de)
**/
function LDAP_matchLDAPserver($host,$base)
{
	$servers = LDAP_listServers();

	foreach($servers as $sever)
	{
		$data=LDAP_loadServer($sever);
		if ($data['host']==$host && $data['base']==$base)
			return($sever);
	};
	return(false);
}
?>