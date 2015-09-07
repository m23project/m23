<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sysstat");

$elem["sysstat/remove_files"]["type"]="boolean";
$elem["sysstat/remove_files"]["description"]="Remove old format statistics data files?
 The format of daily data statistics files has changed in version ${s_version}
 of sysstat and is not compatible with the previous one.
 .
 If you choose this option, all existing data files in the /var/log/sysstat/
 directory will be deleted.
 .
 If you don't choose this option, the sar(1) command will not work properly
 until you remove the files manually.
";
$elem["sysstat/remove_files"]["descriptionde"]="Daten-Statistik-Dateien im alten Format entfernen?
 Das Format der täglichen Daten-Statistik-Dateien wurde in der Version ${s_version} von Sysstat geändert und ist zum vorherigen nicht kompatibel.
 .
 Falls Sie zustimmen, werden alle Daten-Dateien im Verzeichnis /var/log/sysstat/ gelöscht.
 .
 Falls Sie dieser Option nicht zustimmen, funktioniert der Befehl sar(1) nicht richtig bis die Dateien gelöscht werden.
";
$elem["sysstat/remove_files"]["descriptionfr"]="Faut-il supprimer les fichiers de statistiques qui utilisent l'ancien format ?
 Le format des fichiers quotidiens de statistiques a changé dans la version ${s_version} de sysstat et n'est *pas* compatible avec le format antérieur.
 .
 Si vous choisissez cette option, tous les fichiers de données qui se trouvent dans le répertoire /var/log/sysstat seront effacés.
 .
 Si vous ne choisissez pas cette option, la commande sar(1) ne fonctionnera pas correctement tant que vous n'aurez pas supprimé les fichiers.
";
$elem["sysstat/remove_files"]["default"]="true";
$elem["sysstat/enable"]["type"]="boolean";
$elem["sysstat/enable"]["description"]="Activate sysstat's cron job?
 If this option is enabled the sysstat package will monitor system
 activities and store the data in log files within /var/log/sysstat/.
 .
 This data allows the sar(1) command to display system statistics for the
 whole day.
 .
 If you don't enable this option, the sar(1) command will only show the
 current statistics.
";
$elem["sysstat/enable"]["descriptionde"]="Einen Cronjob für Sysstat einrichten?
 Falls Sie zustimmen, wird Sysstat Systemaktivitäten überwachen und die Daten in Protokolldateien im Verzeichnis /var/log/sysstat/ ablegen.
 .
 Mit diesen Daten kann der Befehl sar(1) ganztägige Systemstatistiken anzeigen.
 .
 Falls Sie nicht zustimmen, kann der Befehl sar(1) nur die aktuellen Statistiken anzeigen.
";
$elem["sysstat/enable"]["descriptionfr"]="Faut-il activer la tâche quotidienne de cron pour sysstat ?
 Si vous choisissez cette option, le paquet sysstat surveillera l'activité du système et conservera ces informations dans des journaux placés dans le répertoire /var/log/sysstat.
 .
 Ces données permettront à la commande sar(1) d'afficher des statistiques sur l'activité du système pour la journée entière.
 .
 Si vous ne choisissez pas cette option, la commande sar(1) n'affichera que les statistiques courantes.
";
$elem["sysstat/enable"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
