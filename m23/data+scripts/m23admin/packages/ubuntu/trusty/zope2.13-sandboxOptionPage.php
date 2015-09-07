<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zope2.13-sandbox");

$elem["zope2.13-sandbox/internal"]["type"]="note";
$elem["zope2.13-sandbox/internal"]["description"]="for internal use
";
$elem["zope2.13-sandbox/internal"]["descriptionde"]="";
$elem["zope2.13-sandbox/internal"]["descriptionfr"]="";
$elem["zope2.13-sandbox/internal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
