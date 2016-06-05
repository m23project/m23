<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifaroese");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ifaroese/languages"]["type"]="text";
$elem["ifaroese/languages"]["description"]="Description:
";
$elem["ifaroese/languages"]["descriptionde"]="";
$elem["ifaroese/languages"]["descriptionfr"]="";
$elem["ifaroese/languages"]["default"]="foeroyskt (Faroese)";
PKG_OptionPageTail2($elem);
?>
