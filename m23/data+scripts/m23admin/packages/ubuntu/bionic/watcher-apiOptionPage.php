<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("watcher-api");

$elem["watcher/register-endpoint"]["type"]="boolean";
$elem["watcher/register-endpoint"]["description"]="Register Watcher in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["watcher/register-endpoint"]["descriptionde"]="Watcher im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand des Keystone-Authentifizierungs-Tokens verbinden.
";
$elem["watcher/register-endpoint"]["descriptionfr"]="Enregistrer Watcher dans le catalogue de points d'accès Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["watcher/register-endpoint"]["default"]="false";
$elem["watcher/keystone-ip"]["type"]="string";
$elem["watcher/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that watcher-api can
 contact Keystone to do the Watcher service and endpoint creation.
";
$elem["watcher/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Watcher-API Keystone kontaktieren kann, um den Watcher-Dienst und den Endpunkt zu erstellen.
";
$elem["watcher/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Watcher puisse contacter Keystone pour établir le service Watcher et créer le point d'accès.
";
$elem["watcher/keystone-ip"]["default"]="";
$elem["watcher/keystone-admin-name"]["type"]="string";
$elem["watcher/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["watcher/keystone-admin-name"]["descriptionde"]="";
$elem["watcher/keystone-admin-name"]["descriptionfr"]="";
$elem["watcher/keystone-admin-name"]["default"]="admin";
$elem["watcher/keystone-project-name"]["type"]="string";
$elem["watcher/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["watcher/keystone-project-name"]["descriptionde"]="";
$elem["watcher/keystone-project-name"]["descriptionfr"]="";
$elem["watcher/keystone-project-name"]["default"]="admin";
$elem["watcher/keystone-admin-password"]["type"]="password";
$elem["watcher/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["watcher/keystone-admin-password"]["descriptionde"]="";
$elem["watcher/keystone-admin-password"]["descriptionfr"]="";
$elem["watcher/keystone-admin-password"]["default"]="";
$elem["watcher/endpoint-ip"]["type"]="string";
$elem["watcher/endpoint-ip"]["description"]="Watcher endpoint IP address:
 Please enter the IP address that will be used to contact Watcher.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["watcher/endpoint-ip"]["descriptionde"]="IP-Adresse des Watcher-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Watcher benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["watcher/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Watcher.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["watcher/endpoint-ip"]["default"]="";
$elem["watcher/region-name"]["type"]="string";
$elem["watcher/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["watcher/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["watcher/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["watcher/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
