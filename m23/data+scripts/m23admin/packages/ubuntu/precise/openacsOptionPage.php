<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openacs");

$elem["openacs/db_host"]["type"]="string";
$elem["openacs/db_host"]["description"]="Host running the PostgreSQL server for OpenACS:
 Please provide the hostname of a remote PostgreSQL server.
 .
 You must have already arranged for the administrative
 account to be able to remotely create databases and grant
 privileges. 
";
$elem["openacs/db_host"]["descriptionde"]="Rechner auf dem der PostgreSQL-Server für OpenACS läuft:
 Bitte geben Sie den Rechnernamen des PostgreSQL-Servers in der Ferne ein.
 .
 Sie müssen bereits einen Administrationszugang auf dem Rechner in der Ferne so eingerichtet haben, dass das Erstellen von Datenbanken und das Einrichten der Zugriffsrechte ermöglicht worden ist.
";
$elem["openacs/db_host"]["descriptionfr"]="Nom d'hôte du serveur PostgreSQL pour OpenACS :
 Veuillez indiquer le nom d'hôte du serveur PostgreSQL distant.
 .
 Un compte possédant des privilèges d'administrateur doit déjà être configuré pour créer une base distante et donner les droits d'accès.
";
$elem["openacs/db_host"]["default"]="localhost";
$elem["openacs/dba_name"]["type"]="string";
$elem["openacs/dba_name"]["description"]="Database administrator username:
 Please enter the PostgreSQL administrator username, needed for
 the database creation.
";
$elem["openacs/dba_name"]["descriptionde"]="Benutzername des Datenbank-Administrators:
 Bitte geben Sie den Benutzernamen des PostgreSQL-Administrators an; er wird für die Erzeugung der Datenbank benötigt.
";
$elem["openacs/dba_name"]["descriptionfr"]="Identifiant de l'administrateur de la base de données :
 Veuillez indiquer l'identifiant de l'administrateur de PostgreSQL, nécessaire pour la création de la base de données.
";
$elem["openacs/dba_name"]["default"]="postgres";
$elem["openacs/dba_password"]["type"]="password";
$elem["openacs/dba_password"]["description"]="Database administrator password:
 Please enter the PostgreSQL administrator password, needed for
 the database creation.
";
$elem["openacs/dba_password"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Bitte geben Sie das Passwort des PostgreSQL-Administrators an; es wird für die Erzeugung der Datenbank benötigt.
";
$elem["openacs/dba_password"]["descriptionfr"]="Mot de passe de l'administrateur du serveur de bases de données :
 Veuillez indiquer le mot de passe de l'administrateur de PostgreSQL, nécessaire pour la création de la base de données.
";
$elem["openacs/dba_password"]["default"]="";
$elem["openacs/mismatch"]["type"]="note";
$elem["openacs/mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please enter a password again.
";
$elem["openacs/mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden eingegebenen Passwörter stimmen nicht überein. Bitte versuchen Sie es noch einmal.
";
$elem["openacs/mismatch"]["descriptionfr"]="Mots de passe différents
 Le mot de passe et sa confirmation ne correspondent pas. Veuillez les saisir à nouveau.
";
$elem["openacs/mismatch"]["default"]="";
$elem["openacs/dbu_name"]["type"]="string";
$elem["openacs/dbu_name"]["description"]="Database username for OpenACS:
 Please provide a PostgreSQL username for OpenACS to register with the
 database server.  A PostgreSQL user is not necessarily the same as a
 system login, especially if the database is on a remote server.
 .
 This is the user which will own the database, tables and other
 objects to be created by this installation.  This user will have
 complete freedom to insert, change or delete data in the database.
";
$elem["openacs/dbu_name"]["descriptionde"]="Benutzername des Datenbank-Benutzers für OpenACS:
 Bitte geben Sie einen PostgreSQL-Benutzernamen ein, mit dem sich OpenACS am Datenbank-Server anmelden soll. Ein PostgreSQL-Benutzer ist nicht unbedingt ein System-Anmeldename, insbesondere wenn die Datenbank auf einem Server in der Ferne läuft.
 .
 Dieser Benutzer wird der Eigentümer der Datenbank, der Tabellen und anderer Objekte sein, die bei der Installation erzeugt werden. Dieser Benutzer hat alle Rechte, Daten in die Datenbank einzufügen, in ihr zu verändern oder aus ihr zu löschen.
";
$elem["openacs/dbu_name"]["descriptionfr"]="Identifiant du propriétaire de la base de données de OpenACS :
 Veuillez indiquer un identifiant de connexion PostgreSQL pour OpenACS sur le serveur de bases de données. L'identifiant PostgreSQL n'est pas nécessairement le même que l'identifiant de connexion Unix, en particulier quand la base de données se trouve sur un serveur distant.
 .
 Cet identifiant est celui qui sera le propriétaire de la base de données, des tables et autres objets qui seront créés par cette installation. Il pourra à volonté insérer, changer ou supprimer des données dans la base de données.
";
$elem["openacs/dbu_name"]["default"]="www-data ";
$elem["openacs/dbu_password"]["type"]="password";
$elem["openacs/dbu_password"]["description"]="Database owner password:
 Please enter the password of the OpenACS database owner.
";
$elem["openacs/dbu_password"]["descriptionde"]="Passwort des Datenbank-Besitzers:
 Bitte geben Sie das Passwort des OpenACS-Datenbank-Besitzers an.
";
$elem["openacs/dbu_password"]["descriptionfr"]="Mot de passe du propriétaire de la base de données :
 Veuillez choisir le mot de passe du propriétaire de la base de données d'OpenACS.
";
$elem["openacs/dbu_password"]["default"]="";
$elem["openacs/dbu_confirm"]["type"]="password";
$elem["openacs/dbu_confirm"]["description"]="Database owner password confirmation:
 Please confirm the password of the OpenACS database owner.
";
$elem["openacs/dbu_confirm"]["descriptionde"]="Passwort-Bestätigung des Datenbank-Besitzers:
 Bitte bestätigen Sie das Passwort des OpenACS-Datenbank-Besitzers um fortzufahren.
";
$elem["openacs/dbu_confirm"]["descriptionfr"]="Confirmation du mot de passe du propriétaire de la base de données :
 Veuillez confirmer le mot de passe du propriétaire de la base de données d'OpenACS, pour en vérifier la saisie.
";
$elem["openacs/dbu_confirm"]["default"]="";
$elem["openacs/pg_grant_access"]["type"]="boolean";
$elem["openacs/pg_grant_access"]["description"]="Grant PostgreSQL access to the OpenACS user?
 Please specify whether /etc/postgresql/.../pg_hba.conf should
 allow the OpenACS user to access the database.
";
$elem["openacs/pg_grant_access"]["descriptionde"]="Wollen Sie dem OpenACS-Benutzer Zugriff auf PostgreSQL gewähren?
 Bitte geben Sie an, ob in /etc/postgresql/.../pg_hba.conf dem OpenACS-Benutzer Zugriff auf die Datenbank gewährt werden soll.
";
$elem["openacs/pg_grant_access"]["descriptionfr"]="Faut-il donner accès à PostgreSQL pour l'identifiant d'OpenACS ?
 Veuillez indiquer si /etc/postgresql/.../pg_hba.conf doit autoriser l'identifiant utilisé par OpenACS à accéder à la base de données.
";
$elem["openacs/pg_grant_access"]["default"]="";
PKG_OptionPageTail2($elem);
?>
