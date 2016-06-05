<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("heat-common");

$elem["heat/auth-host"]["type"]="string";
$elem["heat/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["heat/auth-host"]["descriptionde"]="Name des Authentifizierungsservers:
 Geben Sie bitte den Namen des Authentifizierungsservers an. Normalerweise ist das auch der Name des OpenStack-Identitätsdienstes (Keystone).
";
$elem["heat/auth-host"]["descriptionfr"]="
 Veuillez indiquer l'adresse URL du serveur d'authentification. En général, c'est également le nom d'hôte du Service d'Identité d'OpenStack (Keystone).
";
$elem["heat/auth-host"]["default"]="127.0.0.1";
$elem["heat/admin-tenant-name"]["type"]="string";
$elem["heat/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["heat/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["heat/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom d'espace client du serveur d'authentification :
";
$elem["heat/admin-tenant-name"]["default"]="admin";
$elem["heat/admin-user"]["type"]="string";
$elem["heat/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["heat/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["heat/admin-user"]["descriptionfr"]="
 Veuillez indiquer le nom d'utilisateur pour le serveur d'authentification.
";
$elem["heat/admin-user"]["default"]="admin";
$elem["heat/admin-password"]["type"]="password";
$elem["heat/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["heat/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["heat/admin-password"]["descriptionfr"]="
 Veuillez indiquer le mot de passe pour le serveur d'authentification.
";
$elem["heat/admin-password"]["default"]="";
$elem["heat/register-endpoint"]["type"]="boolean";
$elem["heat/register-endpoint"]["description"]="Register Heat in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["heat/register-endpoint"]["descriptionde"]="Heat im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen laufenden Keystone-Server benötigen, mit dem Sie sich unter Nutzung des Keystone-Authentifizierungs-Tokens verbinden können.
";
$elem["heat/register-endpoint"]["descriptionfr"]="Enregistrer Heat dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter en utilisant le jeton d'authentification Keystone.
";
$elem["heat/register-endpoint"]["default"]="false";
$elem["heat/keystone-ip"]["type"]="string";
$elem["heat/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that heat-api can
 contact Keystone to do the Heat service and endpoint creation.
";
$elem["heat/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Geben Sie bitte die IP-Adresse des Keystone-Servers an, damit Heat-api Keystone kontaktieren kann, um den Heat-Dienst und -Endpunkt zu erstellen.
";
$elem["heat/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Heat puisse contacter Keystone pour établir le service Heat et créer un point d'accès.
";
$elem["heat/keystone-ip"]["default"]="";
$elem["heat/keystone-auth-token"]["type"]="password";
$elem["heat/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, heat-api needs the Keystone
 authentication token.
";
$elem["heat/keystone-auth-token"]["descriptionde"]="Keystone-Authentifizierungs-Token:
 Um seinen Keystone-Endpunkt einzurichten, benötigt Heat-api das Keystone-Authentifizierungs-Token.
";
$elem["heat/keystone-auth-token"]["descriptionfr"]="
 Pour configurer son point d'accès dans Keystone, l'api de Heat a besoin du jeton d'authentification Keystone.
";
$elem["heat/keystone-auth-token"]["default"]="";
$elem["heat/endpoint-ip"]["type"]="string";
$elem["heat/endpoint-ip"]["description"]="Heat endpoint IP address:
 Please enter the IP address that will be used to contact Heat.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["heat/endpoint-ip"]["descriptionde"]="IP-Adresse des Heat-Endpunkts:
 Geben Sie bitte die IP-Adresse an, die für den Kontakt mit Heat genutzt wird.
 .
 Diese IP-Adresse sollte von den Clients erreichbar sein, die diesen Dienst nutzen. Falls Sie eine öffentliche Cloud installieren, sollte dies eine öffentliche IP-Adresse sein.
";
$elem["heat/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Heat.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["heat/endpoint-ip"]["default"]="";
$elem["heat/region-name"]["type"]="string";
$elem["heat/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["heat/region-name"]["descriptionde"]="Name der zu registrierenden Region:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, in denen jede Region einen Ort darstellt. Geben Sie bitte die Zone an, die Sie bei der Registrierung des Endpunkts verwenden wollen.
";
$elem["heat/region-name"]["descriptionfr"]="
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["heat/region-name"]["default"]="regionOne";
$elem["heat/configure_db"]["type"]="boolean";
$elem["heat/configure_db"]["description"]="Set up a database for heat-common?
 No database has been set up for heat-common to use. Before
 continuing, you should make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server host name (that server must allow TCP connections from this
    machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run with
 regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 heat-common\".
";
$elem["heat/configure_db"]["descriptionde"]="Datenbank für Heat-common einrichten?
 Es wurde keine Datenbank für die Nutzung durch Heat-common eingerichtet. Bevor Sie fortfahren, sollten Sie sicherstellen, dass Sie über die folgenden Informationen verfügen:
 .
  * den Typ der Datenbank, die Sie nutzen wollen;
  * den Namen des Rechners, auf dem der Datenbankserver läuft (der
    Datenbankserver muss TCP-Verbindungen von dieser Maschine zulassen);
  * einen Benutzernamen und ein Passwort für den Zugriff auf die Datenbank.
 .
 Wenn ein Teil dieser Voraussetzungen nicht erfüllt ist, wählen Sie diese Option nicht und lassen Sie das Programm mit der normalen Unterstützung für SQLite laufen.
 .
 Sie können diese Einstellung nachträglich mit dem Befehl »dpkg-reconfigure -plow heat-common« ändern.
";
$elem["heat/configure_db"]["descriptionfr"]="Installer une base de données pour heat-common ?
 Aucune base de données n'a été installée pour heat-common. Avant de continuer, assurez-vous d'avoir toutes les informations nécessaires :
 .
  - le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (qui doit
     autoriser les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder
     à la base de données.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow heat-common ».
";
$elem["heat/configure_db"]["default"]="false";
$elem["heat/rabbit_host"]["type"]="string";
$elem["heat/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["heat/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Geben Sie bitte die IP-Adresse dieses Servers an.
";
$elem["heat/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["heat/rabbit_host"]["default"]="localhost";
$elem["heat/rabbit_userid"]["type"]="string";
$elem["heat/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["heat/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["heat/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur pour se connecter au serveur RabbitMQ.
";
$elem["heat/rabbit_userid"]["default"]="guest";
$elem["heat/rabbit_password"]["type"]="password";
$elem["heat/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["heat/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["heat/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe pour se connecter au serveur RabbitMQ.
";
$elem["heat/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
