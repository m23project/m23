<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ocsinventory-reports");

$elem["ocsinventory-reports/setup-username"]["type"]="string";
$elem["ocsinventory-reports/setup-username"]["description"]="User name for web-based setup system:
 OCS Reports comes with a web-based setup/upgrade script.
 The script is located at http://localhost/ocsreports/install.php.
 For security reasons it requires authorization.
 .
 Leave empty if you want to use the default user name 'admin'.
";
$elem["ocsinventory-reports/setup-username"]["descriptionde"]="Benutzername für das webbasierte Einrichtungssystem:
 OCS Reports enthält ein webbasiertes Einrichtungs-/Upgrade-Skript. Das Skript befindet sich unter http://localhost/ocsreports/install.php. Aus Sicherheitsgründen erfordert es eine Autorisierung.
 .
 Lassen Sie dies leer, falls Sie den vordefinierten Benutzernamen »admin« verwenden möchten.
";
$elem["ocsinventory-reports/setup-username"]["descriptionfr"]="
 OCS Reports est fourni avec un script web de configuration et mise à jour. Le script est situé à l'adresse http://localhost/ocsreports/install.php. Pour des raisons de sécurité, il nécessite une identification.
 .
 Veuillez laisser le champ vide si vous décidez d'utiliser le nom d'utilisateur par défaut, « admin » .
";
$elem["ocsinventory-reports/setup-username"]["default"]="admin";
$elem["ocsinventory-reports/setup-password"]["type"]="password";
$elem["ocsinventory-reports/setup-password"]["description"]="Password for web-based setup system:
 OCS Reports comes with a web-based setup/upgrade script.
 The script is located at http://localhost/ocsreports/install.php.
 For security reasons it requires authorization.
 .
 You can manage the usernames and passwords with the `htpasswd' command.
 They are stored in /etc/ocsinventory/htpasswd.setup file.
 .
 Leave empty if you want to disable access to the web-based setup.
";
$elem["ocsinventory-reports/setup-password"]["descriptionde"]="Passwort für das webbasierte Einrichtungssystem:
 OCS Reports enthält ein webbasiertes Einrichtungs-/Upgrade-Skript. Das Skript befindet sich unter http://localhost/ocsreports/install.php. Aus Sicherheitsgründen erfordert es eine Autorisierung.
 .
 Sie können die Benutzernamen und Passwörter mit dem »htpasswd«-Befehl verwalten. Sie sind in der Datei /etc/ocsinventory/htpasswd.setup gespeichert.
 .
 Lassen Sie dies leer, falls Sie den Zugriff auf die webbasierte Einrichtung deaktivieren möchten.
";
$elem["ocsinventory-reports/setup-password"]["descriptionfr"]="Mot de passe pour le système web de configuration :
 OCS Reports est fourni avec un script web de configuration et mise à jour. Le script est situé à l'adresse http://localhost/ocsreports/install.php. Pour des raisons de sécurité, il nécessite une identification.
 .
 Vous pouvez gérer les identifiants et mots de passe avec la commande htpasswd.
 .
 Veuillez laisser ce champ vide si vous décidez de désactiver l'accès à la configuration web.
";
$elem["ocsinventory-reports/setup-password"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
