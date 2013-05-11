<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpmyadmin");

$elem["phpmyadmin/reconfigure-webserver"]["type"]="multiselect";
$elem["phpmyadmin/reconfigure-webserver"]["choices"][1]="apache2";
$elem["phpmyadmin/reconfigure-webserver"]["choices"][2]="apache";
$elem["phpmyadmin/reconfigure-webserver"]["choices"][3]="apache-ssl";
$elem["phpmyadmin/reconfigure-webserver"]["choices"][4]="apache-perl";
$elem["phpmyadmin/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run phpMyAdmin.
";
$elem["phpmyadmin/reconfigure-webserver"]["descriptionde"]="Webserver, die automatisch konfiguriert werden sollen:
 Bitte wählen Sie den Webserver aus, der automatisch zum Betrieb von phpMyAdmin konfiguriert werden soll.
";
$elem["phpmyadmin/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à reconfigurer automatiquement pour exécuter phpMyAdmin.
";
$elem["phpmyadmin/reconfigure-webserver"]["default"]="";
$elem["phpmyadmin/setup-username"]["type"]="string";
$elem["phpmyadmin/setup-username"]["description"]="Username for web-based setup system:
 The setup system for phpMyAdmin may be used, after installation, from
 http://localhost/phpmyadmin/scripts/setup.php.
 .
 Access to this system requires identification with a username and a
 password.
 .
 If you leave this field empty, the default username ('admin') will be used.
";
$elem["phpmyadmin/setup-username"]["descriptionde"]="Benutzername für die webbasierte Installation:
 Nach der Installation kann das Einrichtungssystem von phpMyAdmin unter http://localhost/phpmyadmin/scripts/setup.php verwendet werden.
 .
 Zugriff auf dieses System benötigt die Identifikation mit einem Benutzernamen und einem Passwort.
 .
 Falls Sie dieses Feld leer lassen, wird der Standardbenutzernamen »admin« verwendet.
";
$elem["phpmyadmin/setup-username"]["descriptionfr"]="Identifiant pour la configuration par le web :
 Le système de configuration de phpMyAdmin peut être utilisé, après l'installation, depuis l'adresse http://localhost/phpmyadmin/scripts/setup.php.
 .
 L'accès à la configuration nécessite un identifiant et un mot de passe.
 .
 Si vous laissez ce champ vide, l'identifiant par défaut (« admin ») sera utilisé.
";
$elem["phpmyadmin/setup-username"]["default"]="admin";
$elem["phpmyadmin/setup-password"]["type"]="password";
$elem["phpmyadmin/setup-password"]["description"]="Password for web-based setup system:
 The setup system for phpMyAdmin may be used, after installation, from
 http://localhost/phpmyadmin/scripts/setup.php.
 .
 Access to this system requires identification with a username and a
 password.
 .
 Usernames and passwords may be managed with the `htpasswd' command and
 are stored in /etc/phpmyadmin/htpasswd.setup.
 .
 If you leave this field empty, access to the web-based setup will be
 disabled.
";
$elem["phpmyadmin/setup-password"]["descriptionde"]="Passwort für die webbasierte Installation:
 Nach der Installation kann das Einrichtungssystem von phpMyAdmin unter http://localhost/phpmyadmin/scripts/setup.php verwendet werden.
 .
 Zugriff auf dieses System benötigt die Identifikation mit einem Benutzernamen und einem Passwort.
 .
 Die Benutzernamen und Passwörter können mittels »htpasswd«-Befehl verwaltet werden. Sie werden in der Datei /etc/phpmyadmin/htpasswd.setup gespeichert.
 .
 Falls Sie dieses Feld leer lassen, wird der Zugriff auf die webbasierte Installation deaktiviert.
";
$elem["phpmyadmin/setup-password"]["descriptionfr"]="Mot de passe pour la configuration par le web :
 Le système de configuration de phpMyAdmin peut être utilisé, après l'installation, depuis l'adresse http://localhost/phpmyadmin/scripts/setup.php.
 .
 L'accès à la configuration nécessite un identifiant et un mot de passe.
 .
 Les identifiants et mots de passe peuvent être gérés avec la commande « htpasswd » et sont conservés dans le fichier /etc/phpmyadmin/htpasswd.setup.
 .
 Si vous laissez ce champ vide, la configuration par le web sera désactivée.
";
$elem["phpmyadmin/setup-password"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
