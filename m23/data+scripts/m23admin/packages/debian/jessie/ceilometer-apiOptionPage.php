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
 connect using the Keystone authentication token.
";
$elem["ceilometer/register-endpoint"]["descriptionde"]="Ceilometer im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen laufenden Keystone-Server benötigen, mit dem Sie sich unter Nutzung des Keystone-Authentifizierungs-Tokens verbinden können.
";
$elem["ceilometer/register-endpoint"]["descriptionfr"]="Enregistrer Ceilometer dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
 .
 Veuillez noter que vous aurez besoin d'avoir un serveur Keystone fonctionnel sur lequel se connecter en utilisant le jeton d'authentification Keystone.
";
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
$elem["ceilometer/keystone-auth-token"]["type"]="password";
$elem["ceilometer/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, ceilometer-api needs the Keystone
 authentication token.
";
$elem["ceilometer/keystone-auth-token"]["descriptionde"]="Keystone-Authentifizierungs-Token:
 Um seinen Keystone-Endpunkt einzurichten, benötigt Ceilometer-api das Keystone-Authentifizierungs-Token.
";
$elem["ceilometer/keystone-auth-token"]["descriptionfr"]="
 Pour configurer son point d'accès dans Keystone, l’api de Ceilometer a besoin du jeton d'authentification Keystone.
";
$elem["ceilometer/keystone-auth-token"]["default"]="";
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
