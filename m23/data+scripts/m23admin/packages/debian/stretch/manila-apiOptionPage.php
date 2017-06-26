<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("manila-api");

$elem["manila/register-endpoint"]["type"]="boolean";
$elem["manila/register-endpoint"]["description"]="Register Manila in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["manila/register-endpoint"]["descriptionde"]="";
$elem["manila/register-endpoint"]["descriptionfr"]="";
$elem["manila/register-endpoint"]["default"]="false";
$elem["manila/keystone-ip"]["type"]="string";
$elem["manila/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that manila-api can
 contact Keystone to do the Manila service and endpoint creation.
";
$elem["manila/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Manila-API Keystone kontaktieren kann, um den Manila-Dienst und den Endpunkt zu erstellen.
";
$elem["manila/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Manila puisse contacter Keystone pour établir le service Manila et créer le point d'accès.
";
$elem["manila/keystone-ip"]["default"]="";
$elem["manila/keystone-admin-name"]["type"]="string";
$elem["manila/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["manila/keystone-admin-name"]["descriptionde"]="";
$elem["manila/keystone-admin-name"]["descriptionfr"]="";
$elem["manila/keystone-admin-name"]["default"]="admin";
$elem["manila/keystone-project-name"]["type"]="string";
$elem["manila/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["manila/keystone-project-name"]["descriptionde"]="";
$elem["manila/keystone-project-name"]["descriptionfr"]="";
$elem["manila/keystone-project-name"]["default"]="admin";
$elem["manila/keystone-admin-password"]["type"]="password";
$elem["manila/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["manila/keystone-admin-password"]["descriptionde"]="";
$elem["manila/keystone-admin-password"]["descriptionfr"]="";
$elem["manila/keystone-admin-password"]["default"]="";
$elem["manila/endpoint-ip"]["type"]="string";
$elem["manila/endpoint-ip"]["description"]="Manila endpoint IP address:
 Please enter the IP address that will be used to contact Manila.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["manila/endpoint-ip"]["descriptionde"]="IP-Adresse des Manila-Endpunkts
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Manila benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["manila/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Manila.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["manila/endpoint-ip"]["default"]="";
$elem["manila/region-name"]["type"]="string";
$elem["manila/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["manila/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["manila/region-name"]["descriptionfr"]="
 OpenStack gère l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["manila/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
