<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-image-3.16.0-4-686-pae");

$elem["linux-image-3.16.0-4-686-pae/postinst/depmod-error-initrd-3.16.0-4-686-pae"]["type"]="boolean";
$elem["linux-image-3.16.0-4-686-pae/postinst/depmod-error-initrd-3.16.0-4-686-pae"]["description"]="Abort installation after depmod error?
 The 'depmod' command exited with the exit code ${exit_value}
 (${SIGNAL}${CORE}).
 .
 Since this image uses initrd, the ${modules_base}/3.16.0-4-686-pae/modules.dep file
 will not be deleted, even though it may be invalid.
 .
 You should abort the installation and fix the
 errors in depmod, or regenerate the initrd image with a known good
 modules.dep file. If you don't abort the installation, there is
 a danger that the system will fail to boot.
";
$elem["linux-image-3.16.0-4-686-pae/postinst/depmod-error-initrd-3.16.0-4-686-pae"]["descriptionde"]="Installation nach depmod-Fehler abbrechen?
 Der »depmod«-Befehl wurde beendet: Rückgabewert ${exit_value} (${SIGNAL}${CORE}).
 .
 Da dieses Image eine Initrd verwendet, wird die Datei ${modules_base}/3.16.0-4-686-pae/modules.dep nicht gelöscht, obwohl sie ungültig sein könnte.
 .
 Sie sollten die Installation abbrechen und die Fehler bezüglich depmod beheben, oder erstellen Sie das Initrd-Image neu mit einer bekanntermaßen korrekten modules.dep-Datei. Falls Sie die Installation nicht abbrechen, besteht die Gefahr, dass das System nicht mehr neu gestartet werden kann.
";
$elem["linux-image-3.16.0-4-686-pae/postinst/depmod-error-initrd-3.16.0-4-686-pae"]["descriptionfr"]="Abandonner l'installation après l'erreur de depmod ?
 La commande depmod s’est terminée avec le code de retour ${exit_value} (${SIGNAL} ${CORE}).
 .
 Puisque cette image du noyau utilise initrd, le fichier ${modules_base}/3.16.0-4-686-pae/modules.dep ne sera pas effacé, mais il peut ne pas être valable.
 .
 Vous devriez abandonner l’installation et corriger les erreurs de dépendance entre les modules du noyau (depmod), ou créer une nouvelle image initrd avec un fichier modules.dep valable. Si vous n’annulez pas l’installation, le système risque de ne pas redémarrer correctement.
";
$elem["linux-image-3.16.0-4-686-pae/postinst/depmod-error-initrd-3.16.0-4-686-pae"]["default"]="false";
$elem["linux-image-3.16.0-4-686-pae/prerm/removing-running-kernel-3.16.0-4-686-pae"]["type"]="boolean";
$elem["linux-image-3.16.0-4-686-pae/prerm/removing-running-kernel-3.16.0-4-686-pae"]["description"]="Abort kernel removal?
 You are running a kernel (version ${running}) and attempting to remove
 the same version.
 .
 This can make the system unbootable as it will remove
 /boot/vmlinuz-${running} and all modules under the directory
 /lib/modules/${running}. This can only be fixed with a copy of the
 kernel image and the corresponding modules.
 .
 It is highly recommended to abort the kernel removal unless you are
 prepared to fix the system after removal.
";
$elem["linux-image-3.16.0-4-686-pae/prerm/removing-running-kernel-3.16.0-4-686-pae"]["descriptionde"]="Entfernen des Kernels abbrechen?
 Es läuft derzeit ein Kernel Version ${running} und Sie versuchen, die gleiche Version zu entfernen.
 .
 Das kann dazu führen, dass das System nicht mehr startfähig ist, da dadurch /boot/vmlinuz-${running} und alle Module unterhalb des Verzeichnisses /lib/modules/${running} entfernt werden. Dies kann nur mit einer Kopie des Kernel-Images und den dazugehörigen Modulen behoben werden.
 .
 Es wird dringend empfohlen, das Entfernen des Kernels abzubrechen, außer Sie sind darauf vorbereitet, das System nach der Entfernung wieder instandzusetzen.
";
$elem["linux-image-3.16.0-4-686-pae/prerm/removing-running-kernel-3.16.0-4-686-pae"]["descriptionfr"]="Abandonner la suppression du noyau ?
 Le noyau actuellement utilisé (version ${running}) est en train d'être supprimé.
 .
 Le système risque de ne plus pouvoir démarrer car /boot/vmlinuz-${running} sera enlevé ainsi que tous les modules du répertoire /lib/modules/${running}. Cela peut seulement être réparé avec une copie de l'image du noyau et des modules correspondants.
 .
 Interrompre la suppression du noyau est fortement recommandé à moins d’être ensuite capable de réparer le système.
";
$elem["linux-image-3.16.0-4-686-pae/prerm/removing-running-kernel-3.16.0-4-686-pae"]["default"]="true";
$elem["linux-image-3.16.0-4-686-pae/postinst/mips-initrd-3.16.0-4-686-pae"]["type"]="note";
$elem["linux-image-3.16.0-4-686-pae/postinst/mips-initrd-3.16.0-4-686-pae"]["description"]="Boot loader configuration must be updated to load initramfs
 This kernel package will build an \"initramfs\" file
 (/boot/initrd.img-3.16.0-4-686-pae) for the system's boot loader
 to use in addition to the kernel itself. This method, formerly
 unsupported on MIPS, enables a more flexible boot process, and future
 kernel versions may require a corresponding initrd.img to boot.
 .
 The currently running kernel was booted without an initramfs. You
 should reconfigure the boot loader to load the initramfs for Linux
 version 3.16.0-4, and for each later version. This is probably
 most easily accomplished by using the initrd.img symbolic link
 maintained by the kernel package.
";
$elem["linux-image-3.16.0-4-686-pae/postinst/mips-initrd-3.16.0-4-686-pae"]["descriptionde"]="Bootloader-Konfiguration muss aktualisiert werden, um initramfs zu laden
 Dieses Kernel-Paket wird eine »initramfs«-Datei (/boot/initrd.img-3.16.0-4-686-pae) erstellen, die vom Bootloader des Systems zusätzlich zum Kernel selbst verwendet wird. Diese Methode, früher auf MIPS nicht unterstützt, ermöglicht einen viel flexibleren Boot-Prozess und spätere Kernel-Versionen könnten eine passende initrd.img zum Booten voraussetzen.
 .
 Der aktuell laufende Kernel wurde ohne eine initramfs gebootet. Sie sollten den Bootloader neu konfigurieren, so dass er die initramfs für Linux Version 3.16.0-4 und jede spätere Version laden kann. Dies ist über die Verwendung des symbolischen Links für initrd.img aus dem Kernel-Paket unter Umständen am einfachsten möglich.
";
$elem["linux-image-3.16.0-4-686-pae/postinst/mips-initrd-3.16.0-4-686-pae"]["descriptionfr"]="La configuration du chargeur de démarrage doit être mise à jour pour charger le système de fichiers initial en mémoire
 Ce paquet de noyau construira un système de fichiers initial en mémoire (fichier « initramfs » : /boot/initrd.img-3.16.0-4-686-pae) pour que le chargeur de démarrage du système puisse l’utiliser en plus du noyau lui-même. Cette méthode, jusqu’alors non prise en charge sous MIPS, active un processus de démarrage plus flexible et les prochaines versions de noyau pourraient nécessiter un initrd.img pour démarrer.
 .
 Le noyau actuel a été démarré sans système de fichiers initial en mémoire. Vous devriez reconfigurer le système de démarrage pour charger le système de fichiers initial en mémoire pour la version 3.16.0-4 de Linux et toutes les versions suivantes. Le plus simple est probablement d’utiliser le lien symbolique initrd.img maintenu par le paquet du noyau.
";
$elem["linux-image-3.16.0-4-686-pae/postinst/mips-initrd-3.16.0-4-686-pae"]["default"]="";
PKG_OptionPageTail2($elem);
?>
