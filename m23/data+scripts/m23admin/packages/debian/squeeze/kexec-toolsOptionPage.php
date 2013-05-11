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
 system bootloader process.
";
$elem["kexec-tools/load_kexec"]["descriptionde"]="Soll »kexec-tools« Neustarts verwalten?
 Falls Sie diese Option wählen, führt ein Systemneustart zum Start eines von »kexec« geladenen Kernels, anstatt den gesamten Bootloader-Prozess zu durchlaufen.
";
$elem["kexec-tools/load_kexec"]["descriptionfr"]="Faut-il gérer les redémarrages avec kexec-tools ?
 Si vous choisissez cette option, le système redémarrera avec un noyau chargé par kexec plutôt que par le programme de démarrage habituel.
";
$elem["kexec-tools/load_kexec"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
