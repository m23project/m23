<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dotclear");

$elem["dotclear/httpserver"]["type"]="multiselect";
$elem["dotclear/httpserver"]["choices"][1]="apache2";
$elem["dotclear/httpserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run Dotclear.
";
$elem["dotclear/httpserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch konfiguriert werden soll, um Dotclear auszuführen.
";
$elem["dotclear/httpserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour exécuter Dotclear
";
$elem["dotclear/httpserver"]["default"]="";
$elem["dotclear/admin_login"]["type"]="string";
$elem["dotclear/admin_login"]["description"]="Administrative user's login:
 Please enter the login of the administrative user. This login is needed
 to enter the administrative panel.
";
$elem["dotclear/admin_login"]["descriptionde"]="Anmeldename des verwaltenden Benutzers:
 Bitte geben Sie den Anmeldenamen des verwaltenden Benutzers ein. Dieser Anmeldename wird benötigt, um zum Verwaltungskontrollfeld zu gelangen.
";
$elem["dotclear/admin_login"]["descriptionfr"]="Identifiant de l'administrateur :
 Veuillez entrer le nom d'utilisateur de l'administrateur. Il est indispensable pour entrer dans la zone d'administration.
";
$elem["dotclear/admin_login"]["default"]="admin";
$elem["dotclear/admin_password"]["type"]="password";
$elem["dotclear/admin_password"]["description"]="Administrative user's password:
 Please enter the password of the administrative user. This password is needed
 to enter the administrative panel.
";
$elem["dotclear/admin_password"]["descriptionde"]="Passwort des verwaltenden Benutzers:
 Bitte geben Sie das Passwort des verwaltenden Benutzers ein. Dieses Passwort wird benötigt, um zum Verwaltungskontrollfeld zu gelangen.
";
$elem["dotclear/admin_password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez entrer le mot de passe de l'administrateur. Il est indispensable pour entrer dans la zone d'administration.
";
$elem["dotclear/admin_password"]["default"]="admin";
$elem["dotclear/admin_mail"]["type"]="string";
$elem["dotclear/admin_mail"]["description"]="Administrative user's mail:
 Please enter the mail address of the administrative user.
";
$elem["dotclear/admin_mail"]["descriptionde"]="E-Mail-Adresse des verwaltenden Benutzers:
 Bitte geben Sie die E-Mail-Adresse des verwaltenden Benutzers ein.
";
$elem["dotclear/admin_mail"]["descriptionfr"]="Adresse électronique de l'administrateur :
 Veuillez indiquer l'adresse électronique de l'administrateur.
";
$elem["dotclear/admin_mail"]["default"]="admin@localhost";
$elem["dotclear/debconf_install"]["type"]="boolean";
$elem["dotclear/debconf_install"]["description"]="Configure Dotclear automatically?
 The configuration program for the package can configure automatically Dotclear.
";
$elem["dotclear/debconf_install"]["descriptionde"]="Dotclear automatisch konfigurieren?
 Das Konfigurationsprogramm des Pakets kann Dotclear automatisch konfigurieren.
";
$elem["dotclear/debconf_install"]["descriptionfr"]="Faut-il configurer Dotclear automatiquement ?
 La configuration de Dotclear peut être effectuée automatiquement.
";
$elem["dotclear/debconf_install"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
