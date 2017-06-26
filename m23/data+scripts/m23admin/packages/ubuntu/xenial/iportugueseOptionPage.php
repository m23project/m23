<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iportuguese");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iportuguese/languages"]["type"]="text";
$elem["iportuguese/languages"]["description"]="Description:
";
$elem["iportuguese/languages"]["descriptionde"]="";
$elem["iportuguese/languages"]["descriptionfr"]="";
$elem["iportuguese/languages"]["default"]="portugues europeu (European Portuguese)";
PKG_OptionPageTail2($elem);
?>
