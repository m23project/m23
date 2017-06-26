<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mopidy");

$elem["mopidy/daemon"]["type"]="boolean";
$elem["mopidy/daemon"]["description"]="Start the Mopidy server at boot?
 The Mopidy server can be run as a system service, automatically starting
 at boot. It will be listening to MPD connections on port 6600 and HTTP
 connections on port 6680. By default, it will only accept connections from
 the local machine.
 .
 You have the option of starting the Mopidy server automatically on system
 boot. If in doubt, it is suggested to not start it automatically on boot.
 .
 This setting can be modified later by running \"dpkg-reconfigure mopidy\".
";
$elem["mopidy/daemon"]["descriptionde"]="Soll der Mopidy-Server beim Hochfahren des Systems gestartet werden?
 Der Mopidy-Server kann als ein Systemdienst ausgeführt werden, der beim Hochfahren automatisch startet. Er wird MPD-Verbindungen auf Port 6600 und HTTP-Verbindungen auf Port 6680 annehmen. Standardmäßig wird er nur Verbindungen vom lokalen Rechner akzeptieren.
 .
 Sie haben die Möglichkeit, den Mopidy-Server beim Hochfahren des Systems automatisch zu starten. Im Zweifelsfall wird vorgeschlagen, ihn nicht automatisch beim Hochfahren zu starten.
 .
 Diese Einstellung kann später durch Ausführen von »dpkg-reconfigure mopidy« geändert werden.
";
$elem["mopidy/daemon"]["descriptionfr"]="Démarrer le serveur Mopidy à l'amorçage du système ?
 Le serveur Mopidy peut être lancé comme un service du système, démarré automatiquement à l'amorçage du système. Il sera à l'écoute des connexions MPD sur le port 6600 et des connexions HTTP sur le port 6680. Par défaut, il n'acceptera que des connexions de la machine locale.
 .
 Vous avez le choix de démarrer le serveur Mopidy automatiquement à l'amorçage du système. En cas de doute, il est suggéré de ne pas le lancer automatiquement à l'amorçage du système.
 .
 Ce réglage peut être modifié plus tard en lançant « dpkg-reconfigure mopidy ».
";
$elem["mopidy/daemon"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
