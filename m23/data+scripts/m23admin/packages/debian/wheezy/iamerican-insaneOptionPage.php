<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iamerican-insane");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iamerican-insane/languages"]["type"]="text";
$elem["iamerican-insane/languages"]["description"]="Description:
";
$elem["iamerican-insane/languages"]["descriptionde"]="";
$elem["iamerican-insane/languages"]["descriptionfr"]="";
$elem["iamerican-insane/languages"]["default"]="american-insane (American English - insane)";
PKG_OptionPageTail2($elem);
?>
