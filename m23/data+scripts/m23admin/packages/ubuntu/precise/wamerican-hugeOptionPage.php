<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wamerican-huge");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wamerican-huge/languages"]["type"]="text";
$elem["wamerican-huge/languages"]["description"]="Description:
";
$elem["wamerican-huge/languages"]["descriptionde"]="";
$elem["wamerican-huge/languages"]["descriptionfr"]="";
$elem["wamerican-huge/languages"]["default"]="american-huge (American English -- huge)";
PKG_OptionPageTail2($elem);
?>
