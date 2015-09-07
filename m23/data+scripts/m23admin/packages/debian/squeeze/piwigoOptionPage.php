<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("piwigo");

$elem["piwigo/webserver"]["type"]="multiselect";
$elem["piwigo/webserver"]["choices"][1]="apache2";
$elem["piwigo/webserver"]["choices"][2]="apache";
$elem["piwigo/webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run Piwigo.
";
$elem["piwigo/webserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch zum Ausführen von Piwigo konfigueriert werden soll.
";
$elem["piwigo/webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour exécuter Piwigo.
";
$elem["piwigo/webserver"]["default"]="";
$elem["piwigo/admin_login"]["type"]="string";
$elem["piwigo/admin_login"]["description"]="Administrative user's login:
 Please enter the login of the administrative user. This login is needed
 to enter the administrative panel.
";
$elem["piwigo/admin_login"]["descriptionde"]="Anmeldung des verwaltenden Benutzers:
 Bitte geben Sie die Anmeldung des verwaltenden Benutzers ein. Diese Anmeldung wird benötigt, um ins Verwaltungskontrollzentrum zu gelangen.
";
$elem["piwigo/admin_login"]["descriptionfr"]="Identifiant de l'administrateur :
 Veuillez indiquer l'identifiant de l'administrateur. Il est indispensable pour entrer dans la zone d'administration.
";
$elem["piwigo/admin_login"]["default"]="admin";
$elem["piwigo/admin_password"]["type"]="password";
$elem["piwigo/admin_password"]["description"]="Administrative user's password:
 Please enter the password of the administrative user. This password is needed
 to enter the administrative panel.
";
$elem["piwigo/admin_password"]["descriptionde"]="Passwort des verwaltenden Benutzers:
 Bitte geben Sie das Passwort des verwaltenden Benutzers ein. Dieses Passwort wird benötigt, um ins Verwaltungskontrollzentrum zu gelangen.
";
$elem["piwigo/admin_password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez entrer le mot de passe de l'administrateur. Il est indispensable pour entrer dans la zone d'administration.
";
$elem["piwigo/admin_password"]["default"]="admin";
$elem["piwigo/admin_mail"]["type"]="string";
$elem["piwigo/admin_mail"]["description"]="Administrative user's mail:
 Please enter the mail address of the administrative user.
";
$elem["piwigo/admin_mail"]["descriptionde"]="E-Mail-Adresse des verwaltenden Benutzers:
 Bitte geben Sie die E-Mail-Adresse des verwaltenden Benutzers ein.
";
$elem["piwigo/admin_mail"]["descriptionfr"]="Adresse électronique de l'administrateur :
 Veuillez indiquer l'adresse électronique de l'administrateur.
";
$elem["piwigo/admin_mail"]["default"]="admin@localhost";
$elem["piwigo/debconf_install"]["type"]="boolean";
$elem["piwigo/debconf_install"]["description"]="Configure Piwigo automatically?
 The configuration program for the package can configure automatically Piwigo.
";
$elem["piwigo/debconf_install"]["descriptionde"]="Piwigo automatisch konfigurieren?
 Das Konfigurationsprogramm für das Paket kann Piwigo automatisch konfigurieren.
";
$elem["piwigo/debconf_install"]["descriptionfr"]="Faut-il configurer Piwigo automatiquement ?
 La configuration de Piwigo peut être effectuée automatiquement.
";
$elem["piwigo/debconf_install"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
