<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("shinken-module-broker-webui");

$elem["shinken-module-broker-webui/instructions"]["type"]="note";
$elem["shinken-module-broker-webui/instructions"]["description"]="Recommendation for the WebUI module
 Change 'auth_secret' option in
 /etc/shinken/shinken-specific/broker-webui.cfg
";
$elem["shinken-module-broker-webui/instructions"]["descriptionde"]="";
$elem["shinken-module-broker-webui/instructions"]["descriptionfr"]="";
$elem["shinken-module-broker-webui/instructions"]["default"]="";
PKG_OptionPageTail2($elem);
?>
