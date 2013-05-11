<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sane-utils");

$elem["sane-utils/saned_run"]["type"]="boolean";
$elem["sane-utils/saned_run"]["description"]="Enable saned as a standalone server?
 The saned server, when enabled, makes scanners available over the network.
 .
 There are two ways of running saned:
  - as an inetd service, started by the inetd superserver. In this mode,
 saned is started on demand when a client connects to the server;
  - as a standalone daemon, started at system boot. In this mode, saned
 runs in the background all by itself and listens for client connections.
 .
 When run in standalone mode, saned advertises itself on the network and
 can be detected automatically by the SANE clients with no configuration
 on the client side. You still need to configure the server to accept
 connections from your clients. This feature is experimental and requires
 a running Avahi daemon.
 .
 Accept this option if you want to make use of this feature.
";
$elem["sane-utils/saned_run"]["descriptionde"]="Aktiviere Saned als Einzel-Server?
 Der Saned-Server stellt Scanner über das Netz zu Verfügung, wenn er aktiviert ist.
 .
 Es gibt zwei Arten, Saned zu betreiben:
  - als Inetd-Service, gestartet über den Inetd-Superserver. In diesem Modus
 wird Saned nach Bedarf gestartet, wenn sich ein Client mit dem Server
 verbindet.
  - als Einzel-Server, gestartet beim Systemstart. In diesem Modus läuft Saned
    selbst im Hintergrund und wartet auf Anfragen von Clients.
 .
 Im Einzel-Server-Modus macht sich Saned über das Netz bekannt und kann von SANE-Clients ohne Konfiguration auf der Clientseite automatisch erkannt werden. Sie müssen dennoch den Server konfigurieren, damit er Verbindungen von den Clients akzeptiert. Diese Funktionalität ist experimentell und benötigt einen laufenden Avahi-Daemon.
 .
 Akzeptieren Sie diese Option, falls Sie diese Funktionalität nutzen wollen.
";
$elem["sane-utils/saned_run"]["descriptionfr"]="Faut-il activer le serveur « saned » ?
 Le serveur « saned », une fois activé, rend disponibles les scanners sur le réseau.
 .
 Il existe deux méthodes pour exécuter le serveur :
  - via le superserveur inetd : dans ce mode, le serveur est lancé
    à la demande quand un client se connecte ; 
  - en tant que démon autonome, lancé au démarrage du système : dans
    ce mode, le serveur fonctionne en permanence en tâche de fond, en
    attente des connexions des clients.
 .
 En mode autonome, le démon s'annonce sur le réseau et peut alors être automatiquement détecté par les clients SANE sans nécessiter de configuration particulière de ces clients. Il restera nécessaire de configurer le serveur pour qu'il accepte les connexions des clients. Cette fonctionnalité est expérimentale et nécessite un démon Avahi opérationnel.
 .
 Si vous choisissez cette option, le serveur sera lancé au démarrage du système.
";
$elem["sane-utils/saned_run"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
