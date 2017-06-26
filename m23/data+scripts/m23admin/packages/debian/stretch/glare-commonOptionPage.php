<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glare-common");

$elem["glare/configure_db"]["type"]="boolean";
$elem["glare/configure_db"]["description"]="Set up a database for Glare?
 No database has been set up for Glare to use. Before
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
 glare\".
";
$elem["glare/configure_db"]["descriptionde"]="Datenbank für Glare einrichten?
 Für die Benutzung durch Glare wurde keine Datenbank eingerichtet. Bevor Sie fortfahren, sollten Sie sich versichern, dass Sie die folgenden Informationen haben:
 .
  * den Typ der Datenbank, die Sie verwenden möchten
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
    von diesem Rechner erlauben)
  * einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
 .
 Falls einige dieser Anforderungen nicht erfüllt sind, wählen Sie diese Option nicht und verwenden Sie stattdessen die normale Sqlite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow glare« ausführen.
";
$elem["glare/configure_db"]["descriptionfr"]="Installer une base de données pour Glare ?
 Aucune base de données n'a été installée pour Glare. Si vous voulez en installer une maintenant, assurez-vous d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow glare ».
";
$elem["glare/configure_db"]["default"]="false";
$elem["glare/auth-host"]["type"]="string";
$elem["glare/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["glare/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["glare/auth-host"]["descriptionfr"]="
 Veuillez indiquer le nom d'hôte du serveur d'authentification. En général il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["glare/auth-host"]["default"]="127.0.0.1";
$elem["glare/admin-tenant-name"]["type"]="string";
$elem["glare/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["glare/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["glare/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d’authentification.
";
$elem["glare/admin-tenant-name"]["default"]="admin";
$elem["glare/admin-user"]["type"]="string";
$elem["glare/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["glare/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["glare/admin-user"]["descriptionfr"]="
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["glare/admin-user"]["default"]="admin";
$elem["glare/admin-password"]["type"]="password";
$elem["glare/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["glare/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["glare/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["glare/admin-password"]["default"]="";
$elem["glare/rabbit_host"]["type"]="string";
$elem["glare/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["glare/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["glare/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["glare/rabbit_host"]["default"]="localhost";
$elem["glare/rabbit_userid"]["type"]="string";
$elem["glare/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["glare/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["glare/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["glare/rabbit_userid"]["default"]="guest";
$elem["glare/rabbit_password"]["type"]="password";
$elem["glare/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["glare/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["glare/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec les autres composants d'OpenStack, ce paquet a besoin de se connecter à un serveur central RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["glare/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
