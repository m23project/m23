<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("scuttle");

$elem["scuttle/locale"]["type"]="select";
$elem["scuttle/locale"]["description"]="Preferred locale:
 Select the locale that you desire to use with scuttle.
";
$elem["scuttle/locale"]["descriptionde"]="Bevorzugte Standorteinstellung:
 WÃ€hlen Sie Standorteinstellung (Â»localeÂ«), die Sie mit Scuttle verwenden mÃ¶chten.
";
$elem["scuttle/locale"]["descriptionfr"]="Paramètres régionaux :
 Veuillez choisir les paramètres régionaux (« locale ») à utiliser avec scuttle.
";
$elem["scuttle/locale"]["default"]="en_GB";
$elem["scuttle/webserver"]["type"]="boolean";
$elem["scuttle/webserver"]["description"]="Do you want to configure apache2?
";
$elem["scuttle/webserver"]["descriptionde"]="MÃ¶chten Sie Apache2 konfigurieren?
";
$elem["scuttle/webserver"]["descriptionfr"]="Voulez-vous configurer Apache 2 ?
";
$elem["scuttle/webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
