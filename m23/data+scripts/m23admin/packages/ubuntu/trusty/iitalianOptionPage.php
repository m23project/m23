<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iitalian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iitalian/languages"]["type"]="text";
$elem["iitalian/languages"]["description"]="Description:
";
$elem["iitalian/languages"]["descriptionde"]="";
$elem["iitalian/languages"]["descriptionfr"]="";
$elem["iitalian/languages"]["default"]="italiano (Italian)";
PKG_OptionPageTail2($elem);
?>
