<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("localization-config");

$elem["base-config/menu/localization-config-preinst"]["type"]="text";
$elem["base-config/menu/localization-config-preinst"]["description"]="Preconfigure language-related parameters
";
$elem["base-config/menu/localization-config-preinst"]["descriptionde"]="Vorkonfigurieren der sprachbezogenen Einstellungen
";
$elem["base-config/menu/localization-config-preinst"]["descriptionfr"]="Préparer les paramètres dépendant de la langue
";
$elem["base-config/menu/localization-config-preinst"]["default"]="";
$elem["base-config/menu/localization-config-postinst"]["type"]="text";
$elem["base-config/menu/localization-config-postinst"]["description"]="Postconfigure language-related parameters
";
$elem["base-config/menu/localization-config-postinst"]["descriptionde"]="Nachkonfigurieren der sprachbezogenen Einstellungen
";
$elem["base-config/menu/localization-config-postinst"]["descriptionfr"]="Installer les paramètres dépendant de la langue
";
$elem["base-config/menu/localization-config-postinst"]["default"]="";
PKG_OptionPageTail2($elem);
?>
