<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wcatalan");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wcatalan/languages"]["type"]="text";
$elem["wcatalan/languages"]["description"]="Description:
";
$elem["wcatalan/languages"]["descriptionde"]="";
$elem["wcatalan/languages"]["descriptionfr"]="";
$elem["wcatalan/languages"]["default"]="catala (Catalan)";
PKG_OptionPageTail2($elem);
?>
