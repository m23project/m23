<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("keystone");

$elem["keystone/configure_db"]["type"]="boolean";
$elem["keystone/configure_db"]["description"]="Set up a database for Keystone?
 No database has been set up for Keystone to use. If you want
 to set one up now, please make sure you have all needed
 information:
 .
  * the host name of the database server (which must allow TCP
    connections from this machine);
  * a username and password to access the database;
  * the type of database management software you want to use.
 .
 If you don't choose this option, no database will be set up and
 Keystone will use regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure
 -plow keystone\".
";
$elem["keystone/configure_db"]["descriptionde"]="Datenbank für Keystone einrichten?
 Bisher ist noch keine Datenbank eingerichtet worden, die Keystone benutzen kann. Wenn Sie das jetzt tun wollen, stellen Sie bitte sicher, dass Sie alle benötigten Informationen haben:
 .
  * den Rechnernamen des Datenbank-Servers (welcher TCP-Verbindungen von dieser
    Maschine aus zulassen muss)
  * einen Benutzernamen samt Passwort, um auf die Datenbank zuzugreifen
  * die Art der Datenbank-Verwaltungssoftware, die Sie verwenden wollen.
 .
 Wenn Sie diese Option nicht auswählen, wird keine Datenbank eingerichtet und Keystone wird auf die normale SQLite-Unterstützung zurückgreifen.
 .
 Sie können diese Einstellung später durch Ausführen von »dpkg-reconfigure -plow keystone« ändern.
";
$elem["keystone/configure_db"]["descriptionfr"]="Faut-il configurer une base de données pour Keystone ?
 Aucune base de données n'a été configurée pour Keystone. Si vous souhaitez en configurer une maintenant, veuillez vous assurer de disposer de toutes les informations nécessaires.
 .
  * le nom d'hôte du serveur de bases de données (qui doit autoriser
    les connexions TCP depuis cette machine) ;
  * un identifiant et un mot de passe pour accéder à la base de
    données ;
  * le type de gestionnaire de base de données que vous souhaitez
    utiliser.
 .
 Si vous ne choisissez pas cette option, aucune base de données ne sera configurée et Keystone utilisera la gestion SQLite de base.
 .
 Vous pouvez changer ce réglage plus tard en exécutant « dpkg-reconfigure -plow keystone ».
";
$elem["keystone/configure_db"]["default"]="false";
$elem["keystone/auth-token"]["type"]="string";
$elem["keystone/auth-token"]["description"]="Authentication server administration token:
 Please enter the token to use with the authentication
 server.
";
$elem["keystone/auth-token"]["descriptionde"]="Administrationstoken des Authentifizierungsservers:
 Bitte geben Sie das Token ein, der für den Authentifzierungsserver benutzt werden soll.
";
$elem["keystone/auth-token"]["descriptionfr"]="Jeton d'authentification pour le serveur d'administration :
 Veuillez indiquer le jeton à utiliser pour le serveur d'authentification.
";
$elem["keystone/auth-token"]["default"]="";
PKG_OptionPageTail2($elem);
?>
