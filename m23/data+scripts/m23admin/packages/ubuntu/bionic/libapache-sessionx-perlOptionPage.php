<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libapache-sessionx-perl");

$elem["libapache-sessionx-perl/priv_keys"]["type"]="string";
$elem["libapache-sessionx-perl/priv_keys"]["description"]="For internal use only
 Keys used to find configured stores.

";
$elem["libapache-sessionx-perl/priv_keys"]["descriptionde"]="";
$elem["libapache-sessionx-perl/priv_keys"]["descriptionfr"]="";
$elem["libapache-sessionx-perl/priv_keys"]["default"]="";
$elem["libapache-sessionx-perl/action"]["type"]="select";
$elem["libapache-sessionx-perl/action"]["choices"][1]="Finished";
$elem["libapache-sessionx-perl/action"]["choices"][2]="Add New";
$elem["libapache-sessionx-perl/action"]["choicesde"][1]="Beendet";
$elem["libapache-sessionx-perl/action"]["choicesde"][2]="Neue hinzufügen";
$elem["libapache-sessionx-perl/action"]["choicesfr"][1]="Terminer";
$elem["libapache-sessionx-perl/action"]["choicesfr"][2]="Ajouter nouveau";
$elem["libapache-sessionx-perl/action"]["description"]="Action:
 Choose \"Add New\" to add a new session storage method, or choose an already
 configured store to modify or delete it.
 .
 Choose \"Finished\" when done.
";
$elem["libapache-sessionx-perl/action"]["descriptionde"]="Aktion:
 Wählen Sie »Neue hinzufügen« um eine neue Sitzungsspeichermethode hinzuzufügen oder wählen Sie einen bereits konfigurierten Speicherplatz aus, um diesen anzupassen oder zu löschen.
 .
 Wählen Sie »Beendet« aus, wenn Sie fertig sind.
";
$elem["libapache-sessionx-perl/action"]["descriptionfr"]="Action :
 Choisissez « Ajouter Nouveau » pour ajouter une nouvelle méthode d'enregistrement, ou choisissez un dépôt déjà configuré pour le modifier ou l'effacer.
 .
 Choisir « Terminer » lorsque vous avez terminé.
";
$elem["libapache-sessionx-perl/action"]["default"]="Finished";
$elem["libapache-sessionx-perl/store_action"]["type"]="select";
$elem["libapache-sessionx-perl/store_action"]["choices"][1]="Modify";
$elem["libapache-sessionx-perl/store_action"]["choicesde"][1]="Anpassen";
$elem["libapache-sessionx-perl/store_action"]["choicesfr"][1]="Modifier";
$elem["libapache-sessionx-perl/store_action"]["description"]="Action to perform on ${store}:
";
$elem["libapache-sessionx-perl/store_action"]["descriptionde"]="Aktion, die mit ${store} durchgeführt werden soll:
";
$elem["libapache-sessionx-perl/store_action"]["descriptionfr"]="Action à exécuter sur ${store} :
";
$elem["libapache-sessionx-perl/store_action"]["default"]="Modify";
$elem["libapache-sessionx-perl/store_type"]["type"]="select";
$elem["libapache-sessionx-perl/store_type"]["choices"][1]="File";
$elem["libapache-sessionx-perl/store_type"]["choices"][2]="FileFile";
$elem["libapache-sessionx-perl/store_type"]["choices"][3]="DB_File";
$elem["libapache-sessionx-perl/store_type"]["choices"][4]="Mysql";
$elem["libapache-sessionx-perl/store_type"]["choices"][5]="MysqlMysql";
$elem["libapache-sessionx-perl/store_type"]["choices"][6]="Oracle";
$elem["libapache-sessionx-perl/store_type"]["choices"][7]="Sybase";
$elem["libapache-sessionx-perl/store_type"]["description"]="Session storage method:
 Please select the storage method you wish to use:
  File:       File-based, using semaphores for locking.
  FileFile:   File-based, using lockfiles.
  DB_File:    DBM file storage, using lockfiles.
  Mysql:      MySQL storage, using semaphores for locking.
  MysqlMysql: MySQL storage, using MySQL for locking.
  Oracle:     Oracle storage and locking.
  Sybase:     Sybase storage and locking.
  Postgres:   PostgreSQL storage and locking.
 .
 The file-based methods are the simplest to configure, but don't scale to
 the needs of a high-volume site.
 .
 Semaphore locking is faster than file-based locking, but cannot be shared
 between multiple hosts; in such a situation, you probably should be using
 one of the database backends anyway.
";
$elem["libapache-sessionx-perl/store_type"]["descriptionde"]="Sitzungsspeichermethode:
 Bitte wählen Sie die Speichermethode aus, die Sie benutzen möchten:
  File:       Dateibasiert, verwendet Semaphoren zum Sperren.
  FileFile:   Dateibasiert, verwendet Sperrdateien.
  DB_File:    DBM-Dateispeicherung, verwendet Sperrdateien.
  Mysql:      MySQL-Speicherung, verwendet Semaphoren zum Sperren.
  MysqlMysql: MySQL-Speicherung, verwendet MySQL zum Sperren.
  Oracle:     Oracle-Speicherung und locken.
  Sybase:     Sybase-Speicherung und locken.
  Postgres:   PostgreSQL-Speicherung und locken.
 .
 Die dateibasierten Methoden sind am einfachsten zu konfigurieren, aber skalieren nicht bis zu den Anforderungen von Sites mit hohem Datenvolumen.
 .
 Semaphore-Sperren ist schneller als dateibasiertes Sperren, kann aber nicht von mehreren Hosts gemeinsam genutzt werden; in diesen Situationen sollten Sie aber sowieso die Verwendung eines der Datenbank-Backends in Betracht ziehen.
";
$elem["libapache-sessionx-perl/store_type"]["descriptionfr"]="Méthode d'enregistrement de la session :
 Veuillez choisir la méthode d'enregistrement désirée :
  File :       Basée sur un fichier, utilisation de fichiers de sémaphores
               pour le verrouillage ;
  FileFile :   Basée sur un fichier, utilisation de fichiers de
               verrouillage ;
  File_DB :    Enregistrement par fichier DBM, utilisation de
               fichiers de verrouillage ;
  Mysql :      Enregistrement Mysql, utilisation de sémaphores
               pour le verrouillage ;
  MysqlMysql : Enregistrement Mysql, utilisation de Mysql pour le verrouillage ;
  Oracle :     Enregistrement et verrouillage Oracle ;
  Sybase :     Enregistrement et verrouillage Sybase ;
  Postgres :   Enregistrement et verrouillage Postgres.
 .
 Les méthodes basées sur des fichiers sont les plus simples à configurer mais ne s'étendent pas aux besoins de site ayant de gros volumes.
 .
 Le verrouillage par sémaphores est plus rapide que le verrouillage basé sur les fichiers, mais il ne peut être partagé entre plusieurs hôtes ; dans de telles situations, vous devriez probablement utiliser l'une des facilités (« backends ») offertes par la base de données.
";
$elem["libapache-sessionx-perl/store_type"]["default"]="";
$elem["libapache-sessionx-perl/store_name"]["type"]="string";
$elem["libapache-sessionx-perl/store_name"]["description"]="Store name:
 Please choose the name you will use when referring to this storage method.
";
$elem["libapache-sessionx-perl/store_name"]["descriptionde"]="Name der Speichermethode:
 Bitte wählen Sie den Namen aus, den Sie beim Bezug auf diese Speichermethode verwenden werden.
";
$elem["libapache-sessionx-perl/store_name"]["descriptionfr"]="Nom du dépôt :
 Veuillez indiquer le nom que vous utiliserez lorsque vous vous référerez à cette méthode d'enregistrement.
";
$elem["libapache-sessionx-perl/store_name"]["default"]="";
$elem["libapache-sessionx-perl/store_file_directory"]["type"]="string";
$elem["libapache-sessionx-perl/store_file_directory"]["description"]="File storage directory:
 Please choose the directory in which to store session data. Each
 session will be a new file in this directory.
";
$elem["libapache-sessionx-perl/store_file_directory"]["descriptionde"]="Datei-Speicherverzeichnis:
 Bitte wählen Sie das Verzeichnis aus, in dem Sitzungsdaten gespeichert werden. Jede Sitzung wird eine neue Datei in diesem Verzeichnis.
";
$elem["libapache-sessionx-perl/store_file_directory"]["descriptionfr"]="Répertoire des enregistrements de fichier :
 Veuillez indiquer le répertoire d'enregistrement des données de la session. Chaque session sera représentée par un nouveau fichier dans ce répertoire.
";
$elem["libapache-sessionx-perl/store_file_directory"]["default"]="";
$elem["libapache-sessionx-perl/store_file_lockdirectory"]["type"]="string";
$elem["libapache-sessionx-perl/store_file_lockdirectory"]["description"]="Lockfile storage directory:
 Please choose the directory in which to store session locks. Each
 lock is a new file in this directory.
 .
 The filenames are chosen such that they will not conflict with session
 data, so you may repeat a file storage directory here.
";
$elem["libapache-sessionx-perl/store_file_lockdirectory"]["descriptionde"]="Sperrdatei-Speicherverzeichnis:
 Bitte wählen Sie das Verzeichnis aus, in dem Sitzungssperren gespeichert werden. Jede Sperre wird eine neue Datei in diesem Verzeichnis.
 .
 Die Dateinamen werden so ausgewählt, dass Sie nicht mit Sitzungsdaten in Konflikt stehen, daher können Sie hier auch das Datei-Speicherverzeichnis erneut angeben.
";
$elem["libapache-sessionx-perl/store_file_lockdirectory"]["descriptionfr"]="Répertoire d'enregistrement des fichiers de verrouillage :
 Veuillez choisir le répertoire de stockage des verrous de la session. Chaque verrou est représenté par un nouveau fichier dans ce répertoire.
 .
 Les noms des fichiers sont choisis de telle sorte qu'ils n'entrent pas en conflit avec les données de la session, ainsi vous pourrez réutiliser un répertoire de fichier de verrouillage.
";
$elem["libapache-sessionx-perl/store_file_lockdirectory"]["default"]="";
$elem["libapache-sessionx-perl/store_dbfile_filename"]["type"]="string";
$elem["libapache-sessionx-perl/store_dbfile_filename"]["description"]="Database file:
 Please enter the DBM file used to store sessions.
";
$elem["libapache-sessionx-perl/store_dbfile_filename"]["descriptionde"]="Datenbankdatei
 Bitte geben Sie die DBM-Datei ein, die zum Speichern der Sitzungen verwendet wird.
";
$elem["libapache-sessionx-perl/store_dbfile_filename"]["descriptionfr"]="Fichier de base de données :
 Veuillez indquer le fichier DBM qui sera utilisé pour enregistrer les sessions :
";
$elem["libapache-sessionx-perl/store_dbfile_filename"]["default"]="";
$elem["libapache-sessionx-perl/store_mysql_datasource"]["type"]="string";
$elem["libapache-sessionx-perl/store_mysql_datasource"]["description"]="MySQL data source:
 Please choose the MySQL data source used for storing session data, in
 the form of a Perl DBI DSN (see the DBI manpage).
 .
 The general form is \"dbi:mysql:<database>\". See the DBD::mysql manpage for
 more details.
";
$elem["libapache-sessionx-perl/store_mysql_datasource"]["descriptionde"]="MySQL-Datenquelle:
 Bitte wählen Sie die MySQL-Datenquelle aus, die zum Speichern von Sitzungsdaten verwendet wird. Verwenden Sie hierzu die Form einer Perl DBI-DSN (siehe DBI-Handbuchseite).
 .
 Die allgemeine Form ist »dbi:mysql:<datenbank>«. Lesen Sie die DBD::mysql-Handbuchseite für weitere Details.
";
$elem["libapache-sessionx-perl/store_mysql_datasource"]["descriptionfr"]="Source de données MySQL :
 Veuillez indiquer la source de données MySQL qui sera utilisée pour enregistrer les données de la session, sous la forme d'une base de données Perl DBI DSN (veuillez consulter la page du manuel de DBI).
 .
 La forme générale est « dbi:mysql:<base de données> ». Veuillez consulter la page du manuel DBD::mysql pour davantage d'informations.
";
$elem["libapache-sessionx-perl/store_mysql_datasource"]["default"]="dbi:mysql:sessions";
$elem["libapache-sessionx-perl/store_mysql_username"]["type"]="string";
$elem["libapache-sessionx-perl/store_mysql_username"]["description"]="MySQL username:
 Please enter the username used to access the session database. If
 left blank, the current user's login will be used.
";
$elem["libapache-sessionx-perl/store_mysql_username"]["descriptionde"]="MySQL-Benutzername:
 Bitte geben Sie den Benutzernamen an, der zum Zugriff auf die Sitzungsdatenbank verwendet wird. Bleibt dieser leer, wird der Login des aktuellen Benutzers verwendet.
";
$elem["libapache-sessionx-perl/store_mysql_username"]["descriptionfr"]="Identifiant MySQL :
 Veuillez indiquer l'identifiant qui sera utilisé pour accéder à la base de données de la session. S'il est omis, le nom d'utilisateur actuel sera utilisé.
";
$elem["libapache-sessionx-perl/store_mysql_username"]["default"]="";
$elem["libapache-sessionx-perl/store_mysql_password"]["type"]="password";
$elem["libapache-sessionx-perl/store_mysql_password"]["description"]="MySQL password:
 Please enter the password used to access the session database. May be
 left blank if no password is needed.
";
$elem["libapache-sessionx-perl/store_mysql_password"]["descriptionde"]="MySQL-Passwort:
 Bitte geben Sie das Passwort an, das zum Zugriff auf die Sitzungsdatenbank verwendet wird. Kann leer bleiben, falls kein Passwort benötigt wird.
";
$elem["libapache-sessionx-perl/store_mysql_password"]["descriptionfr"]="Mot de passe MySQL :
 Veuillez indiquer le mot de passe qui sera utilisé pour accéder à la base de données de la session. Il peut être omis si aucun mot de passe n'est nécessaire.
";
$elem["libapache-sessionx-perl/store_mysql_password"]["default"]="";
$elem["libapache-sessionx-perl/store_mysql_lockdatasource"]["type"]="string";
$elem["libapache-sessionx-perl/store_mysql_lockdatasource"]["description"]="MySQL lock data source:
 Please enter the MySQL data source used for locking, in the form of a
 Perl DBI DSN (see the DBI manpage). Locking is performed using
 MySQL's GET_LOCK and RELEASE_LOCK functions.
 .
 The general form is \"dbi:mysql:<database>\". See the DBD::mysql manpage for
 more details.
 .
 You will almost certainly want to use the same value you used for the
 session data.
";
$elem["libapache-sessionx-perl/store_mysql_lockdatasource"]["descriptionde"]="MySQL Sperr-Datenquelle:
 Bitte geben Sie die MySQL-Datenquelle ein, die zum Sperren verwendet wird. Verwenden Sie die Form einer Perl DBI-DSN (siehe DBI-Handbuchseite). Sperren wird mittels der MySQL-Funktionen GET_LOCK und RELEASE_LOCK durchgeführt.
 .
 Die allgemeine Form ist »dbi:mysql:<datenbank>«. Lesen Sie die DBD::mysql-Handbuchseite für weitere Details.
 .
 Höchstwahrscheinlich werden Sie die gleichen Werte wie auch für die Sitzungsdaten verwenden.
";
$elem["libapache-sessionx-perl/store_mysql_lockdatasource"]["descriptionfr"]="Source de données de verrouillage MySQL :
 Veuillez indiquez la source de données MySQL qui sera utilisée pour le verrouillage, sous la forme d'une base de données Perl DBI DSN (veuillez consulter la page de manuel DBI). Le verrouillage est réalisé en utilisant les fonctions MySQL GET_LOCK et RELEASE_LOCK.
 .
 La forme générale est « dbi:mysql:<base de données> ». Veuillez consulter la page du manuel DBD::mysql pour davantage d'informations.
 .
 Il est conseillé d'utiliser la même valeur que celle utilisée pour les données de session.
";
$elem["libapache-sessionx-perl/store_mysql_lockdatasource"]["default"]="dbi:mysql:sessions";
$elem["libapache-sessionx-perl/store_mysql_lockusername"]["type"]="string";
$elem["libapache-sessionx-perl/store_mysql_lockusername"]["description"]="MySQL username for locking:
 Please enter the username used to access the database for locking. If
 left blank, the current user's login will be used.
";
$elem["libapache-sessionx-perl/store_mysql_lockusername"]["descriptionde"]="MySQL-Benutzername für das Sperren:
 Bitte geben Sie den Benutzernamen ein, der für den Zugriff auf das Datenbank-Sperren verwendet wird. Bleibt dieser leer, wird der Login des aktuellen Benutzers verwendet.
";
$elem["libapache-sessionx-perl/store_mysql_lockusername"]["descriptionfr"]="Identifiant MySQL à utiliser pour le verrouillage :
 Veuillez indiquer l'identifiant qui sera utilisé pour accéder à la base de données de la session. S'il est omis, le nom d'utilisateur actuel sera utilisé.
";
$elem["libapache-sessionx-perl/store_mysql_lockusername"]["default"]="";
$elem["libapache-sessionx-perl/store_mysql_lockpassword"]["type"]="password";
$elem["libapache-sessionx-perl/store_mysql_lockpassword"]["description"]="MySQL password for locking:
 Please enter the password used to access the database for
 locking. May be left blank if no password is needed.
";
$elem["libapache-sessionx-perl/store_mysql_lockpassword"]["descriptionde"]="MySQL-Passwort zum Sperren:
 Bitte geben Sie das Passwort ein, das zum Zugriff auf die Datenbank zum Sperren verwendet wird. Falls kein Passwort benötigt wird, kann dies leer bleiben.
";
$elem["libapache-sessionx-perl/store_mysql_lockpassword"]["descriptionfr"]="Mot de passe MySQL à utiliser pour le verrouillage :
 Veuillez indiquer le mot de passe qui sera utilisé pour accéder à la base de données de la session. Il peut être omis si aucun mot de passe n'est nécessaire.
";
$elem["libapache-sessionx-perl/store_mysql_lockpassword"]["default"]="";
$elem["libapache-sessionx-perl/store_oracle_datasource"]["type"]="string";
$elem["libapache-sessionx-perl/store_oracle_datasource"]["description"]="Oracle data source:
 Please enter the Oracle data source used for storing session data, in
 the form of a Perl DBI DSN (see the DBI manpage). The general
 form is \"dbi:Oracle:<database>\". See the DBD::Oracle manpage for more
 details.
";
$elem["libapache-sessionx-perl/store_oracle_datasource"]["descriptionde"]="Oracle-Datenquelle:
 Bitte wählen Sie die Oracle-Datenquelle aus, die zum Speichern von Sitzungsdaten verwendet wird. Verwenden Sie hierzu die Form einer Perl DBI-DSN (siehe DBI-Handbuchseite). Die allgemeine Form ist »dbi:Oracle:<datenbank>«. Lesen Sie die DBD::Oracle-Handbuchseite für weitere Details.
";
$elem["libapache-sessionx-perl/store_oracle_datasource"]["descriptionfr"]="Source de données Oracle :
 Veuillez indiquer la source de données Oracle qui sera utilisée pour enregistrer les données de session, sous la forme d'une base de données Perl DBI DSN (veuillez consulter la page du manuel de DBI).
";
$elem["libapache-sessionx-perl/store_oracle_datasource"]["default"]="dbi:Oracle:sessions";
$elem["libapache-sessionx-perl/store_oracle_username"]["type"]="string";
$elem["libapache-sessionx-perl/store_oracle_username"]["description"]="Oracle username:
 Please enter the username used to access the session database. If
 left blank, the current user's login will be used.
";
$elem["libapache-sessionx-perl/store_oracle_username"]["descriptionde"]="Oracle-Benutzername:
 Bitte geben Sie den Benutzernamen an, der zum Zugriff auf die Sitzungsdatenbank verwendet wird. Bleibt dieser leer, wird der Login des aktuellen Benutzers verwendet.
";
$elem["libapache-sessionx-perl/store_oracle_username"]["descriptionfr"]="Identifiant Oracle :
 Veuillez indiquer l'identifiant qui sera utilisé pour accéder à la base de données de la session. S'il est omis, le nom d'utilisateur actuel sera utilisé.
";
$elem["libapache-sessionx-perl/store_oracle_username"]["default"]="";
$elem["libapache-sessionx-perl/store_oracle_password"]["type"]="password";
$elem["libapache-sessionx-perl/store_oracle_password"]["description"]="Oracle password:
 Please enter the password used to access the session database. May be left blank if no
 password is needed.
";
$elem["libapache-sessionx-perl/store_oracle_password"]["descriptionde"]="Oracle-Passwort:
 Bitte geben Sie das Passwort an, das zum Zugriff auf die Sitzungsdatenbank verwendet wird. Kann leer bleiben, falls kein Passwort benötigt wird.
";
$elem["libapache-sessionx-perl/store_oracle_password"]["descriptionfr"]="Mot de passe Oracle :
 Veuillez indiquer le mot de passe qui sera utilisé pour accéder à la base de données de la session. Il peut être omis si aucun mot de passe n'est nécessaire.
";
$elem["libapache-sessionx-perl/store_oracle_password"]["default"]="";
$elem["libapache-sessionx-perl/store_sybase_datasource"]["type"]="string";
$elem["libapache-sessionx-perl/store_sybase_datasource"]["description"]="Sybase data source:
 Please enter the Sybase data source used for storing session data, in
 the form of a Perl DBI DSN (see the DBI manpage).
 .
 The general form is \"dbi:Sybase:database=<database>;server=<server>\". See
 the DBD::Sybase manpage for more details.
";
$elem["libapache-sessionx-perl/store_sybase_datasource"]["descriptionde"]="Sybase-Datenquelle:
 Bitte wählen Sie die Sybase-Datenquelle aus, die zum Speichern von Sitzungsdaten verwendet wird. Verwenden Sie hierzu die Form einer Perl DBI-DSN (siehe DBI-Handbuchseite).
 .
 Die allgemeine Form ist »dbi:Sybase:database=<datenbank>;server=<server>«. Lesen Sie die DBD::Sybase-Handbuchseite für weitere Details.
";
$elem["libapache-sessionx-perl/store_sybase_datasource"]["descriptionfr"]="Source de données Sybase :
 Veuillez indiquer la source de données Sybase qui sera utilisée pour enregistrer les données de session, sous la forme d'une base de données Perl DBI DSN (veuillez consulter la page du manuel de DBI).
 .
 La forme générale est « dbi:Sybase:base de données=<base de données>;serveur=<serveur> ». Veuillez consulter la page de manuel du DBD::Sybase pour davantage d'informations.
";
$elem["libapache-sessionx-perl/store_sybase_datasource"]["default"]="dbi:Sybase:database=sessions";
$elem["libapache-sessionx-perl/store_sybase_username"]["type"]="string";
$elem["libapache-sessionx-perl/store_sybase_username"]["description"]="Sybase username:
 Please enter the username used to access the session database. If
 left blank, the current user's login will be used.
";
$elem["libapache-sessionx-perl/store_sybase_username"]["descriptionde"]="Sybase-Benutzername:
 Bitte geben Sie den Benutzernamen an, der zum Zugriff auf die Sitzungsdatenbank verwendet wird. Bleibt dieser leer, wird der Login des aktuellen Benutzers verwendet.
";
$elem["libapache-sessionx-perl/store_sybase_username"]["descriptionfr"]="Identifiant Sybase :
 Veuillez indiquer l'identifiant qui sera utilisé pour accéder à la base de données de la session. S'il est omis, le nom d'utilisateur actuel sera utilisé.
";
$elem["libapache-sessionx-perl/store_sybase_username"]["default"]="";
$elem["libapache-sessionx-perl/store_sybase_password"]["type"]="password";
$elem["libapache-sessionx-perl/store_sybase_password"]["description"]="Sybase password:
 Please enter the password used to access the session database. May be
 left blank if no password is needed.
";
$elem["libapache-sessionx-perl/store_sybase_password"]["descriptionde"]="Sybase-Passwort:
 Bitte geben Sie das Passwort an, das zum Zugriff auf die Sitzungsdatenbank verwendet wird. Kann leer bleiben, falls kein Passwort benötigt wird.
";
$elem["libapache-sessionx-perl/store_sybase_password"]["descriptionfr"]="Mot de passe Sybase :
 Veuillez indiquer le mot de passe qui sera utilisé pour accéder à la base de données de la session. Il peut être omis si aucun mot de passe n'est nécessaire.
";
$elem["libapache-sessionx-perl/store_sybase_password"]["default"]="";
$elem["libapache-sessionx-perl/store_postgres_datasource"]["type"]="string";
$elem["libapache-sessionx-perl/store_postgres_datasource"]["description"]="PostgreSQL data source:
 Please enter the PostgreSQL data source used for storing session
 data, in the form of a Perl DBI DSN (see the DBI manpage).
 .
 The general form is \"dbi:Pg:dbname=<database>;host=<server>\". See the
 DBD::Pg manpage for more details.
";
$elem["libapache-sessionx-perl/store_postgres_datasource"]["descriptionde"]="PostgreSQL-Datenquelle:
 Bitte wählen Sie die PostgreSQL-Datenquelle aus, die zum Speichern von Sitzungsdaten verwendet wird. Verwenden Sie hierzu die Form einer Perl DBI-DSN (siehe DBI-Handbuchseite).
 .
 Die allgemeine Form ist »dbi:Pg:dbname=<datenbank>;host=<server>«. Lesen Sie die DBD::Pg-Handbuchseite für weitere Details.
";
$elem["libapache-sessionx-perl/store_postgres_datasource"]["descriptionfr"]="Source de données PostgreSQL :
 Veuillez indiquer la source de données PostgreSQL qui sera utilisée pour enregistrer les données de la session, sous la forme d'une base de données Perl DBI DSN (veuillez consulter la page du manuel de DBI).
 .
 La forme générale est « dbi:Pg:nom de la base de données=<base de données>;hôte=<serveur> ». Veuillez consulter la page du manuel de DBD::Pg pour davantage d'informations.
";
$elem["libapache-sessionx-perl/store_postgres_datasource"]["default"]="dbi:Pg:dbname=sessions";
$elem["libapache-sessionx-perl/store_postgres_username"]["type"]="string";
$elem["libapache-sessionx-perl/store_postgres_username"]["description"]="PostgreSQL username:
 Please enter the username used to access the session database. If left blank, the current
 user's login will be used.
";
$elem["libapache-sessionx-perl/store_postgres_username"]["descriptionde"]="PostgreSQL-Benutzername:
 Bitte geben Sie den Benutzernamen an, der zum Zugriff auf die Sitzungsdatenbank verwendet wird. Bleibt dieser leer, wird der Login des aktuellen Benutzers verwendet.
";
$elem["libapache-sessionx-perl/store_postgres_username"]["descriptionfr"]="Identifiant PostgreSQL :
 Veuillez indiquer l'identifiant qui sera utilisé pour accéder à la base de données de la session. S'il est omis, le nom d'utilisateur actuel sera utilisé.
";
$elem["libapache-sessionx-perl/store_postgres_username"]["default"]="";
$elem["libapache-sessionx-perl/store_postgres_password"]["type"]="password";
$elem["libapache-sessionx-perl/store_postgres_password"]["description"]="PostgreSQL password:
 Please enter the password used to access the session database. May be
 left blank if no password is needed.
";
$elem["libapache-sessionx-perl/store_postgres_password"]["descriptionde"]="PostgreSQL-Passwort:
 Bitte geben Sie das Passwort an, das zum Zugriff auf die Sitzungsdatenbank verwendet wird. Kann leer bleiben, falls kein Passwort benötigt wird.
";
$elem["libapache-sessionx-perl/store_postgres_password"]["descriptionfr"]="Mot de passe PostgreSQL :
 Veuillez indiquer le mot de passe qui sera utilisé pour accéder à la base de données de la session. Il peut être omis si aucun mot de passe n'est nécessaire.
";
$elem["libapache-sessionx-perl/store_postgres_password"]["default"]="";
$elem["libapache-sessionx-perl/default_store"]["type"]="select";
$elem["libapache-sessionx-perl/default_store"]["description"]="Default storage method:
 Please choose the storage method that will be used by default if you
 don't specify a particular storage method at run time.
";
$elem["libapache-sessionx-perl/default_store"]["descriptionde"]="Standard-Speichermethode:
 Bitte wählen Sie die Speichermethode aus, die standardmäßig verwendet wird, falls Sie nicht eine bestimmte Speichermethode zur Laufzeit auswählen.
";
$elem["libapache-sessionx-perl/default_store"]["descriptionfr"]="Méthode d'enregistrement par défaut :
 Veuillez indiquer la méthode d'enregistrement qui sera utilisée par défaut si vous ne précisez pas de méthode d'enregistrement particulière lors de l'exécution.
";
$elem["libapache-sessionx-perl/default_store"]["default"]="";
PKG_OptionPageTail2($elem);
?>
