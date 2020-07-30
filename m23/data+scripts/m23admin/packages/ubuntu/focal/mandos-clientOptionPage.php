<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mandos-client");

$elem["mandos-client/key_id"]["type"]="note";
$elem["mandos-client/key_id"]["description"]="";
$elem["mandos-client/key_id"]["descriptionde"]="";
$elem["mandos-client/key_id"]["descriptionfr"]="";
$elem["mandos-client/key_id"]["default"]="";
PKG_OptionPageTail2($elem);
?>
