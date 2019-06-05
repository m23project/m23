<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icinga-cgi");

$elem["icinga/adminpassword"]["type"]="password";
$elem["icinga/adminpassword"]["description"]="Icinga web administration password:
 Please provide the password to be created with the \"icingaadmin\" user.
 .
 This is the username and password to use when connecting to the Icinga
 server after completing the configuration. If you do not provide
 a password, you will have to configure access to Icinga manually
 later on.
";
$elem["icinga/adminpassword"]["descriptionde"]="Passwort für die Web-Administration von Icinga:
 Bitte geben Sie das Passwort für den Benutzer »icingaadmin« ein.
 .
 Dies sind Benutzername und Passwort zur Anmeldung beim Icinga-Server nach dessen Einrichtung. Falls Sie kein Passwort eingeben, müssen Sie den Zugang zu Icinga manuell einrichten.
";
$elem["icinga/adminpassword"]["descriptionfr"]="Mot de passe pour l'administration web d'Icinga :
 Veuillez fournir le mot de passe à attribuer à l'identifiant « icingaadmin ».
 .
 Il s'agit de l'identifiant et du mot de passe qui devra être utilisé pour se connecter à Icinga une fois que l'installation sera terminée. Si vous ne fournissez pas de mot de passe, vous devrez configurer Icinga vous-même afin d'y accéder.
";
$elem["icinga/adminpassword"]["default"]="";
$elem["icinga/adminpassword-repeat"]["type"]="password";
$elem["icinga/adminpassword-repeat"]["description"]="Re-enter password to verify:
 Please enter the same user password again to verify you have typed it
 correctly.
";
$elem["icinga/adminpassword-repeat"]["descriptionde"]="Passwort nochmal eingeben:
 Bitte geben Sie dasselbe Passwort zur Überprüfung erneut ein.
";
$elem["icinga/adminpassword-repeat"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le même mot de passe afin de vérifier qu'il a été saisi correctement.
";
$elem["icinga/adminpassword-repeat"]["default"]="";
$elem["icinga/adminpassword-mismatch"]["type"]="error";
$elem["icinga/adminpassword-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["icinga/adminpassword-mismatch"]["descriptionde"]="Fehler bei der Passworteingabe
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte versuchen Sie es noch einmal.
";
$elem["icinga/adminpassword-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["icinga/adminpassword-mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
