<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nova-common");

$elem["nova/auth-host"]["type"]="string";
$elem["nova/auth-host"]["description"]="Auth server hostname:
 Please specify the URL of your Nova authentication server. Typically
 this is also the URL of your OpenStack Identity Service (Keystone).
";
$elem["nova/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie die URL Ihres Nova-Authentifizierungsservers an. Dies ist normalerweise auch die URL Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["nova/auth-host"]["descriptionfr"]="
 Veuillez indiquer l'adresse URL du serveur d'authentification Nova. En général, il s'agit également de l'adresse URL du Service d'identité OpenStack (Keystone).
";
$elem["nova/auth-host"]["default"]="127.0.0.1";
$elem["nova/admin-tenant-name"]["type"]="string";
$elem["nova/admin-tenant-name"]["description"]="Auth server tenant name:
";
$elem["nova/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
";
$elem["nova/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
";
$elem["nova/admin-tenant-name"]["default"]="admin";
$elem["nova/admin-user"]["type"]="string";
$elem["nova/admin-user"]["description"]="Auth server username:
";
$elem["nova/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
";
$elem["nova/admin-user"]["descriptionfr"]="Identifiant pour le serveur d'authentification :
";
$elem["nova/admin-user"]["default"]="admin";
$elem["nova/admin-password"]["type"]="password";
$elem["nova/admin-password"]["description"]="Auth server password:
";
$elem["nova/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
";
$elem["nova/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
";
$elem["nova/admin-password"]["default"]="";
$elem["nova/configure_db"]["type"]="boolean";
$elem["nova/configure_db"]["description"]="Set up a database for Nova?
 No database has been set up for Nova to use. If you want
 to set one up now, please make sure you have all needed
 information:
 .
  * the host name of the database server (which must allow TCP
    connections from this machine);
  * a username and password to access the database;
  * the type of database management software you want to use.
 .
 If you don't choose this option, no database will be set up and Nova
 will use regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure
 -plow nova-common\".
";
$elem["nova/configure_db"]["descriptionde"]="Datenbank für Nova einrichten?
 Bisher ist noch keine Datenbank eingerichtet worden, die Nova benutzen kann. Falls Sie das jetzt tun wollen, stellen Sie bitte sicher, dass Sie alle benötigten Informationen haben:
 .
  * der Rechnername des Datenbank-Servers (welcher TCP-Verbindungen von
    dieser Maschine aus zulassen muss)
  * einen Benutzernamen samt Passwort, um auf die Datenbank zuzugreifen
  * die Art von Datenbankverwaltungssoftware, die Sie verwenden wollen
 .
 Wenn Sie diese Option nicht auswählen, wird keine Datenbank eingerichtet und Nova wird auf die normale SQLite-Unterstützung zurückgreifen.
 .
 Sie können diese Einstellung später durch Ausführen von »dpkg-reconfigure -plow nova-common« ändern.
";
$elem["nova/configure_db"]["descriptionfr"]="Faut-il installer une base de données pour Nova ?
 Aucune base de données n'a été installée pour Nova. Si vous souhaitez en installer une maintenant, veuillez vous assurer de disposer de toutes les informations nécessaires :
 .
  - le nom d'hôte du serveur de bases de données (qui doit
    autoriser les connexions TCP depuis cette machine) ;
  - un identifiant et un mot de passe pour accéder à
    la base de données ;
  - le type de gestionnaire de base de données que vous
    souhaitez utiliser.
 .
 Si vous ne choisissez pas cette option, aucune base de données ne sera installée et Nova utilisera la gestion SQLite de base.
 .
 Vous pouvez changer ce réglage plus tard en exécutant « dpkg-reconfigure -plow nova-common ».
";
$elem["nova/configure_db"]["default"]="false";
$elem["nova/active-api"]["type"]="multiselect";
$elem["nova/active-api"]["choices"][1]="ec2";
$elem["nova/active-api"]["choices"][2]="osapi_compute";
$elem["nova/active-api"]["description"]="API to activate:
 Openstack Nova supports different API services, each of them binding on a
 different port. Select which one nova-api should support.
 .
 If it is a compute node that you are setting-up, then you only need to run the
 metadata API server. If you run Cinder, then you don't need osapi_volume (you
 cannot run osapi_volume and cinder-api on the same server: they bind on the
 same port).
";
$elem["nova/active-api"]["descriptionde"]="API, die aktiviert werden soll:
 Openstack Nova unterstützt verschiedene API-Dienste, von denen jeder einzelne an einen anderen Port gebunden ist. Wählen Sie aus, welche von »nova-api« unterstützt werden soll.
 .
 Falls Sie einen Rechenknoten einrichten, müssen Sie nur den Metadaten-API-Server starten. Falls Sie Cinder ausführen, benötigen Sie »osapi_volume« nicht (Sie können »osapi_volume« und »cinder-api« nicht auf demselben Server ausführen, sie binden sich an den selben Port).
";
$elem["nova/active-api"]["descriptionfr"]="API à activer :
 OpenStack Nova prend en charge différents services API, chacun d'entre eux relié à un port différent. Veuillez choisir quelle api Nova devra utiliser.
 .
 Si c'est un nœud de calcul que vous installez, alors, vous n'avez qu'à lancer le serveur API de métadonnées. Si vous utilisez Cinder, alors, vous n'avez pas besoin d'osapi_volume (vous ne pouvez pas lancer osapi_volume et l'api de cinder sur le même serveur : ils sont liés au même port).
";
$elem["nova/active-api"]["default"]="";
$elem["nova/my-ip"]["type"]="string";
$elem["nova/my-ip"]["description"]="Value for my_ip:
 This value will be stored in the my_ip directive of nova.conf.
";
$elem["nova/my-ip"]["descriptionde"]="Wert für »my_ip«:
 Dieser Wert wird in der Richtlinie »my_ip« der »nova.conf« gespeichert.
";
$elem["nova/my-ip"]["descriptionfr"]="
 Cette valeur sera enregistrée dans la directive my_ip de nova.conf.
";
$elem["nova/my-ip"]["default"]="";
$elem["nova/neutron_url"]["type"]="string";
$elem["nova/neutron_url"]["description"]="Neutron server URL:
 Please enter the URL of the Neutron server.
";
$elem["nova/neutron_url"]["descriptionde"]="URL des Neutron-Servers:
 Bitte geben Sie die URL Ihres Neutron-Servers ein.
";
$elem["nova/neutron_url"]["descriptionfr"]="Adresse URL du serveur Neutron :
 Veuillez indiquer l'adresse URL du serveur Neutron.
";
$elem["nova/neutron_url"]["default"]="http://127.0.0.1:9696";
$elem["nova/neutron_admin_tenant_name"]["type"]="string";
$elem["nova/neutron_admin_tenant_name"]["description"]="Neutron admin tenant name:
 Nova needs to be able to communicate with Neutron through Keystone. Therefore
 Nova needs to know the Neutron admin tenant, username and password.
 .
 Please enter the name of the admin tenant for Neutron.
";
$elem["nova/neutron_admin_tenant_name"]["descriptionde"]="Tenant-Name des Neutron-Admins:
 Nova muss mit Neutron über Keystone kommunizieren. Daher muss Nova den Tenant, Benutzernamen und das Passwort des Neuitron-Admins kennen.
 .
 Bitte geben Sie den Namen des Admin-Tenants für Neutron ein.
";
$elem["nova/neutron_admin_tenant_name"]["descriptionfr"]="Nom d'espace client de l’administrateur de Neutron :
 Nova doit pouvoir communiquer avec Neutron au travers de Keystone. Cependant Nova a besoin de connaître l’espace client, l'identifiant et le mot de passe de l’administrateur de Neutron.
 .
 Veuillez entrer le nom de l’espace client de l’administrateur pour Neutron.
";
$elem["nova/neutron_admin_tenant_name"]["default"]="admin";
$elem["nova/neutron_admin_username"]["type"]="string";
$elem["nova/neutron_admin_username"]["description"]="Neutron administrator username:
 Please enter the username of the Neutron administrator.
";
$elem["nova/neutron_admin_username"]["descriptionde"]="Benutzername des Neutron-Administrators:
 Bitte geben Sie den Benutzernamen des Neutron-Administrators ein.
";
$elem["nova/neutron_admin_username"]["descriptionfr"]="Identifiant de l'administrateur pour Neutron :
 Veuillez indiquer l'identifiant de l'administrateur pour Neutron.
";
$elem["nova/neutron_admin_username"]["default"]="admin";
$elem["nova/neutron_admin_password"]["type"]="password";
$elem["nova/neutron_admin_password"]["description"]="Neutron administrator password:
 Please enter the password of the Neutron administrator.
";
$elem["nova/neutron_admin_password"]["descriptionde"]="Passwort des Neutron-Administrators:
 Bitte geben Sie das Passwort für des Neutron-Administrators ein.
";
$elem["nova/neutron_admin_password"]["descriptionfr"]="Mot de passe de l'administrateur de Neutron :
 Veuillez indiquer le mot de passe de l'administrateur de Neutron.
";
$elem["nova/neutron_admin_password"]["default"]="";
$elem["nova/rabbit_host"]["type"]="string";
$elem["nova/rabbit_host"]["description"]="IP address of your RabbitMQ host:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the IP address of that server.
";
$elem["nova/rabbit_host"]["descriptionde"]="IP-Adresse Ihres RabbitMQ-Rechners:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie die IP-Adresse dieses Servers an.
";
$elem["nova/rabbit_host"]["descriptionfr"]="Adresse IP de l'hôte RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'adresse IP de ce serveur.
";
$elem["nova/rabbit_host"]["default"]="localhost";
$elem["nova/rabbit_userid"]["type"]="string";
$elem["nova/rabbit_userid"]["description"]="Username for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the username used to connect to the RabbitMQ server.
";
$elem["nova/rabbit_userid"]["descriptionde"]="Benutzername für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie den Benutzernamen ein, den Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["nova/rabbit_userid"]["descriptionfr"]="Identifiant de connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer l'identifiant à utiliser pour se connecter au serveur RabbitMQ.
";
$elem["nova/rabbit_userid"]["default"]="guest";
$elem["nova/rabbit_password"]["type"]="password";
$elem["nova/rabbit_password"]["description"]="Password for connection to the RabbitMQ server:
 In order to interoperate with other components of OpenStack, this package
 needs to connect to a central RabbitMQ server.
 .
 Please specify the password used to connect to the RabbitMQ server.
";
$elem["nova/rabbit_password"]["descriptionde"]="Passwort für die Verbindung mit dem RabbitMQ-Server:
 Um mit weiteren Bestandteilen von OpenStack zusammenzuarbeiten, muss sich dieses Paket mit einem zentralen RabbitMQ-Server verbinden.
 .
 Bitte geben Sie das Passwort ein, das Sie zum Verbinden mit dem RabbitMQ-Server verwenden.
";
$elem["nova/rabbit_password"]["descriptionfr"]="Mot de passe de connexion au serveur RabbitMQ :
 Afin de pouvoir interagir avec d'autres composants d'OpenStack, ce paquet doit se connecter à un serveur centralisé RabbitMQ.
 .
 Veuillez indiquer le mot de passe à utiliser pour se connecter au serveur RabbitMQ :
";
$elem["nova/rabbit_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
