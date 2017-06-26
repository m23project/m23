<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ceilometer-common");

$elem["ceilometer/configure_db"]["type"]="boolean";
$elem["ceilometer/configure_db"]["description"]="Perform automatic dbsync for Ceilometer?
 Ceilometer can automatically run ceilometer-dbsync after installation. For it
 to work, you need an up and running mongodb-server.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 ceilometer\".
";
$elem["ceilometer/configure_db"]["descriptionde"]="";
$elem["ceilometer/configure_db"]["descriptionfr"]="Exécuter dbsync automatiquement pour Ceilometer ?
 Ceilometer peut exécuter automatiquement ceilometer-dbsync après l'installation. Pour que cela soit possible, mongodb-server doit être préalablement installé et configuré
 .
 Vous pouvez changer ce réglage plus tard avec la commande « dpkg-reconfigure -plow ceilometer ».
";
$elem["ceilometer/configure_db"]["default"]="false";
$elem["ceilometer/rabbit_host"]["type"]="string";
$elem["ceilometer/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["ceilometer/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Geben Sie bitte die IP-Adresse dieses Servers an.
";
$elem["ceilometer/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["ceilometer/rabbit_host"]["default"]="localhost";
$elem["ceilometer/rabbit_userid"]["type"]="string";
$elem["ceilometer/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["ceilometer/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["ceilometer/rabbit_userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["ceilometer/rabbit_userid"]["default"]="guest";
$elem["ceilometer/rabbit_password"]["type"]="password";
$elem["ceilometer/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["ceilometer/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["ceilometer/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["ceilometer/rabbit_password"]["default"]="";
$elem["ceilometer/auth-host"]["type"]="string";
$elem["ceilometer/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Ceilometer.
 Typically this is also the hostname of the OpenStack Identity Service
 (Keystone).
";
$elem["ceilometer/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen Ihres Ceilometer-Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["ceilometer/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification pour Ceilometer. En général, il s'agit également du nom d'hôte du Service d'Identité d'OpenStack (Keystone).
";
$elem["ceilometer/auth-host"]["default"]="127.0.0.1";
$elem["ceilometer/admin-tenant-name"]["type"]="string";
$elem["ceilometer/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["ceilometer/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["ceilometer/admin-tenant-name"]["descriptionfr"]="Nom du serveur d'authentification pour l'espace client :
 Veuillez indiquer le serveur d'authentification pour l'espace client.
";
$elem["ceilometer/admin-tenant-name"]["default"]="admin";
$elem["ceilometer/admin-user"]["type"]="string";
$elem["ceilometer/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["ceilometer/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["ceilometer/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser pour le serveur d'authentification.
";
$elem["ceilometer/admin-user"]["default"]="admin";
$elem["ceilometer/admin-password"]["type"]="password";
$elem["ceilometer/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["ceilometer/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["ceilometer/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser pour le serveur d'authentification.
";
$elem["ceilometer/admin-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
