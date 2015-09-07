<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iog");

$elem["iog/migrate"]["type"]="boolean";
$elem["iog/migrate"]["description"]="Migrate old install out of /var/www/iog/?
 A previous package release has left data installed in the
 /var/www/iog/ directory. Current versions of the IOG package now use
 /var/lib/iog/ for IOG data files.
 .
 If you choose this option, all existing network data will be moved
 to the new location.
 .
 Consequently, directory settings in the IOG configuration file
 (/etc/iog.cfg) will be changed to /var/lib/iog and a web server
 alias declaration will be added so that old network statistics
 are still published.
";
$elem["iog/migrate"]["descriptionde"]="Alte Installation aus »/var/www/iog/« migrieren?
 Eine vorherige Paketveröffentlichung hat installierte Daten im Verzeichnis »/var/www/iog/« hinterlassen. Aktuelle Versionen des IOG-Pakets benutzen nun »/var/lib/iog/«-IOG-Dateien.
 .
 Wenn Sie diese Option auswählen, werden alle alten Netzwerkdaten an den neuen Ort verschoben.
 .
 Als Konsquenz daraus werden Verzeichniseinstellungen in der IOG-Konfigurationsdatei (/etc/iog.cfg) auf /var/lib/iog geändert und es wird eine Web-Server-Alias-Deklaration hinzugefügt, so dass alte Netzwerkstatistiken weiterhin veröffentlicht werden.
";
$elem["iog/migrate"]["descriptionfr"]="Déplacer l'ancienne installation depuis /var/www/iog/ ?
 Une installation précédente a laissé des données installées dans le répertoire /var/www/iog/. La version actuelle de IOG place désormais ses fichiers de données dans /var/lib/iog/.
 .
 Si vous choisissez cette option, toutes les données réseau existantes seront déplacées dans le nouveau répertoire.
 .
 Par conséquent, les paramètres de répertoire situés dans le fichier de configuration (/etc/iog.cfg) seront modifiés pour utiliser /var/lib/iog et un alias pour le serveur web sera ajouté de manière à ce que les anciennes statistiques réseau continuent à être publiées.
";
$elem["iog/migrate"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
