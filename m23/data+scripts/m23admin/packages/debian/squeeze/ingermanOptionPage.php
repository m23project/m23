<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ingerman");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ingerman/languages"]["type"]="text";
$elem["ingerman/languages"]["description"]="Description:
";
$elem["ingerman/languages"]["descriptionde"]="";
$elem["ingerman/languages"]["descriptionfr"]="";
$elem["ingerman/languages"]["default"]="deutsch (New German 8 bit), deutsch (New German -tex mode-)";
PKG_OptionPageTail2($elem);
?>
