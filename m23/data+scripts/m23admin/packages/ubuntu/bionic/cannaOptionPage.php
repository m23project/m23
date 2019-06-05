<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("canna");

$elem["canna/run_cannaserver"]["type"]="boolean";
$elem["canna/run_cannaserver"]["description"]="Should the Canna server run automatically?
 This package contains the Canna server and server-related
 utilities. If you are only interested in these utilities,
 you can disable the Canna server now.
";
$elem["canna/run_cannaserver"]["descriptionde"]="Canna-Server automatisch starten?
 Dieses Paket enthält den Canna-Server und Server-Werkzeuge. Wenn Sie nur an diesen Werkzeugen interessiert sind, können Sie den Canna-Server jetzt deaktivieren.
";
$elem["canna/run_cannaserver"]["descriptionfr"]="Faut-il lancer le serveur Canna automatiquement ?
 Ce paquet inclut le serveur Canna et les utilitaires qui l'accompagnent. Si seuls ceux-ci vous intéressent, vous pouvez désactiver le serveur ici.
";
$elem["canna/run_cannaserver"]["default"]="true";
$elem["canna/run_with_inet"]["type"]="boolean";
$elem["canna/run_with_inet"]["description"]="Should the Canna server run in network mode?
 By default the Canna server will run without support for network
 connections, and will only accept connections on UNIX domain sockets,
 from clients running on the same host.
 .
 If you choose this option, network support will be activated, and the
 Canna server will accept connections on TCP sockets from clients that
 may be on remote hosts. Some clients (such as egg and yc-el) require
 this mode even if they run on the local host.
";
$elem["canna/run_with_inet"]["descriptionde"]="Canna-Server im Netzwerkmodus betreiben? 
 Normalerweise wird der Canna-Server ohne Unterstützung für Netzwerkverbindungen betrieben und nimmt Verbindungen nur über UNIX-Domain-Sockets von Clients an, die auf dem selben Rechner laufen.
 .
 Wenn Sie hier zustimmen, wird die Netzwerkunterstützung eingeschaltet und der Canna-Server nimmt Verbindungen über TCP-Sockets auch von Clients an, die auf entfernten Rechnern laufen. Einige Clients (wie Egg und Yc-el) benötigen diesen Modus, auch wenn sie auf dem selben Rechner laufen.
";
$elem["canna/run_with_inet"]["descriptionfr"]="Faut-il démarrer le serveur Canna en mode réseau ?
 Par défaut, le serveur Canna sera exécuté sans gestion des connexions réseau et n'acceptera de connexion que sur des « sockets » de domaine Unix. Il ne sera alors utilisable que par des clients exécutés sur la même machine.
 .
 Si vous choisissez cette option, la gestion des connexions réseau sera activée et le serveur Canna acceptera des connexions TCP depuis des clients éventuellement utilisés sur des hôtes distants. Certains clients, comme egg et yc-el, ont besoin de ce mode même pour fonctionner en local.
";
$elem["canna/run_with_inet"]["default"]="false";
$elem["canna/manage_allow_hosts_with_debconf"]["type"]="boolean";
$elem["canna/manage_allow_hosts_with_debconf"]["description"]="Manage /etc/hosts.canna automatically?
 The /etc/hosts.canna file lists hosts allowed to connect to the
 Canna server.
 .
 You should not accept this option if you prefer managing the
 file's contents manually.
";
$elem["canna/manage_allow_hosts_with_debconf"]["descriptionde"]="Die Datei /etc/hosts.canna automatisch verwalten?
 In der Datei /etc/hosts.canna werden Rechner aufgelistet, die sich mit dem Canna-Server verbinden dürfen.
 .
 Lehnen Sie hier ab, wenn Sie den Inhalt der Datei selbst bestimmen wollen.
";
$elem["canna/manage_allow_hosts_with_debconf"]["descriptionfr"]="Faut-il gérer /etc/hosts.canna avec automatiquement ?
 Le fichier /etc/hosts.canna gère les autorisations de connexion des hôtes distants au serveur Canna.
 .
 Vous ne devriez pas choisir cette option si vous préférez gérer vous-même le contenu de ce fichier.
";
$elem["canna/manage_allow_hosts_with_debconf"]["default"]="true";
$elem["canna/allow_hosts"]["type"]="string";
$elem["canna/allow_hosts"]["description"]="Hosts allowed to connect to this Canna server:
 Please enter the names of the hosts allowed to connect to this Canna server,
 separated by spaces.
 .
 You can use \"unix\" to allow access via UNIX domain sockets.
";
$elem["canna/allow_hosts"]["descriptionde"]="Rechner, die sich mit diesem Canna-Server verbinden dürfen:
 Bitte geben Sie durch Leerzeichen getrennt die Namen der Rechner ein, die sich mit diesem Canna-Server verbinden dürfen.
 .
 Benutzen Sie »unix«, um den Zugriff über UNIX-Domain-Sockets zu gestatten.
";
$elem["canna/allow_hosts"]["descriptionfr"]="Hôtes autorisés à se connecter à ce serveur :
 Veuillez indiquer les noms d'hôtes autorisés à se connecter à ce serveur Canna, séparés par des espaces.
 .
 Vous pouvez utiliser « unix » pour autoriser l'accès par les « sockets » de domaine UNIX.
";
$elem["canna/allow_hosts"]["default"]="unix localhost";
PKG_OptionPageTail2($elem);
?>
