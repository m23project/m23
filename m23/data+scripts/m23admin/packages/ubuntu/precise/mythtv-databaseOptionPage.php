<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythtv-database");

$elem["mythtv/mysql_admin_user"]["type"]="string";
$elem["mythtv/mysql_admin_user"]["description"]="MySQL administrator account:
 This information will be used to create a database and user for MythTV.
 .
 Unless you have explicitly changed this on the MySQL server, and
 understand MySQL's privilege system, use the default of 'root'.

";
$elem["mythtv/mysql_admin_user"]["descriptionde"]="";
$elem["mythtv/mysql_admin_user"]["descriptionfr"]="";
$elem["mythtv/mysql_admin_user"]["default"]="root";
$elem["mythtv/mysql_admin_password"]["type"]="password";
$elem["mythtv/mysql_admin_password"]["description"]="Password for the MySQL administrator account '${user}':
 This information will be used to create a database and user for MythTV.
 .
 Unless you have explicitly changed the password on the MySQL server, leave
 this blank.

";
$elem["mythtv/mysql_admin_password"]["descriptionde"]="";
$elem["mythtv/mysql_admin_password"]["descriptionfr"]="";
$elem["mythtv/mysql_admin_password"]["default"]="";
$elem["mythtv/public_bind"]["type"]="boolean";
$elem["mythtv/public_bind"]["description"]="Will other computers run MythTV?
 If any other computers (that includes other Front End machines) with MythTV
 will be used, this computer needs to be configured to allow remote connections.
 .
 Note that this is a security risk, as both the MythTV and MySQL services
 will be exposed. Be sure to place this machine behind a firewall.
 .
 If multiple interfaces are used, the first one listed in 'ifconfig' will be
 used.

";
$elem["mythtv/public_bind"]["descriptionde"]="";
$elem["mythtv/public_bind"]["descriptionfr"]="";
$elem["mythtv/public_bind"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
