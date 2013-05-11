<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mnogosearch-common");

$elem["mnogosearch-common/overwrite_config"]["type"]="boolean";
$elem["mnogosearch-common/overwrite_config"]["description"]="Overwrite mnogosearch configuration files?
 Please note that questions about the mnogosearch settings will only
 be asked once for each option.
 .
 The configuration script needs the ability to remotely connect to the
 database server, create databases, add users and create tables. The
 /usr/share/doc/mnogosearch/INSTALL.gz documentation file provides
 information about the setup of these databases for users who don't
 want to run this configuration process automatically.
 .
 Existing mnogosearch configuration files will not be overwritten
 unless explicitly accepted.
";
$elem["mnogosearch-common/overwrite_config"]["descriptionde"]="Sollen die Konfigurationsdateien von mnogosearch überschrieben werden?
 Bitte beachten Sie, dass Fragen über Mnogosearch-Einstellungen nur einmal für jede Option gestellt werden.
 .
 Das Konfigurations-Skript benötigt die Möglichkeit, eine Verbindung zu einem entfernten Datenbank-Server aufzubauen, eine Datenbank anzulegen, sowie Benutzer und Tabellen zu erstellen. Die Dokumentationsdatei /usr/share/doc/mnogosearch/INSTALL.gz enthält für Benutzer, die diesen Konfigurationsprozess nicht automatisch durchlaufen wollen, Informationen über die Einrichtung dieser Datenbanken.
 .
 Existierende Konfigurationsdateien von mnogosearch werden nicht überschrieben, falls sie nicht explizit akzeptiert wurden.
";
$elem["mnogosearch-common/overwrite_config"]["descriptionfr"]="Faut-il écraser les fichiers de configuration de mnogosearch ?
 Veuillez noter que les questions concernant la configuration de mnogosearch ne seront posées qu'une seule fois pour chaque option.
 .
 Le script de configuration doit pouvoir se connecter à distance au serveur de bases de données, y créer des bases de données, des utilisateurs et des tables. Le fichier de documentation /usr/share/doc/mnogosearch/INSTALL.gz fournit les renseignements nécessaires pour configurer les bases de données pour les utilisateurs ne voulant pas utiliser ce processus de configuration automatique.
 .
 Les fichiers de configuration existants pour mnogosearch ne seront pas modifiés sans acceptation explicite.
";
$elem["mnogosearch-common/overwrite_config"]["default"]="false";
$elem["mnogosearch-common/database_mode"]["type"]="select";
$elem["mnogosearch-common/database_mode"]["choices"][1]="single";
$elem["mnogosearch-common/database_mode"]["choices"][2]="multi";
$elem["mnogosearch-common/database_mode"]["description"]="Layout mode for the index database:
 You can choose among different indexing modes for the mnogosearch
 database:
  - single: words are stored in a single table;
  - multi:  words are spread over 256 tables sorted on word length. This
            results in faster fixed width tables.
  - blob:   fastest mode but not supported by SQLite.
 .
 For more information about these modes, read
 /usr/share/doc/mnogosearch-doc/msearch-howstore.html
";
$elem["mnogosearch-common/database_mode"]["descriptionde"]="Layout (Modus) für die Index-Datenbank:
 Sie können zwischen verschiedenen Indizierungsmodi für die mnogosearch-Datenbank wählen:
  - einfach:  Wörter werden in einer einzelnen Tabelle abgelegt;
  - mehrfach: Wörter werden auf 13 Tabellen aufgeteilt, sortiert nach
              Wortlänge. Dadurch werden feste Tabellenbreiten verwendet,
              die schneller sind.
  - blob:     Schnellster Modus, aber von SQLite nicht unterstützt.
 .
 Für weitere Informationen bezüglich dieser Betriebsarten lesen Sie in /usr/share/doc/mnogosearch-doc/msearch-howstore.html nach.
";
$elem["mnogosearch-common/database_mode"]["descriptionfr"]="Mode de construction de l'index de la base de données :
 Vous pouvez choisir parmi différents modes d'indexation pour la base de données de mnogosearch : 
  
  - Unique : les mots sont enregistrés dans une seule table ;
  - Multiple : les mots sont répartis sur 256 tables selon leur longueur. Cela conduit à des tables de taille fixe, plus rapides ;
  - blob : mode le plus rapide mais non géré par SQLite.
 .
 Pour davantage d'information sur ces modes, veuillez lire /usr/share/doc/msearch-howstore.html.
";
$elem["mnogosearch-common/database_mode"]["default"]="multi";
$elem["mnogosearch-common/database_type"]["type"]="select";
$elem["mnogosearch-common/database_type"]["choices"][1]="sqlite";
$elem["mnogosearch-common/database_type"]["choices"][2]="mysql";
$elem["mnogosearch-common/database_type"]["description"]="Database server type for mnogosearch:
 Please choose the type of the database server that will store
 the indexer data for mnogosearch.
";
$elem["mnogosearch-common/database_type"]["descriptionde"]="Datenbank-Server-Typ für mnogosearch:
 Bitte wählen Sie die Art des Datenbank-Servers, der die Indizierungsdaten für mnogosearch speichern wird.
";
$elem["mnogosearch-common/database_type"]["descriptionfr"]="Type de serveur de bases de données pour mnogosearch :
 Veuillez choisir le type du serveur de bases de données qui hébergera les données de l'indexeur de mnogosearch.
";
$elem["mnogosearch-common/database_type"]["default"]="sqlite";
$elem["mnogosearch-common/database_admin_user"]["type"]="string";
$elem["mnogosearch-common/database_admin_user"]["description"]="Database server administrative user:
 Please enter the name of the database server administrative
 account. This account must have privileges to add users, databases
 and tables.
";
$elem["mnogosearch-common/database_admin_user"]["descriptionde"]="Administrator des Datenbank-Servers:
 Bitte geben Sie den Namen des Administratorzugangs des Datenbank-Servers ein. Dieser Zugang muss die Rechte haben, Benutzer, Datenbanken und Tabellen hinzufügen zu können.
";
$elem["mnogosearch-common/database_admin_user"]["descriptionfr"]="Identifiant de l'administrateur du serveur de bases de données :
 Veuillez indiquer l'identifiant de l'administrateur du serveur de bases de données. Ce compte doit posséder les privilèges nécessaires pour ajouter des utilisateurs, des bases de données et des tables.
";
$elem["mnogosearch-common/database_admin_user"]["default"]="root";
$elem["mnogosearch-common/database_admin_pass"]["type"]="password";
$elem["mnogosearch-common/database_admin_pass"]["description"]="Database server administrative user password:
";
$elem["mnogosearch-common/database_admin_pass"]["descriptionde"]="Benutzerpasswort des Administrators des Datenbank-Servers:
";
$elem["mnogosearch-common/database_admin_pass"]["descriptionfr"]="Mot de passe de l'administrateur du serveur de bases de données :
";
$elem["mnogosearch-common/database_admin_pass"]["default"]="";
$elem["mnogosearch-common/database_host"]["type"]="string";
$elem["mnogosearch-common/database_host"]["description"]="Database server host name:
 Please provide the hostname of the server that will host mnogosearch
 databases.
";
$elem["mnogosearch-common/database_host"]["descriptionde"]="Rechnername des Datenbank-Server:
 Bitte geben Sie den Rechnernamen des Servers an, der mnogosearch-Datenbanken beherbergen wird.
";
$elem["mnogosearch-common/database_host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données :
 Veuillez indiquer le nom d'hôte du serveur de bases de données qui hébergera les bases de données de mnogosearch.
";
$elem["mnogosearch-common/database_host"]["default"]="localhost";
$elem["mnogosearch-common/database_port"]["type"]="string";
$elem["mnogosearch-common/database_port"]["description"]="Port number for the database service:
 Please specify the database server connection port.
";
$elem["mnogosearch-common/database_port"]["descriptionde"]="Portnummer für den Datenbank-Dienst:
 Bitte geben Sie den Verbindungsport des Datenbank-Servers an.
";
$elem["mnogosearch-common/database_port"]["descriptionfr"]="Numéro de port du service de bases de données :
 Veuillez indiquer le port de connexion du serveur de bases de données.
";
$elem["mnogosearch-common/database_port"]["default"]="";
$elem["mnogosearch-common/database_name"]["type"]="string";
$elem["mnogosearch-common/database_name"]["description"]="Database name for mnogosearch:
 Please provide a name for the database to be used by mnogosearch.
";
$elem["mnogosearch-common/database_name"]["descriptionde"]="Name der mnogosearch-Datenbank:
 Bitte geben Sie einen Namen für die Datenbank an, die von mnogosearch verwendet werden soll.
";
$elem["mnogosearch-common/database_name"]["descriptionfr"]="Nom de la base de données mnogosearch :
 Veuillez fournir un nom pour la base de données qui sera utilisée par mnogosearch.
";
$elem["mnogosearch-common/database_name"]["default"]="mnogosearch";
$elem["mnogosearch-common/local_database"]["type"]="boolean";
$elem["mnogosearch-common/local_database"]["description"]="Is the database server local on this host?
 If the database server runs on the same machine as mnogosearch,
 mnogosearch can connect to the database using a Unix socket rather than a
 TCP/IP one.
 .
 If you do not choose this option, the local database server must
 allow TCP/IP socket connections.
";
$elem["mnogosearch-common/local_database"]["descriptionde"]="Läuft der Datenbank-Server lokal auf diesem Rechner?
 Wird die Datenbank auf der selben Maschine wie mnogosearch betrieben, kann die Verbindung über einen Unix-Socket anstelle einer TCP/IP-Verbindung aufgebaut werden.
 .
 Falls Sie diese Option nicht wählen, muss der lokale Datenbank-Server TCP/IP-Socket-Verbindungen erlauben.
";
$elem["mnogosearch-common/local_database"]["descriptionfr"]="Le serveur de bases de données est-il local sur cet hôte ?
 Si le serveur de bases de données est hébergé sur le même système que mnogosearch, celui-ci peut se connecter à la base de données en utilisant un socket Unix plutôt qu'un socket TCP/IP.
 .
 En refusant cette option, le serveur local de bases de données doit accepter les connexions par socket TCP/IP.
";
$elem["mnogosearch-common/local_database"]["default"]="true";
$elem["mnogosearch-common/database_user"]["type"]="string";
$elem["mnogosearch-common/database_user"]["description"]="Database user name:
 Please provide a user name for mnogosearch to register with the
 database server. This database user is not necessarily the same as a
 system login, especially if the database is on a remote server.
 .
 This is the user which will own the database, tables and other
 objects to be created by this installation. This user will have
 complete freedom to insert, change or delete data in the database.
";
$elem["mnogosearch-common/database_user"]["descriptionde"]="Name des Datenbankbenutzers:
 Bitte geben Sie einen Benutzernamen zur Registrierung mit dem Datenbank-Server für mnogosearch an. Dieser Datenbankbenutzer ist nicht notwendigerweise identisch mit einem Systemkonto, insbesondere, falls die Datenbank sich auf einem entfernten Server befindet.
 .
 Dies ist der Benutzer, der die Datenbank, Tabellen und andere Objekte besitzen wird, die bei der Installation erstellt werden. Dieser Benutzer wird die vollständige Freiheit haben, Daten in die Datenbank einzufügen, zu ändern und zu löschen.
";
$elem["mnogosearch-common/database_user"]["descriptionfr"]="Identifiant de connexion à la base de données :
 Veuillez fournir un identifiant de connexion pour le serveur de bases de données. Cet identifiant n'est pas forcément le même qu'un utilisateur du système, en particulier si la base de données est sur un serveur distant.
 .
 Cet identifiant est le propriétaire de la base de données, des tables et autres objets qui seront créés lors de l'installation. Il possédera tous les droits pour insérer des données, les modifier et les effacer.
";
$elem["mnogosearch-common/database_user"]["default"]="mnogosearch";
$elem["mnogosearch-common/database_pass"]["type"]="password";
$elem["mnogosearch-common/database_pass"]["description"]="Database user password:
";
$elem["mnogosearch-common/database_pass"]["descriptionde"]="Passwort des Datenbankbenutzers:
";
$elem["mnogosearch-common/database_pass"]["descriptionfr"]="Mot de passe du propriétaire de la base de données :
";
$elem["mnogosearch-common/database_pass"]["default"]="";
$elem["mnogosearch-common/configure_database"]["type"]="boolean";
$elem["mnogosearch-common/configure_database"]["description"]="Automatically configure the database for mnogosearch?
 The database, its tables and users can be automatically created.
 .
 Please note that the existing database content will be removed if you
 choose this option.
";
$elem["mnogosearch-common/configure_database"]["descriptionde"]="Die Datenbank für mnogosearch automatisch konfigurieren?
 Die Datenbank, ihre Tabellen und Benutzer können automatisch erstellt werden.
 .
 Bitte beachten Sie, dass der existierende Datenbank-Inhalt entfernt wird, falls Sie diese Option wählen.
";
$elem["mnogosearch-common/configure_database"]["descriptionfr"]="Faut-il configurer automatiquement la base de données pour mnogosearch ?
 La base de données, ses tables et les utilisateurs seront créés automatiquement.
 .
 En acceptant cette option, veuillez noter que la base de données existante sera effacée.
";
$elem["mnogosearch-common/configure_database"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
