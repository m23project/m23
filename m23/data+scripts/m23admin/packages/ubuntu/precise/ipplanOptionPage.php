<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipplan");

$elem["ipplan/webserver_type"]["type"]="multiselect";
$elem["ipplan/webserver_type"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run ipplan.
";
$elem["ipplan/webserver_type"]["descriptionde"]="Web-Server, der automatisch rekonfiguriert werden soll:
 Bitte wählen Sie den Webserver aus, der automatisch für den Betrieb von Ipplan konfiguriert werden soll.
";
$elem["ipplan/webserver_type"]["descriptionfr"]="Serveur Web à reconfigurer automatiquement :
 Veuillez choisir le serveur Web à reconfigurer automatiquement qui sera utilisé par ipplan.
";
$elem["ipplan/webserver_type"]["default"]="apache2";
$elem["ipplan/restart-webserver"]["type"]="boolean";
$elem["ipplan/restart-webserver"]["description"]="Should ${webserver} be restarted?
 In order to activate the new configuration, ${webserver} has
 to be restarted. You can also restart ${webserver} by manually executing
 'invoke-rc.d ${webserver} restart'.
";
$elem["ipplan/restart-webserver"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Damit die neue Konfiguration aktiviert wird, muss ${webserver} neu gestartet werden. Sie können ${webserver} auch manuell durch »invoke-rc.d ${webserver} restart« neu starten.
";
$elem["ipplan/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Veuillez noter que, pour que la nouvelle configuration soit active, ${webserver} doit être redémarré. Vous pouvez aussi redémarrer ${webserver} en exécutant la commande « invoke-rc.d ${webserver} restart ».
";
$elem["ipplan/restart-webserver"]["default"]="false";
$elem["ipplan/mysql/configure"]["type"]="boolean";
$elem["ipplan/mysql/configure"]["description"]="Configure MySQL?
 Please confirm whether MySQL should be configured automatically.
 .
 If you do not choose this option, please see the instructions in
 /usr/share/doc/ipplan/README.Debian.
";
$elem["ipplan/mysql/configure"]["descriptionde"]="MySQL konfigurieren?
 Bitte bestätigen Sie, ob MySQL automatisch konfiguriert werden soll.
 .
 Falls Sie diese Option nicht wählen, lesen Sie die Anweisungen in /usr/share/doc/ipplan/README.Debian.
";
$elem["ipplan/mysql/configure"]["descriptionfr"]="Faut-il configurer MySQL ?
 Veuillez confirmer que MySQL doit être reconfiguré automatiquement.
 .
 Si vous refusez cette option, veuillez lire les instructions dans le fichier /usr/share/doc/ipplan/README.Debian.
";
$elem["ipplan/mysql/configure"]["default"]="true";
$elem["ipplan/mysql/dbserver"]["type"]="string";
$elem["ipplan/mysql/dbserver"]["description"]="MySQL host:
 Please enter the name or IP address of the MySQL database server
 that will store the ipplan database.
";
$elem["ipplan/mysql/dbserver"]["descriptionde"]="MySQL-Rechner:
 Bitte geben Sie den Namen oder die IP-Adresse des Rechners ein, auf dem der MySQL-Datenbankserver mit der Ipplan-Datenbank läuft.
";
$elem["ipplan/mysql/dbserver"]["descriptionfr"]="Hôte MySQL :
 Veuillez indiquer le nom ou l'adresse IP  du serveur de bases de données MySQL qui accueille la base de données d'ipplan.
";
$elem["ipplan/mysql/dbserver"]["default"]="localhost";
$elem["ipplan/mysql/dbadmin"]["type"]="string";
$elem["ipplan/mysql/dbadmin"]["description"]="Database server administrator username:
 Please enter the username of the database server administrator. This
 account must have database creation privileges.
";
$elem["ipplan/mysql/dbadmin"]["descriptionde"]="Benutzername des Datenbankserver-Administrators:
 Bitte geben Sie den Benutzernamen des Datenbankserver-Administrators ein. Dieses Konto muss über die Rechte zur Erstellung einer Datenbank verfügen.
";
$elem["ipplan/mysql/dbadmin"]["descriptionfr"]="Identifiant de l'administrateur du serveur de bases de données :
 Veuillez indiquez l'identifiant de l'administrateur du serveur de bases de données. Ce compte doit posséder les privilèges de création de bases de données.
";
$elem["ipplan/mysql/dbadmin"]["default"]="root";
$elem["ipplan/purge"]["type"]="boolean";
$elem["ipplan/purge"]["description"]="Delete database on purge?
 Please choose whether the database should be removed when the ipplan
 package is purged.
";
$elem["ipplan/purge"]["descriptionde"]="Datenbank bei vollständiger Entfernung (purge) löschen?
 Bitte wählen Sie aus, ob die Datenbank gelöscht werden soll, wenn das Paket Ipplan vollständig entfernt wird.
";
$elem["ipplan/purge"]["descriptionfr"]="Faut-il supprimer la base de données à la purge du paquet ?
 Veuillez confirmer si la base de données doit être supprimée lorsque le paquet ipplan est purgé.
";
$elem["ipplan/purge"]["default"]="true";
$elem["ipplan/mysql/dbname"]["type"]="string";
$elem["ipplan/mysql/dbname"]["description"]="IPplan database name:
 Please enter the name of the database that will host data for IPplan.
";
$elem["ipplan/mysql/dbname"]["descriptionde"]="Name der IPplan-Datenbank:
 Bitte geben Sie den Namen der Datenbank ein, die die Daten für IPplan enthalten wird.
";
$elem["ipplan/mysql/dbname"]["descriptionfr"]="Nom de la base de données d'ipplan :
 Veuillez indiquer le nom de la base de données pour ipplan.
";
$elem["ipplan/mysql/dbname"]["default"]="ipplan";
$elem["ipplan/mysql/dbadmpass"]["type"]="password";
$elem["ipplan/mysql/dbadmpass"]["description"]="Database server administrator password:
";
$elem["ipplan/mysql/dbadmpass"]["descriptionde"]="Administrator-Passwort des Datenbankservers:
";
$elem["ipplan/mysql/dbadmpass"]["descriptionfr"]="Mot de passe de l'administrateur du serveur de bases de données :
";
$elem["ipplan/mysql/dbadmpass"]["default"]="";
$elem["ipplan/mysql/dbuser"]["type"]="string";
$elem["ipplan/mysql/dbuser"]["description"]="Database user for IPplan:
 Please choose the MySQL account that will be used to access the
 database hosting IPplan data.
";
$elem["ipplan/mysql/dbuser"]["descriptionde"]="Datenbankbenutzer für IPplan:
 Bitte wählen Sie das MySQL-Konto aus, das zum Zugriff auf die Datenbank verwendet wird, die die IPplan-Daten enthält.
";
$elem["ipplan/mysql/dbuser"]["descriptionfr"]="Utilisateur de la base de données pour ipplan :
 Veuillez indiquer l'identifiant MySQL qui sera utilisé pour accéder à la base de données d'ipplan.
";
$elem["ipplan/mysql/dbuser"]["default"]="ipplan";
$elem["ipplan/mysql/dbpass"]["type"]="password";
$elem["ipplan/mysql/dbpass"]["description"]="Database user password:
 Please choose the password for the account that will be used to
 access the database hosting IPplan data.
";
$elem["ipplan/mysql/dbpass"]["descriptionde"]="Passwort des Datenbankbenutzers:
 Bitte wählen Sie das Passwort für das Konto aus, das zum Zugriff auf die Datenbank verwendet wird, die die IPplan-Daten enthält.
";
$elem["ipplan/mysql/dbpass"]["descriptionfr"]="Mot de passe de l'utilisateur du serveur de bases de données :
 Veuillez indiquer le mot de passe de l'utilisateur de la base de données d'ipplan.
";
$elem["ipplan/mysql/dbpass"]["default"]="";
PKG_OptionPageTail2($elem);
?>
