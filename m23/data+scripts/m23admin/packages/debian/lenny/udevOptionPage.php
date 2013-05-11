<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("udev");

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
$elem["udev/reboot_needed"]["descriptionfr"]="Redémarrage nécessaire après cette mise à jour
 Vous êtes en train de mettre à jour udev en utilisant une version du noyau incompatible. Une version compatible est installée ou en cours d'installation sur le système, mais il faudra redémarrer en utilisant ce nouveau noyau dès la fin de cette mise à jour.
 .
 Sans redémarrage en utilisant cette nouvelle version du noyau, votre système peut devenir INUTILISABLE.
";
$elem["udev/reboot_needed"]["default"]="";
$elem["udev/new_kernel_needed"]["type"]="boolean";
$elem["udev/new_kernel_needed"]["description"]="Proceed with the udev upgrade despite the kernel incompatibility?
 You are currently upgrading udev to a version that is not
 compatible with the currently running kernel.
 .
 You MUST install a compatible kernel version (2.6.18 or newer) before
 upgrading, otherwise the system may become UNUSABLE.
 Packages with a name starting with \"linux-image-2.6-\" provide a kernel
 image usable with this new udev version.
 .
 If you choose to upgrade udev nevertheless, you should install a
 compatible kernel and reboot with that kernel as soon as
 possible.
";
$elem["udev/new_kernel_needed"]["descriptionde"]="Upgrade trotz Kernel-Inkompatibilität fortsetzen?
 Sie führen gegenwärtig ein Upgrade von Udev auf eine Version durch, die mit dem gegenwärtig laufenden Kernel nicht kompatibel ist.
 .
 Sie MÜSSEN eine kompatible Kernel-Version (2.6.18 oder höher) installieren, bevor Sie das Upgrade durchführen. Anderenfalls könnte das System UNBENUTZBAR werden. Pakete, deren Name mit »linux-image-2.6-« beginnt, stellen ein Kernel-Image zu Verfügung, welches mit dieser neuen Udev-Version verwendbar ist.
 .
 Falls Sie sich entscheiden, das Upgrade von Udev trotzdem durchzuführen, sollten Sie so bald wie möglich einen kompatiblen Kernel installieren und das System damit neu starten.
";
$elem["udev/new_kernel_needed"]["descriptionfr"]="Voulez-vous poursuivre la mise à jour bien que le noyau soit incompatible ?
 Vous êtes actuellement en train de mettre à jour udev vers une version qui pas compatible avec le noyau actuellement utilisé.
 .
 Vous DEVEZ installer une version du noyau compatible (c'est-à-dire 2.6.18 ou plus récente) avant de procéder à cette mise à jour, sinon votre système peut devenir INUTILISABLE. Les paquets dont le nom commence par « linux-image-2.6- » fournissent une image du noyau utilisable avec cette nouvelle version du paquet udev.
 .
 Si, malgré tout, vous choisissez de mettre à jour udev, vous devriez installer une version du noyau compatible et redémarrer dès que possible.
";
$elem["udev/new_kernel_needed"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
