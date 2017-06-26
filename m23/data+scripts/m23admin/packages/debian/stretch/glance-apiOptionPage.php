<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glance-api");

$elem["glance/register-endpoint"]["type"]="boolean";
$elem["glance/register-endpoint"]["description"]="Register Glance in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["glance/register-endpoint"]["descriptionde"]="";
$elem["glance/register-endpoint"]["descriptionfr"]="";
$elem["glance/register-endpoint"]["default"]="false";
$elem["glance/keystone-ip"]["type"]="string";
$elem["glance/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that glance-api can
 contact Keystone to do the Glance service and endpoint creation.
";
$elem["glance/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Glance-API Keystone kontaktieren kann, um den Glance-Dienst und den Endpunkt zu erstellen.
";
$elem["glance/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Glance puisse contacter Keystone pour établir le service Glance et créer le point d'accès.
";
$elem["glance/keystone-ip"]["default"]="";
$elem["glance/keystone-admin-name"]["type"]="string";
$elem["glance/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["glance/keystone-admin-name"]["descriptionde"]="";
$elem["glance/keystone-admin-name"]["descriptionfr"]="";
$elem["glance/keystone-admin-name"]["default"]="admin";
$elem["glance/keystone-project-name"]["type"]="string";
$elem["glance/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["glance/keystone-project-name"]["descriptionde"]="";
$elem["glance/keystone-project-name"]["descriptionfr"]="";
$elem["glance/keystone-project-name"]["default"]="admin";
$elem["glance/keystone-admin-password"]["type"]="password";
$elem["glance/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["glance/keystone-admin-password"]["descriptionde"]="";
$elem["glance/keystone-admin-password"]["descriptionfr"]="";
$elem["glance/keystone-admin-password"]["default"]="";
$elem["glance/endpoint-ip"]["type"]="string";
$elem["glance/endpoint-ip"]["description"]="Glance endpoint IP address:
 Please enter the IP address that will be used to contact Glance.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["glance/endpoint-ip"]["descriptionde"]="IP-Adresse des Glance-Endpunkts
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Glance benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["glance/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Glance.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["glance/endpoint-ip"]["default"]="";
$elem["glance/region-name"]["type"]="string";
$elem["glance/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["glance/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["glance/region-name"]["descriptionfr"]="
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["glance/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
