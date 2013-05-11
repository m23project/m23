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
 saned is started as needed by inetd whenever a client tries to connect
 to the server;
  - as a standalone daemon, started at system boot. In this mode, saned
 runs in the background all by itself and listens for client connections.
 .
 When run in standalone mode, saned advertises itself on the network and
 can be detected automatically by the SANE clients with no configuration
 on the client side. You still need to configure the server to accept
 connections from your clients.
 .
 Accept this option if you want to make use of this feature.
";
$elem["sane-utils/saned_run"]["descriptionde"]="Aktiviere Saned als Einzel-Server?
 Der Saned-Server stellt Scanner über das Netz zu Verfügung, wenn er aktiviert ist.
 .
 Es gibt zwei Arten, Saned zu betreiben:
  - als Inetd-Service, gestartet über den Inetd-Superserver. In diesem Modus
    wird Saned immer dann vom Inetd gestartet, wenn ein Scanner einen
    Verbindungsaufbau startet
  - als Einzel-Server, gestartet beim Systemstart. In diesem Modus läuft Saned
    selbst im Hintergrund und wartet auf Anfragen von Clients
 .
 Im Einzel-Server-Modus macht sich Saned über das Netz bekannt und kann von SANE-Clients ohne Konfiguration auf der Clientseite automatisch erkannt werden. Sie müssen dennoch den Server konfigurieren, damit er Verbindungen von den Clients akzeptiert.
 .
 Akzeptieren Sie diese Option, falls Sie diese Funktionalität nutzen wollen.
";
$elem["sane-utils/saned_run"]["descriptionfr"]="Faut-il activer le serveur « saned » ?
 Le serveur « saned », une fois activé, rend disponibles les scanners sur le réseau.
 .
 Il existe deux méthodes pour exécuter le serveur :
  - via le superserveur inetd : dans ce mode, le serveur est lancé
    à la demande quand un client se connecte ; 
  - en tant que démon autonome, lancé au démarrage du système : dans
    ce mode, le serveur fonctionne en permanence en tâche de fond, en
    attente des connexions des clients.
 .
 En mode autonome, le démon s'annonce sur le réseau et peut alors être automatiquement détecté par les clients SANE sans nécessiter de configuration particulière de ces clients. Il restera nécessaire de configurer le serveur pour qu'il accepte les connexions des clients.
 .
 Si vous choisissez cette option, le serveur sera lancé au démarrage du système.
";
$elem["sane-utils/saned_run"]["default"]="false";
$elem["sane-utils/saned_scanner_group"]["type"]="boolean";
$elem["sane-utils/saned_scanner_group"]["description"]="Add saned user to the scanner group?
 The saned server, when enabled, makes scanners available over the network.
 By applying different permissions to the different scanners connected to
 your machine, you can control which ones will be made available over the
 network.
 .
 Read /usr/share/doc/sane-utils/README.Debian for details on how to manage
 permissions for saned. By default, saned is run under the saned user and
 group.
 .
 Accept this option if you want to make all your scanners available over
 the network without restriction.
";
$elem["sane-utils/saned_scanner_group"]["descriptionde"]="Saned-Benutzer zu der Scanner-Gruppe hinzufügen?
 Falls er aktiviert wird, stellt der Saned-Server Scanner über das Netz bereit. Durch Verteilen verschiedener Rechte auf verschiedene Scanner an Ihrer Maschine können Sie steuern, welche davon über Netz bereitgestellt werden.
 .
 Lesen Sie /usr/share/doc/sane-utils/README.Debian für Details über die Rechteverwaltung für Saned. Standardmäßig läuft Saned unter dem saned-Benutzer und dessen Gruppe.
 .
 Akzeptieren Sie diese Option, falls Sie alle Ihre Scanner über das Netz ohne Einschränkungen zur Verfügung stellen wollen.
";
$elem["sane-utils/saned_scanner_group"]["descriptionfr"]="Faut-il ajouter l'utilisateur « saned » au groupe « scanner » ?
 Lorsque le serveur saned est activé, les scanners deviennent accessibles via le réseau. Il est possible d'autoriser ou non l'accès via le réseau aux différents scanners de cette machine, en modifiant les permissions de chacun d'eux.
 .
 Veuillez lire le fichier /usr/share/doc/sane-utils/README.Debian pour plus d'informations sur le gestion des permissions pour saned. Par défaut, le démon est exécuté avec les privilèges de l'utilisateur et du groupe « saned ».
 .
 Si vous choisissez cette option, tous les scanners deviendront accessibles via le réseau sans restriction.
";
$elem["sane-utils/saned_scanner_group"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
