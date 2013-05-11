<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mysql-server-5.0");

$elem["mysql-server-5.0/really_downgrade"]["type"]="boolean";
$elem["mysql-server-5.0/really_downgrade"]["description"]="Really proceed with downgrade?
 A file named /var/lib/mysql/debian-*.flag exists on this system.
 .
 Such file is an indication that a mysql-server package with a higher
 version has been installed earlier.
 .
 There is no guarantee that the version you're currently installing
 will be able to use the current databases.
";
$elem["mysql-server-5.0/really_downgrade"]["descriptionde"]="Möchten Sie wirklich eine ältere Version einspielen?
 Auf diesem System existiert eine Datei mit dem Namen /var/lib/mysql/debian-*.flag
 .
 Diese Datei ist ein Hinweis darauf, dass früher ein MySQL-Server-Paket mit einer höheren Version installiert war.
 .
 Es kann nicht garantiert werden, dass die gegenwärtig zu installierende Version dessen Daten benutzen kann.
";
$elem["mysql-server-5.0/really_downgrade"]["descriptionfr"]="Faut-il vraiment revenir à la version précédente ?
 Un fichier /var/lib/mysql/debian-*.flag est présent sur ce système.
 .
 Cela indique qu'une version plus récente du paquet mysql-server a été précédemment installée.
 .
 Il n'est pas garanti que cette version puisse en utiliser les données.
";
$elem["mysql-server-5.0/really_downgrade"]["default"]="false";
$elem["mysql-server-5.0/nis_warning"]["type"]="note";
$elem["mysql-server-5.0/nis_warning"]["description"]="Important note for NIS/YP users
 To use MySQL, the following entries for users and groups should be added
 to the system:
 .
  /etc/passwd   : mysql:x:100:101:MySQL Server:/var/lib/mysql:/bin/false
  /etc/group    : mysql:x:101:
 .
 You should also check the permissions and the owner of the
 /var/lib/mysql directory:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.0/nis_warning"]["descriptionde"]="Wichtige Anmerkung für NIS/YP-Benutzer!
 Um MySQL benutzen zu können, sollten die folgenden Benutzer und Gruppen dem System hinzugefügt werden:
 .
  /etc/passwd   : mysql:x:100:101:MySQL Server:/var/lib/mysql:/bin/false
  /etc/group    : mysql:x:101:
 .
 Sie sollten außerdem Besitzer und Zugriffsrechte des Verzeichnisses /var/lib/mysql überprüfen:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.0/nis_warning"]["descriptionfr"]="Note importante pour les utilisateurs NIS/YP
 Pour pouvoir utiliser MySQL, les utilisateurs et les groupes suivants doivent être ajoutés au système :
 .
  /etc/passwd   : mysql:x:100:101:MySQL Server:/var/lib/mysql:/bin/false
  /etc/group    : mysql:x:101:
 .
 Vous devez également vérifier le propriétaire et les permissions du répertoire /var/lib/mysql :
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.0/nis_warning"]["default"]="";
$elem["mysql-server-5.0/postrm_remove_databases"]["type"]="boolean";
$elem["mysql-server-5.0/postrm_remove_databases"]["description"]="Remove all MySQL databases?
 The /var/lib/mysql directory which contains the MySQL databases is about
 to be removed.
 .
 If you're removing the MySQL package in order to later install a more
 recent version or if a different mysql-server package is already
 using it, the data should be kept.
";
$elem["mysql-server-5.0/postrm_remove_databases"]["descriptionde"]="Alle MySQL-Datenbanken entfernen?
 Das Verzeichnis /var/lib/mysql mit den MySQL-Datenbanken soll entfernt werden.
 .
 Falls geplant ist, nur eine höhere Version von MySQL zu installieren oder ein anderes mysql-server-Paket dieses bereits benutzt, sollten die Daten behalten werden.
";
$elem["mysql-server-5.0/postrm_remove_databases"]["descriptionfr"]="Faut-il supprimer toutes les bases de données MySQL ?
 Le répertoire /var/lib/mysql qui contient les bases de données de MySQL va être supprimé.
 .
 Si vous prévoyez d'installer une version plus récente de MySQL ou si un autre paquet mysql-server les utilise déjà, vous devriez les conserver.
";
$elem["mysql-server-5.0/postrm_remove_databases"]["default"]="false";
$elem["mysql-server-5.0/start_on_boot"]["type"]="boolean";
$elem["mysql-server-5.0/start_on_boot"]["description"]="Start the MySQL server on boot?
 The MySQL server can be launched automatically at boot time or manually
 with the '/etc/init.d/mysql start' command.
";
$elem["mysql-server-5.0/start_on_boot"]["descriptionde"]="Soll MySQL automatisch beim Booten starten?
 Der MySQL-Dienst kann entweder automatisch beim Systemstart oder manuell durch Eingabe des Befehls »/etc/init.d/mysql start« gestartet werden.
";
$elem["mysql-server-5.0/start_on_boot"]["descriptionfr"]="Faut-il lancer MySQL au démarrage ?
 MySQL peut être lancé soit au démarrage, soit en entrant la commande « /etc/init.d/mysql start ».
";
$elem["mysql-server-5.0/start_on_boot"]["default"]="true";
$elem["mysql-server/root_password"]["type"]="password";
$elem["mysql-server/root_password"]["description"]="New password for the MySQL \"root\" user:
 While not mandatory, it is highly recommended that you set a password
 for the MySQL administrative \"root\" user.
 .
 If that field is left blank, the password will not be changed.
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
$elem["mysql-server/root_password_again"]["descriptionde"]="Wiederholen Sie das Passwort für den MySQL »root«-Benutzer:
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
 Please read the /usr/share/doc/mysql-server-5.0/README.Debian file
 for more information.
";
$elem["mysql-server/error_setting_password"]["descriptionde"]="Konnte für den MySQL-»root«-Benutzer kein Passwort setzen
 Beim setzen des Passworts für den administrativen MySQL-Benutzer ist ein Fehler aufgetreten. Dies könnte daran liegen, dass der Benutzer bereits ein Passwort hat oder dass es ein Problem mit der Kommunikation mit dem MySQL-Server gibt.
 .
 Sie sollten das Passwort des administrativen Benutzers nach der Paketinstallation prüfen.
 .
 Für weitere Informationen lesen Sie /usr/share/doc/mysql-server-5.0/README.Debian
";
$elem["mysql-server/error_setting_password"]["descriptionfr"]="Impossible de changer le mot de passe de l'utilisateur « root » de MySQL
 Une erreur s'est produite lors du changement de mot de passe du compte d'administration. Un mot de passe existait peut-être déjà ou il n'a pas été possible de communiquer avec le serveur MySQL.
 .
 Vous devriez vérifier le mot de passe de ce compte après l'installation du paquet.
 .
 Veuillez consulter le fichier /usr/share/doc/mysql-server-5.0/README.Debian pour plus d'informations.
";
$elem["mysql-server/error_setting_password"]["default"]="";
$elem["mysql-server/password_mismatch"]["type"]="error";
$elem["mysql-server/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["mysql-server/password_mismatch"]["descriptionde"]="Passwort-Eingabefehler
 Die beiden von Ihnen eingegebenen Passwörter stimmten nicht überein. Bitte versuchen Sie es noch einmal.
";
$elem["mysql-server/password_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Le mot de passe et sa confirmation ne sont pas identiques. Veuillez recommencer.
";
$elem["mysql-server/password_mismatch"]["default"]="";
$elem["mysql-server-5.0/need_sarge_compat"]["type"]="boolean";
$elem["mysql-server-5.0/need_sarge_compat"]["description"]="Support MySQL connections from hosts running Debian \"sarge\" or older?
 In old versions of MySQL clients on Debian, passwords were not stored
 securely. This has been improved since then, however clients (such as PHP)
 from hosts running Debian 3.1 Sarge will not be able to connect to
 recent accounts or accounts whose password have been changed.
 .
 Please read the /usr/share/doc/mysql-server-5.0/README.Debian file
 for more information.
";
$elem["mysql-server-5.0/need_sarge_compat"]["descriptionde"]="Sollen MySQL-Verbindungen von Rechnern mit Debian »Sarge« oder älter unterstützt werden?
 Alte Versionen der MySQL-Clients für Debian speicherten Passwörter nicht sehr sicher. Dies wurde verbessert, allerdings werden Clients (z. B. PHP) von Hosts mit Debian 3.1 Sarge sich nicht mehr mit MySQL-Konten verbinden können, die neu angelegt werden oder deren Passwort geändert wird. Siehe auch /usr/share/doc/mysql-server-5.0/README.Debian.
 .
 Für weitere Informationen lesen Sie /usr/share/doc/mysql-server-5.0/README.Debian
";
$elem["mysql-server-5.0/need_sarge_compat"]["descriptionfr"]="Gérer les connexions d'hôtes qui utilisent les versions Debian « sarge » ou antérieures  ?
 La méthode de stockage des mots de passe n'était pas très sûre dans les version précédentes de ce paquet. Cette méthode a été améliorée mais les modifications empêchent la connexion avec de nouveaux comptes ou des comptes dont le mot de passe a été modifié, pour les clients (p. ex. PHP) depuis des hôtes qui utilisent Debian 3.1 « sarge ».
 .
 Veuillez consulter le fichier /usr/share/doc/mysql-server-5.0/README.Debian pour plus d'informations.
";
$elem["mysql-server-5.0/need_sarge_compat"]["default"]="false";
$elem["mysql-server-5.0/need_sarge_compat_done"]["type"]="boolean";
$elem["mysql-server-5.0/need_sarge_compat_done"]["description"]="for internal use
 Only internally used.

";
$elem["mysql-server-5.0/need_sarge_compat_done"]["descriptionde"]="";
$elem["mysql-server-5.0/need_sarge_compat_done"]["descriptionfr"]="";
$elem["mysql-server-5.0/need_sarge_compat_done"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
