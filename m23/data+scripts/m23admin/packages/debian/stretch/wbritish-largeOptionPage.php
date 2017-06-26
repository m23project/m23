<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbritish-large");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbritish-large/languages"]["type"]="text";
$elem["wbritish-large/languages"]["description"]="Description:
";
$elem["wbritish-large/languages"]["descriptionde"]="";
$elem["wbritish-large/languages"]["descriptionfr"]="";
$elem["wbritish-large/languages"]["default"]="british-large (British English -- large)";
PKG_OptionPageTail2($elem);
?>
