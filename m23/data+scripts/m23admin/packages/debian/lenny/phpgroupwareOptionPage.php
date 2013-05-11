<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpgroupware");

$elem["phpgroupware/configuration/note"]["type"]="note";
$elem["phpgroupware/configuration/note"]["description"]="Package configuration note
 phpGroupWare needs additional configuration via its web interface. After
 the installation has finished, you should point your browser to the
 phpGroupWare setup, for example:
 .
 http://${site}/phpgroupware/setup
 .
 to continue the configuration, fill the database and let phpGroupWare be
 aware of the installed modules.
";
$elem["phpgroupware/configuration/note"]["descriptionde"]="Anmerkung zur Konfiguration
 phpGroupWare muss auch noch über seine Weboberfläche eingerichtet werden. Nachdem die Installation beendet ist, sollten Sie phpGroupWare mit Ihrem Browser nach folgendem Beispiel aufrufen:
 .
 http://${site}/phpgroupware/setup
 .
 um die Einrichtung fortzusetzen, die Datenbank zu initialisieren und damit phpGroupWare die installierten Module einliest.
";
$elem["phpgroupware/configuration/note"]["descriptionfr"]="Note sur la configuration du paquet
 La configuration de phpGroupWare doit être terminée via son interface web. Après l'installation, veuillez vous connecter à la page de réglage de phpGroupWare qui se trouve le plus souvent à l'adresse :
 .
 http://${site}/phpgroupware/setup
 .
 Pour continuer la configuration, remplissez la base de données, et laissez phpGroupWare détecter les modules installés.
";
$elem["phpgroupware/configuration/note"]["default"]="";
$elem["phpgroupware/header/password"]["type"]="password";
$elem["phpgroupware/header/password"]["description"]="Please enter the desired phpGroupWare 'Header Admin' password:
 'Header Admin' is the section in which the phpGroupWare administrator can
 define the information which will let the application to 'start' (i.e.
 database settings, directories location etc.) Note that the Header
 Administration page contains the phpGroupWare database access password
 (but not the administrator password).
";
$elem["phpgroupware/header/password"]["descriptionde"]="Bitte gewünschtes Passwort für den phpGroupWare-»Header Admin« eingeben:
 Im »Header Admin« kann der phpGroupWare-Administrator Informationen hinterlegen, die zum Starten des Programms benötigt werden (z.B. Datenbankeinstellungen, Verzeichnisse etc.). Beachten Sie, dass die Header-Administrator-Seite das Passwort für den Zugang zur phpGroupWare-Datenbank enthält (aber nicht das Administrator-Passwort).
";
$elem["phpgroupware/header/password"]["descriptionfr"]="Mot de passe de la page d'administration principale :
 La page d'administration principale (« header admin ») permet à l'administrateur de phpGroupWare de définir les informations qui permettent le fonctionnement de l'application (paramètres de connexion à la base de données, emplacements des fichiers, etc.). Notez que cette page contient le mot de passe permettant d'accéder à la base de données utilisée par phpGroupWare (mais pas le mot de passe d'administration du système de gestion de bases de données).
";
$elem["phpgroupware/header/password"]["default"]="";
$elem["phpgroupware/header/password/confirm"]["type"]="password";
$elem["phpgroupware/header/password/confirm"]["description"]="Confirm the 'Header Admin' password:
  Please retype the phpGroupWare 'Header Admin' password.
";
$elem["phpgroupware/header/password/confirm"]["descriptionde"]="Passwort für den »Header Admin« bestätigen:
  Bitte das Passwort für den phpGroupWare »Header Admin« erneut eingeben.
";
$elem["phpgroupware/header/password/confirm"]["descriptionfr"]="Confirmation du mot de passe de la page d'administration principale :
 Veuillez indiquer à nouveau le mot de passe pour la page d'administration principale.
";
$elem["phpgroupware/header/password/confirm"]["default"]="";
$elem["phpgroupware/header/password/mismatch"]["type"]="text";
$elem["phpgroupware/header/password/mismatch"]["description"]="Password mismatch.
 The 'Header Admin' passwords you entered didn't match. Please try again.
";
$elem["phpgroupware/header/password/mismatch"]["descriptionde"]="Keine Übereinstimmung der Passwörter.
 Die eingegebenen Passwörter für »Header Admin« stimmen nicht überein. Bitte versuchen Sie es noch einmal.
";
$elem["phpgroupware/header/password/mismatch"]["descriptionfr"]="Les mots de passe ne correspondent pas
 Les mots de passe indiqués ne correspondent pas
";
$elem["phpgroupware/header/password/mismatch"]["default"]="";
$elem["phpgroupware/configuration/password"]["type"]="password";
$elem["phpgroupware/configuration/password"]["description"]="Please enter the phpGroupWare 'Setup/Config Admin' password:
 The 'Setup/Config Admin' is the section in which the phpGroupWare
 administrator access the following facilities:
 .
  (1) Simple Application Management
  (2) Configuration (general)
  (3) Language Management
  (4) Advanced Application Management
";
$elem["phpgroupware/configuration/password"]["descriptionde"]="Passwort für den phpGroupWare »Setup/Config Admin« eingeben:
 Im »Setup/Config Admin« hat der phpGroupWare-Administrator Zugriff auf folgende Funktionen:
 .
  (1) Einfaches Applikations-Management
  (2) Einstellungen (allgemein)
  (3) Sprachverwaltung
  (4) Erweitertes Applikations-Management
";
$elem["phpgroupware/configuration/password"]["descriptionfr"]="Mot de passe pour la page de configuration :
 La page de configuration et de réglage (« setup/config admin ») permet à l'administrateur de phpGroupWare d'effectuer les actions suivantes :
 .
  - Gestion simple des applications ;
  - Réglages généraux ;
  - Choix de la langue ;
  - Gestion avancée des applications.
";
$elem["phpgroupware/configuration/password"]["default"]="";
$elem["phpgroupware/configuration/password/confirm"]["type"]="password";
$elem["phpgroupware/configuration/password/confirm"]["description"]="Please retype the phpGroupWare 'Setup/Config Admin' password:
 Please enter the 'Setup/Config Admin' password again. If the password you
 are going to retype mismatch the previous entered one, I'll ask you to
 enter them again.
";
$elem["phpgroupware/configuration/password/confirm"]["descriptionde"]="Bitte Passwort für phpGroupWare-»Konfigurations-Manager« erneut eingeben:
 Bitte geben Sie das Passwort für den »Setup/Config Admin« erneut ein. Falls die wiederholte Eingabe des Passwortes nicht mit der vorherigen übereinstimmt, werden Sie nochmals gefragt.
";
$elem["phpgroupware/configuration/password/confirm"]["descriptionfr"]="Confirmation du mot de passe pour la page de configuration :
 Veuillez indiquer à nouveau le mot de passe pour la page de configuration. Si les deux mots de passe indiqués ne correspondent pas, vous devrez les saisir à nouveau.
";
$elem["phpgroupware/configuration/password/confirm"]["default"]="";
$elem["phpgroupware/configuration/password/mismatch"]["type"]="text";
$elem["phpgroupware/configuration/password/mismatch"]["description"]="Password mismatch.
 The configuration passwords you entered didn't match. Please try again.
";
$elem["phpgroupware/configuration/password/mismatch"]["descriptionde"]="Keine Übereinstimmung der Passwörter.
 Die eingegebenen Passworte stimmen nicht überein. Bitte erneut versuchen.
";
$elem["phpgroupware/configuration/password/mismatch"]["descriptionfr"]="Les mots de passe ne correspondent pas
 Les mots de passe indiqués ne correspondent pas. Veuillez essayer à nouveau.
";
$elem["phpgroupware/configuration/password/mismatch"]["default"]="";
$elem["phpgroupware/webserver"]["type"]="multiselect";
$elem["phpgroupware/webserver"]["choices"][1]="apache";
$elem["phpgroupware/webserver"]["choices"][2]="apache-ssl";
$elem["phpgroupware/webserver"]["choices"][3]="apache-perl";
$elem["phpgroupware/webserver"]["description"]="Which web server would you like to reconfigure automatically?
 phpGroupWare supports any web server that PHP does, but this automatic
 configuration process only supports Apache.
";
$elem["phpgroupware/webserver"]["descriptionde"]="Welchen Web-Server möchten Sie automatisch einrichten?
 phpGroupWare unterstützt jeden Web-Server, den auch PHP unterstützt, aber nur Apache kann automatisch eingerichtet werden.
";
$elem["phpgroupware/webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 phpGroupWare gère tous les serveurs web supportés par PHP, mais cette procédure automatique de configuration ne prend en charge qu'Apache.
";
$elem["phpgroupware/webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["phpgroupware/db/host"]["type"]="string";
$elem["phpgroupware/db/host"]["description"]="Please enter phpGroupWare database host name:
 This should be the host-name or IP address that phpGroupWare will use to
 access the database.
";
$elem["phpgroupware/db/host"]["descriptionde"]="Rechnernamen der phpGroupWare-Datenbank eingeben:
 Geben Sie bitte den Rechnernamen oder die IP-Adresse an, die phpGroupWare benutzen soll, um auf die Datenbank zuzugreifen.
";
$elem["phpgroupware/db/host"]["descriptionfr"]="Nom de l'hôte hébergeant la base de données de phpGroupWare :
 Veuillez indiquer le nom ou l'adresse IP de l'ordinateur qui héberge la base de données.
";
$elem["phpgroupware/db/host"]["default"]="localhost";
$elem["phpgroupware/db/type"]["type"]="select";
$elem["phpgroupware/db/type"]["choices"][1]="MySQL";
$elem["phpgroupware/db/type"]["choices"][2]="PostgreSQL";
$elem["phpgroupware/db/type"]["choicesde"][1]="MySQL";
$elem["phpgroupware/db/type"]["choicesde"][2]="PostgreSQL";
$elem["phpgroupware/db/type"]["choicesfr"][1]="MySQL";
$elem["phpgroupware/db/type"]["choicesfr"][2]="PostgreSQL";
$elem["phpgroupware/db/type"]["description"]="What database type will phpGroupWare use
 This is the type of database the server will use.
 .
 NOTE: Debian only supports PostgreSQL and MySQL as these seem to be the
 only non-proprietary database types properly supported upstream.
";
$elem["phpgroupware/db/type"]["descriptionde"]="Welchen Datenbanktyp wird phpGroupWare verwenden
 Dies ist der Typ von Datenbank, den der Server verwenden wird.
 .
 BEMERKUNG: Debian verwendet nur PostgreSQL und MySQL, weil das wohl die einzigen nicht-proprietären Datenbanken sind, die vom Programmautor gut unterstützt werden.
";
$elem["phpgroupware/db/type"]["descriptionfr"]="Le type de base de données utilisé par PhpGroupWare
 C'est le type de la base de données qui sera utilisée par PhpGroupWare.
 .
 NOTE : Debian ne gère que PostgreSQL et MySQL, puisque ce sont les seuls système de gestion de bases de données libres qui soient convenablement supportés par les développeurs amonts.
";
$elem["phpgroupware/db/type"]["default"]="MySQL";
$elem["phpgroupware/db/name"]["type"]="string";
$elem["phpgroupware/db/name"]["description"]="Please enter phpGroupWare database name:
 This is the name of the database that phpGroupWare will use.
";
$elem["phpgroupware/db/name"]["descriptionde"]="Name der phpGroupWare-Datenbank eingeben:
 Der Name der Datenbank für phpGroupWare auf dem Datenbankserver.
";
$elem["phpgroupware/db/name"]["descriptionfr"]="Nom de la base de données :
 Veuillez choisir le nom de la base de données de PhpGroupWare.
";
$elem["phpgroupware/db/name"]["default"]="phpgroupware";
$elem["phpgroupware/db/user/name"]["type"]="string";
$elem["phpgroupware/db/user/name"]["description"]="Please enter the database user name to access the database:
 This is the user name that phpGroupWare will use to access the database.
";
$elem["phpgroupware/db/user/name"]["descriptionde"]="Name des Benutzers für den Datenbankzugriff eingeben:
 Diesen Benutzernamen verwendet phpGroupWare für den Zugang zur Datenbank.
";
$elem["phpgroupware/db/user/name"]["descriptionfr"]="Identifiant de connexion à cette base :
 Veuillez indiquer l'identifiant qu'utilisera phpGroupWare pour se connecter à la base.
";
$elem["phpgroupware/db/user/name"]["default"]="phpgroupware";
$elem["phpgroupware/db/user/password"]["type"]="password";
$elem["phpgroupware/db/user/password"]["description"]="Please enter the password to access the database:
 This is the password that phpGroupWare will use, along with user name you
 provided, to access the database.
";
$elem["phpgroupware/db/user/password"]["descriptionde"]="Passwort für den Zugang zur Datenbank eingeben:
 Dieses Passwort verwendet phpGroupWare zusammen mit dem Benutzernamen für den Zugang zur Datenbank.
";
$elem["phpgroupware/db/user/password"]["descriptionfr"]="Mot de passe de connexion à la base de données :
 Veuillez indiquer le mot de passe de connexion qui sera utilisé par phpGroupWare, en plus de l'identifiant de connexion, pour s'authentifier lors de ses accès à la base de données.
";
$elem["phpgroupware/db/user/password"]["default"]="";
$elem["phpgroupware/db/user/password/confirm"]["type"]="password";
$elem["phpgroupware/db/user/password/confirm"]["description"]="Please retype the password to access the database:
 Please enter the database access password again. If the password you are
 going to retype mismatch the previous entered one, I'll ask you to enter
 them again.
";
$elem["phpgroupware/db/user/password/confirm"]["descriptionde"]="Passwort für den Zugang zur Datenbank erneut eingeben:
 Bitte geben Sie das Passwort für den Zugang zur Datenbank erneut ein. Falls die wiederholte Eingabe des Passwortes nicht mit der vorherigen übereinstimmt, werden Sie nochmals gefragt.
";
$elem["phpgroupware/db/user/password/confirm"]["descriptionfr"]="Confirmation du mot de passe de connexion :
 Veuillez confirmer le mot de passe. Si les mots de passe saisis ne correspondent pas, vous devrez les indiquer à nouveau.
";
$elem["phpgroupware/db/user/password/confirm"]["default"]="";
$elem["phpgroupware/db/user/password/mismatch"]["type"]="text";
$elem["phpgroupware/db/user/password/mismatch"]["description"]="Passwords mismatch.
 The database access passwords you entered mismatch. Please try again.
";
$elem["phpgroupware/db/user/password/mismatch"]["descriptionde"]="Keine Übereinstimmung der Passwörter.
 Die eingegebenen Passwörter für den Datenbankzugriff stimmen nicht überein. Bitte erneut versuchen.
";
$elem["phpgroupware/db/user/password/mismatch"]["descriptionfr"]="Les mots de passe ne correspondent pas
 Les mots de passe de connexion indiqués ne correspondent pas. Veuillez les indiquer à nouveau.
";
$elem["phpgroupware/db/user/password/mismatch"]["default"]="";
$elem["phpgroupware/db/admin/name"]["type"]="string";
$elem["phpgroupware/db/admin/name"]["description"]="Please enter the database administrator user name:
 This user name will be used to access the database to create (if needed):
 .
  (1) The database
  (2) The new database account that phpGroupWare will use to access the
 database
 .
 It should be 'postgres' for PostgreSQL or 'root' for MySQL.
";
$elem["phpgroupware/db/admin/name"]["descriptionde"]="Benutzernamen des Datenbank-Administrators eingeben:
 Dieser Benutzername wird verwandt, um Folgendes anzulegen (falls nötig):
 .
  (1) Die Datenbank
  (2) Den neuen Datenbank-Zugang, den phpGroupWare verwenden wird, um
 mit der Datenbank arbeiten zu können.
 .
 Es sollte »postgres« für PostgreSQL bzw. »root« für MySQL sein.
";
$elem["phpgroupware/db/admin/name"]["descriptionfr"]="Identifiant de l'administrateur de la base de données :
 Veuillez indiquer l'identifiant de l'administrateur du système de gestion de bases de données. Il servira à créer, si nécessaire :
 .
  - la base de données,
  - les nouveaux comptes que phpGroupWare utilisera pour accéder à
    la base de données ;
 .
 Cela devrait être « postgres » pour PostgreSQL, ou « root » pour MySQL.
";
$elem["phpgroupware/db/admin/name"]["default"]="";
$elem["phpgroupware/db/admin/password"]["type"]="password";
$elem["phpgroupware/db/admin/password"]["description"]="Please enter the database administrator password (if any):
 This is the password that will be used along with the database
 administrator user name.
 .
 NOTE: This password will not be asked twice, since it's not a new
 password.
";
$elem["phpgroupware/db/admin/password"]["descriptionde"]="Passwort des Datenbank-Administrators eingeben (sofern vorhanden):
 Dieses Passwort wird zusammen mit dem Benutzernamen des Datenbank-Administrators verwandt.
 .
 BEMERKUNG: Das Passwort wird nicht zweimal abgefragt, weil es kein neues Passwort ist.
";
$elem["phpgroupware/db/admin/password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Le mot de passe d'administration du système de gestion de bases de données est utilisé conjointement avec l'identifiant de l'administrateur.
 .
 Note : Ce mot de passe ne sera pas demandé deux fois, car ce n'est pas un nouveau mot de passe.
";
$elem["phpgroupware/db/admin/password"]["default"]="";
$elem["phpgroupware/db/setup/skip"]["type"]="boolean";
$elem["phpgroupware/db/setup/skip"]["description"]="for internal use
 Defines if database setup will be skipped.

";
$elem["phpgroupware/db/setup/skip"]["descriptionde"]="";
$elem["phpgroupware/db/setup/skip"]["descriptionfr"]="";
$elem["phpgroupware/db/setup/skip"]["default"]="false";
$elem["phpgroupware/db/setup/abort"]["type"]="note";
$elem["phpgroupware/db/setup/abort"]["description"]="Abort database setup
 The database type you selected is not supported; you should manually
 create and drop the database and the account that phpGroupWare needs. In
 any case I'll setup the configuration file
 (/etc/phpgroupware/header.inc.php).
";
$elem["phpgroupware/db/setup/abort"]["descriptionde"]="Abbruch der Datenbank-Einrichtung
 Der ausgewählte Datenbank-Typ wird nicht unterstützt; Sie sollten die Datenbank und den Zugang für phpGroupWare manuell anlegen und verwalten. Die Konfigurationsdatei (/etc/phpgroupware/header.inc.php) wird auf jeden Fall angelegt.
";
$elem["phpgroupware/db/setup/abort"]["descriptionfr"]="Abandon de la configuration de la base de données
 Le système de gestion de bases de données que vous avez choisi n'est pas géré ; vous devrez créer et supprimer les bases de données vous-même, ainsi que les identifiants que phpGroupWare utilise. Cependant, le fichier de configuration principal (« /etc/phpgroupware/header.inc.php ») sera toujours créé.
";
$elem["phpgroupware/db/setup/abort"]["default"]="";
$elem["phpgroupware/configuration/overwrite"]["type"]="boolean";
$elem["phpgroupware/configuration/overwrite"]["description"]="Overwrite 'Header Admin' configuration?
 With the informations provided, the 'Header Admin' file
 (/etc/phpgroupware/header.inc.php) can be setup. This may not be the
 most tuned setup, but phpGroupWare will work with the average
 system. If overwriting is selected, this file will *ALWAYS* be
 overwritten on any upgrade of this package. A safe option is to
 choose overwriting by now, and disable this option later with the
 dpkg-reconfigure(1) command.
";
$elem["phpgroupware/configuration/overwrite"]["descriptionde"]="Überschreiben der »Header Admin«-Konfiguration?
 Mit der angegebenen Informationen kann die Datei »Header Admin« (/etc/phpgroupware/header.inc.php) eingerichtet werden. Die Einstellungen könnten nicht optimal sein, aber phpGroupWare wird im Normalfall funktionieren. Wird Überschreiben ausgewählt, dann wird diese Datei bei *JEDEM* Upgrade dieses Pakets überschrieben. Sie können dem Überschreiben ruhig zustimmen und die Einstellung später mit dem Befehl dpkg-reconfigure(1) deaktivieren.
";
$elem["phpgroupware/configuration/overwrite"]["descriptionfr"]="Faut-il écraser la section de configuration principale ?
 Grâce aux informations fournies, le fichier de configuration principal (« /etc/phpgroupware/header.inc.php ») peut être généré. La configuration générée n'est certainement pas la plus précise, mais elle permettra à phpGroupWare de fonctionner sur la plupart des systèmes. Si écraser est choisi, ce fichier sera *TOUJOURS* écrasé à chaque mise à jour du paquet. Il est tout à fait envisageable d'accepter l'écrasement maintenant, et de désactiver cette option par la suite avec la commande dpkg-reconfigure(1).
";
$elem["phpgroupware/configuration/overwrite"]["default"]="false";
$elem["phpgroupware/postrm"]["type"]="boolean";
$elem["phpgroupware/postrm"]["description"]="Delete phpGroupWare data on purge?
 Defines if all phpGroupWare data should be erased when the package is
 purged, including the database (i.e. all data entered by the users)
 and the phpGroupWare database account. (Note: if deletion is chosen,
 upon purging the package, the database administrator password will be
 prompted for.)
";
$elem["phpgroupware/postrm"]["descriptionde"]="Daten von phpGroupWare beim vollständigen Entfernen des Pakets löschen?
 Legt fest, ob alle Daten von phpGroupWare, einschließlich der Datenbank (d.h. aller von den Benutzer eingegebenen Daten) und des Datenbankkontos von phpGroupWare, gelöscht werden sollen, wenn das Paket vollständig entfernt wird. (Hinweis: Falls das Löschen ausgewählt wird, werden Sie beim endgültigen Entfernen des Pakets nach dem Datenbank-Administratorpasswort gefragt.)
";
$elem["phpgroupware/postrm"]["descriptionfr"]="Faut-il effacer les bases de données lors de la purge du paquet ?
 Définit si toutes les données relatives à phpGroupWare doivent être éffacées lors de la purge du paquet, y compris la base de données (i.e. toutes les informations saisies par les utilisateurs) et le compte utilisés par phpGroupWare pour se connecter à la base de données. (Note : si l'effaçage est choisi, le mot de passe d'administration du système de gestion de bases de données sera demandé lors du nettoyage de ce paquet.)
";
$elem["phpgroupware/postrm"]["default"]="true";
$elem["phpgroupware/debug"]["type"]="text";
$elem["phpgroupware/debug"]["description"]="DEBUG.
 ${debug}
";
$elem["phpgroupware/debug"]["descriptionde"]="DEBUG.
 ${debug}
";
$elem["phpgroupware/debug"]["descriptionfr"]="DEBUG
 ${debug}
";
$elem["phpgroupware/debug"]["default"]="";
$elem["phpgroupware/configuration/nooverwritenote"]["type"]="note";
$elem["phpgroupware/configuration/nooverwritenote"]["description"]="Not resetting the 'header.inc.php' file
 The handling of the 'header.inc.php' configuration has changed.
 .
 The Debian package scripts cannot guess if the previous settings in
 your file should be overwritten (with the Debian defaults and the new
 configuration values entered in the previous configuration dialogs).
 .
 You may ignore this warning if you are upgrading from a previous
 package, or if you have modified the header.inc.php settings with
 the phpGroupware 'Header Admin' setup dialogs.
 .
 See instructions in README.Debian (found in
 /usr/share/doc/phpgroupware-0.9.16-core-base/) to switch to a
 /etc/phpgroupware/header.inc.php file automatically updated by the
 package (re-)configuration.
";
$elem["phpgroupware/configuration/nooverwritenote"]["descriptionde"]="Setzte Datei »header.inc.php« nicht zurück
 Der Umgang mit der »header.inc.php« hat sich geändert.
 .
 Die Debian-Paketskripte können nicht erraten, ob die bisherigen Einstellungen in Iher Datei überschrieben werden sollten (bei den Debian-Standardeinstellungen und den neuen Konfigurationswerten, die in den vorherigen Konfigurationsdialogen eingegeben wurden).
 .
 Sie können diese Warnung ignorieren, falls Sie ein Upgrade von einem vorhergehenden Paket durchführen oder falls Sie die Einstellungen in header.inc.php mit den phpGroupware-»Header Admin«-Einrichtungsdialogen verändert haben.
 .
 Lesen Sie die Anweisungen in README.Debian (zu finden unter /usr/share/doc/phpgroupware-0.9.16-core-base/) um auf eine automatische Aktualisierung der Datei /etc/phpgroupware/header.inc.php bei einer (Neu-)Konfiguration des Pakets umzuschalten.
";
$elem["phpgroupware/configuration/nooverwritenote"]["descriptionfr"]="Regénération impossible du fichier 'header.inc.php'
 La gestion de la configuration de 'header.inc.php' a changé.
 .
 Les scripts du paquetage Debian ne peuvent deviner si les réglages précédents dans votre fichier devraient être écrasés (par les valeurs par défaut de Debian et les nouvelles valeurs de configuration saisies dans les formulaires précédents).
 .
 Vous pouvez ignorer cet avertissement si vous faites une mise-à-jour majeure, ou si les paramètres dans le fichier header.inc.php ont été modifiés avec les formulaires de configuration de la page d'administration principale (« header admin ») de phpGroupware.
 .
 Se référer aux instructions du README.Debian (dans /usr/share/doc/phpgroupware-0.9.16-core-base/) pour passer à un fichier /etc/phpgroupware/header.inc.php mis-à-jour automatiquement par la (re-)configuration du paquetage.
";
$elem["phpgroupware/configuration/nooverwritenote"]["default"]="";
PKG_OptionPageTail2($elem);
?>
