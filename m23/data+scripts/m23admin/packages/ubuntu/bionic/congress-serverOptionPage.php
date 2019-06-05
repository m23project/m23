<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("congress-server");

$elem["congress/register-endpoint"]["type"]="boolean";
$elem["congress/register-endpoint"]["description"]="Register Congress in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["congress/register-endpoint"]["descriptionde"]="";
$elem["congress/register-endpoint"]["descriptionfr"]="Enregistrer Congress dans le catalogue de points d'accès Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter en utilisant un nom d'administrateur de projet connu, ainsi qu'un nom d'utilisateur et un mot de passe. Le jeton d'authentification n'est plus utilisé.
";
$elem["congress/register-endpoint"]["default"]="false";
$elem["congress/keystone-ip"]["type"]="string";
$elem["congress/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that congress-server can
 contact Keystone to do the Congress service and endpoint creation.
";
$elem["congress/keystone-ip"]["descriptionde"]="";
$elem["congress/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que le serveur Congress puisse contacter Keystone pour établir le service Congress et créer le point d'accès.
";
$elem["congress/keystone-ip"]["default"]="";
$elem["congress/keystone-admin-name"]["type"]="string";
$elem["congress/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["congress/keystone-admin-name"]["descriptionde"]="";
$elem["congress/keystone-admin-name"]["descriptionfr"]="Nom d'utilisateur pour Keystone :
 Pour enregistrer le point d'accès du service, le paquet a besoin de l'identifiant de l'administrateur, le nom du projet et le mot de passe du serveur Keystone.
";
$elem["congress/keystone-admin-name"]["default"]="admin";
$elem["congress/keystone-project-name"]["type"]="string";
$elem["congress/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["congress/keystone-project-name"]["descriptionde"]="";
$elem["congress/keystone-project-name"]["descriptionfr"]="Nom d'administrateur du projet Keystone :
 Pour enregistrer le point d'accès du service, le paquet a besoin de l'identifiant de l'administrateur, le nom du projet et le mot de passe du serveur Keystone.
";
$elem["congress/keystone-project-name"]["default"]="admin";
$elem["congress/keystone-admin-password"]["type"]="password";
$elem["congress/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["congress/keystone-admin-password"]["descriptionde"]="";
$elem["congress/keystone-admin-password"]["descriptionfr"]="Mot de passe de l'administrateur de Keystone :
 Pour enregistrer le point d'accès du service, le paquet a besoin de l'identifiant de l'administrateur, le nom du projet et le mot de passe du serveur Keystone.
";
$elem["congress/keystone-admin-password"]["default"]="";
$elem["congress/endpoint-ip"]["type"]="string";
$elem["congress/endpoint-ip"]["description"]="Congress endpoint IP address:
 Please enter the IP address that will be used to contact Congress.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["congress/endpoint-ip"]["descriptionde"]="";
$elem["congress/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Congress :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Congress.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["congress/endpoint-ip"]["default"]="";
$elem["congress/region-name"]["type"]="string";
$elem["congress/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["congress/region-name"]["descriptionde"]="";
$elem["congress/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["congress/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
