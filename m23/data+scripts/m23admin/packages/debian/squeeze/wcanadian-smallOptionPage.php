<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wcanadian-small");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wcanadian-small/languages"]["type"]="text";
$elem["wcanadian-small/languages"]["description"]="Description:
";
$elem["wcanadian-small/languages"]["descriptionde"]="";
$elem["wcanadian-small/languages"]["descriptionfr"]="";
$elem["wcanadian-small/languages"]["default"]="canadian-small (Canadian English -- small)";
PKG_OptionPageTail2($elem);
?>
