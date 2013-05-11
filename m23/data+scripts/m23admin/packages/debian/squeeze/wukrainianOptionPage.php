<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wukrainian");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wukrainian/languages"]["type"]="text";
$elem["wukrainian/languages"]["description"]="Description:
";
$elem["wukrainian/languages"]["descriptionde"]="";
$elem["wukrainian/languages"]["descriptionfr"]="";
$elem["wukrainian/languages"]["default"]="ukrainian (Ukrainian)";
PKG_OptionPageTail2($elem);
?>
