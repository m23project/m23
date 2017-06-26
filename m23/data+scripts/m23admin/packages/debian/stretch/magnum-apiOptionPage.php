<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("magnum-api");

$elem["magnum/register-endpoint"]["type"]="boolean";
$elem["magnum/register-endpoint"]["description"]="Register Magnum in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["magnum/register-endpoint"]["descriptionde"]="";
$elem["magnum/register-endpoint"]["descriptionfr"]="";
$elem["magnum/register-endpoint"]["default"]="false";
$elem["magnum/keystone-ip"]["type"]="string";
$elem["magnum/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that magnum-api can
 contact Keystone to do the Magnum service and endpoint creation.
";
$elem["magnum/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Magnum-API Keystone kontaktieren kann, um den Magnum-Dienst und den Endpunkt zu erstellen.
";
$elem["magnum/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Magnum puisse contacter Keystone pour établir le service Magnum et créer le point d'accès.
";
$elem["magnum/keystone-ip"]["default"]="";
$elem["magnum/keystone-admin-name"]["type"]="string";
$elem["magnum/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["magnum/keystone-admin-name"]["descriptionde"]="";
$elem["magnum/keystone-admin-name"]["descriptionfr"]="";
$elem["magnum/keystone-admin-name"]["default"]="admin";
$elem["magnum/keystone-project-name"]["type"]="string";
$elem["magnum/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["magnum/keystone-project-name"]["descriptionde"]="";
$elem["magnum/keystone-project-name"]["descriptionfr"]="";
$elem["magnum/keystone-project-name"]["default"]="admin";
$elem["magnum/keystone-admin-password"]["type"]="password";
$elem["magnum/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["magnum/keystone-admin-password"]["descriptionde"]="";
$elem["magnum/keystone-admin-password"]["descriptionfr"]="";
$elem["magnum/keystone-admin-password"]["default"]="";
$elem["magnum/endpoint-ip"]["type"]="string";
$elem["magnum/endpoint-ip"]["description"]="Magnum endpoint IP address:
 Please enter the IP address that will be used to contact Magnum.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["magnum/endpoint-ip"]["descriptionde"]="IP-Adresse des Magnum-Endpunkts
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Magnum benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["magnum/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Magnum.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["magnum/endpoint-ip"]["default"]="";
$elem["magnum/region-name"]["type"]="string";
$elem["magnum/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["magnum/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["magnum/region-name"]["descriptionfr"]="
 OpenStack gère l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["magnum/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
