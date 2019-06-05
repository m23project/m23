<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnocchi-common");

$elem["gnocchi/configure_db"]["type"]="boolean";
$elem["gnocchi/configure_db"]["description"]="Set up a database for this package?
 No database has been set up for this package. Before continuing, you should
 make sure you have the following information:
 .
  * the type of database that you want to use - generally the MySQL backend
    (which is compatible with MariaDB) is a good choice, and other
    implementations like PostgreSQL or SQLite are often problematic with
    OpenStack (this depends on the service);
  * the database server hostname (that server must allow TCP connections from
    this machine);
  * a username and password to access the database.
 .
 Note that if you plan on using a remote database server, you must first
 configure dbconfig-common to do so (using dpkg-reconfigure dbconfig-common),
 and the remote database server needs to be configured with adequate
 credentials.
 .
 If some of these requirements are missing, do not choose this option. Run
 with regular SQLite support instead.
 .
 You can change this setting later on by running \"dpkg-reconfigure -plow\".
";
$elem["gnocchi/configure_db"]["descriptionde"]="";
$elem["gnocchi/configure_db"]["descriptionfr"]="";
$elem["gnocchi/configure_db"]["default"]="false";
$elem["gnocchi/configure_ksat"]["type"]="boolean";
$elem["gnocchi/configure_ksat"]["description"]="Manage keystone_authtoken with debconf?
 Every OpenStack service must contact Keystone, and this is configured through
 the [keystone_authtoken] section of the configuration. Specify if you wish to
 handle this configuration through debconf.
";
$elem["gnocchi/configure_ksat"]["descriptionde"]="Soll »keystone_authtoken« mit Debconf verwaltet werden?
 Jeder OpenStack-Dienst muss Keystone kontaktieren. Dies wird über den Abschnitt [keystone_authtoken] der Konfiguration eingerichtet. Geben Sie an, ob Sie diese Konfiguration durch Debconf handhaben wollen.
";
$elem["gnocchi/configure_ksat"]["descriptionfr"]="";
$elem["gnocchi/configure_ksat"]["default"]="false";
$elem["gnocchi/ksat-public-url"]["type"]="string";
$elem["gnocchi/ksat-public-url"]["description"]="Auth server public endpoint URL:
 Specify the URL of your Keystone authentication server public endpoint. This
 value will be set in the www_authenticate_uri directive.
";
$elem["gnocchi/ksat-public-url"]["descriptionde"]="";
$elem["gnocchi/ksat-public-url"]["descriptionfr"]="";
$elem["gnocchi/ksat-public-url"]["default"]="http://localhost:5000";
$elem["gnocchi/ksat-admin-url"]["type"]="string";
$elem["gnocchi/ksat-admin-url"]["description"]="Auth server admin endpoint URL:
 Specify the URL of your Keystone authentication server admin endpoint. This
 value will be set in auth_url.
";
$elem["gnocchi/ksat-admin-url"]["descriptionde"]="";
$elem["gnocchi/ksat-admin-url"]["descriptionfr"]="";
$elem["gnocchi/ksat-admin-url"]["default"]="http://localhost:35357";
$elem["gnocchi/ksat-region"]["type"]="string";
$elem["gnocchi/ksat-region"]["description"]="Keystone region:
 Specify the Keystone region to use.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
";
$elem["gnocchi/ksat-region"]["descriptionde"]="";
$elem["gnocchi/ksat-region"]["descriptionfr"]="";
$elem["gnocchi/ksat-region"]["default"]="regionOne";
$elem["gnocchi/ksat-create-service-user"]["type"]="boolean";
$elem["gnocchi/ksat-create-service-user"]["description"]="Create service user?
 This package can reuse an already existing username, or create one right now.
 If you wish to create one, then you will be prompted for the admin credentials.
";
$elem["gnocchi/ksat-create-service-user"]["descriptionde"]="";
$elem["gnocchi/ksat-create-service-user"]["descriptionfr"]="";
$elem["gnocchi/ksat-create-service-user"]["default"]="true";
$elem["gnocchi/ksat-admin-username"]["type"]="string";
$elem["gnocchi/ksat-admin-username"]["description"]="Auth server admin username:
";
$elem["gnocchi/ksat-admin-username"]["descriptionde"]="Administratorbenutzername des Authentifizierungsservers:
";
$elem["gnocchi/ksat-admin-username"]["descriptionfr"]="";
$elem["gnocchi/ksat-admin-username"]["default"]="admin";
$elem["gnocchi/ksat-admin-project-name"]["type"]="string";
$elem["gnocchi/ksat-admin-project-name"]["description"]="Auth server admin project name:
";
$elem["gnocchi/ksat-admin-project-name"]["descriptionde"]="Administratorprojektname des Authentifizierungsservers:
";
$elem["gnocchi/ksat-admin-project-name"]["descriptionfr"]="";
$elem["gnocchi/ksat-admin-project-name"]["default"]="admin";
$elem["gnocchi/ksat-admin-password"]["type"]="password";
$elem["gnocchi/ksat-admin-password"]["description"]="Auth server admin password:
";
$elem["gnocchi/ksat-admin-password"]["descriptionde"]="Administratorpasswort des Authentifizierungsservers:
";
$elem["gnocchi/ksat-admin-password"]["descriptionfr"]="";
$elem["gnocchi/ksat-admin-password"]["default"]="";
$elem["gnocchi/ksat-service-username"]["type"]="string";
$elem["gnocchi/ksat-service-username"]["description"]="Auth server service username:
";
$elem["gnocchi/ksat-service-username"]["descriptionde"]="Dienstbenutzername des Authentifizierungsservers:
";
$elem["gnocchi/ksat-service-username"]["descriptionfr"]="";
$elem["gnocchi/ksat-service-username"]["default"]="";
$elem["gnocchi/ksat-service-project-name"]["type"]="string";
$elem["gnocchi/ksat-service-project-name"]["description"]="Auth server service project name:
";
$elem["gnocchi/ksat-service-project-name"]["descriptionde"]="Dienstprojektname des Authentifizierungsservers:
";
$elem["gnocchi/ksat-service-project-name"]["descriptionfr"]="";
$elem["gnocchi/ksat-service-project-name"]["default"]="service";
$elem["gnocchi/ksat-service-password"]["type"]="password";
$elem["gnocchi/ksat-service-password"]["description"]="Auth server service password:
";
$elem["gnocchi/ksat-service-password"]["descriptionde"]="Dienstpasswort des Authentifizierungsservers:
";
$elem["gnocchi/ksat-service-password"]["descriptionfr"]="";
$elem["gnocchi/ksat-service-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
