<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythbuntu-bare-console");

$elem["mythbuntu-bare-console/configure"]["type"]="note";
$elem["mythbuntu-bare-console/configure"]["description"]="Don't forget to configure in mythbuntu-control-centre
 Please run mythbuntu-control-centre after installation and configure
 the Backup and Restore Console. The user that configures the
 mythbuntu-bare-console will need to be in the mythtv group prior
 to configuring the console.
";
$elem["mythbuntu-bare-console/configure"]["descriptionde"]="";
$elem["mythbuntu-bare-console/configure"]["descriptionfr"]="";
$elem["mythbuntu-bare-console/configure"]["default"]="";
PKG_OptionPageTail2($elem);
?>
