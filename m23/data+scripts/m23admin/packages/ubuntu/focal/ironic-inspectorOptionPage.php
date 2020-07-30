<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ironic-inspector");

$elem["ironic-inspector/configure_db"]["type"]="boolean";
$elem["ironic-inspector/configure_db"]["description"]="Set up a database for this package?
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
$elem["ironic-inspector/configure_db"]["descriptionde"]="Eine Datenbank für dieses Paket einrichten?
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
$elem["ironic-inspector/configure_db"]["descriptionfr"]="Voulez-vous installer une base de données pour ce paquet ?
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
$elem["ironic-inspector/configure_db"]["default"]="false";
$elem["ironic-inspector/configure_ksat"]["type"]="boolean";
$elem["ironic-inspector/configure_ksat"]["description"]="Manage keystone_authtoken with debconf?
 Every OpenStack service must contact Keystone, and this is configured through
 the [keystone_authtoken] section of the configuration. Specify if you wish to
 handle this configuration through debconf.
";
$elem["ironic-inspector/configure_ksat"]["descriptionde"]="Soll »keystone_authtoken« mit Debconf verwaltet werden?
 Jeder OpenStack-Dienst muss Keystone kontaktieren. Dies wird über den Abschnitt [keystone_authtoken] der Konfiguration eingerichtet. Geben Sie an, ob Sie diese Konfiguration durch Debconf handhaben wollen.
";
$elem["ironic-inspector/configure_ksat"]["descriptionfr"]="Voulez-vous gérer le jeton d'authentification keystone (« keystone_authtoken ») avec les écrans de configuration debconf ?
 Chaque service d'OpenStack doit pouvoir contacter Keystone et cela est configuré au travers de la section de configuration « [keystone_authtoken] ». Veuillez spécifier si vous voulez gérer la configuration avec les écrans de configuration debconf.
";
$elem["ironic-inspector/configure_ksat"]["default"]="false";
$elem["ironic-inspector/ksat-public-url"]["type"]="string";
$elem["ironic-inspector/ksat-public-url"]["description"]="Auth server public endpoint URL:
 Specify the URL of your Keystone authentication server public endpoint. This
 value will be set in the www_authenticate_uri directive.
";
$elem["ironic-inspector/ksat-public-url"]["descriptionde"]="Öffentlicher Endpunkt-URL des Authentifizierungsservers:
 Geben Sie den URL Ihres öffentlichen Endpunkts des Keystone-Authentifizierungsservers an. Dieser Wert wird in der Direktive »www_authenticate_uri« gesetzt.
";
$elem["ironic-inspector/ksat-public-url"]["descriptionfr"]="Adresse URL du point d'accès public pour le serveur d'authentification :
 Veuillez spécifier l'adresse URL du point d'accès public du serveur d'authentification Keystone. Cette valeur doit être défini dans la directive « www_authenticate_uri ».
";
$elem["ironic-inspector/ksat-public-url"]["default"]="http://localhost:5000";
$elem["ironic-inspector/ksat-region"]["type"]="string";
$elem["ironic-inspector/ksat-region"]["description"]="Keystone region:
 Specify the Keystone region to use.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
";
$elem["ironic-inspector/ksat-region"]["descriptionde"]="Keystone-Region:
 Geben Sie die Keystone-Region an, die benutzt werden soll.
 .
 Der Regionsname ist üblicherweise eine Zeichenketten, die nur alphanumerisches ASCII, Punkte und Bindestrichte enthält.
";
$elem["ironic-inspector/ksat-region"]["descriptionfr"]="Région Keystone :
 Veuillez spécifier la région Keystone à utiliser.
 .
 Le nom de la région est généralement composé d'une chaîne contenant seulement des caractères alphanumériques ASCII, des points et des tirets.
";
$elem["ironic-inspector/ksat-region"]["default"]="regionOne";
$elem["ironic-inspector/ksat-create-service-user"]["type"]="boolean";
$elem["ironic-inspector/ksat-create-service-user"]["description"]="Create service user?
 This package can reuse an already existing username, or create one right now.
 If you wish to create one, then you will be prompted for the admin credentials.
";
$elem["ironic-inspector/ksat-create-service-user"]["descriptionde"]="Dienstbenutzer erstellen?
 Dieses Paket kann einen bereits existierenden Benutzernamen erneut verwenden oder nun einen neuen erstellen. Falls Sie ihn erstellen möchten, werden Sie nach den Administratoranmeldedaten gefragt.
";
$elem["ironic-inspector/ksat-create-service-user"]["descriptionfr"]="Voulez-vous créer un utilisateur du service ?
 Ce paquet peut réutiliser un nom d'utilisateur existant ou en créer un maintenant. Si vous souhaitez en créer un, vous serez invité à entrer les données d'authentification de l'administrateur.
";
$elem["ironic-inspector/ksat-create-service-user"]["default"]="true";
$elem["ironic-inspector/ksat-admin-username"]["type"]="string";
$elem["ironic-inspector/ksat-admin-username"]["description"]="Auth server admin username:
";
$elem["ironic-inspector/ksat-admin-username"]["descriptionde"]="Administratorbenutzername des Authentifizierungsservers:
";
$elem["ironic-inspector/ksat-admin-username"]["descriptionfr"]="Nom d'utilisateur administrateur pour le serveur d'authentification :
";
$elem["ironic-inspector/ksat-admin-username"]["default"]="admin";
$elem["ironic-inspector/ksat-admin-project-name"]["type"]="string";
$elem["ironic-inspector/ksat-admin-project-name"]["description"]="Auth server admin project name:
";
$elem["ironic-inspector/ksat-admin-project-name"]["descriptionde"]="Administratorprojektname des Authentifizierungsservers:
";
$elem["ironic-inspector/ksat-admin-project-name"]["descriptionfr"]="Nom du projet administrateur pour le serveur d'authentification :
";
$elem["ironic-inspector/ksat-admin-project-name"]["default"]="admin";
$elem["ironic-inspector/ksat-admin-password"]["type"]="password";
$elem["ironic-inspector/ksat-admin-password"]["description"]="Auth server admin password:
";
$elem["ironic-inspector/ksat-admin-password"]["descriptionde"]="Administratorpasswort des Authentifizierungsservers:
";
$elem["ironic-inspector/ksat-admin-password"]["descriptionfr"]="Mot de passe administrateur pour le serveur d'authentification :
";
$elem["ironic-inspector/ksat-admin-password"]["default"]="";
$elem["ironic-inspector/ksat-service-username"]["type"]="string";
$elem["ironic-inspector/ksat-service-username"]["description"]="Auth server service username:
";
$elem["ironic-inspector/ksat-service-username"]["descriptionde"]="Dienstbenutzername des Authentifizierungsservers:
";
$elem["ironic-inspector/ksat-service-username"]["descriptionfr"]="Nom d'utilisateur pour le serveur du service d'authentification :
";
$elem["ironic-inspector/ksat-service-username"]["default"]="";
$elem["ironic-inspector/ksat-service-project-name"]["type"]="string";
$elem["ironic-inspector/ksat-service-project-name"]["description"]="Auth server service project name:
";
$elem["ironic-inspector/ksat-service-project-name"]["descriptionde"]="Dienstprojektname des Authentifizierungsservers:
";
$elem["ironic-inspector/ksat-service-project-name"]["descriptionfr"]="Nom du projet pour le serveur du service d'authentification :
";
$elem["ironic-inspector/ksat-service-project-name"]["default"]="service";
$elem["ironic-inspector/ksat-service-password"]["type"]="password";
$elem["ironic-inspector/ksat-service-password"]["description"]="Auth server service password:
";
$elem["ironic-inspector/ksat-service-password"]["descriptionde"]="Dienstpasswort des Authentifizierungsservers:
";
$elem["ironic-inspector/ksat-service-password"]["descriptionfr"]="Mot de passe pour le serveur du service d'authentification :
";
$elem["ironic-inspector/ksat-service-password"]["default"]="";
$elem["ironic-inspector/configure_api-endpoint"]["type"]="boolean";
$elem["ironic-inspector/configure_api-endpoint"]["description"]="Register this service in the Keystone endpoint catalog?
 Each OpenStack service (each API) must be registered in the Keystone catalog
 in order to be accessible. This is done using \"openstack service create\" and
 \"openstack endpoint create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
 .
 Also, if a service with a matching name is already present in the Keystone
 catalog, endpoint registration will be aborted.
";
$elem["ironic-inspector/configure_api-endpoint"]["descriptionde"]="Diesen Dienst im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) muss im Keystone-Katalog registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service create« und »keystone endpoint create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand eines bekannten Administratorprojektnamens, Administratorbenutzernamens und -Passworts verbinden. Das Administratorauthentifizierungs-Token wird nicht mehr benutzt.
 .
 Falls außerdem ein Dienst mit passendem Namen bereits im Keystone-Katalog vorhanden ist, wird die Registrierung abgebrochen.
";
$elem["ironic-inspector/configure_api-endpoint"]["descriptionfr"]="Voulez-vous enregistrer ce service dans le catalogue de points d'accès de Keystone ?
 Chaque service d'OpenStack (chaque API) peut être enregistré dans le catalogue Keystone pour être accessible. Cela peut être fait en utilisant « openstack service create » et « openstack endpoint create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel vous pouvez vous connecter en utilisant un nom de projet connu d'administrateur, le nom d'utilisateur de l'administrateur ainsi que son mot de passe. Le jeton d'authentification d'administration n'est plus utilisé.
 .
 Aussi, si un service avec un nom correspondant est déjà présent dans le catalogue Keystone, l'enregistrement du point d'accès sera annulé.
";
$elem["ironic-inspector/configure_api-endpoint"]["default"]="false";
$elem["ironic-inspector/api-keystone-address"]["type"]="string";
$elem["ironic-inspector/api-keystone-address"]["description"]="Keystone server address:
 Please enter the address (IP or resolvable address) of the Keystone server,
 for creating the new service and endpoints.
 .
 Any non-valid ipv4, ipv6 or host address string will abort the endpoint
 registration.
";
$elem["ironic-inspector/api-keystone-address"]["descriptionde"]="Adresse des Keystone-Servers:
 Bitte geben Sie die Adresse (IP-Adresse oder auflösbare Adresse) des Keystone-Servers an, um den neuen Dienst und die Endpunkte zu erstellen.
 .
 Jede ungültige IPv4-, IPv6- oder Rechneradresszeichenkette wird die Registrierung des Endpunkts abbrechen.
";
$elem["ironic-inspector/api-keystone-address"]["descriptionfr"]="Adresse du point d'accès Keystone :
 Veuillez indiquer l'adresse (IP ou adresse résolvable) du serveur Keystone pour permettre la création des nouveaux services et des points d'accès.
 .
 Toute adresse IPv4, IPv6 ou chaîne adresse d'hôte non valable interrompra l'enregistrement du point d'accès.
";
$elem["ironic-inspector/api-keystone-address"]["default"]="";
$elem["ironic-inspector/api-keystone-proto"]["type"]="select";
$elem["ironic-inspector/api-keystone-proto"]["choices"][1]="http";
$elem["ironic-inspector/api-keystone-proto"]["description"]="Keystone endpoint protocol:
";
$elem["ironic-inspector/api-keystone-proto"]["descriptionde"]="Keystone-Endpunktprotokoll:
";
$elem["ironic-inspector/api-keystone-proto"]["descriptionfr"]="Protocole du point d'accès Keystone :
";
$elem["ironic-inspector/api-keystone-proto"]["default"]="http";
$elem["ironic-inspector/api-keystone-admin-username"]["type"]="string";
$elem["ironic-inspector/api-keystone-admin-username"]["description"]="Keystone admin username:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["ironic-inspector/api-keystone-admin-username"]["descriptionde"]="Keystone-Administratorbenutzername:
 Um den Dienstendpunkt zu erstellen, muss dieses Paket den Administratorbenutzernamen, Projektnamen und das Passwort kennen, um Befehle über die Keystone-API zu erteilen.
";
$elem["ironic-inspector/api-keystone-admin-username"]["descriptionfr"]="Nom d'utilisateur de l'administrateur Keystone :
 Pour créer le service de point d'accès, ce paquet a besoin de connaître le nom d'utilisateur de l'administrateur, le nom du projet, ainsi que le mot de passe. Il peut ainsi exécuter des commandes au travers de l'API Keystone.
";
$elem["ironic-inspector/api-keystone-admin-username"]["default"]="admin";
$elem["ironic-inspector/api-keystone-admin-project-name"]["type"]="string";
$elem["ironic-inspector/api-keystone-admin-project-name"]["description"]="Keystone admin project name:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["ironic-inspector/api-keystone-admin-project-name"]["descriptionde"]="Keystone-Administratorprojektname:
 Um den Dienstendpunkt zu erstellen, muss dieses Paket den Administratorbenutzernamen, Projektnamen und das Passwort kennen, um Befehle über die Keystone-API zu erteilen.
";
$elem["ironic-inspector/api-keystone-admin-project-name"]["descriptionfr"]="Nom du projet administrateur Keystone :
 Pour créer le service de point d'accès, ce paquet a besoin de connaître le nom d'utilisateur de l'administrateur, le nom du projet, ainsi que le mot de passe. Il peut ainsi exécuter des commandes au travers de l'API Keystone.
";
$elem["ironic-inspector/api-keystone-admin-project-name"]["default"]="admin";
$elem["ironic-inspector/api-keystone-admin-password"]["type"]="password";
$elem["ironic-inspector/api-keystone-admin-password"]["description"]="Keystone admin password:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["ironic-inspector/api-keystone-admin-password"]["descriptionde"]="Keystone-Administratorpasswort:
 Um den Dienstendpunkt zu erstellen, muss dieses Paket den Administratorbenutzernamen, Projektnamen und das Passwort kennen, um Befehle über die Keystone-API zu erteilen.
";
$elem["ironic-inspector/api-keystone-admin-password"]["descriptionfr"]="Mot de passe administrateur Keystone :
 Pour créer le service de point d'accès, ce paquet a besoin de connaître le nom d'utilisateur de l'administrateur, le nom du projet, ainsi que le mot de passe. Il peut ainsi exécuter des commandes au travers de l'API Keystone.
";
$elem["ironic-inspector/api-keystone-admin-password"]["default"]="";
$elem["ironic-inspector/api-endpoint-address"]["type"]="string";
$elem["ironic-inspector/api-endpoint-address"]["description"]="This service endpoint address:
 Please enter the endpoint address that will be used to contact this service.
 You can specify either a Fully Qualified Domain Name (FQDN) or an IP address.
";
$elem["ironic-inspector/api-endpoint-address"]["descriptionde"]="Endpunktadresse dieses Dienstes:
 Bitte geben Sie die Adresse des Endpunkts ein, der zum Kontaktieren dieses Dienstes benutzt wird. Sie können entweder einen vollständig qualifizierten Domain-Namen (FQDN) oder eine IP-Adresse angeben.
";
$elem["ironic-inspector/api-endpoint-address"]["descriptionfr"]="Adresse de ce service de point d'accès :
 Veuillez indiquer l'adresse du point d'accès à utiliser pour contacter ce service. Vous pouvez entrer un nom de domaine complètement qualifié (« FQDN ») ou une adresse IP.
";
$elem["ironic-inspector/api-endpoint-address"]["default"]="";
$elem["ironic-inspector/api-endpoint-proto"]["type"]="select";
$elem["ironic-inspector/api-endpoint-proto"]["choices"][1]="http";
$elem["ironic-inspector/api-endpoint-proto"]["description"]="This service endpoint protocol:
";
$elem["ironic-inspector/api-endpoint-proto"]["descriptionde"]="Endpunktprotokoll dieses Dienstes:
";
$elem["ironic-inspector/api-endpoint-proto"]["descriptionfr"]="Protocole de ce service de point d'accès :
";
$elem["ironic-inspector/api-endpoint-proto"]["default"]="http";
$elem["ironic-inspector/api-endpoint-region-name"]["type"]="string";
$elem["ironic-inspector/api-endpoint-region-name"]["description"]="Name of the region to register:
 OpenStack supports using regions, with each region representing a different
 location (usually a different data center). Please enter the region name that
 you wish to use when registering the endpoint.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
 .
 A non-valid string will abort the API endpoint registration.
";
$elem["ironic-inspector/api-endpoint-region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Regionen, bei der jede Region einen anderen Ort repräsentiert (üblicherweise ein anderes Rechenzentrum). Bitte geben Sie den Namen der Region ein, die Sie bei der Registrierung des Endpunkts benutzen möchten.
 .
 Der Regionsname ist üblicherweise eine Zeichenketten, die nur alphanumerisches ASCII, Punkte und Bindestrichte enthält.
 .
 Eine ungültige Zeichenkette wird die API-Registrierung des Endpunkts abbrechen.
";
$elem["ironic-inspector/api-endpoint-region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de régions, chaque région représentant un lieu (généralement un centre de données différent). Veuillez entrer le nom de la région que vous souhaitez utiliser lors de l'enregistrement du point d'accès.
 .
 Le nom de la région est généralement composé d'une chaîne contenant seulement des caractères alphanumériques ASCII, des points et des tirets.
 .
 Une chaîne non valable interrompra l'enregistrement du point d'accès de l'API.
";
$elem["ironic-inspector/api-endpoint-region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
