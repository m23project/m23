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
 connect using the Keystone authentication token.
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
$elem["mistral/keystone-ip"]["descriptionfr"]="";
$elem["mistral/keystone-ip"]["default"]="";
$elem["mistral/keystone-auth-token"]["type"]="password";
$elem["mistral/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, mistral-api needs the Keystone
 authentication token.
";
$elem["mistral/keystone-auth-token"]["descriptionde"]="";
$elem["mistral/keystone-auth-token"]["descriptionfr"]="";
$elem["mistral/keystone-auth-token"]["default"]="";
$elem["mistral/endpoint-ip"]["type"]="string";
$elem["mistral/endpoint-ip"]["description"]="Mistral endpoint IP address:
 Please enter the IP address that will be used to contact Mistral.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["mistral/endpoint-ip"]["descriptionde"]="";
$elem["mistral/endpoint-ip"]["descriptionfr"]="";
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
