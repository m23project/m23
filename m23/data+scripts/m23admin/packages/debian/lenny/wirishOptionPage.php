<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wirish");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wirish/languages"]["type"]="text";
$elem["wirish/languages"]["description"]="Description:

";
$elem["wirish/languages"]["descriptionde"]="";
$elem["wirish/languages"]["descriptionfr"]="";
$elem["wirish/languages"]["default"]="Gaeilge (Irish)";
$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wirish/languages"]["type"]="text";
$elem["wirish/languages"]["description"]="Description:

";
$elem["wirish/languages"]["descriptionde"]="";
$elem["wirish/languages"]["descriptionfr"]="";
$elem["wirish/languages"]["default"]="Gaeilge (Irish)";
$elem["wirish/gather-translations"]["type"]="text";
$elem["wirish/gather-translations"]["description"]="Description:
";
$elem["wirish/gather-translations"]["descriptionde"]="";
$elem["wirish/gather-translations"]["descriptionfr"]="";
$elem["wirish/gather-translations"]["default"]="Gaeilge (Irish)";
PKG_OptionPageTail2($elem);
?>
