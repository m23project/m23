<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("refind");

$elem["refind/install_to_esp"]["type"]="boolean";
$elem["refind/install_to_esp"]["description"]="Automatically install rEFInd to the ESP?
 It is necessary to install rEFInd to the EFI System Partition (ESP) for
 it to control the boot process.
 .
 Not installing the new rEFInd binary on the ESP may leave the system in an
 unbootable state. Alternatives to automatically installing rEFInd include
 running /usr/sbin/refind-install by hand or installing the rEFInd binaries
 manually by copying them from subdirectories of /usr/share/refind-{version}.
";
$elem["refind/install_to_esp"]["descriptionde"]="";
$elem["refind/install_to_esp"]["descriptionfr"]="";
$elem["refind/install_to_esp"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
