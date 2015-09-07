<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ubuntu-orchestra-client");

$elem["ubuntu-orchestra-client/rsyslog_host"]["type"]="string";
$elem["ubuntu-orchestra-client/rsyslog_host"]["description"]="Hostname or IP address of the rsyslog server:
   Ubuntu Orchestra collects all logs into a central syslog for
   management and statistics, this host is the same one that is
   used for monitoring where the ubuntu-orchestra-monitoring-server
   gathers this data.

";
$elem["ubuntu-orchestra-client/rsyslog_host"]["descriptionde"]="";
$elem["ubuntu-orchestra-client/rsyslog_host"]["descriptionfr"]="";
$elem["ubuntu-orchestra-client/rsyslog_host"]["default"]="";
PKG_OptionPageTail2($elem);
?>
