<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wbrazilian");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wbrazilian/languages"]["type"]="text";
$elem["wbrazilian/languages"]["description"]="Description:
";
$elem["wbrazilian/languages"]["descriptionde"]="";
$elem["wbrazilian/languages"]["descriptionfr"]="";
$elem["wbrazilian/languages"]["default"]="portugues brasileiro (Brazilian Portuguese)";
PKG_OptionPageTail2($elem);
?>
