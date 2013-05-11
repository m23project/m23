<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("witalian");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["witalian/languages"]["type"]="text";
$elem["witalian/languages"]["description"]="Description:
";
$elem["witalian/languages"]["descriptionde"]="";
$elem["witalian/languages"]["descriptionfr"]="";
$elem["witalian/languages"]["default"]="italiano (Italian)";
PKG_OptionPageTail2($elem);
?>
