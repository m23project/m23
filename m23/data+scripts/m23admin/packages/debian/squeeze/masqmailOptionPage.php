<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("masqmail");

$elem["masqmail/manage_config_with_debconf"]["type"]="boolean";
$elem["masqmail/manage_config_with_debconf"]["description"]="Manage masqmail.conf automatically?
 The /etc/masqmail/masqmail.conf file can be handled automatically by
 answering a few questions, or entirely manually by the local administrator.
 .
 Note that only specific, marked sections of the configuration file will be
 managed this way if you choose this option; if those markers are missing,
 you will have to update the file manually, or remove the file.
";
$elem["masqmail/manage_config_with_debconf"]["descriptionde"]="Automatische Verwaltung von masqmail.conf?
 Die Datei /etc/masqmail/masqmail.conf kann automatisch mittels der Beantwortung einiger Fragen oder vollständig manuell durch den lokalen Administrator verwaltet werden.
 .
 Beachten Sie, dass nur spezifische, markierte Abschnitte der Konfigurationsdatei auf diese Weise behandelt werden, falls Sie diese Möglichkeit wählen. Falls diese Markierungen fehlen, müssen Sie die Datei manuell aktualisieren oder löschen.
";
$elem["masqmail/manage_config_with_debconf"]["descriptionfr"]="Faut-il gérer masqmail.conf automatiquement ?
 Le fichier /etc/masqmail/masqmail.conf peut être modifié automatiquement en répondant à quelques questions ou entièrement manuellement par l'administrateur.
 .
 Veuillez noter que seules les sections spécifiquement marquées du fichier de configuration pourront être modifiées automatiquement si vous choisissez cette option ; si ces marqueurs sont absents, vous devrez mettre à jour le fichier vous-même ou le supprimer.
";
$elem["masqmail/manage_config_with_debconf"]["default"]="true";
$elem["masqmail/move_existing_nondebconf_config"]["type"]="boolean";
$elem["masqmail/move_existing_nondebconf_config"]["description"]="Replace existing /etc/masqmail/masqmail.conf file?
 The existing /etc/masqmail/masqmail.conf file currently on the system does
 not contain a marked section for automatic configuration management.
 .
 If you choose this option, the existing configuration
 file will be backed up to /etc/masqmail/masqmail.conf.debconf-backup and a
 new file written to /etc/masqmail/masqmail.conf.  If you do not choose this
 option, the existing configuration file will not be managed automatically,
 and no further questions about masqmail configuration will be
 asked.
";
$elem["masqmail/move_existing_nondebconf_config"]["descriptionde"]="Die existierende Datei /etc/masqmail/masqmail.conf ersetzen?
 Die Datei /etc/masqmail/masqmail.conf, die sich gegenwärtig auf dem System befindet, enthält keinen zur automatischen Konfiguration markierten Abschnitt.
 .
 Falls Sie diese Möglichkeit wählen, wird die existierende Konfigurationsdatei als /etc/masqmail/masqmail.conf.debconf-backup gesichert und eine neue Datei wird nach /etc/masqmail/masqmail.conf geschrieben. Anderenfalls wird die existierende Konfigurationsdatei nicht automatisch verwaltet und keine weiteren Fragen zur Masqmail-Konfiguration werden gestellt.
";
$elem["masqmail/move_existing_nondebconf_config"]["descriptionfr"]="Faut-il remplacer le fichier /etc/masqmail/masqmail.conf actuel ?
 Le fichier /etc/masqmail/masqmail.conf actuellement présent sur le système ne contient pas de section marquée pour la configuration automatique.
 .
 Si vous choisissez cette option, le fichier de configuration existant sera sauvegardé dans /etc/masqmail/masqmail.conf.debconf-backup et un nouveau fichier sera écrit dans /etc/masqmail/masqmail.conf. Dans le cas contraire, le fichier de configuration ne sera pas géré automatiquement et aucune autre question à propos de la configuration de masqmail ne vous sera posée.
";
$elem["masqmail/move_existing_nondebconf_config"]["default"]="false";
$elem["masqmail/host_name"]["type"]="string";
$elem["masqmail/host_name"]["description"]="Masqmail host name:
 Please enter the name used by masqmail to identify itself to others.
 This is most likely the machine's hostname. It is used in the SMTP
 greetings banner and generated Message-ID fields, as well as for
 expansion of unqualified addresses, and so on.
";
$elem["masqmail/host_name"]["descriptionde"]="Name des Masqmail-Rechners:
 Bitte geben Sie den Namen ein, den Masqmail verwendet, um sich bei anderen zu identifizieren. Dies ist sehr wahrscheinlich der Rechnername. Er wird im SMTP-Begrüßungs-Banner und in erzeugten Message-ID-Feldern sowie zur Vervollständigung unqualifizierter Adressen und so weiter verwendet.
";
$elem["masqmail/host_name"]["descriptionfr"]="Nom de domaine pour masqmail :
 Veuillez indiquer le nom utilisé par masqmail pour s'identifier. Il s'agit probablement du nom réseau de cette machine. Il sera utilisé dans les en-têtes SMTP, pour compléter les adresses non complètement qualifiées, l'identifiant du message, etc.
";
$elem["masqmail/host_name"]["default"]="Default:";
$elem["masqmail/local_hosts"]["type"]="string";
$elem["masqmail/local_hosts"]["description"]="Hosts considered local:
 Please enter a list, separated with semicolons (;), of hosts which are
 considered \"local\". Mail to these hosts will be delivered to a
 mailbox (or Maildir or MDA) on this host.
 .
 You will most likely insert \"localhost\" as well as this host's fully
 qualified name and short name.
 .
 You can also use wildcard expressions containing \"*\" and \"?\".
";
$elem["masqmail/local_hosts"]["descriptionde"]="Rechner, die als lokal angesehen werden:
 Bitte geben Sie eine durch Semikolons (;) getrennte Liste von Rechnern ein, welche als »lokal« angesehen werden. E-Mail an diese Rechner wird an ein Postfach (oder Maildir oder MDA) auf diesem Rechner geliefert.
 .
 Wahrscheinlich sollten Sie hier »localhost« sowie den vollständigen und einfachen Namen dieses Rechners eingeben.
 .
 Sie können auch Ausdrücke, die Platzhalter wie »*« und »?« enthalten, verwenden.
";
$elem["masqmail/local_hosts"]["descriptionfr"]="Hôtes considérés comme locaux :
 Veuillez indiquer la liste des hôtes, séparés par des points-virgules (;), qui seront considérés comme « locaux ». Les courriels pour ces hôtes seront délivrés à une boîte aux lettres (ou bien un répertoire Maildir ou encore un agent de distribution de courriel ou MDA) sur cette machine.
 .
 Vous devriez probablement inclure « localhost » ainsi que le nom de domaine complètement qualifié de cette machine et son nom court.
 .
 Vous pouvez également utiliser des caractères jokers comme « * » et « ? ».
";
$elem["masqmail/local_hosts"]["default"]="";
$elem["masqmail/local_nets"]["type"]="string";
$elem["masqmail/local_nets"]["description"]="Networks considered local:
 Please enter a list, separated with semicolons (;), of hosts which are
 on the local network. That is, they should be always reachable, without a
 dialup connection. Mail to these hosts will be delivered immediately,
 without checking for the online status.
 .
 You can use wildcard expressions containing \"*\" and \"?\", for
 instance \"*.yournet.local\".
 .
 That field can be left empty if this host is the only host on the
 network. If you do not want
 to use Masqmail as an offline MTA and all servers likely to receive
 outbound mail from this host are always reachable, just use \"*\"
 here.
";
$elem["masqmail/local_nets"]["descriptionde"]="Netzwerke, die als lokal angesehen werden:
 Bitte geben Sie eine durch Semikolons (;) getrennte Liste von Rechnern ein, die sich in Ihrem lokalen Netzwerk befinden. Das heißt, sie sind jeder Zeit ohne Einwahlverbindung erreichbar. E-Mail an diese Rechner wird sofort und ohne Prüfung des Online-Status zugestellt.
 .
 Sie können Ausdrücke, die Platzhalter wie »*« und »?« enthalten, verwenden, z. B. »*.ihrnetz.lokal«.
 .
 Dieses Feld kann leer gelassen werden, falls dieser Rechner der einzige Rechner im Netzwerk ist. Falls Sie Masqmail nicht als Offline-MTA verwenden möchten und alle Server, die gewöhnlich ausgehende E-Mail von diesem Rechner empfangen, ständig erreichbar sind, verwenden Sie hier »*«.
";
$elem["masqmail/local_nets"]["descriptionfr"]="Réseaux considérés comme locaux :
 Veuillez indiquer la liste des hôtes, séparés par des points-virgules (;), qui sont sur le réseau local, c'est-à-dire ceux qui sont toujours joignables, sans connexion à la demande. Les courriels vers ces hôtes seront délivrés immédiatement, sans vérifier s'ils sont connectés.
 .
 Vous pouvez utiliser des caractères jokers comme « * » et « ? », ex. *.votrereseau.local.
 .
 Ce champ peut rester vide si cet hôte est le seul de ce réseau. Si vous ne souhaitez pas utiliser Masqmail comme agent de transfert de messages hors ligne et que tous les hôtes susceptibles de recevoir des courriels depuis cet hôte sont joignables en permanence, vous devriez simplement indiquer « * » ici.
";
$elem["masqmail/local_nets"]["default"]="";
$elem["masqmail/listen_addresses"]["type"]="string";
$elem["masqmail/listen_addresses"]["description"]="Interfaces for incoming connections:
 For security reasons, Masqmail does not listen an all network
 interfaces by default. If there are no other hosts connected to this
 host, \"localhost:25\" is enough for local operation. If there are other
 hosts that need to send SMTP mail to this host, you should add the
 address of the relevant network interface, for instance
 \"localhost:25;192.168.1.2:25\".
";
$elem["masqmail/listen_addresses"]["descriptionde"]="Schnittstellen für eingehende Verbindungen:
 Aus Sicherheitsgründen nimmt Masqmail eingehende Verbindungen in der Voreinstellung nicht an allen Netzwerkschnittstellen entgegen. Falls keine anderen Rechner mit diesem Rechner verbunden sind, reicht »localhost:25« für den lokalen Betrieb aus. Falls es andere Rechner gibt, die SMTP-Nachrichten an diesen Rechner senden, sollten Sie die Adresse der entsprechenden Netzwerkschnittstelle anfügen, z. B. »localhost:25;192.168.1.2:25«.
";
$elem["masqmail/listen_addresses"]["descriptionfr"]="Interfaces pour les connexions entrantes :
 Masqmail, pour des raisons de sécurité, n'écoute pas sur toutes les interfaces réseau par défaut. S'il n'y a pas d'autre machine connectée à cet hôte, laissez simplement la valeur par défaut, « localhost:25 ». Si d'autres machines ont besoin d'envoyer des courriels vers cet hôte, vous devriez ajouter l'adresse de l'interface réseau correspondante, par exemple « localhost:25;192.168.1.2:25 ».
";
$elem["masqmail/listen_addresses"]["default"]="localhost:25";
$elem["masqmail/use_syslog"]["type"]="boolean";
$elem["masqmail/use_syslog"]["description"]="Use the system log daemon for logging?
 Masqmail may log via the system log daemon (syslog) or use its
 own custom logging in /var/log/masqmail/masqmail.log.
";
$elem["masqmail/use_syslog"]["descriptionde"]="Den System-Log-Daemon zur Protokollierung verwenden?
 Masqmail kann über den System-Log-Daemon (syslog) protokollieren oder seine eigene Protokollierung in /var/log/masqmail/masqmail.log verwenden.
";
$elem["masqmail/use_syslog"]["descriptionfr"]="Faut-il utiliser syslogd pour la gestion des journaux ?
 Masqmail peut journaliser son activité via le démon de journalisation du système (syslog) ou utiliser sa propre journalisation dans le fichier /var/log/masqmail/masqmail.log.
";
$elem["masqmail/use_syslog"]["default"]="false";
$elem["masqmail/online_detect"]["type"]="select";
$elem["masqmail/online_detect"]["choices"][1]="file";
$elem["masqmail/online_detect"]["choicesde"][1]="Datei";
$elem["masqmail/online_detect"]["choicesfr"][1]="Fichier";
$elem["masqmail/online_detect"]["description"]="Online detection method:
 Masqmail has two methods to determine whether it is online or not:
 \"file\" and \"pipe\".
  - With \"file\", it checks for the existence of a file. If it
    exists, the name of the connection is read from that file.
  - With \"pipe\", it calls a program or script, which outputs the name
    if online or nothing if not. The \"guessnet\" program is a good
    candidate for such use.
";
$elem["masqmail/online_detect"]["descriptionde"]="Methode zur Online-Erkennung:
 Masqmail hat zwei Methoden, um zu bestimmen, ob es online ist oder nicht: »Datei« und »Pipe«.
  - Mit »Datei« prüft es die Existenz einer Datei. Falls sie existiert,
    wird der Name der Verbindung von dieser Datei gelesen.
  - Mit »Pipe« ruft es ein Programm oder Skript auf, welches den Namen
    ausgibt, falls online und anderenfalls nichts. Das Programm
    »guessnet« ist ein guter Kandidat für eine solche Verwendung.
";
$elem["masqmail/online_detect"]["descriptionfr"]="Méthode de détection du réseau :
 Masqmail dispose de deux méthodes pour déterminer l'état de la connexion : « file » et « pipe ».
  - Avec « file », il vérifie l'existence d'un fichier. S'il
    existe, le nom de la connexion est lue depuis ce fichier.
  - Avec « pipe », il appelle un programme ou un script, qui retourne le
    nom s'il existe et rien sinon. Le programme « guessnet » est un bon
    candidat pour une telle utilisation.
";
$elem["masqmail/online_detect"]["default"]="file";
$elem["masqmail/online_file"]["type"]="string";
$elem["masqmail/online_file"]["description"]="File used to determine the online status:
";
$elem["masqmail/online_file"]["descriptionde"]="Datei, die zur Ermittlung des Online-Status verwendet wird:
";
$elem["masqmail/online_file"]["descriptionfr"]="Fichier utilisé pour déterminer l'état de la connexion :
";
$elem["masqmail/online_file"]["default"]="/var/run/masqmail-route";
$elem["masqmail/online_pipe"]["type"]="string";
$elem["masqmail/online_pipe"]["description"]="Name of the program used to determine the online status:
 Please choose the program to use to determine the online
 status. This program is called with \"mail\" as user ID.
";
$elem["masqmail/online_pipe"]["descriptionde"]="Name des Programms, das zur Ermittlung des Online-Status verwendet wird:
 Bitte wählen Sie das Programm zur Ermittlung des Online-Status. Dieses Programm wird mit der Benutzerkennung »mail« aufgerufen.
";
$elem["masqmail/online_pipe"]["descriptionfr"]="Nom du programme utilisé pour déterminer l'état de la connexion :
 Veuillez choisir le programme utilisé pour déterminer l'état de la connexion. Ce programme sera appelé avec l'identifiant « mail ».
";
$elem["masqmail/online_pipe"]["default"]="Default:";
$elem["masqmail/mbox_default"]["type"]="select";
$elem["masqmail/mbox_default"]["choices"][1]="mbox";
$elem["masqmail/mbox_default"]["choices"][2]="mda";
$elem["masqmail/mbox_default"]["description"]="Local delivery style:
 Local mail can be delivered to a mailbox, to a mail delivery
 agent (MDA) such as procmail
 or to Maildir-style mailboxes in the users' home directories.
 .
 This choice affects the default delivery mechanism. It can be defined
 on a per-user basis with the \"mbox_users\", \"mda_users\" and
 \"maildir_users\" options.
";
$elem["masqmail/mbox_default"]["descriptionde"]="Lokale Auslieferungsmethode:
 Lokale E-Mail kann an ein Postfach, an einen Mail-Delivery-Agenten (MDA) wie Procmail oder an Maildir-artige Postfächer in den Home-Verzeichnissen der Benutzer zugestellt werden.
 .
 Diese Auswahl beeinflusst die standardmäßige Zustellmethode. Sie kann benutzerspezifisch mittels der Optionen »mbox_users«, »mda_users« und »maildir_users« festgelegt werden.
";
$elem["masqmail/mbox_default"]["descriptionfr"]="Type de boîte de courriel local :
 Les courriels locaux peuvent être délivrés dans une boîte aux lettres, à un agent de distribution de courriel (MDA) comme procmail ou à une boîte au format Maildir dans les dossiers utilisateurs.
 .
 Ce choix définit le type de boîte de courriel par défaut. Cette option est également configurable par les utilisateurs avec les options mbox_users, mda_users et maildir_users.
";
$elem["masqmail/mbox_default"]["default"]="mbox";
$elem["masqmail/mda"]["type"]="string";
$elem["masqmail/mda"]["description"]="MDA command line (including options):
 Please choose the path to the mail delivery agent (MDA), including
 its arguments. You can use variable substitution here,
 such as ${rcpt_local} for the user name.
 .
 Masqmail's manual page describes all available variable substitutions.
 .
 This question is meaningful even when choosing another option than
 MDA delivery, in case MDA is used for a restricted set of users.
";
$elem["masqmail/mda"]["descriptionde"]="MDA-Befehlszeile (einschließlich Optionen):
 Bitte wählen Sie den Pfad zum Mail-Delivery-Agent (MDA) einschließlich dessen Argumenten. Sie können hier Variablensubstitution verwenden, z. B. ${rcpt_local} für den Benutzernamen.
 .
 Die Handbuchseite von Masqmail beschreibt alle verfügbaren Variablen-Substitutionen.
 .
 Diese Frage ist selbst dann bedeutungsvoll, wenn eine andere Option als MDA-Zustellung gewählt wird. Dies ist für den Fall, dass MDA für eine begrenzte Gruppe von Benutzern verwendet wird.
";
$elem["masqmail/mda"]["descriptionfr"]="Ligne de commande de l'agent de distribution (MDA), avec les options :
 Veuillez indiquer le chemin d'accès à l'agent de distribution du courrier (MDA), avec ses paramètres. Vous pouvez utiliser des variables de substitution ici, ex. ${rcpt_local} pour l'identifiant.
 .
 La page de manuel de Masqmail décrit toutes les variables de substitution disponibles.
 .
 Cette question a du sens même lorsque qu'un autre type de distribution est choisi, au cas où certains utilisateurs modifient le mode de distribution utilisé.
";
$elem["masqmail/mda"]["default"]="/usr/bin/procmail -Y -d ${rcpt_local}";
$elem["masqmail/alias_local_caseless"]["type"]="boolean";
$elem["masqmail/alias_local_caseless"]["description"]="Should alias expansion be case sensitive?
 Masqmail uses the file /etc/aliases to redirect local addresses.
 The search for a match in /etc/aliases can be case sensitive or not.
";
$elem["masqmail/alias_local_caseless"]["descriptionde"]="Soll Alias-Expansion Groß-/Kleinschreibung beachten?
 Masqmail verwendet die Datei /etc/aliases um lokale Adressen umzuleiten. Die Suche nach einem Treffer in /etc/aliases kann die Groß-/Kleinschreibung beachten oder nicht.
";
$elem["masqmail/alias_local_caseless"]["descriptionfr"]="La recherche d'alias doit-elle être sensible à la casse ?
 Masqmail utilise le fichier /etc/aliases pour rediriger les adresses locales. La recherche dans /etc/aliases peut être, ou non, sensible à la casse.
";
$elem["masqmail/alias_local_caseless"]["default"]="false";
$elem["masqmail/init_smtp_daemon"]["type"]="boolean";
$elem["masqmail/init_smtp_daemon"]["description"]="Start SMTP listening daemon?
 Please choose whether you want Masqmail to start as an SMTP listening
 daemon. You will need this if:
  - there are other hosts in the local network that may want to send
    mail via this host;
  - you use a local mail client that sends mail via SMTP.
";
$elem["masqmail/init_smtp_daemon"]["descriptionde"]="Den SMTP-Daemon starten?
 Bitte wählen Sie, ob Masqmail als SMTP-Daemon gestartet werden soll.
 Sie benötigen dies, falls:
  - es andere Rechner im lokalen Netz gibt, die E-Mail über diesen
    Rechner versenden wollen;
  - Sie einen lokalen E-Mail-Client verwenden, der E-Mail über SMTP
    versendet.
";
$elem["masqmail/init_smtp_daemon"]["descriptionfr"]="Faut-il démarrer le démon SMTP ?
 Veuillez choisir si Masqmail doit se lancer comme un démon SMTP. Vous aurez besoin de cela si :
  - d'autres hôtes sur le réseau local ont besoin d'envoyer des
    courriels via cet hôte ;
  - vous utilisez un client de messagerie qui envoie le courriel via SMTP.
";
$elem["masqmail/init_smtp_daemon"]["default"]="true";
$elem["masqmail/init_queue_daemon"]["type"]="boolean";
$elem["masqmail/init_queue_daemon"]["description"]="Start SMTP queue running daemon?
 Please choose this option if you want Masqmail to start as a queue
 running daemon. You're very likely to need this. It is used for mail
 that cannot delivered immediately, either because of delivery
 failures or because the host is not online on the first attempt to send
 a mail.
";
$elem["masqmail/init_queue_daemon"]["descriptionde"]="SMTP-Warteschlangen-Daemon starten?
 Bitte wählen Sie diese Option, falls Sie möchten, dass Masqmail als Warteschlangen-Daemon gestartet wird. Sehr wahrscheinlich benötigen Sie diesen. Er wird für E-Mail verwendet, die nicht sofort zugestellt werden kann, entweder aufgrund von Zustellfehlern oder weil der Rechner beim ersten Versuch, eine E-Mail zu versenden, nicht online war.
";
$elem["masqmail/init_queue_daemon"]["descriptionfr"]="Faut-il utiliser une file d'attente pour le démon SMTP ?
 Veuillez choisir cette option, qui est conseillée, si vous souhaitez que Masqmail utilise une file d'attente pour le courriel. La file d'attente est utilisée lorsqu'un message ne peut être délivré immédiatement, soit à cause d'un problème à l'envoi, soit parce que le serveur n'est pas connecté lors de la tentative d'envoi.
";
$elem["masqmail/init_queue_daemon"]["default"]="true";
$elem["masqmail/queue_daemon_ival"]["type"]="string";
$elem["masqmail/queue_daemon_ival"]["description"]="Interval for the queue running daemon:
 Please choose the interval for the queue running daemon.
 .
 The format is \"-q\", followed by a numeric value and one of the letters
 s, m, h, d, or w, for seconds, minutes, hours, days, or weeks,
 respectively. For instance, \"-q10m\" defines a ten-minute interval
 between runs.
 .
 Reasonable values are between five minutes (-q5m) and two hours (-q2h).
";
$elem["masqmail/queue_daemon_ival"]["descriptionde"]="Intervall für den Warteschlangen-Daemon:
 Bitte wählen Sie ein Intervall für den Warteschlangen-Daemon.
 .
 Das Format ist »-q«, gefolgt von einer Zahl und einer der Buchstaben s, m, h, d oder w für Sekunden, Minuten, Stunden, Tage oder Wochen. Zum Beispiel definiert »-q10m« einen Interval von 10 Minuten zwischen Durchläufen.
 .
 Sinnvolle Werte liegen zwischen fünf Minuten (-q5m) und zwei Stunden (-q2h).
";
$elem["masqmail/queue_daemon_ival"]["descriptionfr"]="Intervalle pour le démon gérant la file d'attente :
 Veuillez choisir l'intervalle entre les exécutions du démon de gestion de la file d'attente.
 .
 Le format est « -q », suivi d'une valeur numérique et des lettres s,m,h,d,w pour respectivement secondes, minutes, heures, jours et semaines. Par exemple, « -q10m » définie un intervalle de dix minutes.
 .
 Une valeur raisonnable se situe entre 5 minutes (-q5m) et deux heures (-q2h).
";
$elem["masqmail/queue_daemon_ival"]["default"]="-q10m";
$elem["masqmail/init_fetch_daemon"]["type"]="boolean";
$elem["masqmail/init_fetch_daemon"]["description"]="Start POP3 fetch daemon?
 Please choose this option if you want Masqmail to start as a fetch
 daemon. If you do so, it will try to fetch mail from configured POP3
 servers, detecting the online
 status first.
 .
 No matter what you choose here, you can later select whether you want to fetch
 mail when the host becomes online.
";
$elem["masqmail/init_fetch_daemon"]["descriptionde"]="POP3-Abruf-Daemon starten?
 Bitte wählen Sie diese Option, falls Sie möchten, dass Masqmail als Abruf-Daemon gestartet wird. Falls Sie dies tun, wird es versuchen, E-Mail von konfigurierten POP3-Servern abzurufen, nachdem es den Online-Status geprüft hat.
 .
 Unabhängig davon, was Sie hier wählen, können Sie später entscheiden, ob Sie E-Mail abrufen wollen, wenn der Rechner online geht.
";
$elem["masqmail/init_fetch_daemon"]["descriptionfr"]="Faut-il démarrer le démon de récupération POP3 ?
 Veuillez choisir cette option si vous désirez que masqmail récupère les courriels sur un serveur POP3. Dans ce cas, il tentera de les récupérer à intervalles réguliers depuis les serveurs POP3 que vous aurez indiqués, après avoir vérifié la connexion.
 .
 Quel que soit votre choix, vous pourrez choisir plus tard de récupérer les courriels lors de la connexion de cet hôte.
";
$elem["masqmail/init_fetch_daemon"]["default"]="false";
$elem["masqmail/fetch_daemon_ival"]["type"]="string";
$elem["masqmail/fetch_daemon_ival"]["description"]="Interval for the fetch daemon:
 Please choose the interval for the fetch daemon.
 .
 The format is \"-go\", followed by a numeric value and one of the letters
 s, m, h, d, or w, for seconds, minutes, hours, days, or weeks,
 respectively.
 .
 Reasonable values are between two minutes (-go2m) and two hours (-go2h).
";
$elem["masqmail/fetch_daemon_ival"]["descriptionde"]="Intervall für den Abruf-Daemon:
 Bitte wählen Sie ein Intervall für den Abruf-Daemon.
 .
 Das Format ist »-go«, gefolgt von einer Zahl und einer der Buchstaben s, m, h, d oder w für Sekunden, Minuten, Stunden, Tage oder Wochen.
 .
 Sinnvolle Werte liegen zwischen zwei Minuten (-go2m) und zwei Stunden (-go2h).
";
$elem["masqmail/fetch_daemon_ival"]["descriptionfr"]="Intervalle de récupération des messages :
 Veuillez choisir l'intervalle de récupération des messages pour le démon.
 .
 Le format est « -go », suivi par une valeur numérique et d'une lettre s, m, h, d, w pour respectivement secondes, minutes, heures, jours et semaines.
 .
 Une valeur raisonnable se situe entre deux minutes (-go2m) et deux heures (-go2h).
";
$elem["masqmail/fetch_daemon_ival"]["default"]="-go5m";
$elem["masqmail/ipup_runqueue"]["type"]="boolean";
$elem["masqmail/ipup_runqueue"]["description"]="Flush mail queue when online?
 Please choose whether you want Masqmail to immediately flush its mail
 queue as soon as the host comes online. This will be done by Masqmail's
 ip-up script
 in /etc/ppp/ip-up or in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_runqueue"]["descriptionde"]="E-Mail-Warteschlange leeren, wenn online?
 Bitte wählen Sie, ob Sie möchten, dass Masqmail sofort seine E-Mail-Warteschlange leert, sobald der Rechner online geht. Dies geschieht im Skript ip-up von Masqmail in /etc/ppp/ip-up oder in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_runqueue"]["descriptionfr"]="Masqmail doit-il vider sa file d'attente à la connexion ?
 Veuillez choisir si vous voulez que Masqmail vide sa file d'attente de courriels dès que cet hôte sera en ligne. Cela pourra être activé plus tard dans le script /etc/ppp/ip-up ou dans /etc/network/if-up.d/.
";
$elem["masqmail/ipup_runqueue"]["default"]="true";
$elem["masqmail/ipup_fetch"]["type"]="boolean";
$elem["masqmail/ipup_fetch"]["description"]="Fetch mail when online?
 Please choose whether you want Masqmail to immediately fetch mail
 from POP3 servers as soon as the host comes online. This will be done
 by Masqmail's ip-up script in /etc/ppp/ip-up or in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_fetch"]["descriptionde"]="E-Mail abrufen, wenn online?
 Bitte wählen Sie, ob Sie möchten, dass Masqmail sofort E-Mail von POP3-Servern abruft, sobald der Rechner online geht. Dies geschieht im Skript ip-up von Masqmail in /etc/ppp/ip-up oder in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_fetch"]["descriptionfr"]="Masqmail doit-il récupérer les courriels à la connexion ?
 Veuillez choisir si vous voulez que Masqmail récupère les courriels depuis les serveurs POP3 que vous avez choisis dès que cet hôte est connecté. Cela pourra être activé plus tard dans le script /etc/ppp/ip-up ou dans /etc/network/if-up.d/.
";
$elem["masqmail/ipup_fetch"]["default"]="false";
$elem["masqmail/ifup_ifaces"]["type"]="string";
$elem["masqmail/ifup_ifaces"]["description"]="List of interfaces used for Masqmail online detection:
 Please choose a list of network interfaces which will trigger queue
 runs and/or fetching mails when going up. The list will be used in
 the /etc/ppp/ip-up and /etc/network/if-up.d/ scripts, when the
 interface goes up.
 .
 A reasonable choice is for instance \"ppp0\" for a home computer connected
 by PPP or \"ppp0 eth0\" for
 a notebook.
 .
 Other possible choices are \"all\" to listen on all network interfaces, or
 \"none\" for not listening on any interface.
";
$elem["masqmail/ifup_ifaces"]["descriptionde"]="Liste der Schnittstellen, die Masqmail für die Online-Erkennung verwenden soll:
 Bitte geben Sie eine Liste von Netzwerkschnittstellen ein, die Warteschlangenläufe und/oder das Abrufen von E-Mail auslösen sollen, wenn sie aktiviert werden. Diese Liste wird von den Skripten in /etc/ppp/ip-up und /etc/network/if-up.d/ verwendet, wenn die Schnittstelle aktiviert wird.
 .
 Eine sinnvolle Wahl ist z. B. »ppp0« für einen Heimrechner mit Verbindung über PPP oder »ppp0 eth0« für ein Notebook.
 .
 Andere Möglichkeiten sind »all« für alle Netzwerkschnittstellen oder »none«, um keine Schnittstelle zu berücksichtigen.
";
$elem["masqmail/ifup_ifaces"]["descriptionfr"]="Liste des interfaces réseau utilisées par Masqmail pour détecter la connexion :
 Veuillez choisir une liste d'interfaces réseaux pour lesquelles l'envoi de la file d'attente et/ou la récupération des courriels se produiront à la connexion. Ces interfaces seront utilisées par les scripts /etc/ppp/ip-up et /etc/network/if-up.d/ quand elles seront mises en service.
 .
 Un choix raisonnable est par ex. « ppp0 » pour un poste fixe connecté en PPP, ou « ppp0 eth0 » pour un portable.
 .
 Les autres choix possibles sont « all » pour écouter sur toutes les interfaces, ou « none » pour n'en écouter aucune.
";
$elem["masqmail/ifup_ifaces"]["default"]="all";
PKG_OptionPageTail2($elem);
?>
