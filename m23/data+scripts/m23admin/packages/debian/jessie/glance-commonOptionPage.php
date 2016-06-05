<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glance-common");

$elem["glance/paste-flavor"]["type"]="select";
$elem["glance/paste-flavor"]["choices"][1]="keystone";
$elem["glance/paste-flavor"]["choices"][2]="caching";
$elem["glance/paste-flavor"]["choices"][3]="keystone+caching";
$elem["glance/paste-flavor"]["choices"][4]="cachemanagement";
$elem["glance/paste-flavor"]["choicesde"][1]="Keystone";
$elem["glance/paste-flavor"]["choicesde"][2]="Zwischenspeichern";
$elem["glance/paste-flavor"]["choicesde"][3]="Keystone+Zwischenspeichern";
$elem["glance/paste-flavor"]["choicesde"][4]="Zwischenspeicherverwaltung";
$elem["glance/paste-flavor"]["choicesfr"][1]="keystone";
$elem["glance/paste-flavor"]["choicesfr"][2]="mise en cache";
$elem["glance/paste-flavor"]["choicesfr"][3]="keystone + mise en cache";
$elem["glance/paste-flavor"]["choicesfr"][4]="gestion du cache";
$elem["glance/paste-flavor"]["description"]="Pipeline flavor:
 Please specify the flavor of the pipeline to be used by Glance.
 .
 If you use the OpenStack Identity Service (Keystone), you might want to
 select \"keystone\". If you don't use this service, you can safely choose
 \"caching\" only.
";
$elem["glance/paste-flavor"]["descriptionde"]="Pipeline-Variante:
 Bitte geben Sie die Variante der von Glance zu benutzenden Pipeline an.
 .
 Falls Sie den OpenStack-Identitätsdienst (Keystone) verwenden, möchten Sie möglicherweise »Keystone« auswählen. Falls Sie diesen Dienst nicht nutzen, können Sie problemlos »Zwischenspeichern« auswählen.
";
$elem["glance/paste-flavor"]["descriptionfr"]="Type d'acheminement des paquets :
 Veuillez indiquer le type d'acheminement des paquets que Glance doit utiliser.
 .
 Si vous utilisez le Service d'Identité d'Openstack (Keystone), vous devriez choisir « keystone ». Si vous n'utilisez pas ce service, vous pouvez choisir sereinement « mise en cache » uniquement.
";
$elem["glance/paste-flavor"]["default"]="caching";
$elem["glance/auth-host"]["type"]="string";
$elem["glance/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Glance. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["glance/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Glance-Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["glance/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte de votre serveur d'authentification pour Glance. Typiquement c'est également le nom d'hôte de votre Service d'Identité OpenStack (Keystone).
";
$elem["glance/auth-host"]["default"]="127.0.0.1";
$elem["glance/admin-tenant-name"]["type"]="string";
$elem["glance/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["glance/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["glance/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d'authentification.
";
$elem["glance/admin-tenant-name"]["default"]="admin";
$elem["glance/admin-user"]["type"]="string";
$elem["glance/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["glance/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["glance/admin-user"]["descriptionfr"]="Nom d'utilisateur pour le serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["glance/admin-user"]["default"]="admin";
$elem["glance/admin-password"]["type"]="password";
$elem["glance/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["glance/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, der für den Authentifizierungsserver benutzt wird.
";
$elem["glance/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["glance/admin-password"]["default"]="";
$elem["glance/configure_db"]["type"]="boolean";
$elem["glance/configure_db"]["description"]="Set up a database for Glance?
 No database has been set up for glance-registry or glance-api to use. Before
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
 glance-common\".
";
$elem["glance/configure_db"]["descriptionde"]="Eine Datenbank für Glance einrichten?
 Es wurde keine Datenbank für die Benutzung mit der Glance-Registry oder das Glance-API eingerichtet. Bevor Sie fortfahren, sollten Sie sicherstellen, dass Sie die folgenden Informationen haben:
 .
  * einen Datenbanktyp, den Sie verwenden möchten
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
    von diesem Rechner erlauben)
  * einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
 .
 Falls einige dieser Anforderungen nicht erfüllt sind, wählen Sie diese Option nicht und verwenden Sie stattdessen die reguläre Sqlite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow glance-common« ausführen.
";
$elem["glance/configure_db"]["descriptionfr"]="Installer une base de données pour Glance ?
 Aucune base de données n'a été installée pour le registre de glance ou pour l'API de Glance. Avant de continuer, assurez vous d'avoir :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine);
  - un nom d'utilisateur et un mot de passe pour accéder
    à cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorer cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow glance-common ».
";
$elem["glance/configure_db"]["default"]="false";
$elem["glance/rabbit_host"]["type"]="string";
$elem["glance/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["glance/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["glance/rabbit_host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["glance/rabbit_host"]["default"]="localhost";
$elem["glance/rabbit_userid"]["type"]="string";
$elem["glance/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["glance/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["glance/rabbit_userid"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["glance/rabbit_userid"]["default"]="guest";
$elem["glance/rabbit_password"]["type"]="password";
$elem["glance/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["glance/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["glance/rabbit_password"]["descriptionfr"]="
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["glance/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
