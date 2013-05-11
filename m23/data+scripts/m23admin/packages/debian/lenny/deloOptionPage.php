<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("delo");

$elem["delo/boot-device"]["type"]="string";
$elem["delo/boot-device"]["description"]="Disk on which to intall the bootloader:
 Delo, the DECstation harddisk bootloader, must be installed into the
 bootsector of a disk with a DOS partition table. Currently this must be
 the disk on which the root partition resides. Please give the device name
 of the harddisk to install delo onto.
";
$elem["delo/boot-device"]["descriptionde"]="Festplatte, auf der der Boot-Loader installiert werden soll:
 Delo (DECstation Festplatten-Boot-Loader) muss auf eine Festplatte mit einer DOS-Partitionstabelle installiert werden. Derzeit muss dies die Partition sein, auf der das Wurzelverzeichnis liegt. Bitte geben Sie den Gerätenamen der Festplatte an, auf die Delo installiert werden soll.
";
$elem["delo/boot-device"]["descriptionfr"]="Périphérique du disque dur où installer le programme de démarrage :
 Delo, le programme de démarrage des disques durs « DECstation », doit être installé dans le secteur de démarrage d'un disque avec une table de partitions au format DOS. Actuellement, ce disque doit être le disque de la partition racine. Veuillez entrer le périphérique correspondant pour y installer delo.
";
$elem["delo/boot-device"]["default"]="";
$elem["delo/root-device"]["type"]="string";
$elem["delo/root-device"]["description"]="Root partition to use:
 Please enter the device name of your root partition.
";
$elem["delo/root-device"]["descriptionde"]="Root-Partition, die verwendet werden soll:
 Bitte geben Sie den Namen Ihrer Wurzelpartition ein.
";
$elem["delo/root-device"]["descriptionfr"]="Périphérique de la partition racine :
 Veuillez entrer le périphérique de la partition racine.
";
$elem["delo/root-device"]["default"]="";
$elem["delo/console-device"]["type"]="string";
$elem["delo/console-device"]["description"]="Console device:
 Delo can use the local console or a serial port as the system console.
 Please give the name of the system console. If no device is given, delo
 assumes local console.
";
$elem["delo/console-device"]["descriptionde"]="Konsolen-Gerät:
 Delo kann die lokale Konsole oder einen seriellen Port als Systemkonsole verwenden. Bitte geben Sie den Namen der Systemkonsole an. Falls kein Gerät angegeben wird, wird lokale Konsole angenommen.
";
$elem["delo/console-device"]["descriptionfr"]="Périphérique du terminal :
 Delo peut utiliser un terminal local ou un terminal série comme terminal système. Veuillez entrer le périphérique du terminal système. Si aucun périphérique n'est renseigné, delo utilisera le terminal local.
";
$elem["delo/console-device"]["default"]="";
$elem["delo/firmware-variables"]["type"]="note";
$elem["delo/firmware-variables"]["description"]="Firmware variables for booting
 You have to set the \"boot\" firmware variables to boot your new debian
 installation:
 .
  setenv boot \"3/rz${FIRM_RZ}\"
";
$elem["delo/firmware-variables"]["descriptionde"]="Firmware-Variablen zum Booten
 Sie müssen die »boot«-Firmware-Variablen belegen, um Ihre neue Debian-Installation zu booten:
 .
  setenv boot \"3/rz${FIRM_RZ}\"
";
$elem["delo/firmware-variables"]["descriptionfr"]="Variables de démarrage du micro-code (« firmware ») 
 Vous devez définir la variable « boot » pour démarrer la nouvelle installation :
 .
  setenv boot \"3/rz${FIRM_RZ}\"
";
$elem["delo/firmware-variables"]["default"]="";
PKG_OptionPageTail2($elem);
?>
