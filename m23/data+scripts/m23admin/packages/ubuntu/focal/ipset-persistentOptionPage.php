<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipset-persistent");

$elem["ipset-persistent/autosave"]["type"]="boolean";
$elem["ipset-persistent/autosave"]["description"]="Save current ipsets?
 Current ipsets can be saved to the configuration
 file /etc/ipset/ipsets. These ipsets will then be loaded automatically
 during system startup.
 .
 Sets are only saved automatically during package installation. See the
 manual page of ip6tables-save(8) for instructions on keeping the rules file
 up-to-date.
";
$elem["ipset-persistent/autosave"]["descriptionde"]="";
$elem["ipset-persistent/autosave"]["descriptionfr"]="";
$elem["ipset-persistent/autosave"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
