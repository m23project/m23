<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wamerican-large");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wamerican-large/languages"]["type"]="text";
$elem["wamerican-large/languages"]["description"]="Description:
";
$elem["wamerican-large/languages"]["descriptionde"]="";
$elem["wamerican-large/languages"]["descriptionfr"]="";
$elem["wamerican-large/languages"]["default"]="american-large (American English -- large)";
PKG_OptionPageTail2($elem);
?>
