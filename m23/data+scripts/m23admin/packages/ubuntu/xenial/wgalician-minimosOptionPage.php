<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wgalician-minimos");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wgalician-minimos/languages"]["type"]="text";
$elem["wgalician-minimos/languages"]["description"]="Description:
";
$elem["wgalician-minimos/languages"]["descriptionde"]="";
$elem["wgalician-minimos/languages"]["descriptionfr"]="";
$elem["wgalician-minimos/languages"]["default"]="galego-minimos (Galician-minimos)";
PKG_OptionPageTail2($elem);
?>
