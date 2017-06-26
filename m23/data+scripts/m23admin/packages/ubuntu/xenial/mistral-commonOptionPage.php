<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mistral-common");

$elem["mistral/configure_db"]["type"]="boolean";
$elem["mistral/configure_db"]["description"]="Set up a database for Mistral?
 No database has been set up for Mistral to use. Before
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
 mistral-common\".
";
$elem["mistral/configure_db"]["descriptionde"]="";
$elem["mistral/configure_db"]["descriptionfr"]="";
$elem["mistral/configure_db"]["default"]="false";
$elem["mistral/auth-host"]["type"]="string";
$elem["mistral/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["mistral/auth-host"]["descriptionde"]="";
$elem["mistral/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte du serveur d'authentification. Habituellement, c'est également le nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["mistral/auth-host"]["default"]="127.0.0.1";
$elem["mistral/admin-tenant-name"]["type"]="string";
$elem["mistral/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["mistral/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["mistral/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d'authentification.
";
$elem["mistral/admin-tenant-name"]["default"]="admin";
$elem["mistral/admin-user"]["type"]="string";
$elem["mistral/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["mistral/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["mistral/admin-user"]["descriptionfr"]="Nom d'utilisateur pour le serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["mistral/admin-user"]["default"]="admin";
$elem["mistral/admin-password"]["type"]="password";
$elem["mistral/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["mistral/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, der für den Authentifizierungsserver benutzt wird.
";
$elem["mistral/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["mistral/admin-password"]["default"]="";
$elem["mistral/rabbit_host"]["type"]="string";
$elem["mistral/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["mistral/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["mistral/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["mistral/rabbit_host"]["default"]="localhost";
$elem["mistral/rabbit_userid"]["type"]="string";
$elem["mistral/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["mistral/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["mistral/rabbit_userid"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["mistral/rabbit_userid"]["default"]="guest";
$elem["mistral/rabbit_password"]["type"]="password";
$elem["mistral/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["mistral/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["mistral/rabbit_password"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["mistral/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
