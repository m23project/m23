<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wgaelic");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wgaelic/languages"]["type"]="text";
$elem["wgaelic/languages"]["description"]="Description:

";
$elem["wgaelic/languages"]["descriptionde"]="";
$elem["wgaelic/languages"]["descriptionfr"]="";
$elem["wgaelic/languages"]["default"]="Gaidhlig (Scots Gaelic)";
$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wgaelic/languages"]["type"]="text";
$elem["wgaelic/languages"]["description"]="Description:
";
$elem["wgaelic/languages"]["descriptionde"]="";
$elem["wgaelic/languages"]["descriptionfr"]="";
$elem["wgaelic/languages"]["default"]="Gaidhlig (Scots Gaelic)";
PKG_OptionPageTail2($elem);
?>
