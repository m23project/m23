<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glare-api");

$elem["glare/register-endpoint"]["type"]="boolean";
$elem["glare/register-endpoint"]["description"]="Register Glare in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["glare/register-endpoint"]["descriptionde"]="Glare im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand des Keystone-Authentifizierungs-Tokens verbinden.
";
$elem["glare/register-endpoint"]["descriptionfr"]="Enregistrer Glare dans le catalogue de points d'accès Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["glare/register-endpoint"]["default"]="false";
$elem["glare/keystone-ip"]["type"]="string";
$elem["glare/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that glare-api can
 contact Keystone to do the Glare service and endpoint creation.
";
$elem["glare/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Glare-API Keystone kontaktieren kann, um den Glare-Dienst und den Endpunkt zu erstellen.
";
$elem["glare/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Glare puisse contacter Keystone pour établir le service Glare et créer le point d'accès.
";
$elem["glare/keystone-ip"]["default"]="";
$elem["glare/keystone-admin-name"]["type"]="string";
$elem["glare/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["glare/keystone-admin-name"]["descriptionde"]="";
$elem["glare/keystone-admin-name"]["descriptionfr"]="";
$elem["glare/keystone-admin-name"]["default"]="admin";
$elem["glare/keystone-project-name"]["type"]="string";
$elem["glare/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["glare/keystone-project-name"]["descriptionde"]="";
$elem["glare/keystone-project-name"]["descriptionfr"]="";
$elem["glare/keystone-project-name"]["default"]="admin";
$elem["glare/keystone-admin-password"]["type"]="password";
$elem["glare/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["glare/keystone-admin-password"]["descriptionde"]="";
$elem["glare/keystone-admin-password"]["descriptionfr"]="";
$elem["glare/keystone-admin-password"]["default"]="";
$elem["glare/endpoint-ip"]["type"]="string";
$elem["glare/endpoint-ip"]["description"]="Glare endpoint IP address:
 Please enter the IP address that will be used to contact Glare.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["glare/endpoint-ip"]["descriptionde"]="IP-Adresse des Glare-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Glare benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["glare/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Glare.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["glare/endpoint-ip"]["default"]="";
$elem["glare/region-name"]["type"]="string";
$elem["glare/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["glare/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["glare/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["glare/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
