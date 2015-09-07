<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iswedish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iswedish/languages"]["type"]="text";
$elem["iswedish/languages"]["description"]="Description:
";
$elem["iswedish/languages"]["descriptionde"]="";
$elem["iswedish/languages"]["descriptionfr"]="";
$elem["iswedish/languages"]["default"]="svenska (Swedish)";
PKG_OptionPageTail2($elem);
?>
