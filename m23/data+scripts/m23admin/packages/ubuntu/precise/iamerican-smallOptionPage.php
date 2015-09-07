<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iamerican-small");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iamerican-small/languages"]["type"]="text";
$elem["iamerican-small/languages"]["description"]="Description:
";
$elem["iamerican-small/languages"]["descriptionde"]="";
$elem["iamerican-small/languages"]["descriptionfr"]="";
$elem["iamerican-small/languages"]["default"]="american-small (American English - small)";
PKG_OptionPageTail2($elem);
?>
