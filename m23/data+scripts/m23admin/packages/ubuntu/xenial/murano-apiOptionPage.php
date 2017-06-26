<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("murano-api");

$elem["murano/register-endpoint"]["type"]="boolean";
$elem["murano/register-endpoint"]["description"]="Register Murano in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["murano/register-endpoint"]["descriptionde"]="";
$elem["murano/register-endpoint"]["descriptionfr"]="Enregistrer Murano dans le catalogue de points d'accès Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["murano/register-endpoint"]["default"]="false";
$elem["murano/keystone-ip"]["type"]="string";
$elem["murano/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that murano-api can
 contact Keystone to do the Murano service and endpoint creation.
";
$elem["murano/keystone-ip"]["descriptionde"]="";
$elem["murano/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Murano puisse contacter Keystone pour établir le service Murano et créer le point d'accès.
";
$elem["murano/keystone-ip"]["default"]="";
$elem["murano/keystone-auth-token"]["type"]="password";
$elem["murano/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, murano-api needs the Keystone
 authentication token.
";
$elem["murano/keystone-auth-token"]["descriptionde"]="";
$elem["murano/keystone-auth-token"]["descriptionfr"]="
 Pour configurer son point d'accès dans Keystone, l'api de Murano a besoin du jeton d'authentification Keystone.
";
$elem["murano/keystone-auth-token"]["default"]="";
$elem["murano/endpoint-ip"]["type"]="string";
$elem["murano/endpoint-ip"]["description"]="Murano endpoint IP address:
 Please enter the IP address that will be used to contact Murano.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["murano/endpoint-ip"]["descriptionde"]="";
$elem["murano/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Murano.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["murano/endpoint-ip"]["default"]="";
$elem["murano/region-name"]["type"]="string";
$elem["murano/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["murano/region-name"]["descriptionde"]="";
$elem["murano/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["murano/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
