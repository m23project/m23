<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("trove-api");

$elem["trove/register-endpoint"]["type"]="boolean";
$elem["trove/register-endpoint"]["description"]="Register Trove in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
";
$elem["trove/register-endpoint"]["descriptionde"]="Trove im Keystone-Endpunktkatalog registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht und kann nun automatisch erledigt werden.
 .
 Beachten Sie, dass Sie einen konfigurierten und laufenden Keystone-Server haben müssen, mit dem Sie sich anhand eines bekannten Administratorprojektnamens, Administratorbenutzernamens und Passworts verbinden. Das Administratorauthentifizierungs-Token wird nicht mehr benutzt.
";
$elem["trove/register-endpoint"]["descriptionfr"]="";
$elem["trove/register-endpoint"]["default"]="false";
$elem["trove/keystone-ip"]["type"]="string";
$elem["trove/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that trove-api can
 contact Keystone to do the Trove service and endpoint creation.
";
$elem["trove/keystone-ip"]["descriptionde"]="IP-Adresse des Keystone-Servers:
 Bitte geben Sie die IP-Adresse des Keystone-Servers an, so dass Trove-API Keystone kontaktieren kann, um den Trove-Dienst und den Endpunkt zu erstellen.
";
$elem["trove/keystone-ip"]["descriptionfr"]="";
$elem["trove/keystone-ip"]["default"]="";
$elem["trove/keystone-admin-name"]["type"]="string";
$elem["trove/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["trove/keystone-admin-name"]["descriptionde"]="Keystone-Administratorname:
 Um den Dienstendpunkt zu registrieren, muss dieses Paket den Administratoranmeldenamen, Namen, Projektnamen und das Passwort für den Keystone-Server kennen.
";
$elem["trove/keystone-admin-name"]["descriptionfr"]="";
$elem["trove/keystone-admin-name"]["default"]="admin";
$elem["trove/keystone-project-name"]["type"]="string";
$elem["trove/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["trove/keystone-project-name"]["descriptionde"]="Keystone-Administratorprojektname:
 Um den Dienstendpunkt zu registrieren, muss dieses Paket den Administratoranmeldenamen, Namen, Projektnamen und das Passwort für den Keystone-Server kennen.
";
$elem["trove/keystone-project-name"]["descriptionfr"]="";
$elem["trove/keystone-project-name"]["default"]="admin";
$elem["trove/keystone-admin-password"]["type"]="password";
$elem["trove/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.
";
$elem["trove/keystone-admin-password"]["descriptionde"]="Keystone-Administratorpasswort:
 Um den Dienstendpunkt zu registrieren, muss dieses Paket den Administratoranmeldenamen, Namen, Projektnamen und das Passwort für den Keystone-Server kennen.
";
$elem["trove/keystone-admin-password"]["descriptionfr"]="";
$elem["trove/keystone-admin-password"]["default"]="";
$elem["trove/endpoint-ip"]["type"]="string";
$elem["trove/endpoint-ip"]["description"]="Trove endpoint IP address:
 Please enter the IP address that will be used to contact Trove.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.
";
$elem["trove/endpoint-ip"]["descriptionde"]="IP-Adresse des Trove-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Trove benutzt wird.
 .
 Auf diese IP-Adresse sollte von den Clients, die diesen Dienst verwenden, zugegriffen werden können, daher sollte sie, falls Sie eine öffentliche Cloud installieren, eine öffentliche IP-Adresse sein.
";
$elem["trove/endpoint-ip"]["descriptionfr"]="";
$elem["trove/endpoint-ip"]["default"]="";
$elem["trove/region-name"]["type"]="string";
$elem["trove/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["trove/region-name"]["descriptionde"]="Name der Region, die registriert wird:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone, die Sie benutzen möchten, bei der Registrierung des Endpunkts an.
";
$elem["trove/region-name"]["descriptionfr"]="Nom de la région à enregistrer :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["trove/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
