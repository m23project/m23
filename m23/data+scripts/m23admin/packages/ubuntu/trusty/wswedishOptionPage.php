<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wswedish");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wswedish/languages"]["type"]="text";
$elem["wswedish/languages"]["description"]="Description:
";
$elem["wswedish/languages"]["descriptionde"]="";
$elem["wswedish/languages"]["descriptionfr"]="";
$elem["wswedish/languages"]["default"]="svenska (Swedish)";
PKG_OptionPageTail2($elem);
?>
