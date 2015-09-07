<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-milter");

$elem["clamav-milter/debconf"]["type"]="boolean";
$elem["clamav-milter/debconf"]["description"]="Handle the configuration file automatically?
 Some options must be configured for clamav-milter.
 .
 It won't work if it isn't configured. If you do not
 configure it automatically, you'll have to configure
 /etc/clamav/clamav-milter.conf manually or run \"dpkg-reconfigure clamav-milter\"
 later. In any case, manual changes in /etc/clamav/clamav-milter.conf will
 be respected.
";
$elem["clamav-milter/debconf"]["descriptionde"]="Soll die Konfigurationsdatei automatisch verwaltet werden?
 Einige Optionen für Clamav-Milter müssen konfiguriert werden.
 .
 Er ist nicht betriebsbereit, solange er nicht eingerichtet ist. Falls Sie ihn nicht automatisch konfigurieren lassen, müssen Sie die Datei /etc/clamav/clamav-milter.conf manuell ändern oder später den Befehl »dpkg-reconfigure clamav-milter« aufrufen. Auf jeden Fall werden aber manuelle Änderungen in der Datei /etc/clamav/clamav-milter.conf beachtet.
";
$elem["clamav-milter/debconf"]["descriptionfr"]="Faut-il gérer le fichier de configuration automatiquement ?
 Certaines options de clamav-milter doivent être configurées.
 .
 clamav-milter ne fonctionnera pas s'il n'est pas configuré. Si vous choisissez de ne pas le configurer automatiquement, vous devrez modifier le fichier /etc/clamav/clamav-milter.conf vous-même ou utiliser la commande « dpkg-reconfigure clamav-milter » plus tard. Dans tous les cas, les modifications manuelles de /etc/clamav/clamav-milter.conf seront préservées.
";
$elem["clamav-milter/debconf"]["default"]="true";
$elem["clamav-milter/MilterSocket"]["type"]="string";
$elem["clamav-milter/MilterSocket"]["description"]="Communication interface with Sendmail:
 Please choose the method that should be used by clamav-milter to
 communicate with Sendmail. The following formats can be used:
  - Unix domain socket: [[unix|local]:]/path/to/file
  - IPv4 socket       : inet:port@[hostname|ip-address]
  - IPv6 socket       : inet6:port@[hostname|ip-address]
";
$elem["clamav-milter/MilterSocket"]["descriptionde"]="Schnittstelle zur Kommunikation mit Sendmail:
 Bitte wählen Sie die Methode, die von Clamav-Milter zur Kommunikation mit Sendmail benutzt werden soll. Die folgenden Formate können verwendet werden:
  - Unix-Domain-Socket: [[unix|local]:]/Pfad/zur/Datei
  - IPv4-Socket:        inet:Port@[Rechnername|IP-Adresse]
  - IPv6-Socket:        inet6:Port@[Rechnername|IP-Adresse]
";
$elem["clamav-milter/MilterSocket"]["descriptionfr"]="Interface de communication avec Sendmail :
 Veuillez entrer la méthode utilisée par clamav-milter pour communiquer avec Sendmail. Les formats suivants peuvent être utilisés :
  - « socket » de domaine Unix : [[unix|local]:]/chemin/vers/un/fichier ;
  - « socket » IPv4 : inet:port@[nom d'hôte|adresse IP] ;
  - « socket » IPv6 : inet6:port@[nom d'hôte|adresse IP].
";
$elem["clamav-milter/MilterSocket"]["default"]="/var/run/clamav/clamav-milter.ctl";
$elem["clamav-milter/FixStaleSocket"]["type"]="boolean";
$elem["clamav-milter/FixStaleSocket"]["description"]="Remove stale socket after unclean shutdown?
";
$elem["clamav-milter/FixStaleSocket"]["descriptionde"]="Übrig gebliebenen Socket nach unplanmäßigem Abschalten entfernen?
";
$elem["clamav-milter/FixStaleSocket"]["descriptionfr"]="Faut-il supprimer la « socket » résiduelle après un arrêt non correct ?
";
$elem["clamav-milter/FixStaleSocket"]["default"]="true";
$elem["clamav-milter/MilterSocketGroup"]["type"]="string";
$elem["clamav-milter/MilterSocketGroup"]["description"]="Group owner of clamav-milter local (UNIX) socket:
";
$elem["clamav-milter/MilterSocketGroup"]["descriptionde"]="Benutzergruppe des lokalen Clamav-Milter-(UNIX)-Sockets:
";
$elem["clamav-milter/MilterSocketGroup"]["descriptionfr"]="Groupe propriétaire du fichier « socket » de clamav-milter :
";
$elem["clamav-milter/MilterSocketGroup"]["default"]="clamav";
$elem["clamav-milter/MilterSocketMode"]["type"]="string";
$elem["clamav-milter/MilterSocketMode"]["description"]="Creation mode for clamav-milter local (UNIX) socket:
";
$elem["clamav-milter/MilterSocketMode"]["descriptionde"]="Erzeugungsmodus für den lokalen Clamac-Milter-(UNIX)-Socket:
";
$elem["clamav-milter/MilterSocketMode"]["descriptionfr"]="Autorisations du fichier « socket » de clamav-milter :
";
$elem["clamav-milter/MilterSocketMode"]["default"]="666";
$elem["clamav-milter/User"]["type"]="string";
$elem["clamav-milter/User"]["description"]="User to run clamav-milter as:
 It is recommended to run the ClamAV programs as a non-privileged user.
 This will work with most MTAs with a little tweaking.
 .
 Please see README.Debian in the clamav-base package for details.
";
$elem["clamav-milter/User"]["descriptionde"]="Benutzernamen, unter dem Clamav-Milter laufen soll:
 Es wird empfohlen, dass die ClamAV-Programme als nicht privilegierter Benutzer laufen. Das funktioniert mit den meisten MTAs mit minimalen Anpassungen.
 .
 Bitte lesen Sie README.Debian im Paket »clamav-base« zu Einzelheiten.
";
$elem["clamav-milter/User"]["descriptionfr"]="Identifiant qui exécutera clamav-milter :
 Il est conseillé d'exécuter les programmes de ClamAV avec les droits d'un utilisateur non privilégié. Avec la plupart des agents de transport de courriel, cela demandera quelques adaptations pour fonctionner.
 .
 Veuillez consulter le fichier README.Debian du paquet clamav-base pour plus de détails.
";
$elem["clamav-milter/User"]["default"]="clamav";
$elem["clamav-milter/AddGroups"]["type"]="string";
$elem["clamav-milter/AddGroups"]["description"]="Groups for clamav-milter (space-separated):
 By default, clamav-milter runs as a non-privileged user. If you need
 clamav-milter to be able to access files owned by another user (for
 instance when it is used in combination with an MTA), the user
 running clamav-milter need to be added to the relevant group(s).
 .
 Please see README.Debian in the clamav-base package for
 details.
";
$elem["clamav-milter/AddGroups"]["descriptionde"]="Gruppen für Clamav-Milter (durch Leerzeichen getrennt):
 In der Voreinstellung läuft Clamav-Milter als nicht privilegierter Benutzer. Falls es bei Ihnen notwendig ist, dass Clamav-Milter auf Dateien zugreifen kann, die anderen Benutzern gehören (z. B. in Zusammenarbeit mit einem MTA), muss der Benutzer, unter dem Clamav-Milter läuft, zu den entsprechenden Gruppen hinzugefügt werden.
 .
 Bitte lesen Sie README.Debian im Paket »clamav-base« zu Einzelheiten.
";
$elem["clamav-milter/AddGroups"]["descriptionfr"]="Groupes de clamav-milter (séparés par des espaces) :
 clamav-milter se lance par défaut sans privilège particulier. S'il faut que clamav-milter accède aux fichiers d'un autre utilisateur (par exemple en combinaison avec un agent de transport de courriel), l'identifiant exécutant clamav-milter doit être ajouté aux groupes correspondants.
 .
 Veuillez consulter le fichier README.Debian du paquet clamav-base pour plus de détails.
";
$elem["clamav-milter/AddGroups"]["default"]="";
$elem["clamav-milter/ReadTimeout"]["type"]="string";
$elem["clamav-milter/ReadTimeout"]["description"]="Wait timeout for data coming from clamd:
 Please enter the delay (in seconds) before clamav-milter times out when it is
 waiting for incoming data from clamd.
 .
 Choosing \"0\" will disable this timeout.
";
$elem["clamav-milter/ReadTimeout"]["descriptionde"]="Zeitlimit für Daten, die von Clamd kommen:
 Bitte gegen Sie die Zeit (in Sekunden) ein, nach deren Ablauf Clamav-Milter aufgeben soll, wenn es auf eingehende Daten von Clamd wartet.
 .
 Eine Eingabe von »0« deaktiviert diese Zeitbeschränkung.
";
$elem["clamav-milter/ReadTimeout"]["descriptionfr"]="Délai d'expiration pour les données provenant de clamd :
 Veuillez entrer le délai d'expiration (en seconde) de clamav-milter lorsqu'il attend des données provenant de clamd.
 .
 Une valeur nulle (« 0 ») désactive le délai d'expiration.
";
$elem["clamav-milter/ReadTimeout"]["default"]="120";
$elem["clamav-milter/Foreground"]["type"]="boolean";
$elem["clamav-milter/Foreground"]["description"]="Should clamav-milter stay in foreground (not forking)?
";
$elem["clamav-milter/Foreground"]["descriptionde"]="Soll Clamav-Milter im Vordergrund bleiben (kein Fork)?
";
$elem["clamav-milter/Foreground"]["descriptionfr"]="Faut-il interdire à clamav-milter de créer des processus fils (« fork ») ?
";
$elem["clamav-milter/Foreground"]["default"]="false";
$elem["clamav-milter/Chroot"]["type"]="string";
$elem["clamav-milter/Chroot"]["description"]="Chroot to directory:
 Clamav-milter can run in a chroot jail. It will enter it after reading
 the configuration file and before dropping root privileges.
 .
 If this field is left empty, no chrooting will occur.
";
$elem["clamav-milter/Chroot"]["descriptionde"]="Chroot in Verzeichnis:
 Clamav-Milter kann in einem Chroot-Gefängnis (Jail) betrieben werden. Es wird in dieses eintreten, nachdem es die Konfigurationsdatei gelesen hat und bevor es root-Privilegien aufgibt.
 .
 Wenn dieses Feld frei gelassen wird, wird kein Chroot verwendet.
";
$elem["clamav-milter/Chroot"]["descriptionfr"]="Répertoire de l'environnement d'exécution sécurisé :
 clamav-milter peut être exécuté dans un environnement d'exécution sécurisé (« chroot »). Il y entrera après avoir lu le fichier de configuration et avant de perdre les privilèges du superutilisateur. 
 .
 Si vous laissez ce champ vide, aucun chroot ne sera utilisé.
";
$elem["clamav-milter/Chroot"]["default"]="";
$elem["clamav-milter/PidFile"]["type"]="string";
$elem["clamav-milter/PidFile"]["description"]="PID file:
 Please specify the process identifier file location for clamav-milter's
 listening daemon (main thread).
";
$elem["clamav-milter/PidFile"]["descriptionde"]="PID-Datei:
 Bitte geben Sie den Speicherort für die Prozess-Identifikations-Datei vom Clamav-Milter-Daemon (Haupt-Thread) an.
";
$elem["clamav-milter/PidFile"]["descriptionfr"]="Fichier PID :
 Veuillez entrer le chemin du fichier d'identification de processus du démon clamav-milter.
";
$elem["clamav-milter/PidFile"]["default"]="/var/run/clamav/clamav-milter.pid";
$elem["clamav-milter/TemporaryDirectory"]["type"]="string";
$elem["clamav-milter/TemporaryDirectory"]["description"]="Temporary directory path:
 Please specify the directory for clamav-milter's files that are temporarily
 buffered for scanning.  If unset, $TMPDIR and $TEMP will be honored.
";
$elem["clamav-milter/TemporaryDirectory"]["descriptionde"]="";
$elem["clamav-milter/TemporaryDirectory"]["descriptionfr"]="Chemin des répertoires temporaires :
 Veuillez indiquer le répertoire des fichiers temporairement mis en cache pour traitement par clamav-milter. Si vous laissez cette entrée vide, les variables d'environnement $TMPDIR et $TEMP seront utilisées.
";
$elem["clamav-milter/TemporaryDirectory"]["default"]="/tmp";
$elem["clamav-milter/ClamdSocket"]["type"]="string";
$elem["clamav-milter/ClamdSocket"]["description"]="Clamd socket to connect to for scanning:
 Please specify the socket to use to connect to the ClamAV daemon for
 scanning purposes. Possible choices are:
  - a local unix socket using an absolute path, in \"unix:path\" format
    (for example: unix:/var/run/clamd/clamd.socket);
  - a local or remote TCP socket in \"tcp:host:port\" format (for example:
    tcp:192.168.0.1). The \"host\" value can be either a hostname or an IP
    address, and the \"port\" is only required for IPv6 addresses,
    defaulting to 3310 otherwise.
 .
 You may specify multiple choices, separated by spaces. In such case, the
 clamd servers will be selected in a round-robin fashion.
";
$elem["clamav-milter/ClamdSocket"]["descriptionde"]="Clamd-Socket, mit dem zur Dateiüberprüfung verbunden werden soll:
 Bitte geben Sie den Socket an, der zur Verbindung mit dem ClamAV-Daemon zur Dateiüberprüfung verwendet werden soll. Mögliche Auswahlen sind:
  - ein lokaler Unix-Socket unter Verwendung eines absoluten Pfades im Format
    »unix:Pfad« (zum Beispiel: unix:/var/run/clamd/clamd.socket)
  - ein lokaler oder in der Ferne befindlicher TCP-Socket im Format
    »tcp:Rechner:Port« (zum Beispiel tcp:192.168.0.1). Der Wert für »Rechner«
    kann entweder ein Rechnername oder eine IP-Adresse sein. Der Port ist nur
    für IPv6-Adressen notwendig. Anderenfalls ist 3310 die Voreinstellung.
 .
 Sie können mehrere Auswahlen durch Leerzeichen getrennt vornehmen. In diesem Fall werden die Clamd-Server reihum ausgewählt.
";
$elem["clamav-milter/ClamdSocket"]["descriptionfr"]="« Socket » de clamd à utiliser pour le traitement :
 Veuillez entrer la « socket » à utiliser pour se connecter au démon ClamAV pour la vérification des courriels. Les choix possibles sont :
  - une « socket » Unix locale avec un chemin absolu sous la forme
    « unix:path », (par exemple : unix:/var/run/clamd/clamd.socket) ;
  - une « socket » TCP locale ou distante sous la forme « tcp:hôte:port »
    (par exemple : tcp:192.168.0.1). La valeur « hôte » peut être un
    nom d'hôte ou une adresse IP et la valeur « port » est seulement
    requise pour les adresses IPv6, par défaut sa valeur est 3310.
 .
 Vous pouvez entrer plusieurs choix, séparés par des espaces. Dans ce cas, les serveurs clamd seront sélectionnés selon la méthode « round-robin ».
";
$elem["clamav-milter/ClamdSocket"]["default"]="unix:/var/run/clamav/clamd.ctl";
$elem["clamav-milter/LocalNet"]["type"]="string";
$elem["clamav-milter/LocalNet"]["description"]="Hosts excluded from scanning:
 Please specify, in CIDR notation (host(name)/mask), the hosts for
 which no scanning should be performed on incoming mail. Multiple entries
 should be separated by spaces. The \"local\" shortcut can be used to
 specify locally-originated (non-SMTP) email.
 .
 If this field is left empty, all incoming mail will be scanned.
";
$elem["clamav-milter/LocalNet"]["descriptionde"]="Rechner, die von der Überprüfung ausgeschlossen sind:
 Bitte geben Sie die Rechner in CIDR-Notation (Rechner(name)/Netzmaske) an, für die eingehende E-Mail nicht überprüft werden soll. Mehrfache Einträge sollten mit Leerzeichen getrennt werden. Die Abkürzung »local« kann verwendet werden, um lokal erzeugte (nicht SMTP) E-Mail anzugeben.
 .
 Falls dieses Feld frei gelassen wird, wird jede eingehende E-Mail überprüft.
";
$elem["clamav-milter/LocalNet"]["descriptionfr"]="Hôtes à exclure de la vérification :
 Veuillez entrer au format CIDR ((nom d')hôte)/masque) les hôtes dont le courriel en provenance ne sera pas vérifié par ClamAV. Les choix multiples doivent être séparés par des espaces. La valeur « local » peut être utilisée pour ne pas vérifier le courriel local.
 .
 Si vous laissez cette entrée vide, tous les courriels entrants seront vérifiés.
";
$elem["clamav-milter/LocalNet"]["default"]="";
$elem["clamav-milter/Whitelist"]["type"]="string";
$elem["clamav-milter/Whitelist"]["description"]="Mail addresses whitelist:
 Please specify the path to a whitelist file, listing email addresses
 that should cause scanning to be bypassed.
 .
 Each line in this file should be a POSIX regular expression; lines
 starting with \"#\", \":\" or \"!\" will be ignored as comments.
 .
 Lines may start with \"From:\" (with no space after the colon) to make
 the whitelisting apply to matching sender addresses; otherwise, or
 with a \"To:\" prefix, it affects recipient addresses.
";
$elem["clamav-milter/Whitelist"]["descriptionde"]="Positivliste für E-Mail-Adressen:
 Bitte geben Sie den Pfad zu einer Datei an, die E-Mail-Adressen auflistet, für die eine Überprüfung ausgelassen werden soll (Whitelist).
 .
 Jede Zeile in dieser Datei sollte ein regulärer Ausdruck (gemäß POSIX) sein. Zeilen, die mit »#«, »:« oder »!« beginnen, werden als Kommentar ignoriert.
 .
 Zeilen können mit »From:« (ohne Leerzeichen nach dem Doppelpunkt) anfangen, um die Positivliste auf passende Absenderadressen anzuwenden. Anderenfalls oder mit einem »To:«-Prefix, beeinflussen sie Empfängeradressen.
";
$elem["clamav-milter/Whitelist"]["descriptionfr"]="Liste blanche d'adresses de courriel :
 Veuillez entrer le chemin d'un fichier de liste blanche d'adresses de courriel pour lesquelles le courriel ne sera pas vérifié.
 .
 Chaque ligne du fichier doit être une expression régulière POSIX. Les lignes commençant par les caractères « # », « : » ou « ! » seront considérées comme des commentaires et ignorées.
 .
 Si une ligne commence par « From: » ou « To: » (sans espace après les deux-points), alors la liste blanche sera appliqué respectivement à l'adresse d'émission ou à l'adresse de réception.
";
$elem["clamav-milter/Whitelist"]["default"]="";
$elem["clamav-milter/OnInfected"]["type"]="select";
$elem["clamav-milter/OnInfected"]["choices"][1]="Accept";
$elem["clamav-milter/OnInfected"]["choices"][2]="Reject";
$elem["clamav-milter/OnInfected"]["choices"][3]="Defer";
$elem["clamav-milter/OnInfected"]["choices"][4]="Blackhole";
$elem["clamav-milter/OnInfected"]["choicesde"][1]="Akzeptieren";
$elem["clamav-milter/OnInfected"]["choicesde"][2]="Ablehnen";
$elem["clamav-milter/OnInfected"]["choicesde"][3]="Verzögern";
$elem["clamav-milter/OnInfected"]["choicesde"][4]="Verwerfen";
$elem["clamav-milter/OnInfected"]["choicesfr"][1]="Accepter";
$elem["clamav-milter/OnInfected"]["choicesfr"][2]="Rejeter";
$elem["clamav-milter/OnInfected"]["choicesfr"][3]="Différer";
$elem["clamav-milter/OnInfected"]["choicesfr"][4]="Détruire";
$elem["clamav-milter/OnInfected"]["description"]="Action to perform on infected messages:
 Please choose the action to perform on \"infected\" messages:
 .
  - Accept    : accept the message for delivery;
  - Reject    : immediately refuse delivery (with a 5xx error);
  - Defer     : return a temporary failure message (4xx);
  - Blackhole : accept the message then drop it;
  - Quarantine: accept the message then quarantine it. With
                Sendmail, the quarantine queue can be examined
                with \"mailq -qQ\". With Postfix, such mails are placed
                on hold.
";
$elem["clamav-milter/OnInfected"]["descriptionde"]="Aktion, die für infizierte Nachrichten ausgeführt werden soll:
 Bitte wählen Sie die Aktion, die für »infizierte« Nachrichten ausgeführt werden soll:
 .
  - Akzeptieren: akzeptiert die Nachricht zur Zustellung (accept)
  - Ablehnen:    lehnt die Zustellung sofort ab (mit einem 5xx-Fehler, reject)
  - Verzögern:   gibt eine temporäre Fehlermeldung zurück (4xx, defer)
  - Verwerfen:   akzeptiert die Nachricht und löscht sie
  - Quarantäne:  akzeptiert die Nachricht und stellt sie unter Quarantäne. 
                 Bei Sendmail kann die Quarantäne-Warteschlange mit
                 »mailq -qQ« untersucht werden. Bei Postfix werden solche
                 E-Mails zurückgehalten.
";
$elem["clamav-milter/OnInfected"]["descriptionfr"]="Action à réaliser pour un courriel « infecté » :
 Veuillez choisir l'action à réaliser pour un courriel « infecté » :
 .
  - accepter : accepter la livraison du courriel ;
  - rejeter : refuser immédiatement la livraison (avec une erreur 5xx) ;
  - différer : renvoyer un courriel d'échec temporaire (4xx) ;
  - détruire : accepter le courriel et le détruire ;
  - quarantaine : accepter le courriel et le mettre en quarantaine.
    Avec Sendmail, la file de quarantaine peut être examinée avec
    « mailq -qQ ». Avec Postfix, de tels courriels sont placés en
    attente dans la file « hold ».
";
$elem["clamav-milter/OnInfected"]["default"]="Quarantine";
$elem["clamav-milter/OnFail"]["type"]="select";
$elem["clamav-milter/OnFail"]["choices"][1]="Accept";
$elem["clamav-milter/OnFail"]["choices"][2]="Reject";
$elem["clamav-milter/OnFail"]["choicesde"][1]="Akzeptieren";
$elem["clamav-milter/OnFail"]["choicesde"][2]="Ablehnen";
$elem["clamav-milter/OnFail"]["choicesfr"][1]="Accepter";
$elem["clamav-milter/OnFail"]["choicesfr"][2]="Rejeter";
$elem["clamav-milter/OnFail"]["description"]="Action to perform on error conditions:
 Please choose the action to perform on errors such as failure to
 allocate data structures, no scanners available,
 network timeouts, unknown scanner replies...:
 .
  - Accept: accept the message for delivery;
  - Reject: immediately refuse delivery (with a 5xx error);
  - Defer : return a temporary failure message (4xx).
";
$elem["clamav-milter/OnFail"]["descriptionde"]="Aktion, die im Fehlerfall ausgeführt werden soll:
 Bitte wählen Sie die Aktion, die im Falle von Fehlern ausgeführt werden soll, wie Fehler beim Allozieren von Datenstrukturen, keine Scanner verfügbar, Zeitüberschreitungen im Netzwerk, unbekannte Scanner-Antworten ...:
 .
  - Akzeptieren: Akzeptieren der Nachricht zur Auslieferung (accept)
  - Ablehnen:    die Zustellung der Nachricht sofort ablehnen (mit einem
                 5xx-Fehler, reject)
  - Verzögern:   Rückgabe einer temporären Fehlermeldung (4xx, defer)
";
$elem["clamav-milter/OnFail"]["descriptionfr"]="Action à réaliser en cas d'erreur :
 Veuillez choisir l'action à réaliser en cas d'erreur telle qu'un échec d'allocation de structures de données, une absence de scanner, des dépassements de délai d'expiration, des réponses inattendues du scanner, etc.
 .
  - accepter : accepter la livraison du courriel ;
  - rejeter : refuser immédiatement la livraison (avec une erreur 5xx) ;
  - différer : renvoyer un courriel d'échec temporaire (4xx).
";
$elem["clamav-milter/OnFail"]["default"]="Defer";
$elem["clamav-milter/RejectMsg"]["type"]="string";
$elem["clamav-milter/RejectMsg"]["description"]="Specific rejection reason for infected messages:
 Please specify the rejection reason that will be included in reject mails.
 .
 This option is only useful together with \"OnInfected Reject\".
 .
 The \"%v\" string may be used to include the virus name.
";
$elem["clamav-milter/RejectMsg"]["descriptionde"]="Genauer Grund zur Ablehnung infizierter Nachrichten:
 Bitte geben Sie den Grund zur Ablehnung ein. Dies wird in Ablehnungs-E-Mails eingefügt.
 .
 Diese Option ist nur zusammen mit »OnInfected Reject« sinnvoll.
 .
 Die Zeichenkette »%v« kann zum Einfügen des Virusnamens verwendet werden.
";
$elem["clamav-milter/RejectMsg"]["descriptionfr"]="Motif de rejet des courriels infectés :
 Veuillez entrer un motif de rejet qui sera ajouté dans les courriels de rejet.
 .
 Cette option est utile uniquement avec « OnInfected Reject ».
 .
 La chaîne « %v » peut être utilisée pour inclure le nom du virus.
";
$elem["clamav-milter/RejectMsg"]["default"]="";
$elem["clamav-milter/AddHeader"]["type"]="select";
$elem["clamav-milter/AddHeader"]["choices"][1]="Replace";
$elem["clamav-milter/AddHeader"]["choices"][2]="Yes";
$elem["clamav-milter/AddHeader"]["choices"][3]="No";
$elem["clamav-milter/AddHeader"]["choicesde"][1]="Ersetzen";
$elem["clamav-milter/AddHeader"]["choicesde"][2]="Ja";
$elem["clamav-milter/AddHeader"]["choicesde"][3]="Nein";
$elem["clamav-milter/AddHeader"]["choicesfr"][1]="Remplacer";
$elem["clamav-milter/AddHeader"]["choicesfr"][2]="Oui";
$elem["clamav-milter/AddHeader"]["choicesfr"][3]="Non";
$elem["clamav-milter/AddHeader"]["description"]="Add headers to processed messages?
 If you choose this option, \"X-Virus-Scanned\" and \"X-Virus-Status\" headers
 will be attached to each processed message, possibly replacing existing
 similar headers. 
";
$elem["clamav-milter/AddHeader"]["descriptionde"]="Kopfzeilen in verarbeitete Nachrichten einfügen?
 Falls Sie diese Option wählen, werden »X-Virus-Scanned«- und »X-Virus-Status«-Kopfzeilen in jede verarbeitete Nachricht eingefügt. Möglicherweise werden dabei vorhandene ähnliche Kopfzeilen ersetzt.
";
$elem["clamav-milter/AddHeader"]["descriptionfr"]="Faut-il ajouter des en-têtes aux courriels vérifiés ?
 Si vous choisissez cette option, les en-têtes « X-Virus-Scanned » et « X-Virus-Status » seront ajoutés à chaque message traité ou remplacés s'ils existaient déjà.
";
$elem["clamav-milter/AddHeader"]["default"]="Replace";
$elem["clamav-milter/LogFile"]["type"]="string";
$elem["clamav-milter/LogFile"]["description"]="Log file for clamav-milter:
 Specify the full path to the clamav-milter log file, which must be
 writable for the clamav daemon. Enter none to disable.
 .
 Logging via syslog is configured independently of this setting.
";
$elem["clamav-milter/LogFile"]["descriptionde"]="Protokolldatei für Clamav-Milter:
 Geben Sie den vollständigen Pfad zur Protokolldatei für Clamav-Milter ein. Diese muss für den Clamav-Daemon schreibbar sein. Geben Sie »none« ein, um dies auszuschalten.
 .
 Die Protokollierung über Syslog wird unabhängig von dieser Einstellung konfiguriert.
";
$elem["clamav-milter/LogFile"]["descriptionfr"]="Fichier de journal de clamav-milter :
 Veuillez entrer le chemin absolu du fichier de journal de clamav-milter. Ce fichier doit être accessible en écriture par le démon clamav. Entrez « none » pour désactiver la journalisation.
 .
 La journalisation via syslog est configurée indépendamment de cette configuration.
";
$elem["clamav-milter/LogFile"]["default"]="/var/log/clamav/clamav-milter.log";
$elem["clamav-milter/LogFileUnlock"]["type"]="boolean";
$elem["clamav-milter/LogFileUnlock"]["description"]="Disable log file locking?
 By default the log file is locked for writing.  The lock protects against
 running clamav-milter multiple times.  This option disables log file locking.
";
$elem["clamav-milter/LogFileUnlock"]["descriptionde"]="Sperren der Protokolldatei deaktivieren?
 In der Voreinstellung wird die Protokolldatei für das Schreiben gesperrt. Die Sperre schützt gegen die gleichzeitig mehrfache Ausführung von Clamav-Milter. Diese Option deaktiviert das Sperren der Protokolldatei.
";
$elem["clamav-milter/LogFileUnlock"]["descriptionfr"]="Faut-il désactiver le verrouillage du fichier de journal ?
 Par défaut, le fichier de journal est verrouillé pour l'écriture. Le verrou protège contre l'exécution de plusieurs clamav-milter. Cette option désactive le verrou du fichier de journal.
";
$elem["clamav-milter/LogFileUnlock"]["default"]="false";
$elem["clamav-milter/LogFileMaxSize"]["type"]="string";
$elem["clamav-milter/LogFileMaxSize"]["description"]="Maximum size of the log file (MB):
 Please specify the maximum size for the log file. Using \"0\" will
 allow that file to grow indefinitely.
";
$elem["clamav-milter/LogFileMaxSize"]["descriptionde"]="Maximale Dateigröße der Protokolldatei (in MB):
 Bitte geben Sie die maximale Dateigröße für die Protokolldatei an. Die Verwendung von »0« erlaubt das unbegrenzte Anwachsen der Datei.
";
$elem["clamav-milter/LogFileMaxSize"]["descriptionfr"]="Taille maximale (en Mo) du fichier de journal :
 Veuillez entrer la taille maximale du fichier de journal. Une valeur nulle, « 0 » signifie qu'il n'y a pas de taille maximale.
";
$elem["clamav-milter/LogFileMaxSize"]["default"]="1M";
$elem["clamav-milter/LogTime"]["type"]="boolean";
$elem["clamav-milter/LogTime"]["description"]="Log time with each message?
";
$elem["clamav-milter/LogTime"]["descriptionde"]="Soll mit jeder Meldung auch die Zeit protokolliert werden?
";
$elem["clamav-milter/LogTime"]["descriptionfr"]="Faut-il ajouter des informations temporelles dans le fichier de journal pour chaque courriel ?
";
$elem["clamav-milter/LogTime"]["default"]="true";
$elem["clamav-milter/LogSyslog"]["type"]="boolean";
$elem["clamav-milter/LogSyslog"]["description"]="Use system logger?
 Please choose whether you want to use the system logger (syslog). This
 option can be used along with logging in a dedicated file.
";
$elem["clamav-milter/LogSyslog"]["descriptionde"]="Soll der Protokolldienst des Systems genutzt werden?
 Bitte wählen Sie, ob Sie den Protokolldienst des Systems (syslog) nutzen möchten. Diese Option kann zusammen mit der Protokollierung in eine dedizierte Datei verwendet werden.
";
$elem["clamav-milter/LogSyslog"]["descriptionfr"]="Faut-il utiliser le système de journalisation syslog ?
 Faut-il utiliser le système de journalisation syslog ? Cette option peut être utilisée en plus de la journalisation dans un fichier dédié.
";
$elem["clamav-milter/LogSyslog"]["default"]="false";
$elem["clamav-milter/LogFacility"]["type"]="string";
$elem["clamav-milter/LogFacility"]["description"]="Type of syslog messages:
 Please choose the type of syslog messages as detailed in the system
 logger's documentation.
";
$elem["clamav-milter/LogFacility"]["descriptionde"]="Typ der Syslog-Nachrichten:
 Bitte wählen Sie den Typ der Syslog-Nachrichten, wie in der Dokumentation des System-Protokolldienstes beschrieben, aus.
";
$elem["clamav-milter/LogFacility"]["descriptionfr"]="Type des messages syslog :
 Veuillez entrer le type des messages syslog comme détaillé dans la documentation de celui-ci.
";
$elem["clamav-milter/LogFacility"]["default"]="LOG_LOCAL6";
$elem["clamav-milter/LogVerbose"]["type"]="boolean";
$elem["clamav-milter/LogVerbose"]["description"]="Enable verbose logging?
";
$elem["clamav-milter/LogVerbose"]["descriptionde"]="Ausführliche Protokollierung aktivieren?
";
$elem["clamav-milter/LogVerbose"]["descriptionfr"]="Faut-il activer la journalisation bavarde ?
";
$elem["clamav-milter/LogVerbose"]["default"]="false";
$elem["clamav-milter/LogInfected"]["type"]="select";
$elem["clamav-milter/LogInfected"]["choices"][1]="Off";
$elem["clamav-milter/LogInfected"]["choices"][2]="Basic";
$elem["clamav-milter/LogInfected"]["choicesde"][1]="Aus";
$elem["clamav-milter/LogInfected"]["choicesde"][2]="Einfach";
$elem["clamav-milter/LogInfected"]["choicesfr"][1]="Désactivé";
$elem["clamav-milter/LogInfected"]["choicesfr"][2]="Basique";
$elem["clamav-milter/LogInfected"]["description"]="Information to log on infected messages:
 Please choose the level of information that will be logged when infected
 messages are found:
  - Off  : no logging;
  - Basic: minimal information;
  - Full : verbose information.
";
$elem["clamav-milter/LogInfected"]["descriptionde"]="Informationen, die für infizierte Nachrichten protokolliert werden:
 Bitte wählen sie den Grad von Informationen, die protokolliert werden, wenn infizierte Nachrichten gefunden werden:
  - Aus:         keine Protokollierung 
  - Einfach:     minimale Informationen
  - Vollständig: Ausführliche Informationen
";
$elem["clamav-milter/LogInfected"]["descriptionfr"]="Niveau d'information à journaliser pour les messages infectés :
 Veuillez choisir le niveau d'information qui sera utilisé par le système de journalisation lorsqu'un courriel infecté est trouvé :
  - désactivé : pas de journalisation ;
  - basique : journalisation avec un minimum d'information ;
  - complet : journalisation bavarde.
";
$elem["clamav-milter/LogInfected"]["default"]="Off";
$elem["clamav-milter/LogClean"]["type"]="select";
$elem["clamav-milter/LogClean"]["choices"][1]="Off";
$elem["clamav-milter/LogClean"]["choices"][2]="Basic";
$elem["clamav-milter/LogClean"]["choicesde"][1]="Aus";
$elem["clamav-milter/LogClean"]["choicesde"][2]="Einfach";
$elem["clamav-milter/LogClean"]["choicesfr"][1]="Désactivé";
$elem["clamav-milter/LogClean"]["choicesfr"][2]="Basique";
$elem["clamav-milter/LogClean"]["description"]="Information to log if no threat is found:
 Please choose the level of information that will be logged when no threat is
 found in a scanned message (this is useful in debugging but drastically
 increases the log size):
  - Off  : no logging;
  - Basic: minimal information;
  - Full : verbose information.
";
$elem["clamav-milter/LogClean"]["descriptionde"]="";
$elem["clamav-milter/LogClean"]["descriptionfr"]="Niveau d'information à journaliser en l'absence d'alerte :
 Veuillez choisir le niveau d'information qui sera utilisé par le système de journalisation lorsqu'aucun problème n'est détecté dans un message analysé (cela est utile pour le débogage mais augmente énormément la taille des journaux) :
  - désactivé : pas de journalisation ;
  - basique : journalisation avec un minimum d'information ;
  - complet : journalisation bavarde.
";
$elem["clamav-milter/LogClean"]["default"]="Off";
$elem["clamav-milter/MaxFileSize"]["type"]="string";
$elem["clamav-milter/MaxFileSize"]["description"]="Size limit for scanned messages (MB):
 Please specify the maximum size for scanned messages. Messages bigger than
 this limit will not be scanned.
 .
 You should check that this value is lower than the value of \"StreamMaxLength\"
 in the clamd.conf file.
";
$elem["clamav-milter/MaxFileSize"]["descriptionde"]="Obergrenze für die Größe überprüfter Nachrichten (in MB):
 Bitte geben Sie die Maximalgröße für überprüfte Nachrichten ein. Nachrichten, die größer als diese Grenze sind, werden nicht überprüft.
 .
 Sie sollten sicherstellen, dass dieser Wert kleiner als der Wert von »StreamMaxLength« in der Datei clamd.conf ist.
";
$elem["clamav-milter/MaxFileSize"]["descriptionfr"]="Taille maximale (en Mo) des fichiers à vérifier :
 Veuillez spécifier la taille maximale des courriels à vérifier. Les courriels dont la taille est supérieure à cette limite ne seront pas vérifiés.
 .
 Vous devez vérifier que cette valeur est inférieure à la valeur de « StreamMaxLength » du fichier de configuration clamd.conf.
";
$elem["clamav-milter/MaxFileSize"]["default"]="25M";
PKG_OptionPageTail2($elem);
?>
