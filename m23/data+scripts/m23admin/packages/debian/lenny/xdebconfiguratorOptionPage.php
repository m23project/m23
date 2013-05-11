<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xdebconfigurator");

$elem["xdebconfigurator/generate-at-boot"]["type"]="boolean";
$elem["xdebconfigurator/generate-at-boot"]["description"]="Generate new XFree86 config file at boot time?
 Enable this to get an automatically generated XFree86 configuration
 file at boot time.
 .
 This template should not be translated.  It is a hidden debconf
 question available for preseeding, and it is never displayed.

";
$elem["xdebconfigurator/generate-at-boot"]["descriptionde"]="";
$elem["xdebconfigurator/generate-at-boot"]["descriptionfr"]="";
$elem["xdebconfigurator/generate-at-boot"]["default"]="false";
$elem["base-config/menu/xdebconfigurator"]["type"]="text";
$elem["base-config/menu/xdebconfigurator"]["description"]="Generate XFree86 configuration automatically
";
$elem["base-config/menu/xdebconfigurator"]["descriptionde"]="XFree86-Konfiguration automatisch erstellen
";
$elem["base-config/menu/xdebconfigurator"]["descriptionfr"]="Configuration automatique de XFree86
";
$elem["base-config/menu/xdebconfigurator"]["default"]="";
PKG_OptionPageTail2($elem);
?>
