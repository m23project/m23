<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("b2evolution");

$elem["b2evolution/db_ask"]["type"]="boolean";
$elem["b2evolution/db_ask"]["description"]="Create the database automatically?
 To function, b2evolution needs a correctly configured and initialized database.
 .
 For a MySQL database, this operation can be performed automatically, if the MySQL server is currently running. You will only be prompted for the database name. 
 .
 Automatically creating the database does not make sense if a b2evolution database already exists, or if no database server is currently accessible.
 .
 If you choose to create the database manually, you need to edit /etc/b2evolution/_basic_config.php and set the database-related variables to the appropriate values.
 .
 If you're unsure, you should let the package create its database automatically.
";
$elem["b2evolution/db_ask"]["descriptionde"]="Soll die Datenbank automatisch erstellt werden?
 Um zu funktionieren, benöigt b2evolution eine korrekt konfigurierte und initialisierte Datenbank.
 .
 Für eine MySQL-Datenbank kann diese Operation automatisch ausgeführt werden, falls der MySQL-Server momentan läuft. Es wird nur nach dem Namen der Datenbank gefragt.
 .
 Es ist nicht sinnvoll, die Datenbank automatisch zu erstellen, falls bereits eine b2evolution-Datenbank existiert, oder falls momentan kein Datenbank-Serverzugänglich ist.
 .
 Falls die Datenbank manuell erstellt wird, muss die Datei /etc/b2evolution/_basic_config.php editiert und die datenbank-bezogenen Werte in der Datei auf passende Werte gesetzt werden.
 .
 Falls Sie unsicher sind, sollten Sie die automatische Erstellung der Datenbank wählen.
";
$elem["b2evolution/db_ask"]["descriptionfr"]="Faut-il créer automatiquement la base de données ?
 Pour son fonctionnement, b2evolution a besoin d'une base de données configurée et correctement initialisée.
 .
 Cette opération peut être effectuée automatiquement pour une base de données MySQL, à condition qu'un serveur MySQL soit actuellement actif. Seul le nom de la base de données sera demandé.
 .
 Il est inutile de créer automatiquement la base de données si une base de données pour b2evolution existe déjà ou si aucun serveur de base de données n'est accessible.
 .
 Si vous décidez de créer la base de données vous-même, vous devrez modifier le fichier /etc/b2evolution/_basic_config.php et changer les variables relatives à la base de données.
 .
 Dans le doute, vous devriez choisir une création automatique de la base de données.
";
$elem["b2evolution/db_ask"]["default"]="true";
$elem["b2evolution/db_name"]["type"]="string";
$elem["b2evolution/db_name"]["description"]="b2evolution database name:
 All the tables used by b2evolution will be created in a new database. Please enter a name that does not correspond to an existing database.
";
$elem["b2evolution/db_name"]["descriptionde"]="Name der b2evolution-Datenbank:
 Alle Tabellen, die von b2evolution benutzt werden, werden in eine neue Datenbank installiert. Bitte einen Namen eingeben, der nicht zu einer bereits existierenden Datenbank gehört.
";
$elem["b2evolution/db_name"]["descriptionfr"]="Nom de la base de données b2evolution :
 Toutes les tables relatives à b2evolution seront créées dans une nouvelle base de données. Veuillez choisir le nom de cette base. Il ne doit pas être identique à celui d'une base de données déjà existante.
";
$elem["b2evolution/db_name"]["default"]="b2evolution_debian";
$elem["b2evolution/host"]["type"]="string";
$elem["b2evolution/host"]["description"]="b2evolution blog URL:
 To test b2evolution locally, use 'http://localhost' instead of the hostname.
";
$elem["b2evolution/host"]["descriptionde"]="b2evolution blog URL:
 Um b2evolution lokal auszuprobieren, bitte 'http://localhost' anstelle des Hostnamens eingeben.
";
$elem["b2evolution/host"]["descriptionfr"]="URL du blog b2evolution :
 Pour tester b2evolution localement, n'entrez pas le nom de la machine mais plutôt « http://localhost ».
";
$elem["b2evolution/host"]["default"]="http://www.example.tld/b2evolution";
$elem["b2evolution/db_remove"]["type"]="boolean";
$elem["b2evolution/db_remove"]["description"]="Purge the b2evolution database?
 If the b2evolution database (${b2evo_db_name}) is no longer needed, it can be purged automatically. The database user and tables used by b2evolution will be removed.
";
$elem["b2evolution/db_remove"]["descriptionde"]="Soll die b2evolution-Datenbank vollständig entfernt werden?
 Falls die b2evolution-Datenbank (${b2evo_db_name}) nicht mehr benötigt wird, kann sie auf Wunsch automatisch vollständig entfernt werden. Der Datenbank-Benutzer und Tabellen, die b2evolution benutzt, werden gelöscht werden.
";
$elem["b2evolution/db_remove"]["descriptionfr"]="Faut-il purger la base de données de b2evolution ?
 Si vous ne souhaitez pas conserver la base de données de b2evolution (${b2evo_db_name}), elle peut être purgée automatiquement. L'identifiant de connexion et les tables de b2evolution seront supprimés.
";
$elem["b2evolution/db_remove"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
