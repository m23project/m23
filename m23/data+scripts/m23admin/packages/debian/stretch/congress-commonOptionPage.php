<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("congress-common");

$elem["congress/auth-host"]["type"]="string";
$elem["congress/auth-host"]["description"]="Authentication server hostname:
 Please specify the hostname of the authentication server for Congress. Typically
 this is also the hostname of the OpenStack Identity Service (Keystone).
";
$elem["congress/auth-host"]["descriptionde"]="";
$elem["congress/auth-host"]["descriptionfr"]="Nom d'hôte du serveur d'authentification :
 Veuillez indiquer le nom d'hôte du serveur d'authentification pour Congress. Typiquement, c'est également le nom d'hôte de votre service d'Identité OpenStack (Keystone).
";
$elem["congress/auth-host"]["default"]="127.0.0.1";
$elem["congress/admin-tenant-name"]["type"]="string";
$elem["congress/admin-tenant-name"]["description"]="Authentication server tenant name:
 Please specify the authentication server tenant name.
";
$elem["congress/admin-tenant-name"]["descriptionde"]="";
$elem["congress/admin-tenant-name"]["descriptionfr"]="Serveur d'authentification pour l'espace client :
 Veuillez indiquer le nom de l'espace client du serveur d’authentification.
";
$elem["congress/admin-tenant-name"]["default"]="admin";
$elem["congress/admin-user"]["type"]="string";
$elem["congress/admin-user"]["description"]="Authentication server username:
 Please specify the username to use with the authentication server.
";
$elem["congress/admin-user"]["descriptionde"]="";
$elem["congress/admin-user"]["descriptionfr"]="Nom d'utilisateur du serveur d'authentification :
 Veuillez indiquer le nom d'utilisateur à utiliser sur le serveur d'authentification.
";
$elem["congress/admin-user"]["default"]="admin";
$elem["congress/admin-password"]["type"]="password";
$elem["congress/admin-password"]["description"]="Authentication server password:
 Please specify the password to use with the authentication server.
";
$elem["congress/admin-password"]["descriptionde"]="";
$elem["congress/admin-password"]["descriptionfr"]="Mot de passe du serveur d'authentification :
 Veuillez indiquer le mot de passe à utiliser sur le serveur d'authentification.
";
$elem["congress/admin-password"]["default"]="";
$elem["congress/configure_db"]["type"]="boolean";
$elem["congress/configure_db"]["description"]="Set up a database for Congress?
 No database has been set up for congress to use. Before
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
 congress-common\".
";
$elem["congress/configure_db"]["descriptionde"]="";
$elem["congress/configure_db"]["descriptionfr"]="Installer une base de données pour Congress ?
 Aucune base de données n'a été installée pour Congress. Si vous voulez en installer une maintenant, assurez-vous d'avoir les informations suivantes :
 .
  - le type de base de données que vous souhaitez utiliser ;
  - le nom d'hôte du serveur de base de données (ce serveur
    doit accepter les connexions TCP depuis cette machine) ;
  - un nom d'utilisateur et un mot de passe pour accéder à
    cette base de données.
 .
 Si certains de ces prérequis sont manquants, ignorez cette option et exécutez l'application avec le support SQLite normal.
 .
 Vous pouvez modifier ce réglage plus tard en lançant « dpkg-reconfigure -plow congress-common ».
";
$elem["congress/configure_db"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
