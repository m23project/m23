<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wngerman");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wngerman/languages"]["type"]="text";
$elem["wngerman/languages"]["description"]="Description:
";
$elem["wngerman/languages"]["descriptionde"]="";
$elem["wngerman/languages"]["descriptionfr"]="";
$elem["wngerman/languages"]["default"]="deutsch (New German)";
PKG_OptionPageTail2($elem);
?>
