<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("google-android-platform-12-installer");

$elem["google-android-installers/mirror"]["type"]="select";
$elem["google-android-installers/mirror"]["choices"][1]="https://dl.google.com";
$elem["google-android-installers/mirror"]["choices"][2]="http://mirrors.neusoft.edu.cn";
$elem["google-android-installers/mirror"]["description"]="Mirror to download packages ?
 Please select your prefered mirror to download Google's Android packages from.
";
$elem["google-android-installers/mirror"]["descriptionde"]="Von welchem Spiegelserver sollen die Pakete heruntergeladen werden?
 Bitte wählen Sie Ihren bevorzugten Spiegelserver aus, von dem Googles Android-Pakete heruntergeladen werden sollen.
";
$elem["google-android-installers/mirror"]["descriptionfr"]="Quel miroir pour télécharger les paquets ?
 Veuillez choisir votre miroir préféré pour télécharger les paquets Android de Google.
";
$elem["google-android-installers/mirror"]["default"]="https://dl.google.com";
PKG_OptionPageTail2($elem);
?>
