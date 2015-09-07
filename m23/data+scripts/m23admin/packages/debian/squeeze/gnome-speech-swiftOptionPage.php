<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnome-speech-swift");

$elem["gnome-speech-swift/swift_dir"]["type"]="string";
$elem["gnome-speech-swift/swift_dir"]["description"]="Cepstral swift installation directory:
 Cepstral swift include files and shared libraries are required
 to compile the swift backend for GNOME Speech.
 .
 Please enter the directory where the swift engine is installed.
";
$elem["gnome-speech-swift/swift_dir"]["descriptionde"]="Cepstral swift-Installationsverzeichnis:
 Zum Übersetzen des swift-Backends für GNOME Speech werden die Laufzeit-Bibliotheken und Include-Dateien von Cepstral swift benötigt.
 .
 Bitte geben Sie das Verzeichnis ein, in dem die swift-Programme installiert sind.
";
$elem["gnome-speech-swift/swift_dir"]["descriptionfr"]="Répertoire d'installation de « Cepstral swift » :
 « Cepstral swift » fournit les fichiers et les bibliothèques indispensables pour la compilation du moteur « swift » de « GNOME Speech ».
 .
 Veuillez indiquer le répertoire où le moteur « swift » est installé.
";
$elem["gnome-speech-swift/swift_dir"]["default"]="/opt/swift";
PKG_OptionPageTail2($elem);
?>
