<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("b43-fwcutter");

$elem["b43-fwcutter/cut_firmware"]["type"]="boolean";
$elem["b43-fwcutter/cut_firmware"]["description"]="Fetch and extract firmware?
 The bcm43xx driver needs extracted firmware - which cannot be shipped - to
 be working. This firmware can be automatically fetched and extracted as
 part of installing this package.
";
$elem["b43-fwcutter/cut_firmware"]["descriptionde"]="Firmware holen und extrahieren?
 Der bcm43xx-Treiber benötigt extrahierte Firmware - welche nicht mitgeliefert werden kann - um zu funktionieren. Diese Firmware kann während der Paketinstallation automatisch geholt und extrahiert werden.
";
$elem["b43-fwcutter/cut_firmware"]["descriptionfr"]="Faut-il extraire le microcode ?
 Le pilote bcm43xx a besoin d'extraire le microcode (« firmware ») pour fonctionner (celui-ci ne peut pas être empaqueté). Ce microcode peut être automatiquement récupéré et extrait durant l'installation de ce paquet.
";
$elem["b43-fwcutter/cut_firmware"]["default"]="";
PKG_OptionPageTail2($elem);
?>
