<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sitesummary");

$elem["sitesummary/replace-munin-config"]["type"]="boolean";
$elem["sitesummary/replace-munin-config"]["description"]="Activate the munin config replacement feature?
 This is an internal (hidden) debconf question.  It should not be translated.

";
$elem["sitesummary/replace-munin-config"]["descriptionde"]="";
$elem["sitesummary/replace-munin-config"]["descriptionfr"]="";
$elem["sitesummary/replace-munin-config"]["default"]="false";
$elem["sitesummary/enable-nagios-config"]["type"]="boolean";
$elem["sitesummary/enable-nagios-config"]["description"]="Activate the Nagios autoconfig feature?
 This is an internal (hidden) debconf question.  It should not be translated.

";
$elem["sitesummary/enable-nagios-config"]["descriptionde"]="";
$elem["sitesummary/enable-nagios-config"]["descriptionfr"]="";
$elem["sitesummary/enable-nagios-config"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
