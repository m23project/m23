<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("webcalendar");

$elem["webcalendar/conf/db_persistent"]["type"]="boolean";
$elem["webcalendar/conf/db_persistent"]["description"]="Should WebCalendar use persistent connections?
 Using persistent connections can improve performance on heavily loaded
 websites by using a previously opened SQL connection.
";
$elem["webcalendar/conf/db_persistent"]["descriptionde"]="Soll WebCalendar dauerhafte Verbindungen verwenden?
 Die Verwendung von langlebigen Verbindungen kann die Leistung auf stark belasteten Websites durch Verwendung bereits geöffneter SQL-Verbindungen verbessern.
";
$elem["webcalendar/conf/db_persistent"]["descriptionfr"]="Faut-il utiliser des connexions persistantes ?
 L'utilisation de connexions persistantes peut améliorer les performances sur des sites web fortement chargés, par la réutilisation des connexions SQL déjà ouvertes.
";
$elem["webcalendar/conf/db_persistent"]["default"]="false";
$elem["webcalendar/conf/use_http_auth"]["type"]="boolean";
$elem["webcalendar/conf/use_http_auth"]["description"]="Use HTTP authentication?
 WebCalendar by default uses the database's webcal_user table for
 authenticating users. You can use HTTP authentication logins
 instead and use Apache to manage logins. This will still require adding
 users to WebCalendar.
";
$elem["webcalendar/conf/use_http_auth"]["descriptionde"]="HTTP-Authentifizierung verwenden?
 Standardmäßig verwendet WebCalendar die webcal_user-Tabelle der Datenbank zur Authentifizierung der Benutzer. Sie können stattdessen HTTP-Authentifizierungs-Anmeldungen verwenden und Apache zur Verwendung der Logins einsetzen. Sie müssen dennoch die Benutzer zu WebCalendar hinzufügen.
";
$elem["webcalendar/conf/use_http_auth"]["descriptionfr"]="Faut-il utiliser l'authentification HTTP ?
 WebCalendar utilise par défaut la table « webcal_user » pour authentifier les utilisateurs. Vous pouvez cependant utiliser les connexions HTTP en laissant Apache gérer les connexions. Il sera quand même nécessaire de déclarer les utilisateurs dans WebCalendar.
";
$elem["webcalendar/conf/use_http_auth"]["default"]="false";
$elem["webcalendar/conf/single_user_mode"]["type"]="boolean";
$elem["webcalendar/conf/single_user_mode"]["description"]="Should WebCalendar be installed in single-user mode?
 WebCalendar can be installed in single-user mode or multi-user mode. If it
 is installed in single-user mode, no login will be required.
 .
 Using the single-user mode is not recommended unless the software runs
 on a personal server protected by a firewall.
";
$elem["webcalendar/conf/single_user_mode"]["descriptionde"]="Soll WebCalendar im Einzelbenutzermodus installiert werden?
 WebCalendar kann im Einzelbenutzer- oder Mehrbenutzermodus installiert werden. Falls es im Einzelbenutzermodus installiert wird, ist keine Anmeldung notwendig.
 .
 Es wird nicht empfohlen, dass Sie im Einzelbenutzermodus installieren, es sei denn, Sie betreiben die Software auf einem persönlichen Server, der durch eine Firewall geschützt ist.
";
$elem["webcalendar/conf/single_user_mode"]["descriptionfr"]="Faut-il installer WebCalendar en mode monoutilisateur ?
 WebCalendar peut être installé en mode monoutilisateur ou en mode multi-utilisateur. L'installation en mode monoutilisateur ne nécessite pas d'authentification.
 .
 Le mode monoutilisateur n'est pas recommandé dans un environnement non protégée par un pare-feu.
";
$elem["webcalendar/conf/single_user_mode"]["default"]="false";
$elem["webcalendar/conf/single_user_login"]["type"]="string";
$elem["webcalendar/conf/single_user_login"]["description"]="Name of the WebCalendar user:
 If WebCalendar is installed in single-user mode, you need to specify
 the name of the user to connect as.
";
$elem["webcalendar/conf/single_user_login"]["descriptionde"]="Name des WebCalendar-Benutzers:
 Falls Sie WebCalendar im Einzelbenutzermodus installiert haben, müssen Sie den Benutzer angeben, zu dem die Verbindung geöffnet werden soll.
";
$elem["webcalendar/conf/single_user_login"]["descriptionfr"]="Identifiant autorisé pour WebCalendar :
 Si vous avez installé WebCalendar en mode monoutilisateur, vous devez indiquer le nom de l'utilisateur qui s'y connectera.
";
$elem["webcalendar/conf/single_user_login"]["default"]="";
$elem["webcalendar/status/debconf_managed"]["type"]="boolean";
$elem["webcalendar/status/debconf_managed"]["description"]="Manage settings.conf automatically?
 The configuration program for the package can manage the settings.conf
 file but you may prefer managing these settings manually.
";
$elem["webcalendar/status/debconf_managed"]["descriptionde"]="settings.conf automatisch verwalten?
 Das Konfigurationsprogramm für das Paket kann die settings.conf-Datei verwalten, aber Sie könnten es bevorzugen, diese Einstellungen manuell zu verwalten.
";
$elem["webcalendar/status/debconf_managed"]["descriptionfr"]="Faut-il gérer le fichier « settings.conf » automatiquement ?
 Il est possible de gérer automatiquement le fichier « settings.conf » au lieu d'avoir à le faire vous-même.
";
$elem["webcalendar/status/debconf_managed"]["default"]="true";
$elem["webcalendar/note/admin_user"]["type"]="note";
$elem["webcalendar/note/admin_user"]["description"]="Password change needed for the WebCalendar administrative user
 After installing the tables for the SQL database you will have access
 to WebCalendar using its administrative user. It is strongly
 suggested that you change the password after logging in.
 .
 The default login and password are 'admin:admin'.
";
$elem["webcalendar/note/admin_user"]["descriptionde"]="Passwortänderung für den administrativen Benutzer von WebCalendar notwendig
 Nach der Installation der Tabellen für Ihre SQL-Datenbank werden Sie als Standard-Administrator-Benutzer auf WebCalendar Zugriff haben. Es wird dringend empfohlen, dass Sie nach der Anmeldung das Passwort ändern.
 .
 Login und Passwort sind standardmäßig auf »admin:admin« gesetzt.
";
$elem["webcalendar/note/admin_user"]["descriptionfr"]="Modification du mot de passe de l'administrateur de WebCalendar
 Après avoir installé les tables de la base de données SQL, vous aurez accès à WebCalendar en utilisant l'identifiant standard « admin ». Il est fortement conseillé de modifier le mot de passe à la première connexion.
 .
 L'identifiant et le mot de passe par défaut sont « admin:admin ».
";
$elem["webcalendar/note/admin_user"]["default"]="";
$elem["webcalendar/conf/httpd_conf"]["type"]="multiselect";
$elem["webcalendar/conf/httpd_conf"]["choices"][1]="apache2";
$elem["webcalendar/conf/httpd_conf"]["choices"][2]="apache";
$elem["webcalendar/conf/httpd_conf"]["choices"][3]="apache-ssl";
$elem["webcalendar/conf/httpd_conf"]["choices"][4]="apache-perl";
$elem["webcalendar/conf/httpd_conf"]["choicesde"][1]="Apache2";
$elem["webcalendar/conf/httpd_conf"]["choicesde"][2]="Apache";
$elem["webcalendar/conf/httpd_conf"]["choicesde"][3]="Apache-ssl";
$elem["webcalendar/conf/httpd_conf"]["choicesde"][4]="Apache-Perl";
$elem["webcalendar/conf/httpd_conf"]["choicesfr"][1]="Apache2";
$elem["webcalendar/conf/httpd_conf"]["choicesfr"][2]="Apache";
$elem["webcalendar/conf/httpd_conf"]["choicesfr"][3]="Apache-SSL";
$elem["webcalendar/conf/httpd_conf"]["choicesfr"][4]="Apache-perl";
$elem["webcalendar/conf/httpd_conf"]["description"]="Web server to configure:
 Apache can be automatically configured to use WebCalendar by creating links in
 /etc/{apache-version}/conf.d/. Select all the versions of Apache you would
 like to automatically configure or 'other' if you don't use Apache or plan on
 configuring Apache yourself.
";
$elem["webcalendar/conf/httpd_conf"]["descriptionde"]="Zu konfigurierender Webserver:
 Apache kann automatisch konfiguriert werden, um WebCalendar zu verwenden, indem Links in /etc/{apache-version}/conf.d/ angelegt werden. Wählen Sie alle Versionen von Apache, die Sie gerne automatisch konfiguriert hätten, oder »anderer«, falls Sie Apache nicht benutzen oder vorhaben, Apache selbst zu konfigurieren.
";
$elem["webcalendar/conf/httpd_conf"]["descriptionfr"]="Serveur(s) web à configurer :
 La configuration automatique peut configurer Apache pour qu'il utilise WebCalendar en créant des liens dans /etc/{apache-version}/conf.d/. Veuillez choisir toutes les versions d'Apache qui doivent être gérées automatiquement. Choisissez « Autre » si vous n'utilisez pas Apache ou si vous préférez configurer Apache vous-même.
";
$elem["webcalendar/conf/httpd_conf"]["default"]="apache2";
$elem["webcalendar/conf/restart_webserver"]["type"]="boolean";
$elem["webcalendar/conf/restart_webserver"]["description"]="Should ${webserver} be restarted?
 In order to activate the new configuration, ${webserver} has to be
 restarted. You can also restart ${webserver} by manually executing
 'invoke-rc.d ${webserver} restart'.
";
$elem["webcalendar/conf/restart_webserver"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Um die neue Konfiguration zu aktivieren, muss ${webserver} neu gestartet werden. Sie können ${webserver} auch manuell neu starten, indem Sie »invoke-rc.d ${webserver} restart« ausführen.
";
$elem["webcalendar/conf/restart_webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Pour activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez aussi redémarrer ${webserver} vous-même en exécutant la commande « invoke-rc.d ${webserver} restart ».
";
$elem["webcalendar/conf/restart_webserver"]["default"]="false";
$elem["webcalendar/store/webservers_to_be_restarted"]["type"]="string";
$elem["webcalendar/store/webservers_to_be_restarted"]["description"]="Webservers to be restarted:
 (This is for internal use only)

";
$elem["webcalendar/store/webservers_to_be_restarted"]["descriptionde"]="";
$elem["webcalendar/store/webservers_to_be_restarted"]["descriptionfr"]="";
$elem["webcalendar/store/webservers_to_be_restarted"]["default"]="";
PKG_OptionPageTail2($elem);
?>
