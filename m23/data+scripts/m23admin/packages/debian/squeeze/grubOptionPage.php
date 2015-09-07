<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub");

$elem["grub/migrate_from_legacy"]["type"]="note";
$elem["grub/migrate_from_legacy"]["description"]="Upgrading from GRUB Legacy.
 GRUB 0.97, the Legacy version of GNU GRUB, is from now on considered a
 deprecated option.  Your system is now being upgraded to GRUB 2.
 .
 GRUB 2 features a more advanced architecture, it's much more robust, and
 provides a number of new features.  However, not all features provided by
 GRUB Legacy are implemented in GRUB 2.
 .
 If for some reason you want to continue using GRUB Legacy, it is now provided
 in the `grub-legacy' package.  It will continue being supported at least up
 until the Squeeze release.
";
$elem["grub/migrate_from_legacy"]["descriptionde"]="";
$elem["grub/migrate_from_legacy"]["descriptionfr"]="";
$elem["grub/migrate_from_legacy"]["default"]="";
PKG_OptionPageTail2($elem);
?>
