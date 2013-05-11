<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lilo");

$elem["lilo/new-config"]["type"]="note";
$elem["lilo/new-config"]["description"]="LILO configuration
 It seems to be your first LILO installation. It is absolutely necessary to
 run liloconfig(8) when you complete this process and execute /sbin/lilo 
 after this.
 .
 LILO won't work if you don't do this. 
";
$elem["lilo/new-config"]["descriptionde"]="LILO-Konfiguration
 Es scheint so, als sei dies Ihre erste LILO-Installation. Wenn Sie diesen Vorgang abschließen, ist es absolut notwendig liloconfig(8) und danach /sbin/lilo auszuführen.
 .
 LILO wird nicht funktionieren, falls Sie dies nicht tun.
";
$elem["lilo/new-config"]["descriptionfr"]="Configuration de LILO
 Il semble qu'il s'agisse de votre première installation de LILO. Il est tout à fait indispensable d'utiliser liloconfig(8) lorsque vous aurez terminé l'installation, puis d'exécuter ensuite /sbin/lilo.
 .
 LILO ne fonctionnera pas sans cette opération.
";
$elem["lilo/new-config"]["default"]="";
$elem["lilo/upgrade"]["type"]="note";
$elem["lilo/upgrade"]["description"]="Deprecated parameters in LILO configuration
 Deprecated files have been found on your system.
 You must update the 'install=' parameter in your LILO configuration file
 (/etc/lilo.conf) in order to properly upgrade the package.
 .
 The new 'install=' options are:
 .
  new: install=bmp
  old: install=/boot/boot-bmp.b
 .
  new: install=text
  old: install=/boot/boot-text.b
 .
  new: install=menu
  old: install=/boot/boot-menu.b or boot.b
";
$elem["lilo/upgrade"]["descriptionde"]="Veraltete Parameter in LILO-Konfiguration
 Auf Ihrem System sind veraltete Dateien gefunden worden. Sie müssen den »install=«-Parameter in Ihrer LILO-Konfigurationsdatei (/etc/lilo.conf) aktualisieren, um ein korrektes Upgrade diese Paketes durchzuführen.
 .
 Die neuen »install=«-Optionen sind:
 .
  neu: install=bmp
  alt: install=/boot/boot-bmp.b
 .
  neu: install=text
  alt: install=/boot/boot-text.b
 .
  neu: install=menu
  alt: install=/boot/boot-menu.b oder boot.b
";
$elem["lilo/upgrade"]["descriptionfr"]="Paramètres obsolètes dans la configuration de LILO
 Des fichiers obsolètes ont été trouvés sur votre système. Vous devez mettre à jour le paramètre « install= » du fichier de configuration de LILO (/etc/lilo.conf) afin que la mise à niveau du paquet fonctionne correctement.
 .
 Les nouvelles options pour le paramètre « install= » sont :
 .
 nouveau : install=bmp
 ancien  : install=/boot/boot-bmp.b
 .
 nouveau : install=text
 ancien  : install=/boot/boot-text.b
 .
 nouveau : install=menu
 ancien  : install=/boot/boot-menu.b ou boot.b
";
$elem["lilo/upgrade"]["default"]="";
$elem["lilo/add_large_memory"]["type"]="boolean";
$elem["lilo/add_large_memory"]["description"]="Do you want to add the large-memory option?
 By default, LILO loads the initrd file into the first 15MB of memory
 to avoid a BIOS limitation with older systems (earlier than 2001).
 .
 However, with newer kernels the combination of kernel and initrd
 may not fit into the first 15MB of memory and so the system will not
 boot properly. It seems that the boot issues appear when the
 kernel+initrd combination is larger than 8MB.
 .
 If this machine has a recent BIOS without the 15MB limitation, you can
 add the 'large-memory' option to /etc/lilo.conf to instruct LILO to use
 more memory for passing the initrd to the kernel. You will need to
 re-run the 'lilo' command to make this option take effect.
 .
 If this machine has an older BIOS, you may need to reduce the size of
 the initrd *before* rebooting. Please see the README.Debian file for
 tips on how to do that.
";
$elem["lilo/add_large_memory"]["descriptionde"]="Möchten Sie die Option »large-memory« hinzufügen?
 Standardmäßig lädt LILO die Initrd-Datei in die ersten 15 MB des Speichers, um eine BIOS-Beschränkung auf älteren Systemen (älter als 2001) zu vermeiden.
 .
 Allerdings kann bei neueren Kerneln die Kombination von Kernel und Initrd nicht innerhalb der ersten 15 MB an Speicher passen und daher wird das System nicht korrekt starten. Es scheint, dass die Boot-Probleme auftauchen, wenn die Kombination von Kernel und Initrd größer als 8 MB ist.
 .
 Falls diese Maschine ein neueres BIOS ohne die 15 MB-Begrenzung hat, können Sie die Option »large-memory« zu /etc/lilo.conf hinzufügen, um LILO anzuweisen, mehr Speicher für die Übergabe der Initrd an den Kernel zu verwenden. Sie müssen den Befehl »lilo« erneut aufrufen, damit diese Option greift.
 .
 Falls diese Maschine ein älteres BIOS hat, müssen Sie *vor* dem Neustart des Systems die Größe der Initrd reduzieren. Bitte lesen Sie die Datei README.Debian für Hinweise, wie dies erreicht werden kann.
";
$elem["lilo/add_large_memory"]["descriptionfr"]="Voulez-vous ajouter l'option « large memory » ?
 Par défaut, LILO charge l'image de démarrage (« initrd ») dans les 15 premiers méga-octets de mémoire pour éviter une limitation du BIOS de certains systèmes anciens (antérieurs à 2001).
 .
 Cependant, avec les noyaux récents, l'ensemble noyau et image de démarrage dépassent cette taille et le système ne peut alors plus démarrer correctement. Ces difficultés de démarrage semblent se produire dès que la taille de l'ensemble dépasse 8 Mo.
 .
 Si le BIOS de cette machine ne possède pas cette limitation à 15 Mo, il est possible d'ajouter l'option « large-memory » au fichier de configuration de LILO, ce qui permet d'utiliser plus de mémoire. Il sera nécessaire de lancer la commande « lilo » afin que cette option devienne active.
 .
 Si le BIOS de cette machine est ancien, il est suggéré de réduire la taille de l'image de démarrage *avant* de redémarrer. Veuillez consulter le fichier README.Debian pour des conseils sur la manière de procéder.
";
$elem["lilo/add_large_memory"]["default"]="true";
$elem["lilo/runme"]["type"]="boolean";
$elem["lilo/runme"]["description"]="Do you want to run /sbin/lilo now?
 It was detected that it's necessary to run /sbin/lilo in order to update
 the new LILO configuration.
 .
 WARNING: This procedure will write data in your MBR and may overwrite
 some things in that place. If you skip this step, you must run /sbin/lilo
 before reboot your computer or your system may not boot again.
";
$elem["lilo/runme"]["descriptionde"]="Möchten Sie /sbin/lilo jetzt ausführen?
 Es wurde festgestellt, dass es notwendig ist /sbin/lilo auszuführen, um die neue LILO-Konfiguration zu aktivieren.
 .
 WARNUNG: Dieser Vorgang wird Daten in Ihren MBR (master boot record) schreiben und dies könnte dort einige Sachen überschreiben. Falls Sie diesen Schritt überspringen, müssen Sie /sbin/lilo ausführen, bevor Sie Ihren Computer neu starten; anderenfalls könnte dieses System nicht wieder hochfahren.
";
$elem["lilo/runme"]["descriptionfr"]="Souhaitez-vous lancer /sbin/lilo maintenant ?
 Il est nécessaire d'utiliser la commande /sbin/lilo pour mettre à niveau la nouvelle configuration de LILO.
 .
 ATTENTION : cette opération va écrire sur votre secteur de démarrage principal (MBR : « Master Boot Record »). Si vous sautez cette étape, vous devrez lancer /sbin/lilo avant de redémarrer sous peine de ne plus pouvoir ensuite lancer le système.
";
$elem["lilo/runme"]["default"]="false";
$elem["lilo/bad_bitmap"]["type"]="note";
$elem["lilo/bad_bitmap"]["description"]="Invalid bitmap path
 A deprecated bitmap path entry has been discovered in your LILO configuration 
 file (/etc/lilo.conf). You must upgrade this path in order to run LILO. You 
 can also run liloconfig(8) and get a fresh configuration file.
";
$elem["lilo/bad_bitmap"]["descriptionde"]="Ungültiger Bitmap-Pfad
 In Ihrer LILO-Konfigurationsdatei (/etc/lilo.conf) ist ein veralteter Bitmap-Pfad-Eintrag gefunden worden. Sie müssen ein Upgrade dieses Pfades durchführen, um LILO aufrufen zu können. Sie können auch liloconfig(8) ausführen, um eine neu Konfigurationsdatei zu erzeugen.
";
$elem["lilo/bad_bitmap"]["descriptionfr"]="Chemin d'accès non valable pour le fichier image
 Une valeur obsolète a été trouvée dans le champ indiquant le chemin d'accès au fichier d'image affiché avec LILO, dans le fichier de configuration de LILO (/etc/lilo.conf). Cette valeur doit être mise à jour afin de pouvoir utiliser LILO. Vous pouvez également utiliser la commande liloconfig(8) pour créer un nouveau fichier de configuration.
";
$elem["lilo/bad_bitmap"]["default"]="";
$elem["liloconfig/maintitle"]["type"]="title";
$elem["liloconfig/maintitle"]["description"]="LILO configuration.
";
$elem["liloconfig/maintitle"]["descriptionde"]="LILO-Konfiguration.
";
$elem["liloconfig/maintitle"]["descriptionfr"]="Configuration de LILO
";
$elem["liloconfig/maintitle"]["default"]="";
$elem["liloconfig/banner"]["type"]="text";
$elem["liloconfig/banner"]["description"]="LILO, the LInux LOader, sets up your system to boot Linux directly from your hard disk, without the need for a boot floppy.
";
$elem["liloconfig/banner"]["descriptionde"]="LILO, der LInux LOader, richtet Ihr System ein, um Linux direkt von der Festplatte zu starten, ohne eine Boot-Diskette zu benötigen.
";
$elem["liloconfig/banner"]["descriptionfr"]="LILO, le chargeur de Linux (« LInux LOader »), configure le système pour qu'il puisse démarrer Linux directement depuis le disque dur, sans nécessiter de disquette de démarrage.
";
$elem["liloconfig/banner"]["default"]="";
$elem["liloconfig/configuring_base"]["type"]="error";
$elem["liloconfig/configuring_base"]["description"]="Hmm. I think you're configuring the base filesystem, and I'm therefore simply going to exit successfully without trying to actually configure LILO properly. If you're not doing that, this is an important bug against Debian's lilo package, and should be reported as such...
";
$elem["liloconfig/configuring_base"]["descriptionde"]="Hmm. Es wird davon ausgegangen, dass Sie das Basis-System konfigurieren, und daher wird diese Konfiguration einfach erfolgreich beendet, ohne LILO selber einzurichten. Falls Sie gerade nicht das Basis-System konfigurieren, dann ist dies ein wichtiger (»important«) Fehler des Lilo-Pakets von Debian, und sollte demnach auch als solcher berichtet werden.
";
$elem["liloconfig/configuring_base"]["descriptionfr"]="Il est possible que vous soyiez en train de configurer le système de fichiers de base, donc la configuration de LILO ne va pas avoir lieu maintenant. Si ce n'est pas ce que vous êtes en train de faire, alors ceci est un bogue important du paquet Debian « lilo », que vous devriez signaler comme tel.
";
$elem["liloconfig/configuring_base"]["default"]="";
$elem["liloconfig/liloconf_exists"]["type"]="note";
$elem["liloconfig/liloconf_exists"]["description"]="You already have a LILO configuration in the file ${liloconf}. If you want to use the new LILO boot menu, please take a look to /usr/share/doc/lilo/examples/conf.sample and choose one of the bitmaps located on /boot.
";
$elem["liloconfig/liloconf_exists"]["descriptionde"]="Sie verfügen bereits über eine LILO-Konfiguration in der Datei ${liloconf}. Falls Sie das neue LILO-Boot-Menü verwenden wollen, schauen Sie bitte in /usr/share/doc/lilo/examples/conf.sample und wählen Sie eines der in /boot befindlichen Bitmaps aus.
";
$elem["liloconfig/liloconf_exists"]["descriptionfr"]="Une configuration de LILO existe déjà dans le fichier ${liloconf}. Si vous voulez utiliser le nouveau menu de démarrage de LILO, veuillez consulter /usr/share/doc/lilo/examples/conf.sample et sélectionner une des images situées dans /boot.
";
$elem["liloconfig/liloconf_exists"]["default"]="";
$elem["liloconfig/liloconf_incompatible"]["type"]="error";
$elem["liloconfig/liloconf_incompatible"]["description"]="WARNING!
 You have an old incompatible lilo configuration file!
 Read the file /usr/share/doc/lilo/INCOMPAT.gz and rerun /sbin/lilo to write the
 changes to your boot sectors
";
$elem["liloconfig/liloconf_incompatible"]["descriptionde"]="WARNUNG!
 Sie haben eine alte, inkompatible Lilo-Konfigurationsdatei! Lesen Sie die Datei /usr/share/doc/lilo/INCOMPAT.gz und rufen Sie /sbin/lilo erneut auf, um die Änderungen in Ihre Boot-Sektoren zu schreiben.
";
$elem["liloconfig/liloconf_incompatible"]["descriptionfr"]="Fichier de configuration incompatible
 L'ancien fichier de configuration de lilo est incompatible avec la nouvelle version.Veuillez consulter le fichier /usr/share/doc/lilo/INCOMPAT.gz and relancer /sbin/lilo pour enregistrer les modifications dans vos secteurs de démarrage.
";
$elem["liloconfig/liloconf_incompatible"]["default"]="";
$elem["liloconfig/use_current_lilo"]["type"]="boolean";
$elem["liloconfig/use_current_lilo"]["description"]="Install a boot block using your current LILO configuration?
";
$elem["liloconfig/use_current_lilo"]["descriptionde"]="Soll ein Boot-Block mit Ihrer aktuellen LILO-Konfiguration installiert werden?
";
$elem["liloconfig/use_current_lilo"]["descriptionfr"]="Installer un secteur de démarrage avec la configuration LILO actuelle ?
";
$elem["liloconfig/use_current_lilo"]["default"]="true";
$elem["liloconfig/lilo_warning"]["type"]="error";
$elem["liloconfig/lilo_warning"]["description"]="WARNING!
 Even if lilo runs successfully, see /usr/share/doc/lilo/INCOMPAT.gz for
 changes in the usage of the ${liloconf} file.  If needed: edit ${liloconf} and
 rerun '/sbin/lilo -v'
";
$elem["liloconfig/lilo_warning"]["descriptionde"]="WARNUNG!
 Selbst falls Lilo erfolgreich durch läuft, lesen Sie /usr/share/doc/lilo/INCOMPAT.gz für Änderungen in der Verwendung der ${liloconf}-Datei. Falls notwendig bearbeiten Sie ${liloconf} und rufen Sie »/sbin/lilo -v« erneut auf.
";
$elem["liloconfig/lilo_warning"]["descriptionfr"]="Fichier de configuration incompatible
 Même si lilo se lance correctement, veuillez consulter /usr/share/doc/lilo/INCOMPAT.gz pour les changements relatifs au fichier ${liloconf}. Si nécessaire, éditez ${liloconf} et relancez « /sbin/lilo -v ».
";
$elem["liloconfig/lilo_warning"]["default"]="";
$elem["liloconfig/select_bitmap"]["type"]="select";
$elem["liloconfig/select_bitmap"]["choices"][1]="/boot/debian.bmp";
$elem["liloconfig/select_bitmap"]["choices"][2]="/boot/sid.bmp";
$elem["liloconfig/select_bitmap"]["choices"][3]="/boot/coffee.bmp";
$elem["liloconfig/select_bitmap"]["description"]="The following is the list of the available bitmaps
";
$elem["liloconfig/select_bitmap"]["descriptionde"]="Folgende Liste enthält die verfügbaren Bitmaps
";
$elem["liloconfig/select_bitmap"]["descriptionfr"]="Liste des images disponibles :
";
$elem["liloconfig/select_bitmap"]["default"]="/boot/debian.bmp";
$elem["liloconfig/lilo_error"]["type"]="error";
$elem["liloconfig/lilo_error"]["description"]="ERROR!
 Correct ${liloconf} manually and rerun /sbin/lilo.
";
$elem["liloconfig/lilo_error"]["descriptionde"]="FEHLER!
 Korrigieren Sie ${liloconf} manuell und rufen Sie /sbin/lilo erneut auf.
";
$elem["liloconfig/lilo_error"]["descriptionfr"]="Erreur dans le fichier de configuration de lilo
 Veuillez corriger ${liloconf} vous-même et relancer /sbin/lilo.
";
$elem["liloconfig/lilo_error"]["default"]="";
$elem["liloconfig/wipe_old_liloconf"]["type"]="boolean";
$elem["liloconfig/wipe_old_liloconf"]["description"]="Wipe out your old LILO configuration and make a new one?
";
$elem["liloconfig/wipe_old_liloconf"]["descriptionde"]="Ihre alte LILO-Konfiguration löschen und eine neue erstellen?
";
$elem["liloconfig/wipe_old_liloconf"]["descriptionfr"]="Supprimer votre ancienne configuration LILO et en créer une nouvelle ?
";
$elem["liloconfig/wipe_old_liloconf"]["default"]="false";
$elem["liloconfig/no_changes"]["type"]="error";
$elem["liloconfig/no_changes"]["description"]="No changes made.
";
$elem["liloconfig/no_changes"]["descriptionde"]="Keine Änderungen durchgeführt.
";
$elem["liloconfig/no_changes"]["descriptionfr"]="Pas de modification effectuée
";
$elem["liloconfig/no_changes"]["default"]="";
$elem["liloconfig/fstab_broken"]["type"]="error";
$elem["liloconfig/fstab_broken"]["description"]="WARNING!
 Either your ${fstab} configuration file is missing, or it doesn't contain a
 valid entry for the root filesystem! This generally means that your system is
 very badly broken. Configuration of LILO will be aborted; you should try to
 repair the situation and then run /usr/sbin/liloconfig again to retry the
 configuration process.
";
$elem["liloconfig/fstab_broken"]["descriptionde"]="WARNUNG!
 Entweder fehlt Ihre ${fstab}-Konfigurationsdatei oder sie enthält keinen gültigen Eintrag für das Wurzel-Dateisystem! Dies bedeutet in der Regel, dass Ihr System defekt ist. Die Konfiguration von LILO wird abgebrochen; Sie sollten versuchen, den Fehler zu beheben und dann /usr/sbin/liloconfig nochmals auszuführen, um den Konfigurationsprozess erneut zu versuchen.
";
$elem["liloconfig/fstab_broken"]["descriptionfr"]="Fichier de configuration incompatible
 Soit le fichier de configuration ${fstab} est manquant, soit il ne contient pas d'entrée valable pour votre système de fichiers principal (« / ») ! En général, ceci signifie que le système est en mauvais état. La configuration de LILO va être annulée ; vous devriez essayer de résoudre ces problèmes et de relancer /usr/sbin/liloconfig pour essayer à nouveau d'effectuer la configuration.
";
$elem["liloconfig/fstab_broken"]["default"]="";
$elem["liloconfig/odd_fstab"]["type"]="error";
$elem["liloconfig/odd_fstab"]["description"]="WARNING!
 Your ${fstab} configuration file gives device ${device} as the root filesystem
 device. This doesn't look to me like an \"ordinary\" block device. Either your
 fstab is broken and you should fix it, or you are using hardware (such as a
 RAID array) which this simple configuration program does not handle.
 .
 You should either repair the situation or hand-roll your own ${liloconf}
 configuration file; you can then run /usr/sbin/liloconfig again to retry the
 configuration process. Documentation for LILO can be found in
 /usr/share/doc/lilo/.
";
$elem["liloconfig/odd_fstab"]["descriptionde"]="WARNUNG!
 Ihre ${fstab}-Konfigurationsdatei erklärt das Gerät ${device} als das Gerät des Wurzeldateisystems. Dies sieht nicht nach einem »gewöhnlichen« Blockgerät aus. Entweder ist Ihre fstab defekt und Sie sollten sie korrigieren, oder Sie verwenden Hardware (wie beispielsweise einen RAID-Verbund), mit dem dieses einfache Konfigurationsprogramm nicht umgehen kann.
 .
 Sie sollten die Situation entweder korrigieren oder manuell Ihre eigene ${liloconf}-Konfigurationsdatei erstellen; Sie können dann /usr/sbin/liloconfig nochmals ausführen, um den Konfigurationsprozess erneut zu versuchen. Dokumentation zu LILO befindet sich in /usr/share/doc/lilo/.
";
$elem["liloconfig/odd_fstab"]["descriptionfr"]="Fichier de configuration incompatible
 Le fichier de configuration ${fstab} (« fstab ») n'indique pas que ${device} est le système de fichiers principal. Celui-ci ne semble pas être un périphérique de type bloc « ordinaire ». Soit le fichier de configuration « fstab » est corrompu, soit vous utilisez du matériel tel qu'un ensemble RAID, ce qui n'est pas géré par ce simple programme de configuration.
 .
 Vous devriez soit corriger la situation, soit écrire votre propre fichier de configuration ${liloconf} ; vous pouvez alors relancer /usr/sbin/liloconfig pour essayer le processus de configuration à nouveau. La documentation de LILO se trouve dans /usr/share/doc/lilo/.
";
$elem["liloconfig/odd_fstab"]["default"]="";
$elem["liloconfig/instruction"]["type"]="note";
$elem["liloconfig/instruction"]["description"]="Booting from hard disk.
 You must do three things to make the Linux system boot from the hard disk.
 Install a partition boot record, install a master boot record, and set the
 partition active. You'll be asked to perform each of these tasks. You may skip
 any or all of them, and perform them manually later on.
 .
 This will result in Linux being booted by default from the hard disk.  If your
 setup is complicated or unusual you should consider writing your own
 customised ${liloconf}. To do this you should exit this configuration program
 and refer to the comprehensive lilo documentation, which can be found in
 /usr/share/doc/lilo/.
";
$elem["liloconfig/instruction"]["descriptionde"]="Starten von der Festplatte.
 Sie müssen drei Dinge erledigen, damit Ihr Linux-System von der Festplatte startet. Installation eines »Partition-Boot-Records«, Installation eines »Master-Boot-Records« und aktivieren der Partition. Sie werden aufgefordert, jede der drei Aufgaben zu erledigen. Sie können alle oder einige davon überspringen und diese Schritte dann später manuell durchführen.
 .
 Dies führt dazu, dass standardmäßig Linux von der Festplatte gestartet wird. Falls Ihre Einrichtung kompliziert oder ungewöhnlich ist, sollten Sie in Erwägung ziehen, Ihre eigene, angepasste ${liloconf} zu erstellen. Dafür sollten sie dieses Konfigurationsprogramm beenden und sich auf die umfassende Lilo-Dokumentation beziehen, die sich in /usr/share/doc/lilo/ befindet.
";
$elem["liloconfig/instruction"]["descriptionfr"]="Démarrage depuis le disque dur
 Trois actions sont nécessaire pour rendre possible le démarrage du système Linux depuis le disque dur : installer un secteur de démarrage de partition, installer un secteur de démarrage principal et rendre la partition active. Il va vous être demandé d'effectuer chacune de ces actions. Vous pouvez en passer une ou plusieurs, pour vous en occuper manuellement plus tard.
 .
 Après ces opérations, Linux sera le système d'exploitation démarré par défaut depuis le disque dur. Si votre système est complexe ou inhabituel, vous devriez envisager d'écrire votre propre fichier ${liloconf}. Pour ce faire, vous devriez interrompre ce programme de configuration et vous reporter à la documentation complète de lilo, que vous pouvez trouver dans /usr/share/doc/lilo/.
";
$elem["liloconfig/instruction"]["default"]="";
$elem["liloconfig/install_from_root_device"]["type"]="boolean";
$elem["liloconfig/install_from_root_device"]["description"]="Install a partition boot record to boot Linux from ${device}?
";
$elem["liloconfig/install_from_root_device"]["descriptionde"]="Installation eines »Partition-Boot-Records«, um Linux von ${device} zu starten?
";
$elem["liloconfig/install_from_root_device"]["descriptionfr"]="Installer un secteur de démarrage de partition pour démarrer Linux depuis ${device} ?
";
$elem["liloconfig/install_from_root_device"]["default"]="true";
$elem["liloconfig/use_lba32"]["type"]="boolean";
$elem["liloconfig/use_lba32"]["description"]="Use LBA32 for addressing big disks using new BIOS features?
";
$elem["liloconfig/use_lba32"]["descriptionde"]="LBA32 verwenden, um große Platten über neue BIOS-Funktionen anzusprechen?
";
$elem["liloconfig/use_lba32"]["descriptionfr"]="Utiliser LBA32 pour gérer les disques de grande capacité en utilisant les nouvelles fonctionnalités du BIOS ?
";
$elem["liloconfig/use_lba32"]["default"]="true";
$elem["liloconfig/install_mbr"]["type"]="boolean";
$elem["liloconfig/install_mbr"]["description"]="Install a master boot record on ${disk}?
 A master boot record is required to run the partition boot record. If you are
 already using a boot manager, and want to keep it, answer \"no\" to the
 following question. If you don't know what a boot manager is or whether you
 have one, answer \"yes\".
";
$elem["liloconfig/install_mbr"]["descriptionde"]="Einen »Master-Boot-Record« auf ${disk} installieren?
 Ein »Master-Boot-Record« wird benötigt, um den »Partition-Boot-Record« auszuführen. Falls Sie bereits einen Boot-Manager verwenden und diesen behalten möchten, antworten Sie »nein« auf die folgende Frage. Falls Sie nicht wissen, was ein Boot-Manager ist oder ob Sie einen haben, antworten Sie »ja«.
";
$elem["liloconfig/install_mbr"]["descriptionfr"]="Faut-il installer un secteur de démarrage principal sur ${fdisk} ?
 Un secteur de démarrage principal est nécessaire pour lancer le secteur de démarrage de partition. Si vous utilisez déjà un gestionnaire de démarrage et voulez le conserver, ne choisissez pas cette option. Si vous ne savez pas ce qu'est un gestionnaire de démarrage ou si vous en avez un, choisissez cette option.
";
$elem["liloconfig/install_mbr"]["default"]="false";
$elem["liloconfig/mbr_error"]["type"]="error";
$elem["liloconfig/mbr_error"]["description"]="ERROR!
 install-mbr failed! Your system may not be bootable.
";
$elem["liloconfig/mbr_error"]["descriptionde"]="FEHLER!
 install-mbr fehlgeschlagen! Ihr System könnte nicht-startbar sein.
";
$elem["liloconfig/mbr_error"]["descriptionfr"]="Erreur dans le fichier de configuration de lilo
 Échec d'install-mbr : démarrage du système probablement impossible
";
$elem["liloconfig/mbr_error"]["default"]="";
$elem["liloconfig/make_active_partition"]["type"]="boolean";
$elem["liloconfig/make_active_partition"]["description"]="Make ${device} the active partition
 The master boot record will boot the active partition. If you want your system
 to boot another operating system, such as DOS or Windows, by default, answer
 \"no\" to the following question. You may still use your boot manager or the
 master boot record to boot Linux. If you want the system to boot Linux by
 default, answer \"yes\". In this case you could still boot some other OS if you
 know what partition it is on.
";
$elem["liloconfig/make_active_partition"]["descriptionde"]="${device} als aktive Partition einrichten
 Der »Master-Boot-Record« wird die aktive Partition starten. Falls Sie möchten, dass Ihr System standardmäßig ein anderes Betriebssystem startet, wie beispielsweise DOS oder Windows, antworten Sie »nein« auf die folgende Frage. Sie können Ihren Boot-Manager oder den »Master-Boot-Record« immer noch dazu verwenden, Linux zu starten. Falls Sie möchten, dass Ihr System standardmäßig Linux startet, antworten Sie »ja«. In diesem Fall können Sie immer noch einige andere Betriebssysteme starten, falls Sie wissen, auf welchen Partitionen sich diese befinden.
";
$elem["liloconfig/make_active_partition"]["descriptionfr"]="Faut-il faire de ${device} la partition active ?
 Le secteur de démarrage principal va démarrer la partition active. Si vous voulez que votre système démarre un autre système d'exploitation par défaut, comme DOS ou Windows, ne choisissez pas cette option. Vous pouvez toujours utiliser votre gestionnaire de démarrage ou le secteur de démarrage principal pour démarrer Linux. Si vous voulez que le système démarre Linux par défaut, choisissez cette option. Dans ce cas, vous pourrez toujours démarrer un autre système d'exploitation si vous savez sur quelle partition il se trouve.
";
$elem["liloconfig/make_active_partition"]["default"]="true";
$elem["liloconfig/activate_error"]["type"]="error";
$elem["liloconfig/activate_error"]["description"]="ERROR!
 activate failed! Your system may not be bootable.
";
$elem["liloconfig/activate_error"]["descriptionde"]="FEHLER!
 Aktivierung fehlgeschlagen! Ihr System könnte nicht startbar sein.
";
$elem["liloconfig/activate_error"]["descriptionfr"]="Erreur dans le fichier de configuration de lilo
 Échec de l'activation : démarrage du système probablement impossible
";
$elem["liloconfig/activate_error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
