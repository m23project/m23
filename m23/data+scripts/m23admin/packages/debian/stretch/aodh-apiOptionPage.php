<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aodh-api");

$elem["aodh/register-endpoint"]["type"]="boolean";
$elem["aodh/register-endpoint"]["description"]="Register Aodh in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["aodh/register-endpoint"]["descriptionde"]="";
$elem["aodh/register-endpoint"]["descriptionfr"]="";
$elem["aodh/register-endpoint"]["default"]="false";
$elem["aodh/keystone-ip"]["type"]="string";
$elem["aodh/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that aodh-api can
 contact Keystone to do the Aodh service and endpoint creation.
";
$elem["aodh/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Aodh-API Keystone kontaktieren kann, um den Aodh-Dienst und den Endpunkt zu erstellen.
";
$elem["aodh/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Aodh puisse contacter Keystone pour établir le service Aodh et créer le point d'accès.
";
$elem["aodh/keystone-ip"]["default"]="";
$elem["aodh/keystone-admin-name"]["type"]="string";
$elem["aodh/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["aodh/keystone-admin-name"]["descriptionde"]="";
$elem["aodh/keystone-admin-name"]["descriptionfr"]="";
$elem["aodh/keystone-admin-name"]["default"]="admin";
$elem["aodh/keystone-project-name"]["type"]="string";
$elem["aodh/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["aodh/keystone-project-name"]["descriptionde"]="";
$elem["aodh/keystone-project-name"]["descriptionfr"]="";
$elem["aodh/keystone-project-name"]["default"]="admin";
$elem["aodh/keystone-admin-password"]["type"]="password";
$elem["aodh/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["aodh/keystone-admin-password"]["descriptionde"]="";
$elem["aodh/keystone-admin-password"]["descriptionfr"]="";
$elem["aodh/keystone-admin-password"]["default"]="";
$elem["aodh/endpoint-ip"]["type"]="string";
$elem["aodh/endpoint-ip"]["description"]="Aodh endpoint IP address:
 Please enter the IP address that will be used to contact Aodh.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["aodh/endpoint-ip"]["descriptionde"]="IP-Adresse des Aodh-Endpunkts
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Aodh benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["aodh/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Aodh.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["aodh/endpoint-ip"]["default"]="";
$elem["aodh/region-name"]["type"]="string";
$elem["aodh/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["aodh/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["aodh/region-name"]["descriptionfr"]="
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["aodh/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
