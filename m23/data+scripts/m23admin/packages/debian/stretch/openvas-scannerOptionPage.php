<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openvas-scanner");

$elem["openvas-scanner/enable_redis"]["type"]="boolean";
$elem["openvas-scanner/enable_redis"]["description"]="Do you want to enable redis unix socket on /var/run/redis/redis.sock?
 Openvas scanner require redis database to store data. It will connect to the
 database with a unix socket at /var/run/redis/redis.sock and /etc/redis/redis.conf
 will be updated.
";
$elem["openvas-scanner/enable_redis"]["descriptionde"]="Möchten Sie ein Redis-Unix-Socket auf /var/run/redis/redis.sock aktivieren?
 Openvas-Scanner benötigt zum Speichern von Daten eine Redis-Datenbank. Es wird sich mit der Datenbank über ein Unix-Socket auf /var/run/redis/redis.sock verbinden und /etc/redis/redis.conf wird aktualisiert.
";
$elem["openvas-scanner/enable_redis"]["descriptionfr"]="Faut-il activer la socket unix redis sur /var/run/redis/redis.sock ?
 Le scanner Openvas nécessite une base de données redis pour enregistrer les données. Il se connectera à la base de données via une socket unix sur /var/run/redis/redis.sock et le fichier /etc/redis/redis.conf sera modifié.
";
$elem["openvas-scanner/enable_redis"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
