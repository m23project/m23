<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sympa");

$elem["sympa/language"]["type"]="select";
$elem["sympa/language"]["description"]="Default language for Sympa:
";
$elem["sympa/language"]["descriptionde"]="Standardsprache für Sympa:
";
$elem["sympa/language"]["descriptionfr"]="Langue par défaut pour Sympa :
";
$elem["sympa/language"]["default"]="en_US";
$elem["sympa/hostname"]["type"]="string";
$elem["sympa/hostname"]["description"]="Sympa hostname:
 This is the name of the machine or the alias you will use to reach sympa.
 .
 Example:
 .
   listhost.cru.fr
 .
   Then, you will send your sympa commands to:
 .
   sympa@listhost.cru.fr
";
$elem["sympa/hostname"]["descriptionde"]="Sympa-Rechnername:
 Dies ist der Name des Rechners oder der Alias, über den Sympa erreichbar ist.
 .
 Beispiel:
 .
   listhost.cru.fr
 .
   Dann werden Sympa-Befehle gesandt an:
 .
   sympa@listhost.cru.fr
";
$elem["sympa/hostname"]["descriptionfr"]="Nom d'hôte du serveur « sympa » :
 Veuillez indiquer le nom d'hôte de la machine ou de l'alias utilisé pour envoyer des requêtes à Sympa. Par exemple :
 .
 Exemple :
 .
   listhost.cru.fr
 .
 Les commandes de Sympa seront alors envoyées à :
 .
   sympa@listhost.cru.fr
";
$elem["sympa/hostname"]["default"]="";
$elem["sympa/listmaster"]["type"]="string";
$elem["sympa/listmaster"]["description"]="Listmaster email address(es):
 Listmasters are privileged people who administrate mailing lists (mailing
 list superusers).
 .
 Please give listmasters email addresses separated by commas.
 .
 Example:
 .
   postmaster@cru.fr, root@home.cru.fr
";
$elem["sympa/listmaster"]["descriptionde"]="E-Mail-Adresse(n) des Listenadministrators:
 Listenadministratoren sind privilegierte Benutzer, die Mailinglisten verwalten.
 .
 Bitte die E-Mail-Adressen der Listenadministratoren durch Kommata getrennt eingeben.
 .
 Beispiel:
 .
   postmaster@cru.fr, root@home.cru.fr
";
$elem["sympa/listmaster"]["descriptionfr"]="Adresses électroniques des administrateurs de listes :
 Un administrateur de listes (« listmaster ») est une personne qui gère le serveur de listes de diffusion.
 .
 Les adresses électroniques des administrateurs doivent être séparées par des virgules. Par exemple :
 .
 Exemple :
 .
   postmaster@cru.fr, root@home.cru.fr
";
$elem["sympa/listmaster"]["default"]="";
$elem["sympa/smime_support"]["type"]="boolean";
$elem["sympa/smime_support"]["description"]="Do you want S/MIME authentication and encryption?
 S/MIME allows messages to be encrypted within a given list and also allows
 users to be authenticated.
 .
 This option works only if the `openssl' package is installed on your
 system. Please first make sure you installed this package.
";
$elem["sympa/smime_support"]["descriptionde"]="Möchten Sie S/MIME-Authentifizierung und Verschlüsselung benutzen?
 S/MIME ermöglicht es, dass Nachrichten innerhalb einer bestimmten Liste verschlüsselt und die Benutzer authentifiziert sind.
 .
 Dies funktioniert jedoch nur, falls das Paket »openssl« auf Ihrem System installiert ist. Stellen Sie sicher, dass es installiert ist, wenn Sie diese Option benutzen wollen.
";
$elem["sympa/smime_support"]["descriptionfr"]="Voulez-vous utiliser S/MIME pour l'authentification et le chiffrement ?
 S/MIME permet de chiffrer les messages au sein d'une liste donnée et permet aussi l'authentification des utilisateurs.
 .
 Cette option ne fonctionne que si le paquet « openssl » est installé sur votre système. Assurez-vous d'abord que ce paquet est installé.
";
$elem["sympa/smime_support"]["default"]="false";
$elem["sympa/key_password"]["type"]="password";
$elem["sympa/key_password"]["description"]="What is the password for the lists private keys?
 This password does protect the access to lists private keys.
 .
 Please note that you are not allowed to give an empty password.
";
$elem["sympa/key_password"]["descriptionde"]="Wie lautet das Kennwort für die privaten Schlüssel der Listen?
 Dieses Kennwort schützt die privaten Schlüssel der Listen vor fremden Zugriff.
 .
 Bitte beachten Sie, dass ein leeres Kennwort nicht zulässig ist.
";
$elem["sympa/key_password"]["descriptionfr"]="Mot de passe des clés privées des listes :
 Veuillez indiquer le mot de passe qui protège l'accès aux clés privées des listes.
 .
 Les mots de passe vides ne sont pas autorisés.
";
$elem["sympa/key_password"]["default"]="";
$elem["sympa/key_password_again"]["type"]="password";
$elem["sympa/key_password_again"]["description"]="Re-enter the password for the lists private keys for verification:
 Please enter the same password again to verify you have typed it
 correctly.
";
$elem["sympa/key_password_again"]["descriptionde"]="Kennwort für den privaten Schlüssel der Listen zur Kontrolle erneut eingeben.
 Damit die Eingabe des Kennworts geprüft werden kann, bitte das gleiche Kennwort nochmals eingeben.
";
$elem["sympa/key_password_again"]["descriptionfr"]="Confirmation du mot de passe des clés privées :
 Veuillez confirmer le mot de passe pour vérifier que vous n'avez pas commis d'erreur en le saisissant.
";
$elem["sympa/key_password_again"]["default"]="";
$elem["sympa/remove_spool"]["type"]="boolean";
$elem["sympa/remove_spool"]["description"]="Should lists home and spool directories be removed?
 The lists home directory (/var/lib/sympa) contains the mailing lists
 configurations, mailing list archives and S/MIME user certificates
 (when sympa is configured for using S/MIME encryption and authentication).
 The spool directory (/var/spool/sympa) contains various queue directories.
 .
 Note that if those directories are empty, they will be automatically
 removed.
 .
 Please choose whether you want to remove lists home and spool directories.
";
$elem["sympa/remove_spool"]["descriptionde"]="Sollen die Home- und Spoolverzeichnisse der Listen gelöscht werden?
 Das Home-Verzeichnis der Listen (/var/lib/sympa) enthält die Konfigurationen für die Mailinglisten, die Archive der Mailinglisten und S/MIME-Benutzerzertifikate (wenn Sympa für die Verwendung von S/MIME-Verschlüsselung und Authentifizierung konfiguriert wurde). Das Spool-Verzeichnis /var/spool/sympa enthält verschiedene Queue-Verzeichnisse.
 .
 Falls diese Verzeichnisse leer sein sollten, werden sie automatisch entfernt.
 .
 Bitte wählen Sie aus, ob Sie die Home- und Spoolverzeichnisse der Listen entfernen wollen.
";
$elem["sympa/remove_spool"]["descriptionfr"]="Voulez-vous supprimer les répertoires de listes et de mise en attente ?
 Le répertoire des listes (/var/lib/sympa) contient la configuration des listes de diffusion, les archives de listes de diffusion ainsi que les certificats S/MIME des utilisateurs (quand sympa est configuré pour utiliser le chiffrement et l'authentification S/MIME). Le répertoire de mise en attente (« spool ») (/var/spool/sympa) contient quant à lui des répertoires de files d'attentes diverses.
 .
 Notez que ces répertoires seront automatiquement supprimés s'ils sont vides.
 .
 Veuillez choisir si vous voulez supprimer les répertoires de listes et de mise en attente.
";
$elem["sympa/remove_spool"]["default"]="false";
$elem["sympa/use_db"]["type"]="boolean";
$elem["sympa/use_db"]["description"]="Do you want to store the subscription information in a database?
 It is possible to store the subscription information in a database instead
 of a simple text file, making accesses to user information much faster.
 .
 Using a database is also mandatory when you want to use the WWSympa
 administration interface.
";
$elem["sympa/use_db"]["descriptionde"]="Möchten Sie Abonnementdaten in einer Datenbank speichern?
 Es ist möglich, die Abonnementdaten statt in einer einfachen Textdatei auch in einer Datenbank zu speichern. Dies beschleunigt die Informationsabfrage.
 .
 Wenn Sie WWSympa einsetzen wollen, dann müssen Sie die Datenbank einsetzen.
";
$elem["sympa/use_db"]["descriptionfr"]="Utiliser une base de données pour conserver les informations d'abonnement ?
 Les informations d'abonnement peuvent être conservées dans une base de données plutôt que dans un simple fichier texte afin d'accélérer de manière significative l'accès à ces données.
 .
 L'utilisation de l'interface d'administration de liste WWSympa nécessite l'utilisation d'une base de données.
";
$elem["sympa/use_db"]["default"]="true";
$elem["sympa/db_type"]["type"]="select";
$elem["sympa/db_type"]["choices"][1]="PostgreSQL";
$elem["sympa/db_type"]["choicesde"][1]="PostgreSQL";
$elem["sympa/db_type"]["choicesfr"][1]="PostgreSQL";
$elem["sympa/db_type"]["description"]="What type of database are you using?
 This package only supports MySQL and PostGreSQL database management
 systems.
";
$elem["sympa/db_type"]["descriptionde"]="Welche Datenbank nutzen Sie?
 Dieses Paket unterstützt nur MySQL- und PostgreSQL-Datenbanken.
";
$elem["sympa/db_type"]["descriptionfr"]="Type de serveur de bases de données :
 Veuillez indiquer le serveur de bases de données. Ce paquet ne prend en compte que les gestionnaires de bases de données PostgreSQL et MySQL.
";
$elem["sympa/db_type"]["default"]="MySQL";
$elem["sympa/db_authtype"]["type"]="select";
$elem["sympa/db_authtype"]["choices"][1]="Ident-based";
$elem["sympa/db_authtype"]["choicesde"][1]="Ident-basierend";
$elem["sympa/db_authtype"]["choicesfr"][1]="Basée sur ident";
$elem["sympa/db_authtype"]["description"]="Which authentication method?
 Please specify which authentication method PostgreSQL uses for the
 database superuser. The default configuration for PostgreSQL is
 ident-based authentication.
";
$elem["sympa/db_authtype"]["descriptionde"]="Welche Authentifizierungsmethode?
 Bitte geben Sie an, welche Authentifizierungsmethode PostgreSQL für den Datenbankverwalter verwendet. Die Voreinstellung von PostgreSQL ist Ident-basierte Authentifizierung.
";
$elem["sympa/db_authtype"]["descriptionfr"]="Méthode d'authentification :
 Veuillez choisir la méthode que PostgreSQL utilisera pour valider le superutilisateur. Par défaut, la méthode basée sur ident est utilisée.
";
$elem["sympa/db_authtype"]["default"]="Ident-based";
$elem["sympa/db_name"]["type"]="string";
$elem["sympa/db_name"]["description"]="What is the name of your Sympa database?
";
$elem["sympa/db_name"]["descriptionde"]="Wie lautet der Name Ihrer Sympa-Datenbank?
";
$elem["sympa/db_name"]["descriptionfr"]="Nom de la base de données de Sympa :
";
$elem["sympa/db_name"]["default"]="sympa";
$elem["sympa/db_hostname"]["type"]="string";
$elem["sympa/db_hostname"]["description"]="What is the hostname where your database is running?
 Sympa is able to connect to a local or a remote database.
 .
 If you run the database on a local machine, please leave 'localhost' as
 the hostname.
 .
 Make sure that you properly installed and configured a database server on
 the host running the database. Database server packages are respectively
 named `mysql-server' and `postgresql' for MySQL and PostgreSQL.
 .
 Accesses to distant databases are achieved through TCP connections. If you
 run the database on a distant machine, make sure you configured your
 database server for TCP connections and you setup the right port.
";
$elem["sympa/db_hostname"]["descriptionde"]="Wie lautet der Rechnername der Maschine, auf der Ihre Datenbank läuft?
 Sympa kann zu einer lokalen oder entfernten Datenbank Verbindung aufnehmen.
 .
 Befindet sich die Datenbank auf diesem Rechner, belassen Sie bitte »localhost« als Rechnernamen.
 .
 Stellen Sie sicher, dass auf dem angegebenen Rechner ein Datenbankserver korrekt installiert und konfiguriert ist. Datenbankserver sind z.B. in den Paketen »mysql-server« (MySQL) und »postgresql« (PostgreSQL) enthalten.
 .
 Verbindungen zu Datenbanken auf entfernten Rechnern werden über TCP hergestellt. Falls Sie die Datenbank auf einem anderen Rechner als diesem betreiben, dann stellen Sie sicher, dass Ihr Datenbankserver für TCP-Verbindungen und den richtigen Port konfiguriert ist.
";
$elem["sympa/db_hostname"]["descriptionfr"]="Serveur de bases de données :
 Sympa est capable de se connecter à une base de données locale ou distante.
 .
 Si vous utilisez une base de données locale, laissez « localhost » comme nom de machine.
 .
 Assurez-vous que vous avez correctement installé et configuré le serveur de bases de données sur la machine hébergeant la base de données. Les paquets contenant les serveurs de bases de données MySQL et PostgreSQL ont pour noms respectifs « mysql-server » et « postgresql ».
 .
 L'accès aux bases de données distantes se fait par des connexions TCP. Si la base de données est hébergée sur une machine distante, assurez-vous que vous avez configuré votre serveur de bases de données pour les connexions TCP et que vous avez configuré le port adéquat.
";
$elem["sympa/db_hostname"]["default"]="localhost";
$elem["sympa/db_port"]["type"]="string";
$elem["sympa/db_port"]["description"]="What is the TCP port of your ${database} database server?
 This TCP port is used by the database server for distant database
 connections.
 .
 You need to set up this parameter when the hostname is different from
 `localhost'.
";
$elem["sympa/db_port"]["descriptionde"]="Auf welchem TCP-Port läuft der ${database}-Datenbankserver?
 Dieser TCP-Port wird vom Datenbankserver für entfernte Datenbankverbindungen genutzt.
 .
 Bitte ändern Sie diesen Parameter, wenn der Rechnername nicht »localhost« lautet.
";
$elem["sympa/db_port"]["descriptionfr"]="Port TCP de votre serveur de bases de données ${database} :
 Un port TCP est utilisé par le serveur de bases de données pour les connexions distantes.
 .
 Il est nécessaire de configurer ce paramètre quand le nom de machine est différent de « localhost ».
";
$elem["sympa/db_port"]["default"]="";
$elem["sympa/db_user"]["type"]="string";
$elem["sympa/db_user"]["description"]="What is the user for the database ${dbname}?
 Please specify the user to connect to the database ${dbname}.
";
$elem["sympa/db_user"]["descriptionde"]="Wie lautet der Benutzer für die Datenbank ${dbname}?
 Bitte geben Sie den Benutzer an, der für Verbindungen zur Datenbank ${dbname} eingesetzt wird.
";
$elem["sympa/db_user"]["descriptionfr"]="Identifiant de connexion à la base de données ${dbname} :
 Veuillez indiquer l'identifiant utilisé par sympa pour la connexion à la base de données ${dbname}.
";
$elem["sympa/db_user"]["default"]="sympa";
$elem["sympa/db_passwd"]["type"]="password";
$elem["sympa/db_passwd"]["description"]="Password for the database user ${user}:
 Please supply the password to connect to the database ${dbname} as user ${user}.
";
$elem["sympa/db_passwd"]["descriptionde"]="Kennwort für den Datenbankbenutzer ${user}?
 Bitte geben Sie das Kennwort an, das für Verbindungen zur Datenbank ${dbname} als Benutzer ${user} eingesetzt wird.
";
$elem["sympa/db_passwd"]["descriptionfr"]="Mot de passe de l'identifiant ${user} dans le gestionnaire de bases de données :
 Veuillez indiquer le mot de passe pour la connexion à la base de données ${dbname}.
";
$elem["sympa/db_passwd"]["default"]="";
$elem["sympa/db_passwd_again"]["type"]="password";
$elem["sympa/db_passwd_again"]["description"]="Re-enter user sympa password for verification:
 Please enter the same password again to verify you have typed it
 correctly.
";
$elem["sympa/db_passwd_again"]["descriptionde"]="Kennwort für Benutzer »sympa« zur Kontrolle nochmals eingeben:
 Damit die Eingabe des Kennworts geprüft werden kann, bitte das gleiche Kennwort nochmals eingeben.
";
$elem["sympa/db_passwd_again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez confirmer le mot de passe pour vérifier que vous n'avez pas commis d'erreur en le saisissant.
";
$elem["sympa/db_passwd_again"]["default"]="";
$elem["sympa/db_options"]["type"]="string";
$elem["sympa/db_options"]["description"]="Please enter special options for your database connections.
 Special options are extra configuration parameters that could be required
 by database connections in some cases.
 .
 Example:
 .
   mysql_read_default_file=/home/joe/my.cnf
 .
 You can leave the field blank if the database connections don't need any
 special options.
";
$elem["sympa/db_options"]["descriptionde"]="Bitte besondere Optionen für Ihre Datenbankverbindungen eingeben.
 Besondere Optionen sind zusätzliche Konfigurationsparameter, die in einigen Fällen für die Datenbankverbindungen erforderlich sein können.
 .
 Beispiel:
 .
   mysql_read_default_file=/home/joe/my.cnf
 .
 Ein Eintrag ist nicht erforderlich, falls die Datenbankverbindungen keine besonderen Optionen benötigen.
";
$elem["sympa/db_options"]["descriptionfr"]="Options spéciales de connexion à la base de données :
 Les options spéciales sont des paramètres supplémentaires de configuration qui peuvent être nécessaires à certaines connexions à la base de données.
 .
 Exemple :
 .
   mysql_read_default_file=/home/jean/my.cnf
 .
 Vous pouvez laisser ce champ vide si les connexions à la base de données ne requièrent pas d'options spéciales.
";
$elem["sympa/db_options"]["default"]="";
$elem["sympa/db_configured"]["type"]="boolean";
$elem["sympa/db_configured"]["description"]="Have you already configured your Sympa database?
 If you are upgrading, or have already configured your database for use
 with Sympa for any other reason, you'll want to agree here.
 .
 If you want your database to be automatically created by this setup
 program or if you want to reconfigure you database, please disagree.
 .
 If this is the first time you configure Sympa for using a database, you
 may want to import you old list subscriber files into the database. For
 that purpose, this package includes a script called `load_subscribers.pl',
 which can be found in /usr/share/doc/sympa/examples/script.
";
$elem["sympa/db_configured"]["descriptionde"]="Wurde die Sympa-Datenbank bereits konfiguriert?
 Falls Sie ein Upgrade von Sympa durchführen oder bereits eine Datenbank für Sympa vorbereitet haben, dann sollten Sie hier zustimmen.
 .
 Falls Sie die Datenbank vom Installationsprogramm erstellt haben wollen, oder die bereits bestehende Datenbank verändern wollen, dann sollten Sie hier ablehnen.
 .
 Falls Sie Sympa erstmalig für eine Datenbank konfigurieren, dann können Sie mit dem im Paket enthaltenen Skript »load_subscribers.pl« (im Verzeichnis /usr/share/doc/sympa/examples/script) die bereits vorhanden Abonnenten in die Datenbank einlesen.
";
$elem["sympa/db_configured"]["descriptionfr"]="Avez-vous déjà configuré votre base de données Sympa ?
 Acceptez ici si vous effectuez une mise à jour ou si vous avez déjà configuré votre base de données pour Sympa.
 .
 Refusez si vous voulez que la base de données soit créée automatiquement par ce programme de configuration, ou si vous souhaitez reconfigurer votre base de données.
 .
 Si vous n'avez encore jamais configuré Sympa pour une utilisation avec une base de données, vous souhaiterez peut-être importer votre ancienne liste d'abonnés dans la base. Pour ce faire, ce paquet inclut le script « load_subscribers.pl » que vous trouverez dans /usr/share/doc/sympa/examples/script.
";
$elem["sympa/db_configured"]["default"]="false";
$elem["sympa/db_adminpasswd"]["type"]="password";
$elem["sympa/db_adminpasswd"]["description"]="What is your ${database} database admin password?
 Enter the password for your administrator to access the database account.
 This is most likely not the same password that sympa will use.
 .
 The administrator user for PostgreSQL and MySQL is respectively `postgres'
 and `root'.
";
$elem["sympa/db_adminpasswd"]["descriptionde"]="Wie lautet das Admin-Kennwort für die Datenbank ${database}?
 Bitte geben Sie das Kennwort für den Administrator-Zugriff auf die Datenbank ein. Dies ist meist nicht das selbe Kennwort wie für den Benutzer sympa.
 .
 Der Administrator-Benutzer für PostgreSQL heißt »postgres«, bei MySQL heißt er »root«.
";
$elem["sympa/db_adminpasswd"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données ${database} :
 Veuillez indiquer le mot de passe de l'administrateur permettant de gérer les bases de données. Ce n'est probablement pas le même mot de passe que celui utilisé par l'utilisateur « sympa ».
 .
 L'administrateur de PostgreSQL et MySQL a respectivement pour nom d'utilisateur « postgres » et « root ».
";
$elem["sympa/db_adminpasswd"]["default"]="";
$elem["sympa/db_removeonpurge"]["type"]="boolean";
$elem["sympa/db_removeonpurge"]["description"]="Should the subscriber database be removed?
 Please choose whether you want to remove the Sympa subscriber database.
";
$elem["sympa/db_removeonpurge"]["descriptionde"]="Soll die Abonnementdatenbank entfernt werden?
 Bitte wählen Sie aus, ob Sie die Sympa-Abonnementdatenbank löschen wollen.
";
$elem["sympa/db_removeonpurge"]["descriptionfr"]="Faut-il supprimer la base de données des abonnés ?
 Veuillez choisir si vous voulez supprimer la base de données des abonnés.
";
$elem["sympa/db_removeonpurge"]["default"]="false";
$elem["sympa/use_wwsympa"]["type"]="boolean";
$elem["sympa/use_wwsympa"]["description"]="Do you want WWSympa to be installed?
 WWSympa is a powerful Web interface for both administrating Sympa mailing
 lists and managing user subscriptions.
 .
 This interface does not run without a RDBMS. So, if you did not configure
 Sympa for using a database, you will have to reconfigure Sympa.
";
$elem["sympa/use_wwsympa"]["descriptionde"]="Soll WWSympa installiert werden?
 WWSympa ist eine mächtige WWW-Oberfläche, um Sympa-Mailinglisten zu administrieren und Abonnenten zu verwalten.
 .
 Diese Oberfläche benötigt ein RDBMS (Relationales Datenbank-Verwaltungssystem). Wurde Sympa nicht für die Benutzung einer Datenbank konfiguriert, so müssen Sie Sympa rekonfigurieren.
";
$elem["sympa/use_wwsympa"]["descriptionfr"]="Faut-il installer WWSympa ?
 WWSympa est une puissante interface Web dédiée à l'administration des listes de diffusion et à la gestion des abonnements d'utilisateurs.
 .
 Cette interface ne fonctionne pas sans gestionnaire de bases de données. Si vous n'avez pas spécifié à Sympa d'utiliser une base de données, vous devrez le reconfigurer.
";
$elem["sympa/use_wwsympa"]["default"]="false";
$elem["wwsympa/wwsympa_url"]["type"]="string";
$elem["wwsympa/wwsympa_url"]["description"]="Once installed, you will be able to access WWSympa at the following address
";
$elem["wwsympa/wwsympa_url"]["descriptionde"]="Nach der Installation kann WWSympa unter der folgenden URL aufgerufen werden
";
$elem["wwsympa/wwsympa_url"]["descriptionfr"]="Une fois installé, vous pouvez accéder à WWSympa à l'adresse suivante :
";
$elem["wwsympa/wwsympa_url"]["default"]="";
$elem["sympa/wwsympa_configured"]["type"]="boolean";
$elem["sympa/wwsympa_configured"]["description"]="internal use only

";
$elem["sympa/wwsympa_configured"]["descriptionde"]="";
$elem["sympa/wwsympa_configured"]["descriptionfr"]="";
$elem["sympa/wwsympa_configured"]["default"]="false";
$elem["wwsympa/webserver_type"]["type"]="select";
$elem["wwsympa/webserver_type"]["choices"][1]="Apache 2";
$elem["wwsympa/webserver_type"]["choicesde"][1]="Apache 2";
$elem["wwsympa/webserver_type"]["choicesfr"][1]="Apache 2";
$elem["wwsympa/webserver_type"]["description"]="Which Web Server(s) are you running?
";
$elem["wwsympa/webserver_type"]["descriptionde"]="Welche(n) Webserver betreiben Sie?
";
$elem["wwsympa/webserver_type"]["descriptionfr"]="Type de serveur(s) Web :
";
$elem["wwsympa/webserver_type"]["default"]="Apache 2";
$elem["wwsympa/fastcgi"]["type"]="boolean";
$elem["wwsympa/fastcgi"]["description"]="Do you want WWSympa to run with FastCGI?
 FastCGI is an Apache module that makes WWSympa run much faster. This
 option will be activated only if the `libapache-mod-fastcgi' package is
 installed on your system. Please first make sure you installed this
 package. FastCGI is required for using the Sympa SOAP server.
";
$elem["wwsympa/fastcgi"]["descriptionde"]="Soll WWSympa mit FastCGI ausgeführt werden?
 FastCGI ist ein Apache-Modul, das WWSympa beschleunigt. Diese Option steht nur zur Auswahl, falls das Paket »libapache-mod-fastcgi« installiert ist. Bitte stellen Sie sicher, dass das Paket installiert ist. FastCGI wird für den Sympa-SOAP-Server benötigt.
";
$elem["wwsympa/fastcgi"]["descriptionfr"]="Voulez-vous utiliser WWSympa avec FastCGI ?
 FastCGI est un module Apache qui permet d'exécuter WWSympa plus rapidement. Cette option ne pourra être activée que si le paquet « libapache-mod-fastcgi » est installé sur votre système. Assurez-vous d'abord que vous avez installé ce paquet. FastCGI est indispensable pour utiliser le serveur SOAP Sympa.
";
$elem["wwsympa/fastcgi"]["default"]="false";
$elem["sympa/use_soap"]["type"]="boolean";
$elem["sympa/use_soap"]["description"]="Do you want the sympa SOAP server to be used?
 Sympa SOAP server allows to access a Sympa service from within another
 program, written in any programming language and on any computer. The SOAP
 server provides a limited set of high level functions including login,
 which, lists, subscribe, signoff.
 .
 The SOAP server uses libsoap-lite-perl package and a webserver like apache.
";
$elem["sympa/use_soap"]["descriptionde"]="Soll der Sympa-SOAP-Server verwendet werden?
 Der Sympa-SOAP-Server erlaubt den Zugriff auf Sympa-Dienste von innerhalb anderer Programme, die in jeder Programmiersprache geschrieben sein können und auf jedem Computer laufen können. Der SOAP-Server stellt eine begrenzte Anzahl von abstrakten Funktionen bereit, darunter login, which, lists, subscribe, signoff.
 .
 Der SOAP-Server verwendet das libsoap-lite-perl-Paket und einen Webserver wie Apache.
";
$elem["sympa/use_soap"]["descriptionfr"]="Voulez-vous utiliser le serveur SOAP Sympa ?
 Le serveur SOAP Sympa permet l'accès au service Sympa depuis un autre programme, quel que soit le langage dans lequel il est écrit et la plateforme sur laquelle il est utilisé. Ce serveur offre un ensemble limité de fonctions de haut niveau, notamment les commandes login, which, lists, subscribe et signoff.
 .
 Le serveur SOAP utilise le paquet libsoap-lite-perl et un serveur web comme Apache.
";
$elem["sympa/use_soap"]["default"]="false";
$elem["wwsympa/webserver_restart"]["type"]="boolean";
$elem["wwsympa/webserver_restart"]["description"]="Do you want the Web server to be restarted after installation?
 If you don't want the webserver to be restarted, please make sure that wwsympa
 and the Sympa SOAP server are not running or the database may contain duplicates.
";
$elem["wwsympa/webserver_restart"]["descriptionde"]="Soll der Webserver nach der Installation neu gestartet werden?
 Falls Sie nicht möchten, dass der Webserver neu gestartet wird, stellen Sie sicher, dass Wwsympa und der Sympa-SOAP-Server nicht laufen, ansonsten könnte die Datenbank Dubletten enthalten.
";
$elem["wwsympa/webserver_restart"]["descriptionfr"]="Voulez-vous redémarrer le serveur Web après l'installation ?
 Si vous ne souhaitez pas que le serveur web soit redémarré, veuillez contrôler que wwsympa et le serveur SOAP ne sont pas actifs, sinon la base de données risque de contenir des doublons.
";
$elem["wwsympa/webserver_restart"]["default"]="true";
$elem["wwsympa/remove_spool"]["type"]="boolean";
$elem["wwsympa/remove_spool"]["description"]="Should the web archives and the bounce directory be removed?
 If you used the default configuration, WWSympa web archives are located in
 /var/lib/sympa/wwsarchive. The WWSympa bounce directory contains bounces
 (non-delivery reports) and is set to /var/spool/sympa/wwsbounce by
 default.
 .
 Please choose whether you want to remove the web archives and the bounce
 directory.
";
$elem["wwsympa/remove_spool"]["descriptionde"]="Sollen die Webarchive und das Bounce-Verzeichnis gelöscht werden?
 WWSympa Webarchive befinden sich in der Standardkonfiguration im Verzeichnis /var/lib/sympa/wwwsarchive. Das Bounceverzeichnis befindet sich in /var/spool/sympa/wwsbounce und enthält Berichte über nicht-erfolgte Zustellungen.
 .
 Wählen Sie aus, ob Sie die WWW-Archive und das Verzeichnis für Bounces entfernt haben möchten.
";
$elem["wwsympa/remove_spool"]["descriptionfr"]="Supprimer les archives web et le répertoire de rejets lors de la purge de sympa ?
 Si vous utilisez la configuration par défaut, les archives web de WWSympa se trouvent dans le répertoire /var/lib/sympa/wwsarchive. Le sous-répertoire de rejets (« bounce ») de WWSympa contient quant à lui les comptes-rendus de courriers non délivrés (« bounces »). Son emplacement par défaut est /var/spool/sympa/wwsbounce.
 .
 Veuillez choisir si vous souhaitez supprimer les archives web et le sous-répertoire de rejets au moment de l'exécution de « dpkg --purge sympa ».
";
$elem["wwsympa/remove_spool"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
