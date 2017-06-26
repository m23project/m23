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
 Veuillez indiquer l'adresse URL du serveur d'authentification Neutron. En général il s'agit du Service d'Identité d'OpenStack (Keystone).
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
$elem["neutron-metadata/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["neutron-metadata/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["neutron-metadata/admin-user"]["descriptionfr"]="Identifiant sur le serveur d'authentification :
 Veuillez indiquer l'identifiant à utiliser sur le serveur d'authentification.
";
$elem["neutron-metadata/admin-user"]["default"]="admin";
$elem["neutron-metadata/admin-password"]["type"]="password";
$elem["neutron-metadata/admin-password"]["description"]="Auth server password:
 Please specify the password to use with the authentication server.
";
$elem["neutron-metadata/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["neutron-metadata/admin-password"]["descriptionfr"]="Mot de passe sur le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
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
 OpenStack gère l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer la zone que le serveur de métadonnées devra utiliser.
";
$elem["neutron-metadata/region-name"]["default"]="regionOne";
$elem["neutron-metadata/metadata_secret"]["type"]="password";
$elem["neutron-metadata/metadata_secret"]["description"]="Metadata proxy shared secret:
 VM instances using Neutron to handle networking retrieve their metadata
 through the Neutron metadata agent, which serves as a proxy to the Nova
 metadata REST API server.
 .
 Please enter the password that should be used to protect communications
 between the Neutron metadata proxy agent and the Nova metadata server. The
 same shared password should be used when setting up the nova-common
 package.
";
$elem["neutron-metadata/metadata_secret"]["descriptionde"]="";
$elem["neutron-metadata/metadata_secret"]["descriptionfr"]="Secret partagé pour le relais de métadonnées (« metadata proxy ») :
 Les machines virtuelles utilisant Neutron pour gérer leur connexion réseau récupèrent leurs métadonnées grâce à l'agent de métadonnées de Neutron, qui agit comme un relais pour le serveur de métadonnées de l'API REST Nova.
 .
 Veuillez indiquer le mot de passe à utiliser pour protéger les communications entre l'agent relais de métadonnées de Neutron et le serveur de métadonnées de Nova. Le même mot de passe partagé doit être utilisé lors de l'installation du paquet nova-common.
";
$elem["neutron-metadata/metadata_secret"]["default"]="";
PKG_OptionPageTail2($elem);
?>
