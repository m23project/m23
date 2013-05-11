<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifinnish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ifinnish/languages"]["type"]="text";
$elem["ifinnish/languages"]["description"]="Description:
";
$elem["ifinnish/languages"]["descriptionde"]="";
$elem["ifinnish/languages"]["descriptionfr"]="";
$elem["ifinnish/languages"]["default"]="suomi (Finnish Medium)";
PKG_OptionPageTail2($elem);
?>
