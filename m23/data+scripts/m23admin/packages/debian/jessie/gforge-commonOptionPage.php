<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gforge-common");

$elem["fusionforge/shared/web_host"]["type"]="string";
$elem["fusionforge/shared/web_host"]["description"]="FusionForge domain or subdomain name:
 Please enter the domain that will host the FusionForge installation. Some
 services (scm, lists, etc.) will be given their own subdomain in that
 domain.

";
$elem["fusionforge/shared/web_host"]["descriptionde"]="";
$elem["fusionforge/shared/web_host"]["descriptionfr"]="";
$elem["fusionforge/shared/web_host"]["default"]="";
$elem["fusionforge/shared/forge_name"]["type"]="string";
$elem["fusionforge/shared/forge_name"]["description"]="FusionForge system name:
 Please enter the name of the FusionForge system. It is used in various places
 throughout the system.
";
$elem["fusionforge/shared/forge_name"]["descriptionde"]="";
$elem["fusionforge/shared/forge_name"]["descriptionfr"]="";
$elem["fusionforge/shared/forge_name"]["default"]="FusionForge";
PKG_OptionPageTail2($elem);
?>
