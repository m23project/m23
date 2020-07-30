<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mysqmail");

$elem["mysqmail/conf_mysqlautoconfig"]["type"]="boolean";
$elem["mysqmail/conf_mysqlautoconfig"]["description"]="Reuse MySQL authentication information from DTC?
 MySQMail can use the same MySQL credentials as DTC.
 .
 If you choose this option, you will not be prompted for a login
 and password to configure MySQMail.
";
$elem["mysqmail/conf_mysqlautoconfig"]["descriptionde"]="MySQL-Authentifizierungsinformationen von DTC wiederverwenden?
 MySQMail kann die gleichen MySQL-Zugangsberechtigungen wie DTC verwenden.
 .
 Wenn Sie diese Option wählen, werden Sie bei der Einrichtung von MySQMail nicht nach einem Anmeldenamen und einem Passwort gefragt.
";
$elem["mysqmail/conf_mysqlautoconfig"]["descriptionfr"]="Réutiliser les informations d'authentification MySQL de DTC ?
 MySQMail peut utiliser les mêmes identifiants MySQL que DTC.
 .
 Si vous choisissez cette option, vous n'aurez pas à entrer un nom d'utilisateur ou un mot de passe pour configurer MySQMail.
";
$elem["mysqmail/conf_mysqlautoconfig"]["default"]="true";
$elem["mysqmail/conf_mysqlhost"]["type"]="string";
$elem["mysqmail/conf_mysqlhost"]["description"]="MySQL hostname:
 Please enter the hostname or IP address of the MySQL server for MySQMail.
";
$elem["mysqmail/conf_mysqlhost"]["descriptionde"]="MySQL-Rechnername:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse des MySQL-Servers für MySQMail ein.
";
$elem["mysqmail/conf_mysqlhost"]["descriptionfr"]="Nom de l'hôte MySQL :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur MySQL pour MySQMail.
";
$elem["mysqmail/conf_mysqlhost"]["default"]="localhost";
$elem["mysqmail/conf_mysqllogin"]["type"]="string";
$elem["mysqmail/conf_mysqllogin"]["description"]="MySQL login:
 Please enter the MySQL login needed to create (and later, access) the MySQMail
 database.
";
$elem["mysqmail/conf_mysqllogin"]["descriptionde"]="MySQL-Anmeldename:
 Geben Sie den MySQL-Anmeldenamen ein, der benötigt wird, um die MySQMail-Datenbank anzulegen (und später darauf zuzugreifen).
";
$elem["mysqmail/conf_mysqllogin"]["descriptionfr"]="Nom d'utilisateur MySQL :
 Veuillez indiquer l'identifiant MySQL qui sera utilisé pour créer (puis ensuite utiliser) la base de données de MySQMail.
";
$elem["mysqmail/conf_mysqllogin"]["default"]="root";
$elem["mysqmail/conf_mysqlpass"]["type"]="password";
$elem["mysqmail/conf_mysqlpass"]["description"]="MySQL password:
 Please enter the MySQL password needed to create (and later, access) the MySQMail
 database.
";
$elem["mysqmail/conf_mysqlpass"]["descriptionde"]="MySQL-Passwort:
 Geben Sie das MySQL-Passwort ein, das benötigt wird, um die MySQMail-Datenbank anzulegen (und später darauf zuzugreifen).
";
$elem["mysqmail/conf_mysqlpass"]["descriptionfr"]="Mot de passe MySQL :
 Veuillez indiquer le mot de passe MySQL qui sera utilisé pour créer (puis ensuite utiliser) la base de données de MySQMail.
";
$elem["mysqmail/conf_mysqlpass"]["default"]="";
$elem["mysqmail/conf_mysqldb"]["type"]="string";
$elem["mysqmail/conf_mysqldb"]["description"]="MySQL database name:
 Please enter the name of the database where MySQMail will store its data.
";
$elem["mysqmail/conf_mysqldb"]["descriptionde"]="MySQL-Datenbankname:
 Bitte geben Sie den Namen der Datenbank ein, in der MySQMail seine Daten speichern wird.
";
$elem["mysqmail/conf_mysqldb"]["descriptionfr"]="Nom de la base de données MySQL :
 Veuillez indiquer le nom de la base de données où MySQMail conservera ses informations.
";
$elem["mysqmail/conf_mysqldb"]["default"]="dtc";
PKG_OptionPageTail2($elem);
?>
