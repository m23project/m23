<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ckermit");

$elem["ckermit/iksd"]["type"]="boolean";
$elem["ckermit/iksd"]["description"]="Enable Internet Kermit Service Daemon (IKSD) in inetd.conf?
 The Internet Kermit Service Daemon (IKSD) is the C-Kermit program running
 as an Internet service, similar to an FTP or Telnet server.  It executes
 Telnet protocol just like a Telnet server and it transfers files like an
 FTP server.  But unlike an FTP server, IKSD uses the Kermit file transfer
 protocol (which is more powerful and flexible) and allows both FTP-like
 client/server connections as well as direct keyboard interaction.  Secure
 authentication methods and encrypted sessions are available, as well as a
 wide range of file transfer and management functions, which can be
 scripted to automate arbitrarily complex tasks.
";
$elem["ckermit/iksd"]["descriptionde"]="Den Internet-Kermit-Service-Daemon (IKSD) in inetd.conf aktivieren?
 Der Internet Kermit Service Daemon (IKSD) ist ein C-Kermit-Programm, welches ähnlich einem FTP- oder Telnet-Server als Internet-Service läuft. Es führt das Telnet-Protokoll wie ein Telnet-Server aus und es überträgt Dateien wie ein FTP-Server. Aber anders als ein FTP-Server benutzt IKSD das Kermit-Datei-Transfer-Protokoll (welches leistungsfähiger und flexibler ist) und erlaubt sowohl FTP-ähnliche Client/Server-Verbindungen als auch direkte Tastatur-Interaktion. Sichere Authentifizierungs-Methoden und verschlüsselte Sitzungen sowie eine große Auswahl von Dateiübertragungs- und -verwaltungsfunktionen sind verfügbar. Diese können in Skripten verwendet werden, um beliebig komplexe Aufgaben auszuführen.
";
$elem["ckermit/iksd"]["descriptionfr"]="Faut-il activer le démon de service internet Kermit (IKSD) dans inetd.conf ?
 Le démon de service internet Kermit (IKSD) correspond au programme C-Kermit lancé en tant que service internet, tel un serveur FTP ou Telnet. Il gère le protocole Telnet comme un serveur Telnet et le transfert de fichiers comme un serveur FTP. Mais à la différence d'un serveur FTP, IKSD utilise le protocole de transfert de fichiers Kermit (qui est flexible et plus puissant) ; il autorise à la fois des connexions client/serveur comme FTP et des commandes passées directement au clavier. Des méthodes d'authentification sécurisée et de chiffrement de session sont disponibles, ainsi qu'un large panel de fonctions de transfert et gestion de fichiers qui peuvent, via des scripts, être automatisées pour effectuer des tâches complexes.
";
$elem["ckermit/iksd"]["default"]="false";
$elem["ckermit/iksd-anon"]["type"]="boolean";
$elem["ckermit/iksd-anon"]["description"]="Enable anonymous IKSD logins?
 IKSD supports anonymous logins (using chroot), similar to anonymous FTP.
";
$elem["ckermit/iksd-anon"]["descriptionde"]="Anonyme IKSD-Anmeldungen ermöglichen?
 IKSD unterstützt anonyme Anmeldungen (verwendet chroot) ähnlich anonymem FTP.
";
$elem["ckermit/iksd-anon"]["descriptionfr"]="Faut-il autoriser les connexions IKSD anonymes ?
 IKSD gère les connexions anonymes dans un environnement fermé d'exécution (« chroot »), de manière comparable aux connexions FTP anonymes.
";
$elem["ckermit/iksd-anon"]["default"]="false";
$elem["ckermit/iksd-anondir"]["type"]="string";
$elem["ckermit/iksd-anondir"]["description"]="Directory for anonymous IKSD logins:
 Enter directory for anonymous IKSD logins. A chroot() will be performed
 into this directory on login. This directory will NOT be created.
 .
 The default is /home/ftp (same as wu-ftpd).
";
$elem["ckermit/iksd-anondir"]["descriptionde"]="Verzeichnis für anonyme IKSD-Anmeldungen:
 Geben Sie das Verzeichnis für anonyme IKSD-Anmeldungen ein. Ein chroot()-Aufruf in dieses Verzeichnis wird bei der Anmeldung durchgeführt. Das Verzeichnis wird NICHT angelegt.
 .
 Die Voreinstellung ist /home/ftp (wie bei wu-ftpd).
";
$elem["ckermit/iksd-anondir"]["descriptionfr"]="Répertoire pour les connexions IKSD anonymes :
 Veuillez indiquer le répertoire pour les connexions IKSD anonymes. Un environnement d'exécution fermé (« chroot») sera démarré dans ce répertoire à la connexion. Ce répertoire ne sera pas créé.
 .
 Par défaut, comme pour wu-ftpd, /home/ftp est utilisé.
";
$elem["ckermit/iksd-anondir"]["default"]="/home/ftp";
$elem["ckermit/iksd-no-inetd"]["type"]="error";
$elem["ckermit/iksd-no-inetd"]["description"]="No inet daemon found, so IKSD cannot be configured.
 Please install an inetd (e.g. openbsd-inetd) and then
 reconfigure ckermit with:
 .
 dpkg-reconfigure ckermit
";
$elem["ckermit/iksd-no-inetd"]["descriptionde"]="Kein inet-Daemon gefunden, daher kann IKSD nicht konfiguriert werden.
 Bitte installieren Sie einen Inetd (z.B. openbsd-inetd) und konfigurieren Sie Ckermit neu durch Eingabe von:
 .
 dpkg-reconfigure ckermit
";
$elem["ckermit/iksd-no-inetd"]["descriptionfr"]="Aucun démon inetd installé, IKSD ne sera pas configuré
 Veuillez installer un démon inetd (par exemple, openbsd-inetd) et reconfigurer ckermit avec :
 .
 dpkg-reconfigure ckermit
";
$elem["ckermit/iksd-no-inetd"]["default"]="";
PKG_OptionPageTail2($elem);
?>
