<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zaqar-server");

$elem["zaqar/register-endpoint"]["type"]="boolean";
$elem["zaqar/register-endpoint"]["description"]="Register Zaqar in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["zaqar/register-endpoint"]["descriptionde"]="Zaqar im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen gestarteten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand des Keystone-Authentifizierungs-Tokens verbinden.
";
$elem["zaqar/register-endpoint"]["descriptionfr"]="Enregistrer Zaqar dans le catalogue de points d'accès Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["zaqar/register-endpoint"]["default"]="false";
$elem["zaqar/keystone-ip"]["type"]="string";
$elem["zaqar/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that zaqar-server can
 contact Keystone to do the Zaqar service and endpoint creation.
";
$elem["zaqar/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass zaqar-server Keystone kontaktieren kann, um den Zaqar-Dienst und den Endpunkt zu erstellen.
";
$elem["zaqar/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que zaqar-server puisse contacter Keystone pour établir le service Zaqar et créer le point d'accès.
";
$elem["zaqar/keystone-ip"]["default"]="";
$elem["zaqar/keystone-auth-token"]["type"]="password";
$elem["zaqar/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, zaqar-server needs the Keystone
 authentication token.
";
$elem["zaqar/keystone-auth-token"]["descriptionde"]="Keystone-Authentifizierungs-Token:
 zaqar-server benötigt das Keystone-Authentifizierungs-Token, um seinen Endpunkt in Keystone zu konfigurieren.
";
$elem["zaqar/keystone-auth-token"]["descriptionfr"]="
 Pour configurer son point d'accès dans Keystone, zaqar-server a besoin du jeton d'authentification Keystone.
";
$elem["zaqar/keystone-auth-token"]["default"]="";
$elem["zaqar/endpoint-ip"]["type"]="string";
$elem["zaqar/endpoint-ip"]["description"]="Zaqar endpoint IP address:
 Please enter the IP address that will be used to contact Zaqar.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["zaqar/endpoint-ip"]["descriptionde"]="IP-Adresse des Zaqar-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Zaqar benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["zaqar/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Zaqar.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["zaqar/endpoint-ip"]["default"]="";
$elem["zaqar/region-name"]["type"]="string";
$elem["zaqar/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["zaqar/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["zaqar/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["zaqar/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
