<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lcdproc");

$elem["lcdproc/auto-upgrade-config"]["type"]="boolean";
$elem["lcdproc/auto-upgrade-config"]["description"]="Perform automatic configuration upgrade ?
 lcdproc configuration can be merged automatically by cme
 during package upgrade. This process will keep your
 configuration customization, apply maintainer's changes and write back 
 the configuration files.
 .
 You can later edit lcdproc configuration with the command 
 'sudo cme edit lcdproc'.
 .
 If you decline this option, you must then copy the original configuration
 file(s) from /usr/share/doc/lcdproc to /etc. This file will
 not be managed by Debian package manager.
";
$elem["lcdproc/auto-upgrade-config"]["descriptionde"]="";
$elem["lcdproc/auto-upgrade-config"]["descriptionfr"]="";
$elem["lcdproc/auto-upgrade-config"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
