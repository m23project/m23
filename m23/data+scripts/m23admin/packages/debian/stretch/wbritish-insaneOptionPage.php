<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbritish-insane");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbritish-insane/languages"]["type"]="text";
$elem["wbritish-insane/languages"]["description"]="Description:
";
$elem["wbritish-insane/languages"]["descriptionde"]="";
$elem["wbritish-insane/languages"]["descriptionfr"]="";
$elem["wbritish-insane/languages"]["default"]="british-insane (British English -- insane)";
PKG_OptionPageTail2($elem);
?>
