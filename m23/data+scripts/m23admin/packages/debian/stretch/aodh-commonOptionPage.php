<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aodh-common");

$elem["aodh/rabbit_host"]["type"]="string";
$elem["aodh/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["aodh/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["aodh/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["aodh/rabbit_host"]["default"]="localhost";
$elem["aodh/rabbit_userid"]["type"]="string";
$elem["aodh/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["aodh/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["aodh/rabbit_userid"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["aodh/rabbit_userid"]["default"]="guest";
$elem["aodh/rabbit_password"]["type"]="password";
$elem["aodh/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["aodh/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["aodh/rabbit_password"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["aodh/rabbit_password"]["default"]="";
$elem["aodh/auth-host"]["type"]="string";
$elem["aodh/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Aodh.
 Typically this is also the hostname of the OpenStack Identity Service
 (Keystone).
";
$elem["aodh/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Aodh-Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["aodh/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte de votre serveur d'authentification pour Aodh. Typiquement c'est également le nom d'hôte de votre Service d'Identité OpenStack (Keystone).
";
$elem["aodh/auth-host"]["default"]="127.0.0.1";
$elem["aodh/auth-host"]["type"]="string";
$elem["aodh/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Aodh.
 Typically this is also the hostname of the OpenStack Identity Service
 (Keystone).
";
$elem["aodh/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Aodh-Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["aodh/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte de votre serveur d'authentification pour Aodh. Typiquement c'est également le nom d'hôte de votre Service d'Identité OpenStack (Keystone).
";
$elem["aodh/auth-host"]["default"]="127.0.0.1";
$elem["aodh/admin-tenant-name"]["type"]="string";
$elem["aodh/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["aodh/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["aodh/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d'authentification.
";
$elem["aodh/admin-tenant-name"]["default"]="admin";
$elem["aodh/admin-user"]["type"]="string";
$elem["aodh/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["aodh/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["aodh/admin-user"]["descriptionfr"]="Nom d'utilisateur pour le serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["aodh/admin-user"]["default"]="admin";
$elem["aodh/admin-password"]["type"]="password";
$elem["aodh/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["aodh/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, der für den Authentifizierungsserver benutzt wird.
";
$elem["aodh/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["aodh/admin-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
