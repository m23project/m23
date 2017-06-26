<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xringd");

$elem["xringd/modem-device"]["type"]="string";
$elem["xringd/modem-device"]["description"]="Modem device:
 Please enter the name of the device the modem is connected to.
 .
 Xringd needs to poll a modem attached via a serial port. Please
 specify which serial port the modem uses (usually /dev/ttyS[0-4]).
";
$elem["xringd/modem-device"]["descriptionde"]="Modem-Gerät:
 Bitte geben Sie den Namen der Gerätedatei an, über die das Modem angeschlossen ist.
 .
 Xringd muss ein Modem abfragen, welches über einen seriellen Port angeschlossen ist. Bitte geben Sie den entsprechenden Anschluss Ihres Modems an (üblich ist /dev/ttyS[0-4]).
";
$elem["xringd/modem-device"]["descriptionfr"]="Périphérique du modem :
 Veuillez indiquer le nom du périphérique auquel le modem est connecté.
 .
 Xringd doit être à l'écoute d'un modem connecté via un port série. Veuillez indiquer le port série (généralement /dev/ttyS[0-4]) sur lequel le modem est connecté.
";
$elem["xringd/modem-device"]["default"]="/dev/ttyS0";
PKG_OptionPageTail2($elem);
?>
