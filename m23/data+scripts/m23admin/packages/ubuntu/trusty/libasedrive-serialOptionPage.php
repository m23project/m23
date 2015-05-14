<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libasedrive-serial");

$elem["libasedrive-serial/port"]["type"]="select";
$elem["libasedrive-serial/port"]["choices"][1]="ttyS0";
$elem["libasedrive-serial/port"]["choices"][2]="ttyS1";
$elem["libasedrive-serial/port"]["choices"][3]="ttyS2";
$elem["libasedrive-serial/port"]["choices"][4]="ttyS3";
$elem["libasedrive-serial/port"]["choicesde"][1]="ttyS0";
$elem["libasedrive-serial/port"]["choicesde"][2]="ttyS1";
$elem["libasedrive-serial/port"]["choicesde"][3]="ttyS2";
$elem["libasedrive-serial/port"]["choicesde"][4]="ttyS3";
$elem["libasedrive-serial/port"]["choicesfr"][1]="ttyS0";
$elem["libasedrive-serial/port"]["choicesfr"][2]="ttyS1";
$elem["libasedrive-serial/port"]["choicesfr"][3]="ttyS2";
$elem["libasedrive-serial/port"]["choicesfr"][4]="ttyS3";
$elem["libasedrive-serial/port"]["description"]="Communication port to use with the smart card reader:
 The driver needs to know which serial port the Athena ASEDrive IIIe card
 reader is connected to.
";
$elem["libasedrive-serial/port"]["descriptionde"]="Serieller Port, der zur Kommunikation mit dem Smart-Chipkarten-Leser verwendet werden soll:
 Der Treiber muss wissen, an welcher seriellen Schnittstelle der Chipkarten-Leser Athena ASEDrive IIIe angeschlossen ist.
";
$elem["libasedrive-serial/port"]["descriptionfr"]="Port de communication à utiliser avec le lecteur de carte à puce :
 Le port série sur lequel est connecté le lecteur de carte à puce ASEDrive IIIe Athena doit être connu du pilote.
";
$elem["libasedrive-serial/port"]["default"]="";
PKG_OptionPageTail2($elem);
?>
