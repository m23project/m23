<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jazip");

$elem["jazip/setup"]["type"]="note";
$elem["jazip/setup"]["description"]="Notice for jazip packages users
 This message is displayed because the configuration file /etc/jazip.conf
 was not on your system prior to package installation.
 .
 The script `/usr/sbin/jazipconfig --non-interactive` was run in an attempt
 to create a working /etc/jazip.conf configuration file. If this was
 unsuccessful, run /usr/sbin/jazipconfig again as root without the
 --non-interactive switch, or consult jazip.conf(5) to create it yourself.
 .
 Users must be added to the 'floppy' group to allow access to the jazip
 program and the devices it manages.  For example, to add user 'joe':
 .
 # adduser joe floppy
 .
 See /usr/share/doc/jazip/README.Debian for details.
";
$elem["jazip/setup"]["descriptionde"]="Hinweise für jazip-Benutzer
 Diese Meldung erscheint, da die Konfigurationsdatei /etc/jazip.conf vor der Paketinstallation nicht vorhanden war.
 .
 Das Script 'usr/sbin/jazipconfig --non-interactive' wurde ausgeführt, um eine lauffähige Version der Datei /etc/jazip.conf zu erstellen. Wenn dies fehlschlug, dann starten Sie als root /usr/sbin/jazipconfig erneut, jedoch ohne den Schalter --non-interactive. Weiterhin finden Sie in der Manpage jazip.conf(5) Hinweise zum manuellen Erstellen der Datei.
 .
 Benutzer müssen der Gruppe 'floppy' angehören, um mit jazip arbeiten zu können. Zum Bespiel fügen Sie den Benutzer 'joe' zur Gruppe mit folgendem Befehl hinzu:
 .
 # adduser joe floppy
 .
 In der Datei /usr/share/doc/jazip/README.Debian finden weitere Infos.
";
$elem["jazip/setup"]["descriptionfr"]="Note aux utilisateurs du paquet jazip
 Ce message vous est présenté car le fichier de configuration /etc/jazip.conf n'existait pas avant l'installation du paquet.
 .
 Le script « /usr/sbin/jazipconfig --non-interactive » a été exécuté pour tenter de créer automatiquement le fichier de configuration /etc/jazip.conf.  Si cela a échoué, veuillez exécuter de nouveau /usr/sbin/jazipconfig avec les privilèges du super-utilisateur (root), mais sans l'option « --non-interactive », ou consultez jazip.conf(5) pour le créer vous-même.
 .
 Les utilisateurs doivent être ajoutés au groupe « floppy » pour pouvoir se servir du programme jazip et des périphériques qu'il gère. La commande suivante permet de faire cette opération pour l'utilisateur « joe » :
 .
  adduser joe floppy
 .
 Veuillez consulter /usr/share/doc/jazip/README.Debian pour plus d'informations.
";
$elem["jazip/setup"]["default"]="";
PKG_OptionPageTail2($elem);
?>
