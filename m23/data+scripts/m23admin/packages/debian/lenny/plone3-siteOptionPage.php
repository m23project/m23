<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("plone3-site");

$elem["plone-site/internal"]["type"]="note";
$elem["plone-site/internal"]["description"]="Internal use
";
$elem["plone-site/internal"]["descriptionde"]="";
$elem["plone-site/internal"]["descriptionfr"]="";
$elem["plone-site/internal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
