<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snapcraft");

$elem["snapcraft/snap-no-connectivity"]["type"]="select";
$elem["snapcraft/snap-no-connectivity"]["choices"][1]="Retry";
$elem["snapcraft/snap-no-connectivity"]["choices"][2]="Abort";
$elem["snapcraft/snap-no-connectivity"]["description"]="Unable to reach the snap store
 Your system is unable to reach the snap store, please make sure you're
 connected to the Internet and update any firewall or proxy settings as
 needed so that you can reach the snap store.
 .
 You can manually check for connectivity by running \"snap info snapcraft\"
 .
 Aborting will cause the upgrade to fail and will require it to be re-attempted
 once snapd is functional on the system.
 .
 Skipping will let the package upgrade continue but the Snapcraft commands
 will not be functional until the Snapcraft snap is installed.
";
$elem["snapcraft/snap-no-connectivity"]["descriptionde"]="";
$elem["snapcraft/snap-no-connectivity"]["descriptionfr"]="";
$elem["snapcraft/snap-no-connectivity"]["default"]="";
PKG_OptionPageTail2($elem);
?>
