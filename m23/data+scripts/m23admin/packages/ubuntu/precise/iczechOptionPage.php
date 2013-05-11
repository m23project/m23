<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iczech");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iczech/languages"]["type"]="text";
$elem["iczech/languages"]["description"]="Description:
";
$elem["iczech/languages"]["descriptionde"]="";
$elem["iczech/languages"]["descriptionfr"]="";
$elem["iczech/languages"]["default"]="czech (Czech)";
PKG_OptionPageTail2($elem);
?>
