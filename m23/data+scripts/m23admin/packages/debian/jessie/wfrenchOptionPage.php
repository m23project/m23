<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wfrench");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wfrench/languages"]["type"]="text";
$elem["wfrench/languages"]["description"]="Description:
";
$elem["wfrench/languages"]["descriptionde"]="";
$elem["wfrench/languages"]["descriptionfr"]="";
$elem["wfrench/languages"]["default"]="francais (French)";
PKG_OptionPageTail2($elem);
?>
