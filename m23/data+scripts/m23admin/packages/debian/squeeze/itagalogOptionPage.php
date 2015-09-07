<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("itagalog");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["itagalog/languages"]["type"]="text";
$elem["itagalog/languages"]["description"]="Description:
";
$elem["itagalog/languages"]["descriptionde"]="";
$elem["itagalog/languages"]["descriptionfr"]="";
$elem["itagalog/languages"]["default"]="tagalog (Tagalog Filipino)";
PKG_OptionPageTail2($elem);
?>
