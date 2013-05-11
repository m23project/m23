<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libroxen-imho");

$elem["libroxen-imho/change-path"]["type"]="boolean";
$elem["libroxen-imho/change-path"]["description"]="Search path to example layout files?
 The location of the IMHO layout files have been changed. If you choose
 to update the path, Roxen will be restarted for this to take effect. If
 you choose to NOT to update the path now, IMHO may stop working!
 .
 NOTE: This will only happen if the postinstall script really FINDS that
 you are using the example files!!
";
$elem["libroxen-imho/change-path"]["descriptionde"]="Suchpfad für die Beispiel-Layoutdateien?
 Der Ort der IMHO-Layoutdateien hat sich verändert. Falls Sie sich dafür entscheiden, den Pfad zu aktualisieren, wird Roxen neu gestartet werden, damit diese Änderungen Wirkung erzielen. Wenn Sie sich dafür entscheiden, es jetzt NICHT zu tun, kann es sein, dass IMHO nicht mehr funktioniert!
 .
 BEACHTEN SIE: Das wird nur passieren, wenn das postinstall-Skript HERAUSFINDET, dass Sie die Beispieldateien auch wirklich benutzen.
";
$elem["libroxen-imho/change-path"]["descriptionfr"]="Faut-il changer le chemin de recherche pour utiliser les exemples de fichiers d'affichage ?
 L'emplacement des fichiers d'affichage d'IMHO a été modifié. Veuillez choisir si vous souhaitez que les fichiers de configuration soient modifiés pour utiliser le nouveau chemin de recherche. Dans l'affirmative, Roxen sera redémarré afin que ces modifications soient prises en compte. Si vous refusez, IMHO risque de cesser de fonctionner.
 .
 Cela ne se produira que si le script de post-installation trouve que vous utilisez réellement les fichiers d'exemple.
";
$elem["libroxen-imho/change-path"]["default"]="";
$elem["libroxen-imho/restart"]["type"]="note";
$elem["libroxen-imho/restart"]["description"]="Restart Roxen
 The IMHO module and it's layout files have been updated. You will need
 to restart roxen for this to take affect.
";
$elem["libroxen-imho/restart"]["descriptionde"]="Roxen neustarten
 Das IMHO-Modul und seine Layout-Dateien sind aktualisiert worden. Sie werden Roxen neustarten müssen, damit diese in Kraft treten.
";
$elem["libroxen-imho/restart"]["descriptionfr"]="Redémarrage de Roxen
 Le module IMHO et ses fichiers d'affichage ont été mis à jour. Il est nécessaire de redémarrer roxen pour que les changements soient appliqués.
";
$elem["libroxen-imho/restart"]["default"]="";
PKG_OptionPageTail2($elem);
?>
