<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xmcd");

$elem["xmcd/cdrom-device-name"]["type"]="string";
$elem["xmcd/cdrom-device-name"]["description"]="Device name of the CD drive for xmcd to use:
 In order to function properly, xmcd requires at least a device name of the
 CD drive which should be used for playback. Possible examples of the CD drive
 device names are /dev/cdrom (this is usually a symbolic link), /dev/sr0 or
 /dev/scd0 (for SCSI or SCSI-emulated devices), /dev/hdc or /dev/hdd (for IDE
 devices). Based on the supplied value the default configuration files will be
 generated. You can always reconfigure and customize xmcd by running the
 /usr/sbin/xmcdconfig script later.
 .
 See /usr/share/doc/xmcd/README.Debian for important information on how
 to properly enable access to CD drives and CD database for unprivileged users.
";
$elem["xmcd/cdrom-device-name"]["descriptionde"]="Gerätename des CD-Laufwerks, das Xmcd benutzen soll:
 Um korrekt zu funktionieren benötigt Xmcd mindestens einen Gerätenamen des CD-Laufwerks, das zur Wiedergabe verwendet werden soll. Mögliche Beispiele für CD-Laufwerksnamen sind /dev/cdrom (dies ist gewöhnlich ein symbolischer Verweis (Link)), /dev/sr0 oder /dev/scd0 (für SCSI- oder SCSI-emulierte-Geräte), /dev/hdc oder /dev/hdd (für IDE-Geräte). Basierend auf dem angegebenen Wert werden die Standard-Konfigurationsdateien erzeugt. Sie können jederzeit Xmcd neu konfigurieren und anpassen, indem Sie später das /usr/sbin/xmcdconfig-Skript ausführen.
 .
 Lesen Sie /usr/share/doc/xmcd/README.Debian für wichtige Informationen über die Art, Zugriff auf CD-Laufwerke und CD-Datenbanken für unprivilegierte Benutzer korrekt zu ermöglichen.
";
$elem["xmcd/cdrom-device-name"]["descriptionfr"]="Nom du périphérique pour le lecteur de CD-ROM qu'utilisera xmcd :
 Pour pouvoir fonctionner correctement, xmcd a besoin d'au moins un nom de périphérique correspondant à un lecteur de CD-ROM qui peut lire de la musique. Des exemples possibles sont /dev/cdrom (qui est en général un lien symbolique), /dev/sr0 ou /dev/scd0 (pour les périphériques SCSI ou SCSI en émulation), /dev/hdc ou /dev/hdd pour les périphériques IDE. Le fichier de configuration sera créé en tenant compte de la valeur indiquée ici. Vous pourrez toujours, par la suite, reconfigurer et personnaliser xmcd avec le script « /usr/sbin/xmcdconfig ».
 .
 Veuillez consulter le fichier /usr/share/doc/xmcd/README.Debian pour obtenir des informations importantes sur l'accès aux lecteurs de CD-ROM et à la base de données des CD pour les utilisateurs ne disposant pas de privilèges d'administration.
";
$elem["xmcd/cdrom-device-name"]["default"]="/dev/cdrom";
PKG_OptionPageTail2($elem);
?>
