<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("barbican-api");

$elem["barbican/register-endpoint"]["type"]="boolean";
$elem["barbican/register-endpoint"]["description"]="Register Barbican in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["barbican/register-endpoint"]["descriptionde"]="";
$elem["barbican/register-endpoint"]["descriptionfr"]="";
$elem["barbican/register-endpoint"]["default"]="false";
$elem["barbican/keystone-ip"]["type"]="string";
$elem["barbican/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that barbican-api can
 contact Keystone to do the Barbican service and endpoint creation.
";
$elem["barbican/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Barbican-API Keystone kontaktieren kann, um den Barbican-Dienst und den Endpunkt zu erstellen.
";
$elem["barbican/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Barbican puisse contacter Keystone pour établir le service Barbican et créer le point d'accès.
";
$elem["barbican/keystone-ip"]["default"]="";
$elem["barbican/keystone-admin-name"]["type"]="string";
$elem["barbican/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["barbican/keystone-admin-name"]["descriptionde"]="";
$elem["barbican/keystone-admin-name"]["descriptionfr"]="";
$elem["barbican/keystone-admin-name"]["default"]="admin";
$elem["barbican/keystone-project-name"]["type"]="string";
$elem["barbican/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["barbican/keystone-project-name"]["descriptionde"]="";
$elem["barbican/keystone-project-name"]["descriptionfr"]="";
$elem["barbican/keystone-project-name"]["default"]="admin";
$elem["barbican/keystone-admin-password"]["type"]="password";
$elem["barbican/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["barbican/keystone-admin-password"]["descriptionde"]="";
$elem["barbican/keystone-admin-password"]["descriptionfr"]="";
$elem["barbican/keystone-admin-password"]["default"]="";
$elem["barbican/endpoint-ip"]["type"]="string";
$elem["barbican/endpoint-ip"]["description"]="Barbican endpoint IP address:
 Please enter the IP address that will be used to contact Barbican.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["barbican/endpoint-ip"]["descriptionde"]="IP-Adresse des Barbican-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Barbican benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["barbican/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Barbican.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["barbican/endpoint-ip"]["default"]="";
$elem["barbican/region-name"]["type"]="string";
$elem["barbican/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["barbican/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["barbican/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["barbican/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
