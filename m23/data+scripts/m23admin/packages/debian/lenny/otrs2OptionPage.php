<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("otrs2");

$elem["otrs2/resetdbuser"]["type"]="boolean";
$elem["otrs2/resetdbuser"]["description"]="";
$elem["otrs2/resetdbuser"]["descriptionde"]="";
$elem["otrs2/resetdbuser"]["descriptionfr"]="";
$elem["otrs2/resetdbuser"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
