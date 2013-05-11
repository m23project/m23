<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("udev");

$elem["udev/title/upgrade"]["type"]="title";
$elem["udev/title/upgrade"]["description"]="Upgrading udev
";
$elem["udev/title/upgrade"]["descriptionde"]="Es wird ein Upgrade von Udev durchgeführt
";
$elem["udev/title/upgrade"]["descriptionfr"]="Mise à niveau de udev
";
$elem["udev/title/upgrade"]["default"]="";
$elem["udev/reboot_needed"]["type"]="error";
$elem["udev/reboot_needed"]["description"]="Reboot needed after this upgrade
 You are currently upgrading udev using an incompatible kernel version. A
 compatible version is installed or being installed on the system, but
 you need to reboot using this new kernel as soon as the upgrade is
 complete.
 .
 Without a reboot with this new kernel version, the system may become
 UNUSABLE.
";
$elem["udev/reboot_needed"]["descriptionde"]="Nach diesem Upgrade ist ein Neustart notwendig
 Sie führen gegenwärtig ein Upgrade von Udev unter Verwendung einer inkompatiblen Kernel-Version durch. Eine kompatible Version ist oder wird gerade auf Ihrem System installiert. Sie müssen jedoch Ihren Rechner mit dem neuen Kernel neu starten, sobald das Upgrade beendet ist.
 .
 Ohne Neustart mit dieser neuen Kernel-Version könnte Ihr System UNBENUTZBAR werden.
";
$elem["udev/reboot_needed"]["descriptionfr"]="Redémarrage nécessaire après cette mise à niveau
 Vous êtes en train de mettre à niveau udev en utilisant une version de noyau incompatible. Une version compatible est installée ou en cours d'installation sur le système, mais il faudra redémarrer en utilisant ce nouveau noyau dès la fin de cette mise à niveau.
 .
 Sans redémarrage avec cette nouvelle version de noyau, votre système peut devenir INUTILISABLE.
";
$elem["udev/reboot_needed"]["default"]="";
$elem["udev/sysfs_deprecated_incompatibility"]["type"]="error";
$elem["udev/sysfs_deprecated_incompatibility"]["description"]="The running kernel has incompatible options enabled
 The currently running kernel has the CONFIG_SYSFS_DEPRECATED option
 enabled, which is incompatible with this udev release.  If you are using
 the standard Debian kernel packages and are in the process of upgrading
 from lenny to squeeze, a compatible kernel package should be installed as
 part of this upgrade.  If you are not using the Debian kernel packages or
 are not currently upgrading the system, you must take action to ensure your
 kernel is upgraded before the next reboot.
 .
 Failing to upgrade to a kernel without CONFIG_SYSFS_DEPRECATED will probably
 not prevent your system from booting, but will prevent certain udev rules
 from being applied at boot time.  In particular, all block devices will
 be owned by root:root (instead of root:disk), and network interfaces may be
 named differently after reboots.  This latter issue may be a problem if
 you are administering the machine remotely.
 .
 The upgrade of udev will continue after you acknowledge this message.
";
$elem["udev/sysfs_deprecated_incompatibility"]["descriptionde"]="Im laufenden Kernel sind inkompatible Optionen eingeschaltet
 Im derzeit laufende Kernel ist die Option CONFIG_SYSFS_DEPRECATED eingeschaltet, die mit dieser Veröffentlichung von Udev inkompatibel ist. Falls Sie die Standard-Kernel-Pakete von Debian verwenden und gerade ein Upgrade Ihres Systems von Lenny auf Squeeze durchführen, sollte ein kompatibles Kernel-Paket als Teil dieses Upgrades installiert werden. Falls Sie keine Kernel-Pakete von Debian verwenden oder derzeit kein Upgrade Ihres Systems durchführen, müssen Sie aktiv werden, um sicherzustellen, dass ein Upgrade Ihres Kernels vor dem nächsten Neustart durchgeführt wird.
 .
 Das Fehlschlagen des Upgrades auf einen Kernel ohne CONFIG_SYSFS_DEPRECATED wird wahrscheinlich nicht verhindern, dass Ihr System startet, es wird aber verhindern, dass bestimmte Udev-Regeln beim Start angewandt werden. Insbesondere werden alle blockorientierten Geräte »root:root« (anstatt »root:disk«) gehören und Netzwerkgeräte könnten nach Neustarts anders benannt werden. Dieser letzte Punkt könnte ein Problem sein, wenn Sie die Maschine aus der Ferne verwalten.
 .
 Das Upgrade von Udev wird fortfahren, nachdem Sie diese Meldung bestätigt haben.
";
$elem["udev/sysfs_deprecated_incompatibility"]["descriptionfr"]="Options incompatibles activées dans le noyau en cours d'exécution 
 L'option CONFIG_SYSFS_DEPRECATED est activée sur le noyau en cours d'exécution. Elle est incompatible avec cette version de udev. Si vous utilisez les paquets des noyaux standards de Debian et que vous êtes en train d'effectuer une mise à niveau de lenny vers squeeze, un paquet du noyau compatible devrait être installé lors de cette mise à niveau. Si vous n'utilisez pas les paquets des noyaux de Debian ou si vous n'êtes pas en train de mettre à niveau le système, vous devez prendre des mesures de manière à ce que votre noyau soit mis à niveau avant le prochain redémarrage.
 .
 Ne pas effectuer la mise à niveau vers un noyau sans CONFIG_SYSFS_DEPRECATED n'empêchera probablement pas votre système de redémarrer, mais empêchera certaines règles de udev d'être appliquées au moment du démarrage. En particulier, tous les périphériques en mode bloc auront le propriétaire root:root (au lieu de root:disk), et les périphériques réseau pourront avoir un autre nom après le redémarrage. Ce dernier point peut représenter un problème si vous administrez la machine à distance.
 .
 La mise à niveau de udev se poursuivra après que vous ayez acquitté ce message.
";
$elem["udev/sysfs_deprecated_incompatibility"]["default"]="";
$elem["udev/new_kernel_needed"]["type"]="boolean";
$elem["udev/new_kernel_needed"]["description"]="Proceed with the udev upgrade despite the kernel incompatibility?
 You are currently upgrading udev to a version that is not
 compatible with the currently running kernel.
 .
 You MUST install a compatible kernel version (2.6.26 or newer) before
 upgrading, otherwise the system may become UNUSABLE.
 Packages with a name starting with \"linux-image-2.6-\" provide a kernel
 image usable with this new udev version.
 .
 If you choose to upgrade udev nevertheless, you should install a
 compatible kernel and reboot with that kernel as soon as
 possible.
";
$elem["udev/new_kernel_needed"]["descriptionde"]="Upgrade trotz der Kernel-Inkompatibilität fortsetzen?
 Sie führen gegenwärtig ein Upgrade von Udev auf eine Version durch, die mit dem gegenwärtig laufenden Kernel nicht kompatibel ist.
 .
 Sie MÜSSEN eine kompatible Kernel-Version (2.6.26 oder höher) installieren, bevor Sie das Upgrade durchführen. Anderenfalls könnte das System UNBENUTZBAR werden. Pakete, deren Name mit »linux-image-2.6-« beginnt, stellen ein Kernel-Image zu Verfügung, welches mit dieser neuen Udev-Version verwendbar ist.
 .
 Falls Sie sich entscheiden, das Upgrade von Udev trotzdem durchzuführen, sollten Sie so bald wie möglich einen kompatiblen Kernel installieren und das System damit neu starten.
";
$elem["udev/new_kernel_needed"]["descriptionfr"]="Voulez-vous poursuivre la mise à niveau bien que le noyau soit incompatible ?
 Mise à niveau de udev vers une version non compatible avec le noyau actuellement en cours d'utilisation
 .
 Vous DEVEZ installer une version de noyau compatible (c'est-à-dire 2.6.26 ou plus récente) avant de procéder à cette mise à niveau, sinon votre système peut devenir INUTILISABLE. Les paquets dont le nom commence par « linux-image-2.6- » fournissent une image du noyau utilisable avec cette nouvelle version du paquet udev.
 .
 Si, malgré tout, vous choisissez de mettre à niveau udev, vous devriez installer une version de noyau compatible et redémarrer dès que possible.
";
$elem["udev/new_kernel_needed"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
