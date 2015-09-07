<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wvdial");

$elem["wvdial/wvdialconf"]["type"]="boolean";
$elem["wvdial/wvdialconf"]["description"]="Automatically detect and configure your modem?
 WvDial can automatically detect your modem and create its configuration
 file. This detection may cause problems with some computers.
 .
 You may reconfigure WvDial by running a program called wvdialconf which
 will write these settings into the /etc/wvdial.conf file.
";
$elem["wvdial/wvdialconf"]["descriptionde"]="Ihr Modem automatisch erkennen und einrichten?
 WvDial kann Ihr Modem automatisch erkennen und eine entsprechende Konfigurationsdatei erzeugen. Diese Erkennung kann auf einigen Computern Probleme verursachen.
 .
 Sie können WvDial mit dem Programm wvdialconf erneut einrichten. Die Einstellungen werden in der Datei /etc/wvdial.conf gespeichert.
";
$elem["wvdial/wvdialconf"]["descriptionfr"]="Faut-il détecter et configurer automatiquement votre modem ?
 WvDial peut détecter automatiquement votre modem et créer le fichier de configuration s'y rapportant. Cette détection peut être source de difficultés avec certains ordinateurs.
 .
 Vous pouvez reconfigurer WvDial en lançant le programme wvdialconf qui écrira les nouveaux paramètres dans le fichier de configuration /etc/wvdial.conf.
";
$elem["wvdial/wvdialconf"]["default"]="true";
$elem["wvdial/phone"]["type"]="string";
$elem["wvdial/phone"]["description"]="Internet service provider's telephone number
 Please provide the telephone number that your Internet service provider
 (ISP) has given to you.
";
$elem["wvdial/phone"]["descriptionde"]="Telefonnummer des Internet-Anbieters
 Bitte geben Sie die Telefonnummer ein, die Sie von Ihrem Internet-Anbieter erhalten haben.
";
$elem["wvdial/phone"]["descriptionfr"]="Numéro de téléphone du fournisseur d'accès à internet :
 Veuillez indiquer le numéro de téléphone que votre fournisseur d'accès à internet (FAI) vous a transmis.
";
$elem["wvdial/phone"]["default"]="";
$elem["wvdial/login"]["type"]="string";
$elem["wvdial/login"]["description"]="User name
 Please provide the user name or login for your account with your ISP.
";
$elem["wvdial/login"]["descriptionde"]="Benutzername
 Bitte geben Sie den Benutzernamen für Ihren Zugang bei Ihrem ISP ein.
";
$elem["wvdial/login"]["descriptionfr"]="Identifiant :
 Veuillez indiquer l'identifiant (« login ») que votre fournisseur (FAI) vous a attribué lors de l'ouverture de votre compte.
";
$elem["wvdial/login"]["default"]="";
$elem["wvdial/passphrase"]["type"]="password";
$elem["wvdial/passphrase"]["description"]="Passphrase
 Please provide the password or passphrase that unlocks access to your
 account.
";
$elem["wvdial/passphrase"]["descriptionde"]="Passphrase
 Bitte geben Sie das Passwort oder die Passphrase ein, welches Ihren Zugang freischaltet.
";
$elem["wvdial/passphrase"]["descriptionfr"]="Mot de passe :
 Veuillez indiquer le mot de passe ou la phrase clé qui contrôle l'accès à votre compte.
";
$elem["wvdial/passphrase"]["default"]="";
$elem["wvdial/passphrase2"]["type"]="password";
$elem["wvdial/passphrase2"]["description"]="Again
 Retype the password or passphrase for verification.
";
$elem["wvdial/passphrase2"]["descriptionde"]="Wiederholung
 Geben Sie zur Überprüfung das Passwort oder die Passphrase erneut ein.
";
$elem["wvdial/passphrase2"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez confirmer le mot de passe ou la phrase clé pour vérification.
";
$elem["wvdial/passphrase2"]["default"]="";
$elem["wvdial/passphrases_mismatch"]["type"]="note";
$elem["wvdial/passphrases_mismatch"]["description"]="Passphrases must match
 The two passphrases that you entered do not match. Please retype them.
";
$elem["wvdial/passphrases_mismatch"]["descriptionde"]="Passphrasen müssen übereinstimmen
 Die beiden Passphrasen, die Sie eingaben, stimmen nicht überein. Bitte wiederholen Sie Ihre Eingabe.
";
$elem["wvdial/passphrases_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous venez d'indiquer sont différents. Veuillez les saisir à nouveau.
";
$elem["wvdial/passphrases_mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
