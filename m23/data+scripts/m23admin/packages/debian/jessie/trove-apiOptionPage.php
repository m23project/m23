<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("trove-api");

$elem["trove/register-endpoint"]["type"]="boolean";
$elem["trove/register-endpoint"]["description"]="Register Glance in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["trove/register-endpoint"]["descriptionde"]="Glance im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand des Keystone-Authentifizierungs-Tokens verbinden.
";
$elem["trove/register-endpoint"]["descriptionfr"]="Enregistrer Glance dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut maintenant être fait automatiquement.
 .
 Veuillez noter que vous aurez besoin d'avoir un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["trove/register-endpoint"]["default"]="false";
$elem["trove/keystone-ip"]["type"]="string";
$elem["trove/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that trove-api can
 contact Keystone to do the Glance service and endpoint creation.
";
$elem["trove/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Trove-API Keystone kontaktieren kann, um den Glance-Dienst und den Endpunkt zu erstellen.
";
$elem["trove/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Trove puisse contacter Keystone pour établir le service Glance et créer le point d'accès.
";
$elem["trove/keystone-ip"]["default"]="";
$elem["trove/keystone-auth-token"]["type"]="password";
$elem["trove/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, trove-api needs the Keystone
 authentication token.
";
$elem["trove/keystone-auth-token"]["descriptionde"]="Authentifizierungs-Token des Keystone-Servers:
 Trove-API benötigt das Keystone-Authentifizierungs-Token, um seinen Endpunkt in Keystone zu konfigurieren.
";
$elem["trove/keystone-auth-token"]["descriptionfr"]="Jeton d'authentification de Keystone :
 Pour configurer son point d'accès dans Keystone, l'API de Trove a besoin du jeton d'authentification de Keystone.
";
$elem["trove/keystone-auth-token"]["default"]="";
$elem["trove/endpoint-ip"]["type"]="string";
$elem["trove/endpoint-ip"]["description"]="Glance endpoint IP address:
 Please enter the IP address that will be used to contact Glance.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["trove/endpoint-ip"]["descriptionde"]="IP-Adresse des Glance-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Glance benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["trove/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès de Glance :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Glance.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["trove/endpoint-ip"]["default"]="";
$elem["trove/region-name"]["type"]="string";
$elem["trove/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["trove/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["trove/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["trove/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
