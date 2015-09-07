<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("extlinux");

$elem["extlinux/install"]["type"]="boolean";
$elem["extlinux/install"]["description"]="Should EXTLINUX be installed to the MBR?
 If you choose this option, EXTLINUX will be automatically written to the
 MBR of your disk. The current MBR will be saved to a file in /boot.
 .
 Otherwise, EXTLINUX can be manually setup as described in
 /usr/share/doc/extlinux/README.Debian.
 .
 Note: The automatic installation currently only works if your root
 partition is on the disk to which MBR extlinux should be installed into.
";
$elem["extlinux/install"]["descriptionde"]="Soll EXTLINUX in den MBR installiert werden?
 Falls Sie diese Option auswählen, wird EXTLINUX automatisch in den MBR ihrer Festplatte geschrieben. Der aktuelle MBR wird in eine Datei in /boot gesichert.
 .
 Andernfalls kann EXTLINUX wie in /usr/share/doc/extlinux/README.Debian beschrieben manuell installiert werden.
 .
 Achtung: Die automatische Installation funktioniert derzeit nur dann, wenn die root Partition sich auf der Festplatte befindet, in dessen MBR extlinux installiert werden soll.
";
$elem["extlinux/install"]["descriptionfr"]="EXTLINUX doit-il être installé sur le secteur d'amorçage ?
 Si vous choisissez cette option, EXTLINUX sera automatiquement installé sur le secteur d'amorçage (« Master Boot Record ») du disque. Le secteur d'amorçage actuel sera sauvegardé dans un fichier qui sera conservé dans /boot.
 .
 Alternativement, vous pouvez installer EXTLINUX vous-même comme décrit dans /usr/share/doc/extlinux/README.Debian.
 .
 Veuillez noter que l'installation automatique ne fonctionne que si la partition racine est située sur le disque où le secteur d'amorçage EXTLINUX doit être installé.
";
$elem["extlinux/install"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
