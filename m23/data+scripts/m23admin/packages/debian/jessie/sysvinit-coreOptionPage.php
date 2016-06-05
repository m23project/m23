<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sysvinit-core");

$elem["sysvinit/hurd-fix-inittab"]["type"]="boolean";
$elem["sysvinit/hurd-fix-inittab"]["description"]="Update getty pathnames and add hurd-console?
 Your /etc/inittab seems to use /libexec/getty as getty and/or to miss
 hurd-console entry. The default inittab has been changed, however your
 /etc/inittab has been modified. Note that sysvinit has not been used
 to boot an Hurd system for long, so any errors in that file would not
 have shown up earlier.
 .
 If you allow this change, a backup will be stored in /etc/inittab.dpkg-old.
 .
 If you don't allow this change, an updated inittab will be written to
 /etc/inittab.dpkg-new. Please review the changes and update your
 /etc/inittab accordingly.
";
$elem["sysvinit/hurd-fix-inittab"]["descriptionde"]="";
$elem["sysvinit/hurd-fix-inittab"]["descriptionfr"]="";
$elem["sysvinit/hurd-fix-inittab"]["default"]="";
PKG_OptionPageTail2($elem);
?>
