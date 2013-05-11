<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("readahead");

$elem["readahead/profile-once"]["type"]="boolean";
$elem["readahead/profile-once"]["description"]="for internal use
 Profile once on the next boot
";
$elem["readahead/profile-once"]["descriptionde"]="";
$elem["readahead/profile-once"]["descriptionfr"]="";
$elem["readahead/profile-once"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
