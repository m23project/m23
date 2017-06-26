<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sahara-common");

$elem["sahara/configure_db"]["type"]="boolean";
$elem["sahara/configure_db"]["description"]="Set up a database for Sahara?
 No database has been set up for Sahara to use. Before
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
 sahara-common\".
";
$elem["sahara/configure_db"]["descriptionde"]="";
$elem["sahara/configure_db"]["descriptionfr"]="Faut-il paramétrer une base de données pour Sahara ?
 Aucune base de données n'a été paramétrée pour Sahara. Avant de poursuivre, vous devriez vous assurer d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.     
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow sahara-common ».
";
$elem["sahara/configure_db"]["default"]="false";
$elem["sahara/auth-host"]["type"]="string";
$elem["sahara/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["sahara/auth-host"]["descriptionde"]="";
$elem["sahara/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification. En général, il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["sahara/auth-host"]["default"]="127.0.0.1";
$elem["sahara/admin-tenant-name"]["type"]="string";
$elem["sahara/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["sahara/admin-tenant-name"]["descriptionde"]="";
$elem["sahara/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom d'espace client du serveur d'authentification.
";
$elem["sahara/admin-tenant-name"]["default"]="admin";
$elem["sahara/admin-user"]["type"]="string";
$elem["sahara/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["sahara/admin-user"]["descriptionde"]="";
$elem["sahara/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["sahara/admin-user"]["default"]="admin";
$elem["sahara/admin-password"]["type"]="password";
$elem["sahara/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["sahara/admin-password"]["descriptionde"]="";
$elem["sahara/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["sahara/admin-password"]["default"]="";
$elem["sahara/rabbit_host"]["type"]="string";
$elem["sahara/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["sahara/rabbit_host"]["descriptionde"]="";
$elem["sahara/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["sahara/rabbit_host"]["default"]="localhost";
$elem["sahara/rabbit_userid"]["type"]="string";
$elem["sahara/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["sahara/rabbit_userid"]["descriptionde"]="";
$elem["sahara/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["sahara/rabbit_userid"]["default"]="guest";
$elem["sahara/rabbit_password"]["type"]="password";
$elem["sahara/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["sahara/rabbit_password"]["descriptionde"]="";
$elem["sahara/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["sahara/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
