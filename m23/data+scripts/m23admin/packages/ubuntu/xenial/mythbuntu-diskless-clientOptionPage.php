<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythbuntu-diskless-client");

$elem["mythbuntu-diskless-client/abort-installation"]["type"]="note";
$elem["mythbuntu-diskless-client/abort-installation"]["description"]="Package can't be installed on a normal Ubuntu installation!
 This package is only meant to be installed inside a Mythbuntu-diskless chroot.
 .
 Installing it on a normal Ubuntu installation will break your system.
";
$elem["mythbuntu-diskless-client/abort-installation"]["descriptionde"]="";
$elem["mythbuntu-diskless-client/abort-installation"]["descriptionfr"]="";
$elem["mythbuntu-diskless-client/abort-installation"]["default"]="";
PKG_OptionPageTail2($elem);
?>
