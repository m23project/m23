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
$elem["mysql-server-10.0/nis_warning"]["type"]="note";
$elem["mysql-server-10.0/nis_warning"]["description"]="Important note for NIS/YP users
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
$elem["mysql-server-10.0/nis_warning"]["descriptionde"]="Wichtige Anmerkung für NIS/YP-Benutzer!
 Falls MariaDB mit NIS/YP genutzt wird, muss ein »mysql«-Benutzerkonto auf dem lokalen System hinzugefügt werden mit:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Sie sollten außerdem Besitzer und Zugriffsrechte des Verzeichnisses /var/lib/mysql überprüfen:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-10.0/nis_warning"]["descriptionfr"]="Note importante pour les utilisateurs NIS/YP
 L'utilisation de MariaDB avec NIS/YP impose l'ajout d'un compte local « mysql » avec la commande :
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Vous devez également vérifier le propriétaire et les permissions du répertoire /var/lib/mysql :
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-10.0/nis_warning"]["default"]="";
$elem["mysql-server-10.0/postrm_remove_databases"]["type"]="boolean";
$elem["mysql-server-10.0/postrm_remove_databases"]["description"]="Remove all MariaDB databases?
 The /var/lib/mysql directory which contains the MariaDB databases is about
 to be removed.
 .
 If you're removing the MariaDB package in order to later install a more
 recent version or if a different mariadb-server package is already
 using it, the data should be kept.
";
$elem["mysql-server-10.0/postrm_remove_databases"]["descriptionde"]="Alle MariaDB-Datenbanken entfernen?
 Das Verzeichnis /var/lib/mysql mit den MariaDB-Datenbanken soll entfernt werden.
 .
 Falls geplant ist, das MariaDB-Paket zu entfernen, um lediglich eine höhere Version zu installieren oder ein anderes mariadb-server-Paket die Daten benutzt, sollten diese beibehalten werden.
";
$elem["mysql-server-10.0/postrm_remove_databases"]["descriptionfr"]="Faut-il supprimer toutes les bases de données MariaDB ?
 Le répertoire /var/lib/mysql qui contient les bases de données de MariaDB va être supprimé.
 .
 Si vous retirez le paquet MariaDB en vue d'en installer une version plus récente ou si un autre paquet mariadb-server les utilise déjà, vous devriez les conserver.
";
$elem["mysql-server-10.0/postrm_remove_databases"]["default"]="false";
$elem["mysql-server/root_password"]["type"]="password";
$elem["mysql-server/root_password"]["description"]="New password for the MariaDB \"root\" user:
 While not mandatory, it is highly recommended that you set a password
 for the MariaDB administrative \"root\" user.
 .
 If this field is left blank, the password will not be changed.
";
$elem["mysql-server/root_password"]["descriptionde"]="Neues Passwort für den MariaDB-»root«-Benutzer:
 Obwohl es nicht zwingend erforderlich ist, wird nachdrücklich empfohlen, für den administrativen MariaDB-»root«-Benutzer ein Passwort zu setzen.
 .
 Wenn Sie dieses Feld leer lassen, wird das Passwort nicht geändert.
";
$elem["mysql-server/root_password"]["descriptionfr"]="Nouveau mot de passe du superutilisateur de MariaDB :
 Il est très fortement recommandé d'établir un mot de passe pour le compte d'administration de MariaDB (« root »).
 .
 Si ce champ est laissé vide, le mot de passe ne sera pas changé.
";
$elem["mysql-server/root_password"]["default"]="";
$elem["mysql-server/root_password_again"]["type"]="password";
$elem["mysql-server/root_password_again"]["description"]="Repeat password for the MariaDB \"root\" user:
";
$elem["mysql-server/root_password_again"]["descriptionde"]="Wiederholen Sie das Passwort für den MariaDB-»root«-Benutzer:
";
$elem["mysql-server/root_password_again"]["descriptionfr"]="Confirmation du mot de passe du superutilisateur de MariaDB :
";
$elem["mysql-server/root_password_again"]["default"]="";
$elem["mysql-server/error_setting_password"]["type"]="error";
$elem["mysql-server/error_setting_password"]["description"]="Unable to set password for the MariaDB \"root\" user
 An error occurred while setting the password for the MariaDB
 administrative user. This may have happened because the account
 already has a password, or because of a communication problem with
 the MariaDB server.
 .
 You should check the account's password after the package installation.
 .
 Please read the /usr/share/doc/mariadb-server-10.0/README.Debian file
 for more information.
";
$elem["mysql-server/error_setting_password"]["descriptionde"]="Passwort für den MariaDB-»root«-Benutzer konnte nicht gesetzt werden
 Beim Setzen des Passworts für den administrativen MariaDB-Benutzer ist ein Fehler aufgetreten. Dies könnte daran liegen, dass der Benutzer bereits ein Passwort hat oder dass es ein Problem bei der Kommunikation mit dem MariaDB-Server gibt.
 .
 Sie sollten das Passwort des administrativen Benutzers nach der Paketinstallation prüfen.
 .
 Für weitere Informationen lesen Sie /usr/share/doc/mariadb-server-10.0/README.Debian.
";
$elem["mysql-server/error_setting_password"]["descriptionfr"]="Impossible de changer le mot de passe de l'utilisateur « root » de MariaDB
 Une erreur s'est produite lors du changement de mot de passe du compte d'administration. Un mot de passe existait peut-être déjà ou il n'a pas été possible de communiquer avec le serveur MariaDB.
 .
 Vous devriez vérifier le mot de passe de ce compte après l'installation du paquet.
 .
 Veuillez consulter le fichier /usr/share/doc/mariadb-server-10.0/README.Debian pour plus d'informations.
";
$elem["mysql-server/error_setting_password"]["default"]="";
$elem["mysql-server/password_mismatch"]["type"]="error";
$elem["mysql-server/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["mysql-server/password_mismatch"]["descriptionde"]="Passwort-Eingabefehler
 Die beiden von Ihnen eingegebenen Passwörter sind nicht identisch. Bitte erneut versuchen.
";
$elem["mysql-server/password_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Le mot de passe et sa confirmation ne sont pas identiques. Veuillez recommencer.
";
$elem["mysql-server/password_mismatch"]["default"]="";
$elem["mysql-server/no_upgrade_when_using_ndb"]["type"]="error";
$elem["mysql-server/no_upgrade_when_using_ndb"]["description"]="NDB Cluster seems to be in use
 MySQL-5.1 no longer provides NDB Cluster support. Please migrate to the new
 mysql-cluster package and remove all lines starting with \"ndb\" from
 all config files below /etc/mysql/.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionde"]="NDB-Cluster scheint gerade benutzt zu werden
 MySQL-5.1 bietet keine NDB-Clusterunterstützung mehr. Bitte migrieren Sie Ihr System auf das neue »mysql-cluster«-Paket und entfernen Sie alle Zeilen, die mit »ndb« beginnen, aus allen Konfigurationsdateien im Verzeichnis /etc/mysql/.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionfr"]="Abandon de la gestion de NDB
 La version 5.1 de MySQL ne gère plus les grappes NDB. Vous devriez utiliser le paquet mysql-cluster et supprimer toutes les lignes commençant par « ndb » des fichiers de configuration situés dans /etc/mysql.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["default"]="";
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
