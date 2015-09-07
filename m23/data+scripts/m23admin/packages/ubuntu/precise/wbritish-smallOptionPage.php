<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbritish-small");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbritish-small/languages"]["type"]="text";
$elem["wbritish-small/languages"]["description"]="Description:
";
$elem["wbritish-small/languages"]["descriptionde"]="";
$elem["wbritish-small/languages"]["descriptionfr"]="";
$elem["wbritish-small/languages"]["default"]="british-small (British English -- small)";
PKG_OptionPageTail2($elem);
?>
