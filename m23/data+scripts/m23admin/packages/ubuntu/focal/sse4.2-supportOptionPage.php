<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sse4.2-support");

$elem["sse4.2-support/fail"]["type"]="note";
$elem["sse4.2-support/fail"]["description"]="Support for sse4.2 required
 Alas, your machine doesn't support the sse4.2 instruction set.  It is
 needed by software that depends on this dummy package.  Sorry.
 .
 Aborting installation.
";
$elem["sse4.2-support/fail"]["descriptionde"]="Unterstützung für sse4.2 erforderlich
 Leider unterstützt Ihre Maschine nicht den Befehlssatz sse4.2. Er wird von Software benötigt, die von diesem Pseudopaket abhängt. Entschuldigung.
 .
 Die Installation wird abgebrochen.
";
$elem["sse4.2-support/fail"]["descriptionfr"]="La prise en charge de sse4.2 est requise
 Malheureusement, votre machine ne gère pas le jeu d'instructions sse4.2.Il est nécessaire au logiciel qui dépend de ce paquet factice.
 .
 Installation interrompue.
";
$elem["sse4.2-support/fail"]["default"]="";
PKG_OptionPageTail2($elem);
?>
