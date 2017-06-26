<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phpbb3");

$elem["phpbb3/httpd"]["type"]="multiselect";
$elem["phpbb3/httpd"]["description"]="Web server to configure automatically:
 Please select any web server that should be configured automatically
 for phpBB.
";
$elem["phpbb3/httpd"]["descriptionde"]="Automatisch zu konfigurierende Webserver:
 Bitte wählen Sie die Webserver aus, die automatisch für phpBB konfiguriert werden sollen.
";
$elem["phpbb3/httpd"]["descriptionfr"]="Serveur web à configurer automatiquement :
 Veuillez choisir chaque serveur web à configurer automatiquement pour phpBB.
";
$elem["phpbb3/httpd"]["default"]="apache2";
$elem["phpbb3/admin-pass-ask"]["type"]="boolean";
$elem["phpbb3/admin-pass-ask"]["description"]="Configure the phpBB admin password?
";
$elem["phpbb3/admin-pass-ask"]["descriptionde"]="Das Passwort für den phpBB-Administrator konfigurieren?
";
$elem["phpbb3/admin-pass-ask"]["descriptionfr"]="Faut-il configurer le mot de passe de l'administrateur de phpBB ?
";
$elem["phpbb3/admin-pass-ask"]["default"]="";
$elem["phpbb3/admin-pass"]["type"]="password";
$elem["phpbb3/admin-pass"]["description"]="Password for phpBB admin:
 Please provide a password for the phpBB user \"admin\".
 .
 The password must be at least 6 characters long.
 .
 If the password is left blank, a random one will be generated.
";
$elem["phpbb3/admin-pass"]["descriptionde"]="Passwort für den phpBB-Administrator:
 Bitte geben Sie ein Passwort für den phpBB-Benutzer »admin« ein.
 .
 Das Passwort muss mindestens 6 Zeichen lang sein.
 .
 Falls das Passwort frei gelassen wird, wird ein zufälliges erzeugt.
";
$elem["phpbb3/admin-pass"]["descriptionfr"]="Mot de passe pour l'administrateur de phpBB :
 Veuillez fournir le mot de passe de l'identifiant « admin » de phpBB.
 .
 Le mot de passe doit être composé d'au moins six caractères.
 .
 Si le champ est laissé vide, un mot de passe aléatoire sera créé.
";
$elem["phpbb3/admin-pass"]["default"]="";
$elem["phpbb3/admin-pass-confirm"]["type"]="password";
$elem["phpbb3/admin-pass-confirm"]["description"]="Password confirmation:
 Please confirm the password for the phpBB user \"admin\".
";
$elem["phpbb3/admin-pass-confirm"]["descriptionde"]="Passwortbestätigung:
 Bitte bestätigen Sie das Passwort für den phpBB-Benutzer »admin«.
";
$elem["phpbb3/admin-pass-confirm"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez confirmer le mot de passe de l'identifiant « admin » de phpBB.
";
$elem["phpbb3/admin-pass-confirm"]["default"]="";
$elem["phpbb3/admin-pass-mismatch"]["type"]="error";
$elem["phpbb3/admin-pass-mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please try again.
";
$elem["phpbb3/admin-pass-mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden Passwörter, die Sie eingegeben haben, stimmen nicht überein. Bitte versuchen Sie es erneut.
";
$elem["phpbb3/admin-pass-mismatch"]["descriptionfr"]="Mots de passe différents
 Les deux mots de passes saisis ne correspondent pas. Veuillez recommencer.
";
$elem["phpbb3/admin-pass-mismatch"]["default"]="";
$elem["phpbb3/admin-pass-generated"]["type"]="note";
$elem["phpbb3/admin-pass-generated"]["description"]="Generation of random password
 The following random password has been configured for the admin user:
 .
 ${genpass}
 .
 Make sure you remember it, as it will not be stored in cleartext.
";
$elem["phpbb3/admin-pass-generated"]["descriptionde"]="Erzeugen eines zufälligen Passwortes
 Das folgende zufällige Passwort wurde für den Administrator erzeugt:
 .
 ${genpass}
 .
 Merken Sie sich das Passwort, da es nicht im Klartext gespeichert wird.
";
$elem["phpbb3/admin-pass-generated"]["descriptionfr"]="Création d'un mot de passe aléatoire
 Le mot de passe aléatoire suivant a été configuré pour l'identifiant « admin » :
 .
 ${genpass}
 .
 Il est important de le retenir immédiatement, car il ne sera pas conservé en clair.
";
$elem["phpbb3/admin-pass-generated"]["default"]="";
$elem["phpbb3/admin-pass-requirements"]["type"]="error";
$elem["phpbb3/admin-pass-requirements"]["description"]="Password complexity requirements
 The password must be at least 6 characters long.
";
$elem["phpbb3/admin-pass-requirements"]["descriptionde"]="Anforderungen an die Passwort-Komplexität
 Das Passwort muss mindestens 6 Zeichen lang sein.
";
$elem["phpbb3/admin-pass-requirements"]["descriptionfr"]="Exigences de complexité pour le mot de passe
 Le mot de passe doit être composé d'au moins six caractères.
";
$elem["phpbb3/admin-pass-requirements"]["default"]="";
PKG_OptionPageTail2($elem);
?>
