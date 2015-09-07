<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openvas-plugins-base");

$elem["openvas-plugins-dfsg-base/remove-usr-lib"]["type"]="boolean";
$elem["openvas-plugins-dfsg-base/remove-usr-lib"]["description"]="Do you want to remove /usr/lib/openvas/plugins?
 The /usr/lib/openvas/plugins directory still exists.  This might occur if you
 downloaded additional plugins into it while using an old OpenVAS version.
 .
 The package can remove it now or you can select to remove it later on
 manually.

";
$elem["openvas-plugins-dfsg-base/remove-usr-lib"]["descriptionde"]="";
$elem["openvas-plugins-dfsg-base/remove-usr-lib"]["descriptionfr"]="";
$elem["openvas-plugins-dfsg-base/remove-usr-lib"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
