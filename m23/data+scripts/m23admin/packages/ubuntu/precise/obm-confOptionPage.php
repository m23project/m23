<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("obm-conf");

$elem["obm-conf/mysqlserver"]["type"]="string";
$elem["obm-conf/mysqlserver"]["description"]="";
$elem["obm-conf/mysqlserver"]["descriptionde"]="";
$elem["obm-conf/mysqlserver"]["descriptionfr"]="";
$elem["obm-conf/mysqlserver"]["default"]="";
$elem["obm-conf/mysqldb"]["type"]="string";
$elem["obm-conf/mysqldb"]["description"]="";
$elem["obm-conf/mysqldb"]["descriptionde"]="";
$elem["obm-conf/mysqldb"]["descriptionfr"]="";
$elem["obm-conf/mysqldb"]["default"]="";
$elem["obm-conf/mysqluser"]["type"]="string";
$elem["obm-conf/mysqluser"]["description"]="";
$elem["obm-conf/mysqluser"]["descriptionde"]="";
$elem["obm-conf/mysqluser"]["descriptionfr"]="";
$elem["obm-conf/mysqluser"]["default"]="";
$elem["obm-conf/mysqlpasswd"]["type"]="password";
$elem["obm-conf/mysqlpasswd"]["description"]="";
$elem["obm-conf/mysqlpasswd"]["descriptionde"]="";
$elem["obm-conf/mysqlpasswd"]["descriptionfr"]="";
$elem["obm-conf/mysqlpasswd"]["default"]="";
$elem["obm-conf/externalurl"]["type"]="string";
$elem["obm-conf/externalurl"]["description"]="";
$elem["obm-conf/externalurl"]["descriptionde"]="";
$elem["obm-conf/externalurl"]["descriptionfr"]="";
$elem["obm-conf/externalurl"]["default"]="";
PKG_OptionPageTail2($elem);
?>
