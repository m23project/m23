<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("murano-common");

$elem["murano/configure_db"]["type"]="boolean";
$elem["murano/configure_db"]["description"]="Set up a database for Murano?
 No database has been set up for Murano to use. Before
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
 murano-common\".
";
$elem["murano/configure_db"]["descriptionde"]="";
$elem["murano/configure_db"]["descriptionfr"]="Installer une base de données pour Murano ?
 Aucune base de données n'a été installée pour Murano. Si vous voulez en installer une maintenant, assurez-vous d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow murano-common ».
";
$elem["murano/configure_db"]["default"]="false";
$elem["murano/auth-host"]["type"]="string";
$elem["murano/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["murano/auth-host"]["descriptionde"]="";
$elem["murano/auth-host"]["descriptionfr"]="
 Veuillez indiquer le nom d'hôte du serveur d'authentification. En général il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["murano/auth-host"]["default"]="127.0.0.1";
$elem["murano/admin-tenant-name"]["type"]="string";
$elem["murano/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["murano/admin-tenant-name"]["descriptionde"]="";
$elem["murano/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d’authentification.
";
$elem["murano/admin-tenant-name"]["default"]="admin";
$elem["murano/admin-user"]["type"]="string";
$elem["murano/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["murano/admin-user"]["descriptionde"]="";
$elem["murano/admin-user"]["descriptionfr"]="
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["murano/admin-user"]["default"]="admin";
$elem["murano/admin-password"]["type"]="password";
$elem["murano/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["murano/admin-password"]["descriptionde"]="";
$elem["murano/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["murano/admin-password"]["default"]="";
$elem["murano/rabbit_host"]["type"]="string";
$elem["murano/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["murano/rabbit_host"]["descriptionde"]="";
$elem["murano/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["murano/rabbit_host"]["default"]="localhost";
$elem["murano/rabbit_userid"]["type"]="string";
$elem["murano/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["murano/rabbit_userid"]["descriptionde"]="";
$elem["murano/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["murano/rabbit_userid"]["default"]="guest";
$elem["murano/rabbit_password"]["type"]="password";
$elem["murano/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["murano/rabbit_password"]["descriptionde"]="";
$elem["murano/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["murano/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
