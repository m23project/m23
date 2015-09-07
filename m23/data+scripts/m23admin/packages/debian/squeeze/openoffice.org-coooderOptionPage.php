<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openoffice.org-coooder");

$elem["shared/openofficeorg-running"]["type"]="error";
$elem["shared/openofficeorg-running"]["description"]="";
$elem["shared/openofficeorg-running"]["descriptionde"]="";
$elem["shared/openofficeorg-running"]["descriptionfr"]="";
$elem["shared/openofficeorg-running"]["default"]="";
PKG_OptionPageTail2($elem);
?>
