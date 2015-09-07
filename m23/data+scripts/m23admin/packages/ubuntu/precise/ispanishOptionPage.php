<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ispanish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ispanish/languages"]["type"]="text";
$elem["ispanish/languages"]["description"]="Description:
";
$elem["ispanish/languages"]["descriptionde"]="";
$elem["ispanish/languages"]["descriptionfr"]="";
$elem["ispanish/languages"]["default"]="castellano8 (Spanish 8 bit)";
PKG_OptionPageTail2($elem);
?>
