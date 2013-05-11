<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wfinnish");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wfinnish/languages"]["type"]="text";
$elem["wfinnish/languages"]["description"]="
";
$elem["wfinnish/languages"]["descriptionde"]="";
$elem["wfinnish/languages"]["descriptionfr"]="";
$elem["wfinnish/languages"]["default"]="suomi (Finnish)";
PKG_OptionPageTail2($elem);
?>
