<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("diogenes");

$elem["diogenes/welcome"]["type"]="note";
$elem["diogenes/welcome"]["description"]="Welcome to the Diogenes setup program
 You must have a database server already setup and ready to go if you are
 going to have this program configure your database for you.  If you are
 not comfortable with this, you should tell the debconf process that you do
 not have any database server.  You will then need to configure Diogenes manually.
 .
 If debconf is set up in a way that you will not be asked questions
 interactively (i.e. you do not see this note during installation but as a
 mail to your root account), Diogenes will assume that your web server is
 apache and your database server is MySQL and no MySQL root password is set.  If
 any of these do not apply, Diogenes will not run unless you configure it
 manually by creating its database and editing the files in /etc/diogenes.
";
$elem["diogenes/welcome"]["descriptionde"]="Willkommen zum Einrichtungsprogramm von Diogenes
 Es muss ein Datenbank-Server eingerichtet und betriebsbereit sein, wenn dieses Programm die Datenbank für Sie einrichten soll.  Wenn Sie das nicht möchten, geben Sie an, dass Sie keinen Datenbank-Server haben. Sie müssen Diogenes dann manuell einrichten.
 .
 Wenn debconf so eingerichtet ist, dass es interaktiv keine Fragen stellt (z. B. Sie sehen diesen Hinweis nicht während der Installation, sondern als E-Mail in Ihrem root-Postfach), hat Diogenes angenommen, dass Ihr Web-Server Apache ist, als Datenbank MySQL verwendet wird und kein MySQL-root-Passwort vergeben ist.  Wenn etwas davon nicht zutrifft, wird Diogenes nicht funktionieren bis Sie die Datenbank manuell eingerichtet und die Dateien in /etc/diogenes angepasst haben.
";
$elem["diogenes/welcome"]["descriptionfr"]="Bienvenue dans le programme de paramétrage de diogenes
 Vous devez déjà avoir un serveur de bases de données paramétré et prêt si vous souhaitez que ce programme configure la base de données pour vous. Si cela ne vous convient pas, vous devriez indiquer au processus debconf que vous n'avez pas de serveur de bases de données. Vous devrez ensuite configurer diogenes vous-même.
 .
 Si debconf est paramétré pour ne pas vous poser de questions de façon interactive (c'est-à-dire que vous ne voyez pas cette note pendant l'installation mais dans un courriel adressé au super-utilisateur), diogenes supposera que votre serveur web est apache, que votre serveur de bases de données est MySQL et qu'il n'y a pas de mot de passe pour l'administrateur de MySQL. Si l'une de ces conditions ne s'applique pas, diogenes ne fonctionnera pas tant que vous ne l'aurez pas configuré vous-même en créant sa base de données et en modifiant les fichiers dans /etc/diogenes.
";
$elem["diogenes/welcome"]["default"]="";
$elem["diogenes/purge_removes_data"]["type"]="boolean";
$elem["diogenes/purge_removes_data"]["description"]="Remove web site data after \"purging\" the diogenes package?
 Should the data that makes up Diogenes's web sites be removed when
 the diogenes packages is purged with the \"dpkg --purge diogenes\" command
 (i.e. remove everything including the configuration)?
";
$elem["diogenes/purge_removes_data"]["descriptionde"]="Daten der Web-Seiten beim restlosen Entfernen des Pakets Diogenes löschen?
 Sollen die Daten, aus denen die Web-Seiten von Diogenes zusammengebaut werden, gelöscht werden, wenn das Paket mit dem Kommando \"dpkg --purge diogenes\" (alles incl. Konfigurationsdateien löschen) entfernt wird?
";
$elem["diogenes/purge_removes_data"]["descriptionfr"]="Supprimer les données du site lors de la purge du paquet ?
 Veuillez choisir si vous souhaitez supprimer les données créées pour les sites de diogenes lors de la purge du paquet par la commande « dpkg --purge diogenes » (c'est-à-dire tout supprimer y compris la configuration).
";
$elem["diogenes/purge_removes_data"]["default"]="true";
$elem["diogenes/webservers"]["type"]="multiselect";
$elem["diogenes/webservers"]["choices"][1]="apache";
$elem["diogenes/webservers"]["choices"][2]="apache-ssl";
$elem["diogenes/webservers"]["choices"][3]="apache-perl";
$elem["diogenes/webservers"]["choicesde"][1]="apache";
$elem["diogenes/webservers"]["choicesde"][2]="apache-ssl";
$elem["diogenes/webservers"]["choicesde"][3]="apache-perl";
$elem["diogenes/webservers"]["choicesfr"][1]="apache";
$elem["diogenes/webservers"]["choicesfr"][2]="apache-ssl";
$elem["diogenes/webservers"]["choicesfr"][3]="apache-perl";
$elem["diogenes/webservers"]["description"]="Type of web server:
 By default Diogenes supports any web server that php4 does.  This config
 process currently only supports Apache directly.  If you use another one
 you will have to handle the web ends manually.  If you choose the first
 option, this install process will manage the configuration (or attempt to)
 of the Apache specific portions necessary to run Diogenes properly.
";
$elem["diogenes/webservers"]["descriptionde"]="Web-Server:
 Standardmäßig unterstützt Diogenes jeden Web-Server, der PHP4 kann.  Dieses Einrichtungsprogramm unterstützt nur Apache direkt.  Wenn Sie einen anderen benutzen, müssen Sie die Einrichtung manuell vornehmen.  Wenn Sie den ersten Eintrag auswählen, werden jetzt die Einstellungen der Apache-spezifischen Teile, die für Diogenes nötig sind, vorgenommen (oder zumindest versucht). Wenn Sie das nicht wollen, wählen Sie den Eintrag \"Anderer\" aus.
";
$elem["diogenes/webservers"]["descriptionfr"]="Type de serveur web :
 Par défaut, diogenes gère les mêmes serveurs web que PHP4. Le processus de configuration actuel ne supporte directement qu'apache. Si vous en utilisez un autre, vous devrez vous occuper de la partie web vous-même. Si vous choisissez la première option, le processus d'installation gérera (ou essayera de gérer) la configuration des parties d'apache spécifiques nécessaires au fonctionnement correct de diogenes.
";
$elem["diogenes/webservers"]["default"]="apache";
$elem["diogenes/webuser"]["type"]="string";
$elem["diogenes/webuser"]["description"]="User your web server runs as:
 Unable to obtain the user your web server runs as. This is needed in order
 to allow the web server to write the files that make up the Diogenes-managed
 web sites.
";
$elem["diogenes/webuser"]["descriptionde"]="Web-Server läuft unter Benutzer:
 Der Benutzer, unter dem Ihr Web-Server läuft, konnte nicht festgestellt werden. Das ist nötig, um dem Web-Server das Schreiben der Dateien zu ermöglichen, aus denen die von Diogenes verwalteten Web-Seiten zusammengebaut werden.
";
$elem["diogenes/webuser"]["descriptionfr"]="Identifiant utilisé par le serveur web :
 Il s'est avéré impossible d'obtenir l'identifiant qu'utilise le serveur web pour fonctionner. Cet identifiant est nécessaire pour permettre au serveur web de gérer les fichiers qui composent les sites gérés par diogenes.
";
$elem["diogenes/webuser"]["default"]="www-data";
$elem["diogenes/webgroup"]["type"]="string";
$elem["diogenes/webgroup"]["description"]="Group your web server runs as:
 Unable to obtain the group your web server runs as.  This is needed in order
 to allow the web server to read Diogenes's configuration files.
";
$elem["diogenes/webgroup"]["descriptionde"]="Web-Server läuft unter Gruppe:
 Die Gruppe, unter der Ihr Web-Server läuft, konnte nicht festgestellt werden. Das ist nötig, um dem Web-Server das Lesen der Konfigurationsdateien von Diogenes zu ermöglichen.
";
$elem["diogenes/webgroup"]["descriptionfr"]="Groupe utilisé par le serveur web :
 Il s'est avéré impossible d'obtenir le groupe utilisé par le serveur web pour fonctionner. Ce groupe est nécessaire pour permettre au serveur web de lire les fichiers de configuration de diogenes.
";
$elem["diogenes/webgroup"]["default"]="www-data";
$elem["diogenes/databasemgr_type"]["type"]="select";
$elem["diogenes/databasemgr_type"]["choices"][1]="Automatic";
$elem["diogenes/databasemgr_type"]["choicesde"][1]="Automatisch";
$elem["diogenes/databasemgr_type"]["choicesfr"][1]="Automatique";
$elem["diogenes/databasemgr_type"]["description"]="Type of database installation:
 If you want the setup program to ask you questions and do the database
 setup for you, select \"Automatic\". (Recommended)
 .
 If you want to configure your database by hand, select \"Manual\".  In this
 case you will have to create the Diogenes database and user by hand and
 handle database upgrades manually.
";
$elem["diogenes/databasemgr_type"]["descriptionde"]="Art der Datenbank-Installation:
 Wenn das Einrichtungsprogramm Sie befragen und die Datenbank für Sie einrichten soll, dann wählen Sie \"Automatisch\" aus. (empfohlen)
 .
 Wenn Sie Ihre Datenbank selbst einrichten wollen, dann wählen Sie \"Manuell\" aus.  In diesem Fall müssen Sie die Datenbank und den Benutzer für Diogenes manuell anlegen und Datenbank-Aktualisierungen selbst durchführen.
";
$elem["diogenes/databasemgr_type"]["descriptionfr"]="Type d'installation de la base de données :
 Si vous souhaitez que le programme de paramétrage vous pose des questions et paramètre la base de données pour vous, veuillez choisir « Automatique » (option recommandée).
 .
 Si vous souhaitez configurer la base de données vous-même, veuillez choisir « Manuelle ». Dans ce cas vous devrez créer l'utilisateur et la base de données de diogenes et vous occuper des mises à jour de la base de données vous-même.
";
$elem["diogenes/databasemgr_type"]["default"]="Automatic";
$elem["diogenes/dbadmpass"]["type"]="password";
$elem["diogenes/dbadmpass"]["description"]="Database admin password:
 Enter the password for your database admin user to access the database.
 This password had been set when installing your database.  It is most
 likely NOT the same password that your Diogenes manager account will use.
";
$elem["diogenes/dbadmpass"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Geben Sie das Passwort des Datenbank-Administrators für den Zugriff auf die Datenbank ein. Dieses Passwort wurde bei der Installation der Datenbank vergeben.  Es ist höchstwahrscheinlich NICHT das selbe Passwort wie das des Diogenes Manager Zugangs.
";
$elem["diogenes/dbadmpass"]["descriptionfr"]="Mot de passe de l'administrateur du serveur de bases de données :
 Veuillez indiquer le mot de passe de l'administrateur de votre serveur de bases de données. Ce mot de passe a été établi lors de l'installation de votre serveur de bases de données. Il y a de fortes chances qu'il ne soit PAS le même que celui utilisé pour le compte du gestionnaire de diogenes.
";
$elem["diogenes/dbadmpass"]["default"]="";
$elem["diogenes/databasemgr_server"]["type"]="string";
$elem["diogenes/databasemgr_server"]["description"]="Hostname of the database server:
 If your database is on another machine besides the one that Diogenes is
 running on then you need to change this value to the fully qualified
 domain name for that system.
";
$elem["diogenes/databasemgr_server"]["descriptionde"]="Rechnername des Datenbank-Servers:
 Wenn Ihre Datenbank auf einem anderen Rechner installiert ist, als der, auf dem Diogenes läuft, dann sollten Sie hier den vollständigen Rechnernamen (FQDN) dieses Systems eingeben.
";
$elem["diogenes/databasemgr_server"]["descriptionfr"]="Nom d'hôte du serveur de bases de données :
 Si votre serveur de bases de données est sur une machine autre que celle où fonctionne diogenes, vous devez modifier cette valeur et indiquer le nom de domaine complètement qualifié de ce système.
";
$elem["diogenes/databasemgr_server"]["default"]="localhost";
$elem["diogenes/database_name"]["type"]="string";
$elem["diogenes/database_name"]["description"]="Name for the Diogenes database:
 By default this will be \"diogenes\".  This is where all the Diogenes related
 database items will be setup and stored.
";
$elem["diogenes/database_name"]["descriptionde"]="Name der Datenbank für Diogenes:
 Standard ist \"diogenes\".  Dort werden alle Datenbankeinträge gespeichert, die Diogenes betreffen.
";
$elem["diogenes/database_name"]["descriptionfr"]="Nom de la base de données de diogenes :
 Par défaut, il s'agit de « diogenes ». C'est l'endroit où tous les objets de base de données liés à diogenes sont paramétrés et conservés.
";
$elem["diogenes/database_name"]["default"]="diogenes";
$elem["diogenes/database_user"]["type"]="string";
$elem["diogenes/database_user"]["description"]="Database username:
 What username will access the database for Diogenes?  By default this is
 it's own user \"diogenes\" so that permissions can be tightened down.
";
$elem["diogenes/database_user"]["descriptionde"]="Datenbank-Benutzername:
 Mit welchem Benutzernamen wird Diogenes auf die Datenbank zugreifen? Standardmäßig hat es seinen eigenen Benutzer \"diogenes\", damit die Zugriffsrechte eingeschränkt werden können.
";
$elem["diogenes/database_user"]["descriptionfr"]="Propriétaire de la base de données :
 Veuillez indiquer l'identifiant qu'utilisera diogenes pour accéder à la base de données pour diogenes. Par défaut, il s'agit de l'utilisateur « diogenes » lui-même, ce qui permet de restreindre les permissions.
";
$elem["diogenes/database_user"]["default"]="diogenes";
$elem["diogenes/database_pass"]["type"]="password";
$elem["diogenes/database_pass"]["description"]="Password for the Diogenes user:
 Enter a password for the database user which will be used along with
 the database user name you have already supplied to connect to the
 database.
 .
 If you wish to leave the password empty, type \"none\".  If you wish to use
 an automatically generated random password type \"auto\".
";
$elem["diogenes/database_pass"]["descriptionde"]="Passwort für den Benutzer:
 Vergeben Sie ein Passwort für den Datenbank-Benutzer, das zusammen mit dem Benutzernamen, den Sie gerade eingegeben haben, verwendet wird, um sich mit der Datenbank zu verbinden.
 .
 Wenn Sie dieses Passwort leer lassen wollen, geben Sie \"none\" ein.  Wenn Sie ein automatisch erzeugtes, zufälliges Passwort wünschen, geben Sie \"auto\" ein.
";
$elem["diogenes/database_pass"]["descriptionfr"]="Mot de passe du propriétaire de la base de données :
 Veuillez indiquer un mot de passe pour le propriétaire de la base de données.Il s'agit du mot de passe qui sera utilisé avec l'identifiant du propriétaire pour se connecter à la base de données.
 .
 Si vous souhaitez ne pas utiliser de mot de passe, veuillez indiquer « none », aucun. Si vous souhaitez utiliser un mot de passe généré de manière aléatoire, veuillez indiquer « auto ».
";
$elem["diogenes/database_pass"]["default"]="auto";
$elem["diogenes/dbmyadmin"]["type"]="string";
$elem["diogenes/dbmyadmin"]["description"]="MySQL administrator username:
";
$elem["diogenes/dbmyadmin"]["descriptionde"]="Benutzername des MySQL-Administrators:
";
$elem["diogenes/dbmyadmin"]["descriptionfr"]="Nom de l'administrateur de MySQL :
";
$elem["diogenes/dbmyadmin"]["default"]="root";
PKG_OptionPageTail2($elem);
?>
