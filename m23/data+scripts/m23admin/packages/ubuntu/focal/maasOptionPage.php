<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas");

$elem["maas/snap-track"]["type"]="string";
$elem["maas/snap-track"]["description"]="Track for the MAAS snap:
 This can be specified just as a track name (e.g. \"2.7\", \"latest\", ...) or include
 a risk as well (e.g. \"latest/candidate\").
 .
 If not specified \"stable\" will be used.

";
$elem["maas/snap-track"]["descriptionde"]="";
$elem["maas/snap-track"]["descriptionfr"]="";
$elem["maas/snap-track"]["default"]="";
$elem["maas/snap-no-connectivity"]["type"]="select";
$elem["maas/snap-no-connectivity"]["choices"][1]="Retry";
$elem["maas/snap-no-connectivity"]["description"]="Unable to reach the snap store
 Your system is unable to reach the Snap Store, please make sure you're
 connected to the Internet and update any firewall or proxy settings as
 needed so that you can reach the Snap Store.
 .
 You can manually check for connectivity by running \"snap info maas\"
 .
 Aborting will cause the installation to fail and will require it to be
 re-attempted once snapd is functional on the system.

";
$elem["maas/snap-no-connectivity"]["descriptionde"]="";
$elem["maas/snap-no-connectivity"]["descriptionfr"]="";
$elem["maas/snap-no-connectivity"]["default"]="";
$elem["maas/snap-needs-setup"]["type"]="note";
$elem["maas/snap-needs-setup"]["description"]="MAAS installed but not set up
 The MAAS snap has been installed but service needs to be setup.
 .
 To set up MAAS, run the following command:
 .
   sudo maas init
 .
 This will interactively ask a set of questions.  Non-interactive set up is
 also available; run with --help to get a full list of available options.

";
$elem["maas/snap-needs-setup"]["descriptionde"]="";
$elem["maas/snap-needs-setup"]["descriptionfr"]="";
$elem["maas/snap-needs-setup"]["default"]="";
$elem["maas/snap-reinstall"]["type"]="boolean";
$elem["maas/snap-reinstall"]["description"]="MAAS snap already installed, reinstall it?
 The MAAS snap is already installed.
 .
 To migrate the current deb-based installation, the snap needs to be
 reinstalled.  All data from the current snap installation will be removed.
 .
 Selecting \"no\" will abort the installation.
";
$elem["maas/snap-reinstall"]["descriptionde"]="";
$elem["maas/snap-reinstall"]["descriptionfr"]="";
$elem["maas/snap-reinstall"]["default"]="";
PKG_OptionPageTail2($elem);
?>
