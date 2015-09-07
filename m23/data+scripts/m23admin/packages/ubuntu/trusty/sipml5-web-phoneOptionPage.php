<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sipml5-web-phone");

$elem["sipml5-web-phone/webserver"]["type"]="boolean";
$elem["sipml5-web-phone/webserver"]["description"]="Automatically configure apache2?
 The package will be unavailable until a web server is configured.
 Automatic configuration can be performed for the Apache 2 web server.

";
$elem["sipml5-web-phone/webserver"]["descriptionde"]="";
$elem["sipml5-web-phone/webserver"]["descriptionfr"]="";
$elem["sipml5-web-phone/webserver"]["default"]="true";
$elem["sipml5-web-phone/reload"]["type"]="boolean";
$elem["sipml5-web-phone/reload"]["description"]="Reload apache2 configuration?
 In order to activate the new configuration, the web server needs
 to reload its configuration. If you choose not to do this automatically,
 you should do so manually at the first opportunity.

";
$elem["sipml5-web-phone/reload"]["descriptionde"]="";
$elem["sipml5-web-phone/reload"]["descriptionfr"]="";
$elem["sipml5-web-phone/reload"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
