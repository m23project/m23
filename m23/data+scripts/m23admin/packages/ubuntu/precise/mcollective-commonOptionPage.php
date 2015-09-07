<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mcollective-common");

$elem["mcollective/security_psk"]["type"]="string";
$elem["mcollective/security_psk"]["description"]="Security PSK key for all MCollective instances:
 Please specify the psk for security within your MCollective
 instances

";
$elem["mcollective/security_psk"]["descriptionde"]="";
$elem["mcollective/security_psk"]["descriptionfr"]="";
$elem["mcollective/security_psk"]["default"]="unset";
$elem["mcollective/stomp_host"]["type"]="string";
$elem["mcollective/stomp_host"]["description"]="Hostname of your ActiveMQ host:
 Please specify the hostname/ip address of your Message Queue
 server (Apache ActiceMQ).

";
$elem["mcollective/stomp_host"]["descriptionde"]="";
$elem["mcollective/stomp_host"]["descriptionfr"]="";
$elem["mcollective/stomp_host"]["default"]="localhost";
$elem["mcollective/stomp_port"]["type"]="string";
$elem["mcollective/stomp_port"]["description"]="Port of your ActiveMQ instance:
 Please specify the port of your Message Queue server (Apache ActiveMQ).

";
$elem["mcollective/stomp_port"]["descriptionde"]="";
$elem["mcollective/stomp_port"]["descriptionfr"]="";
$elem["mcollective/stomp_port"]["default"]="6163";
$elem["mcollective/stomp_user"]["type"]="string";
$elem["mcollective/stomp_user"]["description"]="STOMP user from your ActiveMQ instance:
 Please specify the username of your Message Queue server (Apache ActiveMQ).

";
$elem["mcollective/stomp_user"]["descriptionde"]="";
$elem["mcollective/stomp_user"]["descriptionfr"]="";
$elem["mcollective/stomp_user"]["default"]="mcollective";
$elem["mcollective/stomp_password"]["type"]="password";
$elem["mcollective/stomp_password"]["description"]="STOMP password from your ActiveMQ instance:
 Please specify the password of your Message Queue server (Apache ActiveMQ).
";
$elem["mcollective/stomp_password"]["descriptionde"]="";
$elem["mcollective/stomp_password"]["descriptionfr"]="";
$elem["mcollective/stomp_password"]["default"]="marionette";
PKG_OptionPageTail2($elem);
?>
