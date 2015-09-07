<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-cacher");

$elem["apt-cacher/mode"]["type"]="select";
$elem["apt-cacher/mode"]["choices"][1]="daemon";
$elem["apt-cacher/mode"]["choices"][2]="inetd";
$elem["apt-cacher/mode"]["choicesde"][1]="Daemon";
$elem["apt-cacher/mode"]["choicesde"][2]="inetd";
$elem["apt-cacher/mode"]["choicesfr"][1]="démon";
$elem["apt-cacher/mode"]["choicesfr"][2]="inetd";
$elem["apt-cacher/mode"]["description"]="Daemon mode for apt-cacher:
 Please select the method for starting the apt-cacher daemon.
 .
 Choose \"daemon\" to run as a stand-alone daemon, \"inetd\" to run under inetd or
 \"manual\" to use the (deprecated) CGI mode or some other manual configuration.
";
$elem["apt-cacher/mode"]["descriptionde"]="Daemonmodus für apt-cacher:
 Bitte wählen Sie die Methode zum Starten des apt-cacher-Daemons.
 .
 Wählen Sie »Daemon«, damit er als selbstständiger Daemon läuft, »inetd«, damit er unter inetd läuft oder »manuell«, um den (veralteten) CGI-Modus oder eine andere eigenhändige Konfiguration zu verwenden.
";
$elem["apt-cacher/mode"]["descriptionfr"]="Mode de lancement du démon apt-cacher :
 Veuillez choisir la méthode de démarrage du démon apt-cacher.
 .
 Vous pouvez choisir « démon » pour l'exécuter en tant que démon indépendant, « inetd » pour une exécution sous le contrôle d'inetd, ou encore « manuel » pour utiliser le mode CGI (obsolète) ou toute autre configuration manuelle.
";
$elem["apt-cacher/mode"]["default"]="daemon";
PKG_OptionPageTail2($elem);
?>
