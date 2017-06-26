<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("designate-common");

$elem["designate/configure_db"]["type"]="boolean";
$elem["designate/configure_db"]["description"]="Set up a database for Designate?
 No database has been set up for designate to use. Before continuing, you
 should make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server hostname (that server must allow TCP connections from
    this machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run
 with regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 designate-common\".
";
$elem["designate/configure_db"]["descriptionde"]="Eine Datenbank für Designate einrichten?
 Für die Verwendung mit Designate wurde noch keine Datenbank eingerichtet. Bevor Sie fortfahren, sollen Sie sicherstellen, dass Sie über die folgenden Informationen verfügen:
 .
  * die Art der Datenbank, die Sie verwenden möchten
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
  von dieser Maschine erlauben)
  * einen Benutzernamen und ein Passwort zum Zugriff auf die Datenbank
 .
 Falls Teile dieser Anforderungen fehlen, wählen Sie diese Option nicht aus und verwenden Sie die normale SQLite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow designate-common« ausführen.
";
$elem["designate/configure_db"]["descriptionfr"]="Installer une base de données pour Designate ?
 Aucune base de données n'a été installée pour designate. Avant de continuer, assurez vous d'avoir :
 .
  - le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur doit
    accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à cette
    base de données.
 .
 Si certains de ces prérequis sont manquants, ignorer cette option et exécuter l'application avec le support sqlite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow designate-common ».
";
$elem["designate/configure_db"]["default"]="false";
$elem["designate/auth-host"]["type"]="string";
$elem["designate/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Designate.
 Typically this is also the hostname of the OpenStack Identity Service
 (Keystone).
";
$elem["designate/auth-host"]["descriptionde"]="Rechnername des Authentifizierungs-Servers:
 Bitte geben Sie den Rechnernamen des Authentifizierungs-Servers für Designate an. Typischerweise ist dies auch der Rechnername des OpenStack-Identitätsdienstes (Keystone).
";
$elem["designate/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte de votre serveur d'authentification pour Designate. Typiquement c'est également le nom d'hôte de votre Service d'Identité OpenStack (Keystone).
";
$elem["designate/auth-host"]["default"]="127.0.0.1";
$elem["designate/admin-tenant-name"]["type"]="string";
$elem["designate/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["designate/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungs-Servers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungs-Servers an.
";
$elem["designate/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le serveur d'authentification pour le nom de l'espace client.
";
$elem["designate/admin-tenant-name"]["default"]="admin";
$elem["designate/admin-user"]["type"]="string";
$elem["designate/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["designate/admin-user"]["descriptionde"]="Benutzername des Authentifizierungs-Servers:
 Bitte geben Sie den Benutzernamen an, der mit dem Authentifizierungs-Server verwandt werden soll.
";
$elem["designate/admin-user"]["descriptionfr"]="Nom d'utilisateur pour le serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["designate/admin-user"]["default"]="admin";
$elem["designate/admin-password"]["type"]="password";
$elem["designate/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["designate/admin-password"]["descriptionde"]="Passwort des Authentifizierungs-Servers:
 Bitte geben Sie das Passwort an, das mit dem Authentifizierungs-Server verwandt werden soll.
";
$elem["designate/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["designate/admin-password"]["default"]="";
$elem["designate/rabbit_host"]["type"]="string";
$elem["designate/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["designate/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit anderen Komponenten von OpenStack zusammenzuarbeiten muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["designate/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["designate/rabbit_host"]["default"]="localhost";
$elem["designate/rabbit_userid"]["type"]="string";
$elem["designate/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["designate/rabbit_userid"]["descriptionde"]="Benutzername für Verbindungen mit dem RabbitMQ-Server:
 Um mit anderen Komponenten von OpenStack zusammenzuarbeiten muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen für Verbindungen mit dem RabbitMQ-Server an.
";
$elem["designate/rabbit_userid"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["designate/rabbit_userid"]["default"]="guest";
$elem["designate/rabbit_password"]["type"]="password";
$elem["designate/rabbit_password"]["description"]="Password for connection to the RabbitMQ server: 
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["designate/rabbit_password"]["descriptionde"]="Passwort für Verbindungen mit dem RabbitMQ-Server:
 Um mit anderen Komponenten von OpenStack zusammenzuarbeiten muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort für Verbindungen mit dem RabbitMQ-Server an.
";
$elem["designate/rabbit_password"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["designate/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
