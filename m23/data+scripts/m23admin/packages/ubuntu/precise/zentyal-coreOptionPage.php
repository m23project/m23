<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zentyal-core");

$elem["zentyal-core/port"]["type"]="string";
$elem["zentyal-core/port"]["description"]="Zentyal HTTPS port:
 Please enter the port which will be used by the Zentyal HTTPS server. Use an
 available port that is not being used by another service.

";
$elem["zentyal-core/port"]["descriptionde"]="";
$elem["zentyal-core/port"]["descriptionfr"]="";
$elem["zentyal-core/port"]["default"]="443";
$elem["zentyal-core/port_used"]["type"]="boolean";
$elem["zentyal-core/port_used"]["description"]="Do you want to continue?
 It seems that the port you have selected is already being used. You can
 continue anyway or enter a new port.

";
$elem["zentyal-core/port_used"]["descriptionde"]="";
$elem["zentyal-core/port_used"]["descriptionfr"]="";
$elem["zentyal-core/port_used"]["default"]="true";
$elem["zentyal-core/user_exists"]["type"]="note";
$elem["zentyal-core/user_exists"]["description"]="Installation failed
 There is already a user called 'ebox' in your machine. Please, remove it or
 choose a different name and try again.
";
$elem["zentyal-core/user_exists"]["descriptionde"]="";
$elem["zentyal-core/user_exists"]["descriptionfr"]="";
$elem["zentyal-core/user_exists"]["default"]="";
PKG_OptionPageTail2($elem);
?>
