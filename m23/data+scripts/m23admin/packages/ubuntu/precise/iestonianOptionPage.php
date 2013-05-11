<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iestonian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["iestonian/languages"]["type"]="text";
$elem["iestonian/languages"]["description"]="Description:

";
$elem["iestonian/languages"]["descriptionde"]="";
$elem["iestonian/languages"]["descriptionfr"]="";
$elem["iestonian/languages"]["default"]="estonian (Eesti)";
$elem["iestonian/elanguages"]["type"]="text";
$elem["iestonian/elanguages"]["description"]="Description:
";
$elem["iestonian/elanguages"]["descriptionde"]="";
$elem["iestonian/elanguages"]["descriptionfr"]="";
$elem["iestonian/elanguages"]["default"]="eesti keel (Estonian)";
PKG_OptionPageTail2($elem);
?>
