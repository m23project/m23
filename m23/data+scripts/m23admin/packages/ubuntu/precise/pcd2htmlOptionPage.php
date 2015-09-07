<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pcd2html");

$elem["pcd2html/cdmount"]["type"]="string";
$elem["pcd2html/cdmount"]["description"]="Mount point for Kodak Photo CDs:
 Pcd2html prepares Kodak Photo CDs for web presentation.
 .
 Please specify the location where CDs are to be mounted.
";
$elem["pcd2html/cdmount"]["descriptionde"]="Mount Verzeichnis für Kodak Photo CDs:
 Pcd2html bereitet Kodak Photo CDs für die Web-Präsentation auf.
 .
 Bitte geben Sie das Verzeichnis an, in dem CDs eingebunden werden.
";
$elem["pcd2html/cdmount"]["descriptionfr"]="Point de montage pour les Photo-CD Kodak :
 Pcd2html prépare les Photo-CD Kodak pour une présentation en ligne.
 .
 Veuillez indiquer l'emplacement de montage de ces CD.
";
$elem["pcd2html/cdmount"]["default"]="/media/cdrom";
PKG_OptionPageTail2($elem);
?>
