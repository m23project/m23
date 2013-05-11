<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iodine");

$elem["iodine/start_daemon"]["type"]="boolean";
$elem["iodine/start_daemon"]["description"]="Should iodined (server) start on boot?
 If you want iodined to be started at boot time you can set this behaviour here.
";
$elem["iodine/start_daemon"]["descriptionde"]="Soll der Iodined (Server) beim Systemstart auch gestartet werden?
 Falls Sie mÃ¶chten, dass zum Systemstartzeitpunkt auch Iodined gestartet wird, stellen Sie dies hier ein.
";
$elem["iodine/start_daemon"]["descriptionfr"]="Faut-il lancer le démon du serveur Iodine au démarrage ?
 Veuillez choisir si vous souhaitez lancer le démon du serveur Iodine au démarrage de la machine.
";
$elem["iodine/start_daemon"]["default"]="false";
$elem["iodine/daemon_options"]["type"]="string";
$elem["iodine/daemon_options"]["description"]="Options to iodined (server):
 You need to give the necessary arguments to iodined; see iodined(8) for help.
 Example: 10.0.0.1 tunnel.mydomain.example
";
$elem["iodine/daemon_options"]["descriptionde"]="Optionen fÃŒr Iodined (Server):
 Sie mÃŒssen die notwendigen Argumente an Iodined ÃŒbergeben; lesen Sie iodined(8) fÃŒr Hilfe. Beispiel: 10.0.0.1 tunnel.mydomain.example
";
$elem["iodine/daemon_options"]["descriptionfr"]="Options du démon du serveur Iodine :
 Veuillez indiquer les paramètres à passer au server Iodine (voir la page de manuel iodined(8) pour plus de détails). Par exemple : « 10.0.0.1 tunnel.mydomain.example ».
";
$elem["iodine/daemon_options"]["default"]="";
$elem["iodine/daemon_password"]["type"]="password";
$elem["iodine/daemon_password"]["description"]="Password for iodined (server):
 Enter the password iodined uses at startup. It has to be used by clients
 when connecting.
 This password will be stored in plain text in /etc/default/iodine.
";
$elem["iodine/daemon_password"]["descriptionde"]="Passwort fÃŒr Iodined (Server):
 Geben Sie das Passwort ein, das Iodined beim Starten verwendet. Es muss von Clients beim Verbindungsaufbau verwendet werden. Dieses Passwort wird im Klartext in /etc/default/iodine gespeichert.
";
$elem["iodine/daemon_password"]["descriptionfr"]="Mot de passe pour le serveur Iodine :
 Veuillez indiquer le mot de passe qu'utilisera le serveur au démarrage. Il sera utilisé par les clients lorsque ceux-ci se connecteront. Ce mot de passe sera conservé en clair dans /etc/default/iodine.
";
$elem["iodine/daemon_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
