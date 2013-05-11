<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zope3-sandbox");

$elem["zope3-sandbox/internal"]["type"]="note";
$elem["zope3-sandbox/internal"]["description"]="Internal use.
";
$elem["zope3-sandbox/internal"]["descriptionde"]="";
$elem["zope3-sandbox/internal"]["descriptionfr"]="";
$elem["zope3-sandbox/internal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
