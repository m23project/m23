<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("flashplugin-installer");

$elem["flashplugin-installer/local"]["type"]="string";
$elem["flashplugin-installer/local"]["description"]="Location to the local file:
 Have you already downloaded the .tar.gz
 package from the Internet? If so, please enter the directory you downloaded
 it into. Do not include the filename here. If you
 have not already downloaded it, leave this blank and the package will be
 downloaded automatically.

";
$elem["flashplugin-installer/local"]["descriptionde"]="";
$elem["flashplugin-installer/local"]["descriptionfr"]="";
$elem["flashplugin-installer/local"]["default"]="";
$elem["flashplugin-installer/not_exist"]["type"]="error";
$elem["flashplugin-installer/not_exist"]["description"]="File not found
 The .tar.gz file does not exist in the directory you entered.
 Please try again. Enter the path of the directory that the package is in
 (don't type the filename at the end of the path).
";
$elem["flashplugin-installer/not_exist"]["descriptionde"]="Datei nicht gefunden
 Die ».tar.gz«-Datei befindet sich nicht im angegebenen Verzeichnis. Bitte versuchen Sie es erneut. Geben Sie den Pfad zum Verzeichnis an, in dem sich das Paket befindet (den Dateinamen bitte nicht ans Ende des Pfades anfügen).
";
$elem["flashplugin-installer/not_exist"]["descriptionfr"]="Ficher introuvable
 L'archive .tar.gz n'existe pas dans le répertoire que vous avez indiqué. Veuillez recommencer et indiquer le répertoire contenant le fichier d'installation (seulement le répertoire, sans le nom du fichier).
";
$elem["flashplugin-installer/not_exist"]["default"]="";
PKG_OptionPageTail2($elem);
?>
