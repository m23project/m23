<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iamerican-huge");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iamerican-huge/languages"]["type"]="text";
$elem["iamerican-huge/languages"]["description"]="Description:
";
$elem["iamerican-huge/languages"]["descriptionde"]="";
$elem["iamerican-huge/languages"]["descriptionfr"]="";
$elem["iamerican-huge/languages"]["default"]="american-huge (American English - huge)";
PKG_OptionPageTail2($elem);
?>
