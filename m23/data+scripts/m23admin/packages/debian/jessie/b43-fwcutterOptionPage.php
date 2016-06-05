<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("b43-fwcutter");

$elem["b43-fwcutter/install-unconditional"]["type"]="boolean";
$elem["b43-fwcutter/install-unconditional"]["description"]="Install b43 firmware even if no such device is present?
 The b43 packages are designed to handle firmware for Broadcom 43xx
 wireless network cards.
 .
 Please choose whether they should download and install firmware even
 if the corresponding hardware is not currently present on the system.
 .
 This might be useful if you plan to move this installation to different
 hardware or share the same installation across multiple systems.
";
$elem["b43-fwcutter/install-unconditional"]["descriptionde"]="B43-Firmware installieren, obwohl kein derartiges Gerät vorhanden ist?
 Die B43-Pakete wurden zur Handhabung der Firmware von drahtlosen Broadcom-43xx-Netzwerkkarten entworfen.
 .
 Bitte wählen Sie, ob Sie die Firmware herunterladen und installieren möchten, obwohl die zugehörige Hardware derzeit nicht im System vorhanden ist.
 .
 Dies kann nützlich sein, falls Sie planen, die Installation auf unterschiedliche Hardware zu verschieben oder dieselbe Installation über mehrere Systeme hinweg gemeinsam zu benutzen.
";
$elem["b43-fwcutter/install-unconditional"]["descriptionfr"]="Faut-il installer le micrologiciel b43 même si un tel périphérique est absent ?
 Les paquets b43 sont destinés à gérer le micrologiciel pour les cartes réseau sans-fil Broadcom 43xx.
 .
 Veuillez indiquer s'ils doivent télécharger et installer le micrologiciel même si le périphérique correspondant n'est actuellement pas présent sur le système.
 .
 Cela pourrait être utile si vous prévoyez de déplacer cette installation sur du matériel différent ou de partager la même installation sur plusieurs systèmes.
";
$elem["b43-fwcutter/install-unconditional"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
