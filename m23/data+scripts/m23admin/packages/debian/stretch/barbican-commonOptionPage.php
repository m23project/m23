<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("barbican-common");

$elem["barbican/configure_db"]["type"]="boolean";
$elem["barbican/configure_db"]["description"]="Set up a database for Barbican?
 No database has been set up for Barbican to use. Before
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
 barbican-common\".
";
$elem["barbican/configure_db"]["descriptionde"]="Datenbank für Barbican einrichten?
 Für die Benutzung durch Barbican wurde keine Datenbank eingerichtet. Bevor Sie fortfahren, sollten Sie sicherstellen, dass Sie über die folgenden Informationen verfügen:
 .
  * den Typ der Datenbank, die Sie verwenden möchten
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
    von diesem Rechner erlauben)
  * einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
 .
 Falls einige dieser Anforderungen nicht erfüllt sind, wählen Sie diese Option nicht und verwenden Sie stattdessen die normale Sqlite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow barbican-common« ausführen.
";
$elem["barbican/configure_db"]["descriptionfr"]="Installer une base de données pour Barbican ?
 Aucune base de données n'a été installée pour Barbican. Si vous voulez en installer une maintenant, assurez-vous d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow barbican-common ».
";
$elem["barbican/configure_db"]["default"]="false";
$elem["barbican/auth-host"]["type"]="string";
$elem["barbican/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["barbican/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["barbican/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification. En général, il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["barbican/auth-host"]["default"]="127.0.0.1";
$elem["barbican/admin-tenant-name"]["type"]="string";
$elem["barbican/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["barbican/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["barbican/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d’authentification.
";
$elem["barbican/admin-tenant-name"]["default"]="admin";
$elem["barbican/admin-user"]["type"]="string";
$elem["barbican/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["barbican/admin-user"]["descriptionde"]="Benutzername auf dem Authentifizierungsserver:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["barbican/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["barbican/admin-user"]["default"]="admin";
$elem["barbican/admin-password"]["type"]="password";
$elem["barbican/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["barbican/admin-password"]["descriptionde"]="Passwort auf dem Authentifizierungsserver:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["barbican/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["barbican/admin-password"]["default"]="";
$elem["barbican/rabbit_host"]["type"]="string";
$elem["barbican/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["barbican/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["barbican/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["barbican/rabbit_host"]["default"]="localhost";
$elem["barbican/rabbit_userid"]["type"]="string";
$elem["barbican/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["barbican/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, der zum Verbinden mit dem RabbitMQ-Server verwendet wird.
";
$elem["barbican/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["barbican/rabbit_userid"]["default"]="guest";
$elem["barbican/rabbit_password"]["type"]="password";
$elem["barbican/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["barbican/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das zum Verbinden mit dem RabbitMQ-Server verwendet wird.
";
$elem["barbican/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["barbican/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
