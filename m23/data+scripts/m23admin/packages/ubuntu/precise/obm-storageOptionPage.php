<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("obm-storage");

$elem["obm-storage/login_admin_global"]["type"]="string";
$elem["obm-storage/login_admin_global"]["description"]="";
$elem["obm-storage/login_admin_global"]["descriptionde"]="";
$elem["obm-storage/login_admin_global"]["descriptionfr"]="";
$elem["obm-storage/login_admin_global"]["default"]="";
$elem["obm-storage/pass_admin_global"]["type"]="password";
$elem["obm-storage/pass_admin_global"]["description"]="";
$elem["obm-storage/pass_admin_global"]["descriptionde"]="";
$elem["obm-storage/pass_admin_global"]["descriptionfr"]="";
$elem["obm-storage/pass_admin_global"]["default"]="";
PKG_OptionPageTail2($elem);
?>
