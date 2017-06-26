<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("keystone");

$elem["keystone/configure_db"]["type"]="boolean";
$elem["keystone/configure_db"]["description"]="Set up a database for Keystone?
 No database has been set up for Keystone to use. Before
 continuing, you should make sure you have the following information:
 .
  * the type of database that you want to use;
  * the database server host name (that server must allow TCP connections from this
    machine);
  * a username and password to access the database.
 .
 If some of these requirements are missing, do not choose this option and run with
 regular SQLite support.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow
 keystone\".
";
$elem["keystone/configure_db"]["descriptionde"]="Datenbank für Keystone einrichten?
 Bisher ist noch keine Datenbank eingerichtet worden, die Keystone benutzen kann. Bevor Sie fortfahren, sollten Sie sicherstellen, dass Sie die folgenden Informationen haben:
 .
  * den Typ der Datenbank, die Sie verwenden möchten
  * den Rechnernamen des Datenbankservers (dieser Server muss TCP-Verbindungen davon zulassen)
  * einen Benutzernamen samt Passwort, um auf die Datenbank zuzugreifen
 .
 Falls irgendeine dieser Anforderungen nicht erfüllt ist, wählen Sie diese Option nicht und führen Sie es mit normaler SQLite-Unterstützung aus.
 .
 Sie können diese Einstellung später durch Ausführen von »dpkg-reconfigure -plow keystone« ändern.
";
$elem["keystone/configure_db"]["descriptionfr"]="Faut-il configurer une base de données pour Keystone ?
 Aucune base de données n'a été configurée pour Keystone. Avant de continuer, veuillez vous assurer de disposer de toutes les informations nécessaires.
 .
  * le type de base de données que vous souhaitez utiliser ;
  * le nom d'hôte du serveur de bases de données (qui doit autoriser
    les connexions TCP depuis cette machine) ;
  * un identifiant et un mot de passe pour accéder à la base de données.
 .
 Si certains de ces prérequis sont manquants, ne choisissez pas cette option et lancez l'application avec le support SQLite normal.
 .
 Vous pouvez changer ce réglage plus tard en exécutant « dpkg-reconfigure -plow keystone ».
";
$elem["keystone/configure_db"]["default"]="false";
$elem["keystone/auth-token"]["type"]="password";
$elem["keystone/auth-token"]["description"]="Authentication server administration token:
 Please enter the token to use with the authentication
 server.
";
$elem["keystone/auth-token"]["descriptionde"]="Administrations-Token des Authentifizierungsservers:
 Bitte geben Sie das Token ein, das für den Authentifizierungsserver benutzt werden soll.
";
$elem["keystone/auth-token"]["descriptionfr"]="Jeton d'authentification pour le serveur d'administration :
 Veuillez indiquer le jeton à utiliser pour le serveur d'authentification.
";
$elem["keystone/auth-token"]["default"]="";
$elem["keystone/create-admin-tenant"]["type"]="boolean";
$elem["keystone/create-admin-tenant"]["description"]="Register administration tenants?
 For OpenStack to work, you need a basic tenant configuration. The
 creation of these administration tenants can be done automatically.
";
$elem["keystone/create-admin-tenant"]["descriptionde"]="Verwaltungs-Tenants registrieren?
 Damit OpenStack funktioniert, benötigen Sie eine Tenant-Basiskonfiguration. Die Erstellung dieser Verwaltungs-Tenants kann automatisch erfolgen.
";
$elem["keystone/create-admin-tenant"]["descriptionfr"]="Enregistrer les clients administrateurs ?
 Pour qu'OpenStack fonctionne, vous avez besoin d'une configuration client basique. La création de ces clients administrateurs peut être faite automatiquement.
";
$elem["keystone/create-admin-tenant"]["default"]="false";
$elem["keystone/admin-user"]["type"]="string";
$elem["keystone/admin-user"]["description"]="Username of the administrative user:
 Please enter a username for the administrative user.
";
$elem["keystone/admin-user"]["descriptionde"]="Benutzername des Verwalters:
 Bitte geben Sie den Benutzernamen des Verwalters ein.
";
$elem["keystone/admin-user"]["descriptionfr"]="Nom d'utilisateur de l'administrateur :
 Veuillez indiquer le nom d'utilisateur de l'administrateur :
";
$elem["keystone/admin-user"]["default"]="admin";
$elem["keystone/admin-email"]["type"]="string";
$elem["keystone/admin-email"]["description"]="Email address of the administrative user:
 Please enter the email address of the administrative user.
";
$elem["keystone/admin-email"]["descriptionde"]="E-Mail-Adresse des Verwalters:
 Bitte geben Sie die E-Mail-Adresse des Verwalters ein.
";
$elem["keystone/admin-email"]["descriptionfr"]="
 Veuillez indiquer l'adresse email de l'administrateur :
";
$elem["keystone/admin-email"]["default"]="root@localhost";
$elem["keystone/admin-password"]["type"]="password";
$elem["keystone/admin-password"]["description"]="Password of the administrative user:
 Please enter a password for the administrative user.
";
$elem["keystone/admin-password"]["descriptionde"]="Passwort des Verwalters:
 Bitte geben Sie ein Passwort für den Verwalter ein.
";
$elem["keystone/admin-password"]["descriptionfr"]="
 Veuillez indiquer un mot de passe pour l'utilisateur administrateur.
";
$elem["keystone/admin-password"]["default"]="";
$elem["keystone/admin-password-confirm"]["type"]="password";
$elem["keystone/admin-password-confirm"]["description"]="Re-enter password to verify:
 Please enter the same administrative password again to verify that you have typed it
 correctly.
";
$elem["keystone/admin-password-confirm"]["descriptionde"]="Geben Sie das Passwort zur Kontrolle erneut ein:
 Bitte geben Sie dasselbe Passwort für den Verwalter nochmal ein, um zu prüfen, ob Sie es korrekt eingegeben haben.
";
$elem["keystone/admin-password-confirm"]["descriptionfr"]="
 Veuillez indiquer le même mot de passe à nouveau pour vérifier que vous l'avez tapé correctement.
";
$elem["keystone/admin-password-confirm"]["default"]="";
$elem["keystone/passwords-do-not-match"]["type"]="error";
$elem["keystone/passwords-do-not-match"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["keystone/passwords-do-not-match"]["descriptionde"]="Fehler bei der Passworteingabe
 Die beiden Passwörter, die Sie eingegeben haben, waren nicht gleich. Bitte versuchen Sie es erneut.
";
$elem["keystone/passwords-do-not-match"]["descriptionfr"]="Erreur lors de l'entrée du mot de passe
 Les deux mots de passe que vous avez entrés ne correspondent pas. Veuillez essayer à nouveau.
";
$elem["keystone/passwords-do-not-match"]["default"]="";
$elem["keystone/admin-role-name"]["type"]="string";
$elem["keystone/admin-role-name"]["description"]="Name of the administrative role:
 Please enter the name of the administrative role.
";
$elem["keystone/admin-role-name"]["descriptionde"]="Name der Verwaltungsfunktion:
 Bitte geben Sie den Namen der Verwaltungsfunktion ein.
";
$elem["keystone/admin-role-name"]["descriptionfr"]="
 Veuillez indiquer le nom du rôle d'administration :
";
$elem["keystone/admin-role-name"]["default"]="admin";
$elem["keystone/admin-tenant-name"]["type"]="string";
$elem["keystone/admin-tenant-name"]["description"]="Name of the administrative tenant:
 Please enter the name of the administrative tenant.
";
$elem["keystone/admin-tenant-name"]["descriptionde"]="Name des Verwaltungs-Tenants:
 Bitte geben Sie den Namen des Verwaltungs-Tenants ein.
";
$elem["keystone/admin-tenant-name"]["descriptionfr"]="
 Veuillez indiquer le nom du client administrateur :
";
$elem["keystone/admin-tenant-name"]["default"]="admin";
$elem["keystone/register-endpoint"]["type"]="boolean";
$elem["keystone/register-endpoint"]["description"]="Register Keystone endpoint?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
";
$elem["keystone/register-endpoint"]["descriptionde"]="Keystone-Endpunkt registrieren?
 Jeder OpenStack-Dienst (jedes API) sollte registriert werden, damit darauf zugegriffen werden kann. Dies wird mittels »keystone service-create« und »keystone endpoint-create« erreicht. Sie können das nun automatisch erledigen lassen.
";
$elem["keystone/register-endpoint"]["descriptionfr"]="Enregistrer le point d'accès Keystone ?
 Chaque service OpenStack (chaque API) doit être enregistré pour être accessible. Ceci peut être fait en utilisant « keystone service-create » et « keystone endpoint-create ». Cela peut être fait automatiquement maintenant.
";
$elem["keystone/register-endpoint"]["default"]="false";
$elem["keystone/endpoint-ip"]["type"]="string";
$elem["keystone/endpoint-ip"]["description"]="Keystone endpoint IP address:
 Please enter the IP address that will be used to contact Keystone.
";
$elem["keystone/endpoint-ip"]["descriptionde"]="IP-Adresse des Keystone-Endpunkts:
 Bitte geben Sie die IP-Adresse ein, die zum Kontaktieren von Keystone verwendet wird.
";
$elem["keystone/endpoint-ip"]["descriptionfr"]="Adresse IP du point d'accès Keystone :
 Veuillez indiquer l'adresse IP qui sera utilisée pour contacter Keystone.
";
$elem["keystone/endpoint-ip"]["default"]="";
$elem["keystone/region-name"]["type"]="string";
$elem["keystone/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["keystone/region-name"]["descriptionde"]="Name der Region zum Registrieren:
 OpenStack unterstützt die Verwendung von Verfügbarkeitszonen, bei denen jede Region für einen Ort steht. Bitte geben Sie die Zone ein, die Sie beim Registrieren des Endpunkts verwenden möchten.
";
$elem["keystone/region-name"]["descriptionfr"]="
 OpenStack supporte l'utilisation de zones disponibles, avec chaque région représentant un lieu. Veuillez entrer une zone que vous souhaitez utiliser lors de l'enregistrement d'un point d'accès.
";
$elem["keystone/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
