<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-common");

$elem["fusionforge/shared/domain_name"]["type"]="string";
$elem["fusionforge/shared/domain_name"]["description"]="FusionForge domain or subdomain name:
 Please enter the domain that will host the FusionForge installation. Some
 services (scm, lists, etc.) will be given their own subdomain in that
 domain.

";
$elem["fusionforge/shared/domain_name"]["descriptionde"]="";
$elem["fusionforge/shared/domain_name"]["descriptionfr"]="";
$elem["fusionforge/shared/domain_name"]["default"]="";
$elem["fusionforge/shared/server_admin"]["type"]="string";
$elem["fusionforge/shared/server_admin"]["description"]="FusionForge administrator e-mail address:
 Please enter the e-mail address of the FusionForge administrator of this site. It
 will be used when problems occur.

";
$elem["fusionforge/shared/server_admin"]["descriptionde"]="";
$elem["fusionforge/shared/server_admin"]["descriptionfr"]="";
$elem["fusionforge/shared/server_admin"]["default"]="";
$elem["fusionforge/shared/system_name"]["type"]="string";
$elem["fusionforge/shared/system_name"]["description"]="FusionForge system name:
 Please enter the name of the FusionForge system. It is used in various places
 throughout the system.

";
$elem["fusionforge/shared/system_name"]["descriptionde"]="";
$elem["fusionforge/shared/system_name"]["descriptionfr"]="";
$elem["fusionforge/shared/system_name"]["default"]="FusionForge";
PKG_OptionPageTail2($elem);
?>
