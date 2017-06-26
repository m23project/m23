<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("magnum-common");

$elem["magnum/configure_db"]["type"]="boolean";
$elem["magnum/configure_db"]["description"]="Set up a database for Magnum?
 No database has been set up for Magnum to use. Before
 continuing, you should make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server hostname (that server must allow TCP connections from this
    machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run with
 regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 magnum-common\".
";
$elem["magnum/configure_db"]["descriptionde"]="";
$elem["magnum/configure_db"]["descriptionfr"]="Installer une base de données pour Magnum ?
 Aucune base de données n'a été installée pour Magnum. Avant de continuer, assurez-vous d'avoir :
 .
  — le type de base de données que vous souhaitez utiliser ;
  — le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  — un nom d'utilisateur et un mot de passe pour accéder
    à cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow magnum-common ».
";
$elem["magnum/configure_db"]["default"]="false";
$elem["magnum/auth-host"]["type"]="string";
$elem["magnum/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["magnum/auth-host"]["descriptionde"]="";
$elem["magnum/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte du serveur d'authentification. Habituellement, c'est également le nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["magnum/auth-host"]["default"]="127.0.0.1";
$elem["magnum/admin-tenant-name"]["type"]="string";
$elem["magnum/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["magnum/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["magnum/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d'authentification.
";
$elem["magnum/admin-tenant-name"]["default"]="admin";
$elem["magnum/admin-user"]["type"]="string";
$elem["magnum/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["magnum/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["magnum/admin-user"]["descriptionfr"]="Nom d'utilisateur pour le serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["magnum/admin-user"]["default"]="admin";
$elem["magnum/admin-password"]["type"]="password";
$elem["magnum/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["magnum/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, der für den Authentifizierungsserver benutzt wird.
";
$elem["magnum/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["magnum/admin-password"]["default"]="";
$elem["magnum/rabbit_host"]["type"]="string";
$elem["magnum/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["magnum/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["magnum/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["magnum/rabbit_host"]["default"]="localhost";
$elem["magnum/rabbit_userid"]["type"]="string";
$elem["magnum/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["magnum/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["magnum/rabbit_userid"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["magnum/rabbit_userid"]["default"]="guest";
$elem["magnum/rabbit_password"]["type"]="password";
$elem["magnum/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["magnum/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["magnum/rabbit_password"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["magnum/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
