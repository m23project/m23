<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("minissdpd");

$elem["minissdpd/start_daemon"]["type"]="boolean";
$elem["minissdpd/start_daemon"]["description"]="Start the MiniSSDP daemon automatically?
 Choose this option if the MiniSSDP daemon should start automatically,
 now and at boot time.
";
$elem["minissdpd/start_daemon"]["descriptionde"]="";
$elem["minissdpd/start_daemon"]["descriptionfr"]="";
$elem["minissdpd/start_daemon"]["default"]="false";
$elem["minissdpd/listen"]["type"]="string";
$elem["minissdpd/listen"]["description"]="Interface to listen on for UPnP queries:
 The MiniSSDP daemon will listen for requests on one interface, and drop
 all queries that do not come from the local network. Please enter the LAN
 interface or IP address (in CIDR notation) that it should listen on.
 .
 Interface name is preferred, and required if you plan to enable IPv6 port
 forwarding.
";
$elem["minissdpd/listen"]["descriptionde"]="";
$elem["minissdpd/listen"]["descriptionfr"]="";
$elem["minissdpd/listen"]["default"]="";
$elem["minissdpd/ip6"]["type"]="boolean";
$elem["minissdpd/ip6"]["description"]="Enable IPv6 listening?
 Please specify whether the MiniSSDP daemon should listen for IPv6 queries.
";
$elem["minissdpd/ip6"]["descriptionde"]="";
$elem["minissdpd/ip6"]["descriptionfr"]="";
$elem["minissdpd/ip6"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
