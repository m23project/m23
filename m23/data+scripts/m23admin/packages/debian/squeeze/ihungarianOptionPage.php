<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ihungarian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ihungarian/languages"]["type"]="text";
$elem["ihungarian/languages"]["description"]="Description:
";
$elem["ihungarian/languages"]["descriptionde"]="";
$elem["ihungarian/languages"]["descriptionfr"]="";
$elem["ihungarian/languages"]["default"]="magyar (Hungarian)";
PKG_OptionPageTail2($elem);
?>
