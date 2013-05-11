<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cacti");

$elem["cacti/webserver"]["type"]="select";
$elem["cacti/webserver"]["choices"][1]="Apache2";
$elem["cacti/webserver"]["choices"][2]="Lighttpd";
$elem["cacti/webserver"]["description"]="Webserver type
 Please select the webserver type for which cacti should be automatically
 configured.
 .
 Select \"None/Others\" if you would like to configure your webserver by hand.
";
$elem["cacti/webserver"]["descriptionde"]="";
$elem["cacti/webserver"]["descriptionfr"]="";
$elem["cacti/webserver"]["default"]="Apache2";
PKG_OptionPageTail2($elem);
?>
