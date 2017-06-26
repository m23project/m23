<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnocchi-common");

$elem["gnocchi/auth-host"]["type"]="string";
$elem["gnocchi/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Gnocchi. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["gnocchi/auth-host"]["descriptionde"]="";
$elem["gnocchi/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification.
 Veuillez indiquer le nom d'hôte du serveur d'authentification pour Gnocchi. Typiquement c'est également le nom d'hôte du Service d'Identité OpenStack (Keystone).
";
$elem["gnocchi/auth-host"]["default"]="127.0.0.1";
$elem["gnocchi/admin-tenant-name"]["type"]="string";
$elem["gnocchi/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["gnocchi/admin-tenant-name"]["descriptionde"]="Tenant-Name des Authentifizierungsservers:
 Bitte geben Sie den Tenant-Namen des Authentifizierungsservers an.
";
$elem["gnocchi/admin-tenant-name"]["descriptionfr"]="Nom d'espace client du serveur d'authentification :
 Veuillez indiquer le nom de l'espace client du serveur d'authentification.
";
$elem["gnocchi/admin-tenant-name"]["default"]="admin";
$elem["gnocchi/admin-user"]["type"]="string";
$elem["gnocchi/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["gnocchi/admin-user"]["descriptionde"]="Benutzername des Authentifizierungsservers:
 Bitte geben Sie den Benutzernamen an, der für den Authentifizierungsserver benutzt wird.
";
$elem["gnocchi/admin-user"]["descriptionfr"]="Nom d'utilisateur pour le serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["gnocchi/admin-user"]["default"]="admin";
$elem["gnocchi/admin-password"]["type"]="password";
$elem["gnocchi/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["gnocchi/admin-password"]["descriptionde"]="Passwort des Authentifizierungsservers:
 Bitte geben Sie das Passwort an, der für den Authentifizierungsserver benutzt wird.
";
$elem["gnocchi/admin-password"]["descriptionfr"]="Mot de passe pour le serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["gnocchi/admin-password"]["default"]="";
$elem["gnocchi/configure_db"]["type"]="boolean";
$elem["gnocchi/configure_db"]["description"]="Set up a database for Gnocchi?
 No database has been set up for Gnocchi to use. Before
 continuing, you should make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server hostname (that server must allow TCP connections from this
    machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run with
 regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 gnocchi-common\".
";
$elem["gnocchi/configure_db"]["descriptionde"]="";
$elem["gnocchi/configure_db"]["descriptionfr"]="Installer une base de données pour Gnocchi ?
 Aucune base de données n'a été installée pour Gnocchi. Avant de continuer, assurez-vous d'avoir :
 .
  - Le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine);
  - un nom d'utilisateur et un mot de passe pour accéder
    à cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorer cette option et exécutez l'application avec la gestion SQLite normale.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow gnocchi-common ».
";
$elem["gnocchi/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
