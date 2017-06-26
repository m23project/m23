<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnome-speech-ibmtts");

$elem["gnome-speech-ibmtts/ibmtts_dir"]["type"]="string";
$elem["gnome-speech-ibmtts/ibmtts_dir"]["description"]="IBMTTS installation directory:
 IBMTTS include files and shared libraries are required to compile
 the viavoice backend for GNOME Speech.
 .
 Please enter the directory where the IBMTTS engine is installed.
";
$elem["gnome-speech-ibmtts/ibmtts_dir"]["descriptionde"]="IBMTTS-Installationsverzeichnis:
 Zum Übersetzen des viavoice-Backends für GNOME Speech werden die Laufzeit-Bibliotheken und Include-Dateien von IBMTTS benötigt.
 .
 Bitte geben Sie das Verzeichnis ein, in dem die IBMTTS-Programme installiert sind.
";
$elem["gnome-speech-ibmtts/ibmtts_dir"]["descriptionfr"]="Répertoire d'installation d'« IBMTTS » :
 « IBMTTS » fournit les fichiers et les bibliothèques indispensables pour la compilation du moteur « viavoice » de « GNOME Speech ».
 .
 Veuillez indiquer le répertoire où le moteur « IBMTTS » est installé.
";
$elem["gnome-speech-ibmtts/ibmtts_dir"]["default"]="/opt/IBM/ibmtts";
PKG_OptionPageTail2($elem);
?>
