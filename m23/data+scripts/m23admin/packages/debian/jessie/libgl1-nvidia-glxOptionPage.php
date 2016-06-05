<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libgl1-nvidia-glx");

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
 Before the ${free_name} driver can be used you must
 remove ${vendor} configuration from xorg.conf (and xorg.conf.d/).
";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["descriptionde"]="${vendor}-Treiber installieren trotz nicht unterstützter Grafikkarte?
 Ihr System hat eine Grafikkarte, die nicht mehr vom ${vendor}-Treiber (aus dem Paket ${driver}) bedient wird. Sie möchten das Paket vielleicht installiert lassen - um beispielsweise eine andere Karte zu betreiben, aber der folgende Chipsatz wird damit nicht nutzbar sein:
 .
 ${unsupported-device}
 .
 Die oben angegebene Karte benötigt entweder den nicht-freien Legacy-${vendor}-Treiber (aus dem Paket ${legacy_driver}) oder den freien ${free_name}-Treiber (aus dem Paket ${free_driver}).
 .
 Bevor der ${free_name}-Treiber genutzt werden kann, müssen Sie die ${vendor}-Konfiguration aus xorg.conf (und xorg.conf.d/) entfernen.
";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["descriptionfr"]="Faut-il installer le pilote ${vendor} avec une carte graphique non gérée ?
 La carte graphique de cette machine n'est plus gérée par le pilote ${vendor} (paquet ${driver}). Vous pouvez préférer garder le paquet installé (par exemple pour piloter une autre carte), mais dans ce cas, la carte graphique suivante ne sera pas utilisable :
 .
 ${unsupported-device}
 .
 Cette carte a besoin soit du pilote ${vendor} constructeur, non libre, fourni par le paquet ${legacy_driver} ou du pilote libre ${free_name} fourni par le paquet ${free_driver}.
 .
 Avant de pouvoir utiliser le pilote ${free_name}, il est nécessaire de supprimer la configuration de ${vendor} dans le fichier xorg.conf (ou dans un des fichiers de xorg.conf.d/).
";
$elem["nvidia-driver/install-even-if-unsupported-gpu-exists"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
