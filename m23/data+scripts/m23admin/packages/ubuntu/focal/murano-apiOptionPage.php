<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("murano-api");

$elem["murano/configure_api-endpoint"]["type"]="boolean";
$elem["murano/configure_api-endpoint"]["description"]="Register this service in the Keystone endpoint catalog?
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
$elem["murano/configure_api-endpoint"]["descriptionde"]="Diesen Dienst im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) muss im Keystone-Katalog registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service create« und »keystone endpoint create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand eines bekannten Administratorprojektnamens, Administratorbenutzernamens und -Passworts verbinden. Das Administratorauthentifizierungs-Token wird nicht mehr benutzt.
 .
 Falls außerdem ein Dienst mit passendem Namen bereits im Keystone-Katalog vorhanden ist, wird die Registrierung abgebrochen.
";
$elem["murano/configure_api-endpoint"]["descriptionfr"]="Voulez-vous enregistrer ce service dans le catalogue de points d'accès de Keystone ?
 Chaque service d'OpenStack (chaque API) peut être enregistré dans le catalogue Keystone pour être accessible. Cela peut être fait en utilisant « openstack service create » et « openstack endpoint create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel vous pouvez vous connecter en utilisant un nom de projet connu d'administrateur, le nom d'utilisateur de l'administrateur ainsi que son mot de passe. Le jeton d'authentification d'administration n'est plus utilisé.
 .
 Aussi, si un service avec un nom correspondant est déjà présent dans le catalogue Keystone, l'enregistrement du point d'accès sera annulé.
";
$elem["murano/configure_api-endpoint"]["default"]="false";
$elem["murano/api-keystone-address"]["type"]="string";
$elem["murano/api-keystone-address"]["description"]="Keystone server address:
 Please enter the address (IP or resolvable address) of the Keystone server,
 for creating the new service and endpoints.
 .
 Any non-valid ipv4, ipv6 or host address string will abort the endpoint
 registration.
";
$elem["murano/api-keystone-address"]["descriptionde"]="Adresse des Keystone-Servers:
 Bitte geben Sie die Adresse (IP-Adresse oder auflösbare Adresse) des Keystone-Servers an, um den neuen Dienst und die Endpunkte zu erstellen.
 .
 Jede ungültige IPv4-, IPv6- oder Rechneradresszeichenkette wird die Registrierung des Endpunkts abbrechen.
";
$elem["murano/api-keystone-address"]["descriptionfr"]="Adresse du point d'accès Keystone :
 Veuillez indiquer l'adresse (IP ou adresse résolvable) du serveur Keystone pour permettre la création des nouveaux services et des points d'accès.
 .
 Toute adresse IPv4, IPv6 ou chaîne adresse d'hôte non valable interrompra l'enregistrement du point d'accès.
";
$elem["murano/api-keystone-address"]["default"]="";
$elem["murano/api-keystone-proto"]["type"]="select";
$elem["murano/api-keystone-proto"]["choices"][1]="http";
$elem["murano/api-keystone-proto"]["description"]="Keystone endpoint protocol:
";
$elem["murano/api-keystone-proto"]["descriptionde"]="Keystone-Endpunktprotokoll:
";
$elem["murano/api-keystone-proto"]["descriptionfr"]="Protocole du point d'accès Keystone :
";
$elem["murano/api-keystone-proto"]["default"]="http";
$elem["murano/api-keystone-admin-username"]["type"]="string";
$elem["murano/api-keystone-admin-username"]["description"]="Keystone admin username:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["murano/api-keystone-admin-username"]["descriptionde"]="Keystone-Administratorbenutzername:
 Um den Dienstendpunkt zu erstellen, muss dieses Paket den Administratorbenutzernamen, Projektnamen und das Passwort kennen, um Befehle über die Keystone-API zu erteilen.
";
$elem["murano/api-keystone-admin-username"]["descriptionfr"]="Nom d'utilisateur de l'administrateur Keystone :
 Pour créer le service de point d'accès, ce paquet a besoin de connaître le nom d'utilisateur de l'administrateur, le nom du projet, ainsi que le mot de passe. Il peut ainsi exécuter des commandes au travers de l'API Keystone.
";
$elem["murano/api-keystone-admin-username"]["default"]="admin";
$elem["murano/api-keystone-admin-project-name"]["type"]="string";
$elem["murano/api-keystone-admin-project-name"]["description"]="Keystone admin project name:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["murano/api-keystone-admin-project-name"]["descriptionde"]="Keystone-Administratorprojektname:
 Um den Dienstendpunkt zu erstellen, muss dieses Paket den Administratorbenutzernamen, Projektnamen und das Passwort kennen, um Befehle über die Keystone-API zu erteilen.
";
$elem["murano/api-keystone-admin-project-name"]["descriptionfr"]="Nom du projet administrateur Keystone :
 Pour créer le service de point d'accès, ce paquet a besoin de connaître le nom d'utilisateur de l'administrateur, le nom du projet, ainsi que le mot de passe. Il peut ainsi exécuter des commandes au travers de l'API Keystone.
";
$elem["murano/api-keystone-admin-project-name"]["default"]="admin";
$elem["murano/api-keystone-admin-password"]["type"]="password";
$elem["murano/api-keystone-admin-password"]["description"]="Keystone admin password:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["murano/api-keystone-admin-password"]["descriptionde"]="Keystone-Administratorpasswort:
 Um den Dienstendpunkt zu erstellen, muss dieses Paket den Administratorbenutzernamen, Projektnamen und das Passwort kennen, um Befehle über die Keystone-API zu erteilen.
";
$elem["murano/api-keystone-admin-password"]["descriptionfr"]="Mot de passe administrateur Keystone :
 Pour créer le service de point d'accès, ce paquet a besoin de connaître le nom d'utilisateur de l'administrateur, le nom du projet, ainsi que le mot de passe. Il peut ainsi exécuter des commandes au travers de l'API Keystone.
";
$elem["murano/api-keystone-admin-password"]["default"]="";
$elem["murano/api-endpoint-address"]["type"]="string";
$elem["murano/api-endpoint-address"]["description"]="This service endpoint address:
 Please enter the endpoint address that will be used to contact this service.
 You can specify either a Fully Qualified Domain Name (FQDN) or an IP address.
";
$elem["murano/api-endpoint-address"]["descriptionde"]="Endpunktadresse dieses Dienstes:
 Bitte geben Sie die Adresse des Endpunkts ein, der zum Kontaktieren dieses Dienstes benutzt wird. Sie können entweder einen vollständig qualifizierten Domain-Namen (FQDN) oder eine IP-Adresse angeben.
";
$elem["murano/api-endpoint-address"]["descriptionfr"]="Adresse de ce service de point d'accès :
 Veuillez indiquer l'adresse du point d'accès à utiliser pour contacter ce service. Vous pouvez entrer un nom de domaine complètement qualifié (« FQDN ») ou une adresse IP.
";
$elem["murano/api-endpoint-address"]["default"]="";
$elem["murano/api-endpoint-proto"]["type"]="select";
$elem["murano/api-endpoint-proto"]["choices"][1]="http";
$elem["murano/api-endpoint-proto"]["description"]="This service endpoint protocol:
";
$elem["murano/api-endpoint-proto"]["descriptionde"]="Endpunktprotokoll dieses Dienstes:
";
$elem["murano/api-endpoint-proto"]["descriptionfr"]="Protocole de ce service de point d'accès :
";
$elem["murano/api-endpoint-proto"]["default"]="http";
$elem["murano/api-endpoint-region-name"]["type"]="string";
$elem["murano/api-endpoint-region-name"]["description"]="Name of the region to register:
 OpenStack supports using regions, with each region representing a different
 location (usually a different data center). Please enter the region name that
 you wish to use when registering the endpoint.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
 .
 A non-valid string will abort the API endpoint registration.
";
$elem["murano/api-endpoint-region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Regionen, bei der jede Region einen anderen Ort repräsentiert (üblicherweise ein anderes Rechenzentrum). Bitte geben Sie den Namen der Region ein, die Sie bei der Registrierung des Endpunkts benutzen möchten.
 .
 Der Regionsname ist üblicherweise eine Zeichenketten, die nur alphanumerisches ASCII, Punkte und Bindestrichte enthält.
 .
 Eine ungültige Zeichenkette wird die API-Registrierung des Endpunkts abbrechen.
";
$elem["murano/api-endpoint-region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de régions, chaque région représentant un lieu (généralement un centre de données différent). Veuillez entrer le nom de la région que vous souhaitez utiliser lors de l'enregistrement du point d'accès.
 .
 Le nom de la région est généralement composé d'une chaîne contenant seulement des caractères alphanumériques ASCII, des points et des tirets.
 .
 Une chaîne non valable interrompra l'enregistrement du point d'accès de l'API.
";
$elem["murano/api-endpoint-region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
