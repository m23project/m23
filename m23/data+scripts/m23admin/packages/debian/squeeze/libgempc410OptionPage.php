<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libgempc410");

$elem["libgempc410/port"]["type"]="select";
$elem["libgempc410/port"]["choices"][1]="ttyS0";
$elem["libgempc410/port"]["choices"][2]="ttyS1";
$elem["libgempc410/port"]["choices"][3]="ttyS2";
$elem["libgempc410/port"]["choices"][4]="ttyS3";
$elem["libgempc410/port"]["choicesde"][1]="ttyS0";
$elem["libgempc410/port"]["choicesde"][2]="ttyS1";
$elem["libgempc410/port"]["choicesde"][3]="ttyS2";
$elem["libgempc410/port"]["choicesde"][4]="ttyS3";
$elem["libgempc410/port"]["choicesfr"][1]="ttyS0";
$elem["libgempc410/port"]["choicesfr"][2]="ttyS1";
$elem["libgempc410/port"]["choicesfr"][3]="ttyS2";
$elem["libgempc410/port"]["choicesfr"][4]="ttyS3";
$elem["libgempc410/port"]["description"]="Communication port to use with the smart card reader:
 The driver needs to know to which serial port the GemPC410 reader is
 connected.
";
$elem["libgempc410/port"]["descriptionde"]="Kommunikations-Port, der mit dem Chipkarten-Leser verwendet werden soll:
 Der Treiber muss wissen, an welchem seriellen Port der GemPC410 Chipkarten-Leser angesteckt ist.
";
$elem["libgempc410/port"]["descriptionfr"]="Port de communication à utiliser avec le lecteur de carte à puce :
 Il est nécessaire d'indiquer le port série sur lequel est connecté le lecteur de carte à puce GemPC410.
";
$elem["libgempc410/port"]["default"]="";
PKG_OptionPageTail2($elem);
?>
