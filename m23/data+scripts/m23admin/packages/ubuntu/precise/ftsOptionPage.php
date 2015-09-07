<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fts");

$elem["fts/tftppath"]["type"]="string";
$elem["fts/tftppath"]["description"]="Base directory for the TFTP files:
 Please note that the configuration directory for TFTP is the one that
 usually contains the pxelinux.0 file. It has to be configured to the same
 value that is used by your TFTP server.
";
$elem["fts/tftppath"]["descriptionde"]="Basis-Verzeichnis für die TFTP-Dateien:
 Das TFTP-Konfigurationsverzeichnis ist in der Regel das Verzeichnis welches die Datei pxelinux.0 enthält. Dieser Wert muss mit dem Konfigurationsverzeichnis Ihres TFTP-Servers übereinstimmen.
";
$elem["fts/tftppath"]["descriptionfr"]="Répertoire de base pour les fichiers TFTP :
 Le répertoire configuré pour TFTP est l'endroit où se trouve le fichier pxelinux.0. Ce répertoire doit être synchronisé avec celui réglé pour le serveur TFTP.
";
$elem["fts/tftppath"]["default"]="/srv/fai/boot";
PKG_OptionPageTail2($elem);
?>
