<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kexec-tools");

$elem["kexec-tools/load_kexec"]["type"]="boolean";
$elem["kexec-tools/load_kexec"]["description"]="Should kexec-tools handle reboots?
 If you choose this option, a system reboot will trigger a restart
 into a kernel loaded by kexec instead of going through the full
 system boot loader process.
";
$elem["kexec-tools/load_kexec"]["descriptionde"]="Soll »kexec-tools« Neustarts verwalten?
 Falls Sie diese Option wählen, führt ein Systemneustart zum Start eines von »kexec« geladenen Kernels, anstatt den gesamten Bootloader-Prozess zu durchlaufen.
";
$elem["kexec-tools/load_kexec"]["descriptionfr"]="Faut-il gérer les redémarrages avec kexec-tools ?
 Si vous choisissez cette option, le système redémarrera avec un noyau chargé par kexec plutôt que par le programme d'amorçage habituel.
";
$elem["kexec-tools/load_kexec"]["default"]="false";
$elem["kexec-tools/use_grub_config"]["type"]="boolean";
$elem["kexec-tools/use_grub_config"]["description"]="Read GRUB configuration file to load the kernel?
 If you choose this option, kexec will read the GRUB configuration file to
 determine which kernel and options to load for kexec reboot, as opposed
 to what is in /etc/default/kexec.
";
$elem["kexec-tools/use_grub_config"]["descriptionde"]="GRUBs Konfigurationsdatei für das Laden des Kernels auslesen?
 Falls Sie diese Option wählen, wird »kexec« die Konfigurationsdatei von GRUB auslesen, um den Kernel und die Optionen für das Laden zu ermitteln, anstatt den Inhalt von /etc/default/kexec zu verwenden.
";
$elem["kexec-tools/use_grub_config"]["descriptionfr"]="Faut-il lire le fichier de configuration de GRUB pour charger le noyau ?
 Si vous choisissez cette option, kexec lira le fichier de configuration de GRUB pour déterminer le noyau et les options à charger pour un redémarrage via kexec, contrairement à ce qui se trouve dans le fichier « /etc/default/kexec ».
";
$elem["kexec-tools/use_grub_config"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
