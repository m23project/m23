<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("evqueue-core");

$elem["evqueue-core/hostname"]["type"]="string";
$elem["evqueue-core/hostname"]["description"]="MySQL hostname:
 Hostame of the MySQL server that will contain evQueue database.

";
$elem["evqueue-core/hostname"]["descriptionde"]="";
$elem["evqueue-core/hostname"]["descriptionfr"]="";
$elem["evqueue-core/hostname"]["default"]="";
$elem["evqueue-core/user"]["type"]="string";
$elem["evqueue-core/user"]["description"]="MySQL user:
 User used to connect to MySQL server.

";
$elem["evqueue-core/user"]["descriptionde"]="";
$elem["evqueue-core/user"]["descriptionfr"]="";
$elem["evqueue-core/user"]["default"]="";
$elem["evqueue-core/password"]["type"]="string";
$elem["evqueue-core/password"]["description"]="MySQL password:
 User used to connect to MySQL server.

";
$elem["evqueue-core/password"]["descriptionde"]="";
$elem["evqueue-core/password"]["descriptionfr"]="";
$elem["evqueue-core/password"]["default"]="";
$elem["evqueue-core/database"]["type"]="string";
$elem["evqueue-core/database"]["description"]="MySQL database name:
 Name of the evQueue database.
";
$elem["evqueue-core/database"]["descriptionde"]="";
$elem["evqueue-core/database"]["descriptionfr"]="";
$elem["evqueue-core/database"]["default"]="";
PKG_OptionPageTail2($elem);
?>
