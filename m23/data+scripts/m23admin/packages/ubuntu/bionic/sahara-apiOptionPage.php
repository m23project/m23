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
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["sahara/register-endpoint"]["descriptionde"]="";
$elem["sahara/register-endpoint"]["descriptionfr"]="";
$elem["sahara/register-endpoint"]["default"]="false";
$elem["sahara/keystone-ip"]["type"]="string";
$elem["sahara/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that sahara-api can
 contact Keystone to do the Sahara service and endpoint creation.
";
$elem["sahara/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Sahara-API Keystone kontaktieren kann, um den Sahara-Dienst und den Endpunkt zu erstellen.
";
$elem["sahara/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Sahara puisse contacter Keystone pour établir le service Sahara et créer le point d'accès.
";
$elem["sahara/keystone-ip"]["default"]="";
$elem["sahara/keystone-admin-name"]["type"]="string";
$elem["sahara/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["sahara/keystone-admin-name"]["descriptionde"]="";
$elem["sahara/keystone-admin-name"]["descriptionfr"]="";
$elem["sahara/keystone-admin-name"]["default"]="admin";
$elem["sahara/keystone-project-name"]["type"]="string";
$elem["sahara/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["sahara/keystone-project-name"]["descriptionde"]="";
$elem["sahara/keystone-project-name"]["descriptionfr"]="";
$elem["sahara/keystone-project-name"]["default"]="admin";
$elem["sahara/keystone-admin-password"]["type"]="password";
$elem["sahara/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["sahara/keystone-admin-password"]["descriptionde"]="";
$elem["sahara/keystone-admin-password"]["descriptionfr"]="";
$elem["sahara/keystone-admin-password"]["default"]="";
$elem["sahara/endpoint-ip"]["type"]="string";
$elem["sahara/endpoint-ip"]["description"]="Sahara endpoint IP address:
 Please enter the IP address that will be used to contact Sahara.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["sahara/endpoint-ip"]["descriptionde"]="IP-Adresse des Sahara-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Sahara benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
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
$elem["sahara/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["sahara/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["sahara/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
