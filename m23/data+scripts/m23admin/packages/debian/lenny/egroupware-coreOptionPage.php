<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("egroupware-core");

$elem["egroupware/configuration/note"]["type"]="note";
$elem["egroupware/configuration/note"]["description"]="eGroupWare core package configuration note
 The eGroupWare core package configuration will only set up the
 administrator name and password.  To complete the initialization, point
 a web browser at the eGroupWare setup page at
 http(s)://${site}/egroupware/setup/.  There you can continue the
 configuration, initialize the database, and register installed eGroupWare
 applications.
";
$elem["egroupware/configuration/note"]["descriptionde"]="Konfigurationshinweis für eGroupware-Kernpaket
 Die Konfiguration des eGroupWare-Kernpakets richtet nur den Namen und das Passwort des Administrators ein. Um die Installation zu vervollständigen, rufen Sie die eGroupWare-Setup-Seite unter http(s)://${site}/egroupware/setup/ mit einem Webbrowser auf. Dort können Sie die Konfiguration fortsetzen, die Datenbank initialisieren und installierte eGroupWare-Anwendungen registrieren.
";
$elem["egroupware/configuration/note"]["descriptionfr"]="Configuration du paquet principal d'eGroupWare
 Le processus de configuration du paquet principal d'eGroupware ne permet que de définir l'identifiant et le mot de passe de l'administrateur. Afin de terminer l'initialisation, veuillez pointer votre navigateur vers la page de configuration d'eGroupWare qui se trouve normalement à l'adresse suivante : http(s)://${site}/egroupware/setup/.
";
$elem["egroupware/configuration/note"]["default"]="";
$elem["egroupware/header/user"]["type"]="string";
$elem["egroupware/header/user"]["description"]="Header admin user name:
 The header admin user can change various global configuration settings
 and add eGroupWare domains via a provided web interface.
";
$elem["egroupware/header/user"]["descriptionde"]="Name des Headerverwaltungsbenutzers:
 Der Headerverwaltungsbenutzer kann über ein Web-Interface diverse globale Konfigurationseinstellungen ändern und eGroupWare-Domains über eine Webschnittstelle anlegen.
";
$elem["egroupware/header/user"]["descriptionfr"]="Nom de l'administrateur :
 L'administrateur peut modifier différents paramètres de configuration et ajouter des domaines eGroupWare via l'interface web.
";
$elem["egroupware/header/user"]["default"]="admin";
$elem["egroupware/header/password"]["type"]="password";
$elem["egroupware/header/password"]["description"]="Header admin password:
 Please choose a password for the header admin user.
";
$elem["egroupware/header/password"]["descriptionde"]="Passwort für den Headerverwaltungsbenutzer:
 Bitte wählen Sie ein Passwort für den Headerverwaltungsbenutzer.
";
$elem["egroupware/header/password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez choisir un mot de passe pour l'administrateur.
";
$elem["egroupware/header/password"]["default"]="";
$elem["egroupware/header/password/confirm"]["type"]="password";
$elem["egroupware/header/password/confirm"]["description"]="Header admin password confirmation:
 Please confirm the header admin password.
";
$elem["egroupware/header/password/confirm"]["descriptionde"]="Passwort für den Headerverwaltungsbenutzer bestätigen:
 Passwort für den Headerverwaltungsbenutzer bitte bestätigen.
";
$elem["egroupware/header/password/confirm"]["descriptionfr"]="Confirmation du mot de passe de l'administrateur :
 Veuillez confirmer le mot de passe de l'administrateur :
";
$elem["egroupware/header/password/confirm"]["default"]="";
$elem["egroupware/header/password/mismatch"]["type"]="error";
$elem["egroupware/header/password/mismatch"]["description"]="Passwords mismatch
 The two passwords you entered were not the same.  Please try again.
";
$elem["egroupware/header/password/mismatch"]["descriptionde"]="Passwörter stimmten nicht überein.
 Die zwei Passwörter, die Sie eingegeben haben, stimmten nicht überein. Bitte versuchen Sie es nochmal.
";
$elem["egroupware/header/password/mismatch"]["descriptionfr"]="Mots de passe différents
 Le mot de passe et sa confirmation ne correspondent pas. Veuillez recommencer.
";
$elem["egroupware/header/password/mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
