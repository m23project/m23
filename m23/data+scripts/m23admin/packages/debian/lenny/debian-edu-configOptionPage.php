<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debian-edu-config");

$elem["debian-edu-config/update-hostname"]["type"]="boolean";
$elem["debian-edu-config/update-hostname"]["description"]="Should the init.d/update-hostname script run at boot time?
";
$elem["debian-edu-config/update-hostname"]["descriptionde"]="Soll das init.d/update-hostname-Skript beim Systemstart laufen?
";
$elem["debian-edu-config/update-hostname"]["descriptionfr"]="Faut-il exécuter le script « init.d/update-hostname » au démarrage ?
";
$elem["debian-edu-config/update-hostname"]["default"]="false";
$elem["debian-edu-config/enable-nat"]["type"]="boolean";
$elem["debian-edu-config/enable-nat"]["description"]="Do you want to run enable-nat on your system?
 The enable-nat script activates NAT for your Thin-Clients and overwrites
 your iptables rules.
";
$elem["debian-edu-config/enable-nat"]["descriptionde"]="Möchten Sie enable-nat auf Ihrem System laufen lassen?
 Das enable-nat-Skript aktiviert NAT auf Ihren Thin-Clients und überschreibt Ihre Iptables-Regeln.
";
$elem["debian-edu-config/enable-nat"]["descriptionfr"]="Faut-il exécuter le script « enable-nat » sur le système ?
 Le script « enable-nat » active la traduction d'adresses (« NAT ») pour les clients légers et remplace les règles iptables.
";
$elem["debian-edu-config/enable-nat"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
