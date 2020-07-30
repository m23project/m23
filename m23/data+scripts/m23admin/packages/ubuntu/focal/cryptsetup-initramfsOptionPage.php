<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cryptsetup-initramfs");

$elem["cryptsetup-initramfs/prerm_active_mappings"]["type"]="boolean";
$elem["cryptsetup-initramfs/prerm_active_mappings"]["description"]="Continue with cryptsetup-initramfs removal?
 This system has unlocked dm-crypt devices: ${cryptmap}
 .
 If these devices are managed with cryptsetup and need to be present at
 initramfs stage, then you might be unable to boot your system after the
 package removal.
";
$elem["cryptsetup-initramfs/prerm_active_mappings"]["descriptionde"]="";
$elem["cryptsetup-initramfs/prerm_active_mappings"]["descriptionfr"]="";
$elem["cryptsetup-initramfs/prerm_active_mappings"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
