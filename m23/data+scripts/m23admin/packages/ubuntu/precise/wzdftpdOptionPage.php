<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wzdftpd");

$elem["wzdftpd/upgrade"]["type"]="note";
$elem["wzdftpd/upgrade"]["description"]="Upgrading
 The format of the config file has changed in version 0.6.0, and is not
 compatible with previous version.
 .
 You must create a new config file. See /usr/share/doc/wzdftpd/examples for
 an example.
";
$elem["wzdftpd/upgrade"]["descriptionde"]="Führe Upgrade durch
 Das Format der Konfigurationsdatei hat sich in Version 0.6.0 geändert und ist zu vorhergehenden Versionen nicht kompatibel.
 .
 Sie müssen eine neue Konfigurationsdatei erstellen. Lesen Sie /usr/share/doc/wzdftpd/examples für ein Beispiel.
";
$elem["wzdftpd/upgrade"]["descriptionfr"]="Changement de format de fichier après la mise à jour
 Le format du fichier de configuration a changé depuis la version 0.6.0 et n'est plus compatible avec les versions précédentes.
 .
 Vous devez créer un nouveau fichier de configuration. Veuillez consulter les exemples du répertoire /usr/share/doc/wzdftpd/examples.
";
$elem["wzdftpd/upgrade"]["default"]="";
PKG_OptionPageTail2($elem);
?>
