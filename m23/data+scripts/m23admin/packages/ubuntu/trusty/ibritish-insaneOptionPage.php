<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibritish-insane");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibritish-insane/languages"]["type"]="text";
$elem["ibritish-insane/languages"]["description"]="Description:
";
$elem["ibritish-insane/languages"]["descriptionde"]="";
$elem["ibritish-insane/languages"]["descriptionfr"]="";
$elem["ibritish-insane/languages"]["default"]="british-insane (British English - insane)";
PKG_OptionPageTail2($elem);
?>
