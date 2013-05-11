<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fprobe-ulog");

$elem["fprobe-ulog/interface"]["type"]="string";
$elem["fprobe-ulog/interface"]["description"]="Interface(s) to capture:
 Each interface must be associated to a SNMP Index and they are separated by a colon.
 Please enter a list of interfaces and their corresponding SNMP indexes (for 
 example eth0:100,ppp0:200).
";
$elem["fprobe-ulog/interface"]["descriptionde"]="Zu beobachtende Schnittstelle(n):
 Jeder Schnittstelle muss ein SNMP-Index zugeordnet sein und sie werden durch einen Doppelpunkt getrennt. Bitte geben Sie eine Liste von Schnittstellen und ihrer entsprechenden SNMP-Indices ein, beispielsweise eth0:100,ppp0:200.
";
$elem["fprobe-ulog/interface"]["descriptionfr"]="Interface(s) de capture :
 Veuillez indiquer une liste d'interfaces et leur index SNMP correspondant (par exemple eth0:100,ppp0:200). Chaque interface doit être associée à un index SNMP et elles doivent être séparées par deux-points.
";
$elem["fprobe-ulog/interface"]["default"]="eth0:100,ppp0:200";
$elem["fprobe-ulog/collector"]["type"]="string";
$elem["fprobe-ulog/collector"]["description"]="Collector address:
 Please enter the collector's IP address and port number, separated by a colon.
";
$elem["fprobe-ulog/collector"]["descriptionde"]="Sammler-Adresse:
 Bitte geben Sie die IP-Adresse und Portnummer des Sammlers ein, getrennt durch einen Doppelpunkt.
";
$elem["fprobe-ulog/collector"]["descriptionfr"]="Adresse du récupérateur externe :
 Veuillez indiquer l'adresse IP du récupérateur externe et le numéro de port où il est à l'écoute, séparés par deux-points.
";
$elem["fprobe-ulog/collector"]["default"]="localhost:555";
PKG_OptionPageTail2($elem);
?>
