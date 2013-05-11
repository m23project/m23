<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("qpsmtpd");

$elem["qpsmtpd/startup_enabled"]["type"]="boolean";
$elem["qpsmtpd/startup_enabled"]["description"]="Enable qpsmtpd startup at boot time?
 Because most MTAs in Debian listen on one or all network interfaces by
 default, when first installed qpsmtpd cannot normally be started.
 .
 Before enabling qpsmtpd, you must first configure your local MTA not to
 bind to the SMTP TCP port on at least one interface.  The most common
 approach is to leave your MTA listening on the loopback interface
 (127.0.0.1), with qpsmtpd listening on the external interface. 
 Instructions for configuring common MTAs to work with qpsmtpd can be found
 after installation in /usr/share/doc/qpsmtpd/README.Debian.
 .
 Once you have adjusted your MTA configuration, you can enable qpsmtpd by
 restarting this configuration, by running 'dpkg-reconfigure qpsmtpd'.
";
$elem["qpsmtpd/startup_enabled"]["descriptionde"]="Qpsmtpd beim Booten auch starten?
 Da standardmäßig die meisten MTAs in Debian auf einer oder allen Netzschnittstellen auf Anfragen warten, kann Qpsmtpd nach der Erstinstallation normalerweise nicht starten.
 .
 Bevor Sie Qpsmtpd aktivieren, müssen Sie zuerst Ihren lokalen MTA so konfigurieren, dass er sich zumindestens auf einer Schnittstelle nicht an den SMTP TCP-Port bindet. Der häufigste Ansatz ist, Ihren MTA an der loopback-Schnittstelle (127.0.0.1) auf Anfragen warten zu lassen, während Qpsmtpd auf der externen Schnittstelle wartet. Anleitungen, wie verbreitete MTAs so konfiguriert werden, dass sie mit Qpsmtpd zusammen arbeiten, können nach der Installation in /usr/share/doc/qpsmtpd/README.Debian gefunden werden.
 .
 Sobald Sie Ihre MTA-Konfiguration angepasst haben, können Sie Qpsmtpd aktivieren, indem Sie diese Konfiguration durch Aufruf von »dpkg-reconfigure qpsmtpd« erneut starten.
";
$elem["qpsmtpd/startup_enabled"]["descriptionfr"]="Faut-il activer qpsmtpd au démarrage ?
 La plupart des agents de transport de courrier (MTA) de Debian écoutent une ou toutes les interfaces réseau par défaut. En conséquence, qpsmtpd ne peut être démarré normalement lors de l'installation initiale.
 .
 Avant d'activer qpsmtpd, vous devez d'abord configurer votre agent de transport local afin qu'il ne se lie pas au port TCP de SMTP sur au moins une interface. La démarche la plus courante est de le laisser à l'écoute sur l'interface de bouclage (127.0.0.1), avec qpsmtpd à l'écoute sur l'interface externe. Des instructions sur la manière de configurer les agents de transport courants en parallèle avec qpsmtpd peuvent être trouvées, après l'installation, dans /usr/share/doc/qpsmtpd/README.Debian.
 .
 Une fois la configuration de votre agent de transport de courrier mise au point, vous pouvez activer qpsmtpd en relançant cette configuration avec la commande « dpkg-reconfigure qpsmtpd ».
";
$elem["qpsmtpd/startup_enabled"]["default"]="false";
$elem["qpsmtpd/listen_interfaces"]["type"]="string";
$elem["qpsmtpd/listen_interfaces"]["description"]="Addresses on which to listen for incoming SMTP connections:
 Enter one or more of your local IP addresses, separated by spaces, on
 which qpsmtpd should listen for incoming SMTP connections.  If you leave
 this setting empty, qpsmtpd will listen on all interfaces available at
 startup time.
 .
 If you intend to use qpsmtpd to spool deliveries from remote hosts into a
 local MTA, you may wish to have qpsmtpd listen on all external interfaces,
 while leaving your local MTA listening on the loopback device (127.0.0.1).
";
$elem["qpsmtpd/listen_interfaces"]["descriptionde"]="Adressen, auf denen auf eingehende SMTP-Verbindungen gewartet werden soll:
 Geben Sie durch Leerzeichen getrennt eine oder mehrere Ihrer lokalen IP-Adressen an, auf denen Qpsmtpd auf eingehende SMTP-Verbindungen warten soll. Falls Sie diese Einstellung leer lassen, wird Qpsmtpd auf allen Schnittstellen warten, die zum Startzeitpunkt verfügbar sind.
 .
 Falls Sie planen, Qpsmtpd zum Zwischenlagern (»spoolen«) von Auslieferungen entfernter Rechner an einen lokale MTA zu verwenden, könnte es in Ihrem Sinne sein, Qpsmtpd auf allen externen Schnittstellen warten zu lassen, während Ihr lokaler MTA auf dem loopback-Gerät (127.0.0.1) wartet.
";
$elem["qpsmtpd/listen_interfaces"]["descriptionfr"]="Adresses où qpsmtpd sera à l'écoute des connexions SMTP entrantes :
 Veuillez entrer une ou plusieurs adresses IP locales, séparées par des espaces, pour lesquelles qpsmtpd sera à l'écoute pour les connexions SMTP entrantes. Si vous laissez cette option vide, qpsmtpd écoutera toutes les interfaces disponibles lors du démarrage.
 .
 Si vous souhaitez utiliser qpsmtpd pour mettre en attente la distribution pour des hôtes distants dans votre agent de transport local, vous devriez laisser qpsmtpd écouter toutes les interfaces externes et laisser votre agent de transport local écouter l'interface de bouclage (127.0.0.1).
";
$elem["qpsmtpd/listen_interfaces"]["default"]="unset";
$elem["qpsmtpd/queue_plugin"]["type"]="select";
$elem["qpsmtpd/queue_plugin"]["choices"][1]="exim";
$elem["qpsmtpd/queue_plugin"]["choices"][2]="postfix";
$elem["qpsmtpd/queue_plugin"]["choices"][3]="qmail";
$elem["qpsmtpd/queue_plugin"]["choices"][4]="proxy";
$elem["qpsmtpd/queue_plugin"]["choices"][5]="maildir";
$elem["qpsmtpd/queue_plugin"]["description"]="Queueing method for accepted mail:
 Select the method for queueing mail once it's been delivered via SMTP.  If
 you deliver your mail locally, choose the method corresponding to the
 installed MTA (the installer will try to pick the correct default.)
 .
 Select \"proxy\" if you'd like qpsmtpd to act as an SMTP proxy for another
 MTA (local or remote).  You will then be prompted to enter a destination
 host.
 .
 Select \"maildir\" to have qpsmtpd deliver into a local maildir-format spool
 instead of queueing it for delivery (e.g. if you're setting up a
 spamtrap.)
 .
 If you select \"none,\" no queueing will be done at all, unless you manually
 configure it yourself by editing /etc/qpsmtpd/plugins.
";
$elem["qpsmtpd/queue_plugin"]["descriptionde"]="Warteschlangenmethode für akzeptierte E-Mail:
 Wählen Sie die Methode aus, die zum Einreihen von E-Mail in die Warteschlangen verwendet werden soll, sobald diese per SMTP angeliefert wurden. Falls Sie Ihre E-Mail lokal zustellen, wählen Sie die Methode, die zu Ihrem installierten MTA gehört (das Installationsprogramm wird versuchen, den korrekten Standardwert auszuwählen).
 .
 Wählen Sie »proxy«, falls Sie möchten, dass Qpsmtpd als Proxy für einen anderen MTA (lokal oder entfernt) agiert. Sie werden aufgefordert, einen Zielrechner auszuwählen.
 .
 Wählen Sie »maildir«, damit Qpsmtpd in ein lokales Zwischenlager im Maildir-Format ausliefert, anstatt in eine Warteschlange einzustellen (z.B. falls Sie eine Spamfalle aufsetzen).
 .
 Falls Sie »none« auswählen, erfolgt kein Einstellen in Warteschlangen, falls Sie es nicht manuell durch Änderung der Datei /etc/qpsmtpd/plugins einstellen.
";
$elem["qpsmtpd/queue_plugin"]["descriptionfr"]="Méthode de mise en attente pour le courrier accepté :
 Veuillez choisir la méthode de mise en attente du courrier une fois qu'il a été distribué via SMTP. Si vous distribuez votre courrier localement, choisissez la méthode correspondant à l'agent de transport installé (l'installateur essaiera de choisir la méthode adaptée).
 .
 Veuillez choisir « proxy » si vous désirez que qpsmtpd agisse comme un serveur mandataire SMTP pour un autre agent de transport (local ou distant). L'hôte de destination vous sera alors demandé.
 .
 Veuillez choisir « maildir » pour que qpsmtpd place le courrier dans une file d'attente locale au format maildir, plutôt que de le mettre en attente (p. ex. si vous installez un piège à pourriel).
 .
 Si vous choisissez « none », aucune mise en attente ne sera faite, à moins que vous ne la configuriez vous-même en modifiant /etc/qpsmtpd/plugins.
";
$elem["qpsmtpd/queue_plugin"]["default"]="";
$elem["qpsmtpd/queue_smtp_proxy_destination"]["type"]="string";
$elem["qpsmtpd/queue_smtp_proxy_destination"]["description"]="Destination host/port for SMTP proxy delivery:
 To have qpsmtpd act as an SMTP proxy for another host, supply the hostname
 or IP address of that host here.  You can optionally add a port number
 after a colon, such as \"localhost:25\".
";
$elem["qpsmtpd/queue_smtp_proxy_destination"]["descriptionde"]="Ziel-Rechner/Port für Proxy-Zustellung:
 Damit Qpsmtpd als ein SMTP-Proxy für einen anderen Rechner agiert, geben Sie den Rechnernamen oder die IP-Adresse dieses Rechners hier an. Sie können optional eine Portnummer nach einem Doppelpunkt hinzufügen, wie in »localhost:25«.
";
$elem["qpsmtpd/queue_smtp_proxy_destination"]["descriptionfr"]="Hôte/port de destination pour la distribution du proxy SMTP :
 Afin que qpsmtp agisse comme un serveur mandataire SMTP pour un autre hôte, entrez le nom d'hôte ou l'adresse IP de cet hôte. Vous pouvez aussi indiquer un numéro de port après un double-point, par exemple « localhost:25 ».
";
$elem["qpsmtpd/queue_smtp_proxy_destination"]["default"]="localhost";
$elem["qpsmtpd/queue_maildir_destination"]["type"]="string";
$elem["qpsmtpd/queue_maildir_destination"]["description"]="Destination Maildir for maildir-type delivery:
 To have qpsmtpd deliver received mail into a local maildir-format spool,
 enter a location for that maildir.  A maildir will be created in that
 location if it does not exist already.
";
$elem["qpsmtpd/queue_maildir_destination"]["descriptionde"]="Ziel-Maildir für Maildir-artige Zustellung:
 Damit Qpsmtpd empfangene E-Mails in ein lokales Zwischenlager im Maildir-Format ausliefert, wählen Sie einen Ort für dieses Maildir aus. Ein Maildir wird an dieser Stelle erstellt, falls es noch nicht existiert.
";
$elem["qpsmtpd/queue_maildir_destination"]["descriptionfr"]="Répertoire Maildir pour une distribution de type maildir :
 Afin que qpsmtpd distribue le courrier reçu dans un spool local au format maildir, veuillez choisir un répertoire de destination. Il sera créé s'il n'existe pas déjà.
";
$elem["qpsmtpd/queue_maildir_destination"]["default"]="/var/spool/qpsmtpd/Maildir";
$elem["qpsmtpd/queue_none_confirm"]["type"]="boolean";
$elem["qpsmtpd/queue_none_confirm"]["description"]="Proceed without a queueing plugin selected?
 By selecting \"none\" as a queueing plugin, you have disabled local queueing
 of inbound mail.  This will prevent any mail being spooled by qpsmtpd
 until you manually configure a queueing method.  Any hosts attempting to
 deliver mail to you will receive 4xx soft-failure messages until then, at
 the potential cost of wasted bandwidth and eventual bouncing of possibly
 legitimate mail.
 .
 To configure queueing manually, edit /etc/qpsmtpd/plugins and select one
 of the queueing methods listed there.  If you didn't see your installed
 MTA in the list and aren't sure what to do, pick \"Cancel\" here and
 select the SMTP proxy method instead, configuring it to proxy into your
 MTA on a suitable local address/port.
";
$elem["qpsmtpd/queue_none_confirm"]["descriptionde"]="Fortfahren ohne Auswahl einer Warteschlangen-Erweiterung?
 Indem Sie »none« für die Warteschlangen-Erweiterung ausgewählt haben, haben Sie das lokale Einstellen in eine Warteschlange für eingehende E-Mail deaktiviert. Damit wird keine E-Mail von Qpsmtpd zwischengelagert, bis Sie manuell eine Warteschlangenmethode konfigurieren. Jeder Rechner, der versucht, E-Mails an Sie zuzustellen, wird bis dahin 4xx-Fehler erhalten. Damit wird möglicherweise Bandbreite verschwendet und schließlich wird möglicherweise legitime E-Mail zurückgewiesen.
 .
 Um die Warteschlange manuell zu konfigurieren, bearbeiten Sie /etc/qpsmtpd/plugins und wählen Sie eine der dort aufgeführten Warteschlangenmethoden aus. Falls Sie Ihren installierten MTA nicht in der Liste gesehen haben und sich nicht sicher sind, was Sie tun sollen, wählen Sie hier »Abbruch« und wählen Sie stattdessen die SMTP-Proxy-Methode. Konfigurieren Sie Qpsmtpd dann so, dass es Proxy für Ihren lokalen MTA auf einer geeigneten lokalen Adresse/Port-Kombination ist.
";
$elem["qpsmtpd/queue_none_confirm"]["descriptionfr"]="Faut-il continuer sans un greffon de mise en attente ?
 Vous avez choisi « none » comme greffon de mise en attente (« queuing »), ce qui désactive la mise en attente du courrier arrivé. Cela empêchera le courrier d'être mis en attente par qpsmtpd jusqu'à ce que vous configuriez vous-même une méthode de mise en attente. Tout hôte qui tentera de vous distribuer du courrier recevra un message d'erreur 4xx tant que ce ne sera pas fait, ce qui gaspille de la bande passante et risque un rejet des courriers légitimes.
 .
 Pour configurer la mise en attente vous-même, veuillez modifier /etc/qpsmtpd/plugins et choisir une des méthodes possibles. Si votre agent de transport n'y est pas présent et que vous ne savez pas quoi choisir, ne continuez pas ici et choisissez la méthode du serveur mandataire SMTP en le configurant pour qu'il mandate votre agent de transport sur une adresse et un port local adéquat.
";
$elem["qpsmtpd/queue_none_confirm"]["default"]="";
$elem["qpsmtpd/rcpthosts"]["type"]="string";
$elem["qpsmtpd/rcpthosts"]["description"]="Destination domain(s) to accept mail for (blank for none):
 Enter a list of domain name(s) for which qpsmtpd should accept mail,
 separated by spaces.  This list should include any hostname or domain name
 for which you intend to accept delivery locally, as well as any recipient
 domains for which you intend to act as a mail relay.  In general, if you
 intend to spool received mail into a local MTA, this list should be the
 same as used for that MTA (the installer will attempt to extract that
 setting as a default.)
 .
 If you prefer to manage this list manually, leave the entry blank and edit
 the file /etc/qpsmtpd/rcpthosts.
";
$elem["qpsmtpd/rcpthosts"]["descriptionde"]="Ziel-Domäne(n), für die E-Mail akzeptiert wird (leer für keine):
 Geben Sie eine durch Leerzeichen getrennte Liste von Domänen-Namen an, für die Qpsmtpd E-Mail akzeptieren soll. Diese Liste sollte alle Rechner- oder Domänennamen beinhalten, für die Sie lokale Zustellung akzeptieren wollen, sowie alle Empfänger-Domänen, für die Sie als E-Mail-Weiterleitung (»Relay«) auftreten wollen. Falls Sie vor haben, empfangene E-Mail für einen lokalen MTA zwischenzulagern, sollte diese Liste im Allgemeinen identisch zu der bei diesem MTA verwendeten Liste sein (das Installationsprogramm versucht, diese Einstellung als Voreinstellung zu extrahieren).
 .
 Falls Sie diese Liste lieber manuell verwalten möchten, lassen Sie den Eintrag leer und bearbeiten Sie die Datei /etc/qpsmtpd/rcpthosts.
";
$elem["qpsmtpd/rcpthosts"]["descriptionfr"]="Veuillez choisir un ou plusieurs domaines de destination qui acceptant le courrier. Laissez vide pour aucun.
 Veuillez entrer une liste de noms de domaines pour lesquels qpsmtpd acceptera le courrier, séparé par des espaces. Cette liste devrait inclure tout nom d'hôte ou nom de domaine pour lesquels vous avez l'intention d'accepter la distribution de courrier local, ainsi que tous les domaines récipiendaires pour lesquels vous allez agir comme un relais de courrier. En général, si vous avez l'intention de mettre en attente le courrier reçu dans un agent de transport local, cette liste devrait être la même que celle utilisée pour cet agent de transport (l'installateur essaiera d'extraire par défaut ce réglage).
 .
 Si vous préférez gérer cette liste vous-même, laissez-la vide et modifiez le fichier /etc/qpsmtpd/rcpthosts.
";
$elem["qpsmtpd/rcpthosts"]["default"]="unset";
PKG_OptionPageTail2($elem);
?>
