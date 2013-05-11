<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub2");

$elem["grub2/numbering_scheme_transition"]["type"]="note";
$elem["grub2/numbering_scheme_transition"]["description"]="GRUB 1.95 numbering scheme transition
 As of version 1.95, GRUB 2 has changed its numbering scheme.  Partitions are
 now counted starting from 1 rather than 0.  This is to make it consistent with
 device names of Linux and the other kernels used in Debian.  For example, when
 using Linux as the kernel, \"(hd0,1)\" refers to the same partition as the
 /dev/sda1 device node.
 .
 Because of this, there's a chance your system becomes unbootable if
 update-grub(8) is run before GRUB is updated, generating a grub.cfg file that
 your installed GRUB won't yet be able to parse correctly.  To ensure your
 system will be able to boot, you have to:
 .
  - Reinstall GRUB (typically, by running grub-install).
  - Rerun update-grub to generate a new grub.cfg.
";
$elem["grub2/numbering_scheme_transition"]["descriptionde"]="Übergang des Partitionierungs-Nummerierungs-Schemas in GRUB 1.95
 Mit Version 1.95 hat GRUB 2 sein Partitionierungs-Nummerierungs-Schema geändert. Partitionen werden jetzt ab 1 statt ab 0 gezählt. Dies ist damit mit den Gerätenamen von Linux und anderen Kerneln in Debian konsistent. Zum Beispiel beim Einsatz von Linux als Kernel bezieht sich »(hd0,1)« auf die gleiche Platte wie der /dev/sda1-Geräteknoten.
 .
 Daher besteht ein Risiko, dass Ihr System nicht mehr starten kann, falls update-grub(8) läuft, bevor GRUB aktualisiert wird und somit eine grub.cfg-Datei erstellt, die der installierte GRUB nicht korrekt auslesen kann. Um sicherzustellen, dass Ihr System starten kann, müssen Sie folgendes durchführen:
 .
  - GRUB neu installieren (typischerweise via Ausführung von grub-install)
  - update-grub erneut ausführen, um eine neue grub.cfg zu erstellen.
";
$elem["grub2/numbering_scheme_transition"]["descriptionfr"]="Changement de numérotation dans GRUB 1.95
 À partir de la version 1.95, GRUB 2 a modifié son système de numérotation. La numérotation des partitions commence désormais à 1 et non à 0. Cette méthode est en cohérence avec les noms de périphériques de Linux et des autres noyaux utilisés dans la distribution. Par exemple, avec un noyau Linux, « (hd0,1) » fait référence à la même partition que /dev/sda1.
 .
 En raison de ces changements, il est possible que le système ne puisse plus démarrer si la commande update-grub(8) est exécutée avant la mise à jour de GRUB. Cela créerait un fichier grub.cfg que la version installée de GRUB ne pourrait pas analyser correctement. Pour garantir que le système pourra toujours démarrer, vous devez :
 .
  - Réinstaller GRUB (avec la commande « grub-install ») ;
  - Exécuter à nouveau la commande « update-grub » pour créer un nouveau
    fichier grub.cfg.
";
$elem["grub2/numbering_scheme_transition"]["default"]="";
PKG_OptionPageTail2($elem);
?>
