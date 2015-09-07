<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wspanish");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wspanish/languages"]["type"]="text";
$elem["wspanish/languages"]["description"]="Description:
";
$elem["wspanish/languages"]["descriptionde"]="";
$elem["wspanish/languages"]["descriptionfr"]="";
$elem["wspanish/languages"]["default"]="castellano (Spanish)";
PKG_OptionPageTail2($elem);
?>
