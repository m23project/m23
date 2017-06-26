<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("squid-deb-proxy");

$elem["squid-deb-proxy/ppa-enable"]["type"]="boolean";
$elem["squid-deb-proxy/ppa-enable"]["description"]="Allow PPA access?
 By default, squid-deb-proxy does not allow access to Personal Package
 Archive (PPA) repositories on Launchpad.
 .
 Choosing this option will whitelist these repositories.
";
$elem["squid-deb-proxy/ppa-enable"]["descriptionde"]="PPA-Zugriff erlauben?
 Standardmäßig erlaubt Squid-deb-proxy keinen Zugriff auf persönliche Paketarchivdepots (Personal Package Archive/PPA) auf Launchpad.
 .
 Die Auswahl dieser Option wird diese Depots auf eine Liste erlaubter Depots setzen.
";
$elem["squid-deb-proxy/ppa-enable"]["descriptionfr"]="Autoriser l'accès aux PPA ?
 Par défaut, squid-deb-proxy n'autorise pas l'accès aux archives PPA (« Personal Package Archive » : archives personnelles de paquets) de Launchpad.
 .
 Si vous choisissez cette option, ces archives seront autorisées.
";
$elem["squid-deb-proxy/ppa-enable"]["default"]="false";
$elem["squid-deb-proxy/acl-disable"]["type"]="boolean";
$elem["squid-deb-proxy/acl-disable"]["description"]="Allow unrestricted network access?
 By default, squid-deb-proxy allows access to the cache from private
 networks only (10.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16).
 .
 Choosing this option will allow other IP addresses to access the cache.
";
$elem["squid-deb-proxy/acl-disable"]["descriptionde"]="Uneingeschränkten Netzwerkzugriff gestatten?
 Standardmäßig erlaubt Squid-deb-proxy nur privaten Netzwerken (10.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16) den Zugriff auf den Zwischenspeicher.
 .
 Die Auswahl dieser Option wird weiteren IP-Adressen den Zugriff auf den Zwischenspeicher gestatten.
";
$elem["squid-deb-proxy/acl-disable"]["descriptionfr"]="Faut-il autoriser un accès sans restriction depuis le réseau ?
 Par défaut, squid-deb-proxy n'autorise l'accès au cache qu'à partir d'un réseau privé (10.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16).
 .
 Si vous choisissez cette option, l'accès au cache sera autorisé à toute adresse IP.
";
$elem["squid-deb-proxy/acl-disable"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
