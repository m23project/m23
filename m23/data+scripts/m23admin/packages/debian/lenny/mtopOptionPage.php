<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mtop");

$elem["mtop/mysql_server"]["type"]="string";
$elem["mtop/mysql_server"]["description"]="MySQL host name:
 Please enter the host name of the MySQL server which you want to monitor.
";
$elem["mtop/mysql_server"]["descriptionde"]="MySQL-Rechnername:
 Bitte geben Sie den Rechnernamen des MySQL-Servers ein, den Sie überwachen möchten.
";
$elem["mtop/mysql_server"]["descriptionfr"]="Nom d'hôte MySQL :
 Veuillez indiquer le nom du serveur MySQL que vous souhaitez surveiller.
";
$elem["mtop/mysql_server"]["default"]="localhost";
$elem["mtop/mysql_port"]["type"]="string";
$elem["mtop/mysql_port"]["description"]="MySQL port number:
 Please enter the port number MySQL listens on.
";
$elem["mtop/mysql_port"]["descriptionde"]="MySQL-Port-Nummer:
 Bitte geben Sie die Nummer des Ports ein, an dem MySQL Verbindungen erwartet.
";
$elem["mtop/mysql_port"]["descriptionfr"]="Port de MySQL :
 Veuillez entrer le port d'écoute de MySQL.
";
$elem["mtop/mysql_port"]["default"]="3306";
$elem["mtop/root"]["type"]="string";
$elem["mtop/root"]["description"]="Name of your database's administrative user:
 Please enter the username of MySQL administrator (needed for
 creating the mysqltop user).
";
$elem["mtop/root"]["descriptionde"]="Benutzername des Datenbank-Administrators:
 Bitte geben Sie den Benutzernamen des MySQL-Administrators ein (wird zum Anlegen des mysqltop-Benutzers benötigt).
";
$elem["mtop/root"]["descriptionfr"]="Identifiant de l'administrateur de bases de données :
 Veuillez indiquer le nom de l'administrateur MySQL, qui servira pour la création de l'utilisateur « mysqltop ».
";
$elem["mtop/root"]["default"]="root";
$elem["mtop/password"]["type"]="password";
$elem["mtop/password"]["description"]="Password of your database's administrative user:
 Enter \"none\" if there is no password for MySQL administration.
";
$elem["mtop/password"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Geben Sie »none« ein, wenn kein Passwort für die MySQL-Administration benötigt wird.
";
$elem["mtop/password"]["descriptionfr"]="Mot de passe de l'administrateur de bases de données :
 Veuillez entrer « none » si l'administrateur MySQL n'a pas de mot de passe.
";
$elem["mtop/password"]["default"]="none";
PKG_OptionPageTail2($elem);
?>
