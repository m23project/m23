<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tuskar-api");

$elem["tuskar/register-endpoint"]["type"]="boolean";
$elem["tuskar/register-endpoint"]["description"]="Register Tuskar in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using the Keystone authentication token.
";
$elem["tuskar/register-endpoint"]["descriptionde"]="Soll Tuskar im Endpunktkatalog von Keystone registriert werden?
 Jeder OpenStack-Dienst (jede API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies geschieht mit »keystone service-create« und »keystone endpoint-create« und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass dafür ein laufender und erreichbarer Keystone-Server erforderlich ist, mit dem Sie sich über den Keystone-Authentifizierungs-Token verbinden können.
";
$elem["tuskar/register-endpoint"]["descriptionfr"]="Enregistrer Tuskar dans le catalogue de points d'accès de Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Cela peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut maintenant être fait automatiquement.
 .
 Veuillez noter que vous aurez besoin d'avoir un serveur Keystone fonctionnel sur lequel se connecter pour utiliser le jeton d'authentification Keystone.
";
$elem["tuskar/register-endpoint"]["default"]="false";
$elem["tuskar/keystone-ip"]["type"]="string";
$elem["tuskar/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that tuskar-api can
 contact Keystone to do the Tuskar service and endpoint creation.
";
$elem["tuskar/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers ein, so dass tuskar-api Keystone kontaktieren und den Tuskar-Dienst und den Endpunkt erzeugen kann.
";
$elem["tuskar/keystone-ip"]["descriptionfr"]="Adresse IP du serveur Keystone :
 Veuillez indiquer l'adresse IP du serveur Keystone, pour que l'API de Tuskar puisse contacter Keystone pour établir le service Tuskar et créer le point d'accès.
";
$elem["tuskar/keystone-ip"]["default"]="";
$elem["tuskar/keystone-auth-token"]["type"]="password";
$elem["tuskar/keystone-auth-token"]["description"]="Keystone authentication token:
 To configure its endpoint in Keystone, tuskar-api needs the Keystone
 authentication token.
";
$elem["tuskar/keystone-auth-token"]["descriptionde"]="Authentifizierungs-Token für Keystone:
 Um den Endpunkt in Keystone einrichten zu können, benötigt tuskar-api den Keystone-Authentifizierungs-Token.
";
$elem["tuskar/keystone-auth-token"]["descriptionfr"]="Jeton d'authentification Keystone :
 Pour configurer son point d'accès dans Keystone, le serveur Tuskar a besoin du jeton d'authentification Keystone.
";
$elem["tuskar/keystone-auth-token"]["default"]="";
$elem["tuskar/endpoint-ip"]["type"]="string";
$elem["tuskar/endpoint-ip"]["description"]="Tuskar endpoint IP address:
 Please enter the IP address that will be used to contact Tuskar.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["tuskar/endpoint-ip"]["descriptionde"]="IP-Adresse des Tuskar-Endpunkts:
 Bitte geben Sie die IP-Adresse an, die zum Kontaktieren von Tuskar verwendet wird.
 .
 Diese IP-Adresse sollte von den Clients aus erreichbar sein, welche diesen Dienst verwenden. Sollten Sie eine öffentliche Cloud installieren wollen, muss dies eine öffentliche IP-Adresse sein.
";
$elem["tuskar/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Tuskar :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Tuskar.
 .
 L'adresse IP devra être accessible depuis les clients qui utiliseront ce service, donc si vous installez un nuage public ce devra être une adresse IP publique.
";
$elem["tuskar/endpoint-ip"]["default"]="";
$elem["tuskar/region-name"]["type"]="string";
$elem["tuskar/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["tuskar/region-name"]["descriptionde"]="Name der zu registrierenden Region:
 OpenStack unterstützt die Nutzung von Verfügbarkeitszonen, wobei jede Region einen Ort repräsentiert. Bitte geben Sie die Zone ein, die Sie für die Registrierung des Endpunkts verwenden wollen.
";
$elem["tuskar/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["tuskar/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
