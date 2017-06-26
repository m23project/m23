<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbritish-huge");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbritish-huge/languages"]["type"]="text";
$elem["wbritish-huge/languages"]["description"]="Description:
";
$elem["wbritish-huge/languages"]["descriptionde"]="";
$elem["wbritish-huge/languages"]["descriptionfr"]="";
$elem["wbritish-huge/languages"]["default"]="british-huge (British English -- huge)";
PKG_OptionPageTail2($elem);
?>
