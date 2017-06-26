<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kdesudo");

$elem["kdesudo/kdesu"]["type"]="boolean";
$elem["kdesudo/kdesu"]["description"]="Use KdeSudo in place of KdeSu?
 KdeSudo is a drop-in replacement for KdeSu.
 .
 Please choose whether KdeSudo should be the default front-end for
 gaining elevated privileges under KDE.
";
$elem["kdesudo/kdesu"]["descriptionde"]="Verwende KdeSudo anstelle von KdeSu?
 KdeSudo kann KdeSu direkt ersetzen.
 .
 Bitte wählen Sie aus, ob KdeSudo die standardmäßige Oberfläche sein soll, um unter KDE erhöhte Privilegien zu erhalten.
";
$elem["kdesudo/kdesu"]["descriptionfr"]="Faut-il utiliser KdeSudo à la place de KdeSu ?
 KdeSudo est entièrement compatible avec KdeSu.
 .
 Veuillez choisir s'il doit être utilisé par défaut comme interface permettant d'obtenir des privilèges plus importants sous KDE.
";
$elem["kdesudo/kdesu"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
