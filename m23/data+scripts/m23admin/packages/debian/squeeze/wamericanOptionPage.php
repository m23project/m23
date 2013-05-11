<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wamerican");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wamerican/languages"]["type"]="text";
$elem["wamerican/languages"]["description"]="Description:
";
$elem["wamerican/languages"]["descriptionde"]="";
$elem["wamerican/languages"]["descriptionfr"]="";
$elem["wamerican/languages"]["default"]="american (American English)";
PKG_OptionPageTail2($elem);
?>
