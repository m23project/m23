<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bacula-director-mysql");

$elem["bacula/db_host"]["type"]="string";
$elem["bacula/db_host"]["description"]="Database server hostname:
 Please enter the hostname of the database server host.

";
$elem["bacula/db_host"]["descriptionde"]="";
$elem["bacula/db_host"]["descriptionfr"]="";
$elem["bacula/db_host"]["default"]="localhost";
$elem["bacula/dba_name"]["type"]="string";
$elem["bacula/dba_name"]["description"]="Database administrator username:
 Please enter the MySQL administrator username, needed for
 the database creation.

";
$elem["bacula/dba_name"]["descriptionde"]="";
$elem["bacula/dba_name"]["descriptionfr"]="";
$elem["bacula/dba_name"]["default"]="root";
$elem["bacula/dba_password"]["type"]="password";
$elem["bacula/dba_password"]["description"]="Database administrator password:
 Please enter the MySQL administrator password, needed for
 the database creation.

";
$elem["bacula/dba_password"]["descriptionde"]="";
$elem["bacula/dba_password"]["descriptionfr"]="";
$elem["bacula/dba_password"]["default"]="";
$elem["bacula/dba_confirm"]["type"]="password";
$elem["bacula/dba_confirm"]["description"]="DBA password confirmation:
 Please confirm the password in order to continue the process.

";
$elem["bacula/dba_confirm"]["descriptionde"]="";
$elem["bacula/dba_confirm"]["descriptionfr"]="";
$elem["bacula/dba_confirm"]["default"]="";
$elem["bacula/mismatch"]["type"]="note";
$elem["bacula/mismatch"]["description"]="Password mismatch
 The password and its confirmation do not match. Please
 reenter the passwords.

";
$elem["bacula/mismatch"]["descriptionde"]="";
$elem["bacula/mismatch"]["descriptionfr"]="";
$elem["bacula/mismatch"]["default"]="";
$elem["bacula/dbu_name"]["type"]="string";
$elem["bacula/dbu_name"]["description"]="Database owner username:
 Please enter the username of the Bacula database owner.

";
$elem["bacula/dbu_name"]["descriptionde"]="";
$elem["bacula/dbu_name"]["descriptionfr"]="";
$elem["bacula/dbu_name"]["default"]="bacula";
$elem["bacula/dbu_password"]["type"]="password";
$elem["bacula/dbu_password"]["description"]="Database owner password:
 Please enter the password of the Bacula database owner.

";
$elem["bacula/dbu_password"]["descriptionde"]="";
$elem["bacula/dbu_password"]["descriptionfr"]="";
$elem["bacula/dbu_password"]["default"]="";
$elem["bacula/dbu_confirm"]["type"]="password";
$elem["bacula/dbu_confirm"]["description"]="Database user password confirmation:
 Please confirm the password of the Bacula database owner.

";
$elem["bacula/dbu_confirm"]["descriptionde"]="";
$elem["bacula/dbu_confirm"]["descriptionfr"]="";
$elem["bacula/dbu_confirm"]["default"]="";
$elem["bacula/notconfigured"]["type"]="note";
$elem["bacula/notconfigured"]["description"]="Warning - Bacula is not configured
 Please note that you have not completed the Bacula configuration. For
 completing it, please use \"dpkg-reconfigure bacula-director-mysql\" later.

";
$elem["bacula/notconfigured"]["descriptionde"]="";
$elem["bacula/notconfigured"]["descriptionfr"]="";
$elem["bacula/notconfigured"]["default"]="";
PKG_OptionPageTail2($elem);
?>
