<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-base");

$elem["linux-base/disk-id-convert-auto"]["type"]="boolean";
$elem["linux-base/disk-id-convert-auto"]["description"]="Update disk device IDs in system configuration?
 The new Linux kernel version provides different drivers for some PATA
 (IDE) controllers. The names of some hard disk, CD-ROM, and tape
 devices may change.
 .
 It is now recommended to identify disk devices in configuration files
 by label or UUID (unique identifier) rather than by device name,
 which will work with both old and new kernel versions.
 .
 If you choose to not update the system configuration automatically,
 you must update device IDs yourself before the next system reboot or
 the system may become unbootable.
";
$elem["linux-base/disk-id-convert-auto"]["descriptionde"]="Laufwerk-Geräte-IDs in der Systemkonfiguration aktualisieren?
 Die neue Version des Linux-Kernels stellt andere Treiber für einige PATA-(IDE-)Controller zur Verfügung. Die Namen einiger Festplatten-, CD-ROM- und Bandspeichergeräte könnten sich ändern.
 .
 Es wird jetzt empfohlen, solche Geräte in Konfigurationsdateien über die Kennung (Label) oder die UUID (Unique Identifier) zu identifizieren statt über den Gerätenamen, was sowohl mit alten wie auch neuen Kernel-Versionen funktionieren wird.
 .
 Falls Sie sich entscheiden, die Systemkonfiguration nicht automatisch aktualisieren zu lassen, müssen Sie die Geräte-IDs selbst aktualisieren, bevor Sie das System das nächste Mal neu starten; andernfalls könnte es sein, dass Ihr System nicht mehr startfähig ist.
";
$elem["linux-base/disk-id-convert-auto"]["descriptionfr"]="Faut-il mettre à jour les identifiants des partitions dans la configuration du système ?
 La nouvelle version du noyau Linux fournit des pilotes différents pour certains contrôleurs PATA (IDE). Les noms de certains disques durs, lecteurs de CD-ROM et de bandes peuvent être modifiés.
 .
 Il est conseillé d'identifier, dans les fichiers de configuration, les partitions par leur étiquette (« label ») ou leur UUID (identifiant unique universel) plutôt que par leur nom. Ainsi le système fonctionnera à la fois avec les anciennes et les nouvelles versions du noyau.
 .
 Si vous choisissez de ne pas mettre à jour automatiquement la configuration du système, vous devez mettre à jour vous-même les identifiants des périphériques avant de redémarrer le système. Dans le cas contraire, le système risque de ne pas pouvoir redémarrer correctement.
";
$elem["linux-base/disk-id-convert-auto"]["default"]="true";
$elem["linux-base/disk-id-convert-plan"]["type"]="boolean";
$elem["linux-base/disk-id-convert-plan"]["description"]="Apply configuration changes to disk device IDs?
 These devices will be assigned UUIDs or labels:
 .
 ${relabel}
 .
 These configuration files will be updated:
 .
 ${files}
 .
 The device IDs will be changed as follows:
 .
 ${id_map}
";
$elem["linux-base/disk-id-convert-plan"]["descriptionde"]="Konfigurationsänderungen für Laufwerk-Geräte-IDs anwenden?
 Diese Geräte werden über UUIDs oder Kennungen identifiziert:
 .
 ${relabel}
 .
 Diese Konfigurationsdateien werden aktualisiert:
 .
 ${files}
 .
 Die Geräte-IDs werden wie folgt geändert:
 .
 ${id_map}
";
$elem["linux-base/disk-id-convert-plan"]["descriptionfr"]="Appliquer les changements de configuration aux identifiants des partitions ?
 Les périphériques suivants seront identifiés par une étiquette (« label ») ou un UUID :
 .
 ${relabel}
 .
 Les fichiers de configuration suivants seront mis à jour :
 .
 ${files}
 .
 Les identifiants des périphériques seront modifiés comme suit :
 .
 ${id_map}
";
$elem["linux-base/disk-id-convert-plan"]["default"]="true";
$elem["linux-base/disk-id-convert-plan-no-relabel"]["type"]="boolean";
$elem["linux-base/disk-id-convert-plan-no-relabel"]["description"]="Apply configuration changes to disk device IDs?
 These configuration files will be updated:
 .
 ${files}
 .
 The device IDs will be changed as follows:
 .
 ${id_map}
";
$elem["linux-base/disk-id-convert-plan-no-relabel"]["descriptionde"]="Konfigurationsänderungen für Laufwerk-Geräte-IDs anwenden?
 Diese Konfigurationsdateien werden aktualisiert:
 .
 ${files}
 .
 Die Geräte-IDs werden wie folgt geändert:
 .
 ${id_map}
";
$elem["linux-base/disk-id-convert-plan-no-relabel"]["descriptionfr"]="Appliquer les changements de configuration aux identifiants des partitions ?
 Les fichiers de configuration suivants seront mis à jour :
 .
 ${files}
 .
 Les identifiants des périphériques seront modifiés comme suit :
 .
 ${id_map}
";
$elem["linux-base/disk-id-convert-plan-no-relabel"]["default"]="true";
$elem["linux-base/disk-id-manual"]["type"]="error";
$elem["linux-base/disk-id-manual"]["description"]="Configuration files still contain deprecated device names
 The following configuration files still use some device names that may
 change when using the new kernel:
 .
 ${unconverted}
";
$elem["linux-base/disk-id-manual"]["descriptionde"]="Konfigurationsdateien enthalten noch veraltete Gerätenamen
 Die folgenden Konfigurationsdateien enthalten noch einige Gerätenamen, die sich ändern könnten, wenn der neue Kernel verwendet wird:
 .
 ${unconverted}
";
$elem["linux-base/disk-id-manual"]["descriptionfr"]="Les noms des périphériques utilisés dans certains fichiers de configuration sont déconseillés.
 Les noms des périphériques utilisés dans les fichiers de configuration suivants peuvent changer lors de l'utilisation du nouveau noyau : 
 .
 ${unconverted}
";
$elem["linux-base/disk-id-manual"]["default"]="";
$elem["linux-base/disk-id-manual-boot-loader"]["type"]="error";
$elem["linux-base/disk-id-manual-boot-loader"]["description"]="Boot loader configuration check needed
 The boot loader configuration for this system was not recognized. These
 settings in the configuration may need to be updated:
 .
  * The root device ID passed as a kernel parameter;
  * The boot device ID used to install and update the boot loader.
 .
 You should generally identify these devices by UUID or
 label. However, on MIPS systems the root device must be identified by
 name.
";
$elem["linux-base/disk-id-manual-boot-loader"]["descriptionde"]="Überprüfung der Bootloader-Konfiguration erforderlich
 Die Bootloader-Konfiguration für dieses System konnte nicht erkannt werden. Folgende Einstellungen in der Konfiguration müssen aktualisiert werden:
 .
  * Die Geräte-ID der Root-Partition, die als Kernel-Parameter angegeben
    wird;
  * Die Geräte-ID der Boot-Partition, die für die Installation und
    Aktualisierung des Bootloaders verwendet wird.
 .
 Sie sollten diese Geräte grundsätzlich per UUID oder Kennung identifizieren. Auf MIPS-Systemen muss das Root-Gerät jedoch über den Namen identifiziert werden.
";
$elem["linux-base/disk-id-manual-boot-loader"]["descriptionfr"]="Vérification indispensable de la configuration du programme d'amorçage
 La configuration du programme d'amorçage de ce système n'a pas été reconnue. Les paramètres de configuration suivants peuvent nécessiter une mise à jour :
 .
  - identifiant de la partition racine (« root »), passé en tant
    que paramètre du noyau ;
  - identifiant de la partition de démarrage (« boot »), utilisé
    pour installer et mettre à jour le programme d'amorçage.
 .
 Normalement, vous devriez identifier ces partitions par leur UUID ou leur étiquette (« label »). Toutefois, pour l'architecture MIPS, la partition racine (« root ») doit être identifiée par son nom.
";
$elem["linux-base/disk-id-manual-boot-loader"]["default"]="";
$elem["linux-base/disk-id-update-failed"]["type"]="error";
$elem["linux-base/disk-id-update-failed"]["description"]="Failed to update disk device IDs
 An error occurred while attempting to update the system configuration:
 .
 ${output}
 .
 You can either correct this error and retry the automatic update,
 or choose to update the system configuration yourself.

";
$elem["linux-base/disk-id-update-failed"]["descriptionde"]="";
$elem["linux-base/disk-id-update-failed"]["descriptionfr"]="";
$elem["linux-base/disk-id-update-failed"]["default"]="";
$elem["linux-base/do-bootloader-default-changed"]["type"]="error";
$elem["linux-base/do-bootloader-default-changed"]["description"]="Boot loader may need to be upgraded
 Kernel packages no longer update a default boot loader.
 .
 If the boot loader needs to be updated whenever a new kernel is
 installed, the boot loader package should install a script in
 /etc/kernel/postinst.d.  Alternately, you can specify the command
 to update the boot loader by setting the 'postinst_hook' variable
 in /etc/kernel-img.conf.
";
$elem["linux-base/do-bootloader-default-changed"]["descriptionde"]="Bootloader muss unter Umständen aktualisiert werden
 Kernel-Pakete werden nicht mehr länger den Standard-Bootloader aktualisieren.
 .
 Falls der Bootloader aktualisiert werden muss, wenn ein neuer Kernel installiert wird, sollte das Bootloader-Paket ein Skript in /etc/kernel/postinst.d installieren. Alternativ können Sie den Befehl für die Aktualisierung des Bootloaders über das Setzen der Variable »postinst_hook« in /etc/kernel-img.conf festlegen.
";
$elem["linux-base/do-bootloader-default-changed"]["descriptionfr"]="Le programme d'amorçage peut nécessiter une mise à niveau
 Les paquets du noyau ne s'occupent plus de la mise à jour d'un programme d'amorçage par défaut.
 .
 Si le programme d'amorçage doit être mis à jour à chaque fois qu'un nouveau noyau est installé, le paquet du programme d'amorçage doit installer un script dans /etc/kernel/postinst.d. Sinon, vous pouvez indiquer la commande de mise à jour du programme d'amorçage en configurant la variable « postinst_hook » dans /etc/kernel-img.conf.
";
$elem["linux-base/do-bootloader-default-changed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
