<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("solr-common");

$elem["solr/purgeindexfiles"]["type"]="boolean";
$elem["solr/purgeindexfiles"]["description"]="Remove Solr index files?
 The Solr data directory (/var/lib/solr), and the index files it contains, may
 be removed while purging the package.
 .
 You should not choose this option if you intend to re-use Solr's index
 files later.
";
$elem["solr/purgeindexfiles"]["descriptionde"]="Solr-Indexdateien entfernen?
 Das Datenverzeichnis von Solr (/var/lib/solr) und die darin liegenden Indexdateien können beim vollständigen Löschen (»purge«) des Pakets entfernt werden.
 .
 Sie sollten diese Option nicht verwenden, falls Sie planen, die Indexdateien von Solr später erneut zu verwenden.
";
$elem["solr/purgeindexfiles"]["descriptionfr"]="Faut-il supprimer les fichiers d'index ?
 Le répertoire de données de Solr (/var/lib/solr) et les fichiers d'index qu'il contient peuvent être supprimés si le paquet est purgé. 
 .
 Il vaut mieux ne pas choisir cette option si vous souhaitez ré-utiliser ultérieurement les fichiers d'index de Solr.
";
$elem["solr/purgeindexfiles"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
