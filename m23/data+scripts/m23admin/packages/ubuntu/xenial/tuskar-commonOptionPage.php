<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tuskar-common");

$elem["tuskar/configure_db"]["type"]="boolean";
$elem["tuskar/configure_db"]["description"]="Set up a database for Tuskar?
 No database has been set up for tuskar to use. Before continuing, you
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
 tuskar-common\".
";
$elem["tuskar/configure_db"]["descriptionde"]="Soll eine Datenbank für Tuskar angelegt werden?
 Es wurde noch keine Datenbank für Tuskar angelegt. Bevor Sie fortsetzen, sollten Sie sicherstellen, dass Sie über die folgenden Informationen verfügen:
 .
  * den Typ der zu verwendenden Datenbank;
  * den Rechnernamen des Datenbankservers (der Server muss TCP-Verbindungen
    von diesem Rechner aus erlauben);
  * einen Benutzernamen und ein Passwort zum Zugriff auf die Datenbank.
 .
 Falls eine dieser Voraussetzungen fehlt, wählen Sie diese Option nicht und benutzen Sie die reguläre SQLite-Unterstützung.
 .
 Sie können diese Einstellung später mit dem Befehl »dpkg-reconfigure -plow tuskar-common« ändern.
";
$elem["tuskar/configure_db"]["descriptionfr"]="Faut-il paramétrer une base de données pour Tuskar ?
 Aucune base de données n'a été paramétrée pour Tuskar. Avant de poursuivre, vous devriez vous assurer d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.     
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow tuskar-common ».
";
$elem["tuskar/configure_db"]["default"]="false";
$elem["tuskar/auth-host"]["type"]="string";
$elem["tuskar/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Tuskar.
 Typically this is also the hostname of the OpenStack Identity Service
 (Keystone).
";
$elem["tuskar/auth-host"]["descriptionde"]="Rechername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Authentifizierungsservers für Tuskar an. Typischerweise ist dies auch der Rechnername des OpenStack-Identitätsdienstes (Keystone).
";
$elem["tuskar/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification pour Tuskar. En général, il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["tuskar/auth-host"]["default"]="127.0.0.1";
$elem["tuskar/admin-tenant-name"]["type"]="string";
$elem["tuskar/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["tuskar/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den für den Authentifizierungsserver zu verwendenden Tenant-Namen an.
";
$elem["tuskar/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom d'espace client du serveur d'authentification.
";
$elem["tuskar/admin-tenant-name"]["default"]="admin";
$elem["tuskar/admin-user"]["type"]="string";
$elem["tuskar/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["tuskar/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den für den Authentifizierungsserver zu verwendenden Benutzernamen an.
";
$elem["tuskar/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["tuskar/admin-user"]["default"]="admin";
$elem["tuskar/admin-password"]["type"]="password";
$elem["tuskar/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["tuskar/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das für den Authentifizierungsserver zu verwendende Passwort an.
";
$elem["tuskar/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["tuskar/admin-password"]["default"]="";
$elem["tuskar/rabbit_host"]["type"]="string";
$elem["tuskar/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["tuskar/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit anderen Komponenten von OpenStack zusammenarbeiten zu können, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["tuskar/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["tuskar/rabbit_host"]["default"]="localhost";
$elem["tuskar/rabbit_userid"]["type"]="string";
$elem["tuskar/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["tuskar/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung zum RabbitMQ-Server:
 Um mit anderen Komponenten von OpenStack zusammenarbeiten zu können, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den für die Verbindung zum RabbitMQ-Server zu verwendenden Benutzernamen an.
";
$elem["tuskar/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["tuskar/rabbit_userid"]["default"]="guest";
$elem["tuskar/rabbit_password"]["type"]="password";
$elem["tuskar/rabbit_password"]["description"]="Password for connection to the RabbitMQ server: 
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["tuskar/rabbit_password"]["descriptionde"]="Passwort für die Verbindung zum RabbitMQ-Server:
 Um mit anderen Komponenten von OpenStack zusammenarbeiten zu können, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das für die Verbindung zum RabbitMQ-Server zu verwendende Passwort an.
";
$elem["tuskar/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["tuskar/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
