<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phalanx");

$elem["phalanx/learning_file_size"]["type"]="string";
$elem["phalanx/learning_file_size"]["description"]="Learning file size (1-999999):
 The learning file may improve Phalanx strength. Each item in this
 file uses 8 bytes.
 .
 Please specify a number in the range 1-999999. The size may be
 changed later by reconfiguring the package but this will erase any
 data the file may then contain.
";
$elem["phalanx/learning_file_size"]["descriptionde"]="Größe der Lerndatei (1-999999):
 Die Lerndatei verbessert die Spielstärke von Phalanx. Jeder Eintrag in dieser Datei verwendet 8 Byte.
 .
 Sie können eine Größe von 1 bis 999999 auswählen. Die Größe kann später von Ihnen angepasst werden, indem Sie das Paket neu konfigurieren, jedoch gehen dabei alle Inhalte der Datei verloren.
";
$elem["phalanx/learning_file_size"]["descriptionfr"]="Taille du fichier d'apprentissage (1-999999) :
 Le fichier d'apprentissage permet à Phalanx de devenir plus fort. Chaque entrée de ce fichier occupe 8 octets.
 .
 Veuillez indiquer un nombre compris entre 1 et 999999. Cette valeur pourra être modifiée par la suite en reconfigurant le paquet mais cela supprimera toutes les données contenues dans le fichier.
";
$elem["phalanx/learning_file_size"]["default"]="32768";
$elem["phalanx/learning_file_erase"]["type"]="boolean";
$elem["phalanx/learning_file_erase"]["description"]="Really change the size of the learning file and erase its data?
 You chose to change the size of the learning file used by phalanx
 for improving its strength.  This will erase all the learned data.
";
$elem["phalanx/learning_file_erase"]["descriptionde"]="Soll die Größe der Lerndatei geändert werden? Dabei geht deren Inhalt verloren.
 Sie haben angegeben, das Sie die Größe der Lerndatei verändern wollen. Die Lerndatei verbessert die Erfolgsquote von Phalanx. Die Änderung löscht die gesamten erlernten Daten.
";
$elem["phalanx/learning_file_erase"]["descriptionfr"]="Faut-il vraiment changer la taille du fichier et perdre ses données?
 Vous avez choisi de modifier la taille du fichier d'apprentissage utilisé par Phalanx pour en améliorer les performances. Cela supprimera toutes les données mémorisées.
";
$elem["phalanx/learning_file_erase"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
