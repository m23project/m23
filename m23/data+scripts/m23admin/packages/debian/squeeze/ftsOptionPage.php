<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fts");

$elem["fts/tftppath"]["type"]="string";
$elem["fts/tftppath"]["description"]="Base directory for the tftp files:
 The config directory for tftp is where the pxelinux.0 image lies. This must be in sync with your TFTP Server
";
$elem["fts/tftppath"]["descriptionde"]="Basis-Verzeichnis für die TFTP-Dateien:
 Das Konfigurationsverzeichnis befindet sich dort, wo sich auch pxelinux.0 befindet. Dies muss mit Ihrem TFTP-Server synchron sein.
";
$elem["fts/tftppath"]["descriptionfr"]="Répertoire de base pour le serveur tftp :
 Le répertoire de base pour le serveur tftp est l'endroit ou se trouve le fichier pxelinux.0. Ceci doit être synchronisé avec votre serveur tftp.
";
$elem["fts/tftppath"]["default"]="/srv/fai/boot";
PKG_OptionPageTail2($elem);
?>
