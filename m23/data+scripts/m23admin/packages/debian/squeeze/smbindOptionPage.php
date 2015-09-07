<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("smbind");

$elem["smbind/password1"]["type"]="password";
$elem["smbind/password1"]["description"]="Smbind administrator password:
 Please choose a password for the Smbind administrator (\"admin\").
";
$elem["smbind/password1"]["descriptionde"]="Passwort für den Smbind-Administrator:
 Wählen Sie bitte ein Passwort für den Smbind-Administrator (»admin«).
";
$elem["smbind/password1"]["descriptionfr"]="Mot de passe de l'administrateur de Smbind :
 Veuillez choisir un mot de passe pour l'administrateur de Smbind (« admin »).
";
$elem["smbind/password1"]["default"]="";
$elem["smbind/password2"]["type"]="password";
$elem["smbind/password2"]["description"]="Re-enter password to verify:
 Please enter the same \"admin\" password again to verify
 you have typed it correctly.
";
$elem["smbind/password2"]["descriptionde"]="Geben Sie das Passwort zur Überprüfung noch einmal ein:
 Bitte geben Sie das Passwort für »admin« erneut ein, um sicher zu stellen, dass Sie es richtig eingegeben haben.
";
$elem["smbind/password2"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez entrer à nouveau le mot de passe de l'utilisateur « admin » afin de vérifier que vous l'avez saisi correctement.
";
$elem["smbind/password2"]["default"]="";
$elem["smbind/password_mismatch"]["type"]="error";
$elem["smbind/password_mismatch"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["smbind/password_mismatch"]["descriptionde"]="Fehler bei Eingabe des Passworts
 Die beiden eingegebenen Passwörter stimmen nicht überein. Bitte versuchen Sie es noch einmal.
";
$elem["smbind/password_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["smbind/password_mismatch"]["default"]="";
$elem["smbind/reconfigure-webserver"]["type"]="multiselect";
$elem["smbind/reconfigure-webserver"]["choices"][1]="apache2";
$elem["smbind/reconfigure-webserver"]["description"]="Web server(s) to configure automatically:
 Smbind supports any web server supported by PHP, but only
 Apache 2 and lighttpd can be configured automatically.
 .
 Please select the web server(s) that should be configured
 automatically for Smbind.
";
$elem["smbind/reconfigure-webserver"]["descriptionde"]="Webserver für die automatische Konfiguration:
 Smbind unterstützt jeden von PHP unterstützten Webserver, aber lediglich Apache 2 und lighttpd können automatisch konfiguriert werden.
 .
 Bitte wählen Sie den/die Webserver aus, welche(r) automatisch für Smbindkonfiguriert werden soll(en).
";
$elem["smbind/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web à reconfigurer automatiquement :
 Smbiond gère tout serveur web géré par PHP, mais seuls Apache 2 et lighttpd peuvent être configurés automatiquement.
 .
 Veuillez choisir le(s) serveur(s) web à configurer automatiquement pour Smbind.
";
$elem["smbind/reconfigure-webserver"]["default"]="apache2, lighttpd";
$elem["smbind/restart-webserver"]["type"]="boolean";
$elem["smbind/restart-webserver"]["description"]="Should ${webserver} be restarted?
 Remember that in order to activate the new configuration
 ${webserver} has to be restarted. You can also restart ${webserver}
 by manually executing \"invoke-rc.d ${webserver} restart\".
";
$elem["smbind/restart-webserver"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Beachten Sie, dass zum Aktivieren der neuen Konfiguration ${webserver} neu gestartet werden muss. Sie können ${webserver} auch manuell mittels »invoke-rc.d ${webserver} restart« neu starten.
";
$elem["smbind/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Veuillez noter que pour activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez également le redémarrer vous-même avec la commande « invoke-rc.d ${webserver} restart ».
";
$elem["smbind/restart-webserver"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
