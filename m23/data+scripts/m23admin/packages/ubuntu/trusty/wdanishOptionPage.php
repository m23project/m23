<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wdanish");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wdanish/languages"]["type"]="text";
$elem["wdanish/languages"]["description"]="Description:
";
$elem["wdanish/languages"]["descriptionde"]="";
$elem["wdanish/languages"]["descriptionfr"]="";
$elem["wdanish/languages"]["default"]="danish (Den Store Danske Ordliste)";
PKG_OptionPageTail2($elem);
?>
