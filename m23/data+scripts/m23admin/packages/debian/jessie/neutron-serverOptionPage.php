<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("neutron-server");

$elem["neutron/register-endpoint"]["type"]="boolean";
$elem["neutron/register-endpoint"]["description"]="Register Neutron in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["neutron/register-endpoint"]["descriptionde"]="Neutron im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand des Keystone-Authentifizierungs-Tokens verbinden.
";
$elem["neutron/register-endpoint"]["descriptionfr"]="Enregistrer Neutron dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut maintenant être fait automatiquement.
 .
 Veuillez noter que vous aurez besoin d'avoir un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["neutron/register-endpoint"]["default"]="false";
$elem["neutron/keystone-ip"]["type"]="string";
$elem["neutron/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that neutron-api can
 contact Keystone to do the Neutron service and endpoint creation.
";
$elem["neutron/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Neutron-API Keystone kontaktieren kann, um den Neutron-Dienst und den Endpunkt zu erstellen.
";
$elem["neutron/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Neutron puisse contacter Keystone pour établir le service Neutron et créer le point d'accès.
";
$elem["neutron/keystone-ip"]["default"]="";
$elem["neutron/keystone-auth-token"]["type"]="password";
$elem["neutron/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, neutron-server needs the Keystone auth
 token.
";
$elem["neutron/keystone-auth-token"]["descriptionde"]="Authentifizierungs-Token des Keystone-Servers:
 Neutron-Server benötigt das Keystone-Authentifizierungs-Token, um seinen Endpunkt in Keystone zu konfigurieren.
";
$elem["neutron/keystone-auth-token"]["descriptionfr"]="Jeton d'authentification Keystone :
 Pour configurer son point d'accès dans Keystone, le serveur Neutron a besoin du jeton d'authentification Keystone.
";
$elem["neutron/keystone-auth-token"]["default"]="";
$elem["neutron/endpoint-ip"]["type"]="string";
$elem["neutron/endpoint-ip"]["description"]="Neutron endpoint IP address:
 Please enter the IP address that will be used to contact Neutron.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["neutron/endpoint-ip"]["descriptionde"]="IP-Adresse des Neutron-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Neutron benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["neutron/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Neutron :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Neutron.
 .
 L'adresse IP devra être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public ce devra être une adresse IP publique.
";
$elem["neutron/endpoint-ip"]["default"]="";
$elem["neutron/region-name"]["type"]="string";
$elem["neutron/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["neutron/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["neutron/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["neutron/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
