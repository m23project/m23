<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("qpidd");

$elem["qpidd/password1"]["type"]="password";
$elem["qpidd/password1"]["description"]="Administrator password:
 Please enter the password for the Qpid daemon administrator.
";
$elem["qpidd/password1"]["descriptionde"]="Administratoren-Passwort:
 Bitte geben Sie das Passwort für den Qpid-Daemon-Administrator ein.
";
$elem["qpidd/password1"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez choisir le mot de passe pour l'administrateur du démon Qpid.
";
$elem["qpidd/password1"]["default"]="";
$elem["qpidd/password2"]["type"]="password";
$elem["qpidd/password2"]["description"]="Re-enter password to verify:
 Please enter the same Qpid daemon administrator password again to verify that you have typed it
 correctly.
";
$elem["qpidd/password2"]["descriptionde"]="Geben Sie das Passwort zur Überprüfung erneut ein:
 Bitte geben Sie das selbe Passwort für den Qpid-Daemon-Administrator erneut ein, um zu überprüfen, ob es korrekt geschrieben wurde.
";
$elem["qpidd/password2"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez indiquer à nouveau le mot de passe de l'administrateur du démon Qpid pour vérifier qu'il a été saisi correctement.
";
$elem["qpidd/password2"]["default"]="";
$elem["qpidd/password_mismatch"]["type"]="note";
$elem["qpidd/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["qpidd/password_mismatch"]["descriptionde"]="Fehler bei der Passworteingabe
 Die beiden von Ihnen eingegebenen Passwörter sind nicht gleich. Bitte versuchen Sie es erneut.
";
$elem["qpidd/password_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["qpidd/password_mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
