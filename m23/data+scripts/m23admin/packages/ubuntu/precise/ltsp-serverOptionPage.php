<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ltsp-server");

$elem["ltsp-server/build_client"]["type"]="boolean";
$elem["ltsp-server/build_client"]["description"]="Build LTSP client environment during package installation?
 Internal template used to set the configuration value at install time.
 Do not translate this.
";
$elem["ltsp-server/build_client"]["descriptionde"]="";
$elem["ltsp-server/build_client"]["descriptionfr"]="";
$elem["ltsp-server/build_client"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
