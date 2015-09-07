<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libgcr410");

$elem["libgcr410/port"]["type"]="select";
$elem["libgcr410/port"]["choices"][1]="ttyS0";
$elem["libgcr410/port"]["choices"][2]="ttyS1";
$elem["libgcr410/port"]["choices"][3]="ttyS2";
$elem["libgcr410/port"]["description"]="Serial port to which the smartcard reader is connected:
 The driver needs to know to which serial port the GemPlus GCR410 reader is
 connected.
";
$elem["libgcr410/port"]["descriptionde"]="Serieller Port, an den der Smartcard-Leser angeschlossen ist:
 Der Treiber muss wissen, mit welchem seriellen Anschluss der GemPlus GCR410-Kartenleser verbunden ist.
";
$elem["libgcr410/port"]["descriptionfr"]="Port série sur lequel est connecté le lecteur :
 Libgcr410 doit connaître le port série sur lequel est connecté le lecteur de carte GemPlus GCR410.
";
$elem["libgcr410/port"]["default"]="";
PKG_OptionPageTail2($elem);
?>
