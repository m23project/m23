<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jed-common");

$elem["jed-common/rm-site-defaults"]["type"]="boolean";
$elem["jed-common/rm-site-defaults"]["description"]="Remove old files in /etc/?
 Due to a bug in dpkg (#108587) the config files 00site.sl, 00debian.sl and
 99defaults.sl in /etc/jed-init.d/ and /etc/jed.conf aren't removed after
 an upgrade to 0.99.15-1 or higher.
 .
 It seems you have modified one of these files, because their md5 sums
 differ from the originals.
";
$elem["jed-common/rm-site-defaults"]["descriptionde"]="Veraltete Dateien in /etc/ entfernen?
 Aufgrund eines Fehlers in dpkg (#108587) wurden die Konfigurationsdateien 00site.sl, 00debian.sl und 99defaults.sl in /etc/jed-init.d/ und /etc/jed.conf nach der Aktualisierung auf die Version 0.99.15-1 oder neuer nicht gelöscht.
 .
 Es scheint, dass eine der Dateien verändert wurde, da sie nicht mit dem Original übereinstimmt.
";
$elem["jed-common/rm-site-defaults"]["descriptionfr"]="Faut-il effacer les anciens fichiers dans le répertoire /etc/ ?
 En raison d'un bogue de dpkg (n° 108587), les fichiers de configuration 00site.sl, 00debian.sl et 99defaults.sl dans /etc/jed-init.d/ et /etc/jed.conf ne sont pas effacés après la mise à niveau vers les versions 0.99.15-1 et supérieures.
 .
 Un de ces fichiers semble avoir été modifié, car leurs sommes MD5 sont différentes de celles des fichiers originaux.
";
$elem["jed-common/rm-site-defaults"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
