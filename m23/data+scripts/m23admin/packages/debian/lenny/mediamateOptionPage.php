<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mediamate");

$elem["mediamate/webserver_type"]["type"]="select";
$elem["mediamate/webserver_type"]["choices"][1]="Apache";
$elem["mediamate/webserver_type"]["choices"][2]="Apache-SSL";
$elem["mediamate/webserver_type"]["choices"][3]="Both";
$elem["mediamate/webserver_type"]["choices"][4]="Apache2";
$elem["mediamate/webserver_type"]["choicesde"][1]="Apache";
$elem["mediamate/webserver_type"]["choicesde"][2]="Apache-SSL";
$elem["mediamate/webserver_type"]["choicesde"][3]="Beides";
$elem["mediamate/webserver_type"]["choicesde"][4]="Apache2";
$elem["mediamate/webserver_type"]["choicesfr"][1]="Apache";
$elem["mediamate/webserver_type"]["choicesfr"][2]="Apache-SSL";
$elem["mediamate/webserver_type"]["choicesfr"][3]="Les deux";
$elem["mediamate/webserver_type"]["choicesfr"][4]="Apache2";
$elem["mediamate/webserver_type"]["description"]="What type of Web Server are you running?
 By default Media Mate supports any web server that PHP4 does.  This
 configuration process currently only supports Apache, Apache-SSL, and
 Apache2 directly.  If you use another type you will have to handle
 the configuration of the web server manually.  If you chose one of
 the first four options, this install process will manage the
 configuration (or attempt to) of the Apache specific portions
 necessary to run Media Mate properly.  If you do not wish this to
 happen, please chose the Other option.
";
$elem["mediamate/webserver_type"]["descriptionde"]="Welche Art Webserver betreiben Sie?
 Standardmäßig unterstützt Media Mate jeden von PHP4 unterstützen Webserver. Dieser Konfigurationsvorgang unterstützt im Moment nur Apache, Apache-SSL und Apache2 direkt. Sollten Sie einen anderen Webserver verwenden, müssen Sie die Konfiguration des Webservers manuell durchführen. Falls Sie eine der ersten vier Optionen ausgewählt haben, wird der Installationsprozess die für Apache nötigen Optionen zum Einsatz von Media Mate vornehmen (bzw. es versuchen). Falls Sie nicht möchten, dass dies geschieht, wählen Sie die »Andere«-Option.
";
$elem["mediamate/webserver_type"]["descriptionfr"]="Type de serveur web :
 Par défaut, Media Mate gère tous les serveurs web qui gèrent PHP4. Actuellement le processus de configuration permet seulement la gestion des serveurs Apache, Apache-SSL et Apache2. Si vous utilisez un autre serveur web, vous devrez le configurer vous-même. Si vous choisissez l'une des trois premières options, la procédure d'installation effectuera la configuration d'Apache automatiquement. Si vous ne le souhaitez pas, choisissez « Autre » et configurez votre serveur web vous-même.
";
$elem["mediamate/webserver_type"]["default"]="Apache2";
$elem["mediamate/mysql/configure"]["type"]="boolean";
$elem["mediamate/mysql/configure"]["description"]="Configure MySQL?
 Please choose whether the mediamate package configuration scripts
 should attempt to configure MySQL automatically.  If you refuse
 this option, you should read the instructions in the README file.
";
$elem["mediamate/mysql/configure"]["descriptionde"]="Konfiguriere MySQL?
 Bitte wählen Sie, ob das Konfigurationsskript des mediamate-Pakets versuchen soll, die Konfiguration von MySQL automatisch durchzuführen. Falls Sie diese Option ablehnen, sollten Sie die Anweisungen in der README-Datei lesen.
";
$elem["mediamate/mysql/configure"]["descriptionfr"]="Faut-il configurer MySQL ?
 Vous pouvez laisser Media Mate configurer automatiquement MySQL. Dans le cas contraire, veuillez consulter les informations du fichier README.
";
$elem["mediamate/mysql/configure"]["default"]="true";
$elem["mediamate/mysql/dbserver"]["type"]="string";
$elem["mediamate/mysql/dbserver"]["description"]="MySQL Host:
 Please enter the name or IP address of the MySQL database host that
 will store the Media Mate database.
";
$elem["mediamate/mysql/dbserver"]["descriptionde"]="MySQL-Rechner:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse des MySQL-Datenbank-Rechners ein, auf welchem die Media Mate-Datenbank hinterlegt wird.
";
$elem["mediamate/mysql/dbserver"]["descriptionfr"]="Serveur MySQL :
 Veuillez indiquer le nom ou l'adresse IP du serveur de bases de données MySQL qui hébergera la base de données de Media Mate.
";
$elem["mediamate/mysql/dbserver"]["default"]="localhost";
$elem["mediamate/mysql/dbadmin"]["type"]="string";
$elem["mediamate/mysql/dbadmin"]["description"]="Database administrator user:
 Please enter the name of a database user who is allowed to create new
 databases.
";
$elem["mediamate/mysql/dbadmin"]["descriptionde"]="Datenbank-Administrator-Benutzer:
 Bitte geben Sie den Datenbank-Benutzer an, welcher berechtigt ist, neue Datenbanken anzulegen.
";
$elem["mediamate/mysql/dbadmin"]["descriptionfr"]="Administrateur du serveur de bases de données :
 Veuillez indiquer le nom d'un utilisateur autorisé à créer des bases de données sur le serveur.
";
$elem["mediamate/mysql/dbadmin"]["default"]="root";
$elem["mediamate/purge"]["type"]="boolean";
$elem["mediamate/purge"]["description"]="Delete database and cover art files on purge?
 Please choose whether the database and all cover art files should be
 removed when the Media Mate package is purged.
";
$elem["mediamate/purge"]["descriptionde"]="Lösche Datenbank und »Cover Art«-Dateien bei vollständiger Entfernung (purge)?
 Bitte wählen Sie, ob die Datenbank und alle »Cover Art«-Dateien entfernt werden sollen, wenn das Media Mate-Paket vollständig entfernt (purged) wird.
";
$elem["mediamate/purge"]["descriptionfr"]="Faut-il effacer la base de données et les affiches lors de la purge ?
 La base de données et les images de pochettes peuvent être effacées lorsque Media Mate sera supprimé entièrement du système.
";
$elem["mediamate/purge"]["default"]="true";
$elem["mediamate/mysql/dbname"]["type"]="string";
$elem["mediamate/mysql/dbname"]["description"]="Media Mate database name:
 Please enter the name for the database used by Media Mate.
";
$elem["mediamate/mysql/dbname"]["descriptionde"]="Media Mate Datenbank-Name:
 Bitte geben Sie den Namen der Datenbank an, welche für Media Mate verwendet werden soll.
";
$elem["mediamate/mysql/dbname"]["descriptionfr"]="Nom de la base de données de Media Mate :
 Veuillez indiquer le nom de la base de données utilisée par Media Mate.
";
$elem["mediamate/mysql/dbname"]["default"]="mediamate";
$elem["mediamate/mysql/dbuser"]["type"]="string";
$elem["mediamate/mysql/dbuser"]["description"]="Media Mate database owner:
 Please enter the username of the Media Mate database owner.
";
$elem["mediamate/mysql/dbuser"]["descriptionde"]="Media Mate Datenbank-Besitzer:
 Bitte geben Sie den Namen des Media Mate-Datenbankbesitzers an.
";
$elem["mediamate/mysql/dbuser"]["descriptionfr"]="Identifiant du propriétaire de la base de données :
 Veuillez indiquer l'identifiant du propriétaire de la base de données de Media Mate.
";
$elem["mediamate/mysql/dbuser"]["default"]="mediamate";
$elem["mediamate/mysql/dbpass"]["type"]="password";
$elem["mediamate/mysql/dbpass"]["description"]="Media Mate database owner password:
 Please enter the password for the Media Mate database owner.
";
$elem["mediamate/mysql/dbpass"]["descriptionde"]="Media Mate-Datenbankbesitzer-Passwort:
 Bitte geben Sie das Passwort für den Media Mate-Datenbankbesitzer ein.
";
$elem["mediamate/mysql/dbpass"]["descriptionfr"]="Mot de passe du propriétaire de la base de données :
 Veuillez indiquer le mot de passe du propriétaire de la base de données de Media Mate.
";
$elem["mediamate/mysql/dbpass"]["default"]="";
$elem["mediamate/mysql/dbadmpass"]["type"]="password";
$elem["mediamate/mysql/dbadmpass"]["description"]="Database administrator password:
 Please enter the password for the database administrator.
";
$elem["mediamate/mysql/dbadmpass"]["descriptionde"]="Datenbank-Hauptbenutzer-Passwort:
 Bitte geben Sie das Passwort für den Datenbank-Hauptbesitzer ein.
";
$elem["mediamate/mysql/dbadmpass"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez indiquer le mot de passe de l'administrateur du gestionnaire de bases de données.
";
$elem["mediamate/mysql/dbadmpass"]["default"]="";
$elem["mediamate/moviemate-upgrade"]["type"]="boolean";
$elem["mediamate/moviemate-upgrade"]["description"]="Upgrade old Movie Mate to Media Mate?
 There appears to be an old Movie Mate configuration.  Please choose
 whether you like to upgrade it to Media Mate.
";
$elem["mediamate/moviemate-upgrade"]["descriptionde"]="Upgrade vom alten Movie Mate zu Media Mate durchführen?
 Es scheint eine alte Movie Mate-Konfiguration zu bestehen. Bitte wählen Sie, ob Sie ein Upgrade auf Media Mate durchführen wollen.
";
$elem["mediamate/moviemate-upgrade"]["descriptionfr"]="Souhaitez-vous mettre à jour votre configuration pour Media Mate ?
 Il semble que vous ayez un ancien fichier de configuration pour Movie Mate. Vous pouvez mettre à jour ce fichier de configuration pour Media Mate.
";
$elem["mediamate/moviemate-upgrade"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
