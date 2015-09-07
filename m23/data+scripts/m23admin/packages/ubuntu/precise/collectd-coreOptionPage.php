<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("collectd-core");

$elem["collectd/migration-3-4"]["type"]="note";
$elem["collectd/migration-3-4"]["description"]="Layout of RRD files has changed
 The layout of the RRD files created by collectd has changed significantly
 since version 3.x. In order to keep your old data you have to migrate it.
 This can be done by using /usr/lib/collectd-core/utils/migrate-3-4.px.
 .
 This step requires both the perl and the rrdtool packages to be installed,
 which is currently not the case. You need to perform the migration manually.
 .
 See /usr/share/doc/collectd-core/NEWS.Debian for details.
";
$elem["collectd/migration-3-4"]["descriptionde"]="Das Layout der RRD-Dateien hat sich geändert.
 Das Layout der von collectd erstellten RRD-Dateien hat sich seit Version 3.x grundlegend geändert. Um Ihre alten Daten beizubehalten, müssen Sie diese migrieren. Dies kann unter Verwendung von »/usr/lib/collectd-core/utils/migrate-3-4.px« erreicht werden.
 .
 Für diesen Schritt müssen sowohl das perl- als auch das rrdtool-Paket installiert sein. Da dies im Moment nicht der Fall ist, müssen Sie die Migration manuell durchführen.
 .
 Siehe »/usr/share/doc/collectd-core/NEWS.Debian« für Details.
";
$elem["collectd/migration-3-4"]["descriptionfr"]="Changement du format des fichiers RRD
 Le format des fichiers RRD créés par collectd a changé de façon significative depuis la version 3.x. Afin de conserver les données, il est nécessaire de les convertir.Cette opération peut être réalisée avec la commande « /usr/lib/collectd-core/utils/migrate-3-4.px ».
 .
 Cette étape a besoin des paquets perl et rrdtool qui ne sont pas actuellement installés. La conversion doit donc être effectuée manuellement.
 .
 Veuillez lire le fichier /usr/share/doc/collectd-core/NEWS.Debian pour plus d'informations.
";
$elem["collectd/migration-3-4"]["default"]="";
$elem["collectd/auto-migrate-3-4"]["type"]="boolean";
$elem["collectd/auto-migrate-3-4"]["description"]="Automatically try to migrate your RRD files?
 The layout of the RRD files created by collectd has changed significantly
 since version 3.x. In order to keep your old data you have to migrate it.
 This can be done by using /usr/lib/collectd-core/utils/migrate-3-4.px.
 .
 This step can be done automatically. In this case a backup of
 /var/lib/collectd/ is made in /var/backups/. This script is still
 experimental, though. Do not expect it to work in all cases.
 .
 See /usr/share/doc/collectd-core/NEWS.Debian for details.
";
$elem["collectd/auto-migrate-3-4"]["descriptionde"]="Soll eine automatische Migration Ihrer RRD-Dateien versucht werden?
 Das Layout der von collectd erstellten RRD-Dateien hat sich seit Version 3.x grundlegend geändert. Um Ihre alten Daten beizubehalten, müssen Sie diese migrieren. Dies kann unter Verwendung von »/usr/lib/collectd-core/utils/migrate-3-4.px« erreicht werden.
 .
 Dieser Schritt kann automatisch ausgeführt werden. Sollten Sie sich hierfür entscheiden, wird eine Sicherungskopie von »/var/lib/collectd/« unter »/var/backups/« erstellt. Dieses Skript ist aber noch experimentell. Erwarten Sie nicht, dass es in allen Fällen problemlos funktioniert.
 .
 Siehe »/usr/share/doc/collectd-core/NEWS.Debian« für Details.
";
$elem["collectd/auto-migrate-3-4"]["descriptionfr"]="Faut-il tenter de convertir automatiquement les fichiers RRD ?
 Le format des fichiers RRD créés par collectd a changé de façon significative depuis la version 3.x. Afin de conserver les données, il est nécessaire de les convertir.Cette opération peut être réalisée avec la commande « /usr/lib/collectd-core/utils/migrate-3-4.px ».
 .
 La conversion des fichiers RRD peut être effectuée automatiquement. Pour cela, une sauvegarde de /var/lib/collectd/ aura lieu dans /var/backups/. Veuillez noter que cette conversion est expérimentale : il est recommandé de contrôler sa bonne exécution.
 .
 Veuillez lire le fichier /usr/share/doc/collectd-core/NEWS.Debian pour plus d'informations.
";
$elem["collectd/auto-migrate-3-4"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
