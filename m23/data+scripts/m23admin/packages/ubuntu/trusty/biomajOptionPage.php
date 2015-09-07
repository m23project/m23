<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("biomaj");

$elem["biomaj/mysql"]["type"]="boolean";
$elem["biomaj/mysql"]["description"]="Configure MySQL connection now?
 Once the MySQL database for BioMAJ has been created and configured, it
 can populate itself automatically instead of needing to be updated
 manually.
 .
 Please specify whether the database connection should be configured now.
";
$elem["biomaj/mysql"]["descriptionde"]="MySQL-Verbindung jetzt konfigurieren?
 Sobald die MySQL-Datenbank für BioMAJ erstellt und konfiguriert wurde, kann Sie selbstständig automatisch befüllt werden, ohne dass eine manuelle Aktualisierung notwendig wird.
 .
 Bitte geben Sie an, ob die Datenbankverbindung jetzt konfiguriert werden soll.
";
$elem["biomaj/mysql"]["descriptionfr"]="Souhaitez-vous configurer MySQL maintenant ?
 Une fois la base de données pour BioMAJ créée et configurée, il est possible de la faire remplir automatiquement plutôt que d'avoir à la peupler vous-même.
 .
 Veuillez indiquer si vous souhaitez configurer l'accès à la base de données maintenant.
";
$elem["biomaj/mysql"]["default"]="";
$elem["biomaj/mysql_host"]["type"]="string";
$elem["biomaj/mysql_host"]["description"]="MySQL server:
 Please enter the hostname or IP address of the
 MySQL server you want to use.
";
$elem["biomaj/mysql_host"]["descriptionde"]="MySQL-Server:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse des MySQL-Servers an, den Sie verwenden wollen.
";
$elem["biomaj/mysql_host"]["descriptionfr"]="Serveur MySQL :
 Veuillez indiquer le nom ou l'adresse IP du serveur MySQL que vous souhaitez utiliser.
";
$elem["biomaj/mysql_host"]["default"]="";
$elem["biomaj/mysql_login"]["type"]="string";
$elem["biomaj/mysql_login"]["description"]="MySQL login for BioMAJ database:
 Please enter the login to use when connecting to the MySQL database
 server to access the biomaj_log database.
";
$elem["biomaj/mysql_login"]["descriptionde"]="MySQL-Anmeldename für BioMAJ-Datenbank:
 Bitte geben Sie den Anmeldenamen an, der benutzt wird, wenn die Verbindung mit dem MySQL-Datenbankserver hergestellt wird, um auf die Datenbank »biomaj_log« zuzugreifen.
";
$elem["biomaj/mysql_login"]["descriptionfr"]="Identifiant de connexion à la base de données de BioMAJ :
 Veuillez indiquer l'identifiant à utiliser pour la connexion au serveur MySQL et l'accès à la base biomaj_log.
";
$elem["biomaj/mysql_login"]["default"]="";
$elem["biomaj/mysql_passwd"]["type"]="password";
$elem["biomaj/mysql_passwd"]["description"]="MySQL password for BioMAJ database:
 Please enter the password to use when connecting to the MySQL database
 server to access the biomaj_log database.
";
$elem["biomaj/mysql_passwd"]["descriptionde"]="MySQL-Passwort für BioMAJ-Datenbank:
 Bitte geben Sie das Passwort an, das benutzt wird, wenn die Verbindung mit dem MySQL-Datenbankserver hergestellt wird, um auf die Datenbank »biomaj_log« zuzugreifen.
";
$elem["biomaj/mysql_passwd"]["descriptionfr"]="Mot de passe de connexion à la base de données de BioMAJ :
 Veuillez indiquer le mot de passe à utiliser pour la connexion au serveur MySQL et l'accès à la base biomaj_log.
";
$elem["biomaj/mysql_passwd"]["default"]="";
PKG_OptionPageTail2($elem);
?>
