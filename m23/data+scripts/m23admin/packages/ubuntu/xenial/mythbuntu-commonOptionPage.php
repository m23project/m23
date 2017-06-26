<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythbuntu-common");

$elem["mythbuntu/repos"]["type"]="boolean";
$elem["mythbuntu/repos"]["description"]="Enable the MythTV Updates Repository? (Recommended)
 The MythTV Updates repo contains fixes updates for the installed
 version of MythTV.
";
$elem["mythbuntu/repos"]["descriptionde"]="";
$elem["mythbuntu/repos"]["descriptionfr"]="";
$elem["mythbuntu/repos"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
