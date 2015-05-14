<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("drizzle");

$elem["drizzle/purge_database"]["type"]="boolean";
$elem["drizzle/purge_database"]["description"]="Purging also database files?
 As you are purging the drizzle package you might also want to delete the database files in /var/lib/drizzle.
";
$elem["drizzle/purge_database"]["descriptionde"]="Datenbankdateien ebenfalls vollständig löschen?
 Da Sie das Paket Drizzle vollständig löschen, möchten Sie möglicherweise auch die Datenbankdateien in /var/lib/drizzle löschen.
";
$elem["drizzle/purge_database"]["descriptionfr"]="Faut-il aussi purger les fichiers de la base de données de drizzle ?
 La purge du paquet « drizzle » permet également d'effacer les fichiers de la base de données dans « /var/lib/drizzle ».
";
$elem["drizzle/purge_database"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
