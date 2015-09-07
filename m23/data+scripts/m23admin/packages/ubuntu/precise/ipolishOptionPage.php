<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipolish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ipolish/languages"]["type"]="text";
$elem["ipolish/languages"]["description"]="Description:
";
$elem["ipolish/languages"]["descriptionde"]="";
$elem["ipolish/languages"]["descriptionfr"]="";
$elem["ipolish/languages"]["default"]="polish (Polish)";
PKG_OptionPageTail2($elem);
?>
