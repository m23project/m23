<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("publicfile-installer");

$elem["publicfile-installer/build"]["type"]="boolean";
$elem["publicfile-installer/build"]["description"]="Do you want to get and build publicfile now?
 Choose wether publicfile should be downloaded and built now.
 If you choose not to do this now, you can perform the actions manually later,
 by running the 'get-publicfile' command (as a normal user, not root) and
 following the instructions.
 .
 If you choose to get and build now, both these actions will be performed
 as root.  For security-aware sites, this might be not appropriate.
 Once the software has been built, instructions on how to install the
 package will be printed on the screen.  You'll have to run that command
 once the current system update has been finished.
";
$elem["publicfile-installer/build"]["descriptionde"]="";
$elem["publicfile-installer/build"]["descriptionfr"]="";
$elem["publicfile-installer/build"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
