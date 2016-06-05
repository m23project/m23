<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub-efi-amd64");

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
$elem["grub2/linux_cmdline_default"]["default"]="quiet";
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
$elem["grub2/kfreebsd_cmdline_default"]["default"]="quiet";
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
