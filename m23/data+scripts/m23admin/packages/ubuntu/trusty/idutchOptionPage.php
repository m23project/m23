<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("idutch");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["idutch/languages"]["type"]="text";
$elem["idutch/languages"]["description"]="Description:
";
$elem["idutch/languages"]["descriptionde"]="";
$elem["idutch/languages"]["descriptionfr"]="";
$elem["idutch/languages"]["default"]="nederlands (Dutch)";
PKG_OptionPageTail2($elem);
?>
