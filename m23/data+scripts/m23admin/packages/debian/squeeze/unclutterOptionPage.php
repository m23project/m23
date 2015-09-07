<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("unclutter");

$elem["unclutter/autostart"]["type"]="boolean";
$elem["unclutter/autostart"]["description"]="Start unclutter automatically?
 unclutter can be started automatically after X has been started for a
 user. That can be either after startx from console or after login with a
 display manager.
";
$elem["unclutter/autostart"]["descriptionde"]="unclutter automatisch starten?
 unclutter kann automatisch gestartet werden, nachdem X für einen Benutzer gestartet wurde. Das kann entweder nach dem Aufruf von startx von der Konsole aus sein oder nach dem einloggen mit einen Display Manager.
";
$elem["unclutter/autostart"]["descriptionfr"]="Faut-il démarrer unclutter automatiquement ?
 unclutter peut être démarré automatiquement une fois que le serveur X a été lancé pour un utilisateur. Ce démarrage automatique peut se faire aussi bien lorsque le serveur est lancé par la commande « startx » que lorsque l'utilisateur ouvre une session avec un gestionnaire graphique de sessions.
";
$elem["unclutter/autostart"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
