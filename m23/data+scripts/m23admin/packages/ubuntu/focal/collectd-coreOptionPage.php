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
 This can be done by using /usr/lib/collectd/utils/migrate-3-4.px.
 .
 This step requires both the perl and the rrdtool packages to be installed,
 which is currently not the case. You need to perform the migration manually.
 .
 See /usr/share/doc/collectd-core/NEWS.gz for details.
";
$elem["collectd/migration-3-4"]["descriptionde"]="Das Layout der RRD-Dateien hat sich geändert.
 Das Layout der von collectd erstellten RRD-Dateien hat sich seit Version 3.x grundlegend geändert. Um Ihre alten Daten beizubehalten, müssen Sie diese migrieren. Dies kann durch Verwendung von »/usr/lib/collectd/utils/migrate-3-4.px« erreicht werden.
 .
 Für diesen Schritt müssen sowohl das perl- als auch das rrdtool-Paket installiert sein. Da dies im Moment nicht der Fall ist, müssen Sie die Migration manuell durchführen.
 .
 Siehe »/usr/share/doc/collectd-core/NEWS.gz« für Details.
";
$elem["collectd/migration-3-4"]["descriptionfr"]="Changement du format des fichiers RRD
 Le format des fichiers RRD créés par collectd a changé de façon significative depuis la version 3.x. Afin de conserver les données, il est nécessaire de les convertir. Cette opération peut être réalisée avec la commande « /usr/lib/collectd/utils/migrate-3-4.px ».
 .
 Cette étape a besoin des paquets perl et rrdtool qui ne sont pas actuellement installés. La conversion doit par conséquent être effectuée manuellement.
 .
 Veuillez lire le fichier « /usr/share/doc/collectd-core/NEWS.gz » pour plus d'informations.
";
$elem["collectd/migration-3-4"]["default"]="";
$elem["collectd/auto-migrate-3-4"]["type"]="boolean";
$elem["collectd/auto-migrate-3-4"]["description"]="Automatically try to migrate your RRD files?
 The layout of the RRD files created by collectd has changed significantly
 since version 3.x. In order to keep your old data you have to migrate it.
 This can be done by using /usr/lib/collectd/utils/migrate-3-4.px.
 .
 This step can be done automatically. In this case a backup of
 /var/lib/collectd/ is made in /var/backups/. This script is still
 experimental, though. Do not expect it to work in all cases.
 .
 See /usr/share/doc/collectd-core/NEWS.gz for details.
";
$elem["collectd/auto-migrate-3-4"]["descriptionde"]="Soll automatisch versucht werden, Ihre RRD-Dateien zu migrieren?
 Das Layout der von collectd erstellten RRD-Dateien hat sich seit Version 3.x grundlegend geändert. Um Ihre alten Daten beizubehalten, müssen Sie diese migrieren. Dies kann durch Verwendung von »/usr/lib/collectd/utils/migrate-3-4.px« erreicht werden.
 .
 Dieser Schritt kann automatisch ausgeführt werden. Sollten Sie sich hierfür entscheiden, wird eine Sicherungskopie von »/var/lib/collectd/« unter »/var/backups/« erstellt. Dieses Skript ist aber noch experimentell. Erwarten Sie nicht, dass es in allen Fällen problemlos funktioniert.
 .
 Siehe »/usr/share/doc/collectd-core/NEWS.gz« für Details.
";
$elem["collectd/auto-migrate-3-4"]["descriptionfr"]="Faut-il tenter de convertir automatiquement les fichiers RRD ?
 Le format des fichiers RRD créés par collectd a changé de façon significative depuis la version 3.x. Afin de conserver les données, il est nécessaire de les convertir. Cette opération peut être réalisée avec la commande « /usr/lib/collectd/utils/migrate-3-4.px ».
 .
 La conversion des fichiers RRD peut être effectuée automatiquement. Pour cela, une sauvegarde du répertoire « /var/lib/collectd/ » aura lieu dans le répertoire « /var/backups/ ». Veuillez noter que cette conversion est expérimentale ; ne vous attendez pas à ce qu'elle fonctionne dans tous les cas.
 .
 Veuillez lire le fichier « /usr/share/doc/collectd-core/NEWS.gz » pour plus d'informations.
";
$elem["collectd/auto-migrate-3-4"]["default"]="false";
$elem["collectd/migration-4-5"]["type"]="note";
$elem["collectd/migration-4-5"]["description"]="Layout of RRD files has changed in version 5.0
 The layout of some RRD files created by collectd has changed since version
 4.x. In order to keep your old data you have to migrate it. This can be done
 by using /usr/lib/collectd/utils/migrate-4-5.px.
 .
 This step requires both the perl and the rrdtool packages to be installed,
 which is currently not the case. You need to perform the migration manually.
 .
 See /usr/share/doc/collectd-core/NEWS.gz and the collectd wiki at
 <https://collectd.org/wiki/index.php/V4_to_v5_migration_guide> for details.
";
$elem["collectd/migration-4-5"]["descriptionde"]="Das Layout der RRD-Dateien hat sich in Version 5.0 geändert.
 Das Layout einiger von collectd erstellten RRD-Dateien hat sich seit Version 4.x grundlegend geändert. Um Ihre alten Daten beizubehalten, müssen Sie diese migrieren. Dies kann durch Verwendung von »/usr/lib/collectd/utils/migrate-4-5.px« erreicht werden.
 .
 Für diesen Schritt müssen sowohl das perl- als auch das rrdtool-Paket installiert sein. Da dies im Moment nicht der Fall ist, müssen Sie die Migration manuell durchführen.
 .
 Siehe »/usr/share/doc/collectd-core/NEWS.gz« und das collectd Wiki unter <https://collectd.org/wiki/index.php/V4_to_v5_migration_guide> für Details.
";
$elem["collectd/migration-4-5"]["descriptionfr"]="Le format des fichiers RRD a changé dans la version 5.0
 Le format des fichiers RRD créés par collectd a changé depuis la version 4.x. Afin de conserver les données, il est nécessaire de les convertir. Cette opération peut être réalisée avec la commande « /usr/lib/collectd/utils/migrate-4-5.px ».
 .
 Cette étape a besoin des paquets perl et rrdtool qui ne sont pas actuellement installés. La conversion doit par conséquent être effectuée manuellement.
 .
 Voir /usr/share/doc/collectd-core/NEWS.gz et le wiki de collectd (<https://collectd.org/wiki/index.php/V4_to_v5_migration_guide>) pour plus de détails.
";
$elem["collectd/migration-4-5"]["default"]="";
$elem["collectd/auto-migrate-4-5"]["type"]="boolean";
$elem["collectd/auto-migrate-4-5"]["description"]="Automatically try to migrate your RRD files?
 The layout of some RRD files created by collectd has changed since version
 4.x. In order to keep your old data you have to migrate it. This can be done
 by using /usr/lib/collectd/utils/migrate-4-5.px.
 .
 This step can be done automatically. In this case a backup of
 /var/lib/collectd/ is made in /var/backups/. This script is still
 experimental, though. Do not expect it to work in all cases.
 .
 See /usr/share/doc/collectd-core/NEWS.gz and the collectd wiki at
 <https://collectd.org/wiki/index.php/V4_to_v5_migration_guide> for details.
";
$elem["collectd/auto-migrate-4-5"]["descriptionde"]="Soll automatisch versucht werden, Ihre RRD-Dateien zu migrieren?
 Das Layout einiger von collectd erstellten RRD-Dateien hat sich seit Version 4.x grundlegend geändert. Um Ihre alten Daten beizubehalten, müssen Sie diese migrieren. Dies kann durch Verwendung von »/usr/lib/collectd/utils/migrate-4-5.px« erreicht werden.
 .
 Dieser Schritt kann automatisch ausgeführt werden. Sollten Sie sich hierfür entscheiden, wird eine Sicherungskopie von »/var/lib/collectd/« unter »/var/backups/« erstellt. Dieses Skript ist aber noch experimentell. Erwarten Sie nicht, dass es in allen Fällen problemlos funktioniert.
 .
 Siehe »/usr/share/doc/collectd-core/NEWS.gz« und das collectd Wiki unter <https://collectd.org/wiki/index.php/V4_to_v5_migration_guide> für Details.
";
$elem["collectd/auto-migrate-4-5"]["descriptionfr"]="Faut-il tenter de convertir automatiquement les fichiers RRD ?
 Le format des fichiers RRD créés par collectd a changé depuis la version 4.x. Afin de conserver les données, il est nécessaire de les convertir. Cette opération peut être réalisée avec la commande « /usr/lib/collectd/utils/migrate-4-5.px ».
 .
 La conversion des fichiers RRD peut être effectuée automatiquement. Pour cela, une sauvegarde du répertoire « /var/lib/collectd/ » aura lieu dans le répertoire « /var/backups/ ». Veuillez noter que cette conversion est expérimentale ; ne vous attendez pas à ce qu'elle fonctionne dans tous les cas.
 .
 Voir /usr/share/doc/collectd-core/NEWS.gz et le wiki de collectd (<https://collectd.org/wiki/index.php/V4_to_v5_migration_guide>) pour plus de détails.
";
$elem["collectd/auto-migrate-4-5"]["default"]="false";
$elem["collectd/postrm_purge_data"]["type"]="boolean";
$elem["collectd/postrm_purge_data"]["description"]="Remove all collected data (e.g. RRD files)?
 The /var/lib/collectd/ directory which contains the data files containing the
 collected statistics is about to be removed. For example, this directory
 includes (in the default configuration) all RRD files.
 .
 If you're purging the collectd package in order to replace it with a more
 recent or custom version or if you want to keep the data for further
 analysis, the data should be kept.
";
$elem["collectd/postrm_purge_data"]["descriptionde"]="Alle gesammelten Daten entfernen (z.B. RRD-Dateien)?
 Das Verzeichnis /var/lib/collectd/ mit den gesammelten Statistiken soll entfernt werden. Das Verzeichnis enthält (in der Standardkonfiguration) zum Beispiel die RRD-Dateien.
 .
 Falls geplant ist, nur eine höhere oder eigene Version von collectd zu installieren oder falls die Daten für weitere Analysen genutzt werden, sollten die Daten behalten werden.
";
$elem["collectd/postrm_purge_data"]["descriptionfr"]="Faut-il supprimer toutes les données collectées (p. ex. les fichiers RRD) ?
 Le répertoire « /var/lib/collectd/ », qui contient tous les fichiers de données des statistiques collectées, est en passe d'être supprimé. Dans la configuration par défaut, ce répertoire contient tous les fichiers RRD.
 .
 Si vous purgez le paquet collectd afin de le remplacer par une version plus récente ou une version personnalisée ou si vous désirez conserver les données pour une analyse ultérieure, vous devriez refuser.
";
$elem["collectd/postrm_purge_data"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
