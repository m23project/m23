<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-db-postgresql");

$elem["fusionforge/shared/admin_password"]["type"]="password";
$elem["fusionforge/shared/admin_password"]["description"]="FusionForge administrator password:
 The FusionForge administrator account will have full privileges on the
 forge. It will be used to approve the creation of new projects.
 .
 Please choose the password for this forge account.

";
$elem["fusionforge/shared/admin_password"]["descriptionde"]="";
$elem["fusionforge/shared/admin_password"]["descriptionfr"]="";
$elem["fusionforge/shared/admin_password"]["default"]="";
$elem["fusionforge/shared/admin_password_confirm"]["type"]="password";
$elem["fusionforge/shared/admin_password_confirm"]["description"]="Password confirmation:
 Please re-type the password for confirmation.

";
$elem["fusionforge/shared/admin_password_confirm"]["descriptionde"]="";
$elem["fusionforge/shared/admin_password_confirm"]["descriptionfr"]="";
$elem["fusionforge/shared/admin_password_confirm"]["default"]="";
$elem["fusionforge/ucfchangeprompt"]["type"]="select";
$elem["fusionforge/ucfchangeprompt"]["choices"][1]="install the new version configured by fusionforge";
$elem["fusionforge/ucfchangeprompt"]["choices"][2]="keep the local version currently installed";
$elem["fusionforge/ucfchangeprompt"]["choices"][3]="show the differences between the versions";
$elem["fusionforge/ucfchangeprompt"]["choices"][4]="show a side-by-side difference between the versions";
$elem["fusionforge/ucfchangeprompt"]["description"]="What do you want to do about configuration file ${BASENAME}?
 The configuration file ${FILE} needs to be modified by fusionforge,
 whereas it is also a configuration file of the postgresql package.
";
$elem["fusionforge/ucfchangeprompt"]["descriptionde"]="";
$elem["fusionforge/ucfchangeprompt"]["descriptionfr"]="";
$elem["fusionforge/ucfchangeprompt"]["default"]="install_new";
PKG_OptionPageTail2($elem);
?>
