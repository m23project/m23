<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("email-reminder");

$elem["email-reminder/send_reminders"]["type"]="boolean";
$elem["email-reminder/send_reminders"]["description"]="Run daily email-reminder cronjob?
 By default, email-reminder checks once a day for reminders that need
 to be sent out.
";
$elem["email-reminder/send_reminders"]["descriptionde"]="Täglichen Email-reminder-Cronjob ausführen?
 Standardmäßig überprüft Email-reminder einmal täglich auf Erinnerungen, die versandt werden müssen.
";
$elem["email-reminder/send_reminders"]["descriptionfr"]="Faut-il exécuter la tâche quotidienne de cron pour email-reminder ?
 Par défaut, email-reminder vérifie chaque jour s'il est nécessaire d'envoyer des rappels par courriel.
";
$elem["email-reminder/send_reminders"]["default"]="true";
$elem["email-reminder/smtp_server"]["type"]="string";
$elem["email-reminder/smtp_server"]["description"]="SMTP server:
 Specify the address of the outgoing mail server that email-reminder
 should use to send its emails.
";
$elem["email-reminder/smtp_server"]["descriptionde"]="SMTP-Server:
 Geben Sie die Adresse des ausgehenden E-Mail-Servers an, den Email-reminder für den Versand seiner E-Mails verwenden soll.
";
$elem["email-reminder/smtp_server"]["descriptionfr"]="Serveur SMTP :
 Veuillez indiquer l'adresse du serveur qu'email-reminder devrait utiliser pour l'envoi des courriels.
";
$elem["email-reminder/smtp_server"]["default"]="localhost";
$elem["email-reminder/smtp_username"]["type"]="string";
$elem["email-reminder/smtp_username"]["description"]="SMTP username:
 If the outgoing mail server requires a username, enter it here.
 .
 Leave this blank if the SMTP server doesn't require authentication.
";
$elem["email-reminder/smtp_username"]["descriptionde"]="SMTP-Benutzername:
 Falls der ausgehende E-Mail-Server einen Benutzernamen benötigt, geben Sie diesen hier ein.
 .
 Lassen Sie dies leer, falls der SMTP-Server keine Authentifizierung benötigt.
";
$elem["email-reminder/smtp_username"]["descriptionfr"]="Identifiant SMTP :
 Si le serveur SMTP a besoin d'un identifiant, veuillez l'indiquer ici.
 .
 Ce champ peut être laissé vide si le serveur SMTP n'impose pas d'authentification.
";
$elem["email-reminder/smtp_username"]["default"]="Default:";
$elem["email-reminder/smtp_password"]["type"]="password";
$elem["email-reminder/smtp_password"]["description"]="SMTP password:
 If the outgoing mail server requires a password, enter it here.
 .
 Leave this blank if the SMTP server doesn't require authentication.
";
$elem["email-reminder/smtp_password"]["descriptionde"]="SMTP-Passwort:
 Falls der ausgehende E-Mal-Server ein Passwort benötigt, geben Sie dieses hier ein.
 .
 Lassen Sie dies leer, falls der SMTP-Server keine Authentifizierung benötigt.
";
$elem["email-reminder/smtp_password"]["descriptionfr"]="Mot de passe SMTP :
 Si le serveur SMTP a besoin d'un mot de passe, veuillez l'indiquer ici.
 .
 Ce champ peut être laissé vide si le serveur SMTP n'impose pas d'authentification.
";
$elem["email-reminder/smtp_password"]["default"]="Default:";
$elem["email-reminder/smtp_ssl"]["type"]="boolean";
$elem["email-reminder/smtp_ssl"]["description"]="Connect to the SMTP server using SSL?
 If the SMTP server supports SSL and you choose this option, data
 exchanged with it will be encrypted.
";
$elem["email-reminder/smtp_ssl"]["descriptionde"]="Mittels SSL mit dem SMTP-Server verbinden?
 Falls der SMTP-Server SSL unterstützt und Sie diese Option auswählen, werden die mit dem Server ausgetauschten Daten verschlüsselt.
";
$elem["email-reminder/smtp_ssl"]["descriptionfr"]="Utiliser SSL pour la connexion au serveur SMTP ?
 Si le serveur SMTP peut utiliser SSL et que vous choisissez cette option, les données échangées avec lui seront chiffrées.
";
$elem["email-reminder/smtp_ssl"]["default"]="false";
$elem["email-reminder/mail_from"]["type"]="string";
$elem["email-reminder/mail_from"]["description"]="Reminder mails originating address:
 Reminder emails will appear to come from this address. The default
 should work unless the SMTP server requires routable domains in
 source addresses.
";
$elem["email-reminder/mail_from"]["descriptionde"]="Absenderadresse der Erinnerungs-E-Mails:
 Die Erinnerungs-E-Mails werden von dieser Adresse zu kommen scheinen. Die Voreinstellung sollte funktionieren, es sei denn, der SMTP-Server benötigt routebare Domänen in Quell-Adressen.
";
$elem["email-reminder/mail_from"]["descriptionfr"]="Adresse origine des courriels envoyés :
 Les courriels envoyés par email-reminder sembleront provenir de l'adresse configurée ici. Certains serveurs SMTP imposent que cette adresse soit valable.
";
$elem["email-reminder/mail_from"]["default"]="root@localhost";
PKG_OptionPageTail2($elem);
?>
