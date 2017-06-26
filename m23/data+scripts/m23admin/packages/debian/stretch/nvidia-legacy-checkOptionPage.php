<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nvidia-legacy-check");

$elem["nvidia-driver/check-for-unsupported-gpu"]["type"]="boolean";
$elem["nvidia-driver/check-for-unsupported-gpu"]["description"]="for internal use
 Can be preseeded. If set to false, disables the check for
 old GPUs that require a legacy driver instead of this driver.

";
$elem["nvidia-driver/check-for-unsupported-gpu"]["descriptionde"]="";
$elem["nvidia-driver/check-for-unsupported-gpu"]["descriptionfr"]="";
$elem["nvidia-driver/check-for-unsupported-gpu"]["default"]="true";
$elem["nvidia-driver/supported-in-legacy-driver-name"]["type"]="string";
$elem["nvidia-driver/supported-in-legacy-driver-name"]["description"]="for internal use
 Remembers the name of the legacy driver where the
 install-even-if-unsupported-gpu-exists question was answered with \"yes\".
 The question will be asked again if the legacy driver name changes.

";
$elem["nvidia-driver/supported-in-legacy-driver-name"]["descriptionde"]="";
$elem["nvidia-driver/supported-in-legacy-driver-name"]["descriptionfr"]="";
$elem["nvidia-driver/supported-in-legacy-driver-name"]["default"]="Default:";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["type"]="boolean";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["description"]="Install ${vendor} driver despite unsupported graphics card?
 This system has a graphics card which is no longer handled by the ${vendor}
 driver (package ${driver}). You may wish to keep the package installed -
 for instance to drive some other card - but the card with the following
 chipset won't be usable:
 .
 ${unsupported-device}
 .
 The above card requires either the non-free legacy ${vendor} driver
 (package ${legacy_driver}) or the free ${free_name} driver
 (package ${free_driver}).
 .
 Use the update-glx command to switch between different installed drivers.
 .
 Before the ${free_name} driver can be used you must
 remove ${vendor} configuration from xorg.conf (and xorg.conf.d/).
";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["descriptionde"]="";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["descriptionfr"]="";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
