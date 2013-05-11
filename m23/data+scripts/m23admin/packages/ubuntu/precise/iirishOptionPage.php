<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iirish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iirish/languages"]["type"]="text";
$elem["iirish/languages"]["description"]="Description:
";
$elem["iirish/languages"]["descriptionde"]="";
$elem["iirish/languages"]["descriptionfr"]="";
$elem["iirish/languages"]["default"]="Gaeilge (Irish)";
PKG_OptionPageTail2($elem);
?>
