<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnome-speech-dectalk");

$elem["gnome-speech-dectalk/dectalk_dir"]["type"]="string";
$elem["gnome-speech-dectalk/dectalk_dir"]["description"]="Fonix DECtalk installation directory:
 Fonix DECtalk include files and shared libraries are required to compile
 the dectalk backend for GNOME Speech.
 .
 Please enter the directory where the dectalk engine is installed.
";
$elem["gnome-speech-dectalk/dectalk_dir"]["descriptionde"]="Fonix DECtalk-Installationsverzeichnis:
 Zum Übersetzen des dectalk-Backends für GNOME Speech werden die Laufzeit-Bibliotheken und Include-Dateien von Fonix DECtalk benötigt.
 .
 Bitte geben Sie das Verzeichnis ein, in dem die dectalk-Programme installiert sind.
";
$elem["gnome-speech-dectalk/dectalk_dir"]["descriptionfr"]="Répertoire d'installation de « Fonix DECtalk » :
 « Fonix DECtalk » fournit les fichiers et les bibliothèques indispensables pour la compilation du moteur « dectalk » de « GNOME Speech ».
 .
 Veuillez indiquer le répertoire où le moteur « dectalk » est installé.
";
$elem["gnome-speech-dectalk/dectalk_dir"]["default"]="/usr/local";
PKG_OptionPageTail2($elem);
?>
