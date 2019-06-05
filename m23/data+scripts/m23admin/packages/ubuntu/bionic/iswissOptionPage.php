<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iswiss");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iswiss/languages"]["type"]="text";
$elem["iswiss/languages"]["description"]="Description:
";
$elem["iswiss/languages"]["descriptionde"]="";
$elem["iswiss/languages"]["descriptionfr"]="";
$elem["iswiss/languages"]["default"]="deutsch (Swiss German -tex mode-), deutsch (Swiss German 8 bit)";
PKG_OptionPageTail2($elem);
?>
