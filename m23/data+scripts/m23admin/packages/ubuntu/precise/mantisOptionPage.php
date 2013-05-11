<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mantis");

$elem["mantis/webserver"]["type"]="select";
$elem["mantis/webserver"]["description"]="Web server to configure for Mantis:
 Please choose the Web server that should be automatically configured
 to run Mantis on this system.
";
$elem["mantis/webserver"]["descriptionde"]="Webserver, der für Mantis konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch konfiguriert werden soll, um Mantis auf diesem System auszuführen.
";
$elem["mantis/webserver"]["descriptionfr"]="Serveur web à configurer pour Mantis :
 Veuillez choisir le serveur web qui doit être configuré automatiquement pour permettre l'utilisation de Mantis sur ce système.
";
$elem["mantis/webserver"]["default"]="apache2";
$elem["mantis/htaccess_user"]["type"]="string";
$elem["mantis/htaccess_user"]["description"]="Web server authentication username for Mantis:
 The /admin directory for Mantis will be protected with htaccess,
 allowing only the authenticated user to set up the database.
 .
 Please specify a username.
";
$elem["mantis/htaccess_user"]["descriptionde"]="Benutzername zur Webserver-Authentifizierung für Mantis:
 Das Verzeichnis /admin für Mantis wird mit htaccess geschützt, so dass nur dem authentifizierten Benutzer gestattet ist, die Datenbank einzurichten.
 .
 Bitte geben Sie einen Benutzernamen an.
";
$elem["mantis/htaccess_user"]["descriptionfr"]="Identifiant pour l'administration de Mantis par le web :
 Le répertoire /admin de Mantis est protégé par un identifiant et un mot de passe d'administration afin de restreindre l'accès à la configuration de la base de données.
 .
 Veuillez indiquer l'identifiant à utiliser.
";
$elem["mantis/htaccess_user"]["default"]="admin";
$elem["mantis/htaccess_passwd"]["type"]="password";
$elem["mantis/htaccess_passwd"]["description"]="Web server authentication password for Mantis:
 The /admin directory for Mantis will be protected with htaccess,
 allowing only the authenticated user to set up the database.
 .
 Please specify a password.
";
$elem["mantis/htaccess_passwd"]["descriptionde"]="Passwort zur Webserver-Authentifizierung für Mantis:
 Das Verzeichnis /admin für Mantis wird mit htaccess geschützt, so dass nur dem authentifizierten Benutzer gestattet ist, die Datenbank einzurichten.
 .
 Bitte geben Sie ein Passwort an.
";
$elem["mantis/htaccess_passwd"]["descriptionfr"]="Mot de passe pour l'administration de Mantis par le web :
 Le répertoire /admin de Mantis est protégé par un identifiant et un mot de passe d'administration afin de restreindre l'accès à la configuration de la base de données.
 .
 Veuillez choisir le mot de passe d'administration de Mantis.
";
$elem["mantis/htaccess_passwd"]["default"]="";
$elem["mantis/htaccess_passwd_verification"]["type"]="password";
$elem["mantis/htaccess_passwd_verification"]["description"]="Re-enter password to verify:
 Please enter the same user password again to verify you have
 typed it correctly.
";
$elem["mantis/htaccess_passwd_verification"]["descriptionde"]="Geben Sie zur Überprüfung das Passwort erneut ein:
 Bitte geben Sie das gleiche Benutzerpasswort wieder ein, um zu prüfen, ob Sie es korrekt eingetippt haben.
";
$elem["mantis/htaccess_passwd_verification"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe afin de vérifier qu'il a été saisi correctement.
";
$elem["mantis/htaccess_passwd_verification"]["default"]="";
$elem["mantis/htaccess_password_invalid"]["type"]="error";
$elem["mantis/htaccess_password_invalid"]["description"]="Password input error
 The two passwords you entered were empty or not the same.
 .
 Please try again.
";
$elem["mantis/htaccess_password_invalid"]["descriptionde"]="Passworteingabefehler
 Die beiden von Ihnen eingegegenen Passwörter waren leer oder stimmten nicht überein.
 .
 Bitte versuchen Sie es erneut.
";
$elem["mantis/htaccess_password_invalid"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents.
 .
 Veuillez recommencer.
";
$elem["mantis/htaccess_password_invalid"]["default"]="";
$elem["mantis/reload_webserver"]["type"]="boolean";
$elem["mantis/reload_webserver"]["description"]="Restart web server after Mantis installation?
 In order to activate Mantis, the web server should be restarted.
 .
 Please choose whether you want to do this now or if you prefer
 restarting it manually.
";
$elem["mantis/reload_webserver"]["descriptionde"]="Den Webserver nach der Mantis-Installation neu starten?
 Um Mantis zu aktivieren, sollte der Webserver neu gestartet werden.
 .
 Bitte wählen Sie, ob Sie dies nun tun möchten oder ob sie es vorziehen, ihn manuell neu zu starten.
";
$elem["mantis/reload_webserver"]["descriptionfr"]="Faut-il redémarrer le serveur web après l'installation de Mantis ?
 Le serveur web doit être redémarré pour mettre Mantis en service.
 .
 Veuillez choisir si vous souhaitez que ce redémarrage ait lieu automatiquement maintenant ou si vous préférez redémarrer le serveur web plus tard vous-même.
";
$elem["mantis/reload_webserver"]["default"]="";
$elem["mantis/installation_summary"]["type"]="note";
$elem["mantis/installation_summary"]["description"]="Installation complete
 Mantis has been installed on this system but still may require
 further configuration.
 .
 Please read /usr/share/doc/mantis/README.Debian carefully.
 .
 You should point your browser to
 http://<yourhost>/mantis/admin/install.php
 in order to install or update the Mantis database.
 .
 The Mantis database is not automatically removed when the package
 is uninstalled; this must be done manually if required.
";
$elem["mantis/installation_summary"]["descriptionde"]="Installation vollständig
 Mantis wurde auf diesem System installiert, könnte aber noch weitere Konfiguration benötigen.
 .
 Bitte lesen Sie sorgfältig /usr/share/doc/mantis/README.Debian.
 .
 Um die Mantis-Datenbank zu installieren oder zu aktualisieren, sollten Sie mit Ihrem Browser auf http://<yourhost>/mantis/admin/install.php gehen.
 .
 Die Mantis-Datenbank wird nicht automatisch entfernt, wenn das Paket deinstalliert wird; dies muss, falls erforderlich, manuell erledigt werden.
";
$elem["mantis/installation_summary"]["descriptionfr"]="Intallation de Mantis terminée
 Mantis a été installé sur ce système mais peut nécessiter une configuration complémentaire.
 .
 Veuillez lire attentivement le fichier /usr/share/doc/mantis/README.Debian.
 .
 Vous pouvez vous rendre à l'adresse http://<votresysteme>/mantis/admin/install.php pour installer ou configurer la base de données de Mantis.
 .
 La base de données de Mantis n'est pas supprimée automatiquement quand le paquet est retiré du système. Elle peut être supprimée manuellement plus tard.
";
$elem["mantis/installation_summary"]["default"]="";
PKG_OptionPageTail2($elem);
?>
