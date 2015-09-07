<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythtv-common");

$elem["mythtv/mysql_mythtv_dbname"]["type"]="string";
$elem["mythtv/mysql_mythtv_dbname"]["description"]="Database to be used to hold MythTV data:
 If a database with this name already exists, it will be used.

";
$elem["mythtv/mysql_mythtv_dbname"]["descriptionde"]="";
$elem["mythtv/mysql_mythtv_dbname"]["descriptionfr"]="";
$elem["mythtv/mysql_mythtv_dbname"]["default"]="mythconverg";
$elem["mythtv/mysql_mythtv_user"]["type"]="string";
$elem["mythtv/mysql_mythtv_user"]["description"]="Username used by MythTV to access its database:
 This user will automatically be granted appropriate permissions to the
 database.

";
$elem["mythtv/mysql_mythtv_user"]["descriptionde"]="";
$elem["mythtv/mysql_mythtv_user"]["descriptionfr"]="";
$elem["mythtv/mysql_mythtv_user"]["default"]="mythtv";
$elem["mythtv/mysql_mythtv_password"]["type"]="password";
$elem["mythtv/mysql_mythtv_password"]["description"]="Password used by MythTV to access its database:
 If you give an empty password, a random one will be generated.

";
$elem["mythtv/mysql_mythtv_password"]["descriptionde"]="";
$elem["mythtv/mysql_mythtv_password"]["descriptionfr"]="";
$elem["mythtv/mysql_mythtv_password"]["default"]="";
$elem["mythtv/mysql_host"]["type"]="string";
$elem["mythtv/mysql_host"]["description"]="Host MySQL server resides in:
";
$elem["mythtv/mysql_host"]["descriptionde"]="";
$elem["mythtv/mysql_host"]["descriptionfr"]="";
$elem["mythtv/mysql_host"]["default"]="localhost";
PKG_OptionPageTail2($elem);
?>
