<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("w3c-linkchecker");

$elem["w3c-linkchecker/hostname"]["type"]="string";
$elem["w3c-linkchecker/hostname"]["description"]="Host name for W3C LinkChecker service:
 Please specify the fully qualified domain name that the w3c-linkchecker
 service should be remotely accessible on, if any. By default it will only be
 available on localhost.
";
$elem["w3c-linkchecker/hostname"]["descriptionde"]="Rechnername für den W3C-Linkchecker-Dienst:
 Bitte geben Sie einen vollqualifizierten Domain-Namen an, über den auf den W3C-Linkchecker-Dienst aus der Ferne zugegriffen werden soll, wenn vorhanden. Standardmäßig wird er nur auf dem lokalen Rechner verfügbar sein.
";
$elem["w3c-linkchecker/hostname"]["descriptionfr"]="Nom d'hôte pour le service W3C LinkChecker :
 Veuillez indiquer le nom de domaine pleinement qualifié où le service w3c-linkchecker sera accessible à distance si actif. Par défaut il sera seulement accessible en local.
";
$elem["w3c-linkchecker/hostname"]["default"]="localhost";
$elem["w3c-linkchecker/private_ips"]["type"]="boolean";
$elem["w3c-linkchecker/private_ips"]["description"]="Allow private IP addresses?
 Please specify whether w3c-linkchecker should permit validation of websites
 on private networks. By default it will only permit public IP addresses.
";
$elem["w3c-linkchecker/private_ips"]["descriptionde"]="Private IP-Adressen erlauben?
 Bitte geben Sie an, ob W3C-Linkchecker die Überprüfung von Websites in privaten Netzwerken erlauben soll. Standardmäßig wird er nur öffentliche IP-Adressen erlauben.
";
$elem["w3c-linkchecker/private_ips"]["descriptionfr"]="Autoriser les adresses IP privées ?
 Veuillez indiquer si w3c-linkchecker devra autoriser la validation de sites internet sur les réseaux privés. Par défaut il n'autorisera uniquement que les adresses IPs publiques.
";
$elem["w3c-linkchecker/private_ips"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
