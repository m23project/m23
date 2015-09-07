<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("imanx");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["imanx/languages"]["type"]="text";
$elem["imanx/languages"]["description"]="Description:

";
$elem["imanx/languages"]["descriptionde"]="";
$elem["imanx/languages"]["descriptionfr"]="";
$elem["imanx/languages"]["default"]="Gaelg (Manx Gaelic)";
$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["imanx/languages"]["type"]="text";
$elem["imanx/languages"]["description"]="Description:

";
$elem["imanx/languages"]["descriptionde"]="";
$elem["imanx/languages"]["descriptionfr"]="";
$elem["imanx/languages"]["default"]="Gaelg (Manx Gaelic)";
$elem["imanx/gather-translations"]["type"]="text";
$elem["imanx/gather-translations"]["description"]="Description:
";
$elem["imanx/gather-translations"]["descriptionde"]="";
$elem["imanx/gather-translations"]["descriptionfr"]="";
$elem["imanx/gather-translations"]["default"]="Gaelg (Manx Gaelic)";
PKG_OptionPageTail2($elem);
?>
