<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("munin");

$elem["munin/postrm_remove_rrd_files"]["type"]="boolean";
$elem["munin/postrm_remove_rrd_files"]["description"]="Remove all RRD database files?
 The /var/lib/munin directory which contains the RRD files with the
 data accumulated by munin is about to be removed.
 .
 If you want to install munin later again or if you want to use the
 content of the RRD files for other purposes, the data should be kept.
";
$elem["munin/postrm_remove_rrd_files"]["descriptionde"]="Löschung der RRD-Datenbank-Dateien?
 Das Verzeichnis /var/lib/munin enthält RRD-Dateien mit den Daten, die durch Munin gesammelt wurden. Diese RRD-Dateien können beim Entfernen des Pakets gelöscht werden.
 .
 Falls Sie Munin später erneut installieren oder die RRD-Dateien in einem anderen Zusammenhang nutzen wollen, dann sollten Sie die RRD-Dateien nicht löschen.
";
$elem["munin/postrm_remove_rrd_files"]["descriptionfr"]="Faut-il supprimer tous les fichiers de la base de données RRD ?
 Le répertoire /var/lib/munin qui contient les fichiers RRD avec les données accumulées par munin est sur le point d'être supprimé.
 .
 Si vous souhaitez réinstaller plus tard munin ou utiliser le contenu des fichiers RRD à d'autres fins, ces données devraient être conservées.
";
$elem["munin/postrm_remove_rrd_files"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
