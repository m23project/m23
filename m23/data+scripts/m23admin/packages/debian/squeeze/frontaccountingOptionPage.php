<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("frontaccounting");

$elem["frontaccounting/webserver"]["type"]="multiselect";
$elem["frontaccounting/webserver"]["choices"][1]="apache2";
$elem["frontaccounting/webserver"]["choicesde"][1]="Apache2";
$elem["frontaccounting/webserver"]["choicesfr"][1]="apache2";
$elem["frontaccounting/webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run FrontAccounting.
";
$elem["frontaccounting/webserver"]["descriptionde"]="Webserver, der automatisch konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch konfiguriert werden soll, um FrontAccounting ausführen zu können.
";
$elem["frontaccounting/webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à configurer automatiquement pour FrontAccounting.
";
$elem["frontaccounting/webserver"]["default"]="";
$elem["frontaccounting/db_initialized"]["type"]="boolean";
$elem["frontaccounting/db_initialized"]["description"]="Has the FrontAccounting database already been initialized?
";
$elem["frontaccounting/db_initialized"]["descriptionde"]="Wurde die FrontAccounting-Datenbank bereits initialisiert?
";
$elem["frontaccounting/db_initialized"]["descriptionfr"]="La base de données de FrontAccounting a-t-elle déjà été créée ?
";
$elem["frontaccounting/db_initialized"]["default"]="false";
$elem["frontaccounting/skipdb"]["type"]="boolean";
$elem["frontaccounting/skipdb"]["description"]="Skip database creation?
 The FrontAccounting database can be set up automatically or you can create it
 manually after installation.
";
$elem["frontaccounting/skipdb"]["descriptionde"]="Erstellen der Datenbank überspringen?
 Die FrontAccounting-Datenbank kann automatisch eingerichtet werden oder Sie können sie nach der Installation manuell erstellen.
";
$elem["frontaccounting/skipdb"]["descriptionfr"]="Faut-il omettre la création de la base de données ?
 La base de données de FrontAccounting peut être créée automatiquement ou vous pouvez la créer vous-même après l'installation.
";
$elem["frontaccounting/skipdb"]["default"]="false";
$elem["frontaccounting/manualdb"]["type"]="error";
$elem["frontaccounting/manualdb"]["description"]="Manual database configuration required
 No MySQL client was found, which means it is not possible to
 automatically create FrontAccounting's database.
 .
 You should install the mysql-client package (as well as mysql-server
 if you want the database to be hosted on this machine) and then run
 \"dpkg-reconfigure frontaccounting\" again. For now, the database
 configuration will be skipped.
";
$elem["frontaccounting/manualdb"]["descriptionde"]="Manuelle Datenbankkonfiguration erforderlich
 Es wurde kein MySQL-Client gefunden, daher ist es nicht möglich, die FrontAccounting-Datenbank automatisch zu erstellen.
 .
 Sie sollten das Paket »mysql-client« installieren (ebenso »mysql-server«, falls Sie möchten, dass die Datenbank auf dieser Maschine laufen soll) und dann »dpkg-reconfigure frontaccounting« erneut ausführen. Im Augenblick wird die Datenbankkonfiguration übersprungen.
";
$elem["frontaccounting/manualdb"]["descriptionfr"]="Configuration manuelle de la base de données requise
 Aucun client MySQL n'a été trouvé, ce qui signifie qu'il n'est pas possible de créer automatiquement la base de données de FrontAccounting.
 .
 Vous devriez installer le paquet mysql-client (ainsi que mysql-server si vous désirez que la base de données soit hébergée sur cette machine) et ensuite exécuter à nouveau la commande « dpkg-reconfigure frontaccounting ». Pour le moment, l'étape de configuration de la base de données sera sautée.
";
$elem["frontaccounting/manualdb"]["default"]="";
$elem["frontaccounting/db_host"]["type"]="string";
$elem["frontaccounting/db_host"]["description"]="FrontAccounting database server host name:
 Please enter the host name or IP address of the database server that
 will host FrontAccounting's database.
";
$elem["frontaccounting/db_host"]["descriptionde"]="Rechnername des FrontAccounting-Datenbankservers:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse des Datenbankservers an, auf dem die Datenbank von FrontAccounting laufen soll.
";
$elem["frontaccounting/db_host"]["descriptionfr"]="Nom de l'hôte hébergeant la base de données de FrontAccounting :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur de bases de données qui hébergera la base de données de FrontAccounting.
";
$elem["frontaccounting/db_host"]["default"]="localhost";
$elem["frontaccounting/db_name"]["type"]="string";
$elem["frontaccounting/db_name"]["description"]="FrontAccounting database name:
 Please choose the name for FrontAccounting's database.
";
$elem["frontaccounting/db_name"]["descriptionde"]="FrontAccounting-Datenbankname:
 Bitte wählen Sie den Namen für die Datenbank von FrontAccounting.
";
$elem["frontaccounting/db_name"]["descriptionfr"]="Nom de la base de données de FrontAccounting :
 Veuillez choisir le nom de la base de données de FrontAccounting.
";
$elem["frontaccounting/db_name"]["default"]="frontaccounting";
$elem["frontaccounting/db_prefix"]["type"]="boolean";
$elem["frontaccounting/db_prefix"]["description"]="Use a prefix on FrontAccounting tables?
 If the same FrontAccounting database should host more than one
 company, table names should be prefixed by \"0_\".
";
$elem["frontaccounting/db_prefix"]["descriptionde"]="Möchten Sie einen Präfix für FrontAccounting-Tabellen verwenden?
 Falls die selbe FrontAccounting-Datenbank mehr als eine Firma enthalten soll, sollten Tabellennamen den Präfix »0_« bekommen.
";
$elem["frontaccounting/db_prefix"]["descriptionfr"]="Faut-il utiliser un prefixe pour les tables de la base de données de FrontAccounting ?
 Si la même base de données de FrontAccounting devait héberger plus d'une entreprise, les tables devraient être préfixées par « 0_ ».
";
$elem["frontaccounting/db_prefix"]["default"]="true";
$elem["frontaccounting/db_admin_user"]["type"]="string";
$elem["frontaccounting/db_admin_user"]["description"]="Database administrator username:
 Please provide the username for the account that will create
 FrontAccounting's database. This account must have database and
 user creation privileges on the database server.
";
$elem["frontaccounting/db_admin_user"]["descriptionde"]="Benutzername des Datenbankadministrators:
 Bitte geben Sie den Benutzernamen für das Konto an, das die Datenbank von FrontAccounting erstellen wird. Dieses Konto muss auf dem Datenbankserver die Rechte zum Anlegen von Datenbanken und Benutzern haben.
";
$elem["frontaccounting/db_admin_user"]["descriptionfr"]="Identifiant de l'administrateur de la base de données :
 Veuillez indiquer l'identifiant du compte qui créera la base de données de FrontAccounting. Ce compte doit avoir les privilèges suffisants pour créer une base de données ainsi qu'un utilisateur sur le serveur de bases de données.
";
$elem["frontaccounting/db_admin_user"]["default"]="root";
$elem["frontaccounting/db_admin_pass"]["type"]="password";
$elem["frontaccounting/db_admin_pass"]["description"]="Database administrative password:
 Please provide the password for the account that will create
 FrontAccounting's database.
";
$elem["frontaccounting/db_admin_pass"]["descriptionde"]="Datenbankverwaltungspasswort:
 Bitte geben Sie das Passwort für das Konto an, das die Datenbank von FrontAccounting erstellen wird.
";
$elem["frontaccounting/db_admin_pass"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données :
 Veuillez indiquer le mot de passe du compte qui créera la base de données de FrontAccounting.
";
$elem["frontaccounting/db_admin_pass"]["default"]="";
$elem["frontaccounting/db_user"]["type"]="string";
$elem["frontaccounting/db_user"]["description"]="FrontAccounting database username:
 Please choose a username for the account that FrontAccounting will
 use to access the database.
";
$elem["frontaccounting/db_user"]["descriptionde"]="Benutzername der FrontAccounting-Datenbank:
 Bitte wählen Sie einen Benutzernamen für das Konto, das FrontAccounting für den Datenbankzugriff benutzen wird.
";
$elem["frontaccounting/db_user"]["descriptionfr"]="Identifiant de la base de données de FrontAccounting :
 Veuillez choisir un identifiant pour le compte que FrontAccounting utilisera pour accéder à la base de données.
";
$elem["frontaccounting/db_user"]["default"]="frontaccounting";
$elem["frontaccounting/db_pass"]["type"]="password";
$elem["frontaccounting/db_pass"]["description"]="Password to access the database:
 Please provide the password that FrontAccounting will use to access
 the database.
";
$elem["frontaccounting/db_pass"]["descriptionde"]="Zugriffspasswort der Datenbank:
 Bitte geben Sie das Passwort an, das FrontAccounting für den Zugriff auf die Datenbank benutzen wird.
";
$elem["frontaccounting/db_pass"]["descriptionfr"]="Mot de passe pour accéder à la base de données :
 Veuillez indiquer le mot de passe que FrontAccounting utilisera pour accéder à la base de données.
";
$elem["frontaccounting/db_pass"]["default"]="";
$elem["frontaccounting/db_pass_conf"]["type"]="password";
$elem["frontaccounting/db_pass_conf"]["description"]="Re-enter password to verify:
 Please enter the same password again to verify that you have typed it
 correctly.
";
$elem["frontaccounting/db_pass_conf"]["descriptionde"]="Geben Sie zur Überprüfung das Passwort erneut ein:
 Bitte geben Sie das Passwort erneut ein, um zu überprüfen, ob Sie das Passwort korrekt getippt haben.
";
$elem["frontaccounting/db_pass_conf"]["descriptionfr"]="Confirmation du mot de passe
 Veuillez entrer à nouveau le même mot de passe afin de vérifier qu'il a été saisi correctement.
";
$elem["frontaccounting/db_pass_conf"]["default"]="";
$elem["frontaccounting/pass_mismatch"]["type"]="error";
$elem["frontaccounting/pass_mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please enter a password
 again.
";
$elem["frontaccounting/pass_mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte geben Sie das Passwort erneut ein.
";
$elem["frontaccounting/pass_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe indiqués ne correspondent pas. Veuillez choisir à nouveau un mot de passe.
";
$elem["frontaccounting/pass_mismatch"]["default"]="";
$elem["frontaccounting/company"]["type"]="string";
$elem["frontaccounting/company"]["description"]="Company name:
 Please enter the name that will be used to identify the company in
 the selector list on the login screen.
";
$elem["frontaccounting/company"]["descriptionde"]="Name der Firma:
 Bitte geben Sie den Namen ein, der benutzt wird, um die Firma in der Auswahlliste auf dem Anmeldebildschirm zu identifizieren.
";
$elem["frontaccounting/company"]["descriptionfr"]="Nom de l'entreprise :
 Veuillez indiquer le nom qui sera utilisé pour identifier l'entreprise dans le menu déroulant sur l'écran d'identification.
";
$elem["frontaccounting/company"]["default"]="";
$elem["frontaccounting/db_fadmin_pass"]["type"]="password";
$elem["frontaccounting/db_fadmin_pass"]["description"]="Password for company administrator:
 Please choose the password for the company administrator account.
";
$elem["frontaccounting/db_fadmin_pass"]["descriptionde"]="Passwort für den Administrator der Firma:
 Bitte wählen Sie das Passwort für das Administratorkonto der Firma.
";
$elem["frontaccounting/db_fadmin_pass"]["descriptionfr"]="Mot de passe de l'administrateur de l'entreprise :
 Veuillez choisir le mot de passe du compte de l'administrateur de l'entreprise.
";
$elem["frontaccounting/db_fadmin_pass"]["default"]="";
$elem["frontaccounting/db_fadmin_conf"]["type"]="password";
$elem["frontaccounting/db_fadmin_conf"]["description"]="Re-enter password to verify:
 Please enter the same password again to verify that you have typed it
 correctly.
";
$elem["frontaccounting/db_fadmin_conf"]["descriptionde"]="Geben Sie zur Überprüfung das Passwort erneut ein:
 Bitte geben Sie das Passwort erneut ein, um zu überprüfen, ob Sie das Passwort korrekt getippt haben.
";
$elem["frontaccounting/db_fadmin_conf"]["descriptionfr"]="Confirmation du mot de passe
 Veuillez entrer à nouveau le même mot de passe afin de vérifier qu'il a été saisi correctement.
";
$elem["frontaccounting/db_fadmin_conf"]["default"]="";
$elem["frontaccounting/fapass_mismatch"]["type"]="error";
$elem["frontaccounting/fapass_mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please enter a password
 again.
";
$elem["frontaccounting/fapass_mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte geben Sie das Passwort erneut ein.
";
$elem["frontaccounting/fapass_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe indiqués ne correspondent pas. Veuillez choisir à nouveau un mot de passe.
";
$elem["frontaccounting/fapass_mismatch"]["default"]="";
$elem["frontaccounting/db_fadmin_email"]["type"]="string";
$elem["frontaccounting/db_fadmin_email"]["description"]="Company administrator email:
 Please enter the email address of the company administrator.
";
$elem["frontaccounting/db_fadmin_email"]["descriptionde"]="E-Mail des Administrators der Firma:
 Bitte geben Sie die E-Mail-Adresse des Administrators der Firma ein.
";
$elem["frontaccounting/db_fadmin_email"]["descriptionfr"]="Adresse électronique de l'administrateur de l'entreprise :
 Veuillez indiquer l'adresse électronique de l'administrateur de l'entreprise.
";
$elem["frontaccounting/db_fadmin_email"]["default"]="root";
$elem["frontaccounting/db_demo"]["type"]="boolean";
$elem["frontaccounting/db_demo"]["description"]="Add demo data to FrontAccounting tables?
 If you choose this option, some example data will be added to
 the FrontAccounting database.
";
$elem["frontaccounting/db_demo"]["descriptionde"]="Vorführdaten zu den FrontAccounting-Tabellen hinzufügen?
 Falls Sie diese Option auswählen, werden einige Beispieldaten zur FrontAccounting-Datenbank hinzugefügt.
";
$elem["frontaccounting/db_demo"]["descriptionfr"]="Faut-il ajouter des données de démonstration aux tables de FrontAccounting ?
 En choisissant cette option, des données d'exemple seront ajoutées à la base de données de FrontAccounting.
";
$elem["frontaccounting/db_demo"]["default"]="false";
$elem["frontaccounting/restart-webserver"]["type"]="boolean";
$elem["frontaccounting/restart-webserver"]["description"]="Restart ${webserver} now?
 In order to activate the new configuration, ${webserver} has
 to be restarted.
";
$elem["frontaccounting/restart-webserver"]["descriptionde"]="${webserver} nun neu starten?
 Um die neue Konfiguration zu aktivieren, muss ${webserver} neu gestartet werden.
";
$elem["frontaccounting/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} maintenant ?
 Afin d'activer la nouvelle configuration, ${webserver} doit être redémarré.
";
$elem["frontaccounting/restart-webserver"]["default"]="false";
$elem["frontaccounting/postrm"]["type"]="boolean";
$elem["frontaccounting/postrm"]["description"]="Delete FrontAccounting data on purge?
 If you choose this option, the FrontAccounting database and the associated
 database user account will be removed when the frontaccounting
 package is purged.
";
$elem["frontaccounting/postrm"]["descriptionde"]="FrontAccounting-Daten beim vollständigen Löschen entfernen?
 Falls Sie diese Option auswählen, wird die FrontAccounting-Datenbank und das damit verbundene Datenbank-Benutzerkonto entfernt, wenn das Paket »frontaccounting« vollständig gelöscht wird.
";
$elem["frontaccounting/postrm"]["descriptionfr"]="Faut-il supprimer les données de la base de données lors de la désinstallation de FrontAccounting ?
 En choisissant cette option, la base de données de FrontAccounting ainsi que les comptes d'utilisateur seront supprimés lors de la désinstallation de FrontAccounting.
";
$elem["frontaccounting/postrm"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
