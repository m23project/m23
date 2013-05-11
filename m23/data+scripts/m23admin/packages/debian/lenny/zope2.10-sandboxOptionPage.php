<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zope2.10-sandbox");

$elem["zope2.10-sandbox/internal"]["type"]="note";
$elem["zope2.10-sandbox/internal"]["description"]="Internal use
";
$elem["zope2.10-sandbox/internal"]["descriptionde"]="";
$elem["zope2.10-sandbox/internal"]["descriptionfr"]="";
$elem["zope2.10-sandbox/internal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
