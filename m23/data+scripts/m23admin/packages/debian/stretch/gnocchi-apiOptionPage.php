<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnocchi-api");

$elem["gnocchi/register-endpoint"]["type"]="boolean";
$elem["gnocchi/register-endpoint"]["description"]="Register Gnocchi in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["gnocchi/register-endpoint"]["descriptionde"]="";
$elem["gnocchi/register-endpoint"]["descriptionfr"]="";
$elem["gnocchi/register-endpoint"]["default"]="false";
$elem["gnocchi/keystone-ip"]["type"]="string";
$elem["gnocchi/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that gnocchi-api can
 contact Keystone to do the Gnocchi service and endpoint creation.
";
$elem["gnocchi/keystone-ip"]["descriptionde"]="";
$elem["gnocchi/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Gnocchi puisse contacter Keystone pour établir le service Glance et créer le point d'accès.
";
$elem["gnocchi/keystone-ip"]["default"]="";
$elem["gnocchi/keystone-admin-name"]["type"]="string";
$elem["gnocchi/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["gnocchi/keystone-admin-name"]["descriptionde"]="";
$elem["gnocchi/keystone-admin-name"]["descriptionfr"]="";
$elem["gnocchi/keystone-admin-name"]["default"]="admin";
$elem["gnocchi/keystone-project-name"]["type"]="string";
$elem["gnocchi/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["gnocchi/keystone-project-name"]["descriptionde"]="";
$elem["gnocchi/keystone-project-name"]["descriptionfr"]="";
$elem["gnocchi/keystone-project-name"]["default"]="admin";
$elem["gnocchi/keystone-admin-password"]["type"]="password";
$elem["gnocchi/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["gnocchi/keystone-admin-password"]["descriptionde"]="";
$elem["gnocchi/keystone-admin-password"]["descriptionfr"]="";
$elem["gnocchi/keystone-admin-password"]["default"]="";
$elem["gnocchi/endpoint-ip"]["type"]="string";
$elem["gnocchi/endpoint-ip"]["description"]="Gnocchi endpoint IP address:
 Please enter the IP address that will be used to contact Gnocchi.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["gnocchi/endpoint-ip"]["descriptionde"]="";
$elem["gnocchi/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Gnocchi.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["gnocchi/endpoint-ip"]["default"]="";
$elem["gnocchi/region-name"]["type"]="string";
$elem["gnocchi/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["gnocchi/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["gnocchi/region-name"]["descriptionfr"]="
 OpenStack gère l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["gnocchi/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
