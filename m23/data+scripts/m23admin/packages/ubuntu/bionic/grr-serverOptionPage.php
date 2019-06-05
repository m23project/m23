<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grr-server");

$elem["grr-server/run_config"]["type"]="note";
$elem["grr-server/run_config"]["description"]="Description:
 GRR requires further configuration to be ready for startup.
 .
 Please make sure to run 'grr_config_updater initialize' as user '_grr'
 before trying to start the GRR service ('grr-server').
";
$elem["grr-server/run_config"]["descriptionde"]="";
$elem["grr-server/run_config"]["descriptionfr"]="";
$elem["grr-server/run_config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
