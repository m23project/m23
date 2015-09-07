<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bugzilla3");

$elem["bugzilla3/pwd_check"]["type"]="password";
$elem["bugzilla3/pwd_check"]["description"]="Password confirmation:
";
$elem["bugzilla3/pwd_check"]["descriptionde"]="Passwort-Bestätigung:
";
$elem["bugzilla3/pwd_check"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["bugzilla3/pwd_check"]["default"]="";
$elem["bugzilla3/bugzilla_admin_name"]["type"]="string";
$elem["bugzilla3/bugzilla_admin_name"]["description"]="Email address of Bugzilla administrator:
 Please enter the email address of the Bugzilla administrator; all mail for
 the administrator will be sent to this address. This email
 address is also used as the administrator login for Bugzilla.
 .
 A valid address must contain exactly one '@', and at least one '.' after
 the @. You'll be able to change this setting through Bugzilla's
 web interface.
";
$elem["bugzilla3/bugzilla_admin_name"]["descriptionde"]="E-Mail-Adresse des Bugzilla-Administrators:
 Bitte geben Sie die E-Mail-Adresse des Bugzilla-Administrators ein. Alle E-Mails für den Administrator werden an diese Adresse geschickt. Diese E-Mail-Adresse wird auch als Administrator-Login für Bugzilla verwendet.
 .
 Eine gültige Adresse muss genau ein »@« und wenigstens einen ».« nach dem @ enthalten. Sie können diese E-Mail-Adresse später über die Web-Oberfläche von Bugzilla ändern.
";
$elem["bugzilla3/bugzilla_admin_name"]["descriptionfr"]="Adresse électronique de l'administrateur de Bugzilla :
 Veuillez indiquer l'adresse électronique de l'administrateur de Bugzilla. Tous les courriers électroniques qui lui sont destinés y seront envoyés. Elle sera également utilisée comme identifiant pour l'administrateur.
 .
 Une adresse valable doit contenir un et un seul « @ » et au moins un « . » après le « @ ». Vous pourrez changer ces réglages initiaux via l'interface web de Bugzilla.
";
$elem["bugzilla3/bugzilla_admin_name"]["default"]="";
$elem["bugzilla3/bugzilla_admin_real_name"]["type"]="string";
$elem["bugzilla3/bugzilla_admin_real_name"]["description"]="Real name of Bugzilla administrator:
";
$elem["bugzilla3/bugzilla_admin_real_name"]["descriptionde"]="Tatsächlicher Name des Bugzilla-Administrators:
";
$elem["bugzilla3/bugzilla_admin_real_name"]["descriptionfr"]="Nom réel de l'administrateur de Bugzilla :
";
$elem["bugzilla3/bugzilla_admin_real_name"]["default"]="";
$elem["bugzilla3/bugzilla_admin_pwd"]["type"]="password";
$elem["bugzilla3/bugzilla_admin_pwd"]["description"]="Password for the Bugzilla administrator account:
 Please enter at least 6 characters.
";
$elem["bugzilla3/bugzilla_admin_pwd"]["descriptionde"]="Passwort für das Konto des Bugzilla-Administrators:
 Bitte geben Sie wenigstens sechs Zeichen ein.
";
$elem["bugzilla3/bugzilla_admin_pwd"]["descriptionfr"]="Mot de passe de l'administrateur de Bugzilla :
 Veuillez utiliser au moins 6 caractères.
";
$elem["bugzilla3/bugzilla_admin_pwd"]["default"]="";
$elem["bugzilla3/customized_values"]["type"]="boolean";
$elem["bugzilla3/customized_values"]["description"]="Have Status or Resolution values been customized?
 If values in the Status or Resolution fields have been customized, the
 checksetup procedure must be modified appropriately before installation
 can continue.
 .
 For each update of this package, a new version of the checksetup_nondebian.pl
 script is installed; the /usr/share/bugzilla3/debian/pre-checksetup.d
 directory can be used to automatically apply your modifications before
 execution.
";
$elem["bugzilla3/customized_values"]["descriptionde"]="Wurden Werte in »Status« oder »Resolution« angepasst?
 Falls Werte in den Feldern »Status« oder »Resolution« angepasst wurden, muss die Prozedur checksetup entsprechend angepasst werden, bevor die Installation fortfahren kann.
 .
 Bei jeder Aktualisierung des Pakets wird eine neue Version des Skripts checksetup_nondebian.pl installiert. Das Verzeichnis /usr/share/bugzilla3/debian/pre-checksetup.d kann dazu benutzt werden, vor der Ausführung automatisch Ihre Änderungen anzuwenden.
";
$elem["bugzilla3/customized_values"]["descriptionfr"]="Faut-il modifier la valeur des champs « Status/Resolution » ?
 Si vous avez modifié la valeur des champs « Status/Resolution », la procédure « checksetup » doit être modifiée de façon appropriée avant de continuer l'installation.
 .
 Pour chaque mise à jour de Bugzilla, une nouvelle version du script « checksetup_nondebian.pl » est installée ; le répertoire /usr/share/bugzilla3/debian/pre-checksetup.d peut être utilisé pour automatiquement appliquer vos modifications avant l'exécution.
";
$elem["bugzilla3/customized_values"]["default"]="true";
$elem["bugzilla3/customized_values_ask_again"]["type"]="boolean";
$elem["bugzilla3/customized_values_ask_again"]["description"]="Prompt about customized Status/Resolution at each update?
 If you modified Status/Resolution fields and created a script within
 /usr/share/bugzilla3/debian/pre-checksetup.d to apply changes to
 /usr/share/bugzilla3/lib/checksetup_nondebian.pl, you may want to avoid
 being prompted at each package upgrade.
 .
 If you accept being prompted, you will have to call
 /usr/share/bugzilla3/lib/checksetup.pl yourself, at each package
 upgrade, before using Bugzilla.
 .
 If you did not modify Status/Resolution, you should skip prompting as
 checksetup.pl will be started
 automatically (together with the {pre,post}-checksetup.d scripts).
";
$elem["bugzilla3/customized_values_ask_again"]["descriptionde"]="Bei jeder Aktualisierung nach angepassten Werten in Status/Resolution fragen?
 Falls Sie die Felder Status/Resolution verändert haben und ein Skript innerhalb von /usr/share/bugzilla3/debian/pre-checksetup.pl erstellt haben, das Änderungen an /usr/share/bugzilla3/lib/checksetup_nondebian.pl vornimmt, möchten Sie eventuell vermeiden, bei jedem Upgrade des Pakets danach gefragt zu werden.
 .
 Falls Sie der Abfrage zustimmen, müssen Sie bei jedem Paket-Upgrade selbst /usr/share/bugzilla3/lib/checksetup.pl aufrufen, bevor Sie Bugzilla verwenden.
 .
 Falls Sie Status/Resolution nicht bearbeitet haben, sollten Sie die Abfrage überspringen, da checksetup.pl automatisch (zusammen mit den {pre,post}-checksetup.d-Skripten) gestartet wird.
";
$elem["bugzilla3/customized_values_ask_again"]["descriptionfr"]="Demander la tenue à jour des champs « Status/Resolution » à chaque mise à jour ? 
 Si vous modifiez les champs « Status/Resolution » et créez un script dans /usr/share/bugzilla3/debian/pre-checksetup.d pour appliquer des changements à « /usr/share/bugzilla3/lib/checksetup_nondebian.pl », vous pouvez préférer ne pas être consulté(e) à chaque mise à jour.
 .
 Si vous choisissez d'être consulté(e) sur la mise à jour, vous devrez exécuter le script « /usr/share/bugzilla3/lib/checksetup.pl » vous-même lors de chaque mise à jour avant de redémarrer Bugzilla.
 .
 Si vous n'avez pas modifié la valeur de ces champs, la question ne vous sera plus posée car le script « checksetup.pl » sera exécuté automatiquement (ainsi que les scripts « {pre,post}-checksetup.d »).
";
$elem["bugzilla3/customized_values_ask_again"]["default"]="false";
$elem["bugzilla3/checksetup_failed"]["type"]="error";
$elem["bugzilla3/checksetup_failed"]["description"]="Setup of Bugzilla failed and needs further investigation
 Bugzilla has the \"shutdownhtml\" configuration parameter set, putting
 it offline (with logins disabled) until configured.
 .
 To set up Bugzilla, run \"dpkg-reconfigure bugzilla3\" (as root) and
 choose \"dbconfig-config\".
";
$elem["bugzilla3/checksetup_failed"]["descriptionde"]="Einrichtung von Bugzilla fehlgeschlagen und weitere Untersuchungen notwendig
 Der Konfigurationsparameter »shutdownhtml« von Bugzilla wurde gesetzt. Bis zur Neukonfiguration ist Bugzilla offline und Anmeldungen sind deaktiviert.
 .
 Um Bugzilla einzurichten, führen Sie (als root) »dpkg-reconfigure bugzilla3« aus und wählen »dbconfig-config«.
";
$elem["bugzilla3/checksetup_failed"]["descriptionfr"]="Échec de la configuration de Bugzilla
 Le paramètre de configuration « shutdownhtml » de Bugzilla est utilisé. Bugzilla est placé en mode hors-ligne (connexion désactivées) tant qu'il n'est pas configuré.
 .
 Pour configurer Bugzilla, veuillez exécuter la commande « dpkg-reconfigure bugzilla3 » et choisissez « dbconfig-config ».
";
$elem["bugzilla3/checksetup_failed"]["default"]="";
$elem["bugzilla3/shutdownhtml"]["type"]="string";
$elem["bugzilla3/shutdownhtml"]["description"]="Bugzilla downtime message:
 Please enter the HTML downtime message that should be displayed
 while Bugzilla is being reconfigured.
";
$elem["bugzilla3/shutdownhtml"]["descriptionde"]="Wartungsmeldung für Bugzilla:
 Bitte geben Sie die HTML-Wartungsmeldung an, die während der Neukonfiguration von Bugzilla angezeigt werden soll.
";
$elem["bugzilla3/shutdownhtml"]["descriptionfr"]="Message de mise hors-ligne de Bugzilla :
 Veuillez indiquer le message HTML qui doit être affiché pendant que Bugzilla est reconfiguré.
";
$elem["bugzilla3/shutdownhtml"]["default"]="<h1>Bugzilla is down for maintenance purposes. Please try again later.</h1>";
PKG_OptionPageTail2($elem);
?>
