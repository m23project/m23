<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lxd");

$elem["lxd/snap-upgrade-warning"]["type"]="note";
$elem["lxd/snap-upgrade-warning"]["description"]="Upgrade to the LXD snap
 Starting with LXD 3.1, all new releases of LXD are only available to
 Ubuntu users through the snap package.
 .
 This package update will transition your system over to the snap by
 installing it and then running an automated migration tool.
 .
 As part of this upgrade, all containers will briefly be shutdown and
 brought back up. Before continuing, make sure that you are ready for
 this downtime.

";
$elem["lxd/snap-upgrade-warning"]["descriptionde"]="";
$elem["lxd/snap-upgrade-warning"]["descriptionfr"]="";
$elem["lxd/snap-upgrade-warning"]["default"]="";
$elem["lxd/snap-no-connectivity"]["type"]="select";
$elem["lxd/snap-no-connectivity"]["choices"][1]="Retry";
$elem["lxd/snap-no-connectivity"]["choices"][2]="Abort";
$elem["lxd/snap-no-connectivity"]["description"]="Unable to reach the snap store
 Your system is unable to reach the snap store, please make sure you're
 connected to the Internet and update any firewall or proxy settings as
 needed so that you can reach the snap store.
 .
 You can manually check for connectivity by running \"snap info lxd\"
 .
 Aborting will cause the upgrade to fail and will require it to be re-attempted
 once snapd is functional on the system.
 .
 Skipping will let the package upgrade continue but the LXD commands
 will not be functional until the LXD snap is installed. Skipping is allowed
 only when LXD is not activated on the system.

";
$elem["lxd/snap-no-connectivity"]["descriptionde"]="";
$elem["lxd/snap-no-connectivity"]["descriptionfr"]="";
$elem["lxd/snap-no-connectivity"]["default"]="";
$elem["lxd/snap-install-cant-be-skipped"]["type"]="error";
$elem["lxd/snap-install-cant-be-skipped"]["description"]="Skipping is not allowed when LXD has been initialized
 LXD appears to have been configured on this system. Please stop LXD and
 remove local data in /var/lib/lxd/ if you would like to skip installing
 the LXD snap and migrating the local data.

";
$elem["lxd/snap-install-cant-be-skipped"]["descriptionde"]="";
$elem["lxd/snap-install-cant-be-skipped"]["descriptionfr"]="";
$elem["lxd/snap-install-cant-be-skipped"]["default"]="";
$elem["lxd/snap-track"]["type"]="select";
$elem["lxd/snap-track"]["choices"][1]="latest";
$elem["lxd/snap-track"]["choices"][2]="3.0";
$elem["lxd/snap-track"]["description"]="LXD snap track
 The LXD project puts out monthly feature releases which while backward
 compatible at an API and CLI level, will contain some behavior change
 and potentially require manual intervention during an upgrade.
 .
 In addition to those, every 2 years a LTS release is made which comes
 with 5 years of support through frequent bugfix-only releases.
 .
 The LXD team recommends you pick \"4.0\" for production environments and use
 \"latest\" if you're interested in getting the latest LXD features.
";
$elem["lxd/snap-track"]["descriptionde"]="";
$elem["lxd/snap-track"]["descriptionfr"]="";
$elem["lxd/snap-track"]["default"]="";
PKG_OptionPageTail2($elem);
?>
