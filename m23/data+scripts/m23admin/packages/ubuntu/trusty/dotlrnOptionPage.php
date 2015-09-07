<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dotlrn");

$elem["dotlrn/db_host"]["type"]="string";
$elem["dotlrn/db_host"]["description"]="Host running the PostgreSQL server for dotLRN:
 Please provide the hostname of a remote PostgreSQL server.
 .
 You must have already arranged for the administrative
 account to be able to remotely create databases and grant
 privileges. 
";
$elem["dotlrn/db_host"]["descriptionde"]="Rechner auf dem der PostgreSQL-Server für dotLRN läuft:
 Bitte geben Sie den Rechnernamen des PostgreSQL-Servers in der Ferne ein.
 .
 Sie müssen bereits einen Administrationszugang auf dem Rechner in der Ferne so eingerichtet haben, dass das Erstellen von Datenbanken und das Einrichten der Zugriffsrechte ermöglicht worden ist.
";
$elem["dotlrn/db_host"]["descriptionfr"]="Nom d'hôte du serveur PostgreSQL pour dotLRN :
 Veuillez indiquer le nom d'hôte du serveur PostgreSQL distant.
 .
 Un compte possédant des privilèges d'administrateur doit déjà être configuré pour créer une base distante et donner les droits d'accès.
";
$elem["dotlrn/db_host"]["default"]="localhost";
$elem["dotlrn/dba_name"]["type"]="string";
$elem["dotlrn/dba_name"]["description"]="Database administrator username:
 Please enter the PostgreSQL administrator username, needed for
 the database creation.
";
$elem["dotlrn/dba_name"]["descriptionde"]="Benutzername des Datenbank-Administrators:
 Bitte geben Sie den Benutzernamen des PostgreSQL-Administrators an; er wird für die Erzeugung der Datenbank benötigt.
";
$elem["dotlrn/dba_name"]["descriptionfr"]="Identifiant de l'administrateur de la base de données :
 Veuillez indiquer l'identifiant de l'administrateur de PostgreSQL, nécessaire pour la création de la base de données.
";
$elem["dotlrn/dba_name"]["default"]="postgres";
$elem["dotlrn/dba_password"]["type"]="password";
$elem["dotlrn/dba_password"]["description"]="Database administrator password:
 Please enter the PostgreSQL administrator password, needed for
 the database creation.
";
$elem["dotlrn/dba_password"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Bitte geben Sie das Passwort des PostgreSQL-Administrators an; es wird für die Erzeugung der Datenbank benötigt.
";
$elem["dotlrn/dba_password"]["descriptionfr"]="Mot de passe de l'administrateur du serveur de bases de données :
 Veuillez indiquer le mot de passe de l'administrateur de PostgreSQL, nécessaire pour la création de la base de données.
";
$elem["dotlrn/dba_password"]["default"]="";
$elem["dotlrn/mismatch"]["type"]="note";
$elem["dotlrn/mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please enter a password again.
";
$elem["dotlrn/mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden eingegebenen Passwörter stimmen nicht überein. Bitte versuchen Sie es noch einmal.
";
$elem["dotlrn/mismatch"]["descriptionfr"]="Mots de passe différents
 Le mot de passe et sa confirmation ne correspondent pas. Veuillez les saisir à nouveau.
";
$elem["dotlrn/mismatch"]["default"]="";
$elem["dotlrn/dbu_name"]["type"]="string";
$elem["dotlrn/dbu_name"]["description"]="Database username for dotLRN:
 Please provide a PostgreSQL username for dotLRN to register with the
 database server.  A PostgreSQL user is not necessarily the same as a
 system login, especially if the database is on a remote server.
 .
 This is the user which will own the database, tables and other
 objects to be created by this installation.  This user will have
 complete freedom to insert, change or delete data in the database.
";
$elem["dotlrn/dbu_name"]["descriptionde"]="Benutzername des Datenbank-Benutzers für dotLRN:
 Bitte geben Sie einen PostgreSQL-Benutzernamen ein, mit dem sich dotLRN am Datenbank-Server anmelden soll. Ein PostgreSQL-Benutzer ist nicht unbedingt ein System-Anmeldename, insbesondere wenn die Datenbank auf einem Server in der Ferne läuft.
 .
 Dieser Benutzer wird der Eigentümer der Datenbank, der Tabellen und anderer Objekte sein, die bei der Installation erzeugt werden. Dieser Benutzer hat alle Rechte, Daten in die Datenbank einzufügen, in ihr zu verändern oder aus ihr zu löschen.
";
$elem["dotlrn/dbu_name"]["descriptionfr"]="Identifiant du propriétaire de la base de données de dotLRN :
 Veuillez indiquer un identifiant de connexion PostgreSQL pour dotLRN sur le serveur de bases de données. L'identifiant PostgreSQL n'est pas nécessairement le même que l'identifiant de connexion Unix, en particulier quand la base de données se trouve sur un serveur distant.
 .
 Cet identifiant est celui qui sera le propriétaire de la base de données, des tables et autres objets qui seront créés par cette installation. Il pourra à volonté insérer, changer ou supprimer des données dans la base de données.
";
$elem["dotlrn/dbu_name"]["default"]="www-data ";
$elem["dotlrn/dbu_password"]["type"]="password";
$elem["dotlrn/dbu_password"]["description"]="Database owner password:
 Please enter the password of the dotLRN database owner.
";
$elem["dotlrn/dbu_password"]["descriptionde"]="Passwort des Datenbank-Besitzers:
 Bitte geben Sie das Passwort des dotLRN-Datenbank-Besitzers an.
";
$elem["dotlrn/dbu_password"]["descriptionfr"]="Mot de passe du propriétaire de la base de données :
 Veuillez choisir le mot de passe du propriétaire de la base de données de dotLRN.
";
$elem["dotlrn/dbu_password"]["default"]="";
$elem["dotlrn/dbu_confirm"]["type"]="password";
$elem["dotlrn/dbu_confirm"]["description"]="Database owner password confirmation:
 Please confirm the password of the dotLRN database owner.
";
$elem["dotlrn/dbu_confirm"]["descriptionde"]="Passwort-Bestätigung des Datenbank-Besitzers:
 Bitte bestätigen Sie das Passwort des dotLRN-Datenbank-Besitzers, um fortzufahren.
";
$elem["dotlrn/dbu_confirm"]["descriptionfr"]="Confirmation du mot de passe du propriétaire de la base de données :
 Veuillez confirmer le mot de passe du propriétaire de la base de données, de dotLRN pour en vérifier la saisie.
";
$elem["dotlrn/dbu_confirm"]["default"]="";
$elem["dotlrn/pg_grant_access"]["type"]="boolean";
$elem["dotlrn/pg_grant_access"]["description"]="Grant PostgreSQL access to the dotLRN user?
 Please specify whether /etc/postgresql/.../pg_hba.conf should
 allow the dotLRN user to access the database.
";
$elem["dotlrn/pg_grant_access"]["descriptionde"]="Wollen Sie dem dotLRN-Benutzer Zugriff auf PostgreSQL gewähren?
 Bitte geben Sie an, ob in /etc/postgresql/.../pg_hba.conf dem dotLRN-Benutzer Zugriff auf die Datenbank gewährt werden soll.
";
$elem["dotlrn/pg_grant_access"]["descriptionfr"]="Faut-il donner accès à PostgreSQL pour l'identifiant de dotLRN ?
 Veuillez indiquer si /etc/postgresql/.../pg_hba.conf doit autoriser l'identifiant utilisé par dotLRN à accéder à la base de données.
";
$elem["dotlrn/pg_grant_access"]["default"]="";
PKG_OptionPageTail2($elem);
?>
