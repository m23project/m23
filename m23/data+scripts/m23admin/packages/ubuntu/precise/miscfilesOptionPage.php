<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("miscfiles");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["miscfiles/languages"]["type"]="text";
$elem["miscfiles/languages"]["description"]="Description:
";
$elem["miscfiles/languages"]["descriptionde"]="";
$elem["miscfiles/languages"]["descriptionfr"]="";
$elem["miscfiles/languages"]["default"]="english (Webster's Second International English wordlist)";
PKG_OptionPageTail2($elem);
?>
