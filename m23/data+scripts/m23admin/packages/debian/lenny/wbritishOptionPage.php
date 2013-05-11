<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbritish");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbritish/languages"]["type"]="text";
$elem["wbritish/languages"]["description"]="Description:
";
$elem["wbritish/languages"]["descriptionde"]="";
$elem["wbritish/languages"]["descriptionfr"]="";
$elem["wbritish/languages"]["default"]="british (British English)";
PKG_OptionPageTail2($elem);
?>
