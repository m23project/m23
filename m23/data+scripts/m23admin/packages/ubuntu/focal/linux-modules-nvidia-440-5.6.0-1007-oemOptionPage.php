<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-modules-nvidia-440-5.6.0-1007-oem");

$elem["linux/nvidia/latelink"]["type"]="boolean";
$elem["linux/nvidia/latelink"]["description"]="Late-link NVIDIA kernel modules?
 Enable this to link the NVIDIA kernel modules at install time and
 make them available for use.
";
$elem["linux/nvidia/latelink"]["descriptionde"]="";
$elem["linux/nvidia/latelink"]["descriptionfr"]="";
$elem["linux/nvidia/latelink"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
