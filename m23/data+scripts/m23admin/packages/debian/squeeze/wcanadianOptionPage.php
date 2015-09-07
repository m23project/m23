<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wcanadian");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wcanadian/languages"]["type"]="text";
$elem["wcanadian/languages"]["description"]="Description:
";
$elem["wcanadian/languages"]["descriptionde"]="";
$elem["wcanadian/languages"]["descriptionfr"]="";
$elem["wcanadian/languages"]["default"]="canadian (Canadian English)";
PKG_OptionPageTail2($elem);
?>
