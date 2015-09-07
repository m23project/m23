<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ntop");

$elem["ntop/user"]["type"]="string";
$elem["ntop/user"]["description"]="User for the ntop process to run as:
 Please choose the login that should be used to execute the ntop
 process. The use of the root user is not allowed.
 .
 The account will be created if it does not already exist, but
 if you leave it blank, no login will be created and ntop will
 not run until manually configured.
";
$elem["ntop/user"]["descriptionde"]="Benutzer, unter dem der Ntop-Prozess laufen soll:
 Bitte wählen Sie das Benutzerkonto aus, die zur Ausführung des Ntop-Prozesses verwandt werden soll. Die Verwendung des Benutzers »root« ist nicht erlaubt.
 .
 Falls das Konto noch nicht existiert, wird es erstellt. Falls Sie das Feld leer lassen, wird kein Benutzerkonto erstellt und Ntop wird erst laufen, wenn Sie es manuell konfiguriert haben.
";
$elem["ntop/user"]["descriptionfr"]="Identifiant pour l'exécution de ntop :
 Veuillez choisir l'identifiant utilisé pour exécuter ntop. L'utilisation du superutilisateur (« root ») n'est pas autorisée.
 .
 L'identifiant sera créé s'il n'existe pas, mais si vous laissez ce champ vide, aucun identifiant ne sera créé et ntop ne pourra pas être exécuté tant que vous n'en aurez pas créé un vous-même.
";
$elem["ntop/user"]["default"]="ntop";
$elem["ntop/interfaces"]["type"]="string";
$elem["ntop/interfaces"]["description"]="Interfaces for ntop to listen on:
 Please enter a comma-separated list of interfaces that ntop
 should listen on.
";
$elem["ntop/interfaces"]["descriptionde"]="Schnittstellen, auf denen Ntop auf Anfragen warten soll:
 Bitte geben Sie eine durch Kommata getrennte Liste von Schnittstellen an, auf denen Ntop auf Anfragen warten soll.
";
$elem["ntop/interfaces"]["descriptionfr"]="Interfaces sur lesquelles ntop sera à l'écoute :
 Veuillez indiquer, séparées par des virgules, la liste des interfaces sur lesquelles ntop doit être à l'écoute.
";
$elem["ntop/interfaces"]["default"]="eth0";
$elem["ntop/admin_password"]["type"]="password";
$elem["ntop/admin_password"]["description"]="Administrator password:
 Please choose a password to be used for the privileged user \"admin\" in
 ntop's web interface.
";
$elem["ntop/admin_password"]["descriptionde"]="Passwort des Administrators:
 Bitte wählen Sie ein Passwort aus, das für den privilegierten Benutzer »admin« in der Webschnittstelle von Ntop verwandt wird.
";
$elem["ntop/admin_password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez choisir un mot de passe pour l'identifiant « admin » pour l'interface web de ntop.
";
$elem["ntop/admin_password"]["default"]="";
$elem["ntop/admin_password_again"]["type"]="password";
$elem["ntop/admin_password_again"]["description"]="Re-enter password to verify:
 Please enter the same password again to verify that you have typed it
 correctly.
";
$elem["ntop/admin_password_again"]["descriptionde"]="Wiederholung der Passworteingabe zur Überprüfung:
 Bitte geben Sie das gleiche Passwort erneut ein, um zu überprüfen, dass Sie es korrekt eingegeben haben.
";
$elem["ntop/admin_password_again"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer le même mot de passe pour vérification.
";
$elem["ntop/admin_password_again"]["default"]="";
$elem["ntop/password_empty"]["type"]="error";
$elem["ntop/password_empty"]["description"]="Empty password
 You entered an empty password, which is not allowed.
 Please choose a non-empty password.
";
$elem["ntop/password_empty"]["descriptionde"]="Leeres Passwort
 Sie haben ein leeres Passwort eingegeben. Das ist nicht erlaubt. Bitte wählen sie ein nichtleeres Passwort.
";
$elem["ntop/password_empty"]["descriptionfr"]="Mot de passe vide
 Vous avez entré un mot de passe vide, ce qui n'est pas autorisé. Veuillez choisir un mot de passe non vide.
";
$elem["ntop/password_empty"]["default"]="";
$elem["ntop/password_mismatch"]["type"]="error";
$elem["ntop/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["ntop/password_mismatch"]["descriptionde"]="Passworteingabefehler
 Die zwei eingegebenen Passwörter waren nicht identisch. Bitte versuchen Sie es erneut.
";
$elem["ntop/password_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["ntop/password_mismatch"]["default"]="";
$elem["ntop/password_reset"]["type"]="boolean";
$elem["ntop/password_reset"]["description"]="Set a new administrator password?
 A password for ntop's administrative web interface has already been set.
 .
 Please choose whether you want to change that password.
";
$elem["ntop/password_reset"]["descriptionde"]="Neues administratives Passwort setzen?
 Für Ntops administrative Webschnittstelle wurde bereits ein Passwort gesetzt.
 .
 Bitte wählen Sie aus, ob Sie dieses Passwort ändern möchten.
";
$elem["ntop/password_reset"]["descriptionfr"]="Faut-il créer un nouveau mot de passe pour l'administrateur ?
 Un mot de passe pour l'interface web de ntop a déjà été créé.
 .
 Vous pouvez choisir de changer ce mot de passe.
";
$elem["ntop/password_reset"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
