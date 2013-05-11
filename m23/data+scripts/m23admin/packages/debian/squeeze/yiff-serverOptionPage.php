<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("yiff-server");

$elem["yiff-server/mixer"]["type"]="boolean";
$elem["yiff-server/mixer"]["description"]="Should yiff-server manage your sound card's mixer settings?
 Yiff-server comes with its own mixer settings capability.
 .
 This feature imposes Yiff's mixer settings every time yiff-server is
 started. If you opt for this, yiff-server will read in its mixer setting
 file from
 .
 /var/state/yiff/mixer
 .
 You may edit this file as you wish. 
 
";
$elem["yiff-server/mixer"]["descriptionde"]="Möchten Sie, dass Yiff-Server die Mischer-Einstellungen Ihrer Soundkarte verwaltet?
 Yiff-Server kommt mit seinen eigenen Fähigkeiten zur Misch-Einstellung.
 .
 Diese Funktionalität erlegt Yiff die Misch-Einstellungen bei jedem Start des Yiff-Servers auf. Falls Sie sich dafür entscheiden, wird der Yiff-Server seine Mischer-Einstellungen aus der Datei 
 .
 /var/state/yiff/mixer einlesen.
 .
 Sie können die Datei nach eigenen Wünschen bearbeiten.
";
$elem["yiff-server/mixer"]["descriptionfr"]="Faut-il que le serveur Yiff gère les réglages des volumes sonores de la carte son ?
 Le serveur Yiff peut adapter lui-même les réglages des volumes sonores.
 .
 Cette fonctionnalité impose que les réglages de table de mixage soient ceux de Yiff à chaque fois que le serveur Yiff est démarré. Si vous la choisissez, le serveur Yiff récupérera ses réglages de volumes sonores dans le fichier suivant :
 .
 /var/state/yiff/mixer
 .
 Vous pouvez modifier ce fichier à votre guise.
";
$elem["yiff-server/mixer"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
