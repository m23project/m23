<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icinga2-classicui");

$elem["icinga2-classicui/adminpassword"]["type"]="password";
$elem["icinga2-classicui/adminpassword"]["description"]="Icinga 2 ClassicUI administration password:
 Please provide the password to be created with the \"icingaadmin\" user.
 .
 This is the username and password to use when connecting to the Icinga
 server after completing the configuration. If you do not provide
 a password, you will have to configure access to Icinga manually
 later on.
";
$elem["icinga2-classicui/adminpassword"]["descriptionde"]="Administrationspasswort der ClassicUI von Icinga 2:
 Bitte geben Sie das Passwort an, das für den Benutzer »icingaadmin« angelegt werden soll.
 .
 Dies sind der Benutzername und das Passwort, die nach Abschluss der Konfiguration zum Verbinden mit dem Icinga-Server verwendet werden. Falls Sie kein Passwort angeben, müssen Sie den Zugriff auf Icinga später manuell einrichten.
";
$elem["icinga2-classicui/adminpassword"]["descriptionfr"]="Mot de passe pour l'administrateur d'Icinga 2 ClassicUI :
 Veuillez indiquer le mot de passe pour l'utilisateur « icingaadmin ».
 .
 L'identifiant « icingaadmin » et le mot de passe entré ci-dessous sont à utiliser pour se connecter au serveur Icinga à la fin de la configuration. Si vous n'indiquez pas de mot de passe ici, vous devrez configurer l'accès à Icinga plus tard.
";
$elem["icinga2-classicui/adminpassword"]["default"]="";
$elem["icinga2-classicui/adminpassword-repeat"]["type"]="password";
$elem["icinga2-classicui/adminpassword-repeat"]["description"]="Re-enter password to verify:
 Please enter the same user password again to verify you have typed it
 correctly.
";
$elem["icinga2-classicui/adminpassword-repeat"]["descriptionde"]="Geben Sie dass Passwort zu Kontrolle erneut ein:
 Bitte geben Sie dasselbe Passwort erneut ein, um zu prüfen, ob Sie es korrekt eingetippt haben.
";
$elem["icinga2-classicui/adminpassword-repeat"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe pour l'utilisateur afin de vérifier qu'il a été saisi correctement.
";
$elem["icinga2-classicui/adminpassword-repeat"]["default"]="";
$elem["icinga2-classicui/adminpassword-mismatch"]["type"]="error";
$elem["icinga2-classicui/adminpassword-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["icinga2-classicui/adminpassword-mismatch"]["descriptionde"]="Passworteingabefehler
 Die beiden von Ihnen eingegebenen Passwörter sind nicht gleich. Bitte versuchen Sie es erneut.
";
$elem["icinga2-classicui/adminpassword-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez indiqués sont différents. Veuillez recommencer.
";
$elem["icinga2-classicui/adminpassword-mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
