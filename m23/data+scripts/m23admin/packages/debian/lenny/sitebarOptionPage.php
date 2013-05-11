<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sitebar");

$elem["sitebar/webserver"]["type"]="multiselect";
$elem["sitebar/webserver"]["choices"][1]="apache";
$elem["sitebar/webserver"]["choices"][2]="apache-ssl";
$elem["sitebar/webserver"]["choices"][3]="apache-perl";
$elem["sitebar/webserver"]["choicesde"][1]="Apache";
$elem["sitebar/webserver"]["choicesde"][2]="Apache-ssl";
$elem["sitebar/webserver"]["choicesde"][3]="Apache-perl";
$elem["sitebar/webserver"]["choicesfr"][1]="Apache";
$elem["sitebar/webserver"]["choicesfr"][2]="Apache-ssl";
$elem["sitebar/webserver"]["choicesfr"][3]="Apache-perl";
$elem["sitebar/webserver"]["description"]="Web server you are running:
 SiteBar supports any web server that php4 does, but this automatic
 configuration process only supports Apache.
";
$elem["sitebar/webserver"]["descriptionde"]="Webserver den Sie betreiben:
 SiteBar unterstützt jeden Webserver, den auch PHP4 unterstützt, aber dieser automatische Konfigurationsprozess unterstützt nur Apache.
";
$elem["sitebar/webserver"]["descriptionfr"]="Serveur web à configure :
 SiteBar fonctionne avec tous les serveurs web qui gèrent PHP4, mais cet utilitaire de configuration ne gère qu'Apache.
";
$elem["sitebar/webserver"]["default"]="";
$elem["sitebar/db_initialized"]["type"]="boolean";
$elem["sitebar/db_initialized"]["description"]="Has the database already been initialized?
";
$elem["sitebar/db_initialized"]["descriptionde"]="Ist die Datenbank bereits initialisiert worden?
";
$elem["sitebar/db_initialized"]["descriptionfr"]="La base de données a-t-elle déjà été initialisée ?
";
$elem["sitebar/db_initialized"]["default"]="false";
$elem["sitebar/skipdb"]["type"]="boolean";
$elem["sitebar/skipdb"]["description"]="Skip database creation?
 Debconf can set up the SiteBar database automatically or you can create it
 manually after installation.
";
$elem["sitebar/skipdb"]["descriptionde"]="Datenbankerstellung überspringen?
 Debconf kann die SiteBar-Datenbank automatisch erstellen oder Sie können Sie manuell nach der Installation erstellen.
";
$elem["sitebar/skipdb"]["descriptionfr"]="Faut-il sauter l'étape de création de la base de données ?
 La base de données de SiteBar peut être installée automatiquement. Sinon, vous pouvez la créer vous-même après l'installation.
";
$elem["sitebar/skipdb"]["default"]="false";
$elem["sitebar/manualdb"]["type"]="note";
$elem["sitebar/manualdb"]["description"]="Manual database configuration required!
 No mysql client found, which means there's no way to offer automatic database
 setup. If you wish to get help setting up the database configuration, please
 install mysql-client (and possibly also mysql-server if you want to run the
 database server on this machine) and then run \"dpkg-reconfigure sitebar\" to
 rerun this configuration wizard. For now, the database configuration will be
 skipped....
";
$elem["sitebar/manualdb"]["descriptionde"]="Manuelle Datenbankkonfiguration benötigt!
 Es wurde kein MySQL-Client gefunden. Dies bedeutet, dass es keine Möglichkeit zur automatischen Datenbankeinrichtung gibt. Falls Sie beim Einrichten der Datenbankkonfiguration Hilfe wollen, installieren Sie bitte mysql-client (und möglicherweise mysql-server, falls Sie den Datenbankserver auf dieser Maschine betreiben wollen) und führen Sie dann »dpkg-reconfigure sitebar« aus, um diesen Konfigurationsassistenten erneut auszuführen. Jetzt wird die Datenbankkonfiguration erst mal übersprungen....
";
$elem["sitebar/manualdb"]["descriptionfr"]="Configuration manuelle de la base de données indispensable
 Aucun client MySQL n'a été trouvé : il est donc impossible de configurer automatiquement la base de données. Si vous souhaitez avoir de l'aide pour la configuration de la base de données, veuillez installer mysql-client (et mysql-server si le serveur de base de données doit fonctionner sur cette machine) puis exécutez « dpkg-reconfigure sitebar », ce qui exécutera cet assistant de configuration à nouveau. Pour l'instant, la configuration de la base de données sera ignorée.
";
$elem["sitebar/manualdb"]["default"]="";
$elem["sitebar/db_host"]["type"]="string";
$elem["sitebar/db_host"]["description"]="SiteBar database host name:
 This should be the host-name or IP address that SiteBar will use to access
 the database.
";
$elem["sitebar/db_host"]["descriptionde"]="SiteBar Datenbank-Rechnername:
 Das sollte der Rechnername oder die IP-Adresse sein, die SiteBar zum Zugriff auf die Datenbank verwenden wird.
";
$elem["sitebar/db_host"]["descriptionfr"]="Nom d'hôte du serveur qui héberge la base de données de SiteBar :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur que SiteBar utilisera pour accéder à la base de données.
";
$elem["sitebar/db_host"]["default"]="localhost";
$elem["sitebar/db_user"]["type"]="string";
$elem["sitebar/db_user"]["description"]="Database user name to access the database:
 This is the user name that SiteBar will use to access the database.
";
$elem["sitebar/db_user"]["descriptionde"]="Datenbankbenutzername zum Zugriff auf die Datenbank:
 Dies ist der Benutzername, den SiteBar zum Zugriff auf die Datenbank verwenden wird.
";
$elem["sitebar/db_user"]["descriptionfr"]="Identifiant pour la base de données :
 Veuillez indiquer l'identifiant que SiteBar utilisera pour accéder à la base de données.
";
$elem["sitebar/db_user"]["default"]="sitebar";
$elem["sitebar/db_pass"]["type"]="password";
$elem["sitebar/db_pass"]["description"]="Password to access the database:
 This is the password that SiteBar will use, along with the user name you
 provided, to access the database.
";
$elem["sitebar/db_pass"]["descriptionde"]="Passwort zum Zugriff auf die Datenbank:
 Dies ist das Passwort, dass SiteBar zusammen mit dem angegebenen Benutzernamen verwenden wird, um auf die Datenbank zuzugreifen.
";
$elem["sitebar/db_pass"]["descriptionfr"]="Mot de passe pour accéder à la base de données :
 Veuillez indiquer le mot de passe que SiteBar utilisera conjointement avec l'identifiant que vous avez fourni, afin d'accéder à la base de données.
";
$elem["sitebar/db_pass"]["default"]="";
$elem["sitebar/db_pass_conf"]["type"]="password";
$elem["sitebar/db_pass_conf"]["description"]="Retype the password to access the database:
 Please enter the database access password again for confirmation.
";
$elem["sitebar/db_pass_conf"]["descriptionde"]="Passwort für den Zugriff auf die Datenbank erneut eingeben:
 Bitte geben Sie das Passwort für den Datenbankzugriff zur Bestätigung erneut ein.
";
$elem["sitebar/db_pass_conf"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez confirmer le mot de passe d'accès à la base de données.
";
$elem["sitebar/db_pass_conf"]["default"]="";
$elem["sitebar/pass_mismatch"]["type"]="text";
$elem["sitebar/pass_mismatch"]["description"]="Password mismatch.
 The database access passwords you entered did not match. Please try again.
";
$elem["sitebar/pass_mismatch"]["descriptionde"]="Passwörter stimmen nicht überein.
 Die von Ihnen zum Datenbankzugriff eingegeben Passwörter stimmten nicht überein. Bitte versuchen Sie es erneut.
";
$elem["sitebar/pass_mismatch"]["descriptionfr"]="Mots de passe différents
 Les mots de passe que vous venez d'indiquer ne correspondent pas. Veuillez recommencer.
";
$elem["sitebar/pass_mismatch"]["default"]="";
$elem["sitebar/db_name"]["type"]="string";
$elem["sitebar/db_name"]["description"]="SiteBar database name:
 This is the name of the database that SiteBar will use.
";
$elem["sitebar/db_name"]["descriptionde"]="SiteBar Datenbankname:
 Dies ist der Name der Datenbank, die SiteBar verwenden wird.
";
$elem["sitebar/db_name"]["descriptionfr"]="Nom de la base de données SiteBar :
 Veuillez indiquer le nom de la base de données que SiteBar utilisera.
";
$elem["sitebar/db_name"]["default"]="sitebar";
$elem["sitebar/db_admin_user"]["type"]="string";
$elem["sitebar/db_admin_user"]["description"]="Database administrative user name:
 This user name will be used to access the database to create (if needed):
 .
  (1) The database
  (2) The new account that SiteBar will use to access the database
";
$elem["sitebar/db_admin_user"]["descriptionde"]="Benutzername des Datenbankadministrators:
 Dieser Benutzername wird (falls notwendig) zum Erstellen der Datenbank verwendet.
 .
  (1) Die Datenbank
  (2) Das neue Konto, das SiteBar zum Zugriff auf die Datenbank verwenden wird
";
$elem["sitebar/db_admin_user"]["descriptionfr"]="Identifiant de l'administrateur de la base de données :
 Cet identifiant sera utilisé pour accéder à la base de données afin de créer, si besoin est :
 .
  - la base de données ;
  - l'identifiant que SiteBar utilisera pour accéder à la base de données.
";
$elem["sitebar/db_admin_user"]["default"]="root";
$elem["sitebar/db_admin_pass"]["type"]="password";
$elem["sitebar/db_admin_pass"]["description"]="Database administrative password (if any):
 This is the password that will be used along with the database
 administrative user name.
";
$elem["sitebar/db_admin_pass"]["descriptionde"]="Datenbank-Administratorpasswort (falls vorhanden):
 Dies ist das Passwort, das zusammen mit dem administrativen Benutzernamen verwendet werden wird.
";
$elem["sitebar/db_admin_pass"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données (s'il existe) :
 Veuillez indiquer le mot de passe qui sera utilisée conjointement avec l'identifiant de l'administrateur de la base de données.
";
$elem["sitebar/db_admin_pass"]["default"]="";
$elem["sitebar/restart-webserver"]["type"]="boolean";
$elem["sitebar/restart-webserver"]["description"]="Restart ${webserver} now?
 Remember that in order to activate the new configuration ${webserver} has
 to be restarted. You can also restart web servers manually.
";
$elem["sitebar/restart-webserver"]["descriptionde"]="Jetzt  ${webserver} neu starten?
 Beachten Sie, dass die neue Konfiguration nur aktiviert wird, wenn ${webserver} neu gestartet wird. Sie können Webserver auch manuell neu starten.
";
$elem["sitebar/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} maintenant ?
 Veuillez noter qu'afin d'activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez également redémarrer les serveurs web vous-même.
";
$elem["sitebar/restart-webserver"]["default"]="false";
$elem["sitebar/postrm"]["type"]="boolean";
$elem["sitebar/postrm"]["description"]="Delete SiteBar data on purge?
 This will delete the SiteBar database and the associated
 database user account when the SiteBar package is purged.
";
$elem["sitebar/postrm"]["descriptionde"]="SiteBar beim vollständigen Entfernen (purge) löschen?
 Dies wird die SiteBar-Datenbank und das zugeordnete Datenbankbenutzerkonto beim vollständigen Entfernen des SiteBar-Pakets löschen.
";
$elem["sitebar/postrm"]["descriptionfr"]="Faut-il supprimer les données de SiteBar à la suppression du paquet ?
 Si vous choisissez cette option, la base de données de SiteBar et l'identifiant correspondant seront supprimés quand le paquet SiteBar sera purgé.
";
$elem["sitebar/postrm"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
