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
 connect using the Keystone auth token.
";
$elem["nova/register-endpoint"]["descriptionde"]="Soll Nova im Keystone-Endpunktkatalog registriert werden?
 Alle OpenStack-Dienste (jedes API) sollten registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erledigt. Wählen Sie, ob Sie diese Befehle nun ausführen möchten.
 .
 Beachten Sie, dass Sie einen laufenden Keystone-Server haben müssen, zu dem mittels des Keystone-Authentifizierungs-Tokens eine Verbindung hergestellt werden kann.
";
$elem["nova/register-endpoint"]["descriptionfr"]="Enregistrer Nova dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Choisissez si vous souhaitez lancer ces commandes maintenant.
 .
 Veuillez noter que vous aurez besoin d'un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
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
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'api de Nova puisse contacter Keystone pour établir le service Nova et créer le point d'accès.
";
$elem["nova/keystone-ip"]["default"]="";
$elem["nova/keystone-auth-token"]["type"]="password";
$elem["nova/keystone-auth-token"]["description"]="Keystone Auth Token:
 To configure its endpoint in Keystone, nova-api needs the Keystone auth
 token.
";
$elem["nova/keystone-auth-token"]["descriptionde"]="Keystone-Authentifizierungs-Token:
 Zur Konfiguration seines Endpunkts in Keystone benötigt »nova-api« das Keystone-Authentifizierungs-Token.
";
$elem["nova/keystone-auth-token"]["descriptionfr"]="
 Pour configurer son point d'accès dans Keystone, l'api de Nova a besoin du jeton d'authentification Keystone.
";
$elem["nova/keystone-auth-token"]["default"]="";
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
PKG_OptionPageTail2($elem);
?>
