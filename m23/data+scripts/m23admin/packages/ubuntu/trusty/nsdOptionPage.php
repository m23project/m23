<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nsd");

$elem["nsd3/old_confdir_exists"]["type"]="note";
$elem["nsd3/old_confdir_exists"]["description"]="Configuration directory for NSD has been changed
 WARNING: Your old NSD 3 configuration directory is not empty.
 .
 Please note that configuration directory has changed from /etc/nsd3 to
 /etc/nsd in NSD 4.  The new nsd (>= 4.0.0-1) package will automatically
 move your configuration file from /etc/nsd3/nsd.conf to /etc/nsd/nsd.conf,
 but it will not migrate everything under /etc/nsd3, so you need to check
 and move your configuration snippets and zone files by hand.
";
$elem["nsd3/old_confdir_exists"]["descriptionde"]="";
$elem["nsd3/old_confdir_exists"]["descriptionfr"]="";
$elem["nsd3/old_confdir_exists"]["default"]="";
PKG_OptionPageTail2($elem);
?>
