<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pinto");

$elem["pinto/adminpassword"]["type"]="password";
$elem["pinto/adminpassword"]["description"]="Pinto web administration password:
 Please choose the password for the \"pintoadmin\" user.
 .
 This username/password combination is needed, after installation, to log
 in to Pinto through its web interface.
 .
 If this is left empty, you will have to manually configure
 accounts for Pinto.
";
$elem["pinto/adminpassword"]["descriptionde"]="Web-Administrationspasswort für Pinto:
 Bitte wählen Sie das Passwort für den Benutzer »pintoadmin«.
 .
 Diese Kombination aus Benutzer und Passwort wird nach der Installation zur Anmeldung bei Pinto über seine Web-Oberfläche benötigt.
 .
 Falls dies leer gelassen wird, müssen Sie die Pinto-Konten manuell konfigurieren.
";
$elem["pinto/adminpassword"]["descriptionfr"]="Mot de passe pour l'interface d'administration web de Pinto :
 Veuillez choisir le mot de passe pour l'utilisateur « pintoadmin ».
 .
 Cette combinaison nom d'utilisateur/mot de passe est nécessaire, après l'installation, pour s'authentifier dans Pinto via son interface web.
 .
 Si ce champ est laissé vide, vous devrez configurer manuellement les comptes pour Pinto.
";
$elem["pinto/adminpassword"]["default"]="";
$elem["pinto/adminpassword-repeat"]["type"]="password";
$elem["pinto/adminpassword-repeat"]["description"]="Re-enter password to verify:
 Please enter the same user password again to verify you have typed it
 correctly.
";
$elem["pinto/adminpassword-repeat"]["descriptionde"]="Geben Sie das Passwort zur Kontrolle erneut ein:
 Bitte geben Sie das Passwort erneut ein, um die korrekte Schreibweise zu prüfen.
";
$elem["pinto/adminpassword-repeat"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe afin de vérifier qu'il a été saisi correctement.
";
$elem["pinto/adminpassword-repeat"]["default"]="";
$elem["pinto/adminpassword-mismatch"]["type"]="error";
$elem["pinto/adminpassword-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["pinto/adminpassword-mismatch"]["descriptionde"]="Fehler bei der Passworteingabe
 Die beiden von Ihnen eingegebenen Passwörter waren nicht gleich. Bitte versuchen Sie es erneut.
";
$elem["pinto/adminpassword-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["pinto/adminpassword-mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
