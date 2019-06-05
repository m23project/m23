<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythexport");

$elem["mythexport/warn"]["type"]="note";
$elem["mythexport/warn"]["description"]="Additional install directions
 MythExport can now be completely setup via the web interface,
 just browse to http://localhost/mythexport
 .
 For more information please visit:
 .
 https://help.ubuntu.com/community/MythExport

";
$elem["mythexport/warn"]["descriptionde"]="";
$elem["mythexport/warn"]["descriptionfr"]="";
$elem["mythexport/warn"]["default"]="";
$elem["mythexport/dir"]["type"]="string";
$elem["mythexport/dir"]["description"]="Export Recordings to:
 This is where you are currently, or plan to, export your
 recordings to.

";
$elem["mythexport/dir"]["descriptionde"]="";
$elem["mythexport/dir"]["descriptionfr"]="";
$elem["mythexport/dir"]["default"]="/var/lib/mythtv/mythexport/";
$elem["mythexport/user"]["type"]="string";
$elem["mythexport/user"]["description"]="Description:MySQL Admin Account:
 This information will be used to create a database and user for MythTV.
 .
 Unless you have explicitly changed this on the MySQL server, and
 understand MySQL's privilege system, use the default of 'mythtv' or 'root'.

";
$elem["mythexport/user"]["descriptionde"]="";
$elem["mythexport/user"]["descriptionfr"]="";
$elem["mythexport/user"]["default"]="mythtv ";
$elem["mythexport/password"]["type"]="password";
$elem["mythexport/password"]["description"]="Description:MySQL Admin Password:
 This information will be used to create a database and user for MythTV.

";
$elem["mythexport/password"]["descriptionde"]="";
$elem["mythexport/password"]["descriptionfr"]="";
$elem["mythexport/password"]["default"]="";
$elem["mythexport/host"]["type"]="string";
$elem["mythexport/host"]["description"]="MySQL Server Location:
 On what host does the MySQL server reside:

";
$elem["mythexport/host"]["descriptionde"]="";
$elem["mythexport/host"]["descriptionfr"]="";
$elem["mythexport/host"]["default"]="localhost";
$elem["mythexport/dbname"]["type"]="string";
$elem["mythexport/dbname"]["description"]="Database which holds MythTV data:
 Which database holds MythTV data:

";
$elem["mythexport/dbname"]["descriptionde"]="";
$elem["mythexport/dbname"]["descriptionfr"]="";
$elem["mythexport/dbname"]["default"]="mythconverg";
$elem["mythexport/configs"]["type"]="note";
$elem["mythexport/configs"]["description"]="Changes in configuration files  
 MythExport's configuration files have changed,
 For more information please visit:
 .
 https://help.ubuntu.com/community/MythExport

";
$elem["mythexport/configs"]["descriptionde"]="";
$elem["mythexport/configs"]["descriptionfr"]="";
$elem["mythexport/configs"]["default"]="";
$elem["mythexport/mysql_error"]["type"]="note";
$elem["mythexport/mysql_error"]["description"]="Failed to create or modify database (incorrect MySQL username/password?)
 Verify /etc/mythtv/mysql.txt then try:
 .
 sudo dpkg-reconfigure mythexport
";
$elem["mythexport/mysql_error"]["descriptionde"]="";
$elem["mythexport/mysql_error"]["descriptionfr"]="";
$elem["mythexport/mysql_error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
