<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zaqar-common");

$elem["zaqar/auth-host"]["type"]="string";
$elem["zaqar/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Zaqar.
 Typically this is also the hostname of the OpenStack Identity Service
 (Keystone).
";
$elem["zaqar/auth-host"]["descriptionde"]="Rechnername des Authentifizierungsservers:
 Bitte geben Sie den Rechnernamen des Authentifizierungsservers an. Typischerweise ist das gleichzeitig der Rechnername Ihres OpenStack-Identitätsdienstes (Keystone).
";
$elem["zaqar/auth-host"]["descriptionfr"]="
 Veuillez indiquer le nom d'hôte du serveur d'authentification. En général il s'agit du nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["zaqar/auth-host"]["default"]="127.0.0.1";
$elem["zaqar/admin-tenant-name"]["type"]="string";
$elem["zaqar/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["zaqar/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["zaqar/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d’authentification.
";
$elem["zaqar/admin-tenant-name"]["default"]="admin";
$elem["zaqar/admin-user"]["type"]="string";
$elem["zaqar/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["zaqar/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["zaqar/admin-user"]["descriptionfr"]="
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["zaqar/admin-user"]["default"]="admin";
$elem["zaqar/admin-password"]["type"]="password";
$elem["zaqar/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["zaqar/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, das für den Authentifizierungsserver benutzt wird.
";
$elem["zaqar/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["zaqar/admin-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
