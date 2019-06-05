<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sse3-support");

$elem["sse3-support/fail"]["type"]="note";
$elem["sse3-support/fail"]["description"]="Support for sse3 required
 Alas, your machine doesn't support the sse3 instruction set.  It is
 needed by software that depends on this dummy package.  Sorry.
 .
 Aborting installation.
";
$elem["sse3-support/fail"]["descriptionde"]="Unterstützung für sse3 erforderlich
 Leider unterstützt Ihre Maschine nicht den Befehlssatz sse3. Er wird von Software benötigt, die von diesem Pseudopaket abhängt. Entschuldigung.
 .
 Die Installation wird abgebrochen.
";
$elem["sse3-support/fail"]["descriptionfr"]="La prise en charge de sse3 est requise
 Malheureusement, votre machine ne gère pas le jeu d'instructions sse3.Il est nécessaire au logiciel qui dépend de ce paquet factice.
 .
 Installation interrompue.
";
$elem["sse3-support/fail"]["default"]="";
PKG_OptionPageTail2($elem);
?>
