<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iamerican");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iamerican/languages"]["type"]="text";
$elem["iamerican/languages"]["description"]="Description:
";
$elem["iamerican/languages"]["descriptionde"]="";
$elem["iamerican/languages"]["descriptionfr"]="";
$elem["iamerican/languages"]["default"]="american (American English)";
PKG_OptionPageTail2($elem);
?>
