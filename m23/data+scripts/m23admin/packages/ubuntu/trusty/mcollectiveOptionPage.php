<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mcollective");

$elem["mcollective/start_on_boot"]["type"]="boolean";
$elem["mcollective/start_on_boot"]["description"]="Start MCollective on boot?
 Please choose whether the MCollective daemon should be started when
 booting this machine.
";
$elem["mcollective/start_on_boot"]["descriptionde"]="MCollective beim Hochfahren des Rechners starten?
 Bitte wählen Sie aus, ob der MCollective-Daemon gestartet werden soll, wenn diese Maschine hochgefahren wird.
";
$elem["mcollective/start_on_boot"]["descriptionfr"]="Faut-il lancer automatiquement MCollective au démarrage ?
 Veuillez choisir si le démon MCollective doit être lancé au démarrage de la machine.
";
$elem["mcollective/start_on_boot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
