<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("idanish");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["idanish/languages"]["type"]="text";
$elem["idanish/languages"]["description"]="Description:
";
$elem["idanish/languages"]["descriptionde"]="";
$elem["idanish/languages"]["descriptionfr"]="";
$elem["idanish/languages"]["default"]="danish (Den Store Danske Ordliste)";
PKG_OptionPageTail2($elem);
?>
