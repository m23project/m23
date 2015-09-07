<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-image-2.6.32-5-486");

$elem["linux-image-2.6.32-5-486/postinst/depmod-error-initrd-2.6.32-5-486"]["type"]="boolean";
$elem["linux-image-2.6.32-5-486/postinst/depmod-error-initrd-2.6.32-5-486"]["description"]="Abort installation after depmod error?
 The 'depmod' command exited with the exit code ${exit_value}
 (${SIGNAL}${CORE}).
 .
 Since this image uses initrd, the ${modules_base}/2.6.32-5-486/modules.dep file
 will not be deleted, even though it may be invalid.
 .
 You should abort the installation and fix the
 errors in depmod, or regenerate the initrd image with a known good
 modules.dep file. If you don't abort the installation, there is
 a danger that the system will fail to boot.
";
$elem["linux-image-2.6.32-5-486/postinst/depmod-error-initrd-2.6.32-5-486"]["descriptionde"]="Installation nach depmod-Fehler abbrechen?
 Der »depmod«-Befehl wurde beendet: Rückgabewert ${exit_value} (${SIGNAL}${CORE}).
 .
 Da dieses Image eine initrd verwendet, wird die Datei ${modules_base}/2.6.32-5-486/modules.dep nicht gelöscht, obwohl sie ungültig sein könnte.
 .
 Sie sollten die Installation abbrechen und die Fehler bezüglich depmod beheben, oder erstellen Sie das initrd-Image neu mit einer bekanntermaßen korrekten modules.dep-Datei. Falls Sie die Installation nicht abbrechen, besteht die Gefahr, dass das System nicht mehr neu starten kann.
";
$elem["linux-image-2.6.32-5-486/postinst/depmod-error-initrd-2.6.32-5-486"]["descriptionfr"]="Abandonner l'installation après l'erreur de depmod ?
 La commande depmod s'est terminée avec le code de sortie ${exit_value} (${SIGNAL} ${CORE}).
 .
 Puisque cette image du noyau utilise initrd, le fichier ${modules_base}/2.6.32-5-486/modules.dep ne sera pas effacé, mais il peut ne pas être valable.
 .
 Vous devriez abandonner l'installation et corriger les erreurs de dépendance entre les modules du noyau (depmod), ou créer une nouvelle image initrd avec un fichier modules.dep valable. Si vous n'annulez pas l'installation, le système risque de ne pas redémarrer correctement.
";
$elem["linux-image-2.6.32-5-486/postinst/depmod-error-initrd-2.6.32-5-486"]["default"]="false";
$elem["linux-image-2.6.32-5-486/prerm/removing-running-kernel-2.6.32-5-486"]["type"]="boolean";
$elem["linux-image-2.6.32-5-486/prerm/removing-running-kernel-2.6.32-5-486"]["description"]="Abort kernel removal?
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
$elem["linux-image-2.6.32-5-486/prerm/removing-running-kernel-2.6.32-5-486"]["descriptionde"]="Entfernen des Kernels abbrechen?
 Es läuft derzeit ein Kernel Version ${running} und Sie versuchen, die gleiche Version zu entfernen.
 .
 Das kann dazu führen, dass das System nicht mehr startfähig ist, da dadurch /boot/vmlinuz-${running} und alle Module unterhalb des Verzeichnisses /lib/modules/${running} entfernt werden. Dies kann nur mit einer Kopie des Kernel-Images und der dazugehörigen Module behoben werden.
 .
 Es wird dringend empfohlen, das Entfernen des Kernels abzubrechen, ausgenommen Sie sind darauf vorbereitet, das System nach der Entfernung wieder instandzusetzen.
";
$elem["linux-image-2.6.32-5-486/prerm/removing-running-kernel-2.6.32-5-486"]["descriptionfr"]="Abandonner la suppression du noyau ?
 Le noyau actuellement utilisé (version ${running}) est en train d'être supprimé.
 .
 Le système risque de ne plus pouvoir démarrer car /boot/vmlinuz-${running} sera enlevé ainsi que tous les modules du répertoire /lib/modules/${running}. Cela peut seulement être réparé avec une copie de l'image du noyau et des modules correspondants.
 .
 Il est fortement recommandé d'interrompre la suppression du noyau à moins d'être ensuite prêt à réparer le système.
";
$elem["linux-image-2.6.32-5-486/prerm/removing-running-kernel-2.6.32-5-486"]["default"]="true";
$elem["linux-image-2.6.32-5-486/postinst/missing-firmware-2.6.32-5-486"]["type"]="note";
$elem["linux-image-2.6.32-5-486/postinst/missing-firmware-2.6.32-5-486"]["description"]="Required firmware files may be missing
 This system is currently running Linux ${runningversion} and you are
 installing Linux ${version}.  In the new version some of the drivers
 used on this system may require additional firmware files:
 .
 ${missing}
 .
 Most firmware files are not included in the system because they do
 not conform to the Debian Free Software Guidelines. You may need to
 reconfigure the package manager to include the contrib and non-free
 sections of the package archive before you can install these
 firmware files.
";
$elem["linux-image-2.6.32-5-486/postinst/missing-firmware-2.6.32-5-486"]["descriptionde"]="Benötigte Firmware-Dateien möglicherweise nicht vorhanden
 Auf diesem System läuft derzeit Linux ${runningversion} und Sie installieren gerade Linux ${version}. In der neuen Version könnten einige Treiber, die auf diesem System verwendet werden, zusätzliche Firmware-Dateien benötigen:
 .
 ${missing}
 .
 Die meisten Firmware-Dateien sind nicht im System enthalten, da sie nicht mit den Debian-Richtlinien für Freie Software (DFSG) konform sind. Sie müssen unter Umständen den Paketmanager neu konfigurieren, so dass die contrib- und non-free-Sektionen des Paketarchivs ebenfalls enthalten sind, bevor Sie diese Firmware-Dateien installieren können.
";
$elem["linux-image-2.6.32-5-486/postinst/missing-firmware-2.6.32-5-486"]["descriptionfr"]="Microprogrammes (« firmwares ») probablement manquants
 Ce système utilise actuellement Linux ${runningversion}, et Linux ${version} va être installé. Dans la nouvelle version, certains pilotes utilisés par ce système peuvent avoir besoin des microprogrammes additionnels :
 .
 ${missing}
 .
 La plupart des microprogrammes ne sont pas intégrés car ils ne sont pas conformes aux principes du logiciel libre selon Debian. Il est probablement nécessaire de modifier la configuration du gestionnaire de paquets et d'ajouter les sections « contrib » (contributions) et « non-free » (non libre) de l'archive avant de pouvoir installer ces fichiers.
";
$elem["linux-image-2.6.32-5-486/postinst/missing-firmware-2.6.32-5-486"]["default"]="";
$elem["linux-image-2.6.32-5-486/postinst/ignoring-do-bootloader-2.6.32-5-486"]["type"]="error";
$elem["linux-image-2.6.32-5-486/postinst/ignoring-do-bootloader-2.6.32-5-486"]["description"]="Boot loader configuration must be updated
 Kernel packages no longer update a default boot loader.  You should
 remove 'do_bootloader = yes' from /etc/kernel-img.conf.
 .
 If the boot loader needs to be updated whenever a new kernel is
 installed, the boot loader package should install a script in
 /etc/kernel/postinst.d.  Alternately, you can specify the command
 to update the boot loader by setting the 'postinst_hook' variable
 in /etc/kernel-img.conf.
";
$elem["linux-image-2.6.32-5-486/postinst/ignoring-do-bootloader-2.6.32-5-486"]["descriptionde"]="Aktualisierung der Bootloader-Konfiguration erforderlich
 Kernel-Pakete aktualisieren nicht mehr länger den Standard-Bootloader. Sie sollten den Eintrag »do_bootloader = yes« aus /etc/kernel-img.conf entfernen.
 .
 Falls der Bootloader aktualisiert werden muss, wenn ein neuer Kernel installiert wird, sollte das Bootloader-Paket ein Skript in /etc/kernel/postinst.d installieren. Alternativ können Sie den Befehl für die Aktualisierung des Bootloaders über das Setzen der Variable »postinst_hook« in /etc/kernel-img.conf festlegen.
";
$elem["linux-image-2.6.32-5-486/postinst/ignoring-do-bootloader-2.6.32-5-486"]["descriptionfr"]="Mise à jour indispensable de la configuration du programme d'amorçage
 Les paquets du noyau ne s'occupent plus de la mise à jour d'un programme d'amorçage par défaut. Vous devriez enlever 'do_bootloader = yes' de /etc/kernel-img.conf.
 .
 Si le programme d'amorçage doit être mis à jour à chaque fois qu'un nouveau noyau est installé, le paquet du programme d'amorçage doit installer un script dans /etc/kernel/postinst.d. Sinon, vous pouvez indiquer la commande de mise à jour du programme d'amorçage en configurant la variable « postinst_hook » dans /etc/kernel-img.conf.
";
$elem["linux-image-2.6.32-5-486/postinst/ignoring-do-bootloader-2.6.32-5-486"]["default"]="";
PKG_OptionPageTail2($elem);
?>
