<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("igalician-minimos");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["igalician-minimos/languages"]["type"]="text";
$elem["igalician-minimos/languages"]["description"]="Description:
";
$elem["igalician-minimos/languages"]["descriptionde"]="";
$elem["igalician-minimos/languages"]["descriptionfr"]="";
$elem["igalician-minimos/languages"]["default"]="galego-minimos (Galician-minimos)";
PKG_OptionPageTail2($elem);
?>
