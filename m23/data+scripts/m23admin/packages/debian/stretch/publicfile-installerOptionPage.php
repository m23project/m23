<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("publicfile-installer");

$elem["publicfile-installer/build"]["type"]="boolean";
$elem["publicfile-installer/build"]["description"]="Download and build publicfile now?
 Please choose whether publicfile should be downloaded and built now.
 If you choose not to do this now, you can perform the actions manually later,
 by running the \"get-publicfile\" command (as an unpriviliged user, not
 as root) and
 following the instructions.
 .
 If you choose to download and build publicfile now, both these actions will be performed
 as root. For security-aware sites, this might be not appropriate.
 .
 Once the software has been built, run the \"install-publicfile\" command
 (as root) to install the package.
";
$elem["publicfile-installer/build"]["descriptionde"]="";
$elem["publicfile-installer/build"]["descriptionfr"]="";
$elem["publicfile-installer/build"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
