<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub-coreboot");

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
$elem["grub2/no_efi_extra_removable"]["type"]="boolean";
$elem["grub2/no_efi_extra_removable"]["description"]="Skip extra installation to the EFI removable media path?
 Some EFI-based systems are buggy and do not handle new bootloaders correctly.
 If you do not make an extra installation of GRUB to the EFI removable media
 path, this may prevent your system from booting Debian correctly in case it is
 affected by this problem. However, it may remove the ability to boot any other
 operating systems that also depend on this path. If so, you will need to make
 sure that GRUB is configured successfully to be able to boot any other OS
 installations correctly.

";
$elem["grub2/no_efi_extra_removable"]["descriptionde"]="";
$elem["grub2/no_efi_extra_removable"]["descriptionfr"]="";
$elem["grub2/no_efi_extra_removable"]["default"]="false";
$elem["grub2/update_nvram"]["type"]="boolean";
$elem["grub2/update_nvram"]["description"]="Update NVRAM variables to automatically boot into Debian?
 GRUB can configure your platform's NVRAM variables so that it boots into
 Debian automatically when powered on. However, you may prefer to disable
 this behavior and avoid changes to your boot configuration. For example,
 if your NVRAM variables have been set up such that your system contacts a
 PXE server on every boot, this would preserve that behavior.
";
$elem["grub2/update_nvram"]["descriptionde"]="NVRAM aktualisieren, um direkt in Debian hineinzustarten?
 GRUB kann die Plattformvariablen Ihres NVRAMs so konfigurieren, dass es direkt beim Einschalten in Debian hineinstartet. Es könnte allerdings sein, dass Sie es vorziehen, dieses Verhalten zu deaktivieren und Änderungen an Ihrer Systemstartkonfiguration zu vermeiden. Falls beispielsweise Ihre NVRAM-Variablen so konfiguriert wurden, dass Ihr System bei jedem Systemstart mit einem PXE-Server Kontakt aufnimmt, dann würde dies dieses Verhalten beibehalten.
";
$elem["grub2/update_nvram"]["descriptionfr"]="Faut-il mettre à jour les variables dans la mémoire non volatile pour démarrer Debian automatiquement ?
 GRUB peut configurer les variables dans la mémoire non volatile (NVRAM) pour démarrer Debian automatiquement à l'allumage. Cependant, vous pourriez avoir envie de désactiver cette possibilité et ainsi éviter les changements dans la configuration de l'amorçage. Par exemple, si les variables de votre NVRAM ont été configurées pour que le système se connecte à un serveur PXE à chaque démarrage, cela conserverait ce comportement.
";
$elem["grub2/update_nvram"]["default"]="true";
$elem["grub-efi/install_devices"]["type"]="multiselect";
$elem["grub-efi/install_devices"]["description"]="GRUB EFI system partitions:
 The grub-efi package is being upgraded. This menu allows you to select which
 EFI system partions you'd like grub-install to be automatically run for, if any.
 .
 Running grub-install automatically is recommended in most situations, to
 prevent the installed GRUB core image from getting out of sync with GRUB
 modules or grub.cfg.

";
$elem["grub-efi/install_devices"]["descriptionde"]="";
$elem["grub-efi/install_devices"]["descriptionfr"]="";
$elem["grub-efi/install_devices"]["default"]="";
$elem["grub-efi/install_devices_disks_changed"]["type"]="multiselect";
$elem["grub-efi/install_devices_disks_changed"]["description"]="GRUB install devices:
 The GRUB boot loader was previously installed to a disk that is no longer
 present, or whose unique identifier has changed for some reason. It is
 important to make sure that the installed GRUB core image stays in sync
 with GRUB modules and grub.cfg. Please check again to make sure that GRUB
 is written to the appropriate boot devices.
";
$elem["grub-efi/install_devices_disks_changed"]["descriptionde"]="Geräte für die GRUB-Installation:
 Der GRUB-Bootloader wurde zuvor auf einem Datenträger, der nicht mehr im System vorhanden ist oder dessen eindeutige Kennung aus irgendeinem Grund geändert wurde, installiert. Es ist wichtig, sicherzustellen, dass das installierte GRUB-Core-Image synchron mit den GRUB-Modulen und grub.cfg bleibt. Bitte prüfen Sie erneut, um sicherzustellen, dass GRUB auf die entsprechenden Boot-Geräte geschrieben wird.
";
$elem["grub-efi/install_devices_disks_changed"]["descriptionfr"]="Périphériques où installer GRUB :
 Le chargeur d'amorçage GRUB était précédemment installé sur un disque qui n'est plus présent ou dont l'identifiant unique a changé pour une raison ou une autre. Il est important de vous assurer que l'image de GRUB qui est installée reste synchronisée avec les modules de GRUB ou grub.cfg. Veuillez vérifier à nouveau que GRUB sera bien installé sur les périphériques d'amorçage pertinents.
";
$elem["grub-efi/install_devices_disks_changed"]["default"]="";
$elem["grub-efi/partition_description"]["type"]="text";
$elem["grub-efi/partition_description"]["description"]="${DEVICE} (${SIZE} MB; ${PATH}) on ${DISK_SIZE} MB ${DISK_MODEL}

";
$elem["grub-efi/partition_description"]["descriptionde"]="";
$elem["grub-efi/partition_description"]["descriptionfr"]="";
$elem["grub-efi/partition_description"]["default"]="";
$elem["grub-efi/install_devices_failed"]["type"]="boolean";
$elem["grub-efi/install_devices_failed"]["description"]="Writing GRUB to boot device failed - continue?
 GRUB failed to install to the following devices:
 .
 ${FAILED_DEVICES}
 .
 Do you want to continue anyway? If you do, your computer may not start up
 properly.
";
$elem["grub-efi/install_devices_failed"]["descriptionde"]="GRUB konnte nicht auf das Boot-Gerät geschrieben werden - fortfahren?
 GRUB konnte nicht auf den folgenden Geräten installiert werden:
 .
 ${FAILED_DEVICES}
 .
 Wollen Sie trotzdem fortfahren? Falls ja, wird Ihr Rechner vielleicht nicht problemlos hochfahren.
";
$elem["grub-efi/install_devices_failed"]["descriptionfr"]="Échec de l'installation de GRUB sur le périphérique d'amorçage. Continuer ?
 GRUB n'a pas pu être installé sur les périphériques suivants :
 .
 ${FAILED_DEVICES}
 .
 Veuillez confirmer si vous souhaitez continuer malgré le risque d'un démarrage incorrect de la machine.
";
$elem["grub-efi/install_devices_failed"]["default"]="false";
$elem["grub-efi/install_devices_empty"]["type"]="boolean";
$elem["grub-efi/install_devices_empty"]["description"]="Continue without installing GRUB?
 You chose not to install GRUB to any devices. If you continue, the boot
 loader may not be properly configured, and when this computer next starts
 up it will use whatever was previously configured. If there is an
 earlier version of GRUB 2 in the EFI system partition, it may be unable to load
 modules or handle the current configuration file.
 .
 If you are already using a different boot loader and want to carry on
 doing so, or if this is a special environment where you do not need a boot
 loader, then you should continue anyway. Otherwise, you should install
 GRUB somewhere.

";
$elem["grub-efi/install_devices_empty"]["descriptionde"]="";
$elem["grub-efi/install_devices_empty"]["descriptionfr"]="";
$elem["grub-efi/install_devices_empty"]["default"]="false";
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
$elem["grub2/unsigned_kernels_title"]["type"]="title";
$elem["grub2/unsigned_kernels_title"]["description"]="unsigned kernels

";
$elem["grub2/unsigned_kernels_title"]["descriptionde"]="";
$elem["grub2/unsigned_kernels_title"]["descriptionfr"]="";
$elem["grub2/unsigned_kernels_title"]["default"]="";
$elem["grub2/unsigned_kernels"]["type"]="note";
$elem["grub2/unsigned_kernels"]["description"]="Cannot upgrade Secure Boot enforcement policy due to unsigned kernels
 Your system has UEFI Secure Boot enabled in firmware, and the following kernels
 present on your system are unsigned:
 .
  ${unsigned_versions}
 .
 These kernels cannot be verified under Secure Boot.  To ensure your system
 remains bootable, GRUB will not be upgraded on your disk until these kernels are
 removed or replaced with signed kernels.
";
$elem["grub2/unsigned_kernels"]["descriptionde"]="";
$elem["grub2/unsigned_kernels"]["descriptionfr"]="";
$elem["grub2/unsigned_kernels"]["default"]="";
PKG_OptionPageTail2($elem);
?>
