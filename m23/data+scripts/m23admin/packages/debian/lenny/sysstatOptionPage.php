<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sysstat");

$elem["sysstat/remove_files"]["type"]="boolean";
$elem["sysstat/remove_files"]["description"]="Do you want post-installation script to remove these data files?
 Format of daily data statistics files has changed in version ${s_version}
 of sysstat and is *not* compatible with the previous one!
 .
 If you activate this option, any existing data files in /var/log/sysstat/
 directory will be deleted.
 .
 If you don't want to remove them automatically, please remove them by hand later,
 in order for the sar command to work properly.
";
$elem["sysstat/remove_files"]["descriptionde"]="Sollen diese Dateien am Ende des Einrichtungsprogramms entfernt werden?
 Das Format der täglichen Daten-Statistik-Dateien wurde in der Version ${s_version} von sysstat geändert und ist *nicht* kompatibel zu dem vorherigen!
 .
 Wenn Sie zustimmen, werden alle Dateien im Verzeichnis /var/log/sysstat/ gelöscht.
 .
 Wenn Sie die Dateien nicht automatisch entfernen wollen, löschen Sie diese später manuell, damit das Kommando »sar« richtig funktioniert.
";
$elem["sysstat/remove_files"]["descriptionfr"]="Souhaitez-vous que le script de post-installation efface ces fichiers ?
 Le format des fichiers quotidiens de statistiques a changé dans la version ${s_version} de sysstat et n'est *pas* compatible avec le format antérieur !
 .
 Si vous choisissez cette option, tous les fichiers de données qui se trouvent dans le répertoire /var/log/sysstat seront effacés.
 .
 Si vous ne souhaitez pas les effacer automatiquement, veuillez les effacer manuellement plus tard afin que la commande « sar » puisse fonctionner correctement.
";
$elem["sysstat/remove_files"]["default"]="true";
$elem["sysstat/enable"]["type"]="boolean";
$elem["sysstat/enable"]["description"]="Do you want to activate sysstat's cron job?
 If this option is enabled the sysstat package will collect (using the cron
 daemon and init.d script) binary data concerning system activities and store
 them in log files within /var/log/sysstat/ directory.
 .
 With this data the sar(1) command will be able to display day-long system
 statistics.
 .
 If you don't enable this option, the sar(1) command will show only the
 current statistics.
";
$elem["sysstat/enable"]["descriptionde"]="Einen Cronjob für sysstat einrichten?
 Wenn Sie zustimmen, wird sysstat (mittels des Dienstes cron und init.d-Skripten) binäre Daten über Systemaktivitäten sammeln und in Protokolldateien im Verzeichnis /var/log/sysstat/ anlegen.
 .
 Mit diesen Daten kann das Kommando sar(1) ganztägige Systemstatistiken anzeigen.
 .
 Wenn Sie ablehnen, kann das Kommando sar(1) nur die aktuellen Statistiken anzeigen.
";
$elem["sysstat/enable"]["descriptionfr"]="Faut-il activer la tâche quotidienne de cron pour sysstat ?
 Si vous choisissez cette option, le paquet sysstat collectera (en utilisant quotidiennement le script de démarrage) des données binaires sur l'activité du système et les conservera dans des journaux placés dans le répertoire /var/log/sysstat.
 .
 Ces données permettront à la commande sar(1) d'afficher des statistiques sur l'activité du système tout au long de la journée.
 .
 Si vous ne choisissez pas cette option, la commande sar(1) n'affichera que les statistiques courantes.
";
$elem["sysstat/enable"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
