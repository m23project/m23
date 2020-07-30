<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("macchanger");

$elem["macchanger/automatically_run"]["type"]="boolean";
$elem["macchanger/automatically_run"]["description"]="Change MAC automatically?
 Please specify whether macchanger should be set up to run automatically
 every time a network device is brought up or down. This gives a new MAC
 address whenever you attach an ethernet cable or reenable wifi.
";
$elem["macchanger/automatically_run"]["descriptionde"]="MAC automatisch ändern?
 Bitte geben Sie an, ob Macchanger so eingerichtet werden soll, dass es automatisch ausgeführt wird, wanimmer ein Netzgerät aktiviert oder deaktiviert wird. Damit wird für eine neue MAC-Adresse gesorgt, wanimmer Sie sich mit einem Ethernet-Kabel verbinden oder Wifi reaktivieren.
";
$elem["macchanger/automatically_run"]["descriptionfr"]="Faut-il changer l'adresse MAC automatiquement ?
 Veuillez choisir si macchanger doit être paramétré pour être lancé automatiquement chaque fois qu'un périphérique réseau est mis en ligne ou hors ligne. Cela a pour effet d'attribuer une nouvelle adresse MAC dès que vous branchez un câble Ethernet ou que vous réactivez le réseau sans fil.
";
$elem["macchanger/automatically_run"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
