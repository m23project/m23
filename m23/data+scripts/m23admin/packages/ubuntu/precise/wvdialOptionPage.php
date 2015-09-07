<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wvdial");

$elem["wvdial/wvdialconf"]["type"]="boolean";
$elem["wvdial/wvdialconf"]["description"]="Automatically detect and configure the modem?
 WvDial can automatically detect the modem and create its configuration
 file. This detection may cause problems with some computers.
 .
 You may reconfigure WvDial by running a program called wvdialconf which
 will write these settings into the /etc/wvdial.conf file.
";
$elem["wvdial/wvdialconf"]["descriptionde"]="Das Modem automatisch erkennen und einrichten?
 WvDial kann das Modem automatisch erkennen und eine entsprechende Konfigurationsdatei erzeugen. Diese Erkennung kann auf einigen Rechnern Probleme verursachen.
 .
 Sie können WvDial mit dem Programm wvdialconf erneut einrichten. Die Einstellungen werden in der Datei /etc/wvdial.conf gespeichert.
";
$elem["wvdial/wvdialconf"]["descriptionfr"]="Faut-il détecter et configurer automatiquement le modem ?
 WvDial peut détecter automatiquement le modem et créer le fichier de configuration correspondant. Cette détection peut être source de difficultés avec certains ordinateurs.
 .
 Vous pouvez reconfigurer WvDial en lançant le programme wvdialconf qui écrira les nouveaux paramètres dans le fichier de configuration /etc/wvdial.conf.
";
$elem["wvdial/wvdialconf"]["default"]="true";
$elem["wvdial/phone"]["type"]="string";
$elem["wvdial/phone"]["description"]="ISP's telephone number:
 Please enter the telephone number that should be used to connect to the
 Internet Service Provider (ISP).
";
$elem["wvdial/phone"]["descriptionde"]="Telefonnummer des Internet-Anbieters:
 Bitte geben Sie die Telefonnummer ein, die für die Verbindung zu Ihrem Internet-Anbieter verwendet werden soll.
";
$elem["wvdial/phone"]["descriptionfr"]="Numéro de téléphone du FAI :
 Veuillez saisir le numéro de téléphone à utiliser pour se connecter au fournisseur d'accès à internet (FAI).
";
$elem["wvdial/phone"]["default"]="";
$elem["wvdial/login"]["type"]="string";
$elem["wvdial/login"]["description"]="Account username:
 Please enter the username or login for an account issued by the ISP.
";
$elem["wvdial/login"]["descriptionde"]="Benutzerkonto:
 Bitte geben Sie den Benutzernamen oder die Benutzerkennung (Login) für den Zugang bei Ihrem Internet-Anbieter ein.
";
$elem["wvdial/login"]["descriptionfr"]="Identifiant du compte :
 Veuillez saisir l'identifiant utilisateur (ou « login ») du compte attribué par le FAI.
";
$elem["wvdial/login"]["default"]="";
$elem["wvdial/passphrase"]["type"]="password";
$elem["wvdial/passphrase"]["description"]="Account passphrase:
 Please enter the password or passphrase that corresponds with the account
 username.
";
$elem["wvdial/passphrase"]["descriptionde"]="Passphrase für das Konto:
 Bitte geben Sie das Passwort oder die Passphrase für die Freischaltung Ihres Zugangs ein.
";
$elem["wvdial/passphrase"]["descriptionfr"]="Mot de passe du compte :
 Veuillez saisir le mot de passe ou la phrase secrète qui correspond à l'identifiant du compte.
";
$elem["wvdial/passphrase"]["default"]="";
$elem["wvdial/passphrase2"]["type"]="password";
$elem["wvdial/passphrase2"]["description"]="Confirm passphrase:
 Please enter the password or passphrase again for verification.
";
$elem["wvdial/passphrase2"]["descriptionde"]="Passphrase bestätigen:
 Geben Sie zur Überprüfung das Passwort oder die Passphrase erneut ein.
";
$elem["wvdial/passphrase2"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez saisir à nouveau le mot de passe ou la phrase secrète pour vérification.
";
$elem["wvdial/passphrase2"]["default"]="";
$elem["wvdial/passphrases_mismatch"]["type"]="error";
$elem["wvdial/passphrases_mismatch"]["description"]="Passphrase mismatch
 The passphrase and its confirmation do not match.
";
$elem["wvdial/passphrases_mismatch"]["descriptionde"]="Passphrasen unterschiedlich
 Die Passphrase und ihre Wiederholung stimmen nicht überein.
";
$elem["wvdial/passphrases_mismatch"]["descriptionfr"]="Les mots de passe sont différents
 Le mot de passe et sa confirmation doivent être identiques.
";
$elem["wvdial/passphrases_mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
