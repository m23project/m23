<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mariadb-server-10.1");

$elem["mariadb-server-10.1/old_data_directory_saved"]["type"]="note";
$elem["mariadb-server-10.1/old_data_directory_saved"]["description"]="The old data directory will be saved at new location
 A file named /var/lib/mysql/debian-*.flag exists on this system.
 The number indicates a database binary format version that cannot automatically
 be upgraded (or downgraded).
 .
 Therefore the previous data directory will be renamed to /var/lib/mysql-* and
 a new data directory will be initialized at /var/lib/mysql.
 .
 Please manually export/import your data (e.g. with mysqldump) if needed.
";
$elem["mariadb-server-10.1/old_data_directory_saved"]["descriptionde"]="Das alte Datenverzeichnis wird an einer neuen Stelle gespeichert
 Auf diesem System gibt es bereits eine Datei namens /var/lib/mysql/debian-*.flag. Die Zahl gibt eine Binärformatversion der Datenbank an, von der nicht automatisch ein Upgrade (oder Downgrade) durchgeführt werden kann.
 .
 Daher wird das vorherige Datenverzeichnis in /var/lib/mysql-* umbenannt und unter /var/lib/mysql wird ein neues Datenverzeichnis initialisiert.
 .
 Bitte exportieren/importieren Sie im Bedarfsfall Ihre Daten (z.B. mit Mysqldump).
";
$elem["mariadb-server-10.1/old_data_directory_saved"]["descriptionfr"]="L'ancien répertoire de données sera sauvegardé à un nouvel emplacement
 Un fichier nommé /var/lib/mysql/debian-*.flag existe déjà sur ce système. Le numéro indique une version de base de données au format binaire qui ne peut pas être mise à niveau (ou rétrogradée) automatiquement.
 .
 L'ancien répertoire sera renommé en /var/lib/mysql-* et un nouveau répertoire de données sera initialisé à l'emplacement /var/lib/mysql.
 .
 Veuillez exporter puis importer vos données manuellement si besoin (par exemple avec mysqldump).
";
$elem["mariadb-server-10.1/old_data_directory_saved"]["default"]="";
$elem["mariadb-server-10.1/nis_warning"]["type"]="note";
$elem["mariadb-server-10.1/nis_warning"]["description"]="Important note for NIS/YP users
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
$elem["mariadb-server-10.1/nis_warning"]["descriptionde"]="Wichtige Anmerkung für NIS/YP-Benutzer!
 Falls MariaDB mit NIS/YP genutzt wird, muss ein »mysql«-Benutzerkonto auf dem lokalen System hinzugefügt werden mit:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Sie sollten außerdem Besitzer und Zugriffsrechte des Verzeichnisses /var/lib/mysql überprüfen:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mariadb-server-10.1/nis_warning"]["descriptionfr"]="Note importante pour les utilisateurs NIS/YP
 L'utilisation de MariaDB avec NIS/YP impose l'ajout d'un compte local « mysql » avec la commande :
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Vous devez également vérifier le propriétaire et les permissions du répertoire /var/lib/mysql :
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mariadb-server-10.1/nis_warning"]["default"]="";
$elem["mariadb-server-10.1/postrm_remove_databases"]["type"]="boolean";
$elem["mariadb-server-10.1/postrm_remove_databases"]["description"]="Remove all MariaDB databases?
 The /var/lib/mysql directory which contains the MariaDB databases is about
 to be removed.
 .
 If you're removing the MariaDB package in order to later install a more
 recent version or if a different mariadb-server package is already
 using it, the data should be kept.
";
$elem["mariadb-server-10.1/postrm_remove_databases"]["descriptionde"]="Alle MariaDB-Datenbanken entfernen?
 Das Verzeichnis /var/lib/mysql mit den MariaDB-Datenbanken soll entfernt werden.
 .
 Falls geplant ist, das MariaDB-Paket zu entfernen, um lediglich eine höhere Version zu installieren oder ein anderes mariadb-server-Paket die Daten benutzt, sollten diese beibehalten werden.
";
$elem["mariadb-server-10.1/postrm_remove_databases"]["descriptionfr"]="Faut-il supprimer toutes les bases de données MariaDB ?
 Le répertoire /var/lib/mysql qui contient les bases de données de MariaDB va être supprimé.
 .
 Si vous retirez le paquet MariaDB en vue d'en installer une version plus récente ou si un autre paquet mariadb-server les utilise déjà, vous devriez les conserver.
";
$elem["mariadb-server-10.1/postrm_remove_databases"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
