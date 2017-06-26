<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub-pc");

$elem["grub2/linux_cmdline"]["type"]="string";
$elem["grub2/linux_cmdline"]["description"]="Linux command line:
 The following Linux command line was extracted from /etc/default/grub or the
 `kopt' parameter in GRUB Legacy's menu.lst. Please verify that it is correct,
 and modify it if necessary. The command line is allowed to be empty.
";
$elem["grub2/linux_cmdline"]["descriptionde"]="Linux-Befehlszeile:
 Die folgende Linux-Befehlszeile wurde aus /etc/default/grub oder dem Parameter »kopt« in der Datei menu.lst von GRUB Legacy extrahiert. Bitte überprüfen Sie, ob die Befehlszeile korrekt ist und ändern Sie diese, wenn es notwendig ist. Diese Befehlszeile darf leer sein.
";
$elem["grub2/linux_cmdline"]["descriptionfr"]="Ligne de commande de Linux :
 La ligne de commande de Linux suivante a été récupérée via le fichier /etc/default/grub ou le paramètre « kopt » du fichier menu.lst utilisé par la version originelle de GRUB. Veuillez contrôler qu'elle est correcte et la modifier si nécessaire. Cette ligne de commande peut être vide.
";
$elem["grub2/linux_cmdline"]["default"]="";
$elem["grub2/linux_cmdline_default"]["type"]="string";
$elem["grub2/linux_cmdline_default"]["description"]="Linux default command line:
 The following string will be used as Linux parameters for the default menu
 entry but not for the recovery mode.
";
$elem["grub2/linux_cmdline_default"]["descriptionde"]="Standard-Befehlszeile für Linux:
 Die folgende Zeichenkette wird als Linux-Parameter für den Standardmenüeintrag, nicht aber für den Rettungsmodus verwandt.
";
$elem["grub2/linux_cmdline_default"]["descriptionfr"]="Ligne de commande par défaut de Linux :
 Les paramètres indiqués seront utilisés pour le noyau Linux de l'entrée de menu par défaut mais pas pour le mode de secours.
";
$elem["grub2/linux_cmdline_default"]["default"]="quiet splash";
$elem["grub2/force_efi_extra_removable"]["type"]="boolean";
$elem["grub2/force_efi_extra_removable"]["description"]="Force extra installation to the EFI removable media path?
 Some EFI-based systems are buggy and do not handle new bootloaders correctly.
 If you force an extra installation of GRUB to the EFI removable media path,
 this should ensure that this system will boot Debian correctly despite such a
 problem. However, it may remove the ability to boot any other operating
 systems that also depend on this path. If so, you will need to make sure that
 GRUB is configured successfully to be able to boot any other OS installations
 correctly.
";
$elem["grub2/force_efi_extra_removable"]["descriptionde"]="Zusätzliche Installation in den Pfad für EFI-Wechselmedien erzwingen?
 Einige EFI-basierte Systeme haben einen Fehler und handhaben neue Bootloader nicht korrekt. Falls Sie eine zusätzliche Installation von GRUB in den Pfad  für EFI-Wechselmedien erzwingen, sollten Sie gewährleisten, dass das System Debian trotz dieses Problems korrekt startet. Es besteht jedoch die Möglichkeit, dass ein anderes von diesem Pfad abhängiges Betriebssystem nicht mehr starten kann. In diesem Fall müssen Sie sicherstellen, dass GRUB erfolgreich konfiguriert wurde und Installationen beliebiger anderer Betriebssystem korrekt starten können.
";
$elem["grub2/force_efi_extra_removable"]["descriptionfr"]="Faut-il forcer une installation supplémentaire sur le chemin des supports amovibles EFI ?
 Certains systèmes EFI ne gèrent pas correctement les nouveaux chargeurs d'amorçage. Si vous forcez l'installation de GRUB sur le chemin des supports amovibles EFI, cela garantira que ce système pourra malgré tout démarrer Debian. Par contre, cela interdira le démarrage de tout autre système d'exploitation qui dépendrait aussi de ce chemin. Si c'est le cas, vous devez vous assurer que GRUB lui-même est configuré pour démarrer les autres systèmes d'exploitation.
";
$elem["grub2/force_efi_extra_removable"]["default"]="false";
$elem["grub2/kfreebsd_cmdline"]["type"]="string";
$elem["grub2/kfreebsd_cmdline"]["description"]="kFreeBSD command line:
 The following kFreeBSD command line was extracted from /etc/default/grub or the
 `kopt' parameter in GRUB Legacy's menu.lst. Please verify that it is correct,
 and modify it if necessary. The command line is allowed to be empty.
";
$elem["grub2/kfreebsd_cmdline"]["descriptionde"]="Befehlszeile für kFreeBSD:
 Die folgende kFreeBSD-Befehlszeile wurde aus /etc/default/grub oder dem Parameter »kopt« in der Datei menu.lst von GRUB Legacy extrahiert. Bitte überprüfen Sie, ob diese korrekt ist und passen Sie sie an, wenn das erforderlich ist. Diese Befehlszeile darf leer sein.
";
$elem["grub2/kfreebsd_cmdline"]["descriptionfr"]="Ligne de commande de kFreeBSD :
 La ligne de commande de kFreeBSD suivante a été récupérée via le fichier /etc/default/grub ou le paramètre « kopt » du fichier menu.lst utilisé par la version originelle de GRUB. Veuillez contrôler qu'elle est correcte et la modifier si nécessaire. Cette ligne de commande peut être vide.
";
$elem["grub2/kfreebsd_cmdline"]["default"]="";
$elem["grub2/kfreebsd_cmdline_default"]["type"]="string";
$elem["grub2/kfreebsd_cmdline_default"]["description"]="kFreeBSD default command line:
 The following string will be used as kFreeBSD parameters for the default menu
 entry but not for the recovery mode.
";
$elem["grub2/kfreebsd_cmdline_default"]["descriptionde"]="Standard-Befehlszeile für kFreeBSD:
 Die folgende Zeichenkette wird als kFreeBSD-Parameter für den Standardmenüeintrag, nicht aber für den Rettungsmodus verwandt.
";
$elem["grub2/kfreebsd_cmdline_default"]["descriptionfr"]="Ligne de commande par défaut de kFreeBSD :
 Les paramètres indiqués seront utilisés pour le noyau kFreeBSD de l'entrée de menu par défaut mais pas pour le mode de secours.
";
$elem["grub2/kfreebsd_cmdline_default"]["default"]="quiet splash";
$elem["grub2/device_map_regenerated"]["type"]="note";
$elem["grub2/device_map_regenerated"]["description"]="/boot/grub/device.map has been regenerated
 The file /boot/grub/device.map has been rewritten to use stable device
 names. In most cases, this should significantly reduce the need to change
 it in future, and boot menu entries generated by GRUB should not be
 affected.
 .
 However, since more than one disk is present in the system, it is possible
 that the system is depending on the old device map. Please check whether
 there are any custom boot menu entries that rely on GRUB's (hdN) drive
 numbering, and update them if necessary.
 .
 If you do not understand this message, or if there are no custom
 boot menu entries, you can ignore this message.
";
$elem["grub2/device_map_regenerated"]["descriptionde"]="/boot/grub/device.map wurde neu erstellt.
 Die Datei /boot/grub/device.map wurde umgeschrieben, um stabile Gerätenamen zu verwenden. In der Mehrzahl der Fälle sollte dies die Notwendigkeit zukünftiger Änderungen deutlich verringern. Von GRUB erstellte Boot-Menü-Einträge sollten nicht betroffen sein.
 .
 Da sich in diesem System mehrere Festplatten befinden, ist es möglich, dass das System von der alten »device map« abhängig ist. Bitte überprüfen Sie, obbenutzerdefinierte Boot-Menü-Einträge mit der (hdn)-Laufwerkszählung von GRUB vorhanden sind und aktualisieren Sie diese gegebenenfalls.
 .
 Wenn Sie diese Nachricht nicht verstehen oder wenn keine modifizierten Boot-Menü-Einträge vorhanden sind, können Sie diese Nachricht ignorieren.
";
$elem["grub2/device_map_regenerated"]["descriptionfr"]="Recréation de /boot/grub/device.map
 Le fichier /boot/grub/device.map a été réécrit afin d'utiliser des noms de périphériques stables. Dans la majorité des cas, cela devrait éviter d'avoir à le modifier dans le futur et les entrées de menu créées par GRUB ne devraient pas être affectées par ce changement.
 .
 Cependant, si la machine comporte plus d'un disque, il est possible que le démarrage dépende de l'ancien système de cartographie des périphériques (« device map »). Vous devriez vérifier s'il existe des entrées de menu de démarrage personnalisées qui se servent encore de la numérotation de disques de GRUB (hdN), puis les mettre à jour si nécessaire.
 .
 Si vous ne comprenez pas ces explications ou n'utilisez pas d'entrées personnalisées dans le menu de démarrage, vous pouvez ignorer cet avertissement.
";
$elem["grub2/device_map_regenerated"]["default"]="";
$elem["grub-pc/chainload_from_menu.lst"]["type"]="boolean";
$elem["grub-pc/chainload_from_menu.lst"]["description"]="Chainload from menu.lst?
 GRUB upgrade scripts have detected a GRUB Legacy setup in /boot/grub.
 .
 In order to replace the Legacy version of GRUB in your system, it is
 recommended that /boot/grub/menu.lst is adjusted to load a GRUB 2 boot
 image from your existing GRUB Legacy setup. This step can be automatically
 performed now.
 .
 It's recommended that you accept chainloading GRUB 2 from menu.lst, and
 verify that the new GRUB 2 setup works before it is written to the MBR
 (Master Boot Record).
 .
 Whatever your decision, you can replace the old MBR image with GRUB 2
 later by issuing the following command as root:
 .
 upgrade-from-grub-legacy
";
$elem["grub-pc/chainload_from_menu.lst"]["descriptionde"]="Aus »menu.lst« laden (Chainload)?
 Die Upgrade-Skripte von GRUB haben eine Installation von »GRUB Legacy« in /boot/grub gefunden.
 .
 Um die Legacy-Version von GRUB auf Ihrem System zu ersetzen, wird die Anpassung von /boot/grub/menu.lst empfohlen, so dass GRUB 2 aus Ihrer bestehenden GRUB-Legacy-Konfiguration heraus geladen wird. Dieser Schritt kann jetzt automatisch vollzogen werden.
 .
 Es wird empfohlen, dass Sie dem Laden von GRUB 2 aus menu.lst zustimmen und überprüfen, dass Ihre neue »GRUB 2«-Installation funktioniert, bevor diese in den MBR (Master Boot Record) geschrieben wird.
 .
 Unabhängig von Ihrer Entscheidung können Sie den alten MBR später durch GRUB 2 ersetzen. Geben Sie dazu als »root« den folgenden Befehl ein:
 .
 upgrade-from-grub-legacy
";
$elem["grub-pc/chainload_from_menu.lst"]["descriptionfr"]="Faut-il enchaîner le chargement depuis menu.lst ?
 Une installation standard de GRUB a été détectée dans /boot/grub.
 .
 Afin de remplacer cette installation, il est recommandé de modifier /boot/grub/menu.lst pour charger GRUB 2 depuis l'installation standard de GRUB (« chainload »). Veuillez choisir si vous souhaitez effectuer cette modification.
 .
 Il est recommandé de choisir cette option pour pouvoir confirmer le bon fonctionnement de GRUB 2 avant de l'installer directement sur le secteur d'amorçage (MBR : « Master Boot Record »).
 .
 Quel que soit votre choix, vous pourrez, plus tard, remplacer l'ancien secteur d'amorçage par GRUB 2 avec la commande suivante, exécutée avec les privilèges du superutilisateur :
 .
 upgrade-from-grub-legacy
";
$elem["grub-pc/chainload_from_menu.lst"]["default"]="true";
$elem["grub-pc/install_devices"]["type"]="multiselect";
$elem["grub-pc/install_devices"]["description"]="GRUB install devices:
 The grub-pc package is being upgraded. This menu allows you to select which
 devices you'd like grub-install to be automatically run for, if any.
 .
 Running grub-install automatically is recommended in most situations, to
 prevent the installed GRUB core image from getting out of sync with GRUB
 modules or grub.cfg.
 .
 If you're unsure which drive is designated as boot drive by your BIOS, it is
 often a good idea to install GRUB to all of them.
 .
 Note: it is possible to install GRUB to partition boot records as well, and
 some appropriate partitions are offered here. However, this forces GRUB to
 use the blocklist mechanism, which makes it less reliable, and therefore is
 not recommended.
";
$elem["grub-pc/install_devices"]["descriptionde"]="Geräte für die GRUB-Installation:
 Für das Paket grub-pc wird gerade ein Upgrade durchgeführt. In diesem Menü können Sie auswählen, ob und für welche Geräte grub-install automatisch ausgeführt werden soll.
 .
 Für die Mehrzahl der Fälle wird empfohlen, grub-install automatisch laufen zu lassen. So wird vermieden, dass das installierte GRUB-Image nicht zu den GRUB-Modulen oder grub.cfg passt.
 .
 Wenn Sie nicht sicher sind, welches Gerät das BIOS zum Booten benutzt, ist es oft eine gute Idee, GRUB auf allen Geräten zu installieren.
 .
 Hinweis: Sie können GRUB auch in die Boot-Blöcke von Partionen schreiben.Hier werden auch einige geeignete Partitionen angeboten. Das zwingt GRUB allerdings dazu, den Blocklist-Mechanismus zu verwenden. Dieser ist weniger zuverlässig und wird daher nicht empfohlen.
";
$elem["grub-pc/install_devices"]["descriptionfr"]="Périphériques où installer GRUB :
 Le paquet grub-pc est en cours de mise à jour. Ce menu permet de choisir pour quels périphériques vous souhaitez exécuter la commande grub-install automatiquement.
 .
 Il est en général recommandé d'exécuter grub-install automatiquement, afin d'éviter la situation où l'image de GRUB est désynchronisée avec les modules de GRUB ou le fichier grub.cfg.
 .
 Si vous n'avez pas la certitude du périphérique utilisé comme périphérique d'amorçage par le BIOS, il est en général conseillé d'installer GRUB sur l'ensemble des périphériques.
 .
 Veuillez noter que GRUB peut également être installé sur les secteurs d'amorçage de partitions. Certaines partitions où cela pourrait être nécessaire sont indiquées ici. Cependant, cela impose que GRUB utilise le mécanisme « blocklist », ce qui le rend moins fiable et n'est donc pas recommandé.
";
$elem["grub-pc/install_devices"]["default"]="";
$elem["grub-pc/install_devices_disks_changed"]["type"]="multiselect";
$elem["grub-pc/install_devices_disks_changed"]["description"]="GRUB install devices:
 The GRUB boot loader was previously installed to a disk that is no longer
 present, or whose unique identifier has changed for some reason. It is
 important to make sure that the installed GRUB core image stays in sync
 with GRUB modules and grub.cfg. Please check again to make sure that GRUB
 is written to the appropriate boot devices.
 .
 If you're unsure which drive is designated as boot drive by your BIOS, it is
 often a good idea to install GRUB to all of them.
 .
 Note: it is possible to install GRUB to partition boot records as well, and
 some appropriate partitions are offered here. However, this forces GRUB to
 use the blocklist mechanism, which makes it less reliable, and therefore is
 not recommended.
";
$elem["grub-pc/install_devices_disks_changed"]["descriptionde"]="Geräte für die GRUB-Installation:
 Der GRUB-Bootloader wurde zuvor auf einem Datenträger, der nicht mehr im System vorhanden ist oder dessen eindeutige Kennung aus irgendeinem Grund geändert wurde, installiert. Es ist wichtig, sicherzustellen, dass das installierte GRUB-Core-Image synchron mit den GRUB-Modulen und grub.cfg bleibt. Bitte prüfen Sie erneut, um sicherzustellen, dass GRUB auf die entsprechenden Boot-Geräte geschrieben wird.
 .
 Wenn Sie nicht sicher sind, welches Gerät das BIOS zum Booten benutzt, ist es oft eine gute Idee, GRUB auf allen Geräten zu installieren.
 .
 Hinweis: Sie können GRUB auch in die Boot-Blöcke von Partionen schreiben.Hier werden auch einige geeignete Partitionen angeboten. Das zwingt GRUB allerdings dazu, den Blocklist-Mechanismus zu verwenden. Dieser ist weniger zuverlässig und wird daher nicht empfohlen.
";
$elem["grub-pc/install_devices_disks_changed"]["descriptionfr"]="Périphériques où installer GRUB :
 Le chargeur d'amorçage GRUB était précédemment installé sur un disque qui n'est plus présent ou dont l'identifiant unique a changé pour une raison ou une autre. Il est important de vous assurer que l'image de GRUB qui est installée reste synchronisée avec les modules de GRUB ou grub.cfg. Veuillez vérifier à nouveau que GRUB sera bien installé sur les périphériques d'amorçage pertinents.
 .
 Si vous n'avez pas la certitude du périphérique utilisé comme périphérique d'amorçage par le BIOS, il est en général conseillé d'installer GRUB sur l'ensemble des périphériques.
 .
 Veuillez noter que GRUB peut également être installé sur les secteurs d'amorçage de partitions. Certaines partitions où cela pourrait être nécessaire sont indiquées ici. Cependant, cela impose que GRUB utilise le mécanisme « blocklist », ce qui le rend moins fiable et n'est donc pas recommandé.
";
$elem["grub-pc/install_devices_disks_changed"]["default"]="";
$elem["grub-pc/disk_description"]["type"]="text";
$elem["grub-pc/disk_description"]["description"]="${DEVICE} (${SIZE} MB; ${MODEL})
";
$elem["grub-pc/disk_description"]["descriptionde"]="${DEVICE} (${SIZE} MB; ${MODEL})
";
$elem["grub-pc/disk_description"]["descriptionfr"]="${DEVICE} (${SIZE} Mo; ${MODEL})
";
$elem["grub-pc/disk_description"]["default"]="";
$elem["grub-pc/partition_description"]["type"]="text";
$elem["grub-pc/partition_description"]["description"]="- ${DEVICE} (${SIZE} MB; ${PATH})
";
$elem["grub-pc/partition_description"]["descriptionde"]="- ${DEVICE} (${SIZE} MB; ${PATH})
";
$elem["grub-pc/partition_description"]["descriptionfr"]="- ${DEVICE} (${SIZE} Mo; ${PATH})
";
$elem["grub-pc/partition_description"]["default"]="";
$elem["grub-pc/install_devices_failed"]["type"]="boolean";
$elem["grub-pc/install_devices_failed"]["description"]="Writing GRUB to boot device failed - continue?
 GRUB failed to install to the following devices:
 .
 ${FAILED_DEVICES}
 .
 Do you want to continue anyway? If you do, your computer may not start up
 properly.
";
$elem["grub-pc/install_devices_failed"]["descriptionde"]="GRUB konnte nicht auf das Boot-Gerät geschrieben werden - fortfahren?
 GRUB konnte nicht auf den folgenden Geräten installiert werden:
 .
 ${FAILED_DEVICES}
 .
 Wollen Sie trotzdem fortfahren? Falls ja, wird Ihr Rechner vielleicht nicht problemlos hochfahren.
";
$elem["grub-pc/install_devices_failed"]["descriptionfr"]="Échec de l'installation de GRUB sur le périphérique d'amorçage. Continuer ?
 GRUB n'a pas pu être installé sur les périphériques suivants :
 .
 ${FAILED_DEVICES}
 .
 Veuillez confirmer si vous souhaitez continuer malgré le risque d'un démarrage incorrect de la machine.
";
$elem["grub-pc/install_devices_failed"]["default"]="false";
$elem["grub-pc/install_devices_failed_upgrade"]["type"]="boolean";
$elem["grub-pc/install_devices_failed_upgrade"]["description"]="Writing GRUB to boot device failed - try again?
 GRUB failed to install to the following devices:
 .
 ${FAILED_DEVICES}
 .
 You may be able to install GRUB to some other device, although you should
 check that your system will boot from that device. Otherwise, the upgrade
 from GRUB Legacy will be canceled.
";
$elem["grub-pc/install_devices_failed_upgrade"]["descriptionde"]="Das Schreiben von GRUB auf das Boot-Gerät ist fehlgeschlagen. Noch einmal versuchen?
 GRUB konnte nicht auf den folgenden Geräten installiert werden:
 .
 ${FAILED_DEVICES}
 .
 Vielleicht können Sie GRUB auf einem anderen Gerät installieren. Sie sollten aber prüfen, ob Ihr System von diesem Gerät startet. Sonst wird das Upgrade von GRUB Legacy abgebrochen.
";
$elem["grub-pc/install_devices_failed_upgrade"]["descriptionfr"]="Échec de l'installation de GRUB sur le périphérique d'amorçage. Essayer à nouveau ?
 GRUB n'a pas pu être installé sur les périphériques suivants :
 .
 ${FAILED_DEVICES}
 .
 Il est peut-être possible d'installer GRUB sur un autre périphérique après avoir vérifié que le système pourra démarrer sur ce périphérique. Dans le cas contraire, la mise à jour depuis l'ancienne version de GRUB va échouer.
";
$elem["grub-pc/install_devices_failed_upgrade"]["default"]="true";
$elem["grub-pc/install_devices_empty"]["type"]="boolean";
$elem["grub-pc/install_devices_empty"]["description"]="Continue without installing GRUB?
 You chose not to install GRUB to any devices. If you continue, the boot
 loader may not be properly configured, and when this computer next starts
 up it will use whatever was previously in the boot sector. If there is an
 earlier version of GRUB 2 in the boot sector, it may be unable to load
 modules or handle the current configuration file.
 .
 If you are already using a different boot loader and want to carry on
 doing so, or if this is a special environment where you do not need a boot
 loader, then you should continue anyway. Otherwise, you should install
 GRUB somewhere.
";
$elem["grub-pc/install_devices_empty"]["descriptionde"]="Fortsetzen, ohne Grub zu installieren?
 Sie haben sich entschieden, GRUB auf kein Gerät zu installieren. Wenn Sie fortfahren, könnte der Boot-Loader nicht richtig konfiguriert sein. Beim nächsten Hochfahren dieses Computers wird der Boot-Loader benutzen, was immer sich vorher im Boot-Sektor befand. Wenn sich schon eine ältere Version von GRUB 2 im Boot-Sektor befindet, kann sie möglicherweise keine Module laden oder nicht mehr mit der aktuellen Konfigurationsdatei umgehen.
 .
 Falls Sie bereits einen anderen Boot-Loader einsetzen und diesen beibehalten wollen oder Ihre spezielle Umgebung keinen Boot-Loader erfordert, dann sollten Sie trotzdem fortfahren. Anderenfalls sollten Sie GRUB irgendwo installieren.
";
$elem["grub-pc/install_devices_empty"]["descriptionfr"]="Faut-il poursuivre sans installer GRUB ?
 Vous avez choisi de n'installer GRUB sur aucun périphérique. Si vous poursuivez, il est possible que le programme de démarrage ne soit pas configuré correctement et que la machine démarre avec ce qui était précédemment installé sur le secteur d'amorçage. Si une ancienne version de GRUB 2 s'y trouve, il est possible qu'elle ne puisse pas charger certains modules ou lire le fichier de configuration actuel.
 .
 Si vous utilisez déjà un autre programme de démarrage et souhaitez poursuivre ou si, en raison d'un environnement particulier, vous n'avez pas besoin de programme de démarrage, vous pouvez continuer malgré tout. Dans le cas contraire, il est nécessaire d'installer GRUB quelque part.
";
$elem["grub-pc/install_devices_empty"]["default"]="false";
$elem["grub-pc/postrm_purge_boot_grub"]["type"]="boolean";
$elem["grub-pc/postrm_purge_boot_grub"]["description"]="Remove GRUB 2 from /boot/grub?
 Do you want to have all GRUB 2 files removed from /boot/grub?
 .
 This will make the system unbootable unless another boot loader is
 installed.
";
$elem["grub-pc/postrm_purge_boot_grub"]["descriptionde"]="GRUB 2 aus /boot/grub entfernen?
 Wollen Sie alle Daten von GRUB 2 aus /boot/grub entfernen lassen?
 .
 Wenn kein anderer Boot-Loader installiert ist, kann Ihr System anschließend nicht mehr booten (hochfahren).
";
$elem["grub-pc/postrm_purge_boot_grub"]["descriptionfr"]="Faut-il supprimer GRUB 2 de /boot/grub ?
 Veuillez choisir si vous voulez vraiment supprimer tous les fichiers de GRUB 2 de /boot/grub.
 .
 Cela peut rendre le système impossible à démarrer tant qu'un autre chargeur d'amorçage ne sera pas installé.
";
$elem["grub-pc/postrm_purge_boot_grub"]["default"]="false";
$elem["grub-pc/mixed_legacy_and_grub2"]["type"]="boolean";
$elem["grub-pc/mixed_legacy_and_grub2"]["description"]="Finish conversion to GRUB 2 now?
 This system still has files from the GRUB Legacy boot loader installed, but
 it now also has GRUB 2 boot records installed on these disks:
 .
 ${DISKS}
 .
 It seems likely that GRUB Legacy is no longer in use, and that you should
 instead upgrade the GRUB 2 images on these disks and finish the conversion
 to GRUB 2 by removing old GRUB Legacy files. If you do not upgrade these
 GRUB 2 images, then they may be incompatible with the new packages and
 cause your system to stop booting properly.
 .
 You should generally finish the conversion to GRUB 2 unless these boot
 records were created by a GRUB 2 installation on some other operating
 system.
";
$elem["grub-pc/mixed_legacy_and_grub2"]["descriptionde"]="Jetzt die Umstellung auf GRUB 2 abschließen?
 Auf diesem System sind noch Dateien des GRUB-Legacy-Boot-Loaders installiert, aber es sind nun auch GRUB-2-Boot-Sektoren auf den folgenden Datenträgern installiert:
 .
 ${DISKS}
 .
 Es sieht so aus, als ob Sie GRUB Legacy nicht mehr verwenden. Daher sollten Sie stattdessen ein Upgrade der GRUB-2-Images auf diesen Datenträgern durchführen und die Umstellung auf GRUB 2 abschließen, indem Sie die alten GRUB-Legacy-Dateien entfernen. Falls Sie das Upgrade für diese GRUB-2-Images nicht durchführen, könnten diese mit den neuen Paketen nicht kompatibel sein und dazu führen, dass Ihr System nicht mehr einwandfrei startet.
 .
 Grundsätzlich sollten Sie die Umstellung auf GRUB 2 abschließen, es sei denn, diese GRUB-2-Boot-Sektoren wurden von einem anderen Betriebssystem installiert.
";
$elem["grub-pc/mixed_legacy_and_grub2"]["descriptionfr"]="Faut-il terminer la migration vers GRUB 2 maintenant ?
 Ce système comporte encore des fichiers de la version précédente du programme de démarrage GRUB mais comporte également des secteurs d'amorçage de GRUB 2 sur les disques suivants :
 .
 ${DISKS}
 .
 Il est très probable que la version précédente de GRUB ne soit plus utilisée et il est donc conseillé de mettre à jour les images de GRUB 2 sur ces disques, puis terminer la migration vers GRUB 2 en supprimant les anciens fichiers de la version précédente. Si vous ne mettez pas ces images de GRUB 2 à jour, elles pourraient être incompatibles avec de nouvelles versions, ce qui pourrait empêcher un démarrage normal.
 .
 Il est donc très probablement nécessaire de terminer la migration vers GRUB 2 à moins que ces secteurs d'amorçage n'aient été créés par une installation de GRUB 2 d'un autre système d'exploitation.
";
$elem["grub-pc/mixed_legacy_and_grub2"]["default"]="true";
$elem["grub-pc/kopt_extracted"]["type"]="boolean";
$elem["grub-pc/kopt_extracted"]["description"]="for internal use

";
$elem["grub-pc/kopt_extracted"]["descriptionde"]="";
$elem["grub-pc/kopt_extracted"]["descriptionfr"]="";
$elem["grub-pc/kopt_extracted"]["default"]="false";
$elem["grub-pc/timeout"]["type"]="string";
$elem["grub-pc/timeout"]["description"]="GRUB timeout; for internal use

";
$elem["grub-pc/timeout"]["descriptionde"]="";
$elem["grub-pc/timeout"]["descriptionfr"]="";
$elem["grub-pc/timeout"]["default"]="10";
$elem["grub-pc/hidden_timeout"]["type"]="boolean";
$elem["grub-pc/hidden_timeout"]["description"]="Hide the GRUB timeout; for internal use
";
$elem["grub-pc/hidden_timeout"]["descriptionde"]="";
$elem["grub-pc/hidden_timeout"]["descriptionfr"]="";
$elem["grub-pc/hidden_timeout"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
