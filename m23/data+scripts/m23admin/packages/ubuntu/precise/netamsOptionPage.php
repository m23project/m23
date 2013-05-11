<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("netams");

$elem["netams/reconfigure-webserver"]["type"]="multiselect";
$elem["netams/reconfigure-webserver"]["choices"][1]="apache2";
$elem["netams/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 for NeTAMS statistics.
";
$elem["netams/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Webserver aus, der für NeTAMS-Statistiken automatisch neu konfiguriert werden soll.
";
$elem["netams/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement:
 Veuillez choisir le serveur web qui sera automatiquement configuré pour les statistiques de NeTAMS.
";
$elem["netams/reconfigure-webserver"]["default"]="";
$elem["netams/admin-password"]["type"]="password";
$elem["netams/admin-password"]["description"]="NeTAMS administrator password:
 Please specify a password for the \"admin\" user of NeTAMS.
";
$elem["netams/admin-password"]["descriptionde"]="Passwort des NeTAMS-Administrators:
 Bitte geben Sie das Passwort für den Benutzer »admin« von NeTAMS an.
";
$elem["netams/admin-password"]["descriptionfr"]="Mot de passe de l'administrateur de NeTAMS :
 Veuillez choisir un mot de passe pour l'utilisateur « admin » de NetAMS.
";
$elem["netams/admin-password"]["default"]="";
$elem["netams/admin-password-again"]["type"]="password";
$elem["netams/admin-password-again"]["description"]="NeTAMS administrator password confirmation:
";
$elem["netams/admin-password-again"]["descriptionde"]="Bestätigung des Passworts des NeTAMS-Administrators:
";
$elem["netams/admin-password-again"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["netams/admin-password-again"]["default"]="";
$elem["netams/password-mismatch"]["type"]="error";
$elem["netams/password-mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please enter a password
 again.
";
$elem["netams/password-mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden von Ihnen eingegebenen Passwörter sind nicht identisch. Bitte geben Sie erneut ein Passwort ein
";
$elem["netams/password-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe indiqués ne correspondent pas. Veuillez choisir à nouveau un mot de passe.
";
$elem["netams/password-mismatch"]["default"]="";
$elem["netams/password-empty"]["type"]="error";
$elem["netams/password-empty"]["description"]="Empty password
 You entered an empty password, which is not allowed. Please choose a non-
 empty password.
";
$elem["netams/password-empty"]["descriptionde"]="Leeres Passwort
 Das von Ihnen eingegebene Passwort ist leer, was nicht erlaubt ist. Bitte geben Sie ein Passwort mit mindestens einem Zeichen ein.
";
$elem["netams/password-empty"]["descriptionfr"]="Mot de passe vide
 Vous avez choisi un mot de passe vide, ce qui n'est pas autorisé. Veuillez choisir un mot de passe non vide.
";
$elem["netams/password-empty"]["default"]="";
PKG_OptionPageTail2($elem);
?>
