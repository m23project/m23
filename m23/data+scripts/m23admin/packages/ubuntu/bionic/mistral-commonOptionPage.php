<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mistral-common");

$elem["mistral/configure_db"]["type"]="boolean";
$elem["mistral/configure_db"]["description"]="Set up a database for this package?
 No database has been set up for this package. Before continuing, you should
 make sure you have the following information:
 .
  * the type of database that you want to use - generally the MySQL backend
    (which is compatible with MariaDB) is a good choice, and other
    implementations like PostgreSQL or SQLite are often problematic with
    OpenStack (this depends on the service);
  * the database server hostname (that server must allow TCP connections from
    this machine);
  * a username and password to access the database.
 .
 Note that if you plan on using a remote database server, you must first
 configure dbconfig-common to do so (using dpkg-reconfigure dbconfig-common),
 and the remote database server needs to be configured with adequate
 credentials.
 .
 If some of these requirements are missing, do not choose this option. Run
 with regular SQLite support instead.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow\".

";
$elem["mistral/configure_db"]["descriptionde"]="";
$elem["mistral/configure_db"]["descriptionfr"]="";
$elem["mistral/configure_db"]["default"]="false";
$elem["mistral/configure_rabbit"]["type"]="boolean";
$elem["mistral/configure_rabbit"]["description"]="Configure RabbitMQ access with debconf?
 OpenStack services need access to a message queue server, defined by the
 transport_url directive. Please specify whether configuring this should be
 handled through debconf.
 .
 Only access to RabbitMQ is handled, and the RabbitMQ user creation isn't
 performed. A new RabbitMQ user can be created with the commands:\"
 .
  - rabbitmqctl add_user openstack PASSWORD
  - rabbitmqctl set_permissions -p / openstack \".*\" \".*\" \".*\"
 .
 Note that the default RabbitMQ guest account cannot be used for remote
 connections.

";
$elem["mistral/configure_rabbit"]["descriptionde"]="";
$elem["mistral/configure_rabbit"]["descriptionfr"]="";
$elem["mistral/configure_rabbit"]["default"]="false";
$elem["mistral/rabbit-host"]["type"]="string";
$elem["mistral/rabbit-host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["mistral/rabbit-host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["mistral/rabbit-host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["mistral/rabbit-host"]["default"]="localhost";
$elem["mistral/rabbit-userid"]["type"]="string";
$elem["mistral/rabbit-userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to that RabbitMQ server.

";
$elem["mistral/rabbit-userid"]["descriptionde"]="";
$elem["mistral/rabbit-userid"]["descriptionfr"]="";
$elem["mistral/rabbit-userid"]["default"]="guest";
$elem["mistral/rabbit-password"]["type"]="password";
$elem["mistral/rabbit-password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to that RabbitMQ server.

";
$elem["mistral/rabbit-password"]["descriptionde"]="";
$elem["mistral/rabbit-password"]["descriptionfr"]="";
$elem["mistral/rabbit-password"]["default"]="";
$elem["mistral/configure_ksat"]["type"]="boolean";
$elem["mistral/configure_ksat"]["description"]="Manage keystone_authtoken with debconf?
 Every OpenStack service must contact Keystone, and this is configured through
 the [keystone_authtoken] section of the configuration. Specify if you wish to
 handle this configuration through debconf.
";
$elem["mistral/configure_ksat"]["descriptionde"]="Soll »keystone_authtoken« mit Debconf verwaltet werden?
 Jeder OpenStack-Dienst muss Keystone kontaktieren. Dies wird über den Abschnitt [keystone_authtoken] der Konfiguration eingerichtet. Geben Sie an, ob Sie diese Konfiguration durch Debconf handhaben wollen.
";
$elem["mistral/configure_ksat"]["descriptionfr"]="";
$elem["mistral/configure_ksat"]["default"]="false";
$elem["mistral/ksat-public-url"]["type"]="string";
$elem["mistral/ksat-public-url"]["description"]="Auth server public endpoint URL:
 Specify the URL of your Keystone authentication server public endpoint. This
 value will be set in the www_authenticate_uri directive.

";
$elem["mistral/ksat-public-url"]["descriptionde"]="";
$elem["mistral/ksat-public-url"]["descriptionfr"]="";
$elem["mistral/ksat-public-url"]["default"]="http://localhost:5000";
$elem["mistral/ksat-admin-url"]["type"]="string";
$elem["mistral/ksat-admin-url"]["description"]="Auth server admin endpoint URL:
 Specify the URL of your Keystone authentication server admin endpoint. This
 value will be set in auth_url.

";
$elem["mistral/ksat-admin-url"]["descriptionde"]="";
$elem["mistral/ksat-admin-url"]["descriptionfr"]="";
$elem["mistral/ksat-admin-url"]["default"]="http://localhost:35357";
$elem["mistral/ksat-region"]["type"]="string";
$elem["mistral/ksat-region"]["description"]="Keystone region:
 Specify the Keystone region to use.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.

";
$elem["mistral/ksat-region"]["descriptionde"]="";
$elem["mistral/ksat-region"]["descriptionfr"]="";
$elem["mistral/ksat-region"]["default"]="regionOne";
$elem["mistral/ksat-create-service-user"]["type"]="boolean";
$elem["mistral/ksat-create-service-user"]["description"]="Create service user?
 This package can reuse an already existing username, or create one right now.
 If you wish to create one, then you will be prompted for the admin credentials.

";
$elem["mistral/ksat-create-service-user"]["descriptionde"]="";
$elem["mistral/ksat-create-service-user"]["descriptionfr"]="";
$elem["mistral/ksat-create-service-user"]["default"]="true";
$elem["mistral/ksat-admin-username"]["type"]="string";
$elem["mistral/ksat-admin-username"]["description"]="Auth server admin username:
";
$elem["mistral/ksat-admin-username"]["descriptionde"]="Administratorbenutzername des Authentifizierungsservers:
";
$elem["mistral/ksat-admin-username"]["descriptionfr"]="";
$elem["mistral/ksat-admin-username"]["default"]="admin";
$elem["mistral/ksat-admin-project-name"]["type"]="string";
$elem["mistral/ksat-admin-project-name"]["description"]="Auth server admin project name:
";
$elem["mistral/ksat-admin-project-name"]["descriptionde"]="Administratorprojektname des Authentifizierungsservers:
";
$elem["mistral/ksat-admin-project-name"]["descriptionfr"]="";
$elem["mistral/ksat-admin-project-name"]["default"]="admin";
$elem["mistral/ksat-admin-password"]["type"]="password";
$elem["mistral/ksat-admin-password"]["description"]="Auth server admin password:
";
$elem["mistral/ksat-admin-password"]["descriptionde"]="Administratorpasswort des Authentifizierungsservers:
";
$elem["mistral/ksat-admin-password"]["descriptionfr"]="";
$elem["mistral/ksat-admin-password"]["default"]="";
$elem["mistral/ksat-service-username"]["type"]="string";
$elem["mistral/ksat-service-username"]["description"]="Auth server service username:
";
$elem["mistral/ksat-service-username"]["descriptionde"]="Dienstbenutzername des Authentifizierungsservers:
";
$elem["mistral/ksat-service-username"]["descriptionfr"]="";
$elem["mistral/ksat-service-username"]["default"]="";
$elem["mistral/ksat-service-project-name"]["type"]="string";
$elem["mistral/ksat-service-project-name"]["description"]="Auth server service project name:
";
$elem["mistral/ksat-service-project-name"]["descriptionde"]="Dienstprojektname des Authentifizierungsservers:
";
$elem["mistral/ksat-service-project-name"]["descriptionfr"]="";
$elem["mistral/ksat-service-project-name"]["default"]="service";
$elem["mistral/ksat-service-password"]["type"]="password";
$elem["mistral/ksat-service-password"]["description"]="Auth server service password:
";
$elem["mistral/ksat-service-password"]["descriptionde"]="Dienstpasswort des Authentifizierungsservers:
";
$elem["mistral/ksat-service-password"]["descriptionfr"]="";
$elem["mistral/ksat-service-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
