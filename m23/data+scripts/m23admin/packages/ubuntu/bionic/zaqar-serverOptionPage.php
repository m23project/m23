<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zaqar-server");

$elem["zaqar/register-endpoint"]["type"]="boolean";
$elem["zaqar/register-endpoint"]["description"]="Register Zaqar in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["zaqar/register-endpoint"]["descriptionde"]="";
$elem["zaqar/register-endpoint"]["descriptionfr"]="";
$elem["zaqar/register-endpoint"]["default"]="false";
$elem["zaqar/keystone-ip"]["type"]="string";
$elem["zaqar/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that zaqar-server can
 contact Keystone to do the Zaqar service and endpoint creation.
";
$elem["zaqar/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass zaqar-server Keystone kontaktieren kann, um den Zaqar-Dienst und den Endpunkt zu erstellen.
";
$elem["zaqar/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que zaqar-server puisse contacter Keystone pour établir le service Zaqar et créer le point d'accès.
";
$elem["zaqar/keystone-ip"]["default"]="";
$elem["zaqar/keystone-admin-name"]["type"]="string";
$elem["zaqar/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["zaqar/keystone-admin-name"]["descriptionde"]="";
$elem["zaqar/keystone-admin-name"]["descriptionfr"]="";
$elem["zaqar/keystone-admin-name"]["default"]="admin";
$elem["zaqar/keystone-project-name"]["type"]="string";
$elem["zaqar/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["zaqar/keystone-project-name"]["descriptionde"]="";
$elem["zaqar/keystone-project-name"]["descriptionfr"]="";
$elem["zaqar/keystone-project-name"]["default"]="admin";
$elem["zaqar/keystone-admin-password"]["type"]="password";
$elem["zaqar/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["zaqar/keystone-admin-password"]["descriptionde"]="";
$elem["zaqar/keystone-admin-password"]["descriptionfr"]="";
$elem["zaqar/keystone-admin-password"]["default"]="";
$elem["zaqar/endpoint-ip"]["type"]="string";
$elem["zaqar/endpoint-ip"]["description"]="Zaqar endpoint IP address:
 Please enter the IP address that will be used to contact Zaqar.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["zaqar/endpoint-ip"]["descriptionde"]="IP-Adresse des Zaqar-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Zaqar benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["zaqar/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Zaqar.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["zaqar/endpoint-ip"]["default"]="";
$elem["zaqar/region-name"]["type"]="string";
$elem["zaqar/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["zaqar/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["zaqar/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["zaqar/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
