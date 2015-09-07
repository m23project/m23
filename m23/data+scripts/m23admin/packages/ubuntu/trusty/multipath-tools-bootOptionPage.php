<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("multipath-tools-boot");

$elem["multipath-tools-boot/scsi_id"]["type"]="note";
$elem["multipath-tools-boot/scsi_id"]["description"]="The location of the getuid callout has changed
 Your /etc/multipath.conf still has a getuid_callout pointing to /sbin/scsi_id
 but the binary has moved to /lib/udev/scsi_id in udev 0.113-1. Please update
 your configuration. This is best done by removing the getuid_callout option
 entirely.
 .
 Don't forget to update your initramfs after these changes. Otherwise your
 system might not boot from multipath.
";
$elem["multipath-tools-boot/scsi_id"]["descriptionde"]="Der Ort des Getuid-Callouts ist geändert worden
 In Ihrer /etc/multipath.conf weist ein getuid_callout auf /sbin/scsi_id, das Programm wurde aber in Udev 0.113-1 nach /lib/udev/scsi_id verschoben. Bitte aktualisieren Sie Ihre Konfiguration. Dies erfolgt am besten durch das komplette Entfernen der Option getuid_callout.
 .
 Vergessen Sie nicht, nach dieser Änderung Ihr Initramfs zu aktualisieren. Andernfalls könnte Ihr System nicht vom Multipath aus starten.
";
$elem["multipath-tools-boot/scsi_id"]["descriptionfr"]="Modification de la valeur du champ « getuid_callout »
 Dans le fichier /etc/multipath.conf la valeur actuelle du champ « getuid_callout » est toujours /sbin/scsi_id mais l'adresse de l'exécutable est /lib/udev/scsi_id dans udev 0.113-1. Il est impératif de modifier le fichier de configuration. La solution suggérée est la suppression de cette option.
 .
 Veuillez noter que vous devrez mettre à jour le système de fichiers initial en mémoire (« initramfs ») après ces changements. En l'absence de cette action, le système pourrait refuser de démarrer depuis un périphérique multichemins (« multipath »).
";
$elem["multipath-tools-boot/scsi_id"]["default"]="";
PKG_OptionPageTail2($elem);
?>
