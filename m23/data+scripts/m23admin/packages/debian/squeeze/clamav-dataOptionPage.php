<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-data");

$elem["clamav-data/warn-on-old-databases"]["type"]="boolean";
$elem["clamav-data/warn-on-old-databases"]["description"]="Generate daily warning e-mails on outdated data files?
 This package contains a _static_ database of virus patterns for clamav.
 Since this can be leading to a false sense of security, the package can
 generate warnings out of cron.daily if the static databases are older than
 two months.
";
$elem["clamav-data/warn-on-old-databases"]["descriptionde"]="Sollen bei veralteten Datendateien Warnungen per Email erzeugt werden?
 Dieses Paket enthält eine _statische_ Datenbank an Virusdefinitionen für Clamav. Weil dies zu einem falschen Gefühl von Sicherheit führen kann, kann das Paket aus cron.daily Warnungen erzeugen, wenn die statische Datenbank älter als 2 Monate ist.
";
$elem["clamav-data/warn-on-old-databases"]["descriptionfr"]="Envoi d'avertissements quotidiens par courriel en cas de données périmées ?
 Ce paquet contient une base de données statique pour les signatures de virus destinées à clamav. Cela peut conduire à une fausse impression de sécurité. En conséquence, le paquet peut avertir par courriel (via les tâches quotidiennes de cron) si les bases de données statiques sont vieilles de plus de deux mois.
";
$elem["clamav-data/warn-on-old-databases"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
