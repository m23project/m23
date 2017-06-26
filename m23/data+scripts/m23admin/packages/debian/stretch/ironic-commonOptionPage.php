<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ironic-common");

$elem["ironic/configure_db"]["type"]="boolean";
$elem["ironic/configure_db"]["description"]="Set up a database for Ironic?
 No database has been set up for Ironic to use. Before continuing, you should
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
 ironic-common\".
";
$elem["ironic/configure_db"]["descriptionde"]="Soll eine Datenbank für Ironic angelegt werden?
 Es wurde noch keine Datenbank für Ironic angelegt. Bevor Sie fortsetzen, sollten Sie sicherstellen, dass Sie über die folgenden Informationen verfügen:
 .
  * den Typ der zu verwendenden Datenbank;
  * den Rechnernamen des Datenbankservers (der Server muss TCP-Verbindungen
    von diesem Rechner aus erlauben);
  * einen Benutzernamen und ein Passwort zum Zugriff auf die Datenbank.
 .
 Falls eine dieser Voraussetzungen fehlt, wählen Sie diese Option nicht und benutzen Sie die reguläre SQLite-Unterstützung.
 .
 Sie können diese Einstellung später mit dem Befehl »dpkg-reconfigure -plow ironic-common« ändern.
";
$elem["ironic/configure_db"]["descriptionfr"]="Faut-il paramétrer une base de données pour Ironic ?
 Aucune base de données n'a été paramétrée pour Ironic. Avant de poursuivre, vous devriez vous assurer d'avoir les informations suivantes :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.     
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec la gestion SQLite normale.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow ironic-common ».
";
$elem["ironic/configure_db"]["default"]="false";
$elem["ironic/rabbit_host"]["type"]="string";
$elem["ironic/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["ironic/rabbit_host"]["descriptionde"]="";
$elem["ironic/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["ironic/rabbit_host"]["default"]="localhost";
$elem["ironic/rabbit_userid"]["type"]="string";
$elem["ironic/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["ironic/rabbit_userid"]["descriptionde"]="";
$elem["ironic/rabbit_userid"]["descriptionfr"]="Identifiant pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'identifiant à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["ironic/rabbit_userid"]["default"]="guest";
$elem["ironic/rabbit_password"]["type"]="password";
$elem["ironic/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["ironic/rabbit_password"]["descriptionde"]="";
$elem["ironic/rabbit_password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["ironic/rabbit_password"]["default"]="";
$elem["ironic/auth-host"]["type"]="string";
$elem["ironic/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["ironic/auth-host"]["descriptionde"]="";
$elem["ironic/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification Neutron. En général, il s'agit également du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["ironic/auth-host"]["default"]="127.0.0.1";
$elem["ironic/admin-tenant-name"]["type"]="string";
$elem["ironic/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["ironic/admin-tenant-name"]["descriptionde"]="";
$elem["ironic/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom d'espace client du serveur d'authentification.
";
$elem["ironic/admin-tenant-name"]["default"]="admin";
$elem["ironic/admin-user"]["type"]="string";
$elem["ironic/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["ironic/admin-user"]["descriptionde"]="";
$elem["ironic/admin-user"]["descriptionfr"]="Identifiant sur le serveur d'authentification :
 Veuillez indiquer l'identifiant à utiliser sur le serveur d'authentification.
";
$elem["ironic/admin-user"]["default"]="admin";
$elem["ironic/admin-password"]["type"]="password";
$elem["ironic/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["ironic/admin-password"]["descriptionde"]="";
$elem["ironic/admin-password"]["descriptionfr"]="Mot de passe sur le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["ironic/admin-password"]["default"]="";
$elem["ironic/enabled_drivers"]["type"]="multiselect";
$elem["ironic/enabled_drivers"]["choices"][1]="pxe_ipmitool";
$elem["ironic/enabled_drivers"]["choices"][2]="pxe_ipminative";
$elem["ironic/enabled_drivers"]["choices"][3]="pxe_ssh";
$elem["ironic/enabled_drivers"]["choices"][4]="pxe_seamicro";
$elem["ironic/enabled_drivers"]["choices"][5]="pxe_iboot";
$elem["ironic/enabled_drivers"]["choices"][6]="pxe_ilo";
$elem["ironic/enabled_drivers"]["choices"][7]="pxe_drac";
$elem["ironic/enabled_drivers"]["description"]="Please select a list of Ironic drivers for this conductor to enable:
 It is possible to activate multiple drivers per Ironic conductor node to
 manage deployment and power. It is not mandatory to use the same list of
 activated drivers across all of your ironic-conductor nodes.
";
$elem["ironic/enabled_drivers"]["descriptionde"]="";
$elem["ironic/enabled_drivers"]["descriptionfr"]="Pilotes Ironic que ce contrôleur doit activer :
 Il est possible d'activer plusieurs pilotes par nœud contrôleur Ironic pour gérer le déploiement et la puissance. La liste de pilotes activés peut être différente d'un nœud contrôleur Ironic à l'autre.
";
$elem["ironic/enabled_drivers"]["default"]="pxe_ipmitool";
PKG_OptionPageTail2($elem);
?>
