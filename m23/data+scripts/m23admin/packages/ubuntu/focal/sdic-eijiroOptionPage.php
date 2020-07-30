<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sdic-eijiro");

$elem["sdic-eijiro/tmpdir"]["type"]="string";
$elem["sdic-eijiro/tmpdir"]["description"]="EIJIRO media/file location:
 Please specify the directory containing the EIJIRO dictionary files.
 .
 The default setting is appropriate if the EIJIRO CD-ROM is mounted on
 /media/cdrom.
";
$elem["sdic-eijiro/tmpdir"]["descriptionde"]="EIJIRO Medium-/Datei-Ort:
 Bitte geben Sie das Verzeichnis an, das die EIJIRO-Wörterbuchdateien enthält.
 .
 Die Standardeinstellung ist angemessen, wenn die EIJIRO-CD-ROM auf /media/cdrom eingehängt ist.
";
$elem["sdic-eijiro/tmpdir"]["descriptionfr"]="Emplacement du support ou du fichier EIJIRO :
 Veuillez indiquer le répertoire contenant les fichiers du dictionnaire EIJIRO.
 .
 Le réglage par défaut est adapté si le CD EIJIRO est monté sur /media/cdrom.
";
$elem["sdic-eijiro/tmpdir"]["default"]="/media/cdrom/eijiro";
PKG_OptionPageTail2($elem);
?>
