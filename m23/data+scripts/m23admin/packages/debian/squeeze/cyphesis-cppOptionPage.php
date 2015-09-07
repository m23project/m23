<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cyphesis-cpp");

$elem["cyphesis-cpp/postgresql/note"]["type"]="note";
$elem["cyphesis-cpp/postgresql/note"]["description"]="Configuration note
 In order to use cyphesis-cpp you must have access to a postgresql server.
 The server does not have to be installed on the same host as cyphesis-cpp
 but it has to be reachable over a network and you have to have access to it.
 .
 For further configuration information please read
 /usr/share/doc/cyphesis-cpp/README.Debian.
";
$elem["cyphesis-cpp/postgresql/note"]["descriptionde"]="Konfigurationsnotiz
 Um cyphesis-cpp benutzen zu können, müssen Sie Zugriff auf einen PostgreSQL server haben. Dieser Server muss nicht auf dem selben Rechner wie cyphesis-cpp installiert sein, er muss nur über das Netzwerk erreichbar sein and Sie müssen Zugriffsrechte auf ihm besitzen.
 .
 Für weitere Informationen lesen Sie bitte die Datei /usr/share/doc/cyphesis-cpp/README.Debian.
";
$elem["cyphesis-cpp/postgresql/note"]["descriptionfr"]="Note de configuration
 Pour pouvoir utiliser cyphesis-cpp, vous devez pouvoir accéder à un serveur PostgreSQL. Le serveur ne doit pas nécessairement fonctionner sur le même hôte que cyphesis-cpp, mais doit pouvoir être accessible via le réseau. Vous devez être autorisé à y accéder.
 .
 Veuillez consulter le fichier /usr/share/doc/cyphesis-cpp/README.Debian pour obtenir plus d'informations à propos de la configuration.
";
$elem["cyphesis-cpp/postgresql/note"]["default"]="";
$elem["cyphesis-cpp/postgresql/local_server"]["type"]="boolean";
$elem["cyphesis-cpp/postgresql/local_server"]["description"]="Use a local postgresql server?
 Cyphesis-cpp can use a local postgresql server over unix sockets instead
 over a network. The database server doesn't need to listen to the network then.
 This is recommended for local usage as it's thought to be more secure.
";
$elem["cyphesis-cpp/postgresql/local_server"]["descriptionde"]="Lokalen postgresql Server benutzen ?
 Cyphesis-cpp kann auf einen lokalen postgresql Server über UNIX Sockets zugreifen. Der Datenbankserver brauch nicht am Netzwerk zu hören. Dies ist für lokale Benutzung empfohlen, weil es als sicherer angesehen wird.
";
$elem["cyphesis-cpp/postgresql/local_server"]["descriptionfr"]="Faut-il utiliser un serveur PostgreSQL local ?
 Cyphesis-cpp peut utiliser un serveur PostgreSQL local par l'intermédiaire de sockets Unix plutôt que via le réseau. Le serveur de bases de données ne doit alors pas nécessairement être à l'écoute sur le réseau. Ce mode de fonctionnement est recommandé pour une utilisation locale car il est reconnu comme plus sûr.
";
$elem["cyphesis-cpp/postgresql/local_server"]["default"]="true";
$elem["cyphesis-cpp/postgresql/server"]["type"]="string";
$elem["cyphesis-cpp/postgresql/server"]["description"]="Database server:
 On which host is the postgresql database server located, which will be
 used by cyphesis-cpp to store its internal data?
";
$elem["cyphesis-cpp/postgresql/server"]["descriptionde"]="Datenbankserver:
 Auf welchem Rechner läuft der Postgresql Datenbankserver, der von cyphesis-cpp benutzt werden soll um die Spieldaten zu speichern ?
";
$elem["cyphesis-cpp/postgresql/server"]["descriptionfr"]="Serveur de bases de données :
 Veuillez indiquer l'hôte du serveur de bases de données PostgreSQL où seront conservées les données internes de cyphesis-cpp.
";
$elem["cyphesis-cpp/postgresql/server"]["default"]="localhost";
$elem["cyphesis-cpp/postgresql/database"]["type"]="string";
$elem["cyphesis-cpp/postgresql/database"]["description"]="Database name:
 What is the database name cyphesis-cpp should use on the database server?
";
$elem["cyphesis-cpp/postgresql/database"]["descriptionde"]="Datenbankname:
 Wie lautet der Name der Datenbank für cyphesis-cpp auf dem Server ?
";
$elem["cyphesis-cpp/postgresql/database"]["descriptionfr"]="Nom de la base de données :
 Veuillez indiquer le nom de la base de données où cyphesis-cpp conservera ses informations.
";
$elem["cyphesis-cpp/postgresql/database"]["default"]="cyphesis";
$elem["cyphesis-cpp/postgresql/username"]["type"]="string";
$elem["cyphesis-cpp/postgresql/username"]["description"]="Database user:
 Please type in the username for the database server
";
$elem["cyphesis-cpp/postgresql/username"]["descriptionde"]="Datenbankbenutzer:
 Der Name des Benutzers für den Datenbankzugriff
";
$elem["cyphesis-cpp/postgresql/username"]["descriptionfr"]="Propriétaire de la base de données :
 Veuillez indiquer le nom du propriétaire de la base de données de cyphesis-cpp.
";
$elem["cyphesis-cpp/postgresql/username"]["default"]="cyphesis";
$elem["cyphesis-cpp/postgresql/password"]["type"]="password";
$elem["cyphesis-cpp/postgresql/password"]["description"]="Password:
 Please type in the password to use to access the database server
";
$elem["cyphesis-cpp/postgresql/password"]["descriptionde"]="Passwort:
 Passwort des Benutzers für den Datenbankzugriff
";
$elem["cyphesis-cpp/postgresql/password"]["descriptionfr"]="Mot de passe du propriétaire de la base de données :
 Veuillez indiquez le mot de passe de l'utilisateur propriétaire de le base de données.
";
$elem["cyphesis-cpp/postgresql/password"]["default"]="";
$elem["cyphesis-cpp/usemetaserver"]["type"]="boolean";
$elem["cyphesis-cpp/usemetaserver"]["description"]="Use a metaserver?
 Cyphesis-cpp can use the metaserver of the WorldForge project to announce
 itself to the world. Players will detect your server automatically when
 starting their client.
";
$elem["cyphesis-cpp/usemetaserver"]["descriptionde"]="Metaserver benutzen ?
 Cyphesis-cpp kann sich beim Metaserver des Worldforge-Projektes anmelden, um sich der Welt bekannt zu machen. Spieler werden dann Ihren Server automatisch entdecken, wenn sie ihren Client starten.
";
$elem["cyphesis-cpp/usemetaserver"]["descriptionfr"]="Faut-il utiliser un meta-serveur ?
 Cyphesis-cpp peut utiliser le meta-serveur du projet Worldforge pour s'annoncer publiquement. Les joueurs détecteront automatiquement votre serveur lors du démarrage de leur client.
";
$elem["cyphesis-cpp/usemetaserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
