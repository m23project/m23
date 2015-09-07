<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iesperanto");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iesperanto/languages"]["type"]="text";
$elem["iesperanto/languages"]["description"]="Description:
";
$elem["iesperanto/languages"]["descriptionde"]="";
$elem["iesperanto/languages"]["descriptionfr"]="";
$elem["iesperanto/languages"]["default"]="esperanto (Esperanto)";
PKG_OptionPageTail2($elem);
?>
