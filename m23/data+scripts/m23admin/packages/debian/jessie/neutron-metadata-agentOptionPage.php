<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("neutron-metadata-agent");

$elem["neutron-metadata/auth-host"]["type"]="string";
$elem["neutron-metadata/auth-host"]["description"]="Auth server hostname:
 Please specify the URL of your Neutron authentication server. Typically
 this is also the URL of your OpenStack Identity Service (Keystone).
";
$elem["neutron-metadata/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie die URL Ihres Neutron-Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["neutron-metadata/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer l'adresse URL de votre serveur d'authentification Neutron. En général il s'agit du Service d'Identité d'OpenStack (Keystone).
";
$elem["neutron-metadata/auth-host"]["default"]="127.0.0.1";
$elem["neutron-metadata/admin-tenant-name"]["type"]="string";
$elem["neutron-metadata/admin-tenant-name"]["description"]="Auth server tenant name:
";
$elem["neutron-metadata/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
";
$elem["neutron-metadata/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
";
$elem["neutron-metadata/admin-tenant-name"]["default"]="admin";
$elem["neutron-metadata/admin-user"]["type"]="string";
$elem["neutron-metadata/admin-user"]["description"]="Auth server username:
";
$elem["neutron-metadata/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
";
$elem["neutron-metadata/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
";
$elem["neutron-metadata/admin-user"]["default"]="admin";
$elem["neutron-metadata/admin-password"]["type"]="password";
$elem["neutron-metadata/admin-password"]["description"]="Auth server password:
";
$elem["neutron-metadata/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
";
$elem["neutron-metadata/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
";
$elem["neutron-metadata/admin-password"]["default"]="";
$elem["neutron-metadata/region-name"]["type"]="string";
$elem["neutron-metadata/region-name"]["description"]="Name of the region to be used by the metadata server:
 Openstack can be used using availability zones, with each region representing
 a location. Please enter the zone that the metadata server should use.
";
$elem["neutron-metadata/region-name"]["descriptionde"]="Name der vom Metadaten-Server verwendeten Region:
 OpenStack kann mittels Verfügbarkeitszonen verwendet werden, bei der jede Region einen Ort repräsentiert. Bitte geben Sie die Zone an, die der Metadaten-Server benutzt.
";
$elem["neutron-metadata/region-name"]["descriptionfr"]="Nom de la région à utiliser par le serveur de métadonnées :
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer la zone que le serveur de métadonnées devra utiliser.
";
$elem["neutron-metadata/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
