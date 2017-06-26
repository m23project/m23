<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debian-edu-config");

$elem["debian-edu-config/update-hostname"]["type"]="boolean";
$elem["debian-edu-config/update-hostname"]["description"]="Should the init.d/update-hostname script run at boot time?
";
$elem["debian-edu-config/update-hostname"]["descriptionde"]="Soll das Init.d-/Update-hostname-Skript beim Systemstart ausgeführt werden?
";
$elem["debian-edu-config/update-hostname"]["descriptionfr"]="Faut-il exécuter le script « init.d/update-hostname » au démarrage ?
";
$elem["debian-edu-config/update-hostname"]["default"]="false";
$elem["debian-edu-config/enable-nat"]["type"]="boolean";
$elem["debian-edu-config/enable-nat"]["description"]="Do you want to run enable-nat on your system?
 The enable-nat script activates NAT for your Thin-Clients and overwrites
 your iptables rules.
";
$elem["debian-edu-config/enable-nat"]["descriptionde"]="Möchten Sie Enable-nat auf Ihrem System ausführen?
 Das Enable-nat-Skript aktiviert NAT auf Ihren Thin-Clients und überschreibt Ihre Iptables-Regeln.
";
$elem["debian-edu-config/enable-nat"]["descriptionfr"]="Faut-il exécuter le script « enable-nat » sur le système ?
 Le script « enable-nat » active la traduction d'adresses (« NAT ») pour les clients légers et remplace les règles iptables.
";
$elem["debian-edu-config/enable-nat"]["default"]="false";
$elem["debian-edu-config/kdc-password"]["type"]="password";
$elem["debian-edu-config/kdc-password"]["description"]="Enter the Kerberos KDC master key:
 A password is needed as Kerberos master key and for all default principals. 
 You can use your root password or type something else. Make sure you remember
 the password. 
 .
 Note that you will not be able to see the password as you type it.
";
$elem["debian-edu-config/kdc-password"]["descriptionde"]="Geben Sie den Kerberos-KDC-Master-Schlüssel ein:
 Als Kerberos-Master-Schlüssel und für alle vorgegebenen Principals wird ein Passwort benötigt. Sie können Ihr Root-Passwort benutzen oder etwas anderes eintippen. Vergessen Sie dieses Passwort nicht!
 .
 Beachten Sie, dass Sie das Passwort beim Eintippen nicht sehen können.
";
$elem["debian-edu-config/kdc-password"]["descriptionfr"]="Veuillez indiquer la clé principale du KDC (« Key Distribution Center ») de Kerberos :
 Un mot de passe est nécessaire comme clé principale de Kerberos, ainsi que pour l'ensemble des Principaux par défaut. Vous pouvez utiliser le mot de passe du superutilisateur ou bien en saisir un autre. Veillez à bien retenir ce mot de passe.
 .
 Veuillez noter que vous ne pourrez pas lire votre saisie.
";
$elem["debian-edu-config/kdc-password"]["default"]="";
$elem["debian-edu-config/kdc-password-again"]["type"]="password";
$elem["debian-edu-config/kdc-password-again"]["description"]="Re-enter password to verify:
 Please enter the same password again to verify that you have typed it
 correctly.
";
$elem["debian-edu-config/kdc-password-again"]["descriptionde"]="Geben Sie das Passwort zur Kontrolle erneut ein:
 Bitte geben Sie dasselbe Passwort erneut ein, um zu prüfen, ob Sie es korrekt eingetippt haben.
";
$elem["debian-edu-config/kdc-password-again"]["descriptionfr"]="Veuillez saisir à nouveau le mot de passe :
 Merci de saisir à nouveau le même mot de passe afin de vérifier que vous l'avez écrit correctement.
";
$elem["debian-edu-config/kdc-password-again"]["default"]="";
$elem["debian-edu-config/kdc-password-mismatch"]["type"]="error";
$elem["debian-edu-config/kdc-password-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["debian-edu-config/kdc-password-mismatch"]["descriptionde"]="Passworteingabefehler
 Die beiden von Ihnen eingegebenen Passwörter sind nicht gleich. Bitte versuchen Sie es erneut.
";
$elem["debian-edu-config/kdc-password-mismatch"]["descriptionfr"]="Erreur de saisie de mot de passe
 Les deux mots de passe donnés sont différents. Veuillez les saisir à nouveau.
";
$elem["debian-edu-config/kdc-password-mismatch"]["default"]="";
$elem["debian-edu-config/kdc-password-empty"]["type"]="error";
$elem["debian-edu-config/kdc-password-empty"]["description"]="Empty password
 You entered an empty password, which is not allowed.
 Please choose a non-empty password.
";
$elem["debian-edu-config/kdc-password-empty"]["descriptionde"]="Kein Passwort
 Sie haben kein Passwort eingegeben. Dies ist nicht erlaubt. Bitte wählen Sie ein Passwort.
";
$elem["debian-edu-config/kdc-password-empty"]["descriptionfr"]="Mot de passe vide
 Le mot de passe saisi est vide, ce qui n'est pas autorisé. Veuillez indiquer un mot de passe non vide.
";
$elem["debian-edu-config/kdc-password-empty"]["default"]="";
$elem["debian-edu-config/ldap-password"]["type"]="password";
$elem["debian-edu-config/ldap-password"]["description"]="Enter the LDAP super-admin password:
 A password is used as initial password for the super-admin user of GOsa².
 You can use your root password or type something else. Make sure you remember
 the password. 
 .
 Note that you will not be able to see the password as you type it.
";
$elem["debian-edu-config/ldap-password"]["descriptionde"]="Geben Sie das LDAP-Super-Admin-Passwort ein:
 Ein Passwort wird als Anfangspasswort für den Super-Admin-Benutzer von GOsa² verwendet. Sie können Ihr Root-Passwort benutzen oder etwas anderes eintippen. Vergessen Sie dieses Passwort nicht!
 .
 Beachten Sie, dass Sie das Passwort beim Eintippen nicht sehen können.
";
$elem["debian-edu-config/ldap-password"]["descriptionfr"]="Veuillez indiquer le mot de passe de l'administrateur LDAP :
 Un mot de passe est utilisé comme mot de passe initial pour l'administrateur de l'application GOsa². Vous pouvez utiliser le mot de passe du superutilisateur ou bien en saisir un autre. Veillez à bien retenir ce mot de passe.
 .
 Veuillez noter que vous ne pourrez pas lire votre saisie.
";
$elem["debian-edu-config/ldap-password"]["default"]="";
$elem["debian-edu-config/ldap-password-again"]["type"]="password";
$elem["debian-edu-config/ldap-password-again"]["description"]="Re-enter password to verify:
 Please enter the same password again to verify that you have typed it
 correctly.
";
$elem["debian-edu-config/ldap-password-again"]["descriptionde"]="Geben Sie das Passwort zur Kontrolle erneut ein:
 Bitte geben Sie dasselbe Passwort erneut ein, um zu prüfen, ob Sie es korrekt eingetippt haben.
";
$elem["debian-edu-config/ldap-password-again"]["descriptionfr"]="Veuillez saisir à nouveau le mot de passe :
 Merci de saisir à nouveau le même mot de passe afin de vérifier que vous l'avez écrit correctement.
";
$elem["debian-edu-config/ldap-password-again"]["default"]="";
$elem["debian-edu-config/ldap-password-mismatch"]["type"]="error";
$elem["debian-edu-config/ldap-password-mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["debian-edu-config/ldap-password-mismatch"]["descriptionde"]="Passworteingabefehler
 Die beiden von Ihnen eingegebenen Passwörter sind nicht gleich. Bitte versuchen Sie es erneut.
";
$elem["debian-edu-config/ldap-password-mismatch"]["descriptionfr"]="Erreur de saisie de mot de passe
 Les deux mots de passe donnés sont différents. Veuillez les saisir à nouveau.
";
$elem["debian-edu-config/ldap-password-mismatch"]["default"]="";
$elem["debian-edu-config/ldap-password-empty"]["type"]="error";
$elem["debian-edu-config/ldap-password-empty"]["description"]="Empty password
 You entered an empty password, which is not allowed.
 Please choose a non-empty password.
";
$elem["debian-edu-config/ldap-password-empty"]["descriptionde"]="Kein Passwort
 Sie haben kein Passwort eingegeben. Dies ist nicht erlaubt. Bitte wählen Sie ein Passwort.
";
$elem["debian-edu-config/ldap-password-empty"]["descriptionfr"]="Mot de passe vide
 Le mot de passe saisi est vide, ce qui n'est pas autorisé. Veuillez indiquer un mot de passe non vide.
";
$elem["debian-edu-config/ldap-password-empty"]["default"]="";
$elem["debian-edu-config/first-user-name"]["type"]="string";
$elem["debian-edu-config/first-user-name"]["description"]="for internal use: The username of the first user in LDAP:
 This is the username of the administrative user created in LDAP on
 the Main-Server

";
$elem["debian-edu-config/first-user-name"]["descriptionde"]="";
$elem["debian-edu-config/first-user-name"]["descriptionfr"]="";
$elem["debian-edu-config/first-user-name"]["default"]="";
$elem["debian-edu-config/first-user-fullname"]["type"]="string";
$elem["debian-edu-config/first-user-fullname"]["description"]="for internal use: The full name of the first user in LDAP:
 This is the full name of the administrative user created in LDAP on
 the Main-Server

";
$elem["debian-edu-config/first-user-fullname"]["descriptionde"]="";
$elem["debian-edu-config/first-user-fullname"]["descriptionfr"]="";
$elem["debian-edu-config/first-user-fullname"]["default"]="";
$elem["debian-edu-config/first-user-password"]["type"]="password";
$elem["debian-edu-config/first-user-password"]["description"]="for internal use: The password of the initial user:
 This password is used as the initial password for the first user in
 LDAP.  You can use your root password or type something else. Make
 sure you remember the password.
 .
 Note that you will not be able to see the password as you type it.

";
$elem["debian-edu-config/first-user-password"]["descriptionde"]="";
$elem["debian-edu-config/first-user-password"]["descriptionfr"]="";
$elem["debian-edu-config/first-user-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
