<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ifrench-gut");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ifrench-gut/languages"]["type"]="text";
$elem["ifrench-gut/languages"]["description"]="Description:
";
$elem["ifrench-gut/languages"]["descriptionde"]="";
$elem["ifrench-gut/languages"]["descriptionfr"]="";
$elem["ifrench-gut/languages"]["default"]="francais GUTenberg TeX8b (French GUTenberg TeX8b), francais GUTenberg (French GUTenberg), francais GUTenberg latin1 (French GUTenberg latin1)";
PKG_OptionPageTail2($elem);
?>
