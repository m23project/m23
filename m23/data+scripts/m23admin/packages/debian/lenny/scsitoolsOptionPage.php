<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("scsitools");

$elem["scsitools/info"]["type"]="note";
$elem["scsitools/info"]["description"]="scsitools package:
 You will most probably want to read /usr/share/doc/scsitools/README.Debian
 and the rest of the files in that directory, before using any of the
 programs included in this package.
";
$elem["scsitools/info"]["descriptionde"]="Paket scsitools:
 Bevor Sie irgendeines der Programme in diesem Paket benutzen, werden Sie /usr/share/doc/scsitools/README.Debian und die restlichen Dateien in diesem Verzeichnis lesen wollen.
";
$elem["scsitools/info"]["descriptionfr"]="Note relative au paquet scsitools
 Il est recommandé de lire les documents tels que /usr/share/doc/scsitools/README.Debian ainsi que les autres de ce répertoire avant d'utiliser l'un des programmes fournis.
";
$elem["scsitools/info"]["default"]="";
PKG_OptionPageTail2($elem);
?>
