<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wdutch");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wdutch/languages"]["type"]="text";
$elem["wdutch/languages"]["description"]="Description:
";
$elem["wdutch/languages"]["descriptionde"]="";
$elem["wdutch/languages"]["descriptionfr"]="";
$elem["wdutch/languages"]["default"]="nederlands (Dutch)";
PKG_OptionPageTail2($elem);
?>
