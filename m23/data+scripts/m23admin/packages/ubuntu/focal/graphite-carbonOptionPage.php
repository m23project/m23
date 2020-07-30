<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("graphite-carbon");

$elem["graphite-carbon/postrm_remove_databases"]["type"]="boolean";
$elem["graphite-carbon/postrm_remove_databases"]["description"]="Remove database files when purging graphite-carbon?
 The /var/lib/graphite/whisper directory contains the whisper database
 files.
 .
 You may want to keep these database files even if you completely
 remove graphite-carbon, in case you plan to reinstall it later.
";
$elem["graphite-carbon/postrm_remove_databases"]["descriptionde"]="Datenbankdateien beim vollständigen Entfernen von Graphite-Carbon löschen?
 Das Verzeichnis /var/lib/graphite/whisper enthält die Whisper-Datenbankdateien.
 .
 Möglicherweise möchten Sie diese Datenbankdateien sogar dann aufbewahren, wenn Sie Graphite-Carbon vollständig entfernen, falls Sie planen, es später erneut zu installieren.
";
$elem["graphite-carbon/postrm_remove_databases"]["descriptionfr"]="Effacer les fichiers de base de données lors de la suppression de graphite-carbon ?
 Le répertoire /var/lib/graphite/whisper contient les fichiers de base de données de whisper.
 .
 Vous pouvez souhaiter conserver ces fichiers de base de données même si vous supprimez complètement graphite-carbon, dans le cas d'une réinstallation future.
";
$elem["graphite-carbon/postrm_remove_databases"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
