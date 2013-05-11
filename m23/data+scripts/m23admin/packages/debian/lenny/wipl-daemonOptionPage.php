<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wipl-daemon");

$elem["wipl-daemon/run-or-not"]["type"]="boolean";
$elem["wipl-daemon/run-or-not"]["description"]="Do you want wipld to be run at startup?
 Wipld is a small daemon able to mantain a number of counters for each
 workstation it sees on the network. Its main usage is for network
 statistics or traffic shaping.
 .
 Refuse here if you want to manually start wipld when you want to keep
 statistics. Accept here if you want wipld to be loaded at system startup.
";
$elem["wipl-daemon/run-or-not"]["descriptionde"]="Soll wipld beim Systemstart aktiviert werden?
 Wipld ist ein kleiner Dämon, der eine Anzahl von Zählern für jeden Rechner verwalten kann, den er im Netzwerk sieht. Sein Hauptzweck ist Netzstatistik oder Durchsatzbegrenzung.
 .
 Verneinen Sie hier, falls Sie wipld manuell starten wollen, um Statistiken zu sammeln. Bejahen Sie hier, falls wipld beim Systemstart aktiviert werden soll.
";
$elem["wipl-daemon/run-or-not"]["descriptionfr"]="Souhaitez-vous que wipl soit lancé au démarrage ?
 Wipl est un petit démon capable de prendre en charge un certain nombre de compteurs pour chaque poste de travail qu'il voit sur le réseau. Il sert principalement à collecter des statistiques réseau ou à l'optimisation du trafic.
 .
 Refusez ici si vous souhaitez démarrer vous-même wipl lorsque vous désirez conserver des statistiques. Acceptez si vous souhaitez que wipl soit chargé au démarrage du système.
";
$elem["wipl-daemon/run-or-not"]["default"]="false";
$elem["wipl-daemon/interface"]["type"]="string";
$elem["wipl-daemon/interface"]["description"]="On which interface do you want wipld to listen on?
 You must specify one interface where wipld will listen on to keep
 statistics. Depending on your libpcap version, you may also specify 'any'
 to make wipld listen on _all_ interfaces.
";
$elem["wipl-daemon/interface"]["descriptionde"]="Welche Schnittstelle soll wipld verwenden?
 Sie müssen eine Schnittstelle angeben, die von wipld zum Sammeln von Statistiken benutzt wird. Abhängig von Ihrer libpcap-Version können Sie eventuell. auch »jede« angeben, damit wipld alle Schnittstellen benutzt.
";
$elem["wipl-daemon/interface"]["descriptionfr"]="Sur quelle interface souhaitez-vous que wipl écoute ?
 Vous devez indiquer une interface sur laquelle wipl écoutera pour collecter les statistiques. Selon votre version de libpcap, vous pourriez également indiquer « any » afin que wilp écoute sur toutes les interfaces.
";
$elem["wipl-daemon/interface"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
