<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("percona-xtradb-cluster-server-5.6");

$elem["percona-xtradb-cluster-server-5.6/really_downgrade"]["type"]="boolean";
$elem["percona-xtradb-cluster-server-5.6/really_downgrade"]["description"]="Really proceed with downgrade?
 A file named /var/lib/mysql/debian-*.flag exists on this system.
 .
 Such file is an indication that a percona-xtradb-cluster-server package with a higher
 version has been installed earlier.
 .
 There is no guarantee that the version you're currently installing
 will be able to use the current databases.

";
$elem["percona-xtradb-cluster-server-5.6/really_downgrade"]["descriptionde"]="";
$elem["percona-xtradb-cluster-server-5.6/really_downgrade"]["descriptionfr"]="";
$elem["percona-xtradb-cluster-server-5.6/really_downgrade"]["default"]="false";
$elem["mysql-server-5.5/nis_warning"]["type"]="note";
$elem["mysql-server-5.5/nis_warning"]["description"]="Important note for NIS/YP users
 To use MySQL, the following entries for users and groups should be added
 to the system:
 .
  /etc/passwd   : mysql:x:100:101:Percona Server:/var/lib/mysql:/bin/false
  /etc/group    : mysql:x:101:
 .
 You should also check the permissions and the owner of the
 /var/lib/mysql directory:
 .
  /var/lib/mysql: drwxr-xr-x   mysql    mysql

";
$elem["mysql-server-5.5/nis_warning"]["descriptionde"]="";
$elem["mysql-server-5.5/nis_warning"]["descriptionfr"]="";
$elem["mysql-server-5.5/nis_warning"]["default"]="";
$elem["mysql-server-5.5/postrm_remove_databases"]["type"]="boolean";
$elem["mysql-server-5.5/postrm_remove_databases"]["description"]="Remove all Percona Server databases?
 The /var/lib/mysql directory which contains the Percona Server databases is
 about
 to be removed.
 .
 If you're removing the Percona Server package in order to later install a more
 recent version or if a different percona-xtradb-cluster-server package is already
 using it, the data should be kept.

";
$elem["mysql-server-5.5/postrm_remove_databases"]["descriptionde"]="";
$elem["mysql-server-5.5/postrm_remove_databases"]["descriptionfr"]="";
$elem["mysql-server-5.5/postrm_remove_databases"]["default"]="false";
$elem["mysql-server/start_on_boot"]["type"]="boolean";
$elem["mysql-server/start_on_boot"]["description"]="Start the Percona Server daemon on boot?
 The Percona Server daemon can be launched automatically at boot time or
 manually with the '/etc/init.d/mysql start' command.

";
$elem["mysql-server/start_on_boot"]["descriptionde"]="";
$elem["mysql-server/start_on_boot"]["descriptionfr"]="";
$elem["mysql-server/start_on_boot"]["default"]="true";
$elem["mysql-server/root_password"]["type"]="password";
$elem["mysql-server/root_password"]["description"]="New password for the Percona Server \"root\" user:
 While not mandatory, it is highly recommended that you set a password
 for the Percona Server administrative \"root\" user.
 .
 If that field is left blank, the password will not be changed.

";
$elem["mysql-server/root_password"]["descriptionde"]="";
$elem["mysql-server/root_password"]["descriptionfr"]="";
$elem["mysql-server/root_password"]["default"]="";
$elem["mysql-server/root_password_again"]["type"]="password";
$elem["mysql-server/root_password_again"]["description"]="Repeat password for the Percona Server \"root\" user:

";
$elem["mysql-server/root_password_again"]["descriptionde"]="";
$elem["mysql-server/root_password_again"]["descriptionfr"]="";
$elem["mysql-server/root_password_again"]["default"]="";
$elem["mysql-server/error_setting_password"]["type"]="error";
$elem["mysql-server/error_setting_password"]["description"]="Unable to set password for the Percona Server \"root\" user
 An error occurred while setting the password for the Percona Server
 administrative user. This may have happened because the account
 already has a password, or because of a communication problem with
 the Percona Server daemon.
 .
 You should check the account's password after the package installation.
 .
 Please read the /usr/share/doc/percona-xtradb-cluster-server-5.6/README.Debian file
 for more information.

";
$elem["mysql-server/error_setting_password"]["descriptionde"]="";
$elem["mysql-server/error_setting_password"]["descriptionfr"]="";
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
 percona-xtradb-cluster-5.6 has orphaned NDB Cluster support. Please migrate to the
 new mysql-cluster package and remove all lines starting with \"ndb\" from
 all config files below /etc/mysql/.
";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionde"]="";
$elem["mysql-server/no_upgrade_when_using_ndb"]["descriptionfr"]="";
$elem["mysql-server/no_upgrade_when_using_ndb"]["default"]="";
PKG_OptionPageTail2($elem);
?>
