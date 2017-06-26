<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mariadb-server-10.0");

$elem["mariadb-server-10.0/really_downgrade"]["type"]="boolean";
$elem["mariadb-server-10.0/really_downgrade"]["description"]="Really proceed with downgrade?
 A file named /var/lib/mysql/debian-*.flag exists on this system.
 .
 Such a file is an indication that a mariadb-server package with a higher
 version has been installed previously.
 .
 There is no guarantee that the version you're currently installing
 will be able to use the current databases.
";
$elem["mariadb-server-10.0/really_downgrade"]["descriptionde"]="Möchten Sie wirklich eine ältere Version einspielen?
 Auf diesem System existiert eine Datei mit dem Namen /var/lib/mysql/debian-*.flag.
 .
 Diese Datei ist ein Hinweis darauf, dass früher ein MariaDB-Server-Paket mit einer höheren Version installiert wurde.
 .
 Es kann nicht garantiert werden, dass die gegenwärtig zu installierende Version dessen Datenbanken benutzen kann.
";
$elem["mariadb-server-10.0/really_downgrade"]["descriptionfr"]="Faut-il vraiment revenir à la version précédente ?
 Un fichier /var/lib/mysql/debian-*.flag est présent sur ce système.
 .
 Cela indique qu'une version plus récente du paquet mariadb-server a été précédemment installée.
 .
 Il n'est pas garanti que cette version puisse en utiliser les bases de données.
";
$elem["mariadb-server-10.0/really_downgrade"]["default"]="false";
$elem["mariadb-server-10.0/nis_warning"]["type"]="note";
$elem["mariadb-server-10.0/nis_warning"]["description"]="Important note for NIS/YP users
 Using MariaDB under NIS/YP requires a mysql user account to be added on
 the local system with:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 You should also check the permissions and ownership of the
 /var/lib/mysql directory:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mariadb-server-10.0/nis_warning"]["descriptionde"]="Wichtige Anmerkung für NIS/YP-Benutzer!
 Falls MariaDB mit NIS/YP genutzt wird, muss ein »mysql«-Benutzerkonto auf dem lokalen System hinzugefügt werden mit:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Sie sollten außerdem Besitzer und Zugriffsrechte des Verzeichnisses /var/lib/mysql überprüfen:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mariadb-server-10.0/nis_warning"]["descriptionfr"]="Note importante pour les utilisateurs NIS/YP
 L'utilisation de MariaDB avec NIS/YP impose l'ajout d'un compte local « mysql » avec la commande :
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Vous devez également vérifier le propriétaire et les permissions du répertoire /var/lib/mysql :
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mariadb-server-10.0/nis_warning"]["default"]="";
$elem["mariadb-server-10.0/postrm_remove_databases"]["type"]="boolean";
$elem["mariadb-server-10.0/postrm_remove_databases"]["description"]="Remove all MariaDB databases?
 The /var/lib/mysql directory which contains the MariaDB databases is about
 to be removed.
 .
 If you're removing the MariaDB package in order to later install a more
 recent version or if a different mariadb-server package is already
 using it, the data should be kept.
";
$elem["mariadb-server-10.0/postrm_remove_databases"]["descriptionde"]="Alle MariaDB-Datenbanken entfernen?
 Das Verzeichnis /var/lib/mysql mit den MariaDB-Datenbanken soll entfernt werden.
 .
 Falls geplant ist, das MariaDB-Paket zu entfernen, um lediglich eine höhere Version zu installieren oder ein anderes mariadb-server-Paket die Daten benutzt, sollten diese beibehalten werden.
";
$elem["mariadb-server-10.0/postrm_remove_databases"]["descriptionfr"]="Faut-il supprimer toutes les bases de données MariaDB ?
 Le répertoire /var/lib/mysql qui contient les bases de données de MariaDB va être supprimé.
 .
 Si vous retirez le paquet MariaDB en vue d'en installer une version plus récente ou si un autre paquet mariadb-server les utilise déjà, vous devriez les conserver.
";
$elem["mariadb-server-10.0/postrm_remove_databases"]["default"]="false";
$elem["mariadb-server/oneway_migration"]["type"]="boolean";
$elem["mariadb-server/oneway_migration"]["description"]="Really migrate to MariaDB?
 MariaDB is a drop-in replacement for MySQL. It will use your current
 configuration file (my.cnf) and current databases.
 .
 Note that MariaDB has some enhanced features, which do not exist in MySQL
 and thus migration back to MySQL might not always work, at least not as
 automatically as migrating from MySQL to MariaDB.
";
$elem["mariadb-server/oneway_migration"]["descriptionde"]="Möchten Sie wirklich auf MariaDB migrieren?
 MariaDB ist ein einspielbarer Ersatz für MySQL. Es wird Ihre aktuelle Konfigurationsdatei (my.cnf) und Ihre aktuellen Datenbanken verwenden.
 .
 Beachten Sie, dass MariaDB über einige erweiterte Funktionalitäten verfügt, die es in MySQL nicht gibt. Eine Rückmigration klappt daher nicht immer, zumindest nicht automatisch wie das Migrieren von MySQL auf MariaDB.
";
$elem["mariadb-server/oneway_migration"]["descriptionfr"]="Souhaitez-vous migrer vers MariaDB ?
 MariaDB remplace à l'identique MySQL. Le fichier de configuration actuel (my.cnf) ainsi que les bases de données existantes seront utilisés.
 .
 Veuillez noter que MariaDB fournit des fonctionnalités améliorées qui n'existent pas dans MySQL ce qui peut interdire un retour ultérieur à MySQL, tout au moins de manière moins automatique que la migration de MySQL vers MariaDB.
";
$elem["mariadb-server/oneway_migration"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
