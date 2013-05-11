<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("epos");

$elem["epos/start_automatically"]["type"]="boolean";
$elem["epos/start_automatically"]["description"]="Should the epos speech daemon be started automatically?
 The epos sound daemon can be started automatically during boot.  However
 its run means your audio device is blocked for other use.  So you can
 decide whether epos should do this or whether you prefer to start it
 manually.
";
$elem["epos/start_automatically"]["descriptionde"]="Soll der Epos-Sprach-Daemon automatisch gestartet werden?
 Der Epos-Sound-Daemon kann während des Systemstarts automatisch gestartet werden. Das bedeutet jedoch, dass Ihr Audio-Gerät für eine andere Benutzung blockiert ist. Sie können sich entscheiden, ob Epos automatisch gestartet werden soll oder ob Sie ihn lieber manuell starten möchten.
";
$elem["epos/start_automatically"]["descriptionfr"]="Faut-il démarrer automatiquement le démon de synthèse vocale epos ?
 Le démon epos peut être démarré automatiquement au démarrage de l'ordinateur. Cependant, cela rendra votre carte son indisponible pour d'autres utilisations.
";
$elem["epos/start_automatically"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
