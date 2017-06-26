<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sahara-api");

$elem["sahara/register-endpoint"]["type"]="boolean";
$elem["sahara/register-endpoint"]["description"]="Register Sahara in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["sahara/register-endpoint"]["descriptionde"]="";
$elem["sahara/register-endpoint"]["descriptionfr"]="Enregistrer Sahara dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut maintenant être fait automatiquement.
 .
 Veuillez noter que vous aurez besoin d'avoir un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["sahara/register-endpoint"]["default"]="false";
$elem["sahara/keystone-ip"]["type"]="string";
$elem["sahara/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that sahara-api can
 contact Keystone to do the Sahara service and endpoint creation.
";
$elem["sahara/keystone-ip"]["descriptionde"]="";
$elem["sahara/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Sahara puisse contacter Keystone pour établir le service Sahara et créer le point d'accès.
";
$elem["sahara/keystone-ip"]["default"]="";
$elem["sahara/keystone-auth-token"]["type"]="password";
$elem["sahara/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, sahara-api needs the Keystone
 authentication token.
";
$elem["sahara/keystone-auth-token"]["descriptionde"]="";
$elem["sahara/keystone-auth-token"]["descriptionfr"]="Jeton d'authentification Keystone :
 Pour configurer son point d'accès dans Keystone, l'API de Sahara a besoin du jeton d'authentification Keystone.
";
$elem["sahara/keystone-auth-token"]["default"]="";
$elem["sahara/endpoint-ip"]["type"]="string";
$elem["sahara/endpoint-ip"]["description"]="Sahara endpoint IP address:
 Please enter the IP address that will be used to contact Sahara.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["sahara/endpoint-ip"]["descriptionde"]="";
$elem["sahara/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Sahara :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Sahara.
 .
 L'adresse IP devra être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public ce devra être une adresse IP publique.
";
$elem["sahara/endpoint-ip"]["default"]="";
$elem["sahara/region-name"]["type"]="string";
$elem["sahara/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["sahara/region-name"]["descriptionde"]="";
$elem["sahara/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["sahara/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
