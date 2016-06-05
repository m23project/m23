<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-mysql");

$elem["pam-mysql/config_file_noread"]["type"]="boolean";
$elem["pam-mysql/config_file_noread"]["description"]="Chmod configuration file?
 This version of pam-mysql has a configuration file which may include
 passwords. Do you want to disable normal users from reading this
 file? 
 .
 There is probably no good reason *not* to do this. As the most common
 reason to use the configuration file is to hide the password.
";
$elem["pam-mysql/config_file_noread"]["descriptionde"]="";
$elem["pam-mysql/config_file_noread"]["descriptionfr"]="";
$elem["pam-mysql/config_file_noread"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
