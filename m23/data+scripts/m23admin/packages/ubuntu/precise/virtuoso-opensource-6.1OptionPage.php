<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("virtuoso-opensource-6.1");

$elem["virtuoso-opensource-6.1/dba-password"]["type"]="password";
$elem["virtuoso-opensource-6.1/dba-password"]["description"]="Password for DBA and DAV users:
 Following installation, users and passwords in Virtuoso can be managed
 using the command line tools (see the full documentation) or via
 the Conductor web application which is installed by default at
 http://localhost:8890/conductor.
 .
 Two users (\"dba\" and \"dav\") are created by default, with administrative
 access to Virtuoso. Secure passwords must be chosen for these users
 in order to complete the installation.
 .
 If you leave this blank, the daemon will be disabled
 unless a non-default password already exists.
";
$elem["virtuoso-opensource-6.1/dba-password"]["descriptionde"]="Passwort für die Benutzerkonten DBA und DAV:
 Nach der Installation können Benutzerkonten und Passwörter für Virtuoso mit den Kommandozeilenwerkzeugen (siehe die vollständige Dokumentation) oder mit der Web-Anwendung Conductor verwaltet werden. Conductor wird per Voreinstellung unter http://localhost:8890/conductor installiert.
 .
 Standardmäßig werden zwei Benutzer (»dba« und »dav«) erzeugt, die zur Verwaltung von Virtuoso berechtigt sind. Sie müssen für diese Benutzer sichere Passwörter festlegen, um die Installation abzuschließen.
 .
 Wenn Sie hier nichts eingeben, wird der Daemon deaktiviert. Es sei denn, es existiert schon ein von der Vorgabe abweichendes Passwort.
";
$elem["virtuoso-opensource-6.1/dba-password"]["descriptionfr"]="Mot de passe pour les utilisateurs DBA et DAV :
 Après l'installation, les utilisateurs et mots de passe de Virtuoso peuvent être gérés à l'aide des outils en ligne de commande (voir la documentation complète) ou de l'application web Conductor installée par défaut à l'adresse http://localhost:8890/conductor.
 .
 Deux identifiants (« dba » et « dav ») sont créés par défaut, avec droits d'administration pour Virtuoso. Des mots de passe sûrs doivent être choisis pour ces utilisateurs afin de terminer l'installation.
 .
 Si vous laissez ce champ vide, le démon sera désactivé à moins que le mot de passe par défaut n'ait déjà été modifié.
";
$elem["virtuoso-opensource-6.1/dba-password"]["default"]="";
$elem["virtuoso-opensource-6.1/dba-password-again"]["type"]="password";
$elem["virtuoso-opensource-6.1/dba-password-again"]["description"]="Administrative users password confirmation:
";
$elem["virtuoso-opensource-6.1/dba-password-again"]["descriptionde"]="Bestätigung des Passworts für den Benutzer mit Administrator-Rechten:
";
$elem["virtuoso-opensource-6.1/dba-password-again"]["descriptionfr"]="Confirmation du mot de passe des administrateurs :
";
$elem["virtuoso-opensource-6.1/dba-password-again"]["default"]="";
$elem["virtuoso-opensource-6.1/password-mismatch"]["type"]="error";
$elem["virtuoso-opensource-6.1/password-mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please enter a
 password again.
";
$elem["virtuoso-opensource-6.1/password-mismatch"]["descriptionde"]="Die Passwörter stimmen nicht überein
 Die von Ihnen eingegebenen Passwörter waren unterschiedlich. Bitte geben Sie noch einmal ein Passwort ein.
";
$elem["virtuoso-opensource-6.1/password-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe indiqués ne correspondent pas. Veuillez choisir à nouveau un mot de passe.
";
$elem["virtuoso-opensource-6.1/password-mismatch"]["default"]="";
$elem["virtuoso-opensource-6.1/note-disabled"]["type"]="note";
$elem["virtuoso-opensource-6.1/note-disabled"]["description"]="No initial password set, daemon disabled
 For security reasons, the default Virtuoso instance is disabled because
 no administration password was provided.
 .
 You can enable the daemon manually by setting RUN to \"yes\" in
 /etc/default/virtuoso-opensource-6.1. The default DBA user
 password will then be \"dba\".
";
$elem["virtuoso-opensource-6.1/note-disabled"]["descriptionde"]="Es wurde kein anfängliches Passwort festgesetzt, Daemon deaktiviert.
 Aus Sicherheitsgründen wurde die Standard-Instanz von Virtuoso deaktiviert, weil kein Verwaltungs-Passwort eingegeben wurde.
 .
 Sie können den Daemon manuell aktivieren, indem Sie in der Datei /etc/default/virtuoso-opensource-6.1 RUN auf »yes« setzen. Für den Standard-Benutzer DBA ist das Passwort dann »dba«.
";
$elem["virtuoso-opensource-6.1/note-disabled"]["descriptionfr"]="Aucun mot de passe défini, démon désactivé
 Par sécurité, le processus Virtuoso par défaut est désactivé car aucun mot de passe d'administration n'a été fourni.
 .
 Vous pouvez activer le démon manuellement en configurant la variable RUN à « yes » dans /etc/default/virtuoso-opensource-6.1. Le mot de passe de l'utilisateur DBA sera alors « dba ».
";
$elem["virtuoso-opensource-6.1/note-disabled"]["default"]="";
$elem["virtuoso-opensource-6.1/error-setting-password"]["type"]="error";
$elem["virtuoso-opensource-6.1/error-setting-password"]["description"]="Unable to set password for the Virtuoso DBA user
 An error occurred while setting the password for the Virtuoso
 administrative user. This may have happened because the account
 already has a password, or because of a communication problem with
 the Virtuoso server.
 .
 If the database already existed then it will have retained the original
 password. If there was some other problem then the default password
 (\"dba\") is used.
 .
 It is recommended to check the passwords for the users \"dba\" and \"dav\"
 immediately after installation. 
";
$elem["virtuoso-opensource-6.1/error-setting-password"]["descriptionde"]="Festlegung eines Passworts für das Virtuoso-Konto DBA nicht möglich.
 Beim Setzen des Passworts für den Virtuoso-Verwalter ereignete sich ein Fehler. Mögliche Gründe sind ein bereits bestehendes Passwort für das Konto oder ein Kommunikationsproblem mit dem Virtuoso-Server.
 .
 Bei bereits bestehender Datenbank bleibt das Original-Passwort erhalten. Bei Vorliegen eines anderen Problems wird das Standard-Passwort (»dba«) verwendet.
 .
 Es wird empfohlen, die Passwörter für die Konten »dba« und »dav« sofort nach der Installation zu überprüfen.
";
$elem["virtuoso-opensource-6.1/error-setting-password"]["descriptionfr"]="Impossible de définir le mot de passe de l'utilisateur DBA
 Une erreur s'est produite lors de la configuration du mot de passe d'administration de Virtuoso. Cela a pu se produire car le mot de passe était déjà défini pour ce compte, ou à cause d'un problème de communication avec le server Virtuoso.
 .
 Si la base de données existait déjà, le mot de passe d'origine aura été conservé. Si un autre problème s'est produit, le mot de passe par défaut (« dba ») est utilisé.
 .
 Il est recommandé de vérifier les mots de passe des utilisateurs « dba » et « dav » immédiatement après l'installation.
";
$elem["virtuoso-opensource-6.1/error-setting-password"]["default"]="";
$elem["virtuoso-opensource-6.1/check-remove-databases"]["type"]="boolean";
$elem["virtuoso-opensource-6.1/check-remove-databases"]["description"]="Remove all Virtuoso databases?
 The /var/lib/virtuoso-opensource-6.1 directory which contains the Virtuoso
 databases is about to be removed.
 .
 If you're removing the Virtuoso package in order to later install a more
 recent version, or if a different Virtuoso package is already using it,
 you can choose to keep databases.
";
$elem["virtuoso-opensource-6.1/check-remove-databases"]["descriptionde"]="Entfernen aller Virtuoso-Datenbanken?
 Das Verzeichnis /var/lib/virtuoso-opensource-6.1 für die Speicherung der Virtuoso-Datenbanken steht davor, gelöscht zu werden.
 .
 Wenn Sie das Virtuoso-Paket entfernen, um später eine neuere Version zu installieren oder wenn ein anderes Virtuoso-Paket schon auf die Datenbanken zugreift, können Sie festlegen, die Datenbanken beizubehalten.
";
$elem["virtuoso-opensource-6.1/check-remove-databases"]["descriptionfr"]="Supprimer toutes les bases de données de Virtuoso ?
 Le répertoire /var/lib/virtuoso-opensource-6.1 contenant les bases de données de Virtuoso va être supprimé.
 .
 Si vous supprimez le paquet Virtuoso afin d'installer ensuite une version plus récente, ou si un autre paquet Virtuoso l'utilise déjà, vous pouvez choisir de conserver les bases de données.
";
$elem["virtuoso-opensource-6.1/check-remove-databases"]["default"]="false";
$elem["virtuoso-opensource-6.1/http-server-port"]["type"]="string";
$elem["virtuoso-opensource-6.1/http-server-port"]["description"]="HTTP server port:
 Virtuoso provides a web server capable of hosting HTML and VSP pages
 (with optional support for other languages). If you are installing this
 instance as a public web server directly on the Internet, you probably want
 to choose 80 as web server port.
 .
 Please note that the default web server root directory is
 /var/lib/virtuoso-opensource-6.1/vsp and will be empty unless you also
 install the package containing the standard Virtuoso start page.
";
$elem["virtuoso-opensource-6.1/http-server-port"]["descriptionde"]="Port des HTTP-Servers:
 Virtuoso enthält einen Web-Server, der HTML- und VSP-Seiten (mit optionaler Unterstützung für andere Sprachen) ausliefern kann. Wenn Sie diese Instanz als öffentlichen Web-Server mit direktem Zugriff aus dem Internet installieren, werden Sie wahrscheinlich für den Server den Port 80 wählen.
 .
 Bitte beachten Sie, dass das Standard-Wurzelverzeichnis /var/lib/virtuoso-opensource-6.1/vsp für Web-Server leer sein wird, wenn Sie nicht auch das Paket mit der Standard-Startseite von Virtuoso installieren.
";
$elem["virtuoso-opensource-6.1/http-server-port"]["descriptionfr"]="Port du serveur HTTP :
 Virtuoso fournit un serveur web capable d'héberger des pages HTML et VSP (avec prise en charge optionnelle d'autres langues). Si vous installez ce processus en tant que serveur web accessible sur Internet, 80 est un bon choix pour le port du serveur web.
 .
 Veuillez noter que le répertoire racine du serveur web est /var/lib/virtuoso-opensource-6.1/vsp et qu'il sera vide, à moins d'installer également le paquet contenant la page de démarrage par défaut de Virtuoso.
";
$elem["virtuoso-opensource-6.1/http-server-port"]["default"]="8890";
$elem["virtuoso-opensource-6.1/db-server-port"]["type"]="string";
$elem["virtuoso-opensource-6.1/db-server-port"]["description"]="Database server port:
 You may change here the port on which the Virtuoso database server will
 listen for connections.
 .
 Modifying this default value can improve security on servers that
 might be targets for unauthorized intrusion.         
";
$elem["virtuoso-opensource-6.1/db-server-port"]["descriptionde"]="Port für den Datenbank-Server:
 Hier können Sie den Port festlegen, den der Virtuoso-Datenbankserver für Verbindungen verwendet.
 .
 Die Änderung dieser Voreinstellung kann die Sicherheit auf Einbruchsversuchen ausgesetzten Servern verbessern.
";
$elem["virtuoso-opensource-6.1/db-server-port"]["descriptionfr"]="Port du serveur de base de données :
 Vous pouvez modifier le port sur lequel le serveur de base de données de Virtuoso sera en attente de connexion.
 .
 La modification de cette valeur par défaut peut améliorer la sécurité pour des serveurs exposés à des tentatives d'intrusion.
";
$elem["virtuoso-opensource-6.1/db-server-port"]["default"]="1111";
$elem["virtuoso-opensource-6.1/register-odbc-dsn"]["type"]="boolean";
$elem["virtuoso-opensource-6.1/register-odbc-dsn"]["description"]="Register an ODBC system DSN for Virtuoso?
 An ODBC manager (unixodbc or iODBC) is already installed on this system,
 and the Virtuoso ODBC driver is installed.
 .
 The default Virtuoso instance can be automatically added to the list of
 available System Data Sources (and automatically deleted from the list
 when this package is removed).
 .
 If you choose this option, the DSN will be named \"VOS\". User and
 password details are omitted from the DSN for security reasons.
";
$elem["virtuoso-opensource-6.1/register-odbc-dsn"]["descriptionde"]="Registrieren eines systemweiten ODBC-Datenquellen-Namens (ODBC System DSN, Data Source Name) für Virtuoso?
 Auf dem System ist schon eine ODBC-Verwaltung (unixodbc oder IODBC) installiert und der ODBC-Treiber von Virtuoso wird installiert.
 .
 Die Standard-Instanz von Virtuoso kann automatisch in die Liste verfügbarer System-Datenquellen eingetragen (und automatisch beim Löschen des Pakets aus der Liste entfernt) werden.
 .
 Wenn Sie diese Option wählen, wird der DSN »VOS« verwendet. Benutzer und Einzelheiten des Passworts werden aus Sicherheitsgründen nicht zusammen mit dem DSN gespeichert.
";
$elem["virtuoso-opensource-6.1/register-odbc-dsn"]["descriptionfr"]="Enregistrer une source de données (DSN) de type ODBC pour Virtuoso ?
 Une application ODBC (unixODBC ou iODBC) est déjà installée sur ce système, et le pilote ODBC Virtuoso est installé.
 .
 Le processus Virtuoso par défaut peut être automatiquement ajouté à la liste des sources de données système (et automatiquement effacé de la liste quand le paquet sera supprimé).
 .
 Si vous choisissez cette option, la source de données sera appelée « VOS ». Les identifiants et mots de passe de connexion ne seront pas enregistrés avec la source de données, par sécurité.
";
$elem["virtuoso-opensource-6.1/register-odbc-dsn"]["default"]="false";
$elem["virtuoso-opensource/primary-server"]["type"]="select";
$elem["virtuoso-opensource/primary-server"]["description"]="Default Virtuoso server package:
 Please choose the version of virtuoso-server that will be linked to by the
 default (unversioned) names, for init scripts and client tools.
";
$elem["virtuoso-opensource/primary-server"]["descriptionde"]="Standard-Virtuoso-Serverpaket:
 Bitte wählen Sie die Standard-Version des Virtuoso-Servers, auf die der symbolische Verweis (link) ohne Versionsnummer für den Gebrauch durch Init-Skripte und Client-Werkzeuge zeigt.
";
$elem["virtuoso-opensource/primary-server"]["descriptionfr"]="Paquet du serveur Virtuoso par défaut :
 Veuillez choisir la version de virtuoso-server qui sera utilisée par défaut pour les scripts d'initialisation du système et les outils client.
";
$elem["virtuoso-opensource/primary-server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
