<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spong-server");

$elem["spong-server/init"]["type"]="note";
$elem["spong-server/init"]["description"]="Please take a look at /etc/default/spong-server
 An init script for starting spong-server, but by default nothing is
 started.
 .
 Firstly modify /etc/spong according to your needs, and change the
 run_spong variable in /etc/default/spong-server if you wish it to start on
 bootup.
";
$elem["spong-server/init"]["descriptionde"]="Bitte schauen Sie sich die Datei /etc/default/spong-server an
 Ein Init-Skript zum Starten des Spong-Servers, aber standardmäßig wird nichts gestartet.
 .
 Als erstes modifizieren Sie /etc/spong nach Ihren Bedürfnissen und verändern die run_spong-Variable in /etc/default/spong-server, sofern Sie möchten, das der Spong-Server beim Hochfahren automatisch gestartet wird.
";
$elem["spong-server/init"]["descriptionfr"]="Fichier /etc/default/spong-server à contrôler
 Un script de démarrage pour spong-server a été installé, mais il n'est pas utilisé pour l'instant.
 .
 Veuillez d'abord adapter /etc/spong à vos besoins, puis modifier la variable run_spong dans /etc/default/spong-server si vous souhaitez lancer le serveur au démarrage.
";
$elem["spong-server/init"]["default"]="";
PKG_OptionPageTail2($elem);
?>
