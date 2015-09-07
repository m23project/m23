<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wcanadian-large");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wcanadian-large/languages"]["type"]="text";
$elem["wcanadian-large/languages"]["description"]="Description:
";
$elem["wcanadian-large/languages"]["descriptionde"]="";
$elem["wcanadian-large/languages"]["descriptionfr"]="";
$elem["wcanadian-large/languages"]["default"]="canadian-large (Canadian English -- large)";
PKG_OptionPageTail2($elem);
?>
