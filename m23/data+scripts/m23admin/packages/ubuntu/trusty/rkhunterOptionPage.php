<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rkhunter");

$elem["rkhunter/cron_daily_run"]["type"]="boolean";
$elem["rkhunter/cron_daily_run"]["description"]="Activate daily run of rkhunter?
 If you choose this option, rkhunter will be run automatically
 by a daily cron job.
";
$elem["rkhunter/cron_daily_run"]["descriptionde"]="Tägliche Ausführung von Rkhunter aktivieren?
 Falls Sie diese Option wählen, führt ein Cron-Job Rkhunter täglich automatisch aus.
";
$elem["rkhunter/cron_daily_run"]["descriptionfr"]="Faut-il exécuter rkhunter quotidiennement ?
 Si vous choisissez cette option, rkhunter sera automatiquement exécuté par une tâche quotidienne de cron.
";
$elem["rkhunter/cron_daily_run"]["default"]="";
$elem["rkhunter/cron_db_update"]["type"]="boolean";
$elem["rkhunter/cron_db_update"]["description"]="Activate weekly update of rkhunter's databases?
 If you choose this option, rkhunter databases will be
 updated automatically by a weekly cron job.
";
$elem["rkhunter/cron_db_update"]["descriptionde"]="Wöchentliche Aktualisierung der Datenbanken Rkhunters aktivieren?
 Falls Sie diese Option wählen, aktualisiert ein Cron-Job die Rkhunter-Datenbanken wöchentlich automatisch.
";
$elem["rkhunter/cron_db_update"]["descriptionfr"]="Faut-il activer la mise à jour hebdomadaire de la base de données ?
 Si vous choisissez cette option, les bases de données de rkhunter seront automatiquement mises à jour par une tâche hebdomadaire de cron.
";
$elem["rkhunter/cron_db_update"]["default"]="";
$elem["rkhunter/apt_autogen"]["type"]="boolean";
$elem["rkhunter/apt_autogen"]["description"]="Automatically update rkhunter's file properties database?
 The file properties database can be updated automatically
 by the package management system.
 .
 This feature is not enabled by default as
 database updates may be slow on low-end machines.
 Even if it is enabled, the database won't be updated if the
 'hashes' test is disabled in rkhunter configuration.
";
$elem["rkhunter/apt_autogen"]["descriptionde"]="Rkhunters Datenbank für Dateieigenschaften automatisch aktualisieren?
 Die Paketverwaltung kann die Datenbank für Dateieigenschaften automatisch aktualisieren.
 .
 Diese Funktion ist in der Voreinstellung nicht aktiviert, da die Aktualisierung der Datenbank auf einfachen Maschinen langsam sein kann. Selbst wenn sie aktiviert ist, wird die Datenbank nicht aktualisiert, falls der 'hashes'-Test in der Rkhunter-Konfiguration deaktiviert ist.
";
$elem["rkhunter/apt_autogen"]["descriptionfr"]="Faut-il activer la mise à jour de la base de données des propriétés de fichiers de rkhunter ?
 La base de données des propriétés de fichiers peut être mise à jour automatiquement par le système de gestion des paquets.
 .
 Cette fonctionnalité n'est pas activée par défaut car la mise à jour de la base de données peut être lente sur des matériels peu performants. Même lorsqu'elle est activée, la base de données ne sera pas mise à jour si le test « hashes » est désactivé dans la configuration de rkhunter.
";
$elem["rkhunter/apt_autogen"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
