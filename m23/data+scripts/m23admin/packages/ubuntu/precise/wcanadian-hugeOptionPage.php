<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wcanadian-huge");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wcanadian-huge/languages"]["type"]="text";
$elem["wcanadian-huge/languages"]["description"]="Description:
";
$elem["wcanadian-huge/languages"]["descriptionde"]="";
$elem["wcanadian-huge/languages"]["descriptionfr"]="";
$elem["wcanadian-huge/languages"]["default"]="canadian-huge (Canadian English -- huge)";
PKG_OptionPageTail2($elem);
?>
