<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nova-api");

$elem["nova/register-endpoint"]["type"]="boolean";
$elem["nova/register-endpoint"]["description"]="Register Nova in the keystone endpoint catalog?
 Each Openstack services (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". Select if you want to run these commands now.
 .
 Note that you will need to have an up and running keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["nova/register-endpoint"]["descriptionde"]="";
$elem["nova/register-endpoint"]["descriptionfr"]="";
$elem["nova/register-endpoint"]["default"]="false";
$elem["nova/keystone-ip"]["type"]="string";
$elem["nova/keystone-ip"]["description"]="Keystone IP address:
 Enter the IP address of your keystone server, so that nova-api can
 contact Keystone to do the Nova service and endpoint creation.
";
$elem["nova/keystone-ip"]["descriptionde"]="IP-Adresse von Keystone:
 Geben Sie die IP-Adresse Ihres Keystone-Servers ein, so dass »nova-api« Keystone zum Erstellen des Nova-Dienstes und des Endpunkts kontaktieren kann.
";
$elem["nova/keystone-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Nova puisse contacter Keystone pour établir le service Nova et créer le point d'accès.
";
$elem["nova/keystone-ip"]["default"]="";
$elem["nova/keystone-admin-name"]["type"]="string";
$elem["nova/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["nova/keystone-admin-name"]["descriptionde"]="";
$elem["nova/keystone-admin-name"]["descriptionfr"]="";
$elem["nova/keystone-admin-name"]["default"]="admin";
$elem["nova/keystone-project-name"]["type"]="string";
$elem["nova/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["nova/keystone-project-name"]["descriptionde"]="";
$elem["nova/keystone-project-name"]["descriptionfr"]="";
$elem["nova/keystone-project-name"]["default"]="admin";
$elem["nova/keystone-admin-password"]["type"]="password";
$elem["nova/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["nova/keystone-admin-password"]["descriptionde"]="";
$elem["nova/keystone-admin-password"]["descriptionfr"]="";
$elem["nova/keystone-admin-password"]["default"]="";
$elem["nova/endpoint-ip"]["type"]="string";
$elem["nova/endpoint-ip"]["description"]="Nova endpoint IP address:
 Enter the IP address that will be used to contact Nova (eg: the Nova
 endpoint IP address).
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["nova/endpoint-ip"]["descriptionde"]="IP-Adresse des Nova-Endpunkts:
 Geben Sie die IP-Adresse ein, die zum Kontaktieren von Nova benutzt werden soll (z.B.: die IP-Adresse des Nova-Endpunkts).
 .
 Auf diese IP-Adresse sollten Clients, die diesen Dienst nutzen, zugreifen können. Wenn Sie also eine öffentliche Cloud installieren, sollte dies eine öffentliche IP-Adresse sein.
";
$elem["nova/endpoint-ip"]["descriptionfr"]="
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Nova (ex : l'adresse IP du point d'accès Nova).
 .
 Cette adresse IP doit être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public, ce devra être une adresse IP publique.
";
$elem["nova/endpoint-ip"]["default"]="";
$elem["nova/region-name"]["type"]="string";
$elem["nova/region-name"]["description"]="Name of the region to register:
 Openstack can be used using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["nova/region-name"]["descriptionde"]="Name der Region zum Registrieren:
 OpenStack kann kann mittels Verfügbarkeitszonen benutzt werden, bei denen jede Region für einen Ort steht. Bitte geben Sie die Zone ein, die Sie beim Registrieren des Endpunkts verwenden möchten.
";
$elem["nova/region-name"]["descriptionfr"]="
 OpenStack prend en charge l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer la zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["nova/region-name"]["default"]="regionOne";
$elem["novaapi/configure_db"]["type"]="boolean";
$elem["novaapi/configure_db"]["description"]="Set up a database for Nova API?
 No database has been set up for Nova to use. If you want
 to set one up now, please make sure you have all needed
 information:
 .
  * the host name of the database server (which must allow TCP
    connections from this machine);
  * a username and password to access the database;
  * the type of database management software you want to use.
 .
 If you don't choose this option, no database will be set up and Nova
 will use regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure
 -plow nova-api\".
";
$elem["novaapi/configure_db"]["descriptionde"]="";
$elem["novaapi/configure_db"]["descriptionfr"]="";
$elem["novaapi/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
