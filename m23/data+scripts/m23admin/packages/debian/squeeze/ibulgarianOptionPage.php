<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibulgarian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibulgarian/languages"]["type"]="text";
$elem["ibulgarian/languages"]["description"]="Description:
";
$elem["ibulgarian/languages"]["descriptionde"]="";
$elem["ibulgarian/languages"]["descriptionfr"]="";
$elem["ibulgarian/languages"]["default"]="български (Bulgarian)";
PKG_OptionPageTail2($elem);
?>
