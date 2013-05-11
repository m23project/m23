<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cpuburn");

$elem["cpuburn/dangerous"]["type"]="note";
$elem["cpuburn/dangerous"]["description"]="cpuburn is dangerous for your system
 This program is designed to heavily load CPU chips. Undercooled,
 overclocked or otherwise weak systems may fail causing data loss
 (filesystem corruption) and possibly permanent damage to electronic
 components. Use at your own risk.
 .
 For more information, see /usr/share/doc/cpuburn/README.
";
$elem["cpuburn/dangerous"]["descriptionde"]="cpuburn ist gefährlich für Ihr System
 Dieses Programm wurde entwickelt, um CPU-Chips stark zu belasten. Mangelhaft gekühlte, übertaktete oder anderweitig schwache Systeme können versagen. Die Folgen können Datenverluste (Dateisystem-Korruption) und möglicherweise auch irreparable Schäden an elektronischen Bauteilen sein. Benutzung auf eigene Gefahr.
 .
 Für weitere Informationen siehe /usr/share/doc/cpuburn/README.
";
$elem["cpuburn/dangerous"]["descriptionfr"]="Programme cpuburn dangereux pour le système
 Ce programme est conçu pour charger lourdement le microprocesseur. Les systèmes mal refroidis, sur-cadencés, ou plus généralement fragiles, connaîtront certainement des problèmes. Cela peut entraîner une perte de données (par corruption du système de fichiers), et éventuellement des dommages permanents aux composants électroniques.
 .
 Pour plus d'informations, veuillez consultez le fichier /usr/share/doc/cpuburn/README.
";
$elem["cpuburn/dangerous"]["default"]="";
PKG_OptionPageTail2($elem);
?>
