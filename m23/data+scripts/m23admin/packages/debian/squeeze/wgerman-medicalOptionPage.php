<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wgerman-medical");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wgerman-medical/languages"]["type"]="text";
$elem["wgerman-medical/languages"]["description"]="Description:
";
$elem["wgerman-medical/languages"]["descriptionde"]="";
$elem["wgerman-medical/languages"]["descriptionfr"]="";
$elem["wgerman-medical/languages"]["default"]="Deutsche medizinische Wörter (German medical terms)";
PKG_OptionPageTail2($elem);
?>
