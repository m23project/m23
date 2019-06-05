<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cloudkitty-common");

$elem["cloudkitty/configure_db"]["type"]="boolean";
$elem["cloudkitty/configure_db"]["description"]="Set up a database for this package?
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
$elem["cloudkitty/configure_db"]["descriptionde"]="";
$elem["cloudkitty/configure_db"]["descriptionfr"]="";
$elem["cloudkitty/configure_db"]["default"]="false";
$elem["cloudkitty/configure_rabbit"]["type"]="boolean";
$elem["cloudkitty/configure_rabbit"]["description"]="Configure RabbitMQ access with debconf?
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
$elem["cloudkitty/configure_rabbit"]["descriptionde"]="";
$elem["cloudkitty/configure_rabbit"]["descriptionfr"]="";
$elem["cloudkitty/configure_rabbit"]["default"]="false";
$elem["cloudkitty/rabbit-host"]["type"]="string";
$elem["cloudkitty/rabbit-host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["cloudkitty/rabbit-host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["cloudkitty/rabbit-host"]["descriptionfr"]="Adresse IP de votre hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["cloudkitty/rabbit-host"]["default"]="localhost";
$elem["cloudkitty/rabbit-userid"]["type"]="string";
$elem["cloudkitty/rabbit-userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to that RabbitMQ server.
";
$elem["cloudkitty/rabbit-userid"]["descriptionde"]="";
$elem["cloudkitty/rabbit-userid"]["descriptionfr"]="";
$elem["cloudkitty/rabbit-userid"]["default"]="guest";
$elem["cloudkitty/rabbit-password"]["type"]="password";
$elem["cloudkitty/rabbit-password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to that RabbitMQ server.
";
$elem["cloudkitty/rabbit-password"]["descriptionde"]="";
$elem["cloudkitty/rabbit-password"]["descriptionfr"]="";
$elem["cloudkitty/rabbit-password"]["default"]="";
$elem["cloudkitty/configure_ksat"]["type"]="boolean";
$elem["cloudkitty/configure_ksat"]["description"]="Manage keystone_authtoken with debconf?
 Every OpenStack service must contact Keystone, and this is configured through
 the [keystone_authtoken] section of the configuration. Specify if you wish to
 handle this configuration through debconf.
";
$elem["cloudkitty/configure_ksat"]["descriptionde"]="Soll »keystone_authtoken« mit Debconf verwaltet werden?
 Jeder OpenStack-Dienst muss Keystone kontaktieren. Dies wird über den Abschnitt [keystone_authtoken] der Konfiguration eingerichtet. Geben Sie an, ob Sie diese Konfiguration durch Debconf handhaben wollen.
";
$elem["cloudkitty/configure_ksat"]["descriptionfr"]="";
$elem["cloudkitty/configure_ksat"]["default"]="false";
$elem["cloudkitty/ksat-public-url"]["type"]="string";
$elem["cloudkitty/ksat-public-url"]["description"]="Auth server public endpoint URL:
 Specify the URL of your Keystone authentication server public endpoint. This
 value will be set in the www_authenticate_uri directive.
";
$elem["cloudkitty/ksat-public-url"]["descriptionde"]="";
$elem["cloudkitty/ksat-public-url"]["descriptionfr"]="";
$elem["cloudkitty/ksat-public-url"]["default"]="http://localhost:5000";
$elem["cloudkitty/ksat-admin-url"]["type"]="string";
$elem["cloudkitty/ksat-admin-url"]["description"]="Auth server admin endpoint URL:
 Specify the URL of your Keystone authentication server admin endpoint. This
 value will be set in auth_url.
";
$elem["cloudkitty/ksat-admin-url"]["descriptionde"]="";
$elem["cloudkitty/ksat-admin-url"]["descriptionfr"]="";
$elem["cloudkitty/ksat-admin-url"]["default"]="http://localhost:35357";
$elem["cloudkitty/ksat-region"]["type"]="string";
$elem["cloudkitty/ksat-region"]["description"]="Keystone region:
 Specify the Keystone region to use.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
";
$elem["cloudkitty/ksat-region"]["descriptionde"]="";
$elem["cloudkitty/ksat-region"]["descriptionfr"]="";
$elem["cloudkitty/ksat-region"]["default"]="regionOne";
$elem["cloudkitty/ksat-create-service-user"]["type"]="boolean";
$elem["cloudkitty/ksat-create-service-user"]["description"]="Create service user?
 This package can reuse an already existing username, or create one right now.
 If you wish to create one, then you will be prompted for the admin credentials.
";
$elem["cloudkitty/ksat-create-service-user"]["descriptionde"]="";
$elem["cloudkitty/ksat-create-service-user"]["descriptionfr"]="";
$elem["cloudkitty/ksat-create-service-user"]["default"]="true";
$elem["cloudkitty/ksat-admin-username"]["type"]="string";
$elem["cloudkitty/ksat-admin-username"]["description"]="Auth server admin username:
";
$elem["cloudkitty/ksat-admin-username"]["descriptionde"]="Administratorbenutzername des Authentifizierungsservers:
";
$elem["cloudkitty/ksat-admin-username"]["descriptionfr"]="";
$elem["cloudkitty/ksat-admin-username"]["default"]="admin";
$elem["cloudkitty/ksat-admin-project-name"]["type"]="string";
$elem["cloudkitty/ksat-admin-project-name"]["description"]="Auth server admin project name:
";
$elem["cloudkitty/ksat-admin-project-name"]["descriptionde"]="Administratorprojektname des Authentifizierungsservers:
";
$elem["cloudkitty/ksat-admin-project-name"]["descriptionfr"]="";
$elem["cloudkitty/ksat-admin-project-name"]["default"]="admin";
$elem["cloudkitty/ksat-admin-password"]["type"]="password";
$elem["cloudkitty/ksat-admin-password"]["description"]="Auth server admin password:
";
$elem["cloudkitty/ksat-admin-password"]["descriptionde"]="Administratorpasswort des Authentifizierungsservers:
";
$elem["cloudkitty/ksat-admin-password"]["descriptionfr"]="";
$elem["cloudkitty/ksat-admin-password"]["default"]="";
$elem["cloudkitty/ksat-service-username"]["type"]="string";
$elem["cloudkitty/ksat-service-username"]["description"]="Auth server service username:
";
$elem["cloudkitty/ksat-service-username"]["descriptionde"]="Dienstbenutzername des Authentifizierungsservers:
";
$elem["cloudkitty/ksat-service-username"]["descriptionfr"]="";
$elem["cloudkitty/ksat-service-username"]["default"]="";
$elem["cloudkitty/ksat-service-project-name"]["type"]="string";
$elem["cloudkitty/ksat-service-project-name"]["description"]="Auth server service project name:
";
$elem["cloudkitty/ksat-service-project-name"]["descriptionde"]="Dienstprojektname des Authentifizierungsservers:
";
$elem["cloudkitty/ksat-service-project-name"]["descriptionfr"]="";
$elem["cloudkitty/ksat-service-project-name"]["default"]="service";
$elem["cloudkitty/ksat-service-password"]["type"]="password";
$elem["cloudkitty/ksat-service-password"]["description"]="Auth server service password:
";
$elem["cloudkitty/ksat-service-password"]["descriptionde"]="Dienstpasswort des Authentifizierungsservers:
";
$elem["cloudkitty/ksat-service-password"]["descriptionfr"]="";
$elem["cloudkitty/ksat-service-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
