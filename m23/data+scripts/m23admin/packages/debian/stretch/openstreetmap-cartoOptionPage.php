<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openstreetmap-carto");

$elem["openstreetmap-carto/database-name"]["type"]="string";
$elem["openstreetmap-carto/database-name"]["description"]="PostgreSQL database name:
 The openstreetmap-carto stylesheet uses a PostgreSQL database to
 store OpenStreetMap data.
 .
 Please choose the name for this database.
";
$elem["openstreetmap-carto/database-name"]["descriptionde"]="PostgreSQL-Datenbankname:
 Die Stilvorlage von OpenStreetMap-Carto verwendet eine PostgreSQL-Datenbank, um die OpenStreetMap-Dateien zu speichern.
 .
 Bitte wählen Sie einen Namen für diese Datenbank.
";
$elem["openstreetmap-carto/database-name"]["descriptionfr"]="Nom de la base de données PostgreSQL :
 La feuille de style openstreetmap-carto utilise une base de données PostgreSQL pour stocker les données d'OpenStreetMap.
 .
 Veuillez choisir le nom de cette base de données.
";
$elem["openstreetmap-carto/database-name"]["default"]="gis";
PKG_OptionPageTail2($elem);
?>
