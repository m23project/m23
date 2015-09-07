<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fprobe");

$elem["fprobe/interface"]["type"]="string";
$elem["fprobe/interface"]["description"]="Interface to capture:
 fprobe will listen on this interface and send the traffic to the collector.
";
$elem["fprobe/interface"]["descriptionde"]="Zu beobachtende Schnittstelle:
 Fprobe wird auf dieser Schnittstelle lauschen und den Verkehr an den Sammler senden.
";
$elem["fprobe/interface"]["descriptionfr"]="Interface de capture :
 Veuillez indiquer l'interface où fprobe sera à l'écoute et transférera le trafic à un récupérateur externe.
";
$elem["fprobe/interface"]["default"]="eth0";
$elem["fprobe/collector"]["type"]="string";
$elem["fprobe/collector"]["description"]="Collector address:
 Please enter the collector's IP address and port number, separated by a colon.
";
$elem["fprobe/collector"]["descriptionde"]="Sammler-Adresse:
 Bitte geben Sie die IP-Adresse und Portnummer des Sammlers ein, getrennt durch einen Doppelpunkt.
";
$elem["fprobe/collector"]["descriptionfr"]="Adresse du récupérateur externe :
 Veuillez indiquer l'adresse IP du récupérateur externe et le numéro de port où il est à l'écoute, séparés par deux-points.
";
$elem["fprobe/collector"]["default"]="localhost:555";
PKG_OptionPageTail2($elem);
?>
