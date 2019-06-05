<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub-efi-ia32");

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
PKG_OptionPageTail2($elem);
?>
