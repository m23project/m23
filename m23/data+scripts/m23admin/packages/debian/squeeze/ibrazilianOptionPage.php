<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ibrazilian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["ibrazilian/languages"]["type"]="text";
$elem["ibrazilian/languages"]["description"]="Description:
";
$elem["ibrazilian/languages"]["descriptionde"]="";
$elem["ibrazilian/languages"]["descriptionfr"]="";
$elem["ibrazilian/languages"]["default"]="portugues brasileiro (Brazilian Portuguese)";
PKG_OptionPageTail2($elem);
?>
