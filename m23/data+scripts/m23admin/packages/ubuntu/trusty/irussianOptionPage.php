<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("irussian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["irussian/languages"]["type"]="text";
$elem["irussian/languages"]["description"]="Description:

";
$elem["irussian/languages"]["descriptionde"]="";
$elem["irussian/languages"]["descriptionfr"]="";
$elem["irussian/languages"]["default"]="russian (Russian koi8-r)";
$elem["irussian/elanguages"]["type"]="text";
$elem["irussian/elanguages"]["description"]="Description:
";
$elem["irussian/elanguages"]["descriptionde"]="";
$elem["irussian/elanguages"]["descriptionfr"]="";
$elem["irussian/elanguages"]["default"]="russki (Russian)";
PKG_OptionPageTail2($elem);
?>
