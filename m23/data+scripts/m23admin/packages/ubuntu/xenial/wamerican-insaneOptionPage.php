<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wamerican-insane");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wamerican-insane/languages"]["type"]="text";
$elem["wamerican-insane/languages"]["description"]="Description:
";
$elem["wamerican-insane/languages"]["descriptionde"]="";
$elem["wamerican-insane/languages"]["descriptionfr"]="";
$elem["wamerican-insane/languages"]["default"]="american-insane (American English -- insane)";
PKG_OptionPageTail2($elem);
?>
