<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wogerman");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wogerman/languages"]["type"]="text";
$elem["wogerman/languages"]["description"]="Description:
";
$elem["wogerman/languages"]["descriptionde"]="";
$elem["wogerman/languages"]["descriptionfr"]="";
$elem["wogerman/languages"]["default"]="deutsch (Old German)";
PKG_OptionPageTail2($elem);
?>
