<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xringd");

$elem["xringd/modem-device"]["type"]="string";
$elem["xringd/modem-device"]["description"]="Which device is your modem connected to?
 Xringd needs to poll a modem, which connects to your machine via a serial
 port. Please enter which serial port (usually /dev/ttyS[0-4]) your modem
 is connected to.
";
$elem["xringd/modem-device"]["descriptionde"]="An welchen Anschluß ist Ihr Modem angeschlossen?
 Xringd muß ein Modem abfragen, welches an Ihren Rechner über einen seriellen Port angeschlossen ist. Bitte geben Sie den entsprechenden Anschluss Ihres Modems an (üblich ist /dev/ttyS[0-4]).
";
$elem["xringd/modem-device"]["descriptionfr"]="Sur quel port votre modem est-il connecté ?
 Xringd a besoin d'un modem connecté à votre machine via un port série. Veuillez indiquer le port (généralement /dev/ttyS[0-4]) sur lequel votre modem est connecté.
";
$elem["xringd/modem-device"]["default"]="/dev/ttyS0";
PKG_OptionPageTail2($elem);
?>
