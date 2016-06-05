<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icatalan");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["icatalan/languages"]["type"]="text";
$elem["icatalan/languages"]["description"]="Description:
";
$elem["icatalan/languages"]["descriptionde"]="";
$elem["icatalan/languages"]["descriptionfr"]="";
$elem["icatalan/languages"]["default"]="catala8 (Catalan 8 bits)";
PKG_OptionPageTail2($elem);
?>
