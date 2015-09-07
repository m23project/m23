<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mysql-server-5.1");

$elem["mysql-server-5.1/really_downgrade"]["type"]="boolean";
$elem["mysql-server-5.1/really_downgrade"]["description"]="Really proceed with downgrade?
 A file named /var/lib/mysql/debian-*.flag exists on this system.
 .
 Such a file is an indication that a mysql-server package with a higher
 version has been installed previously.
 .
 There is no guarantee that the version you're currently installing
 will be able to use the current databases.
";
$elem["mysql-server-5.1/really_downgrade"]["descriptionde"]="Möchten Sie wirklich eine ältere Version einspielen?
 Auf diesem System existiert eine Datei mit dem Namen /var/lib/mysql/debian-*.flag
 .
 Diese Datei ist ein Hinweis darauf, dass früher ein MySQL-Server-Paket mit einer höheren Version installiert war.
 .
 Es kann nicht garantiert werden, dass die gegenwärtig zu installierende Version dessen Daten benutzen kann.
";
$elem["mysql-server-5.1/really_downgrade"]["descriptionfr"]="Faut-il vraiment revenir à la version précédente ?
 Un fichier /var/lib/mysql/debian-*.flag est présent sur ce système.
 .
 Cela indique qu'une version plus récente du paquet mysql-server a été précédemment installée.
 .
 Il n'est pas garanti que cette version puisse en utiliser les données.
";
$elem["mysql-server-5.1/really_downgrade"]["default"]="false";
$elem["mysql-server-5.1/nis_warning"]["type"]="note";
$elem["mysql-server-5.1/nis_warning"]["description"]="Important note for NIS/YP users
 Using MySQL under NIS/YP requires a mysql user account to be added on
 the local system with:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 You should also check the permissions and ownership of the
 /var/lib/mysql directory:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.1/nis_warning"]["descriptionde"]="Wichtige Anmerkung für NIS/YP-Benutzer!
 Falls MySQL mit NIS/YP genutzt wird, ist ein »mysql«-Benutzerkonto auf dem lokalen System notwendig:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Sie sollten außerdem Besitzer und Zugriffsrechte des Verzeichnisses /var/lib/mysql überprüfen:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.1/nis_warning"]["descriptionfr"]="Note importante pour les utilisateurs NIS/YP
 L'utilisation de MySQL avec NIS/YP impose l'ajout d'un compte local « mysql » avec la commande :
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Vous devez également vérifier le propriétaire et les permissions du répertoire /var/lib/mysql :
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.1/nis_warning"]["default"]="";
$elem["mysql-server-5.1/postrm_remove_databases"]["type"]="boolean";
$elem["mysql-server-5.1/postrm_remove_databases"]["description"]="Remove all MySQL databases?
 The /var/lib/mysql directory which contains the MySQL databases is about
 to be removed.
 .
 If you're removing the MySQL package in order to later install a more
 recent version or if a different mysql-server package is already
 using it, the data should be kept.
";
$elem["mysql-server-5.1/postrm_remove_databases"]["descriptionde"]="Alle MySQL-Datenbanken entfernen?
 Das Verzeichnis /var/lib/mysql mit den MySQL-Datenbanken soll entfernt werden.
 .
 Falls geplant ist, nur eine höhere Version von MySQL zu installieren oder ein anderes mysql-server-Paket dieses bereits benutzt, sollten die Daten behalten werden.
";
$elem["mysql-server-5.1/postrm_remove_databases"]["descriptionfr"]="Faut-il supprimer toutes les bases de données MySQL ?
 Le répertoire /var/lib/mysql qui contient les bases de données de MySQL va être supprimé.
 .
 Si vous prévoyez d'installer une version plus récente de MySQL ou si un autre paquet mysql-server les utilise déjà, vous devriez les conserver.
";
$elem["mysql-server-5.1/postrm_remove_databases"]["default"]="false";
$elem["mysql-server-5.1/start_on_boot"]["type"]="boolean";
$elem["mysql-server-5.1/start_on_boot"]["description"]="Start the MySQL server on boot?
 The MySQL server can be launched automatically at boot time or manually
 with the '/etc/init.d/mysql start' command.
";
$elem["mysql-server-5.1/start_on_boot"]["descriptionde"]="Soll der MySQL-Server automatisch beim Booten starten?
 Der MySQL-Dienst kann entweder automatisch beim Systemstart oder manuell durch Eingabe des Befehls »/etc/init.d/mysql start« gestartet werden.
";
$elem["mysql-server-5.1/start_on_boot"]["descriptionfr"]="Faut-il lancer MySQL au démarrage ?
 MySQL peut être lancé soit au démarrage, soit en entrant la commande « /etc/init.d/mysql start ».
";
$elem["mysql-server-5.1/start_on_boot"]["default"]="true";
$elem["mysql-server/root_password"]["type"]="password";
$elem["mysql-server/root_password"]["description"]="New password for the MySQL \"root\" user:
 While not mandatory, it is highly recommended that you set a password
 for the MySQL administrative \"root\" user.
 .
 If this field is left blank, the password will not be changed.
";
$elem["mysql-server/root_password"]["descriptionde"]="Neues Passwort für den MySQL »root«-Benutzer:
 Obwohl es nicht zwingend erforderlich ist, wird nachdrücklich empfohlen für den administrativen MySQL »root«-Benutzer ein Passwort zu setzen.
 .
 Wenn dieses Feld freigelassen wird, wird das Passwort nicht geändert.
";
$elem["mysql-server/root_password"]["descriptionfr"]="Nouveau mot de passe du superutilisateur de MySQL :
 Il est très fortement recommandé d'établir un mot de passe pour le compte d'administration de MySQL (« root »).
 .
 Si ce champ est laissé vide, le mot de passe ne sera pas changé.
";
$elem["mysql-server/root_password"]["default"]="";
$elem["mysql-server/root_password_again"]["type"]="password";
$elem["mysql-server/root_password_again"]["description"]="Repeat password for the MySQL \"root\" user:
";
$elem["mysql-server/root_password_again"]["descriptionde"]="Wiederholen Sie das Passwort für den MySQL-»root«-Benutzer:
";
$elem["mysql-server/root_password_again"]["descriptionfr"]="Confirmation du mot de passe du superutilisateur de MySQL :
";
$elem["mysql-server/root_password_again"]["default"]="";
$elem["mysql-server/error_setting_password"]["type"]="error";
$elem["mysql-server/error_setting_password"]["description"]="Unable to set password for the MySQL \"root\" user
 An error occurred while setting the password for the MySQL
 administrative user. This may have happened because the account
 already has a password, or because of a communication problem with
 the MySQL server.
 .
 You should check the account's password after the package installation.
 .
 Please read the /usr/share/doc/mysql-server-5.1/README.Debian file
 for more information.
";
$elem["mysql-server/error_setting_password"]["descriptionde"]="Konnte für den MySQL-»root«-Benutzer kein Passwort setzen
 Beim setzen des Passworts für den administrativen MySQL-Benutzer ist ein Fehler aufgetreten. Dies könnte daran liegen, dass der Benutzer bereits ein Passwort hat oder dass es ein Problem mit der Kommunikation mit dem MySQL-Server gibt.
 .
 Sie sollten das Passwort des administrativen Benutzers nach der Paketinstallation prüfen.
 .
 Für weitere Informationen lesen Sie /usr/share/doc/mysql-server-5.1/README.Debian.
";
$elem["mysql-server/error_setting_password"]["descriptionfr"]="Impossible de changer le mot de passe de l'utilisateur « root » de MySQL
 Une erreur s'est produite lors du changement de mot de passe du compte d'administration. Un mot de passe existait peut-être déjà ou il n'a pas été possible de communiquer avec le serveur MySQL.
 .
 Vous devriez vérifier le mot de passe de ce compte après l'installation du paquet.
 .
 Veuillez consulter le fichier /usr/share/doc/mysql-server-5.1/README.Debian pour plus d'informations.
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
 MySQL-5.1 bietet keine NDB-Clusterunterstützung mehr. Bitte migrieren Sie Ihr System zum neuen »mysql-cluster«-Paket und entfernen Sie alle Zeilen, die mit »ndb« beginnen aus allen Konfigurationsdateien im Verzeichnis /etc/mysql/.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionfr"]="Abandon de la gestion de NDB
 La version 5.1 de MySQL ne gère plus les grappes NDB. Vous devriez utiliser le paquet mysql-cluster et supprimer toutes les lignes commençant par « ndb » des fichiers de configuration situés dans /etc/mysql.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["default"]="";
PKG_OptionPageTail2($elem);
?>
