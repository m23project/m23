<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibritish-large");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibritish-large/languages"]["type"]="text";
$elem["ibritish-large/languages"]["description"]="Description:
";
$elem["ibritish-large/languages"]["descriptionde"]="";
$elem["ibritish-large/languages"]["descriptionfr"]="";
$elem["ibritish-large/languages"]["default"]="british-large (British English - large)";
PKG_OptionPageTail2($elem);
?>
