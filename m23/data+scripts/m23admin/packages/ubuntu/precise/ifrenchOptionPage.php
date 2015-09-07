<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifrench");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ifrench/languages"]["type"]="text";
$elem["ifrench/languages"]["description"]="Description:
";
$elem["ifrench/languages"]["descriptionde"]="";
$elem["ifrench/languages"]["descriptionfr"]="";
$elem["ifrench/languages"]["default"]="francais Hydro-Quebec (French Hydro-Quebec)";
PKG_OptionPageTail2($elem);
?>
