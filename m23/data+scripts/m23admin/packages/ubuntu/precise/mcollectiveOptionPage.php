<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mcollective");

$elem["mcollective/start_on_boot"]["type"]="boolean";
$elem["mcollective/start_on_boot"]["description"]="Should MCollective started onboot?
 Start MCollective daemon onboot.
";
$elem["mcollective/start_on_boot"]["descriptionde"]="";
$elem["mcollective/start_on_boot"]["descriptionfr"]="";
$elem["mcollective/start_on_boot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
