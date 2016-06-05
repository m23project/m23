<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debian-installer-launcher");

$elem["debian-installer-launcher/kernel-mismatch/title"]["type"]="title";
$elem["debian-installer-launcher/kernel-mismatch/title"]["description"]="Kernel version mismatch
";
$elem["debian-installer-launcher/kernel-mismatch/title"]["descriptionde"]="Keine Übereinstimmung bei Kernel-Versionen
";
$elem["debian-installer-launcher/kernel-mismatch/title"]["descriptionfr"]="Versions différentes pour le noyau
";
$elem["debian-installer-launcher/kernel-mismatch/title"]["default"]="";
$elem["debian-installer-launcher/kernel-mismatch/error"]["type"]="error";
$elem["debian-installer-launcher/kernel-mismatch/error"]["description"]="Live system kernel and installer kernel don't match
 The installer can only be used if the kernel versions of the live system
 (${LIVE_KERNEL}) and of the installer (${DI_KERNEL}) are the same.
 .
 Please reboot with the correct kernel (${DI_KERNEL}).
";
$elem["debian-installer-launcher/kernel-mismatch/error"]["descriptionde"]="Live-System-Kernel und Installer-Kernel stimmen nicht überein
 Der Installer kann nur verwendet werden, wenn die Kernel-Versionen des Live-Systems (${LIVE_KERNEL}) und des Installers (${DI_KERNEL}) identisch sind.
 .
 Bitte starten Sie das System mit dem korrekten Kernel (${DI_KERNEL}) neu.
";
$elem["debian-installer-launcher/kernel-mismatch/error"]["descriptionfr"]="Noyaux du système autonome et du programme d'installation différents
 Le programme d'installation ne peut être utilisé que si les versions de noyau du système autonome (${LIVE_KERNEL}) et du programme d'installation (${DI_KERNEL}) sont identiques.
 .
 Veuillez redémarrer avec le noyau approprié (${DI_KERNEL}).
";
$elem["debian-installer-launcher/kernel-mismatch/error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
