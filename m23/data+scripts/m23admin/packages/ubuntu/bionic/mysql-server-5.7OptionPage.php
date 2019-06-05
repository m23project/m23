<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mysql-server-5.7");

$elem["mysql-server-5.7/installation_freeze_mode_active"]["type"]="note";
$elem["mysql-server-5.7/installation_freeze_mode_active"]["description"]="Automatic maintenance of MySQL server daemon disabled
 Packaging maintainer scripts detected a case that it does not know how to
 handle and cannot continue configuring MySQL. Automatic management of your
 MySQL installation has been disabled to allow other packaging tasks to
 complete. For more details, see /etc/mysql/FROZEN.

";
$elem["mysql-server-5.7/installation_freeze_mode_active"]["descriptionde"]="";
$elem["mysql-server-5.7/installation_freeze_mode_active"]["descriptionfr"]="";
$elem["mysql-server-5.7/installation_freeze_mode_active"]["default"]="";
$elem["mysql-server-5.7/nis_warning"]["type"]="note";
$elem["mysql-server-5.7/nis_warning"]["description"]="Important note for NIS/YP users
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
$elem["mysql-server-5.7/nis_warning"]["descriptionde"]="Wichtige Anmerkung für NIS/YP-Benutzer!
 Falls MySQL mit NIS/YP genutzt wird, ist ein »mysql«-Benutzerkonto auf dem lokalen System notwendig:
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Sie sollten außerdem Besitzer und Zugriffsrechte des Verzeichnisses /var/lib/mysql überprüfen:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.7/nis_warning"]["descriptionfr"]="Note importante pour les utilisateurs NIS/YP
 L'utilisation de MySQL avec NIS/YP impose l'ajout d'un compte local « mysql » avec la commande :
 .
  adduser --system --group --home /var/lib/mysql mysql
 .
 Vous devez également vérifier le propriétaire et les permissions du répertoire /var/lib/mysql :
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql
";
$elem["mysql-server-5.7/nis_warning"]["default"]="";
$elem["mysql-server-5.7/postrm_remove_databases"]["type"]="boolean";
$elem["mysql-server-5.7/postrm_remove_databases"]["description"]="Remove all MySQL databases?
 The /var/lib/mysql directory which contains the MySQL databases is about
 to be removed.
 .
 This will also erase all data in /var/lib/mysql-files as well as
 /var/lib/mysql-keyring.
 .
 If you're removing the MySQL package in order to later install a more
 recent version or if a different mysql-server package is already
 using it, the data should be kept.
";
$elem["mysql-server-5.7/postrm_remove_databases"]["descriptionde"]="";
$elem["mysql-server-5.7/postrm_remove_databases"]["descriptionfr"]="Faut-il supprimer toutes les bases de données MySQL ?
 Le répertoire /var/lib/mysql qui contient les bases de données de MySQL va être supprimé.
 .
 Cela effacera aussi toutes les données du répertoire /var/lib/mysql-files et du répertoire /var/lib/mysql-keyring.
 .
 Si vous prévoyez d'installer une version plus récente de MySQL ou si un autre paquet mysql-server les utilise déjà, vous devriez les conserver.
";
$elem["mysql-server-5.7/postrm_remove_databases"]["default"]="false";
$elem["mysql-server-5.7/start_on_boot"]["type"]="boolean";
$elem["mysql-server-5.7/start_on_boot"]["description"]="Start the MySQL server on boot?
 The MySQL server can be launched automatically at boot time or manually
 with the '/etc/init.d/mysql start' command.
";
$elem["mysql-server-5.7/start_on_boot"]["descriptionde"]="Soll der MySQL-Server automatisch beim Booten starten?
 Der MySQL-Dienst kann entweder automatisch beim Systemstart oder manuell durch Eingabe des Befehls »/etc/init.d/mysql start« gestartet werden.
";
$elem["mysql-server-5.7/start_on_boot"]["descriptionfr"]="Faut-il lancer MySQL au démarrage ?
 MySQL peut être lancé soit au démarrage, soit en entrant la commande « /etc/init.d/mysql start ».
";
$elem["mysql-server-5.7/start_on_boot"]["default"]="true";
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
 MySQL-5.7 no longer provides NDB Cluster support. Please migrate to the new
 mysql-cluster-server package and remove all lines starting with \"ndb\" from
 all config files below /etc/mysql/.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionde"]="";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionfr"]="Abandon de la gestion de NDB
 La version 5.7 de MySQL ne gère plus les grappes NDB. Vous devriez utiliser le paquet mysql-cluster-server et supprimer toutes les lignes commençant par « ndb » des fichiers de configuration situés dans /etc/mysql.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["default"]="";
PKG_OptionPageTail2($elem);
?>
