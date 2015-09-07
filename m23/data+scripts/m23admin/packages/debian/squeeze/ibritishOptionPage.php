<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibritish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibritish/languages"]["type"]="text";
$elem["ibritish/languages"]["description"]="Description:
";
$elem["ibritish/languages"]["descriptionde"]="";
$elem["ibritish/languages"]["descriptionfr"]="";
$elem["ibritish/languages"]["default"]="british (British English)";
PKG_OptionPageTail2($elem);
?>
