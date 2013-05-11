<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("etcinsvk");

$elem["etcinsvk/enabled"]["type"]="boolean";
$elem["etcinsvk/enabled"]["description"]="Do you want to enable etcinsvk on your system?
 This template is for preseeding only, and should not be translated.
";
$elem["etcinsvk/enabled"]["descriptionde"]="";
$elem["etcinsvk/enabled"]["descriptionfr"]="";
$elem["etcinsvk/enabled"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
