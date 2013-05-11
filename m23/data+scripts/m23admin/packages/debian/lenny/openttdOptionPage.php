<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openttd");

$elem["openttd/datafiles"]["type"]="error";
$elem["openttd/datafiles"]["description"]="Data files needed
 For its operation, OpenTTD needs the data files from the original
 Transport Tycoon Deluxe game.
 .
 See the /usr/share/doc/openttd/README.Debian file for more details
 about the needed files and their location.
";
$elem["openttd/datafiles"]["descriptionde"]="Benötigte Datendateien
 Zum Betrieb benötigt OpenTTD Datendateien aus dem Originalspiel Transport Tycoon Deluxe.
 .
 Lesen Sie die Datei /usr/share/doc/openttd/README.Debian für weitere Details über die benötigten Dateien und ihren Ort.
";
$elem["openttd/datafiles"]["descriptionfr"]="Fichiers de données indispensables
 Pour fonctionner correctement, OpenTTD a besoin des fichiers de données du jeu « Transport Tycoon Deluxe » original.
 .
 Veuillez lire le fichier /usr/share/doc/openttd/README.Debian pour plus d'informations sur les fichiers requis et leur emplacement.
";
$elem["openttd/datafiles"]["default"]="";
PKG_OptionPageTail2($elem);
?>
