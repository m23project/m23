<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mistral-api");

$elem["mistral/register-endpoint"]["type"]="boolean";
$elem["mistral/register-endpoint"]["description"]="Register Mistral in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["mistral/register-endpoint"]["descriptionde"]="";
$elem["mistral/register-endpoint"]["descriptionfr"]="";
$elem["mistral/register-endpoint"]["default"]="false";
$elem["mistral/keystone-ip"]["type"]="string";
$elem["mistral/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that mistral-api can
 contact Keystone to do the Mistral service and endpoint creation.
";
$elem["mistral/keystone-ip"]["descriptionde"]="";
$elem["mistral/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Mistral puisse contacter Keystone pour établir le service Mistral et créer le point d'accès.
";
$elem["mistral/keystone-ip"]["default"]="";
$elem["mistral/keystone-admin-name"]["type"]="string";
$elem["mistral/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["mistral/keystone-admin-name"]["descriptionde"]="";
$elem["mistral/keystone-admin-name"]["descriptionfr"]="";
$elem["mistral/keystone-admin-name"]["default"]="admin";
$elem["mistal/keystone-project-name"]["type"]="string";
$elem["mistal/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["mistal/keystone-project-name"]["descriptionde"]="";
$elem["mistal/keystone-project-name"]["descriptionfr"]="";
$elem["mistal/keystone-project-name"]["default"]="admin";
$elem["mistral/keystone-admin-password"]["type"]="password";
$elem["mistral/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["mistral/keystone-admin-password"]["descriptionde"]="";
$elem["mistral/keystone-admin-password"]["descriptionfr"]="";
$elem["mistral/keystone-admin-password"]["default"]="";
$elem["mistral/endpoint-ip"]["type"]="string";
$elem["mistral/endpoint-ip"]["description"]="Mistral endpoint IP address:
 Please enter the IP address that will be used to contact Mistral.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["mistral/endpoint-ip"]["descriptionde"]="";
$elem["mistral/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Mistral.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["mistral/endpoint-ip"]["default"]="";
$elem["mistral/region-name"]["type"]="string";
$elem["mistral/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["mistral/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["mistral/region-name"]["descriptionfr"]="
 OpenStack gère l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["mistral/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
