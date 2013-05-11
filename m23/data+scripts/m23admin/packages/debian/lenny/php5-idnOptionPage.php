<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("php5-idn");

$elem["php5/add_extension"]["type"]="boolean";
$elem["php5/add_extension"]["description"]="Do you want this extension to be enabled now?
";
$elem["php5/add_extension"]["descriptionde"]="Soll diese Erweiterung jetzt aktiviert werden?
";
$elem["php5/add_extension"]["descriptionfr"]="Souhaitez-vous activer cette extension maintenant ?
";
$elem["php5/add_extension"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
