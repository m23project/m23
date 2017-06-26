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
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["murano/register-endpoint"]["descriptionde"]="";
$elem["murano/register-endpoint"]["descriptionfr"]="";
$elem["murano/register-endpoint"]["default"]="false";
$elem["murano/keystone-ip"]["type"]="string";
$elem["murano/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that murano-api can
 contact Keystone to do the Murano service and endpoint creation.
";
$elem["murano/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Murano-API Keystone kontaktieren kann, um den Murano-Dienst und den Endpunkt zu erstellen.
";
$elem["murano/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Murano puisse contacter Keystone pour établir le service Murano et créer le point d'accès.
";
$elem["murano/keystone-ip"]["default"]="";
$elem["murano/keystone-admin-name"]["type"]="string";
$elem["murano/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["murano/keystone-admin-name"]["descriptionde"]="";
$elem["murano/keystone-admin-name"]["descriptionfr"]="";
$elem["murano/keystone-admin-name"]["default"]="admin";
$elem["murano/keystone-project-name"]["type"]="string";
$elem["murano/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["murano/keystone-project-name"]["descriptionde"]="";
$elem["murano/keystone-project-name"]["descriptionfr"]="";
$elem["murano/keystone-project-name"]["default"]="admin";
$elem["murano/keystone-admin-password"]["type"]="password";
$elem["murano/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["murano/keystone-admin-password"]["descriptionde"]="";
$elem["murano/keystone-admin-password"]["descriptionfr"]="";
$elem["murano/keystone-admin-password"]["default"]="";
$elem["murano/endpoint-ip"]["type"]="string";
$elem["murano/endpoint-ip"]["description"]="Murano endpoint IP address:
 Please enter the IP address that will be used to contact Murano.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["murano/endpoint-ip"]["descriptionde"]="IP-Adresse des Murano-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Murano benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
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
$elem["murano/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["murano/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["murano/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
