<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dell-recovery");

$elem["dell-recovery/wyse_mode"]["type"]="boolean";
$elem["dell-recovery/wyse_mode"]["description"]="for internal use; determines if wyse mode is on.

";
$elem["dell-recovery/wyse_mode"]["descriptionde"]="";
$elem["dell-recovery/wyse_mode"]["descriptionfr"]="";
$elem["dell-recovery/wyse_mode"]["default"]="false";
$elem["dell-recovery/dual_boot"]["type"]="boolean";
$elem["dell-recovery/dual_boot"]["description"]="for internal use; determines if EFI enabled dual boot enabled

";
$elem["dell-recovery/dual_boot"]["descriptionde"]="";
$elem["dell-recovery/dual_boot"]["descriptionfr"]="";
$elem["dell-recovery/dual_boot"]["default"]="false";
$elem["dell-recovery/os_partition"]["type"]="string";
$elem["dell-recovery/os_partition"]["description"]="for internal use; determines the label of the OS partition to remove

";
$elem["dell-recovery/os_partition"]["descriptionde"]="";
$elem["dell-recovery/os_partition"]["descriptionfr"]="";
$elem["dell-recovery/os_partition"]["default"]="";
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
$elem["ubiquity/text/dhc_automated_recovery"]["type"]="text";
$elem["ubiquity/text/dhc_automated_recovery"]["description"]="Install Dell Hybrid Client

";
$elem["ubiquity/text/dhc_automated_recovery"]["descriptionde"]="";
$elem["ubiquity/text/dhc_automated_recovery"]["descriptionfr"]="";
$elem["ubiquity/text/dhc_automated_recovery"]["default"]="";
$elem["ubiquity/text/dhc_automated_info"]["type"]="text";
$elem["ubiquity/text/dhc_automated_info"]["description"]="This will rebuild all recovery, and OS partitions.

";
$elem["ubiquity/text/dhc_automated_info"]["descriptionde"]="";
$elem["ubiquity/text/dhc_automated_info"]["descriptionfr"]="";
$elem["ubiquity/text/dhc_automated_info"]["default"]="";
$elem["ubiquity/text/dhc_automated_warning_label"]["type"]="text";
$elem["ubiquity/text/dhc_automated_warning_label"]["description"]="WARNING: All personal files and changes will be lost.
";
$elem["ubiquity/text/dhc_automated_warning_label"]["descriptionde"]="Alle persönlichen Daten und Änderungen werden verloren gehen.
";
$elem["ubiquity/text/dhc_automated_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/dhc_automated_warning_label"]["default"]="";
$elem["ubiquity/text/automated_recovery"]["type"]="text";
$elem["ubiquity/text/automated_recovery"]["description"]="Restore entire hard drive.
";
$elem["ubiquity/text/automated_recovery"]["descriptionde"]="Gesamte Festplatte wiederherstellen.
";
$elem["ubiquity/text/automated_recovery"]["descriptionfr"]="";
$elem["ubiquity/text/automated_recovery"]["default"]="";
$elem["ubiquity/text/automated_info"]["type"]="text";
$elem["ubiquity/text/automated_info"]["description"]="This will rebuild all recovery, and OS partitions.

";
$elem["ubiquity/text/automated_info"]["descriptionde"]="";
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
$elem["ubiquity/text/interactive_recovery"]["description"]="Customize installation.

";
$elem["ubiquity/text/interactive_recovery"]["descriptionde"]="";
$elem["ubiquity/text/interactive_recovery"]["descriptionfr"]="";
$elem["ubiquity/text/interactive_recovery"]["default"]="";
$elem["ubiquity/text/interactive_info"]["type"]="text";
$elem["ubiquity/text/interactive_info"]["description"]="e.g. Disk encryption, partitions resizing..etc.

";
$elem["ubiquity/text/interactive_info"]["descriptionde"]="";
$elem["ubiquity/text/interactive_info"]["descriptionfr"]="";
$elem["ubiquity/text/interactive_info"]["default"]="";
$elem["ubiquity/text/nonrecovery_warning_label"]["type"]="text";
$elem["ubiquity/text/nonrecovery_warning_label"]["description"]="WARNING: No recovery feature included.

";
$elem["ubiquity/text/nonrecovery_warning_label"]["descriptionde"]="";
$elem["ubiquity/text/nonrecovery_warning_label"]["descriptionfr"]="";
$elem["ubiquity/text/nonrecovery_warning_label"]["default"]="";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["type"]="text";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["description"]="ERROR: This recovery media only functions on Dell and Alienware systems purchased with Ubuntu.

";
$elem["ubiquity/text/genuine_bootstrap_warning_label"]["descriptionde"]="";
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
$elem["ubiquity/text/accept_button"]["description"]="I have read and accept these terms.
";
$elem["ubiquity/text/accept_button"]["descriptionde"]="";
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
