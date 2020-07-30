<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("prometheus-blackbox-exporter");

$elem["prometheus-blackbox-exporter/want_cap_net_raw"]["type"]="boolean";
$elem["prometheus-blackbox-exporter/want_cap_net_raw"]["description"]="Enable additional network privileges for ICMP probing?
 /usr/bin/prometheus-blackbox-exporter requires CAP_NET_RAW capabilities to be
 able to send out crafted packets to targets for ICMP probing.
 .
 ICMP probing will not work unless this option is enabled, or
 prometheus-blackbox-exporter runs as root.
";
$elem["prometheus-blackbox-exporter/want_cap_net_raw"]["descriptionde"]="";
$elem["prometheus-blackbox-exporter/want_cap_net_raw"]["descriptionfr"]="";
$elem["prometheus-blackbox-exporter/want_cap_net_raw"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
