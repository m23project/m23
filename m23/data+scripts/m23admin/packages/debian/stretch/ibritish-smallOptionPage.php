<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibritish-small");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibritish-small/languages"]["type"]="text";
$elem["ibritish-small/languages"]["description"]="Description:
";
$elem["ibritish-small/languages"]["descriptionde"]="";
$elem["ibritish-small/languages"]["descriptionfr"]="";
$elem["ibritish-small/languages"]["default"]="british-small (British English - small)";
PKG_OptionPageTail2($elem);
?>
