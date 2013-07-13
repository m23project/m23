<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libfglrx");

$elem["fglrx-driver/check-for-unsupported-gpu"]["type"]="boolean";
$elem["fglrx-driver/check-for-unsupported-gpu"]["description"]="for internal use
 Can be preseeded. If set to false, disables the check for no longer
 supported GPUs based on R6XX/R7XX.

";
$elem["fglrx-driver/check-for-unsupported-gpu"]["descriptionde"]="";
$elem["fglrx-driver/check-for-unsupported-gpu"]["descriptionfr"]="";
$elem["fglrx-driver/check-for-unsupported-gpu"]["default"]="true";
$elem["fglrx-driver/install-even-if-unsupported-gpu-exists"]["type"]="boolean";
$elem["fglrx-driver/install-even-if-unsupported-gpu-exists"]["description"]="Install Fglrx driver despite unsupported graphics card?
 This system has a graphics card which is no longer handled by the Fglrx
 driver (package fglrx-driver). You may wish to keep the package installed -
 for instance to drive some other card - but the card with the following
 chipset won't be usable:
 .
 ${unsupported-device}
 .
 The above card requires either the non-free legacy Fglrx driver
 (package fglrx-legacy-driver) or the free Radeon driver
 (package xserver-xorg-video-radeon).
 .
 The fglrx-legacy-driver package will be provided in wheezy-backports.
 .
 Before the Radeon driver can be used you must
 remove Fglrx configuration from xorg.conf (and xorg.conf.d/).
 .
 Note that switching to the free Radeon driver requires the
 fglrx-driver package to be purged (not just removed).
";
$elem["fglrx-driver/install-even-if-unsupported-gpu-exists"]["descriptionde"]="Fglrx-Treiber installieren trotz nicht unterstützter Grafikkarte?
 Ihr System hat eine Grafikkarte, die nicht mehr vom Fglrx-Treiber (aus dem Paket fglrx-driver) bedient wird. Sie möchten das Paket vielleicht installiert lassen - um beispielsweise eine andere Karte zu betreiben, aber der folgende Chipsatz wird damit nicht nutzbar sein:
 .
 ${unsupported-device}
 .
 Die oben angegebene Karte benötigt entweder den nicht-freien Legacy-Fglrx-Treiber (aus dem Paket fglrx-legacy-driver) oder den freien Radeon-Treiber (aus dem Paket xserver-xorg-video-radeon).
 .
 Das fglrx-legacy-driver-Paket wird in wheezy-backports angeboten werden.
 .
 Bevor der Radeon-Treiber genutzt werden kann, müssen Sie die Fglrx-Konfiguration aus xorg.conf (und xorg.conf.d/) entfernen.
 .
 Beachten Sie, dass der Wechsel zu dem freien Radeon-Treiber es erforderlich macht, das fglrx-driver-Paket vollständig, inklusive der Konfigurationsdateien, zu entfernen (--purge) (nur entfernen ist nicht ausreichend).
";
$elem["fglrx-driver/install-even-if-unsupported-gpu-exists"]["descriptionfr"]="Faut-il installer le pilote Fglrx avec une carte graphique non gérée ?
 Les jeux de composants graphiques suivants trouvés sur cette machine ne sont plus gérés par le pilote Fglrx. Vous pouvez préférer garder Fglrx (par exemple pour piloter une autre carte), mais dans ce cas, la carte graphique ci-dessus ne sera pas utilisable.
 .
 ${unsupported-device}
 .
 Cette carte a besoin soit du pilote Fglrx constructeur, non libre, fourni par le paquet fglrx-legacy-driver ou du pilote libre Radeon fourni par le paquet xserver-xorg-video-radeon.
 .
 Le paquet fglrx-legacy-driver sera fourni dans la distribution wheezy-backports (rétroportages destinés à wheezy).
 .
 Avant de pouvoir l'utiliser, il est nécessaire de supprimer la configuration de Fglrx dans le fichier xorg.conf (ou dans un des fichiers de xorg.conf.d/).
 .
 Veuillez noter que le remplacement par le pilote Radeon libre impose que le paquet fglrx-driver soit purgé et non simplement supprimé.
";
$elem["fglrx-driver/install-even-if-unsupported-gpu-exists"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
