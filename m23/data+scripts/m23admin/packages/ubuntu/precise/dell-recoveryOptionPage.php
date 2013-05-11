<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dell-recovery");

$elem["dell-recovery/destination"]["type"]="string";
$elem["dell-recovery/destination"]["description"]="for internal use; determines whether to generate recovery media

";
$elem["dell-recovery/destination"]["descriptionde"]="";
$elem["dell-recovery/destination"]["descriptionfr"]="";
$elem["dell-recovery/destination"]["default"]="none";
$elem["dell-recovery/recovery_type"]["type"]="string";
$elem["dell-recovery/recovery_type"]["description"]="for internal use;determines whether to offer the bootstrap 
 ubiquity plugin to the user. valid: [dynamic, factory, usb, dvd]

";
$elem["dell-recovery/recovery_type"]["descriptionde"]="";
$elem["dell-recovery/recovery_type"]["descriptionfr"]="";
$elem["dell-recovery/recovery_type"]["default"]="dynamic";
$elem["dell-recovery/up_partition"]["type"]="string";
$elem["dell-recovery/up_partition"]["description"]="for internal use; determines where the destination UP partition is

";
$elem["dell-recovery/up_partition"]["descriptionde"]="";
$elem["dell-recovery/up_partition"]["descriptionfr"]="";
$elem["dell-recovery/up_partition"]["default"]="dynamic";
$elem["dell-recovery/rp_partition"]["type"]="string";
$elem["dell-recovery/rp_partition"]["description"]="for internal use; determines where the destination RP partition is

";
$elem["dell-recovery/rp_partition"]["descriptionde"]="";
$elem["dell-recovery/rp_partition"]["descriptionfr"]="";
$elem["dell-recovery/rp_partition"]["default"]="dynamic";
$elem["dell-recovery/os_partition"]["type"]="string";
$elem["dell-recovery/os_partition"]["description"]="for internal use; determines where the destination OS partition is

";
$elem["dell-recovery/os_partition"]["descriptionde"]="";
$elem["dell-recovery/os_partition"]["descriptionfr"]="";
$elem["dell-recovery/os_partition"]["default"]="dynamic";
$elem["dell-recovery/swap_partition"]["type"]="string";
$elem["dell-recovery/swap_partition"]["description"]="for internal use; determines where the destination swap partition is

";
$elem["dell-recovery/swap_partition"]["descriptionde"]="";
$elem["dell-recovery/swap_partition"]["descriptionfr"]="";
$elem["dell-recovery/swap_partition"]["default"]="dynamic";
$elem["dell-recovery/recovery_partition_filesystem"]["type"]="string";
$elem["dell-recovery/recovery_partition_filesystem"]["description"]="for internal use; determines the filesystem of the recovery partition

";
$elem["dell-recovery/recovery_partition_filesystem"]["descriptionde"]="";
$elem["dell-recovery/recovery_partition_filesystem"]["descriptionfr"]="";
$elem["dell-recovery/recovery_partition_filesystem"]["default"]="0c";
$elem["dell-recovery/active_partition"]["type"]="string";
$elem["dell-recovery/active_partition"]["description"]="for internal use; sets which partition is active after successful installation
 This is only used when the disk_layout is 'msdos'.  It will otherwise be ignored.

";
$elem["dell-recovery/active_partition"]["descriptionde"]="";
$elem["dell-recovery/active_partition"]["descriptionfr"]="";
$elem["dell-recovery/active_partition"]["default"]="dynamic";
$elem["dell-recovery/fail_partition"]["type"]="string";
$elem["dell-recovery/fail_partition"]["description"]="for internal use; sets which partition is active after failed installation
 This is only used when the disk layout is 'msdos'.  It will otherwise be ignored.

";
$elem["dell-recovery/fail_partition"]["descriptionde"]="";
$elem["dell-recovery/fail_partition"]["descriptionfr"]="";
$elem["dell-recovery/fail_partition"]["default"]="dynamic";
$elem["dell-recovery/disable-driver-install"]["type"]="string";
$elem["dell-recovery/disable-driver-install"]["description"]="for internal use; determines any *-modaliases packages that should be removed

";
$elem["dell-recovery/disable-driver-install"]["descriptionde"]="";
$elem["dell-recovery/disable-driver-install"]["descriptionfr"]="";
$elem["dell-recovery/disable-driver-install"]["default"]="Default:";
$elem["dell-recovery/swap"]["type"]="string";
$elem["dell-recovery/swap"]["description"]="for internal use; determines swap behavior; binary enable (true/false) or dynamically determined based on disk size (dynamic)

";
$elem["dell-recovery/swap"]["descriptionde"]="";
$elem["dell-recovery/swap"]["descriptionfr"]="";
$elem["dell-recovery/swap"]["default"]="dynamic";
$elem["dell-oobe/user-interface"]["type"]="string";
$elem["dell-oobe/user-interface"]["description"]="for internal use; determines the default UI; (une/ude) or dynamically determined based on LOB/screen rez (dynamic)

";
$elem["dell-oobe/user-interface"]["descriptionde"]="";
$elem["dell-oobe/user-interface"]["descriptionfr"]="";
$elem["dell-oobe/user-interface"]["default"]="dynamic";
$elem["dell-recovery/dual_boot"]["type"]="boolean";
$elem["dell-recovery/dual_boot"]["description"]="for internal use; enables the factory installed dual boot solution.

";
$elem["dell-recovery/dual_boot"]["descriptionde"]="";
$elem["dell-recovery/dual_boot"]["descriptionfr"]="";
$elem["dell-recovery/dual_boot"]["default"]="false";
$elem["dell-recovery/dual_boot_layout"]["type"]="string";
$elem["dell-recovery/dual_boot_layout"]["description"]="for internal use; sets the disk drive layout used for a factory installed dual boot solution. valid: [primary, logical]

";
$elem["dell-recovery/dual_boot_layout"]["descriptionde"]="";
$elem["dell-recovery/dual_boot_layout"]["descriptionfr"]="";
$elem["dell-recovery/dual_boot_layout"]["default"]="primary";
$elem["dell-recovery/disk_layout"]["type"]="string";
$elem["dell-recovery/disk_layout"]["description"]="for internal use; when preseeded, determines the disk layout type to use

";
$elem["dell-recovery/disk_layout"]["descriptionde"]="";
$elem["dell-recovery/disk_layout"]["descriptionfr"]="";
$elem["dell-recovery/disk_layout"]["default"]="msdos";
$elem["dell-recovery/oie_mode"]["type"]="boolean";
$elem["dell-recovery/oie_mode"]["description"]="for internal use; enables ODM image mode

";
$elem["dell-recovery/oie_mode"]["descriptionde"]="";
$elem["dell-recovery/oie_mode"]["descriptionfr"]="";
$elem["dell-recovery/oie_mode"]["default"]="false";
$elem["dell-recovery/build_start"]["type"]="text";
$elem["dell-recovery/build_start"]["description"]="Building Dell Recovery Media...
";
$elem["dell-recovery/build_start"]["descriptionde"]="Dell-Wiederherstellungsmedium wird erstellt …
";
$elem["dell-recovery/build_start"]["descriptionfr"]="Construction du média DELL de restauration
";
$elem["dell-recovery/build_start"]["default"]="";
$elem["dell-recovery/build_progress"]["type"]="text";
$elem["dell-recovery/build_progress"]["description"]="${MESSAGE} (${PERCENT})...

";
$elem["dell-recovery/build_progress"]["descriptionde"]="";
$elem["dell-recovery/build_progress"]["descriptionfr"]="";
$elem["dell-recovery/build_progress"]["default"]="";
$elem["dell-recovery/burning"]["type"]="text";
$elem["dell-recovery/burning"]["description"]="Opening Burner...
";
$elem["dell-recovery/burning"]["descriptionde"]="Brenner wird geöffnet …
";
$elem["dell-recovery/burning"]["descriptionfr"]="Ouverture du graveur...
";
$elem["dell-recovery/burning"]["default"]="";
$elem["ubiquity/text/dell_recovery_title"]["type"]="text";
$elem["ubiquity/text/dell_recovery_title"]["description"]="Dell Recovery
";
$elem["ubiquity/text/dell_recovery_title"]["descriptionde"]="Dell Recovery
";
$elem["ubiquity/text/dell_recovery_title"]["descriptionfr"]="";
$elem["ubiquity/text/dell_recovery_title"]["default"]="";
$elem["ubiquity/text/recovery_type_title"]["type"]="text";
$elem["ubiquity/text/recovery_type_title"]["description"]="Recovery Type
";
$elem["ubiquity/text/recovery_type_title"]["descriptionde"]="Wiederherstellungstyp
";
$elem["ubiquity/text/recovery_type_title"]["descriptionfr"]="";
$elem["ubiquity/text/recovery_type_title"]["default"]="";
$elem["ubiquity/text/bootstrap_information_label"]["type"]="text";
$elem["ubiquity/text/bootstrap_information_label"]["description"]="This Dell Recovery Media can be used to restore the original factory software.
";
$elem["ubiquity/text/bootstrap_information_label"]["descriptionde"]="Dieses Dell-Wiederherstellungsmedium kann verwendet werden, um die ursprünglich installierte Software wiederherzustellen.
";
$elem["ubiquity/text/bootstrap_information_label"]["descriptionfr"]="";
$elem["ubiquity/text/bootstrap_information_label"]["default"]="";
$elem["ubiquity/text/bootstrap_warning_label"]["type"]="text";
$elem["ubiquity/text/bootstrap_warning_label"]["description"]="It is recommended you back up all important data before running this tool.
";
$elem["ubiquity/text/bootstrap_warning_label"]["descriptionde"]="Sie sollten alle wichtigen Daten sichern, bevor Sie dieses Programm ausführen.
";
$elem["ubiquity/text/bootstrap_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/bootstrap_warning_label"]["default"]="";
$elem["ubiquity/text/hdd_recovery"]["type"]="text";
$elem["ubiquity/text/hdd_recovery"]["description"]="Restore Linux OS partitions
";
$elem["ubiquity/text/hdd_recovery"]["descriptionde"]="Linux-Betriebssystempartitionen wiederherstellen
";
$elem["ubiquity/text/hdd_recovery"]["descriptionfr"]="";
$elem["ubiquity/text/hdd_recovery"]["default"]="";
$elem["ubiquity/text/hdd_info"]["type"]="text";
$elem["ubiquity/text/hdd_info"]["description"]="This will rebuild all OS and swap partitions to factory defaults.
";
$elem["ubiquity/text/hdd_info"]["descriptionde"]="Stellt alle Betriebssystem- und Swap-Partitionen nach den Vorgaben wieder her.
";
$elem["ubiquity/text/hdd_info"]["descriptionfr"]="";
$elem["ubiquity/text/hdd_info"]["default"]="";
$elem["ubiquity/text/hdd_warning_label"]["type"]="text";
$elem["ubiquity/text/hdd_warning_label"]["description"]="WARNING: All personal files and changes will be lost.
";
$elem["ubiquity/text/hdd_warning_label"]["descriptionde"]="Alle persönlichen Daten und Änderungen werden verloren gehen.
";
$elem["ubiquity/text/hdd_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/hdd_warning_label"]["default"]="";
$elem["ubiquity/text/automated_recovery"]["type"]="text";
$elem["ubiquity/text/automated_recovery"]["description"]="Restore entire hard drive.
";
$elem["ubiquity/text/automated_recovery"]["descriptionde"]="Gesamte Festplatte wiederherstellen.
";
$elem["ubiquity/text/automated_recovery"]["descriptionfr"]="";
$elem["ubiquity/text/automated_recovery"]["default"]="";
$elem["ubiquity/text/automated_info"]["type"]="text";
$elem["ubiquity/text/automated_info"]["description"]="This will rebuild all utility, recovery, and OS partitions.
";
$elem["ubiquity/text/automated_info"]["descriptionde"]="Stellt alle Werkzeug-, Wiederherstellungs- und Betriebssystempartitionen wieder her.
";
$elem["ubiquity/text/automated_info"]["descriptionfr"]="";
$elem["ubiquity/text/automated_info"]["default"]="";
$elem["ubiquity/text/automated_warning_label"]["type"]="text";
$elem["ubiquity/text/automated_warning_label"]["description"]="WARNING: All personal files and changes will be lost.
";
$elem["ubiquity/text/automated_warning_label"]["descriptionde"]="Alle persönlichen Daten und Änderungen werden verloren gehen.
";
$elem["ubiquity/text/automated_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/automated_warning_label"]["default"]="";
$elem["ubiquity/text/interactive_recovery"]["type"]="text";
$elem["ubiquity/text/interactive_recovery"]["description"]="Restore only Linux OS partition.
";
$elem["ubiquity/text/interactive_recovery"]["descriptionde"]="Nur Linux-Betriebssystempartition wiederherstellen.
";
$elem["ubiquity/text/interactive_recovery"]["descriptionfr"]="";
$elem["ubiquity/text/interactive_recovery"]["default"]="";
$elem["ubiquity/text/interactive_info"]["type"]="text";
$elem["ubiquity/text/interactive_info"]["description"]="This option allows you to resize any existing partitions.
";
$elem["ubiquity/text/interactive_info"]["descriptionde"]="Diese Option ermöglicht es Ihnen, die Größen aller bestehenden Partitionen zu ändern.
";
$elem["ubiquity/text/interactive_info"]["descriptionfr"]="";
$elem["ubiquity/text/interactive_info"]["default"]="";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["type"]="text";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["description"]="ERROR: This recovery media only functions on Dell and Alienware systems.
";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["descriptionde"]="Dieses Wiederherstellungsmedium funktioniert nur mit Dell- und Alienware-Systemen.
";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["default"]="";
$elem["ubiquity/text/status_warning_label"]["type"]="text";
$elem["ubiquity/text/status_warning_label"]["description"]="Building Recovery Partition
";
$elem["ubiquity/text/status_warning_label"]["descriptionde"]="Wiederherstellungspartition wird erstellt
";
$elem["ubiquity/text/status_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/status_warning_label"]["default"]="";
$elem["ubiquity/text/status_info_label"]["type"]="text";
$elem["ubiquity/text/status_info_label"]["description"]="NOTE: Please be patient, this may take a while.
";
$elem["ubiquity/text/status_info_label"]["descriptionde"]="Bitte haben Sie Geduld, dies könnte eine Weile dauern.
";
$elem["ubiquity/text/status_info_label"]["descriptionfr"]="";
$elem["ubiquity/text/status_info_label"]["default"]="";
$elem["ubiquity/text/status_restart_label"]["type"]="text";
$elem["ubiquity/text/status_restart_label"]["description"]="Your system will restart automatically several times.
";
$elem["ubiquity/text/status_restart_label"]["descriptionde"]="Ihr Rechner wird automatisch mehrere Male neu starten.
";
$elem["ubiquity/text/status_restart_label"]["descriptionfr"]="";
$elem["ubiquity/text/status_restart_label"]["default"]="";
$elem["ubiquity/text/recovery_heading_label"]["type"]="text";
$elem["ubiquity/text/recovery_heading_label"]["description"]="Create Dell Recovery Media
";
$elem["ubiquity/text/recovery_heading_label"]["descriptionde"]="Erstelle Dell Recovery Medien
";
$elem["ubiquity/text/recovery_heading_label"]["descriptionfr"]="Créer le média de restauration Dell
";
$elem["ubiquity/text/recovery_heading_label"]["default"]="";
$elem["ubiquity/text/recovery_information_label"]["type"]="text";
$elem["ubiquity/text/recovery_information_label"]["description"]="Dell Recovery Media can be used to restore your system to the same state as when it was first shipped to you.
";
$elem["ubiquity/text/recovery_information_label"]["descriptionde"]="Dell-Wiederherstellungsmedien können zum Zurücksetzen Ihres Systems (in den Zustand, in dem es Ihnen geliefert wurde) verwendet werden.
";
$elem["ubiquity/text/recovery_information_label"]["descriptionfr"]="";
$elem["ubiquity/text/recovery_information_label"]["default"]="";
$elem["ubiquity/text/recovery_warning_label"]["type"]="text";
$elem["ubiquity/text/recovery_warning_label"]["description"]="It is highly recommended that you generate media and store it in a safe place.
";
$elem["ubiquity/text/recovery_warning_label"]["descriptionde"]="Es wird dringend geraten, ein Wiederherstellungsmedium zu erstellen und an einem sicheren Ort aufzubewahren.
";
$elem["ubiquity/text/recovery_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/recovery_warning_label"]["default"]="";
$elem["ubiquity/text/save_to_usb"]["type"]="text";
$elem["ubiquity/text/save_to_usb"]["description"]="Save recovery media to an external USB flash drive
";
$elem["ubiquity/text/save_to_usb"]["descriptionde"]="Wiederherstellungsmedium auf einem externen USB-Flash-Laufwerk speichern
";
$elem["ubiquity/text/save_to_usb"]["descriptionfr"]="";
$elem["ubiquity/text/save_to_usb"]["default"]="";
$elem["ubiquity/text/usb_warning_label"]["type"]="text";
$elem["ubiquity/text/usb_warning_label"]["description"]="Note: This requires a USB flash drive with approximately 2GB free.
";
$elem["ubiquity/text/usb_warning_label"]["descriptionde"]="Ein USB-Flash-Laufwerk mit ungefähr 2GB freiem Speicher wird benötigt.
";
$elem["ubiquity/text/usb_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/usb_warning_label"]["default"]="";
$elem["ubiquity/text/save_to_dvd"]["type"]="text";
$elem["ubiquity/text/save_to_dvd"]["description"]="Save recovery media to DVD
";
$elem["ubiquity/text/save_to_dvd"]["descriptionde"]="Wiederherstellungsmedium auf DVD speichern
";
$elem["ubiquity/text/save_to_dvd"]["descriptionfr"]="";
$elem["ubiquity/text/save_to_dvd"]["default"]="";
$elem["ubiquity/text/dvd_warning_label"]["type"]="text";
$elem["ubiquity/text/dvd_warning_label"]["description"]="Note: This requires writable DVD media.
";
$elem["ubiquity/text/dvd_warning_label"]["descriptionde"]="Eine beschreibbare DVD wird benötigt.
";
$elem["ubiquity/text/dvd_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/dvd_warning_label"]["default"]="";
$elem["ubiquity/text/save_to_none"]["type"]="text";
$elem["ubiquity/text/save_to_none"]["description"]="Don't generate recovery media at this time
";
$elem["ubiquity/text/save_to_none"]["descriptionde"]="Wiederherstellungsmedium jetzt nicht erstellen
";
$elem["ubiquity/text/save_to_none"]["descriptionfr"]="";
$elem["ubiquity/text/save_to_none"]["default"]="";
$elem["ubiquity/text/no_media_warning"]["type"]="text";
$elem["ubiquity/text/no_media_warning"]["description"]="Recovery Media can be generated later by choosing the tool from the System menu.
";
$elem["ubiquity/text/no_media_warning"]["descriptionde"]="Das Wiederherstellungsmedium kann später erstellt werden, indem Sie das Werkzeug im System-Menü wählen.
";
$elem["ubiquity/text/no_media_warning"]["descriptionfr"]="";
$elem["ubiquity/text/no_media_warning"]["default"]="";
$elem["ubiquity/text/genuine_recovery_warning_label"]["type"]="text";
$elem["ubiquity/text/genuine_recovery_warning_label"]["description"]="ERROR: This media is only valid on Dell systems.
";
$elem["ubiquity/text/genuine_recovery_warning_label"]["descriptionde"]="Dieses Medium kann nur auf Dell-Systemen verwendet werden.
";
$elem["ubiquity/text/genuine_recovery_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/genuine_recovery_warning_label"]["default"]="";
$elem["ubiquity/text/eula_heading_label"]["type"]="text";
$elem["ubiquity/text/eula_heading_label"]["description"]="Dell End User License Agreement
";
$elem["ubiquity/text/eula_heading_label"]["descriptionde"]="Dell-Endbenutzer-Lizenzvereinbarung
";
$elem["ubiquity/text/eula_heading_label"]["descriptionfr"]="";
$elem["ubiquity/text/eula_heading_label"]["default"]="";
$elem["ubiquity/text/accept_button"]["type"]="text";
$elem["ubiquity/text/accept_button"]["description"]="
 I accept the license terms.
 (required to use your computer)
";
$elem["ubiquity/text/accept_button"]["descriptionde"]="Description-de.UTF-8:
 Ich akzeptiere die Lizenzbestimmungen. (notwendig, um Ihren Rechner zu benutzen)
";
$elem["ubiquity/text/accept_button"]["descriptionfr"]="";
$elem["ubiquity/text/accept_button"]["default"]="";
$elem["ubiquity/text/99_grub_menu"]["type"]="text";
$elem["ubiquity/text/99_grub_menu"]["description"]="Restore #OS# to factory state
";
$elem["ubiquity/text/99_grub_menu"]["descriptionde"]="Werkszustand von #OS# wiederherstellen
";
$elem["ubiquity/text/99_grub_menu"]["descriptionfr"]="";
$elem["ubiquity/text/99_grub_menu"]["default"]="";
PKG_OptionPageTail2($elem);
?>
