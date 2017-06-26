<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ledgersmb");

$elem["ledgersmb/admin_login"]["type"]="string";
$elem["ledgersmb/admin_login"]["description"]="Database administrative user login:
 Please enter the login of the LedgerSMB database administrative user. This
 login is needed for the administrative web user interface, typically at
 http://localhost/ledgersmb/setup.pl.
";
$elem["ledgersmb/admin_login"]["descriptionde"]="Benutzername des Datenbankadministrators:
 Bitte geben Sie den Benutzernamen des LedgerSMB-Datenbankadministrators ein. Dieser Benutzername ist für die administrative Weboberfläche nötig, die in der Regel unter http://localhost/ledgersmb/setup.pl erreichbar ist.
";
$elem["ledgersmb/admin_login"]["descriptionfr"]="
 Veuillez indiquer l'identifiant de l'administrateur LedgerSMB. Cet identifiant est nécessaire pour accéder à l'interface web d'administration, généralement située à l'adresse http://localhost/ledgersmb/setup.pl.
";
$elem["ledgersmb/admin_login"]["default"]="ledgersmb";
$elem["ledgersmb/admin_password"]["type"]="password";
$elem["ledgersmb/admin_password"]["description"]="Database administrative user password:
 Please enter the password of the LedgerSMB database administrative user. This
 password is needed for the administrative web user interface, typically at
 http://localhost/ledgersmb/setup.pl.
";
$elem["ledgersmb/admin_password"]["descriptionde"]="Passwort des Datenbankadministrators
 Bitte geben Sie das Passwort des LedgerSMB-Datenbankadministrators ein. Dieses Passwort wird für die administrative Weboberfläche nötig, die in der Regel unter http://localhost/ledgersmb/setup.pl erreichbar ist.
";
$elem["ledgersmb/admin_password"]["descriptionfr"]="
 Veuillez indiquer le mot de passe de l'administrateur LedgerSMB. Ce mot de passe est nécessaire pour accéder à l'interface web d'administration, généralement située à l'adresse http://localhost/ledgersmb/setup.pl.
";
$elem["ledgersmb/admin_password"]["default"]="LEDGERSMBINITIAL";
$elem["ledgersmb/debconf_install"]["type"]="boolean";
$elem["ledgersmb/debconf_install"]["description"]="Configure LedgerSMB automatically?
 The configuration program for the package can automatically configure
 some aspects of LedgerSMB, such as the LedgerSMB database user.
 .
 More general information about the initial configuration of the application
 can be found in /usr/share/doc/ledgersmb/README.Debian.
";
$elem["ledgersmb/debconf_install"]["descriptionde"]="LedgerSMB automatisch konfigurieren?
 Das Konfigurationsprogramm des Pakets kann einige Aspekte von LedgerSMB automatisch konfigurieren, unter anderem den LedgerSMB-Datenbankbenutzer.
 .
 Weitere allgemeine Informationen zur Erstkonfiguration der Anwendung finden Sie in /usr/share/doc/ledgersmb/README.Debian.
";
$elem["ledgersmb/debconf_install"]["descriptionfr"]="Faut-il configurer LedgerSMB automatiquement ?
 Le programme de configuration du paquet peut paramétrer automatiquement certains aspects de LedgerSMB, comme l'utilisateur de la base de données de LedgerSMB.
 .
 Des renseignements supplémentaires sur la configuration initiale de l'application sont disponibles dans /usr/share/doc/ledgersmb/README.Debian.
";
$elem["ledgersmb/debconf_install"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
