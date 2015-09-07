<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbulgarian");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbulgarian/languages"]["type"]="text";
$elem["wbulgarian/languages"]["description"]="Description:
";
$elem["wbulgarian/languages"]["descriptionde"]="";
$elem["wbulgarian/languages"]["descriptionfr"]="";
$elem["wbulgarian/languages"]["default"]="български (Bulgarian)";
PKG_OptionPageTail2($elem);
?>
