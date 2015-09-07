<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vdr-plugin-bitstreamout");

$elem["vdr-plugin-bitstreamout/mount_tmpfs"]["type"]="boolean";
$elem["vdr-plugin-bitstreamout/mount_tmpfs"]["description"]="";
$elem["vdr-plugin-bitstreamout/mount_tmpfs"]["descriptionde"]="";
$elem["vdr-plugin-bitstreamout/mount_tmpfs"]["descriptionfr"]="";
$elem["vdr-plugin-bitstreamout/mount_tmpfs"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
