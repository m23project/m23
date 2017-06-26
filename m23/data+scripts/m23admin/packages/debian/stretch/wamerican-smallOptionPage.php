<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wamerican-small");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wamerican-small/languages"]["type"]="text";
$elem["wamerican-small/languages"]["description"]="Description:
";
$elem["wamerican-small/languages"]["descriptionde"]="";
$elem["wamerican-small/languages"]["descriptionfr"]="";
$elem["wamerican-small/languages"]["default"]="american-small (American English -- small)";
PKG_OptionPageTail2($elem);
?>
