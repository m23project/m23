<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-base");

$elem["clamav-base/numinfo"]["type"]="error";
$elem["clamav-base/numinfo"]["description"]="Mandatory numeric value
 This question requires a numeric answer.
";
$elem["clamav-base/numinfo"]["descriptionde"]="Zwingend numerischer Wert
 Diese Frage erfordert eine numerische Antwort.
";
$elem["clamav-base/numinfo"]["descriptionfr"]="Valeur numérique obligatoire
 La valeur de ce réglage doit être numérique.
";
$elem["clamav-base/numinfo"]["default"]="";
PKG_OptionPageTail2($elem);
?>
