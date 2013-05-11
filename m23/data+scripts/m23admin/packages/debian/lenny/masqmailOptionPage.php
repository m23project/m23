<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("masqmail");

$elem["masqmail/manage_config_with_debconf"]["type"]="boolean";
$elem["masqmail/manage_config_with_debconf"]["description"]="Manage masqmail.conf using debconf?
 The /etc/masqmail/masqmail.conf file can be handled automatically
 by debconf, or manually by you.
 .
 Note that only specific, marked sections of the configuration file will be
 handled by debconf if you select this option; if those markers are absent,
 you will have to update the file manually, or move or delete the file.
";
$elem["masqmail/manage_config_with_debconf"]["descriptionde"]="masqmail.conf mittels Debconf verwalten?
 Die Datei /etc/masqmail/masqmail.conf kann automatisch von Debconf oder manuell von Ihnen verwaltet werden.
 .
 Beachten Sie, dass nur spezifische, markierte Abschnitte der Konfigurationsdatei von Debconf verwaltet werden wird, wenn Sie diese Möglichkeit wählen. Wenn diese Markierungen fehlen, müssen Sie die Datei manuell aktualisieren, oder sie verschieben oder löschen.
";
$elem["masqmail/manage_config_with_debconf"]["descriptionfr"]="Faut-il gérer masqmail.conf automatiquement ?
 Le fichier /etc/masqmail/masqmail.conf peut être modifié automatiquement ou par vous-même.
 .
 Veuillez noter que seules les sections spécifiquement marquées du fichier de configuration pourront être modifiées automatiquement si vous choisissez cette option ; si ces marqueurs sont absents, vous devrez mettre à jour le fichier vous-même, le déplacer ou le supprimer.
";
$elem["masqmail/manage_config_with_debconf"]["default"]="true";
$elem["masqmail/move_existing_nondebconf_config"]["type"]="boolean";
$elem["masqmail/move_existing_nondebconf_config"]["description"]="Replace existing /etc/masqmail/masqmail.conf file?
 The existing /etc/masqmail/masqmail.conf file currently on the system does
 not contain a marked section for debconf to write its data.
 .
 If you select this option, the existing configuration
 file will be backed up to /etc/masqmail/masqmail.conf.debconf-backup and a
 new file written to /etc/masqmail/masqmail.conf.  If you do not select this
 option, the existing configuration file will not be managed by debconf,
 and no further questions about masqmail configuration will be
 asked.
";
$elem["masqmail/move_existing_nondebconf_config"]["descriptionde"]="Die existierende Datei /etc/masqmail/masqmail.conf ersetzen?
 Die Datei /etc/masqmail/masqmail.conf, die sich gegenwärtig auf dem System befindet, enthält keinen für Debconf markierten Abschnitt, um seine Daten hineinzuschreiben.
 .
 Falls Sie diese Möglichkeit wählen, wird die existierende Konfigurationsdatei als /etc/masqmail/masqmail.conf.debconf-backup gesichert und eine neue Datei nach /etc/masqmail/masqmail.conf geschrieben. Anderenfalls wird die existierende Konfigurationsdatei nicht von Debconf verwaltet, und keine weiteren Fragen zur Masqmail-Konfiguration werden gestellt.
";
$elem["masqmail/move_existing_nondebconf_config"]["descriptionfr"]="Faut-il remplacer le fichier /etc/masqmail/masqmail.conf actuel ?
 Le fichier /etc/masqmail/masqmail.conf actuellement présent sur le système ne contient pas de section marquée pour la configuration automatique.
 .
 Si vous choisissez cette option, le fichier existant sera sauvegardé dans /etc/masqmail/masqmail.conf.debconf-backup et un nouveau fichier sera écrit dans /etc/masqmail/masqmail.conf. Dans le cas contraire, le fichier de configuration ne sera pas géré automatiquement et aucune autre question à propos de la configuration de masqmail ne vous sera posée.
";
$elem["masqmail/move_existing_nondebconf_config"]["default"]="false";
$elem["masqmail/host_name"]["type"]="string";
$elem["masqmail/host_name"]["description"]="Masqmail host name:
 Please enter the name used by masqmail to identify itself to others.
 This is most likely your hostname. It is used in its SMTP greeting
 banner, for expanding unqualified addresses, the Message ID and so on.
";
$elem["masqmail/host_name"]["descriptionde"]="Name des Masqmail-Rechners:
 Bitte geben Sie den Namen ein, den Masqmail verwendet, um sich bei anderen zu identifizieren. Dies ist sehr wahrscheinlich Ihr Hostname. Er wird im SMTP-Begrüßungs-Banner, zur Vervollständigung unqualifizierter Adressen, für Message-IDs und so weiter verwendet.
";
$elem["masqmail/host_name"]["descriptionfr"]="Nom de domaine pour masqmail :
 Veuillez entrer le nom utilisé par masqmail pour s'identifier. Il s'agit probablement de votre nom de domaine. Il sera utilisé dans les en-têtes SMTP, les adresses non complètement qualifiées, l'identifiant du message, etc.
";
$elem["masqmail/host_name"]["default"]="Default:";
$elem["masqmail/local_hosts"]["type"]="string";
$elem["masqmail/local_hosts"]["description"]="Hosts considered local:
 Please enter a list of hosts, separated with semicolons (;), which are
 considered 'local', ie. mail to these hosts will be delivered to a
 mailbox (or Maildir or MDA) on this host.
 .
 You will most likely insert 'localhost', your hostname in its fully
 qualified form and just the simple hostname here.
 .
 You can also use wildcard expressions like '*' and '?'.
";
$elem["masqmail/local_hosts"]["descriptionde"]="Rechner, die als lokal angesehen werden:
 Bitte geben Sie eine Liste von Rechnern durch Semikolons (;) getrennt ein, die als »lokal« angesehen werden, d. h. E-Mail an diese Rechner wird an ein Postfach (oder Maildir oder MDA) auf diesem Rechner geliefert.
 .
 Wahrscheinlich sollten Sie »localhost«, Ihren Hostnamen in dessen vollständig qualifizierter Form und den einfachen Hostnamen hier eingeben.
 .
 Sie können auch Platzhalter wie »*« und »?« verwenden.
";
$elem["masqmail/local_hosts"]["descriptionfr"]="Hôtes considérés comme locaux :
 Veuillez indiquer la liste des hôtes, séparés par des points-virgules (;), qui seront considérés comme « locaux », c'est à dire que les mails pour ces hôtes seront délivrés à une mailbox (ou Maildir ou MDA) sur cette machine.
 .
 Vous devriez probablement inclure « localhost », votre nom de domaine complètement qualifié, et votre simple nom de domaine.
 .
 Vous pouvez également utiliser des caractères jokers comme « * » et « ? ».
";
$elem["masqmail/local_hosts"]["default"]="";
$elem["masqmail/local_nets"]["type"]="string";
$elem["masqmail/local_nets"]["description"]="Nets considered local:
 Please enter a list of hosts, separated with semicolons (;), which are
 on your local network, ie. they are always reachable, without a
 dialup connection. Mail to these hosts will be delivered immediately,
 without checking for the online status.
 .
 You can use wildcards expressions like '*' and '?', eg. *.yournet.local
 .
 If you have only one box, you can leave this empty. If you do not want
 to use masqmail as an offline MTA, and the whole internet or another mail
 server which accepts outgoing mail is at all times
 reachable to you, just insert '*'.
";
$elem["masqmail/local_nets"]["descriptionde"]="Netzwerke, die als lokal angesehen werden:
 Bitte geben Sie eine Liste von Rechnern durch Semikolons (;) getrennt ein, die sich in Ihrem lokalen Netzwerk befinden, d. h. sie sind jeder Zeit ohne Einwahlverbindung erreichbar. E-Mail an diese Rechner wird sofort und ohne Prüfung des Online-Status zugestellt.
 .
 Sie können Platzhalter wie »*« und »?« verwenden, z. B. *.yournet.local
 .
 Falls Sie nur einen Rechner besitzen, können Sie dieses Feld leer lassen. Falls Sie Masqmail nicht als Offline-MTA verwenden wollen, und das gesamte Internet oder ein anderer Mail-Server, der ausgehende Post akzeptiert, ist ständig erreichbar, geben Sie nur »*« ein.
";
$elem["masqmail/local_nets"]["descriptionfr"]="Réseaux considérés comme locaux :
 Veuillez indiquer la liste des hôtes, séparés par des points-virgules (;), qui sont sur votre réseau local, c'est-à-dire ceux qui sont toujours joignables, sans connexion à la demande. Les courriels vers ces hôtes seront délivrés immédiatement, sans vérifier s'ils sont connectés.
 .
 Vous pouvez utiliser des caractères jokers comme « * » et « ? », ex. *.votre_réseau.local.
 .
 Si vous utilisez une seule boîte aux lettres, vous pouvez laisser ce champ vide. Si vous ne désirez pas utiliser masqmail comme un agent de transfert de courriel (« MTA ») local, et que vous avez accès à internet ou qu'un autre serveur mail qui accepte d'envoyer vos messages au dehors est toujours joignable, écrivez simplement « * ».
";
$elem["masqmail/local_nets"]["default"]="";
$elem["masqmail/listen_addresses"]["type"]="string";
$elem["masqmail/listen_addresses"]["description"]="Interfaces for incoming connections:
 Masqmail, for security reasons, does not listen an all network
 interfaces by default. If there are no other hosts connected to your
 host, just leave the default 'localhost:25' value. If there are other
 hosts that may want to send SMTP messages to this host, add the
 address of your network interface here, eg.:
 localhost:25;192.168.1.2:25.
 .
 Of course you can also replace the '25' with another port number, however
 this is unusual.
";
$elem["masqmail/listen_addresses"]["descriptionde"]="Schnittstellen für ankommende Verbindungen:
 Aus Sicherheitsgründen nimmt Masqmail eingehende Verbindungen in der Voreinstellung nicht an allen Netzwerkschnittstellen entgegen. Falls keine anderen Rechner mit Ihrem Rechner verbunden sind, lassen Sie den voreingestellten Wert »localhost:25« stehen. Falls es andere Rechner gibt, die SMTP-Nachrichten an diesen Rechner senden könnten, fügen Sie die Adresse der Netzwerkschnittstelle an, z. B. »localhost:25;192.168.1.2:25«.
 .
 Natürlich können Sie die »25« durch eine andere Port-Nummer ersetzen. Dies ist jedoch unüblich.
";
$elem["masqmail/listen_addresses"]["descriptionfr"]="Interfaces pour les connexions entrantes :
 Masqmail, pour des raisons de sécurité, n'écoute pas sur toutes les interfaces réseau par défaut. S'il n'y a pas d'autre machine connectée à votre hôte, laissez simplement la valeur par défaut, « localhost:25 ». Si d'autres machines ont besoin des courriels vers cet hôte, ajoutez l'adresse de votre interface réseau ici, ex. localhost:25;192.168.1.2:25.
 .
 Vous pouvez remplacer le port 25 par n'importe quel port réseau disponible.
";
$elem["masqmail/listen_addresses"]["default"]="localhost:25";
$elem["masqmail/use_syslog"]["type"]="boolean";
$elem["masqmail/use_syslog"]["description"]="Use syslogd for logs?
 You can decide whether masqmail should log via syslog or not. If not,
 logs will be written to /var/log/masqmail/masqmail.log.
";
$elem["masqmail/use_syslog"]["descriptionde"]="Syslogd für die Protokollierung verwenden?
 Sie können entscheiden, ob Masqmail mittels Syslog protokollieren soll oder nicht. Falls nicht, wird das Protokoll nach /var/log/masqmail/masqmail.log geschrieben.
";
$elem["masqmail/use_syslog"]["descriptionfr"]="Faut-il utiliser syslogd pour la gestion des journaux ?
 Vous pouvez décider si masqmail doit utiliser ou non syslog pour la gestion des journaux. Dans le cas contraire, ceux-ci seront conservés dans /var/log/masqmail/masqmail.log.
";
$elem["masqmail/use_syslog"]["default"]="false";
$elem["masqmail/online_detect"]["type"]="select";
$elem["masqmail/online_detect"]["choices"][1]="file";
$elem["masqmail/online_detect"]["choicesde"][1]="Datei";
$elem["masqmail/online_detect"]["choicesfr"][1]="Fichier";
$elem["masqmail/online_detect"]["description"]="Online detection method:
 Masqmail has different methods to determine whether it is online or not,
 these are 'file','pipe'.
 .
 For 'file', masqmail checks for the existence of a file, and, if it
 exists, reads from it the name of the connection.
 .
 For 'pipe', masqmail calls a program or script, which outputs the name
 if online or nothing if not. You can use eg. the program guessnet for this.
";
$elem["masqmail/online_detect"]["descriptionde"]="Methode für Online-Erkennung:
 Masqmail kennt verschiedene Methoden, um festzustellen, ob es online ist oder nicht. Diese sind »Datei« und »Pipe«.
 .
 Bei »Datei« prüft Masqmail die Existenz einer Datei. Falls diese existiert, liest es daraus den Namen der Verbindung.
 .
 Bei »Pipe« ruft Masqmail ein Programm oder Skript auf, welches den Namen ausgibt falls online oder nichts im gegenteiligen Fall. Sie können z. B. das Programm guessnet dafür verwenden.
";
$elem["masqmail/online_detect"]["descriptionfr"]="Méthode de détection du réseau :
 Masqmail dispose de plusieurs moyens pour déterminer si une machine est connectée au réseau ou pas : fichier (« file ») et programme (« pipe »).
 .
 Avec « Fichier », masqmail vérifie l'existence du fichier, et s'il existe, il y lit le nom de la connexion.
 .
 Avec « Programme », masqmail appelle un programme ou un script, qui renvoie le nom de la connexion si la machine est connectée et ne renvoie rien dans le cas contraire. Par exemple, vous pouvez utiliser guessnet pour le faire.
";
$elem["masqmail/online_detect"]["default"]="file";
$elem["masqmail/online_file"]["type"]="string";
$elem["masqmail/online_file"]["description"]="File used to determine the online status:
";
$elem["masqmail/online_file"]["descriptionde"]="Datei, die verwendet wird, den Online-Status zu ermitteln:
";
$elem["masqmail/online_file"]["descriptionfr"]="Fichier utilisé pour déterminer l'état de la connexion :
";
$elem["masqmail/online_file"]["default"]="/var/run/masqmail-route";
$elem["masqmail/online_pipe"]["type"]="string";
$elem["masqmail/online_pipe"]["description"]="Name of the program used to determine the online status:
 Please choose the program to use to determine the online
 status. Please note that, when this program is called, masqmail has
 the user id 'mail'.
";
$elem["masqmail/online_pipe"]["descriptionde"]="Name des Programms, das verwendet wird, den Online-Status zu ermitteln:
 Bitte wählen Sie das Programm, das verwendet wird, den Online-Status zu ermitteln. Bitte beachten Sie, dass, wenn dieses Programm aufgerufen wird, Masqmail die Benutzerkennung »mail« hat.
";
$elem["masqmail/online_pipe"]["descriptionfr"]="Nom du programme utilisé pour déterminer l'état de la connexion :
 Veuillez choisir le programme utilisé pour déterminer l'état de la connexion. Veuillez noter que le programme sera appelé avec l'identifiant « mail ».
";
$elem["masqmail/online_pipe"]["default"]="Default:";
$elem["masqmail/mbox_default"]["type"]="select";
$elem["masqmail/mbox_default"]["choices"][1]="mbox";
$elem["masqmail/mbox_default"]["choices"][2]="mda";
$elem["masqmail/mbox_default"]["description"]="Local delivery style:
 Local mail can be delivered to a mailbox, to an MDA (eg. procmail)
 or to a qmail style Maildir in the users home dir.
 .
 You can select the default style here. You can configure this also
 on a per-user basis with the options mbox_users, mda_users and
 maildir_users.
";
$elem["masqmail/mbox_default"]["descriptionde"]="Lokale Auslieferungsmethode:
 Lokale E-Mail kann in ein Postfach, zu einem MDA (z. B. procmail) oder in ein qmail-artiges Maildir im Heimatverzeichnis des Benutzers zugestellt werden.
 .
 Sie können die voreingestellte Methode hier auswählen. Sie können dies auch benutzerspezifisch mittels der Parameter mbox_users, mda_users und maildir_users einstellen.
";
$elem["masqmail/mbox_default"]["descriptionfr"]="Type de boîte mail locale :
 Les courriels locaux peuvent être délivrés dans une boîte aux lettres, à un agent de distribution de courriel (« MDA », p.ex. procmail) ou à une boîte au format Maildir dans les dossiers utilisateurs.
 .
 Veuillez choisir le type de boîte aux lettres par défaut. Cette option est également configurable par les utilisateurs avec les options mbox_users, mda_users et maildir_users.
";
$elem["masqmail/mbox_default"]["default"]="mbox";
$elem["masqmail/mda"]["type"]="string";
$elem["masqmail/mda"]["description"]="MDA command line (including options):
 Please choose the path to the mail delivery agent (MDA), including
 its arguments. You can use substitution values here,
 eg. ${rcpt_local} for the user name.
 .
 For other substitutions please see the man page.
 .
 This question is also asked if you did not set mbox_default to mda,
 since you can use mda for a set of users specially.
";
$elem["masqmail/mda"]["descriptionde"]="MDA-Kommando (einschließlich Aufrufparametern):
 Bitte wählen Sie den Pfad zum Mail Delivery Agent (MDA) einschließlich dessen Argumenten. Sie können hier Substitutionswerte verwenden, z. B. ${rcpt_local} für den Benutzernamen.
 .
 Für andere Substitutionen lesen Sie bitte die Handbuchseite.
 .
 Diese Frage wird auch gestellt, falls Sie nicht mbox_default auf mda gesetzt haben, da Sie mda für eine Gruppe von Benutzern gesondert verwenden können.
";
$elem["masqmail/mda"]["descriptionfr"]="Ligne de commande du « MDA » (avec les options) :
 Veuillez indiquer le chemin d'accès à l'agent de distribution du courrier, avec ses paramètres. Vous pouvez utiliser des variables de substitution ici, ex. ${rcpt_local} pour l'identifiant.
 .
 Pour d'autres variables de substitution, veuillez consulter la page de manuel.
 .
 Cette question est également posée si vous n'avez pas choisi la valeur « mda » par défaut pour le paramètre « mbox_default ». En effet, il reste toujours possible de choisir l'option « mda » pour quelques utilisateurs en particulier.
";
$elem["masqmail/mda"]["default"]="/usr/bin/procmail -Y -d ${rcpt_local}";
$elem["masqmail/alias_local_caseless"]["type"]="boolean";
$elem["masqmail/alias_local_caseless"]["description"]="Alias expansion regarding case or not:
 Masqmail uses the file /etc/aliases to redirect local addresses.
 The search for a match in /etc/aliases can be regarding upper/lower
 case or insensitive to case.
";
$elem["masqmail/alias_local_caseless"]["descriptionde"]="Alias-Expansion beachtet Groß-/Kleinschreibung oder nicht:
 Masqmail verwendet die Datei /etc/aliases um lokale Adressen umzuleiten. Die Suche nach einem Treffer in /etc/aliases kann die Groß-/Kleinschreibung beachten oder ignorieren.
";
$elem["masqmail/alias_local_caseless"]["descriptionfr"]="La recherche d'alias doit-elle être sensible à la casse ?
 Masqmail utilise le fichier /etc/aliases pour rediriger les adresses locales. La recherche dans /etc/aliases peut être, ou non, sensible à la casse.
";
$elem["masqmail/alias_local_caseless"]["default"]="false";
$elem["masqmail/init_smtp_daemon"]["type"]="boolean";
$elem["masqmail/init_smtp_daemon"]["description"]="Start SMTP listening daemon?
 Please choose whether you want masqmail to start as an SMTP listening
 daemon. You will need this if:
  - there are other hosts in your local network that may want to send
    mail via this host
  - you use a mail client that sends mail via SMTP (netscape,
    mozilla are examples)
";
$elem["masqmail/init_smtp_daemon"]["descriptionde"]="Den SMTP-Daemon starten?
 Bitte wählen Sie, ob Masqmail als SMTP-Daemon gestartet werden
 soll. Sie benötigen dies, falls:
  - es andere Rechner in Ihrem lokalen Netz gibt, die E-Mail über
    diesen Rechner versenden wollen
  - Sie einen E-Mail-Client verwenden, der E-Mail über SMTP
    versendet (Netscape und Mozilla sind Beispiele)
";
$elem["masqmail/init_smtp_daemon"]["descriptionfr"]="Faut-il démarrer le démon SMTP ?
 Veuillez choisir si masqmail doit se lancer comme un démon SMTP. Vous aurez besoin de cela si :
  - d'autres hôtes sur votre réseau ont besoin d'envoyer des courriels
    via cet hôte ;
  - vous utilisez un client de messagerie qui envoie le courriel via SMTP
    (netscape ou mozilla, par exemple).
";
$elem["masqmail/init_smtp_daemon"]["default"]="true";
$elem["masqmail/init_queue_daemon"]["type"]="boolean";
$elem["masqmail/init_queue_daemon"]["description"]="Start SMTP queue running daemon?
 Please choose this option if you want masqmail to start as a queue
 running daemon. You're very likely to need this. It is used for mail
 that cannot delivered immediately, either because of delivery
 failures or because you were not online on the first attempt to send
 a mail.
";
$elem["masqmail/init_queue_daemon"]["descriptionde"]="SMTP-Warteschlangen-Daemon starten?
 Bitte wählen Sie diese Möglichkeit, falls Sie möchten, dass Masqmail als Warteschlangen-Daemon gestartet wird. Wahrscheinlich benötigen Sie dies. Er wird für E-Mail verwendet, die nicht sofort zugestellt werden kann, entweder wegen Zustellfehlern oder weil Sie beim ersten Versuch, die E-Mail zu versenden, nicht online waren.
";
$elem["masqmail/init_queue_daemon"]["descriptionfr"]="Faut-il utiliser une file d'attente pour le démon SMTP ?
 Veuillez choisir cette option, qui est conseillée, si vous souhaitez que masqmail utilise une file d'attente pour le courriel. La file d'attente est utilisée lorsqu'un message ne peut être délivré immédiatement, soit à cause d'un problème à l'envoi, soit parce que le serveur n'est pas connecté lors de la tentative d'envoi.
";
$elem["masqmail/init_queue_daemon"]["default"]="true";
$elem["masqmail/queue_daemon_ival"]["type"]="string";
$elem["masqmail/queue_daemon_ival"]["description"]="Interval for the queue running daemon:
 Please choose the interval for the queue running daemon. -q10m means
 flush the queue every 10 minutes.
 .
 The format is -q, followed by an numeric value and one of the letters s,m,h,d,w for
 seconds, minutes, hours, days or weeks respectively.
 .
 Reasonable values are between 5 minutes (-q5m) and 2 hours (-q2h).
";
$elem["masqmail/queue_daemon_ival"]["descriptionde"]="Intervall für den Warteschlangen-Daemon:
 Bitte wählen Sie das Intervall für den Warteschlangen-Daemon. »-q10m« bedeutet, die Warteschlange alle 10 Minuten zu leeren.
 .
 Das Format ist »-q«, gefolgt von einer Zahl und einer der Buchstaben s, m, h, d oder w für Sekunden, Minuten, Stunden, Tage oder Wochen.
 .
 Sinnvolle Werte sind zwischen 5 Minuten (-q5m) und 2 Stunden (-q2h).
";
$elem["masqmail/queue_daemon_ival"]["descriptionfr"]="Intervalle pour le démon gérant la file d'attente :
 Veuillez choisir l'intervalle de queue pour le démon. -q10m signifie que le démon enverra le contenu de la queue toutes les 10 minutes.
 .
 Le format est -q, suivi d'une valeur numérique et des lettres s,m,h,d,w pour respectivement secondes, minutes, heures, jours et semaines.
 .
 Une valeur raisonnable se situe entre 5 minutes (-q5m) et deux heures (-q2h).
";
$elem["masqmail/queue_daemon_ival"]["default"]="-q10m";
$elem["masqmail/init_fetch_daemon"]["type"]="boolean";
$elem["masqmail/init_fetch_daemon"]["description"]="Start POP3 fetch daemon?
 Please choose this option if you want masqmail to start as a fetch
 daemon. If you do so, masqmail will try to fetch mail from POP3
 servers that you configure in regular intervals, detecting the online
 status first.
 .
 No matter what you choose here, you can later select whether you want to fetch
 mail the moment you get online.
";
$elem["masqmail/init_fetch_daemon"]["descriptionde"]="POP3-Abruf-Daemon starten?
 Bitte wählen Sie diese Möglichkeit, wenn Sie möchten, dass Masqmail als Abruf-Daemon gestartet wird. Falls Sie dies tun, wird Masqmail versuchen, E-Mail von POP3-Servern, die Sie konfiguriert haben, in regelmäßigen Abständen abzurufen, nachdem es den Online-Status geprüft hat.
 .
 Unabhängig davon, was Sie hier wählen, können Sie später, wenn Sie online gehen, entscheiden, ob Sie E-Mail abrufen wollen.
";
$elem["masqmail/init_fetch_daemon"]["descriptionfr"]="Faut-il démarrer le démon de récupération POP3 ?
 Veuillez choisir cette option si vous désirez que masqmail récupère vos mails sur un serveur POP3. Dans ce cas, il tentera de récupérer vos courriels à intervalles réguliers depuis les serveurs POP3 que vous aurez indiqués, après avoir vérifié la connexion.
 .
 Quel que soit votre choix, vous pourrez choisir plus tard de récupérer vos courriels quand vous vous connectez.
";
$elem["masqmail/init_fetch_daemon"]["default"]="false";
$elem["masqmail/fetch_daemon_ival"]["type"]="string";
$elem["masqmail/fetch_daemon_ival"]["description"]="Interval for the fetch daemon:
 Please choose the interval for the fetch daemon.
 .
 The format is -go, followed by an numeric value and one of the letters s,m,h,d,w for
 seconds, minutes, hours, days or weeks respectively.
 .
 Reasonable values are between 2 minutes (-go2m) and 2 hours (-go2h).
";
$elem["masqmail/fetch_daemon_ival"]["descriptionde"]="Intervall für den Abruf-Daemon:
 Bitte wählen Sie ein Intervall für den Abruf-Daemon.
 .
 Das Format ist »-go«, gefolgt von einer Zahl und einer der Buchstaben s, m, h, d oder w für Sekunden, Minuten, Stunden, Tage oder Wochen.
 .
 Sinnvolle Werte sind zwischen 2 Minuten (-go2m) und 2 Stunden (-go2h).
";
$elem["masqmail/fetch_daemon_ival"]["descriptionfr"]="Intervalle de récupération des messages :
 Veuillez choisir l'intervalle de récupération des messages pour le démon.
 .
 Le format est -go, suivi par une valeur numérique et d'une lettre s,m,h,d,w pour respectivement secondes, minutes, heures, jours et semaines.
 .
 Une valeur raisonnable se situe entre deux minutes (-go2m) et deux heures (-go2h).
";
$elem["masqmail/fetch_daemon_ival"]["default"]="-go5m";
$elem["masqmail/ipup_runqueue"]["type"]="boolean";
$elem["masqmail/ipup_runqueue"]["description"]="Flush mail queue when you get online?
 Please choose whether you want masqmail to immediately flush its mail
 queue as soon as you go online. This will be done in the ip-up script
 in /etc/ppp/ip-up or in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_runqueue"]["descriptionde"]="Die E-Mail-Warteschlange leeren, wenn Sie online gehen?
 Bitte wählen Sie, ob Sie möchten, dass Masqmail sofort seine E-Mail-Warteschlange leert, sobald Sie online gehen. Dies geschieht im Skript ip-up in /etc/ppp/ip-up oder in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_runqueue"]["descriptionfr"]="Masqmail doit-il vider sa file d'attente à la connexion ?
 Veuillez choisir si vous voulez que masqmail vide sa file d'attente de courriels dès que vous vous connectez. Cela pourra être activé plus tard dans le script /etc/ppp/ip-up ou dans /etc/network/if-up.d/.
";
$elem["masqmail/ipup_runqueue"]["default"]="true";
$elem["masqmail/ipup_fetch"]["type"]="boolean";
$elem["masqmail/ipup_fetch"]["description"]="Fetch mail when you get online?
 Please choose whether you want masqmail to immediately fetch mail
 from POP3 servers as soon as you go online. This will be done in the
 ip-up script in /etc/ppp/ip-up or in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_fetch"]["descriptionde"]="E-Mail abrufen, wenn Sie online gehen?
 Bitte wählen Sie, ob Sie möchten, dass Masqmail sofort E-Mail von POP3-Servern abruft, sobald Sie online gehen. Dies geschieht im Skript ip-up in /etc/ppp/ip-up oder in /etc/network/if-up.d/.
";
$elem["masqmail/ipup_fetch"]["descriptionfr"]="Masqmail doit-il récupérer les mails quand vous vous connectez ?
 Veuillez choisir si vous voulez que masqmail récupère vos courriels depuis les serveurs POP3 que vous avez choisis, dès que vous vous connectez. Cela pourra être activé plus tard dans le script /etc/ppp/ip-up ou dans /etc/network/if-up.d/.
";
$elem["masqmail/ipup_fetch"]["default"]="false";
$elem["masqmail/ifup_ifaces"]["type"]="string";
$elem["masqmail/ifup_ifaces"]["description"]="List of interfaces used for masqmail online detection:
 Please choose a list of network interfaces which will trigger queue
 runs and/or fetching mails when going up. The list will be used in
 the /etc/ppp/ip-up and /etc/network/if-up.d/ scripts, when the
 interface goes up.
 .
 A reasonable choice is eg. 'ppp0' for a desktop at home, or 'ppp0 eth0' for
 a notebook.
 .
 Set to 'all' for all interfaces, or 'none' for no interfaces.
";
$elem["masqmail/ifup_ifaces"]["descriptionde"]="Liste der Schnittstellen, die Masqmail für die Online-Erkennung verwenden soll:
 Bitte geben Sie eine Liste von Netzwerkschnittstellen ein, die Warteschlangenläufe und/oder das Abrufen von E-Mail auslösen sollen, wenn sie aktiviert werden. Diese Liste wird den Skripten in /etc/ppp/ip-up und /etc/network/if-up.d/ verwendet, wenn die Schnittstelle aktiviert wird.
 .
 Eine sinnvolle Wahl ist z. B. »ppp0« für einen Arbeitsplatzrechner zu Hause oder »ppp0 eth0« für ein Notebook.
 .
 Geben Sie »all« für alle Schnittstellen ein und »none« für keine Schnittstellen.
";
$elem["masqmail/ifup_ifaces"]["descriptionfr"]="Liste des interfaces réseau utilisées pour détecter la connexion :
 Veuillez choisir une liste d'interfaces réseaux pour lesquelles l'envoi de la file d'attente et/ou la récupération des courriels se produiront à la connexion. Ces interfaces pourront utiliser les scripts /etc/ppp/ip-up et /etc/network/if-up.d/ quand elles seront mises en service.
 .
 Un choix raisonnable est par ex. « ppp0 » pour un poste fixe, ou « ppp0 eth0 » pour un portable.
 .
 Vous pouvez indiquer « all » pour utiliser toutes les interfaces, ou « none » pour n'en utiliser aucune.
";
$elem["masqmail/ifup_ifaces"]["default"]="all";
PKG_OptionPageTail2($elem);
?>
