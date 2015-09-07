<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mantis");

$elem["mantis/admin"]["type"]="string";
$elem["mantis/admin"]["description"]="Mantis administrator e-mail address:
 Please enter the e-mail address of the administrator who will troubleshoot
 user reported errors.
";
$elem["mantis/admin"]["descriptionde"]="E-Mail-Adresse des Mantis-Administrators:
 Bitte geben Sie die E-Mail-Adresse des Administrators ein, der sich um Fehler kümmert, die von Benutzern berichtet werden.
";
$elem["mantis/admin"]["descriptionfr"]="Adresse électronique de l'administrateur de Mantis :
 Veuillez indiquer l'adresse électronique de l'administrateur qui prendra en charge les erreurs signalées par les utilisateurs.
";
$elem["mantis/admin"]["default"]="mantis@localhost";
$elem["mantis/webmaster"]["type"]="string";
$elem["mantis/webmaster"]["description"]="Mantis webmaster e-mail address:
 Please enter the webmaster's e-mail address. It will be displayed at the
 bottom of all Mantis pages.
";
$elem["mantis/webmaster"]["descriptionde"]="E-Mail-Adresse des Mantis-Webmasters:
 Bitte geben Sie die E-Mail-Adresse des Webmasters ein. Diese Adresse wird am Seitenfuß jeder Mantis-Seite angezeigt.
";
$elem["mantis/webmaster"]["descriptionfr"]="Adresse électronique du webmestre de Mantis :
 Veuillez indiquer l'adresse électronique du webmestre. Elle sera affichée au bas de toutes les pages de Mantis.
";
$elem["mantis/webmaster"]["default"]="webmaster@localhost";
$elem["mantis/from"]["type"]="string";
$elem["mantis/from"]["description"]="Sender address for bug report e-mails:
 Please enter the address used as the origin address for Mantis bug report
 e-mails.
";
$elem["mantis/from"]["descriptionde"]="Absenderadresse für E-Mails mit Fehlerberichten:
 Bitte geben Sie die Adresse ein, die als Ursprungsadresse für E-Mails mit Mantis-Fehlerberichten verwendet wird.
";
$elem["mantis/from"]["descriptionfr"]="Adresse de l'émetteur des courriels de rapports de bogues :
 Veuillez indiquer l'adresse électronique qui sera utilisée pour l'envoi des rapports de bogue de Mantis.
";
$elem["mantis/from"]["default"]="mantis@localhost";
$elem["mantis/bounce"]["type"]="string";
$elem["mantis/bounce"]["description"]="E-mail address for bounce-handling:
 Please enter the address where bounced e-mails will be directed. Typically,
 this should be set to be the same as the administrator's e-mail address.
";
$elem["mantis/bounce"]["descriptionde"]="E-Mail-Adresse für die Handhabung von zurückgewiesenen E-Mails:
 Bitte geben Sie die Adresse ein, an die zurückgewiesene E-Mails geleitet werden. Üblicherweise wird diese auf die E-Mail Adresse des Administrators gesetzt.
";
$elem["mantis/bounce"]["descriptionfr"]="Adresse électronique pour la gestion des rejets :
 Veuillez indiquer l'adresse où seront envoyés les courriels rejetés. En général, il s'agira de l'adresse électronique de l'administrateur.
";
$elem["mantis/bounce"]["default"]="mantis@localhost";
$elem["mantis/webserver"]["type"]="boolean";
$elem["mantis/webserver"]["description"]="Configure Apache2 as web server for Mantis?
 If you accept this option Apache2 will automatically be configured to support
 Mantis via /etc/apache2/conf.d/ symlinks.  If you reject it, you will have to
 configure your web server manually.
";
$elem["mantis/webserver"]["descriptionde"]="Apache2 als Webserver für Mantis konfigurieren?
 Falls Sie diese Option akzeptieren, wird Apache2 automatisch konfiguriert, Mantis über /etc/apache2/conf.d/-Symlinks zu unterstützen. Falls Sie dieses ablehnen, müssen Sie Ihren Webserver manuell konfigurieren.
";
$elem["mantis/webserver"]["descriptionfr"]="Faut-il configurer Apache v2 comme serveur web pour Mantis ?
 Si vous choisissez cette option, Apache v2 sera configuré pour gérer Mantis avec des liens symboliques dans /etc/apache2/conf.d/. Dans le cas contraire, vous devrez configurer le serveur web vous-même.
";
$elem["mantis/webserver"]["default"]="true";
$elem["mantis/passwordnote"]["type"]="note";
$elem["mantis/passwordnote"]["description"]="Administrator's password must be changed
 By default, the mantis package creates an 'administrator' account. The password
 for this account is 'root'.
 .
 It is highly recommended to change this password immediately after
 installation is complete.
";
$elem["mantis/passwordnote"]["descriptionde"]="Passwort des Administrators muss geändert werden
 Standardmäßig erstellt das Mantis-Paket ein Konto »administrator«. Das Passwort für dieses Konto ist »root«.
 .
 Es wird nachdrücklich empfohlen, dieses Passwort sofort nach der Beendigung der Installation zu ändern.
";
$elem["mantis/passwordnote"]["descriptionfr"]="Changement obligatoire du mot de passe de l'administrateur
 Par défaut, le paquet de Mantis crée un compte « administrator ». Le mot de passe de ce compte est « root ».
 .
 Il est fortement conseillé de changer ce mot de passe dès la fin de l'installation.
";
$elem["mantis/passwordnote"]["default"]="";
PKG_OptionPageTail2($elem);
?>
