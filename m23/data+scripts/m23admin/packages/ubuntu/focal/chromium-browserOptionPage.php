<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chromium-browser");

$elem["chromium-browser/snap-upgrade-warning"]["type"]="note";
$elem["chromium-browser/snap-upgrade-warning"]["description"]="Upgrade to the chromium snap
 Starting with chromium 75, all new releases of chromium are only available to
 Ubuntu users through the snap package.
 .
 This package update will transition your system over to the snap by
 installing it.
 .
 It is recommended to close all open chromium windows before proceeding to the
 upgrade.

";
$elem["chromium-browser/snap-upgrade-warning"]["descriptionde"]="";
$elem["chromium-browser/snap-upgrade-warning"]["descriptionfr"]="";
$elem["chromium-browser/snap-upgrade-warning"]["default"]="";
$elem["chromium-browser/snap-no-connectivity"]["type"]="select";
$elem["chromium-browser/snap-no-connectivity"]["choices"][1]="Retry";
$elem["chromium-browser/snap-no-connectivity"]["choices"][2]="Abort";
$elem["chromium-browser/snap-no-connectivity"]["description"]="Unable to reach the snap store
 Your system is unable to reach the snap store, please make sure you're
 connected to the Internet and update any firewall or proxy settings as
 needed so that you can reach the snap store.
 .
 You can manually check for connectivity by running \"snap info chromium\"
 .
 Aborting will cause the upgrade to fail and will require it to be re-attempted
 once snapd is functional on the system.
 .
 Skipping will let the package upgrade continue but chromium will not be
 functional until the chromium snap is installed.
";
$elem["chromium-browser/snap-no-connectivity"]["descriptionde"]="";
$elem["chromium-browser/snap-no-connectivity"]["descriptionfr"]="";
$elem["chromium-browser/snap-no-connectivity"]["default"]="";
PKG_OptionPageTail2($elem);
?>
