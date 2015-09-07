<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("radioclk");

$elem["radioclk/serialport"]["type"]="string";
$elem["radioclk/serialport"]["description"]="Serial port the radio receiver is connected to:
 Your time signal receiver should be connected to a serial port.
 Please enter the device name of the serial port, without the /dev/
 part.
 .
 Example: for the second serial port, /dev/ttyS1, enter ttyS1.
";
$elem["radioclk/serialport"]["descriptionde"]="Serieller Port, an den der Empfänger angeschlossen ist:
 Ihr Zeitsignal-Empfänger sollte mit einem seriellen Anschluss verbunden sein. Bitte geben Sie den Gerätenamen der Schnittstelle ein, ohne »/dev/«.
 .
 Beispiel: für den zweiten seriellen Port (/dev/ttyS1) geben Sie ttyS1 ein.
";
$elem["radioclk/serialport"]["descriptionfr"]="Port série sur lequel e récepteur radio est connecté :
 Votre récepteur de signal d'horloge devrait être connecté sur un port série. Veuillez indiquer le nom de ce port série, sans la partie « /dev/ ».
 .
 Par exemple : pour le second port série, /dev/ttyS1, indiquez ttyS1.
";
$elem["radioclk/serialport"]["default"]="ttyS0";
PKG_OptionPageTail2($elem);
?>
