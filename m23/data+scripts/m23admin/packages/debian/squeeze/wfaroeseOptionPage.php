<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wfaroese");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wfaroese/languages"]["type"]="text";
$elem["wfaroese/languages"]["description"]="Description:
";
$elem["wfaroese/languages"]["descriptionde"]="";
$elem["wfaroese/languages"]["descriptionfr"]="";
$elem["wfaroese/languages"]["default"]="foeroyskt (Faroese)";
PKG_OptionPageTail2($elem);
?>
