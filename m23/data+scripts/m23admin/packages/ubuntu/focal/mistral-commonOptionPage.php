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
$elem["mistral/configure_db"]["descriptionde"]="Eine Datenbank für dieses Paket einrichten?
 Es wurde keine Datenbank für dieses Paket eingerichtet. Sie benötigen folgende Informationen, bevor Sie fortfahren können:
 .
  * der Datenbanktyp, den Sie verwenden möchten – im Allgemeinen ist das
    MySQL-Backend (das mit MariaDB kompatibel ist) eine gute Wahl und andere
    Implementierungen wie PostgeSQL oder SQLite haben oft Probleme mit OpenStack
 (dies hängt vom Dienst ab);
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen
    von diesem Rechner erlauben)
  * einen Benutzernamen und ein Passwort, um auf die Datenbank zuzugreifen
 .
 Falls Sie planen, einen nicht lokalen Datenbankserver zu benutzen, beachten Sie, dass Sie dazu zuerst »dbconfig-common« konfigurieren müssen (mittels »dpkg-reconfigure dbconfig-common«). Der nicht lokale Server muss mit entsprechenden Anmeldedaten konfiguriert werden.
 .
 Falls einige dieser Anforderungen nicht erfüllt sind, wählen Sie diese Option nicht und verwenden Sie stattdessen die reguläre SQLite-Unterstützung.
 .
 Sie können diese Einstellung später ändern, indem Sie »dpkg-reconfigure -plow« ausführen.
";
$elem["mistral/configure_db"]["descriptionfr"]="Voulez-vous installer une base de données pour ce paquet ?
 Aucune base de données n’est configurée pour ce paquet. Avant de continuer, assurez-vous de disposer des informations suivantes :
 .
  — le type de base de données que vous souhaitez utiliser — généralement MySQL (qui est compatible avec MariaDB) est un bon choix, les autres implémentations comme PostgreSQL ou SQLite pouvant souvent être problématiques avec OpenStack (cela dépend du service) ;
  — le nom d'hôte du serveur de base de données (ce serveur doit accepter les connexions TCP depuis cette machine) ;
  — un nom d'utilisateur et un mot de passe pour accéder à cette base de données.
 .
 Notez que si vous souhaitez utiliser un serveur distant, vous devez configurer dbconfig-common pour cela (en exécutant « dpkg-reconfigure dbconfig-common »), et les identifiants du serveur distant doivent être configurés correctement.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option. À la place, exécutez l'application avec la prise en charge standard de SQLite.
 .
 Vous pouvez modifier ce réglage plus tard en exécutant « dpkg-reconfigure -plow ».
";
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
$elem["mistral/configure_rabbit"]["descriptionde"]="Soll der RabbitMQ-Zugriff mit Debconf konfiguriert werden?
 OpenStack-Dienste benötigen Zugriff auf einen Nachrichtenverwaltungsserver, der über die Direktive »transport_url« konfiguriert wird. Bitte geben Sie an, ob Sie diese Konfiguration durch Debconf handhaben wollen.
 .
 Es wird nur der Zugriff auf RabbitMQ behandelt und die RabbitMQ-Benutzererstellung wird nicht durchgeführt. Ein neuer RabbitMQ-Benutzer kann mit folgenden Befehlen erstellt werden:\"
 .
  - rabbitmqctl add_user openstack PASSWORT
  - rabbitmqctl set_permissions -p / openstack \".*\" \".*\" \".*\"
 .
 Beachten Sie, das das Standardgastkonto von RabbitMQ nicht für Fernverbindungen benutzt werden kann.
";
$elem["mistral/configure_rabbit"]["descriptionfr"]="Voulez-vous configurer les accès à RabbitMQ avec les écrans de configuration debconf ?
 Les services d'OpenStack ont besoin d'accéder à un serveur de file d'attente, défini par la directive « transport_url ». Veuillez spécifier si la configuration doit être effectuée avec les écrans de configuration debconf.
 .
 Seul l'accès à RabbitMQ est géré et la création de l'utilisateur RabbitMQ n'est pas effectuée. Un nouvel utilisateur RabbitMQ peut être créé avec les commandes :
 .
  — rabbitmqctl add_user openstack MOT_DE_PASSE
  — rabbitmqctl set_permissions -p / openstack \".*\" \".*\" \".*\"
 .
 Veuillez noter que le compte utilisateur RabbitMQ par défaut ne peut pas être utilisé pour les connexions à distance.
";
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
$elem["mistral/rabbit-userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit diesem RabbitMQ-Server verwenden.
";
$elem["mistral/rabbit-userid"]["descriptionfr"]="Nom d'utilisateur pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le nom d'utilisateur à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["mistral/rabbit-userid"]["default"]="guest";
$elem["mistral/rabbit-password"]["type"]="password";
$elem["mistral/rabbit-password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to that RabbitMQ server.
";
$elem["mistral/rabbit-password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit diesem RabbitMQ-Server verwenden.
";
$elem["mistral/rabbit-password"]["descriptionfr"]="Mot de passe pour la connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ.
";
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
$elem["mistral/configure_ksat"]["descriptionfr"]="Voulez-vous gérer le jeton d'authentification keystone (« keystone_authtoken ») avec les écrans de configuration debconf ?
 Chaque service d'OpenStack doit pouvoir contacter Keystone et cela est configuré au travers de la section de configuration « [keystone_authtoken] ». Veuillez spécifier si vous voulez gérer la configuration avec les écrans de configuration debconf.
";
$elem["mistral/configure_ksat"]["default"]="false";
$elem["mistral/ksat-public-url"]["type"]="string";
$elem["mistral/ksat-public-url"]["description"]="Auth server public endpoint URL:
 Specify the URL of your Keystone authentication server public endpoint. This
 value will be set in the www_authenticate_uri directive.
";
$elem["mistral/ksat-public-url"]["descriptionde"]="Öffentlicher Endpunkt-URL des Authentifizierungsservers:
 Geben Sie den URL Ihres öffentlichen Endpunkts des Keystone-Authentifizierungsservers an. Dieser Wert wird in der Direktive »www_authenticate_uri« gesetzt.
";
$elem["mistral/ksat-public-url"]["descriptionfr"]="Adresse URL du point d'accès public pour le serveur d'authentification :
 Veuillez spécifier l'adresse URL du point d'accès public du serveur d'authentification Keystone. Cette valeur doit être défini dans la directive « www_authenticate_uri ».
";
$elem["mistral/ksat-public-url"]["default"]="http://localhost:5000";
$elem["mistral/ksat-region"]["type"]="string";
$elem["mistral/ksat-region"]["description"]="Keystone region:
 Specify the Keystone region to use.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
";
$elem["mistral/ksat-region"]["descriptionde"]="Keystone-Region:
 Geben Sie die Keystone-Region an, die benutzt werden soll.
 .
 Der Regionsname ist üblicherweise eine Zeichenketten, die nur alphanumerisches ASCII, Punkte und Bindestrichte enthält.
";
$elem["mistral/ksat-region"]["descriptionfr"]="Région Keystone :
 Veuillez spécifier la région Keystone à utiliser.
 .
 Le nom de la région est généralement composé d'une chaîne contenant seulement des caractères alphanumériques ASCII, des points et des tirets.
";
$elem["mistral/ksat-region"]["default"]="regionOne";
$elem["mistral/ksat-create-service-user"]["type"]="boolean";
$elem["mistral/ksat-create-service-user"]["description"]="Create service user?
 This package can reuse an already existing username, or create one right now.
 If you wish to create one, then you will be prompted for the admin credentials.
";
$elem["mistral/ksat-create-service-user"]["descriptionde"]="Dienstbenutzer erstellen?
 Dieses Paket kann einen bereits existierenden Benutzernamen erneut verwenden oder nun einen neuen erstellen. Falls Sie ihn erstellen möchten, werden Sie nach den Administratoranmeldedaten gefragt.
";
$elem["mistral/ksat-create-service-user"]["descriptionfr"]="Voulez-vous créer un utilisateur du service ?
 Ce paquet peut réutiliser un nom d'utilisateur existant ou en créer un maintenant. Si vous souhaitez en créer un, vous serez invité à entrer les données d'authentification de l'administrateur.
";
$elem["mistral/ksat-create-service-user"]["default"]="true";
$elem["mistral/ksat-admin-username"]["type"]="string";
$elem["mistral/ksat-admin-username"]["description"]="Auth server admin username:
";
$elem["mistral/ksat-admin-username"]["descriptionde"]="Administratorbenutzername des Authentifizierungsservers:
";
$elem["mistral/ksat-admin-username"]["descriptionfr"]="Nom d'utilisateur administrateur pour le serveur d'authentification :
";
$elem["mistral/ksat-admin-username"]["default"]="admin";
$elem["mistral/ksat-admin-project-name"]["type"]="string";
$elem["mistral/ksat-admin-project-name"]["description"]="Auth server admin project name:
";
$elem["mistral/ksat-admin-project-name"]["descriptionde"]="Administratorprojektname des Authentifizierungsservers:
";
$elem["mistral/ksat-admin-project-name"]["descriptionfr"]="Nom du projet administrateur pour le serveur d'authentification :
";
$elem["mistral/ksat-admin-project-name"]["default"]="admin";
$elem["mistral/ksat-admin-password"]["type"]="password";
$elem["mistral/ksat-admin-password"]["description"]="Auth server admin password:
";
$elem["mistral/ksat-admin-password"]["descriptionde"]="Administratorpasswort des Authentifizierungsservers:
";
$elem["mistral/ksat-admin-password"]["descriptionfr"]="Mot de passe administrateur pour le serveur d'authentification :
";
$elem["mistral/ksat-admin-password"]["default"]="";
$elem["mistral/ksat-service-username"]["type"]="string";
$elem["mistral/ksat-service-username"]["description"]="Auth server service username:
";
$elem["mistral/ksat-service-username"]["descriptionde"]="Dienstbenutzername des Authentifizierungsservers:
";
$elem["mistral/ksat-service-username"]["descriptionfr"]="Nom d'utilisateur pour le serveur du service d'authentification :
";
$elem["mistral/ksat-service-username"]["default"]="";
$elem["mistral/ksat-service-project-name"]["type"]="string";
$elem["mistral/ksat-service-project-name"]["description"]="Auth server service project name:
";
$elem["mistral/ksat-service-project-name"]["descriptionde"]="Dienstprojektname des Authentifizierungsservers:
";
$elem["mistral/ksat-service-project-name"]["descriptionfr"]="Nom du projet pour le serveur du service d'authentification :
";
$elem["mistral/ksat-service-project-name"]["default"]="service";
$elem["mistral/ksat-service-password"]["type"]="password";
$elem["mistral/ksat-service-password"]["description"]="Auth server service password:
";
$elem["mistral/ksat-service-password"]["descriptionde"]="Dienstpasswort des Authentifizierungsservers:
";
$elem["mistral/ksat-service-password"]["descriptionfr"]="Mot de passe pour le serveur du service d'authentification :
";
$elem["mistral/ksat-service-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
