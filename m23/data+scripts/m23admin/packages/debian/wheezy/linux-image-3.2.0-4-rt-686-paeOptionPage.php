<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-image-3.2.0-4-rt-686-pae");

$elem["linux-image-3.2.0-4-rt-686-pae/postinst/depmod-error-initrd-3.2.0-4-rt-686-pae"]["type"]="boolean";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/depmod-error-initrd-3.2.0-4-rt-686-pae"]["description"]="Abort installation after depmod error?
 The 'depmod' command exited with the exit code ${exit_value}
 (${SIGNAL}${CORE}).
 .
 Since this image uses initrd, the ${modules_base}/3.2.0-4-rt-686-pae/modules.dep file
 will not be deleted, even though it may be invalid.
 .
 You should abort the installation and fix the
 errors in depmod, or regenerate the initrd image with a known good
 modules.dep file. If you don't abort the installation, there is
 a danger that the system will fail to boot.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/depmod-error-initrd-3.2.0-4-rt-686-pae"]["descriptionde"]="Installation nach depmod-Fehler abbrechen?
 Der »depmod«-Befehl wurde beendet: Rückgabewert ${exit_value} (${SIGNAL}${CORE}).
 .
 Da dieses Image eine initrd verwendet, wird die Datei ${modules_base}/3.2.0-4-rt-686-pae/modules.dep nicht gelöscht, obwohl sie ungültig sein könnte.
 .
 Sie sollten die Installation abbrechen und die Fehler bezüglich depmod beheben, oder erstellen Sie das initrd-Image neu mit einer bekanntermaßen korrekten modules.dep-Datei. Falls Sie die Installation nicht abbrechen, besteht die Gefahr, dass das System nicht mehr neu starten kann.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/depmod-error-initrd-3.2.0-4-rt-686-pae"]["descriptionfr"]="Abandonner l'installation après l'erreur de depmod ?
 La commande depmod s'est terminée avec le code de retour ${exit_value} (${SIGNAL} ${CORE}).
 .
 Puisque cette image du noyau utilise initrd, le fichier ${modules_base}/3.2.0-4-rt-686-pae/modules.dep ne sera pas effacé, mais il peut ne pas être valable.
 .
 Vous devriez abandonner l'installation et corriger les erreurs de dépendance entre les modules du noyau (depmod), ou créer une nouvelle image initrd avec un fichier modules.dep valable. Si vous n'annulez pas l'installation, le système risque de ne pas redémarrer correctement.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/depmod-error-initrd-3.2.0-4-rt-686-pae"]["default"]="false";
$elem["linux-image-3.2.0-4-rt-686-pae/prerm/removing-running-kernel-3.2.0-4-rt-686-pae"]["type"]="boolean";
$elem["linux-image-3.2.0-4-rt-686-pae/prerm/removing-running-kernel-3.2.0-4-rt-686-pae"]["description"]="Abort kernel removal?
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
$elem["linux-image-3.2.0-4-rt-686-pae/prerm/removing-running-kernel-3.2.0-4-rt-686-pae"]["descriptionde"]="Entfernen des Kernels abbrechen?
 Es läuft derzeit ein Kernel Version ${running} und Sie versuchen, die gleiche Version zu entfernen.
 .
 Das kann dazu führen, dass das System nicht mehr startfähig ist, da dadurch /boot/vmlinuz-${running} und alle Module unterhalb des Verzeichnisses /lib/modules/${running} entfernt werden. Dies kann nur mit einer Kopie des Kernel-Images und der dazugehörigen Module behoben werden.
 .
 Es wird dringend empfohlen, das Entfernen des Kernels abzubrechen, ausgenommen Sie sind darauf vorbereitet, das System nach der Entfernung wieder instandzusetzen.
";
$elem["linux-image-3.2.0-4-rt-686-pae/prerm/removing-running-kernel-3.2.0-4-rt-686-pae"]["descriptionfr"]="Abandonner la suppression du noyau ?
 Le noyau actuellement utilisé (version ${running}) est en train d'être supprimé.
 .
 Le système risque de ne plus pouvoir démarrer car /boot/vmlinuz-${running} sera enlevé ainsi que tous les modules du répertoire /lib/modules/${running}. Cela peut seulement être réparé avec une copie de l'image du noyau et des modules correspondants.
 .
 Il est fortement recommandé d'interrompre la suppression du noyau à moins d'être ensuite prêt à réparer le système.
";
$elem["linux-image-3.2.0-4-rt-686-pae/prerm/removing-running-kernel-3.2.0-4-rt-686-pae"]["default"]="true";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/missing-firmware-3.2.0-4-rt-686-pae"]["type"]="note";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/missing-firmware-3.2.0-4-rt-686-pae"]["description"]="Required firmware files may be missing
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
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/missing-firmware-3.2.0-4-rt-686-pae"]["descriptionde"]="Benötigte Firmware-Dateien möglicherweise nicht vorhanden
 Auf diesem System läuft derzeit Linux ${runningversion} und Sie installieren gerade Linux ${version}. In der neuen Version könnten einige Treiber, die auf diesem System verwendet werden, zusätzliche Firmware-Dateien benötigen:
 .
 ${missing}
 .
 Die meisten Firmware-Dateien sind nicht im System enthalten, da sie nicht mit den Debian-Richtlinien für Freie Software (DFSG) konform sind. Sie müssen unter Umständen den Paketmanager neu konfigurieren, so dass die contrib- und non-free-Sektionen des Paketarchivs ebenfalls enthalten sind, bevor Sie diese Firmware-Dateien installieren können.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/missing-firmware-3.2.0-4-rt-686-pae"]["descriptionfr"]="Microprogrammes (« firmwares ») probablement manquants
 Ce système utilise actuellement Linux ${runningversion}, et Linux ${version} va être installé. Dans la nouvelle version, certains pilotes utilisés par ce système peuvent avoir besoin des microprogrammes additionnels :
 .
 ${missing}
 .
 La plupart des microprogrammes ne sont pas intégrés car ils ne sont pas conformes aux principes du logiciel libre selon Debian. Il est probablement nécessaire de modifier la configuration du gestionnaire de paquets et d'ajouter les sections « contrib » (contributions) et « non-free » (non libre) de l'archive avant de pouvoir installer ces fichiers.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/missing-firmware-3.2.0-4-rt-686-pae"]["default"]="";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/ignoring-ramdisk"]["type"]="error";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/ignoring-ramdisk"]["description"]="Ramdisk configuration must be updated
 Kernel packages will no longer run a specific ramdisk creator.  The
 ramdisk creator package must install a script in
 /etc/kernel/postinst.d, and you should remove the line beginning
 'ramdisk =' from /etc/kernel-img.conf.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/ignoring-ramdisk"]["descriptionde"]="Aktualisierung der Ramdisk-Konfiguration erforderlich
 Kernel-Pakete werden keinen spezifischen Ramdisk-Ersteller mehr ausführen. Das Ramdisk-Ersteller-Paket muss ein Skript in /etc/kernel/postinst.d installieren und Sie sollten in /etc/kernel-img.conf die Zeile entfernen, die mit »ramdisk =« beginnt.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/ignoring-ramdisk"]["descriptionfr"]="Mise à jour indispensable de la configuration du disque virtuel initial
 Les paquets du noyau ne s'occupent plus de la création du disque virtuel (RAM disque). Le programme en charge de la création du disque virtuel doivent installer un script dans /etc/kernel/postinst.d, et vous devriez supprimer la ligne commençant par « ramdisk = » de /etc/kernel-img.conf.
";
$elem["linux-image-3.2.0-4-rt-686-pae/postinst/ignoring-ramdisk"]["default"]="";
PKG_OptionPageTail2($elem);
?>
