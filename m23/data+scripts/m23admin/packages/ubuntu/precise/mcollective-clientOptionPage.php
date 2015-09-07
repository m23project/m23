<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mcollective-client");

$elem["mcollective/stomp_host"]["type"]="string";
$elem["mcollective/stomp_host"]["description"]="Location of the STOMP MPQ server:
   mcollective depends on a STOMP server to pass messages
   amongst the collective.

";
$elem["mcollective/stomp_host"]["descriptionde"]="";
$elem["mcollective/stomp_host"]["descriptionfr"]="";
$elem["mcollective/stomp_host"]["default"]="";
$elem["mcollective/psk_key"]["type"]="password";
$elem["mcollective/psk_key"]["description"]="PSK Key for mcollective:
   mcollective encrypts all its messages using a pre-shared key (PSK)
   by default it'll be set to \"unset\", you should change this
";
$elem["mcollective/psk_key"]["descriptionde"]="";
$elem["mcollective/psk_key"]["descriptionfr"]="";
$elem["mcollective/psk_key"]["default"]="";
PKG_OptionPageTail2($elem);
?>
