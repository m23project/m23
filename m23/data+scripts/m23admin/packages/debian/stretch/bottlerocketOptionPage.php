<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bottlerocket");

$elem["bottlerocket/x10_port"]["type"]="string";
$elem["bottlerocket/x10_port"]["description"]="Serial device for bottlerocket to access:
 BottleRocket requires the use of a serial device to access the X10
 FireCracker interface.
";
$elem["bottlerocket/x10_port"]["descriptionde"]="Serielles Gerät auf das Bottlerocket zugreifen soll:
 BottleRocket benötigt ein serielles Gerät, um auf die X10 FireCracker-Schnittstelle zugreifen zu können.
";
$elem["bottlerocket/x10_port"]["descriptionfr"]="Nom du périphérique série qu'utilisera BottleRocket :
 BottleRocket doit pouvoir utiliser un périphérique série pour accéder à l'interface X10 FireCracker.
";
$elem["bottlerocket/x10_port"]["default"]="ttyS0";
PKG_OptionPageTail2($elem);
?>
