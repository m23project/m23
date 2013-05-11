<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("moodle");

$elem["moodle/webserver"]["type"]="select";
$elem["moodle/webserver"]["choices"][1]="apache2";
$elem["moodle/webserver"]["choices"][2]="apache";
$elem["moodle/webserver"]["choices"][3]="apache-ssl";
$elem["moodle/webserver"]["description"]="Web server software:
 Please choose the web server software you will use with Moodle.
";
$elem["moodle/webserver"]["descriptionde"]="Webserver-Software:
 Bitte wählen Sie die Webserver-Software aus, die Sie mit Moodle verwenden werden.
";
$elem["moodle/webserver"]["descriptionfr"]="Logiciel serveur web :
 Veuillez choisir le logiciel serveur web que vous désirez utiliser avec Moodle.
";
$elem["moodle/webserver"]["default"]="apache2";
$elem["moodle/db_server"]["type"]="select";
$elem["moodle/db_server"]["choices"][1]="postgresql";
$elem["moodle/db_server"]["description"]="Database server software for Moodle:
 Moodle can work with either MySQL or PostgreSQL. Please choose which
 one you want to use.
 .
 Please check that it is installed before continuing.
";
$elem["moodle/db_server"]["descriptionde"]="Datenbankserver-Software für Moodle:
 Moodle kann entweder mit MySQL oder PostgreSQL arbeiten. Bitte wählen Sie aus, welches Datenbankmanagementsystem Sie benutzen möchten.
 .
 Bitte überprüfen Sie, dass sie installiert ist, bevor Sie fortfahren.
";
$elem["moodle/db_server"]["descriptionfr"]="Logiciel serveur de bases de données pour Moodle :
 Moodle peut fonctionner avec MySQL ou PostgreSQL. Veuillez choisir le serveur de bases de données que vous souhaitez utiliser.
 .
 Vérifiez qu'il est bien installé avant de continuer.
";
$elem["moodle/db_server"]["default"]="postgresql";
$elem["moodle/db_host"]["type"]="string";
$elem["moodle/db_host"]["description"]="Database server hostname:
 Please enter the hostname of the database server host.
";
$elem["moodle/db_host"]["descriptionde"]="Datenbankserver-Rechnername:
 Bitte geben Sie den Rechnernamen des Datenbankservers (Hosts) ein.
";
$elem["moodle/db_host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données :
 Veuillez indiquer le nom d'hôte du serveur de bases de données.
";
$elem["moodle/db_host"]["default"]="localhost";
$elem["moodle/dba_name"]["type"]="string";
$elem["moodle/dba_name"]["description"]="Database administrator username:
 Please enter the PostgreSQL or MySQL administrator username, needed for
 the database creation.
";
$elem["moodle/dba_name"]["descriptionde"]="Benutzername des Datenbankadministrators:
 Bitte geben Sie den Benutzernamen des PostgreSQL- oder MySQL-Administrators ein. Dieser wird für die Datenbankerstellung benötigt.
";
$elem["moodle/dba_name"]["descriptionfr"]="Identifiant de l'administrateur du serveur de bases de données :
 Veuillez indiquer l'identifiant de l'administrateur de PostgreSQL ou MySQL. Il est nécessaire pour la création de la base de données.
";
$elem["moodle/dba_name"]["default"]="postgres";
$elem["moodle/dba_password"]["type"]="password";
$elem["moodle/dba_password"]["description"]="Database administrator password:
 Please enter the PostgreSQL or MySQL administrator password, needed for
 the database creation.
";
$elem["moodle/dba_password"]["descriptionde"]="Datenbankadministratorpasswort:
 Bitte geben Sie das Passwort des PostgreSQL- oder MySQL-Administrators ein. Dies wird für die Datenbankerstellung benötigt.
";
$elem["moodle/dba_password"]["descriptionfr"]="Mot de passe de l'administrateur de bases de données :
 Veuillez indiquer le mot de passe de l'administrateur de PostgreSQL ou MySQL. Il est nécessaire pour la création de la base de données.
";
$elem["moodle/dba_password"]["default"]="";
$elem["moodle/dba_confirm"]["type"]="password";
$elem["moodle/dba_confirm"]["description"]="DBA password confirmation:
 Please confirm the password in order to continue the process.
";
$elem["moodle/dba_confirm"]["descriptionde"]="DBA-Passwortbestätigung:
 Bitte bestätigen Sie das Passwort, um fortzufahren.
";
$elem["moodle/dba_confirm"]["descriptionfr"]="Confirmation du mot de passe de l'administrateur :
 Veuillez confirmer le mot de passe afin de poursuivre.
";
$elem["moodle/dba_confirm"]["default"]="";
$elem["moodle/mismatch"]["type"]="note";
$elem["moodle/mismatch"]["description"]="Password mismatch
 The password and its confirmation do not match. Please
 reenter the passwords.
";
$elem["moodle/mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Das Passwort und seine Bestätigung stimmen nicht überein. Bitte geben Sie die Passwörter erneut ein.
";
$elem["moodle/mismatch"]["descriptionfr"]="Mots de passe différents
 Le mot de passe et sa confirmation ne correspondent pas. Veuillez indiquer à nouveau les mots de passe.
";
$elem["moodle/mismatch"]["default"]="";
$elem["moodle/dbu_name"]["type"]="string";
$elem["moodle/dbu_name"]["description"]="Database owner username:
 Please enter the username of the Moodle database owner.
";
$elem["moodle/dbu_name"]["descriptionde"]="Benutzername des Datenbankeigentümers:
 Bitte geben Sie den Benutzernamen des Eigentümers der Moodle-Datenbank ein.
";
$elem["moodle/dbu_name"]["descriptionfr"]="Identifiant du propriétaire de la base de données :
 Veuillez indiquer l'identifiant du propriétaire de la base de données de Moodle.
";
$elem["moodle/dbu_name"]["default"]="moodle";
$elem["moodle/dbu_password"]["type"]="password";
$elem["moodle/dbu_password"]["description"]="Database owner password:
 Please enter the password of the Moodle database owner.
";
$elem["moodle/dbu_password"]["descriptionde"]="Passwort des Datenbankeigentümers:
 Bitte geben Sie das Passwort des Eigentümers der Moodle-Datenbank ein.
";
$elem["moodle/dbu_password"]["descriptionfr"]="Mot de passe du propriétaire de la base de donnes :
 Veuillez indiquer le mot de passe du propriétaire de la base de données de Moodle.
";
$elem["moodle/dbu_password"]["default"]="";
$elem["moodle/dbu_confirm"]["type"]="password";
$elem["moodle/dbu_confirm"]["description"]="Database user password confirmation:
 Please confirm the password of the Moodle database owner.
";
$elem["moodle/dbu_confirm"]["descriptionde"]="Bestätigung des Passworts des Datenbankbenutzers:
 Bitte bestätigen Sie das Passwort des Eigentümers der Moodle-Datenbank.
";
$elem["moodle/dbu_confirm"]["descriptionfr"]="Confirmation du mot de passe du propriétaire :
 Veuillez confirmer le mot de passe du propriétaire de la base de données.
";
$elem["moodle/dbu_confirm"]["default"]="";
$elem["moodle/notconfigured"]["type"]="note";
$elem["moodle/notconfigured"]["description"]="Warning - Moodle is not configured
 Please note that you have not completed the Moodle configuration. For
 completing it, please use \"dpkg-reconfigure moodle\" later.
";
$elem["moodle/notconfigured"]["descriptionde"]="Warnung - Moddle ist nicht konfiguriert
 Bitte beachten Sie, dass Sie die Moddle-Konfiguration nicht beendet haben. Um sie zu beenden, müssen Sie später »dpkg-reconfigure moodle« ausführen.
";
$elem["moodle/notconfigured"]["descriptionfr"]="Moodle non configuré
 Veuillez noter que la configuration de Moodle n'est pas terminée. Pour la terminer plus tard, veuillez utiliser la commande « dpkg-reconfigure moodle ».
";
$elem["moodle/notconfigured"]["default"]="";
$elem["moodle/create_tables"]["type"]="note";
$elem["moodle/create_tables"]["description"]="Warning - Moodle database tables not created
 The Moodle install script will create the database, but
 the tables are to be created with a PHP script. Please
 launch it right after the install:
 .
 http://localhost/moodle/admin
";
$elem["moodle/create_tables"]["descriptionde"]="Warnung - Moodle-Datenbanktabellen nicht erstellt
 Das Moodle-Installationsskript wird die Datenbank erstellen, aber die Tabellen müssen mit einem PHP-Skript erstellt werden. Bitte führen Sie es direkt nach der Installation aus:
 .
 http://localhost/moodle/admin
";
$elem["moodle/create_tables"]["descriptionfr"]="Tables de la base de données de Moodle non créées
 Le script d'installation de Moodle s'occupera de la création de la base de données, mais les tables qu'elle doit contenir doivent être créées avec un script PHP. Veuillez le lancer immédiatement après l'installation :
 .
 http://localhost/moodle/admin
";
$elem["moodle/create_tables"]["default"]="";
PKG_OptionPageTail2($elem);
?>
