<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wwwoffle");

$elem["wwwoffle/text_new_location"]["type"]="note";
$elem["wwwoffle/text_new_location"]["description"]="The location of some files and directories has been changed
 The config files moved to /etc/wwwoffle/ and the cache dir moved to
 /var/cache/wwwoffle. Further the format of the cache has changed between
 version 1.x and version 2.x and there are some new configuration options.
 Your directories and the config files will be adjusted automatically now.
";
$elem["wwwoffle/text_new_location"]["descriptionde"]="Der Ort einiger Dateien und Verzeichnisse hat sich geändert.
 Die Konfigurationsdateien wurden nach /etc/wwwoffle/ verschoben, das Cache-Verzeichnis befindet sich nun unter /var/cache/wwwoffle. Weiterhin hat sich das Cache-Format zwischen Version 1.x und Version 2.x verändert und es kamen einige neue Einstellungen hinzu. Ihre Verzeichnisse und Konfigurationsdateien werden nun automatisch angepasst.
";
$elem["wwwoffle/text_new_location"]["descriptionfr"]="Changement de l'emplacement de certains fichiers et répertoires
 Les fichiers de configuration de wwwoffle sont maintenant placés dans /etc/wwwoffle/ et le répertoire de cache est /var/cache/wwwoffle. De plus le format du cache a changé entre les versions 1.x et 2.x et de nouvelles options de configuration sont apparues. Ces changements vont être mis en oeuvre automatiquement.
";
$elem["wwwoffle/text_new_location"]["default"]="";
$elem["wwwoffle/passwd"]["type"]="password";
$elem["wwwoffle/passwd"]["description"]="Configuration now requires a password:
 To prevent any random user on the system from changing the state of the
 wwwoffle daemon (e.g. put it offline), a password will be added to the
 /etc/wwwoffle/wwwoffle.conf file. If non-root users have to be able to
 control the daemon, they must be in the \"proxy\" group (see \"man group\")
 and they must pass the parameters \"-c /etc/wwwoffle/wwwoffle.conf\" in
 addition to other options.
";
$elem["wwwoffle/passwd"]["descriptionde"]="Die Konfiguration benötigt nun ein Passwort:
 Damit nicht jeder Benutzer des Systems den Status des Dienstes Wwwoffle verändern kann (z. B. um ihn in den Offline-Modus zu versetzen), wird ein Passwort in die Datei /etc/wwwoffle/wwwoffle.conf eingetragen. Wenn andere Benutzer als Root die Kontrolle über den Dienst haben sollen, müssen diese in der Gruppe »Proxy« eingetragen sein (siehe »man group«) und sie müssen zusätzlich zu den anderen Optionen den Parameter »-c /etc/wwwoffle/wwwoffle.conf« angeben.
";
$elem["wwwoffle/passwd"]["descriptionfr"]="Mot de passe :
 Pour qu'aucun utilisateur non autorisé ne puisse modifier l'état du démon wwwoffle (p. ex. le déconnecter), un mot de passe va être ajouté au fichier /etc/wwwoffle/wwwoffle.conf. Si des utilisateurs autres que le superutilisateur doivent pouvoir gérer le démon, ils devront appartenir au groupe « proxy » (voir « man group ») et passer les paramètres « -c /etc/wwwoffle/wwwoffle.conf » en plus des autres options.
";
$elem["wwwoffle/passwd"]["default"]="";
$elem["wwwoffle/select_html_lang"]["type"]="select";
$elem["wwwoffle/select_html_lang"]["choices"][1]="en (English)";
$elem["wwwoffle/select_html_lang"]["choices"][2]="de (German)";
$elem["wwwoffle/select_html_lang"]["choices"][3]="es (Spanish)";
$elem["wwwoffle/select_html_lang"]["choices"][4]="fr (French)";
$elem["wwwoffle/select_html_lang"]["choices"][5]="it (Italian)";
$elem["wwwoffle/select_html_lang"]["choices"][6]="nl (Dutch)";
$elem["wwwoffle/select_html_lang"]["choices"][7]="pl (Polish)";
$elem["wwwoffle/select_html_lang"]["choicesde"][1]="en (Englisch)";
$elem["wwwoffle/select_html_lang"]["choicesde"][2]="de (Deutsch)";
$elem["wwwoffle/select_html_lang"]["choicesde"][3]="es (Spanisch)";
$elem["wwwoffle/select_html_lang"]["choicesde"][4]="fr (Französisch)";
$elem["wwwoffle/select_html_lang"]["choicesde"][5]="it (Italienisch)";
$elem["wwwoffle/select_html_lang"]["choicesde"][6]="nl (Niederländisch)";
$elem["wwwoffle/select_html_lang"]["choicesde"][7]="pl (Polnisch)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][1]="en (anglais)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][2]="de (allemand)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][3]="es (espagnol)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][4]="fr (français)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][5]="it (italien)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][6]="nl (néerlandais)";
$elem["wwwoffle/select_html_lang"]["choicesfr"][7]="pl (polonais)";
$elem["wwwoffle/select_html_lang"]["description"]="your default language:
 wwwoffle offers you translations of most of the internal HTML pages. Those
 pages which are not yet translated will automatically be replaced with the
 English ones.
 .
 Note that the languages configuration in your browser will override this
 default.
";
$elem["wwwoffle/select_html_lang"]["descriptionde"]="Ihre Standard-Sprache:
 Wwwoffle bietet Ihnen Übersetzungen der meisten seiner eigenen HTML-Seiten. Seiten, die noch nicht übersetzt wurden, werden automatisch auf Englisch angezeigt.
 .
 Bitte beachten Sie, dass die Spracheinstellung Ihres Browsers diese Standardeinstellung außer Kraft setzt.
";
$elem["wwwoffle/select_html_lang"]["descriptionfr"]="Langue par défaut :
 La plupart des pages HTML de wwwoffle sont traduites. Celles qui ne sont pas encore traduites sont automatiquement remplacées par leur version anglaise.
 .
 Veuillez noter que le système de configuration des langues des navigateurs remplacera cette configuration par défaut.
";
$elem["wwwoffle/select_html_lang"]["default"]="en (English)";
$elem["wwwoffle/note_upgrade_config_failed"]["type"]="note";
$elem["wwwoffle/note_upgrade_config_failed"]["description"]="ATTENTION: There was an error while converting the config
 Your config file has been preserved as /etc/wwwoffle/wwwoffle.conf.old .
 Please correct manually. Take a look at /var/log/wwwoffle-upgrade.log for
 reasons. Please delete this logfile manually.
";
$elem["wwwoffle/note_upgrade_config_failed"]["descriptionde"]="Während der Konvertierung der Einstellungen trat ein Fehler auf.
 Ihre Konfigurationsdatei wurde unter /etc/wwwoffle/wwwoffle.conf.old gesichert. Bitte korrigieren Sie die Datei manuell. Hinweise auf den Grund des Fehlers finden Sie in der Datei /var/log/wwwoffle-upgrade.log. Bitte löschen Sie diese Protokolldatei selbst.
";
$elem["wwwoffle/note_upgrade_config_failed"]["descriptionfr"]="Erreur lors de la conversion de la configuration
 Votre fichier de configuration a été sauvegardé dans /etc/wwwoffle/wwwoffle.conf.old. Veuillez faire vous-même les modifications. Pour connaître les raisons de cette erreur, examinez le fichier /var/log/wwwoffle-upgrade.log. Veuillez ensuite supprimer ce fichier.
";
$elem["wwwoffle/note_upgrade_config_failed"]["default"]="";
$elem["wwwoffle/string_port_number"]["type"]="string";
$elem["wwwoffle/string_port_number"]["description"]="the port number wwwoffle runs on:
 The default port number for HTTP proxy caches is 8080. To use wwwoffle as
 proxy for your favourite web browser you have to use \"localhost:8080\" (or
 whatever port number you've chosen).
 .
 P.S.: Netscape users can simply write http://localhost:8080/wwwoffle.pac
 in
       Edit->Preferences->Advanced->Proxies->Automatic_proxy_configuration
";
$elem["wwwoffle/string_port_number"]["descriptionde"]="Nummer des Ports, an dem Wwwoffle wartet:
 Der Standard-Port für HTTP-Proxys ist 8080. Um Wwwoffle als Proxy für Ihren Web-Browser benutzen zu können, müssen sie diesen als »localhost:8080« (oder den von Ihnen gewählten Port) eintragen.
 .
 P.S.: Benutzer von Netscape tragen im Menü »Bearbeiten->Einstellungen->Erweitert->Proxies->Automatische Proxy Konfiguration« einfach http://localhost:8080/wwwoffle.pac ein.
";
$elem["wwwoffle/string_port_number"]["descriptionfr"]="Numéro de port pour wwwoffle :
 Le numéro de port par défaut des caches mandataires HTTP est 8080. Vous devez indiquer « localhost:8080 » (ou tout autre numéro) pour que votre navigateur préféré utilise wwwoffle comme mandataire.
 .
 Les utilisateurs de Netscape peuvent simplement écrire http://localhost:8080/wwwoffle.pac dans Edit->Preferences->Advanced->Proxies->Automatic_proxy_configuration (pour les versions françaises : Édition->Préférences->Avancées->Proxy->Configuration automatique du proxy).
";
$elem["wwwoffle/string_port_number"]["default"]="8080";
$elem["wwwoffle/string_parent_proxy"]["type"]="string";
$elem["wwwoffle/string_parent_proxy"]["description"]="Use which parent proxy (current is ${PARENT_PROXY}):
 Using a parent proxy normally results in a remarkable speed gain. If you
 don't want to use one enter \"none\" in this field; else enter the proxy in
 the form \"proxy.example.com:8080\".
 .
 Use \"manual\" if you don't want the proxy lines in the config file touched
 by the automatic configuration.
";
$elem["wwwoffle/string_parent_proxy"]["descriptionde"]="Benutze welchen übergeordneten Proxy (aktuell ist ${PARENT_PROXY}):
 Einen übergeordneten Proxy zu benutzen führt im Allgemeinen zu einem beachtlichen Geschwindigkeitszuwachs. Wenn Sie keinen benutzen möchten, geben Sie bitte »none« ein, ansonsten geben Sie den Proxy in der Form »proxy.domain.com:8080« ein.
 .
 Geben Sie »manual« ein, wenn Sie nicht wollen, dass die Proxy-Zeilen in der Konfigurationsdatei bei einer automatischen Einrichtung bearbeitet werden.
";
$elem["wwwoffle/string_parent_proxy"]["descriptionfr"]="${PARENT_PROXY}) :
 Habituellement, l'utilisation d'un mandataire parent permet des gains de vitesse remarquables. Entrez « none » si vous ne voulez pas en utiliser. Sinon, indiquez le nom du mandataire sous la forme : « proxy.exemple.com:8080 ».
 .
 Entrez « manual » si vous ne souhaitez pas que les lignes relatives au pare-feu dans le fichier de configuration soient modifiées automatiquement.
";
$elem["wwwoffle/string_parent_proxy"]["default"]="none";
$elem["wwwoffle/use-ppp-interface"]["type"]="boolean";
$elem["wwwoffle/use-ppp-interface"]["description"]="Does wwwoffle rely on a dialup (PPP) interface for its connection?
 Most people will need to accept here. Refuse, only if you have a parent proxy
 that is reachable without a PPP (analog or ISDN) interface.
";
$elem["wwwoffle/use-ppp-interface"]["descriptionde"]="Benötigt Wwwoffle eine Einwahl-Schnittstelle (PPP)?
 Die meisten Leute sollten hier zustimmen. Nur wenn Sie einen übergeordneten Proxy benutzen, der ohne PPP-Schnittstelle (analog oder ISDN) erreichbar ist, sollten Sie hier ablehnen.
";
$elem["wwwoffle/use-ppp-interface"]["descriptionfr"]="Faut-il connecter wwwoffle via une interface PPP (avec composition de numéro) ?
 La plupart des utilisateurs devraient choisir cette option. Ne refusez que si vous accédez à un mandataire parent sans interface PPP (analogique ou numérique RNIS).
";
$elem["wwwoffle/use-ppp-interface"]["default"]="true";
$elem["wwwoffle/ppp-fetch"]["type"]="boolean";
$elem["wwwoffle/ppp-fetch"]["description"]="Should wwwoffle fetch pages when the PPP interface comes up?
 Most people will accept here. However, if you regularly
 bring up the connection just to check for mail and you only want to fetch
 web pages once a day or so (manually), you should refuse.
";
$elem["wwwoffle/ppp-fetch"]["descriptionde"]="Soll Wwwoffle Web-Seiten herunterladen, sobald eine PPP-Verbindung aufgebaut wurde?
 Die meisten Leute sollten hier zustimmen. Wenn Sie jedoch nur eine Verbindung aufbauen, um Ihre E-Mails zu lesen oder falls Sie nur einmal am Tag automatisch (oder manuell) Web-Seiten holen möchten, lehnen Sie hier ab.
";
$elem["wwwoffle/ppp-fetch"]["descriptionfr"]="Faut-il récupérer des pages dès que l'interface PPP est mise en route ?
 La plupart des utilisateurs devraient choisir cette option. Cependant, si vous lancez la connexion uniquement pour vérifier votre boîte aux lettres ou si vous récupérez des pages web une fois par jour et manuellement, refusez.
";
$elem["wwwoffle/ppp-fetch"]["default"]="true";
$elem["wwwoffle/use-htdig"]["type"]="boolean";
$elem["wwwoffle/use-htdig"]["description"]="Should htdig be used to index the cached pages?
 With this, it is possible to direct htdig to index the cached pages so
 that those pages can be searched with htdig.
 .
 Note: this _can_ take a lot of time to do!
";
$elem["wwwoffle/use-htdig"]["descriptionde"]="Soll Htdig die zwischengespeicherten Web-Seiten indizieren?
 Hier ist es möglich, Htdig anzuweisen, einen Index der zwischengespeicherten Seiten zu erstellen. Anschließend können diese mit Htdig durchsucht werden.
 .
 Hinweis: Das _kann_ sehr lange dauern!
";
$elem["wwwoffle/use-htdig"]["descriptionfr"]="Faut-il utiliser htdig pour indexer les pages mises en cache ?
 Avec cette option, il est possible d'indexer et d'effectuer des recherches avec htdig sur les pages mises en cache.
 .
 Note : cela peut prendre beaucoup de temps.
";
$elem["wwwoffle/use-htdig"]["default"]="false";
$elem["wwwoffle/conf-perm"]["type"]="note";
$elem["wwwoffle/conf-perm"]["description"]="wwwoffle.conf is now only readable by root and group proxy
 To prevent just anyone from changing the state of the daemon, the file
 wwwoffle.conf has been made unreadable by others not root and not in the
 group \"proxy\". To add users to that group, use \"adduser nameofuser proxy\".
";
$elem["wwwoffle/conf-perm"]["descriptionde"]="wwwoffle.conf ist nun nur noch von Root und der Gruppe Proxy lesbar
 Damit nicht jeder Benutzer des Systems den Status des Dienstes Wwwoffle verändern kann, wurde die Datei wwwoffle.conf für alle Benutzer außer Root und der Gruppe »Proxy« auf unlesbar gesetzt. Um Benutzer in diese Gruppe aufzunehmen, verwenden Sie das Kommano: 'adduser <Benutzername> proxy'.
";
$elem["wwwoffle/conf-perm"]["descriptionfr"]="Fichier wwwoffle.conf accessible seulement à « root » et au groupe « proxy »
 Pour éviter que n'importe qui puisse modifier l'état du démon wwwoffle, seuls le superutilisateur et les membres du groupe « proxy » peuvent lire le fichier wwwoffle.conf. Utilisez « adduser nom-de-l-utilisateur proxy » pour ajouter un utilisateur à ce groupe.
";
$elem["wwwoffle/conf-perm"]["default"]="";
$elem["wwwoffle/fetchfrequency"]["type"]="string";
$elem["wwwoffle/fetchfrequency"]["description"]="Fetch interval for monitored pages while online:
 Monitored pages can be fetched when the PPP link goes up. However, when online,
 there is no standard mechanism to regularly fetch monitored pages. The Debian
 package has a cronjob that does this.
 .
 As monitored pages are usually not scheduled that often, the recommended value
 of 30 minutes should be adequate. Note that this is also the maximum allowed.
 .
 Enter \"off\" to disable the fetching while online.
";
$elem["wwwoffle/fetchfrequency"]["descriptionde"]="Häufigkeit des Herunterladens beobachteter Web-Seiten, während Wwwoffle online ist:
 Beobachtete Web-Seiten können heruntergeladen werden, sobald die PPP-Verbindung ins Netz aufgebaut worden ist. Im Online-Modus gibt es jedoch keinen Standard-Mechanismus um beobachtete Seiten regelmäßig herunterzuladen. Das Debian-Paket erledigt das über einen Cronjob.
 .
 Da sich beobachtete Seiten für gewöhnlich nicht so häufig verändern, sollte der empfohlene Wert von 30 Minuten ausreichend sein. Beachten Sie, dass das auch der zulässige Höchstwert ist.
 .
 Geben Sie »off« ein um das Herunterladen im Online-Modus zu deaktivieren.
";
$elem["wwwoffle/fetchfrequency"]["descriptionfr"]="Fréquence de récupération des pages surveillées :
 Les pages surveillées peuvent être récupérées lorsque le lien PPP devient actif. Cependant, une fois connecté, il n'existe pas de mécanisme permettant de récupérer régulièrement les pages surveillées. Le paquet Debian utilise une tâche cron pour cela.
 .
 La modification des pages surveillées n'étant en général pas planifiée, la valeur conseillée de 30 minutes devrait être correcte. Veuillez noter que cette valeur est le maximum autorisé.
 .
 Indiquez « off » pour désactiver ce mécanisme de récupération lorsque la connexion est active.
";
$elem["wwwoffle/fetchfrequency"]["default"]="30";
PKG_OptionPageTail2($elem);
?>
