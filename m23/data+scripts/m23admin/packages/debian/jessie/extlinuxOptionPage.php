<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("extlinux");

$elem["extlinux/title"]["type"]="title";
$elem["extlinux/title"]["description"]="EXTLINUX
";
$elem["extlinux/title"]["descriptionde"]="EXTLINUX
";
$elem["extlinux/title"]["descriptionfr"]="EXTLINUX
";
$elem["extlinux/title"]["default"]="";
$elem["extlinux/no-bootloader-integration"]["type"]="note";
$elem["extlinux/no-bootloader-integration"]["description"]="No bootloader integration code anymore
 The extlinux package does not ship bootloader integration anymore.
 .
 If you are upgrading to this version of EXTLINUX your system will not boot
 any longer if EXTLINUX was the only configured bootloader. Please install
 GRUB.
";
$elem["extlinux/no-bootloader-integration"]["descriptionde"]="Kein Code zum Systemladen mehr integriert
 Das Paket extlinux liefert keinen Code mehr zur Integration eines Systemladeprogramms (Bootloaders).
 .
 Falls Sie ein Upgrade auf diese Version von EXTLINUX durchführen, wird Ihr System nicht mehr starten, falls EXTLINUX das einzige konfigurierte Systemladeprogramm war. Bitte installieren Sie GRUB.
";
$elem["extlinux/no-bootloader-integration"]["descriptionfr"]="Plus d'intégration d'extlinux avec le chargeur d'amorçage
 Le paquet extlinux n'intègre plus de code gérant le chargeur d'amorçage.
 .
 Si vous mettez à niveau vers cette version d'EXTLINUX, le système ne démarrera plus si EXTLINUX était le seul chargeur d'amorçage configuré. Veuillez dans ce cas installer GRUB.
";
$elem["extlinux/no-bootloader-integration"]["default"]="";
PKG_OptionPageTail2($elem);
?>
