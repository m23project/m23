<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ddclient");

$elem["ddclient/service"]["type"]="select";
$elem["ddclient/service"]["choices"][1]="www.dyndns.com";
$elem["ddclient/service"]["choices"][2]="www.easydns.com";
$elem["ddclient/service"]["choices"][3]="www.dslreports.com";
$elem["ddclient/service"]["choices"][4]="www.zoneedit.com";
$elem["ddclient/service"]["choicesde"][1]="www.dyndns.com";
$elem["ddclient/service"]["choicesde"][2]="www.easydns.com";
$elem["ddclient/service"]["choicesde"][3]="www.dslreports.com";
$elem["ddclient/service"]["choicesde"][4]="www.zoneedit.com";
$elem["ddclient/service"]["choicesfr"][1]="www.dyndns.com";
$elem["ddclient/service"]["choicesfr"][2]="www.easydns.com";
$elem["ddclient/service"]["choicesfr"][3]="www.dslreports.com";
$elem["ddclient/service"]["choicesfr"][4]="www.zoneedit.com";
$elem["ddclient/service"]["description"]="Dynamic DNS service provider:
 Please select the dynamic DNS service you are using. If the service you use is
 not listed, choose \"other\" and you will be asked for the protocol and the
 server name.
";
$elem["ddclient/service"]["descriptionde"]="Anbieter des dynamischen DNS-Dienstes:
 Bitte wählen Sie nun den Betreiber des dynamischen DNS-Dienstes, den Sie benutzen möchten. Falls Ihr Betreiber hier nicht aufgeführt ist, wählen Sie bitte »anderer« und Sie werden nach dem Protokoll und Servernamen gefragt.
";
$elem["ddclient/service"]["descriptionfr"]="Fournisseur de service DNS dynamique :
 Veuillez choisir le service de DNS dynamique que vous utilisez. Si celui-ci n'est pas affiché ici, veuillez choisir « Autre ». Le nom du serveur et le protocole utilisé vous seront alors demandés.
";
$elem["ddclient/service"]["default"]="www.dyndns.com";
$elem["ddclient/server"]["type"]="string";
$elem["ddclient/server"]["description"]="Dynamic DNS server:
 Please enter the name of the server which is providing you with dynamic DNS
 service (example: members.dyndns.org).
";
$elem["ddclient/server"]["descriptionde"]="Dynamischer DNS-Server:
 Bitte geben Sie den Namen des Servers an, der Ihnen dynamische DNS-Dienste bereitstellt (Beispiel: members.dyndns.org).
";
$elem["ddclient/server"]["descriptionfr"]="Serveur de DNS dynamique :
 Veuillez indiquer le nom du serveur qui fournit le DNS dynamique (p. ex. : members.dyndns.org).
";
$elem["ddclient/server"]["default"]="";
$elem["ddclient/protocol"]["type"]="select";
$elem["ddclient/protocol"]["choices"][1]="dyndns2";
$elem["ddclient/protocol"]["choices"][2]="dslreports1";
$elem["ddclient/protocol"]["choices"][3]="easydns";
$elem["ddclient/protocol"]["choices"][4]="hammernode1";
$elem["ddclient/protocol"]["choices"][5]="zoneedit1";
$elem["ddclient/protocol"]["description"]="Dynamic DNS update protocol:
 Please select the dynamic DNS update protocol used by your dynamic DNS service
 provider.
";
$elem["ddclient/protocol"]["descriptionde"]="Protokoll für die dynamische DNS-Aktualisierung:
 Bitte wählen Sie das Protokoll für die dynamische DNS-Aktualisierung aus, das von Ihrem Anbieter des dynamischen DNS-Dienstes verwandt wird.
";
$elem["ddclient/protocol"]["descriptionfr"]="Protocole de mise à jour du DNS dynamique :
 Veuillez choisir le protocole de mise à jour du DNS dynamique utilisé par le fournisseur du service.
";
$elem["ddclient/protocol"]["default"]="dyndns2";
$elem["ddclient/names"]["type"]="string";
$elem["ddclient/names"]["description"]="DynDNS fully qualified domain names:
 Please enter the list of fully qualified domain names for the local host(s)
 (for instance, \"myname.dyndns.org\" with only one host or
 \"myname1.dyndns.org,myname2.dyndns.org\" for two hosts).
";
$elem["ddclient/names"]["descriptionde"]="Vollständige (engl. fully qualified) DynDNS-Domainnamen:
 Bitte geben Sie die Liste der vollständigen Domainnamen für den/die lokalen Rechner ein (z.B.: »meinname.dyndns.org« bei nur einem Rechner oder für zwei Rechner »meinname1.dyndns.org,meinname2.dyndns.org«).
";
$elem["ddclient/names"]["descriptionfr"]="Noms de domaine de DNS dynamique (complètement qualifiés) :
 Veuillez indiquer la liste des noms de domaine complètement qualifiés des machines locales (p. ex. « myname.dyndns.org » pour un nom unique ou « myname1.dyndns.org,myname2.dyndns.org » pour deux noms).
";
$elem["ddclient/names"]["default"]="";
$elem["ddclient/username"]["type"]="string";
$elem["ddclient/username"]["description"]="Username for dynamic DNS service:
 Please enter the username to use with the dynamic DNS service.
";
$elem["ddclient/username"]["descriptionde"]="Benutzername für den dynamischen DNS-Dienst:
 Bitte geben Sie den Benutzernamen an, der mit dem dynamischen DNS-Dienst verwandt werden soll.
";
$elem["ddclient/username"]["descriptionfr"]="Identifiant pour le service de DNS dynamique :
 Veuillez indiquer l'identifiant qui sera utilisé pour la connexion au serveur de DNS dynamique.
";
$elem["ddclient/username"]["default"]="";
$elem["ddclient/password"]["type"]="password";
$elem["ddclient/password"]["description"]="Password for dynamic DNS service:
 Please enter the password to use with the dynamic DNS service.
";
$elem["ddclient/password"]["descriptionde"]="Passwort für den dynamischen DNS-Dienst:
 Bitte geben Sie das Passwort ein, das mit dem dynamischen DNS-Dienst verwandt werden soll.
";
$elem["ddclient/password"]["descriptionfr"]="Mot de passe pour le service de DNS dynamique :
 Veuillez indiquer le mot de passe qui sera utilisé pour la connexion au serveur de DNS dynamique.
";
$elem["ddclient/password"]["default"]="";
$elem["ddclient/checkip"]["type"]="boolean";
$elem["ddclient/checkip"]["description"]="Find public IP using checkip.dyndns.com?
 Please choose whether ddclient should try to find the IP address
 of this machine via the DynDNS web interface.  This is recommended
 for machines that are using Network Address Translation.
";
$elem["ddclient/checkip"]["descriptionde"]="Öffentliche IP mittels checkip.dyndns.com ermitteln?
 Bitte wählen Sie aus, ob der Ddclient versuchen soll, die IP-Adresse dieser Maschine mittels der DynDNS-Webschnittstelle zu ermitteln. Dies wird für Maschinen empfohlen, die »Network Address Translation« verwenden.
";
$elem["ddclient/checkip"]["descriptionfr"]="Faut-il rechercher l'adresse IP publique avec checkip.dyndns.com ?
 Veuillez choisir si ddclient doit rechercher l'adresse IP publique de cette machine avec l'interface web de DynDNS. Ce choix est conseillé pour les machines qui utilisent la traduction d'adresse réseau (NAT : Network Address Translation).
";
$elem["ddclient/checkip"]["default"]="true";
$elem["ddclient/interface"]["type"]="string";
$elem["ddclient/interface"]["description"]="Network interface used for dynamic DNS service:
 Please enter the name of the network interface (eth0/wlan0/ppp0/...)
 to use for dynamic DNS service.
";
$elem["ddclient/interface"]["descriptionde"]="Netzwerk-Schnittstelle für den dynamischen DNS-Dienst:
 Bitte geben Sie den Namen der Netzwerk-Schnittstelle (eth0/wlan0/ppp0/...) an, die für den dynamischen DNS-Dienst benutzt werden soll.
";
$elem["ddclient/interface"]["descriptionfr"]="Interface réseau utilisée par le service de DNS dynamique :
 Veuillez indiquer l'interface réseau utilisée par le service de DNS dynamique (p. ex. eth0/wlan0/ppp0/...).
";
$elem["ddclient/interface"]["default"]="";
$elem["ddclient/run_ipup"]["type"]="boolean";
$elem["ddclient/run_ipup"]["description"]="Run ddclient on PPP connect?
 You should enable this option if ddclient should be run every time a PPP connection is
 established.
 Note: This mode is not compatible with daemon mode.
";
$elem["ddclient/run_ipup"]["descriptionde"]="Ddclient nach Aufbau der PPP-Verbindung ausführen?
 Sie sollten diese Option aktivieren, falls ddclient nach jedem Aufbau einer PPP-Verbindung ausgeführt werden soll. Hinweis: Dieser Modus ist nicht kompatibel mit dem Betrieb als Daemon.
";
$elem["ddclient/run_ipup"]["descriptionfr"]="Faut-il lancer ddclient lors des connexions PPP ?
 Veuillez choisir cette option si vous souhaitez lancer ddclient à chaque fois qu'une connexion PPP est établie. Veuillez noter que ce choix est incompatible avec un fonctionnement en démon.
";
$elem["ddclient/run_ipup"]["default"]="false";
$elem["ddclient/run_daemon"]["type"]="boolean";
$elem["ddclient/run_daemon"]["description"]="Run ddclient as daemon?
 Please choose whether you want ddclient to be run in daemon mode on system
 startup.
";
$elem["ddclient/run_daemon"]["descriptionde"]="Ddclient als Daemon starten?
 Bitte wählen Sie aus, ob der ddclient nach dem Start Ihres Systems als Daemon laufen soll.
";
$elem["ddclient/run_daemon"]["descriptionfr"]="Faut-il lancer ddclient en tant que démon ?
 Veuillez choisir si vous voulez lancer ddclient comme un démon au moment du démarrage du système.
";
$elem["ddclient/run_daemon"]["default"]="false";
$elem["ddclient/daemon_interval"]["type"]="string";
$elem["ddclient/daemon_interval"]["description"]="Interval between ddclient runs:
 Please choose the delay between interface address checks.
 Values may be given in seconds (e.g. \"5s\"), in minutes (e.g. \"3m\"), in
 hours (e.g. \"7h\") or in days (e.g. \"1d\").
";
$elem["ddclient/daemon_interval"]["descriptionde"]="Intervall zwischen Läufen von Ddclient:
 Bitte wählen Sie die Wartezeit zwischen Schnittstellen-Adressüberprüfungen aus. Werte können in Sekunden (z.B.: »5s«), Minuten (z.B.: »3m«), Stunden (z.B.: »7h«) oder Tagen (z.B.: »1d«) angegeben werden.
";
$elem["ddclient/daemon_interval"]["descriptionfr"]="Intervalle entre les exécutions de ddclient :
 Veuillez choisir le délai entre les vérifications par ddclient de l'adresse de l'interface. Les valeurs peuvent être indiquées en secondes (p. ex. « 5s »), en minutes (p. ex. « 3m »), en heures (p. ex. « 7h ») ou en jours (p. ex. « 1d »). Utilisateurs francophones, attention à l'abréviation utilisée pour les jours.
";
$elem["ddclient/daemon_interval"]["default"]="300";
$elem["ddclient/modifiedconfig"]["type"]="error";
$elem["ddclient/modifiedconfig"]["description"]="Modified configuration file
 The config file /etc/ddclient.conf on your system does not consist of
 three entries. The automatic configuration utility cannot handle
 this situation.
 .
 If you have edited the configuration file manually, it won't be modified.
 If you need a new configuration file, run \"dpkg-reconfigure ddclient\".
";
$elem["ddclient/modifiedconfig"]["descriptionde"]="Konfigurationsdatei verändert
 Die Konfigurationsdatei /etc/ddclient.conf auf Ihrem System besteht nicht aus drei Einträgen. Das automatische Konfigurationsprogramm kann damit leider nicht umgehen.
 .
 Falls Sie diese Datei manuell bearbeitet haben, wird sie nicht verändert. Falls Sie eine neue Konfigurationsdatei benötigen, führen Sie »dpkg-reconfigure ddclient« aus.
";
$elem["ddclient/modifiedconfig"]["descriptionfr"]="Le fichier de configuration a été modifié
 Le fichier de configuration, /etc/ddclient.conf, de ce système ne comporte pas trois entrées. Cette interface d'automatisation de configuration ne peut gérer cela.
 .
 Vous avez peut-être modifié le fichier de configuration vous-même : en conséquence, il ne sera pas changé. Si vous souhaitez créer un nouveau fichier de configuration, veuillez utiliser la commande « dpkg-reconfigure ddclient ».
";
$elem["ddclient/modifiedconfig"]["default"]="";
$elem["ddclient/fetchhosts"]["type"]="select";
$elem["ddclient/fetchhosts"]["choices"][1]="From list";
$elem["ddclient/fetchhosts"]["choicesde"][1]="aus Liste";
$elem["ddclient/fetchhosts"]["choicesfr"][1]="Dans une liste";
$elem["ddclient/fetchhosts"]["description"]="Selection method for updated names:
 You'll have to select which host names to update using ddclient.  You can
 select host names to update from a list (taken from your DynDNS account)
 or enter them manually.
";
$elem["ddclient/fetchhosts"]["descriptionde"]="Auswahlmethode für aktualisierte Namen:
 Sie müssen auswählen, welche Rechnernamen mit Ddclient aktualisiert werden sollen. Sie können Rechnernamen aus einer Liste (aus Ihrem DynDNS-Konto entnommen) auswählen oder diese manuell eingeben.
";
$elem["ddclient/fetchhosts"]["descriptionfr"]="Méthode de choix des noms à mettre à jour :
 Vous devez choisir les noms d'hôtes à tenir à jour par ddclient. Vous pouvez les choisir dans une liste (gérée avec votre compte DynDNS) ou les indiquer manuellement.
";
$elem["ddclient/fetchhosts"]["default"]="From list";
$elem["ddclient/hostslist"]["type"]="multiselect";
$elem["ddclient/hostslist"]["description"]="Host names to keep updated:
 The list of host names managed via your DynDNS account has been downloaded.
 Please choose the one(s) for which ddclient should be used to keep IP address
 records up to date.
";
$elem["ddclient/hostslist"]["descriptionde"]="Aktuell zu haltende Rechnernamen:
 Die Liste der mittels DynDNS verwalteten Rechnernamen wurde heruntergeladen. Bitte wählen Sie den/die Einträge aus, für die Ddclient die IP-Adressdatensätze aktuell halten soll.
";
$elem["ddclient/hostslist"]["descriptionfr"]="Noms d'hôte à tenir à jour :
 La liste des noms d'hôtes gérés par votre compte DynDNS a été récupérée. Veuillez choisir celui ou ceux que ddclient doit tenir à jour avec les adresses de cet hôte.
";
$elem["ddclient/hostslist"]["default"]="";
$elem["ddclient/blankhostslist"]["type"]="error";
$elem["ddclient/blankhostslist"]["description"]="Empty host list
 The list of host names managed under your account is empty when retrieved
 from the dynamic DNS service website.
 .
 You may have provided an incorrect username or password, or the online account
 may have no host names configured.
 .
 Please check your account to be sure you have host names configured, then run
 \"dpkg-reconfigure ddclient\" to input your username and password again.
";
$elem["ddclient/blankhostslist"]["descriptionde"]="Leere Rechnerliste
 Die Liste der mit Ihrem Konto verwalteten Rechnernamen ist leer, wenn sie von der Website des dynamischen DNS-Dienstes heruntergeladen wird.
 .
 Es könnte sein, dass Sie keinen korrekten Benutzernamen oder kein korrektes Passwort angegeben haben oder im Online-Konto keine Rechnernamen konfiguriert worden sind.
 .
 Bitte überprüfen Sie Ihr Konto, um sicherzustellen, dass Sie Rechnernamen konfiguriert haben. Führen Sie danach »dpkg-reconfigure ddclient« aus, um erneut Ihren Benutzernamen und Ihr Passwort einzugeben.
";
$elem["ddclient/blankhostslist"]["descriptionfr"]="Liste d'hôtes vide
 La liste des noms d'hôte gérés avec votre compte, téléchargée sur le site DynDNS, est vide.
 .
 Vous avez peut-être indiqué un identifiant ou un mot de passe non valables, ou bien le compte n'a peut-être aucun nom d'hôte configuré.
 .
 Veuillez vérifier si des noms d'hôte sont définis avec le compte utilisé, puis utilisez la commande « dpkg-reconfigure ddclient » pour indiquer à nouveau l'identifiant et le mot de passe à utiliser.
";
$elem["ddclient/blankhostslist"]["default"]="";
PKG_OptionPageTail2($elem);
?>
