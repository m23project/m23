<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ilithuanian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ilithuanian/languages"]["type"]="text";
$elem["ilithuanian/languages"]["description"]="Description:
";
$elem["ilithuanian/languages"]["descriptionde"]="";
$elem["ilithuanian/languages"]["descriptionfr"]="";
$elem["ilithuanian/languages"]["default"]="lietuvių (Lithuanian)";
PKG_OptionPageTail2($elem);
?>
