<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifinnish-large");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ifinnish-large/languages"]["type"]="text";
$elem["ifinnish-large/languages"]["description"]="Description:
";
$elem["ifinnish-large/languages"]["descriptionde"]="";
$elem["ifinnish-large/languages"]["descriptionfr"]="";
$elem["ifinnish-large/languages"]["default"]="suomi (Finnish Large)";
PKG_OptionPageTail2($elem);
?>
