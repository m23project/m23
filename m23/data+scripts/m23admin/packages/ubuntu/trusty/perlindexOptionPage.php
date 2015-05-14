<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("perlindex");

$elem["perlindex/removeindexonpurge"]["type"]="boolean";
$elem["perlindex/removeindexonpurge"]["description"]="Remove the index when purging the package?
 perlindex creates some index files under /var/cache/perlindex/.
";
$elem["perlindex/removeindexonpurge"]["descriptionde"]="Den Index beim vollständigen löschen (»purge«) des Pakets entfernen?
 Perlindex erstellt einige Index-Dateien unter /var/cache/perlindex/.
";
$elem["perlindex/removeindexonpurge"]["descriptionfr"]="Faut-il supprimer l'index lors de la purge du paquet ?
 Perlindex crée des fichiers d'index dans /var/cache/perlindex/.
";
$elem["perlindex/removeindexonpurge"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
