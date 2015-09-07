<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iukrainian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iukrainian/languages"]["type"]="text";
$elem["iukrainian/languages"]["description"]="Description:
";
$elem["iukrainian/languages"]["descriptionde"]="";
$elem["iukrainian/languages"]["descriptionfr"]="";
$elem["iukrainian/languages"]["default"]="ukrainian (Ukrainian)";
PKG_OptionPageTail2($elem);
?>
