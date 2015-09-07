<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibritish-huge");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibritish-huge/languages"]["type"]="text";
$elem["ibritish-huge/languages"]["description"]="Description:
";
$elem["ibritish-huge/languages"]["descriptionde"]="";
$elem["ibritish-huge/languages"]["descriptionfr"]="";
$elem["ibritish-huge/languages"]["default"]="british-huge (British English - huge)";
PKG_OptionPageTail2($elem);
?>
