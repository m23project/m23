<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("roundcube-core");

$elem["roundcube/reconfigure-webserver"]["type"]="multiselect";
$elem["roundcube/reconfigure-webserver"]["choices"][1]="apache2";
$elem["roundcube/reconfigure-webserver"]["choicesde"][1]="Apache2";
$elem["roundcube/reconfigure-webserver"]["choicesfr"][1]="Apache 2";
$elem["roundcube/reconfigure-webserver"]["description"]="Web server(s) to configure automatically:
 RoundCube supports any web server supported by PHP, however only
 Apache 2 and lighttpd can be configured automatically.
 .
 Please select the web server(s) that should be configured
 automatically for RoundCube.
";
$elem["roundcube/reconfigure-webserver"]["descriptionde"]="Webserver, die automatisch konfiguriert werden sollen:
 RoundCube unterstützt jeden Webserver, der auch von PHP unterstützt wird. Allerdings kann nur Apache 2 und Lighttpd automatisch konfiguriert werden.
 .
 Bitte wählen Sie den/die Webserver aus, die für RoundCube automatisch konfiguriert werden sollen.
";
$elem["roundcube/reconfigure-webserver"]["descriptionfr"]="Serveur(s) web à configurer automatiquement :
 RoundCube fonctionne avec n'importe quel serveur web géré par PHP. Cependant, seuls Apache 2 et lighttpd peuvent être configurés automatiquement.
 .
 Veuillez choisir le(s) serveur(s) Web à configurer automatiquement pour Roundcube.
";
$elem["roundcube/reconfigure-webserver"]["default"]="apache2, lighttpd";
$elem["roundcube/restart-webserver"]["type"]="boolean";
$elem["roundcube/restart-webserver"]["description"]="Should the webserver(s) be restarted now?
 In order to activate the new configuration, the reconfigured web
 server(s) have to be restarted.
";
$elem["roundcube/restart-webserver"]["descriptionde"]="Soll der/die Webserver jetzt automatisch neu gestartet werden?
 Um die neue Konfiguration zu aktivieren, müssen der/die rekonfigurierten Webserver neu gestartet werden.
";
$elem["roundcube/restart-webserver"]["descriptionfr"]="Faut-il redémarrer le(s) serveur(s) web maintenant ?
 Afin d'activer la nouvelle configuration, le(s) serveur(s) web reconfigurés doive(nt) être redémarrés.
";
$elem["roundcube/restart-webserver"]["default"]="true";
$elem["roundcube/hosts"]["type"]="string";
$elem["roundcube/hosts"]["description"]="IMAP server(s) used with RoundCube:
 Please select the IMAP server(s) that should be used with RoundCube.
 .
 If this is left blank, a text box will be displayed at
 login. Entering a space-separated list of hosts will display a
 pull-down menu. Entering a single host will enforce using this
 host.
 .
 To use SSL connections, please enter host names as 'ssl://hostname:993'.
";
$elem["roundcube/hosts"]["descriptionde"]="IMAP-Server, die mit RoundCube verwendet werden sollen:
 Bitte wählen Sie den/die IMAP-Server aus, die mit RoundCube verwendet werden soll.
 .
 Falls dies leer gelassen wird, erscheint ein Textkasten bei der Anmeldung. Bei Eingabe einer Liste von Rechnern (durch Leerzeichen getrennt) wird ein Auswahlmenü angezeigt. Wird ein einzelner Rechner eingegeben, so wird dieser erzwungen.
 .
 Um SSL-Verbindungen zu benutzen, geben Sie bitte die Rechnernamen als »ssl://hostname:993« ein.
";
$elem["roundcube/hosts"]["descriptionfr"]="Serveur(s) IMAP à utiliser avec RoundCube :
 Veuillez choisir le(s) serveur(s) IMAP que doit utiliser RoundCube.
 .
 Si ce champ est laissé vide, il pourra être renseigné à la connexion. En entrant une liste d'hôtes séparés par des espaces, ceux-ci apparaîtront dans un menu déroulant. En spécifiant un seul hôte, ce dernier sera systématiquement utilisé.
 .
 Pour utiliser des connexions sécurisées (SSL), veuillez indiquer le nom du serveur sous la forme « ssl://serveur:993 ».
";
$elem["roundcube/hosts"]["default"]="Default:";
$elem["roundcube/language"]["type"]="select";
$elem["roundcube/language"]["description"]="Default language:
 Please choose the default language for RoundCube.
 .
 This choice can be overridden by individual users in their preferences.
 .
 However, the default language will be used for the login screen and
 the first connection of users.
";
$elem["roundcube/language"]["descriptionde"]="Standardsprache:
 Bitte wählen Sie die Standardsprache für RoundCube.
 .
 Diese Auswahl kann von jedem Benutzer in seinen persönlichen Einstellungen überschrieben werden.
 .
 Allerdings wird die Standardsprache beim Anmeldebildschirm und der ersten Verbindung mit den Benutzern verwandt.
";
$elem["roundcube/language"]["descriptionfr"]="Langue par défaut :
 Veuillez choisir la langue par défaut pour RoundCube.
 .
 Ce choix peut être personnalisé par chaque utilisateur dans ses préférences.
 .
 Cependant, la langue par défaut sera utilisée sur l'écran de connexion et lors de la première connexion de chaque utilisateur.
";
$elem["roundcube/language"]["default"]="";
PKG_OptionPageTail2($elem);
?>
