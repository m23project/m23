<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("designate-api");

$elem["designate/register-endpoint"]["type"]="boolean";
$elem["designate/register-endpoint"]["description"]="Register Designate in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["designate/register-endpoint"]["descriptionde"]="";
$elem["designate/register-endpoint"]["descriptionfr"]="";
$elem["designate/register-endpoint"]["default"]="false";
$elem["designate/keystone-ip"]["type"]="string";
$elem["designate/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that designate-api can
 contact Keystone to do the Designate service and endpoint creation.
";
$elem["designate/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers ein, so dass sich Designate-api mit dem Keystone verbinden kann, um die Erstellung der Designate-Dienste und -Endpunkte vorzunehmen.
";
$elem["designate/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de designate puisse contacter Keystone pour établir le service Designate ainsi que la création du point d'accès.
";
$elem["designate/keystone-ip"]["default"]="";
$elem["designate/keystone-admin-name"]["type"]="string";
$elem["designate/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["designate/keystone-admin-name"]["descriptionde"]="";
$elem["designate/keystone-admin-name"]["descriptionfr"]="";
$elem["designate/keystone-admin-name"]["default"]="admin";
$elem["designate/keystone-project-name"]["type"]="string";
$elem["designate/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["designate/keystone-project-name"]["descriptionde"]="";
$elem["designate/keystone-project-name"]["descriptionfr"]="";
$elem["designate/keystone-project-name"]["default"]="admin";
$elem["designate/keystone-admin-password"]["type"]="password";
$elem["designate/keystone-admin-password"]["description"]="Keystone authentication token:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["designate/keystone-admin-password"]["descriptionde"]="";
$elem["designate/keystone-admin-password"]["descriptionfr"]="";
$elem["designate/keystone-admin-password"]["default"]="";
$elem["designate/endpoint-ip"]["type"]="string";
$elem["designate/endpoint-ip"]["description"]="Designate endpoint IP address:
 Please enter the IP address that will be used to contact Designate.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["designate/endpoint-ip"]["descriptionde"]="IP-Adresse des Designate-Endpoints
 Bitte geben Sie die IP-Adresse ein, die für Verbindungen mit Designate verwandt werden wird.
 .
 Diese IP-Adresse sollte von den Clients, die diesen Dienst nutzen werden, zugreifbar sein. Installieren Sie daher eine öffentliche Cloud, dann sollte dieses eine öffentliche IP-Adresse sein.
";
$elem["designate/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Designate.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, elle devra être une adresse IP publique.
";
$elem["designate/endpoint-ip"]["default"]="";
$elem["designate/region-name"]["type"]="string";
$elem["designate/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["designate/region-name"]["descriptionde"]="Name der zu registrierenden Region:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, wobei jede Region einen Ort darstellt. Bitte geben Sie die Zone ein, die Sie bei der Registrierung des Endpunkts verwenden möchten.
";
$elem["designate/region-name"]["descriptionfr"]="
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["designate/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
