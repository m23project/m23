<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("trove-common");

$elem["trove/configure_db"]["type"]="boolean";
$elem["trove/configure_db"]["description"]="Set up a database for Trove?
 No database has been set up for trove to use. Before continuing, you should
 make sure you have the following information:
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
 trove-common\".
";
$elem["trove/configure_db"]["descriptionde"]="Eine Datenbank für Trove einrichten?
 Es wurde keine Datenbank für die Benutzung mit Trove eingerichtet. Bevor Sie fortfahren, sollten Sie sicherstellen, dass Sie die folgenden Informationen haben:
 .
  * den Datenbanktyp, den Sie verwenden möchten,
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
    von diesem Rechner erlauben),
  * einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
 .
 Falls einige dieser Anforderungen nicht erfüllt sind, wählen Sie diese Option nicht und verwenden Sie stattdessen die reguläre Sqlite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow trove-common« ausführen.
";
$elem["trove/configure_db"]["descriptionfr"]="Paramétrer une base de données pour Trove ?
 Aucune base de données n'a été paramétrée pour Trove. Avant de continuer, assurez vous de disposer des informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder
    à cette base de données.   
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow trove-common ».
";
$elem["trove/configure_db"]["default"]="false";
$elem["trove/auth-host"]["type"]="string";
$elem["trove/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Trove. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["trove/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Authentifizierungsservers für Trove an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["trove/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification pour Trove. En général, il s'agit également du nom d'hôte du Service d'Identité d'OpenStack (Keystone).
";
$elem["trove/auth-host"]["default"]="127.0.0.1";
$elem["trove/admin-tenant-name"]["type"]="string";
$elem["trove/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["trove/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["trove/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom d'espace client du serveur d'authentification.
";
$elem["trove/admin-tenant-name"]["default"]="admin";
$elem["trove/admin-user"]["type"]="string";
$elem["trove/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["trove/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen des Authentifizierungsservers an.
";
$elem["trove/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["trove/admin-user"]["default"]="admin";
$elem["trove/admin-password"]["type"]="password";
$elem["trove/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["trove/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort des Authentifizierungsservers an.
";
$elem["trove/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["trove/admin-password"]["default"]="";
$elem["trove/rabbit_host"]["type"]="string";
$elem["trove/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["trove/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Servers:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["trove/rabbit_host"]["descriptionfr"]="";
$elem["trove/rabbit_host"]["default"]="localhost";
$elem["trove/rabbit_userid"]["type"]="string";
$elem["trove/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["trove/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["trove/rabbit_userid"]["descriptionfr"]="";
$elem["trove/rabbit_userid"]["default"]="guest";
$elem["trove/rabbit_password"]["type"]="password";
$elem["trove/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["trove/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["trove/rabbit_password"]["descriptionfr"]="";
$elem["trove/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
