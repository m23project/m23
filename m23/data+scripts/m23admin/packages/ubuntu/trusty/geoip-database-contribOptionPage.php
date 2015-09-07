<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("geoip-database-contrib");

$elem["geoip-database-contrib/install-cronjob"]["type"]="boolean";
$elem["geoip-database-contrib/install-cronjob"]["description"]="Automatically update the database every month?
 The GeoLite database on the MaxMind website is updated monthly. If you choose
 to automatically update the local copy of the database, a cron script will be
 installed to download the new version from the Internet on the tenth of every
 month.
 .
 If you choose not to update the database automatically, you can do it by hand
 by running the 'geoip-database-contrib_update' command as root.
";
$elem["geoip-database-contrib/install-cronjob"]["descriptionde"]="Soll die Datenbank automatisch monatlich aktualisiert werden?
 Die GeoLite-Datenbank auf der MaxMind-Website wird monatlich aktualisiert. Falls Sie sich dazu entscheiden, die lokale Kopie der Datenbank automatisch zu aktualisieren, wird ein Cron-Skript installiert, das die neue Version am zehnten jedes Monats aus dem Internet herunterlädt.
 .
 Falls Sie sich gegen die automatische Aktualisierung der Datenbank entscheiden, können Sie diese manuell durch den Aufruf von »geoip-database-contrib_update« durchführen.
";
$elem["geoip-database-contrib/install-cronjob"]["descriptionfr"]="Faut-il mettre à jour la base de données automatiquement chaque mois ?
 La base de données GeoLite sur le site de MaxMind est mise à jour mensuellement. Si vous choisissez de mettre à jour la copie locale automatiquement, la nouvelle version sera téléchargée le 10 de chaque mois depuis l'Internet, à l'aide d'un script exécuté par « cron ».
 .
 Dans le cas contraire, vous pouvez effectuer la mise à jour vous-même avec la commande « geoip-database-contrib_update », qui doit être exécutée avec les privilèges du superutilisateur.
";
$elem["geoip-database-contrib/install-cronjob"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
