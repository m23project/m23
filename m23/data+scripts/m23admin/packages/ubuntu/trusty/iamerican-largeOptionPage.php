<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iamerican-large");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iamerican-large/languages"]["type"]="text";
$elem["iamerican-large/languages"]["description"]="Description:
";
$elem["iamerican-large/languages"]["descriptionde"]="";
$elem["iamerican-large/languages"]["descriptionfr"]="";
$elem["iamerican-large/languages"]["default"]="american-large (American English - large)";
PKG_OptionPageTail2($elem);
?>
