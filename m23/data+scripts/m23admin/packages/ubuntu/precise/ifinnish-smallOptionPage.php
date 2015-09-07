<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifinnish-small");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ifinnish-small/languages"]["type"]="text";
$elem["ifinnish-small/languages"]["description"]="Description:
";
$elem["ifinnish-small/languages"]["descriptionde"]="";
$elem["ifinnish-small/languages"]["descriptionfr"]="";
$elem["ifinnish-small/languages"]["default"]="suomi (Finnish Small)";
PKG_OptionPageTail2($elem);
?>
