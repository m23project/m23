<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("caudium");

$elem["caudium/config_port"]["type"]="string";
$elem["caudium/config_port"]["description"]="Config interface port:
 Specify the port on which Caudium will provide its configuration
 interface. You can access the interface using any form capable web browser
 (like Mozilla, Lynx, Links or Galeon)
";
$elem["caudium/config_port"]["descriptionde"]="Port der Konfigurationsschnittstelle:
 Geben Sie den Port an, auf dem Caudium seine Konfigurationsschnittstelle bereitstellen soll. Sie können mit jedem Webbrowser, der Formulare (Forms) kann (wie Mozilla, Lynx, Links oder Galeon) auf diese Schnittstelle zugreifen.
";
$elem["caudium/config_port"]["descriptionfr"]="Port de l'interface de configuration :
 Veuillez indiquer le port sur lequel Caudium offrira son interface de configuration. Vous pourrez alors accéder à cette interface en utilisant n'importe quel navigateur web acceptant les formulaires (comme Mozilla, Lynx, Links ou Galeon).
";
$elem["caudium/config_port"]["default"]="22202";
$elem["caudium/listen_on"]["type"]="string";
$elem["caudium/listen_on"]["description"]="Server port:
 Caudium is currently configured to listen on port '${portno}' of every
 interface in your machine. You can however specify a different port here
 if there's such need.
";
$elem["caudium/listen_on"]["descriptionde"]="Server-Port:
 Caudium ist derzeit so konfiguriert, dass es auf dem Port »${portno}« auf jeder Schnittstelle in Ihrer Maschinen auf Antworten wartet. Sie können allerdings hier - falls notwendig - einen anderen Port angeben:
";
$elem["caudium/listen_on"]["descriptionfr"]="Port du serveur :
 Caudium utilise actuellement le port « ${portno} » sur toutes les interfaces de votre machine. Mais vous pouvez choisir un autre port en cas de besoin.
";
$elem["caudium/listen_on"]["default"]="80";
$elem["caudium/start_options"]["type"]="multiselect";
$elem["caudium/start_options"]["choices"][1]="threads";
$elem["caudium/start_options"]["choices"][2]="debug";
$elem["caudium/start_options"]["choices"][3]="once";
$elem["caudium/start_options"]["choices"][4]="profile";
$elem["caudium/start_options"]["choices"][5]="fd-debug";
$elem["caudium/start_options"]["choicesde"][1]="threads";
$elem["caudium/start_options"]["choicesde"][2]="debug";
$elem["caudium/start_options"]["choicesde"][3]="einmal";
$elem["caudium/start_options"]["choicesde"][4]="profile";
$elem["caudium/start_options"]["choicesde"][5]="fd-debug";
$elem["caudium/start_options"]["choicesfr"][1]="threads";
$elem["caudium/start_options"]["choicesfr"][2]="debug";
$elem["caudium/start_options"]["choicesfr"][3]="once";
$elem["caudium/start_options"]["choicesfr"][4]="profile";
$elem["caudium/start_options"]["choicesfr"][5]="fd-debug";
$elem["caudium/start_options"]["description"]="Startup options:
 You can select zero or more options from:
  'threads' - use threads (if available)
  'debug' - output debugging information while running
  'once' - run in foreground
  'profile' - store profiling information
  'fd-debug' - debug file descriptor usage
  'keep-alive' - keep connections alive with HTTP/1.1
";
$elem["caudium/start_options"]["descriptionde"]="Startoptionen:
 Sie können eine oder mehrere der folgenden Optioen auswählen:
  »threads« - Threads verwenden (falls verfügbar)
  »debug« - im Betrieb Debug-Information ausgeben
  »einmal« - im Vordergrund laufen
  »profile« - »Profiling«-Informationen speichern
  »fd-debug« - Datei-Deskriptor-Verwendung debuggen
  »keep-alive« - Verbindungen mit HTTP/1.1 aufrechterhalten
";
$elem["caudium/start_options"]["descriptionfr"]="Options de démarrage :
 Vous pouvez choisir zéro, une ou plusieurs options :
  - threads    : utiliser les « threads » (si disponible) ;
  - debug      : afficher des informations de débogage ;
  - once       : exécution au premier plan ;
  - profile    : garder les informations de profilage ;
  - fd-debug   : renseigner sur l'utilisation des descripteurs de fichier ;
  - keep-alive : garder les connexions ouvertes avec le protocole HTTP/1.1.
";
$elem["caudium/start_options"]["default"]="threads";
$elem["caudium/performance"]["type"]="boolean";
$elem["caudium/performance"]["description"]="Tune for maximum performance settings?
 If you select this option the Caudium default configuration will be
 tweaked by turning off certain features that can severely slow your server
 down. The features turned off are:
  - extra Roxen compatibility
  - module level security
  - the support database
  - DNS lookups
  - URL modules
 .
 If you use any of the above features DO NOT turn this option on!
";
$elem["caudium/performance"]["descriptionde"]="Einstellungen für maximale Leistung verwenden?
 Falls Sie diese Option wählen, werden die Caudium-Standardeinstellungen so gewählt, dass bestimmte Funktionalität deaktiviert wird, die Ihren Server deutlich verlangsammen könnte. Die folgenden Funktionalitäten werden abgeschaltet:
  - extra Roxen-Kompatibilität
  - Sicherheit auf Modulebene
  - die Unterstützungsdatenbank
  - DNS-Anfragen
  - URL-Module
 .
 Falls Sie eine der obigen Funktionalitäten verwenden, dann schalten Sie diese Option NICHT ein!
";
$elem["caudium/performance"]["descriptionfr"]="Faut-il rechercher la performance maximale ?
 Si vous choisissez cette option, certaines fonctionnalités qui peuvent ralentir considérablement le serveur seront désactivées dans la configuration par défaut. Ces possibilités sont les suivantes :
  - compatibilité supplémentaire avec Roxen ;
  - sécurité au niveau des modules ;
  - la base de données support ;
  - les recherches DNS ;
  - les modules URL.
 .
 Si vous utilisez ces fonctionnalités, NE choisissez PAS cette option !
";
$elem["caudium/performance"]["default"]="false";
$elem["caudium/cfg_port_taken"]["type"]="note";
$elem["caudium/cfg_port_taken"]["description"]="Cannot bind to port
 The port you have specified for the Caudium configuration interface is
 unavailable. Please specify another port number - Caudium cannot function
 properly without binding its configuration interface to a port on your
 system.
";
$elem["caudium/cfg_port_taken"]["descriptionde"]="Kann nicht an den Port binden
 Der von Ihnen angegebene Port für die Caudium-Konfigurationsschnittstelle ist nicht verfügbar. Bitte geben Sie eine andere Portnummer an - Caudium kann nicht korrekt funktionieren, ohne seine Konfigurationsschnittstelle an einen Port auf Ihrem System zu binden.
";
$elem["caudium/cfg_port_taken"]["descriptionfr"]="Impossible d'utiliser le port
 Le port que vous avez configuré pour l'interface de configuration de Caudium n'est pas disponible. Veuillez choisir un autre numéro de port : Caudium ne peut fonctionner normalement sans ouvrir un port pour son interface de configuration sur le système.
";
$elem["caudium/cfg_port_taken"]["default"]="";
$elem["caudium/last_screen"]["type"]="note";
$elem["caudium/last_screen"]["description"]="Caudium configuration
 After your Caudium is installed and running, you should point your
 forms-capable browser to http://localhost:${cfgport} to further configure
 Caudium using its web-based configuration interface. THIS IS VERY
 IMPORTANT since that step involves creation of administrative
 login/password.
 .
 For more information about Caudium see the documents in the
 /usr/share/doc/caudium directory and make sure to visit
 http://caudium.net/ and http://caudium.org/
";
$elem["caudium/last_screen"]["descriptionde"]="Caudium-Konfiguration
 Nachdem Ihr Caudium installiert ist und läuft sollten Sie mit Ihrem Formular-fähigen Browser http://localhost:${cfgport} aufrufen, um Caudium über die Web-basierte Konfigurationsschnittstelle weiter zu konfigurieren. DIES IST SEHR WICHTIG, da dieser Schritt die Erstellung der administrativen Anmeldung und dessen Passwort beinhaltet.
 .
 Für weitere Informationen über Caudium lesen Sie die Dokumente im /usr/share/doc/caudium-Verzeichnis und besuchen Sie http://caudium.net/ und http://caudium.org/.
";
$elem["caudium/last_screen"]["descriptionfr"]="Configuration de Caudium
 Une fois Caudium installé et démarré, vous pourrez pointer votre navigateur web sur http://localhost:${cfgport} pour affiner la configuration de Caudium en utilisant son interface de configuration web. Cette étape est VRAIMENT IMPORTANTE puisque vous allez créer un administrateur (nom et mot de passe).
 .
 Pour plus d'informations sur Caudium, veuillez consulter les documents dans le répertoire /usr/share/doc/caudium et n'oubliez pas de visiter les sites web http://caudium.net/ et http://caudium.org/.
";
$elem["caudium/last_screen"]["default"]="";
$elem["caudium/config_login"]["type"]="string";
$elem["caudium/config_login"]["description"]="Configuration interface login:
 This is the user login name for the configuration interface access. If you
 don't specify anything here, anybody who will access the config interface
 first will be able to set the login/password and manage your server. This
 is probably not what you want. Please specify the login name below or
 accept the default value.
";
$elem["caudium/config_login"]["descriptionde"]="Konfigurationsschnittstellen-Anmeldung:
 Dies ist der Anmeldename für den Zugriff auf die Konfigurationsschnittstelle. Falls Sie hier nichts angeben kann jeder, der zuerst auf die Konfigurationsschnittstelle zugreift, eine Anmeldung und dessen Passwort einrichten und Ihren Server verwalten. Dies ist wahrscheinlich nicht von Ihnen beabsichtigt. Bitte geben Sie unten den Anmeldenamen an oder akzeptieren Sie den Standardwert.
";
$elem["caudium/config_login"]["descriptionfr"]="Identifiant pour l'interface de configuration :
 Un nom d'utilisateur est nécessaire pour accéder à l'interface de configuration. Si vous ne précisez pas de nom maintenant, la première personne qui se connectera sur l'interface de configuration pourra configurer le nom et le mot de passe et gérer le serveur à votre place. Vous ne le souhaitez sûrement pas. Veuillez indiquer un nom ou accepter celui donné par défaut.
";
$elem["caudium/config_login"]["default"]="admin";
$elem["caudium/config_password"]["type"]="password";
$elem["caudium/config_password"]["description"]="Configuration interface password:
 This is the password used to access the configuration interface. The
 default value for it is 'password' - it is HIGHLY RECOMMENDED to change
 the default below!
";
$elem["caudium/config_password"]["descriptionde"]="Passwort der Konfigurationsschnittstelle:
 Dies ist das Passwort, das zum Zugriff auf die Konfigurationsschnittstelle verwendet wird. Der Standardwert hier ist »password« - es wird NACHDRÜCKLICH EMPFOHLEN, dass Sie diesen Wert unten ändern!
";
$elem["caudium/config_password"]["descriptionfr"]="Mot de passe pour l'interface de configuration :
 Un mot de passe est nécessaire pour accéder à l'interface de configuration. La valeur par défaut est « password ». Il est FORTEMENT RECOMMANDÉ de changer le mot de passe par défaut !
";
$elem["caudium/config_password"]["default"]="password";
$elem["caudium/config_password_confirm"]["type"]="password";
$elem["caudium/config_password_confirm"]["description"]="Confirm the configuration interface password:
 Please type in the configuration interface password again for
 confirmation.
";
$elem["caudium/config_password_confirm"]["descriptionde"]="Bestätigen Sie das Passwort der Konfigurationsschnittstelle:
 Bitte geben Sie das Passwort der Konfigurationsschnittstelle erneut zur Bestätigung ein:
";
$elem["caudium/config_password_confirm"]["descriptionfr"]="Veuillez confirmer le mot de passe :
 Veuillez indiquer à nouveau le mot de passe pour l'interface de configuration.
";
$elem["caudium/config_password_confirm"]["default"]="password";
$elem["caudium/config_password_mismatch"]["type"]="note";
$elem["caudium/config_password_mismatch"]["description"]="Configuration interface password mismatch
 The passwords you have typed don't match. Please type again and keep in
 mind that the passwords are case-sensitive.
";
$elem["caudium/config_password_mismatch"]["descriptionde"]="Passwort der Konfigurationsschnittstelle stimmt nicht überein
 Die von Ihnen eingegebenen Passwörter stimmen nicht überein. Bitte tippen Sie erneut und beachten Sie, dass die Groß-/Kleinschreibung hier relevant ist.
";
$elem["caudium/config_password_mismatch"]["descriptionfr"]="Les mots de passe sont différents
 Les mots de passe que vous avez entrés ne correspondent pas. Veuillez réessayer en vous souvenant que la casse des mots est importante.
";
$elem["caudium/config_password_mismatch"]["default"]="";
$elem["caudium/config_password_reset"]["type"]="note";
$elem["caudium/config_password_reset"]["description"]="Configuration interface password reset
 The password has been reset to 'password'. You cannot have an empty 
 password for the configuration interface. Please change the default
 password as soon as Caudium has finished installing. You can do it
 by logging in to the configuration interface accessible under
 the URL given below:
 .
 http://localhost:${cfgport}
";
$elem["caudium/config_password_reset"]["descriptionde"]="Zurücksetzen des Passworts der Konfigurationsschnittstelle
 Das Passwort ist auf »password« zurückgesetzt worden. Sie können kein leeres Passwort für die Konfigurationsschnittstelle verwenden. Bitte ändern Sie das Standardpasswort sobald Caudium installiert ist. Sie können dies erreichen, indem Sie sich an der unten angegebenen URL an der Konfigurationsschnittstelle anmelden:
 .
 http://localhost:${cfgport}
";
$elem["caudium/config_password_reset"]["descriptionfr"]="Nouvelle définition du mot de passe pour l'interface de configuration.
 Le mot de passe a été réinitialisé à « password ». Pour l'interface de configuration, ce mot doit être défini. Veuillez modifier le mot de passe par défaut dès que Caudium sera installé en accédant à l'interface de configuration à l'URL suivante : 
 .
 http://localhost:${cfgport}
";
$elem["caudium/config_password_reset"]["default"]="";
PKG_OptionPageTail2($elem);
?>
