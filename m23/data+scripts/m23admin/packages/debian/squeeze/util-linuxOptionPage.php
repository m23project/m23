<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("util-linux");

$elem["util-linux/noauto-with-nonzero-passnum"]["type"]="note";
$elem["util-linux/noauto-with-nonzero-passnum"]["description"]="Filesystem entries with noauto and non-zero pass number
 /etc/fstab contains at least one entry that is marked as \"noauto\" with a
 non-zero pass number (meaning that the file system should not be
 automatically mounted upon boot, yet should be checked by fsck, the
 file system check utility).
 .
 From this release onwards, fsck will fail for file systems that have a
 non-zero pass number and are not available (eg. because they are unplugged)
 at the time fsck runs. This will cause the system to enter file system
 repair mode during boot.
 .
 To avoid this problem, please adjust such fstab entries for removable
 devices, by either setting their pass number to zero, or adding the \"nofail\"
 option. For more details, please see mount(8).
";
$elem["util-linux/noauto-with-nonzero-passnum"]["descriptionde"]="Dateisystemeinträge mit »noauto« und »pass« ungleich Null
 /etc/fstab enthält mindestens einen Eintrag mit der Option »noauto« und einem von 0 verschiedenen Wert im Feld <pass>. (Das Dateisystem soll also beim Hochfahren des Systems nicht automatisch eingebunden, aber dennoch vom Prüfprogramm fsck untersucht werden.)
 .
 Beginnend mit dieser Veröffentlichung (Release) wird fsck fehlschlagen, wenn es ein nicht verfügbares Dateisystem (beispielsweise ein von der Stromversorgung abgetrenntes) untersuchen soll. Dieser Fehler versetzt das System beim Hochfahren in den Dateisystem-Reparaturmodus.
 .
 Um dieses Problem zu vermeiden, passen Sie bitte die fstab-Einträge für Wechselmedien an, indem sie entweder das Feld <pass> auf 0 setzen oder zusätzlich die Option »nofail« wählen. Weitere Informationen entnehmen Sie bitte mount(8).
";
$elem["util-linux/noauto-with-nonzero-passnum"]["descriptionfr"]="Systèmes de fichiers avec option « noauto » et nombre de passes non nul
 Le fichier /etc/fstab comporte au moins une entrée marquée « noauto » avec un nombre de passes non nul (ce qui indique que le système de fichier correspondant n'est pas monté au démarrage mais doit cependant être contrôlé par « fsck »).
 .
 À partir de cette version de util-linux, la commande fsck échouera pour les systèmes de fichiers qui ont un nombre de passes non nul mais qui sont indisponibles (car non montés) au moment de l'exécution de la commande. Cela provoquera alors la bascule en mode de réparation, au démarrage.
 .
 Pour éviter ce problème, vous devriez modifier les entrées correspondantes dans le fichier fstab, soit en y indiquant un nombre de passes  nul, soit en ajoutant l'option « nofail ». Pour plus d'informations, veuillez consulter la page de manuel de mount(8).
";
$elem["util-linux/noauto-with-nonzero-passnum"]["default"]="";
PKG_OptionPageTail2($elem);
?>
