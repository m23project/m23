<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("neutron-server");

$elem["neutron/register-endpoint"]["type"]="boolean";
$elem["neutron/register-endpoint"]["description"]="Register Neutron in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["neutron/register-endpoint"]["descriptionde"]="";
$elem["neutron/register-endpoint"]["descriptionfr"]="";
$elem["neutron/register-endpoint"]["default"]="false";
$elem["neutron/keystone-ip"]["type"]="string";
$elem["neutron/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that neutron-api can
 contact Keystone to do the Neutron service and endpoint creation.
";
$elem["neutron/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Neutron-API Keystone kontaktieren kann, um den Neutron-Dienst und den Endpunkt zu erstellen.
";
$elem["neutron/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Neutron puisse contacter Keystone pour établir le service Neutron et créer le point d'accès.
";
$elem["neutron/keystone-ip"]["default"]="";
$elem["neutron/keystone-admin-name"]["type"]="string";
$elem["neutron/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["neutron/keystone-admin-name"]["descriptionde"]="";
$elem["neutron/keystone-admin-name"]["descriptionfr"]="";
$elem["neutron/keystone-admin-name"]["default"]="admin";
$elem["neutron/keystone-project-name"]["type"]="string";
$elem["neutron/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["neutron/keystone-project-name"]["descriptionde"]="";
$elem["neutron/keystone-project-name"]["descriptionfr"]="";
$elem["neutron/keystone-project-name"]["default"]="admin";
$elem["neutron/keystone-admin-password"]["type"]="password";
$elem["neutron/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["neutron/keystone-admin-password"]["descriptionde"]="";
$elem["neutron/keystone-admin-password"]["descriptionfr"]="";
$elem["neutron/keystone-admin-password"]["default"]="";
$elem["neutron/endpoint-ip"]["type"]="string";
$elem["neutron/endpoint-ip"]["description"]="Neutron endpoint IP address:
 Please enter the IP address that will be used to contact Neutron.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["neutron/endpoint-ip"]["descriptionde"]="IP-Adresse des Neutron-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Neutron benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["neutron/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Neutron :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Neutron.
 .
 L'adresse IP devra être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public ce devra être une adresse IP publique.
";
$elem["neutron/endpoint-ip"]["default"]="";
$elem["neutron/region-name"]["type"]="string";
$elem["neutron/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["neutron/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["neutron/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["neutron/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
