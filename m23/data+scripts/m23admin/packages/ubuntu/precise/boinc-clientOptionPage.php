<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("boinc-client");

$elem["boinc-client/remove_boinc_dir"]["type"]="boolean";
$elem["boinc-client/remove_boinc_dir"]["description"]="Do you want to remove the BOINC data directory?
 The BOINC data directory /var/lib/boinc-client contains the information to
 which projects the BOINC core client is attached, the work unit cache and
 several other data.  If you no longer need this data, this is your chance to
 remove them.
 .
 If no longer have need of the data being stored in the BOINC data directory,
 you should choose this option.  If you want to hold this data for another
 time, or if you would rather handle this process manually, you should refuse
 this option.
";
$elem["boinc-client/remove_boinc_dir"]["descriptionde"]="Wollen Sie das BOINC-Datenverzeichnis entfernen?
 Das BOINC-Datenverzeichnis /var/lib/boinc-client enthält die Information, mit welchen Projekten der BOINC-Kern-Klient verbunden ist, den Zwischenspeicher für Arbeitseinheiten und verschiedene andere Daten. Falls Sie diese Daten nicht länger benötigen, haben Sie jetzt die Gelegenheit, sie zu löschen.
 .
 Falls Sie keine Verwendung für die Daten, die im BOINC-Datenverzeichnis gespeichert sind, mehr haben, sollten Sie diese Möglichkeit wählen. Falls Sie die Daten für eine spätere Benutzung aufheben wollen, oder falls Sie diesen Vorgang manuell durchführen wollen, sollten Sie sie ablehnen.
";
$elem["boinc-client/remove_boinc_dir"]["descriptionfr"]="Faut-il supprimer le répertoire des données de BOINC ?
 Le répertoire des données de BOINC (/var/lib/boinc-client) contient les informations sur les projets auxquels le client BOINC de base est attaché, le cache de l'unité de travail et de nombreuses autres informations. Si vous n'avez plus besoin de ces données, vous pouvez le supprimer.
 .
 Choisissez cette option si vous n'avez plus besoin des informations stockées dans le répertoire des données de BOINC. Ne la choisissez pas si vous voulez conserver ces informations pour plus tard ou si vous voulez effectuer la maintenance vous-même.
";
$elem["boinc-client/remove_boinc_dir"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
