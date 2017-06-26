<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ceilometer-api");

$elem["ceilometer/register-endpoint"]["type"]="boolean";
$elem["ceilometer/register-endpoint"]["description"]="Register Ceilometer in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["ceilometer/register-endpoint"]["descriptionde"]="";
$elem["ceilometer/register-endpoint"]["descriptionfr"]="";
$elem["ceilometer/register-endpoint"]["default"]="false";
$elem["ceilometer/keystone-ip"]["type"]="string";
$elem["ceilometer/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that ceilometer-api can
 contact Keystone to do the Ceilometer service and endpoint creation.
";
$elem["ceilometer/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Geben Sie bitte die IP-Adresse des Keystone-Servers an, damit Ceilometer-api Keystone kontaktieren kann, um den Ceilometer-Dienst und -Endpunkt zu erstellen
";
$elem["ceilometer/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Ceilometer puisse contacter Keystone pour établir le service Ceilometer et créer le point d'accès.
";
$elem["ceilometer/keystone-ip"]["default"]="";
$elem["ceilometer/keystone-admin-name"]["type"]="string";
$elem["ceilometer/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["ceilometer/keystone-admin-name"]["descriptionde"]="";
$elem["ceilometer/keystone-admin-name"]["descriptionfr"]="";
$elem["ceilometer/keystone-admin-name"]["default"]="admin";
$elem["ceilometer/keystone-project-name"]["type"]="string";
$elem["ceilometer/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["ceilometer/keystone-project-name"]["descriptionde"]="";
$elem["ceilometer/keystone-project-name"]["descriptionfr"]="";
$elem["ceilometer/keystone-project-name"]["default"]="admin";
$elem["ceilometer/keystone-admin-password"]["type"]="password";
$elem["ceilometer/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["ceilometer/keystone-admin-password"]["descriptionde"]="";
$elem["ceilometer/keystone-admin-password"]["descriptionfr"]="";
$elem["ceilometer/keystone-admin-password"]["default"]="";
$elem["ceilometer/endpoint-ip"]["type"]="string";
$elem["ceilometer/endpoint-ip"]["description"]="Ceilometer endpoint IP address:
 Please enter the IP address that will be used to contact Ceilometer.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["ceilometer/endpoint-ip"]["descriptionde"]="IP-Adresse des Ceilometer-Endpunkts:
 Bitte geben Sie bitte die IP-Adresse an, die für den Kontakt mit Ceilometer genutzt wird.
 .
 Diese IP-Adresse sollte von den Clients erreichbar sein, die diesen Dienst nutzen. Falls Sie eine öffentliche Cloud installieren, sollte dies eine öffentliche IP-Adresse sein.
";
$elem["ceilometer/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Ceilometer :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Ceilometer.
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["ceilometer/endpoint-ip"]["default"]="";
$elem["ceilometer/region-name"]["type"]="string";
$elem["ceilometer/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["ceilometer/region-name"]["descriptionde"]="Name der zu registrierenden Region:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, in denen jede Region einen Ort darstellt. Geben Sie bitte die Zone an, die Sie bei der Registrierung des Endpunkts verwenden wollen.
";
$elem["ceilometer/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["ceilometer/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
