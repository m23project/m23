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
$elem["ddclient/service"]["descriptionde"]="Anbieter des Dynamischen-DNS-Dienstes:
 Bitte wählen Sie nun den dynamischen DNS-Service-Betreiber, den Sie benutzen möchten. Falls Ihr Betreiber hier nicht aufgeführt ist, wählen Sie bitte »anderer« und Sie werden nach dem Protokoll und Servernamen gefragt.
";
$elem["ddclient/service"]["descriptionfr"]="Fournisseur de service DNS dynamique :
 Veuillez choisir le service de DNS dynamique que vous utilisez. Si celui-ci n'est pas affiché ici, veuillez choisir « Autre ». Le nom du serveur et le protocole utilisé vous seront alors demandés.
";
$elem["ddclient/service"]["default"]="www.dyndns.com";
$elem["ddclient/server"]["type"]="string";
$elem["ddclient/server"]["description"]="Dynamic DNS server:
 Enter the name of the server which is providing you with dynamic DNS
 service (example: members.dyndns.org).
";
$elem["ddclient/server"]["descriptionde"]="Dynamischer DNS-Server:
 Geben Sie den Namen des Servers an, der Sie mit dynamischen-DNS-Diensten versorgt (Beispiel: members.dyndns).
";
$elem["ddclient/server"]["descriptionfr"]="Serveur de DNS dynamique :
 Veuillez indiquer le nom du serveur qui vous fournit le DNS dynamique (p. ex. : members.dyndns.org).
";
$elem["ddclient/server"]["default"]="";
$elem["ddclient/protocol"]["type"]="select";
$elem["ddclient/protocol"]["choices"][1]="dyndns2";
$elem["ddclient/protocol"]["choices"][2]="dslreports1";
$elem["ddclient/protocol"]["choices"][3]="easydns";
$elem["ddclient/protocol"]["choices"][4]="hammernode1";
$elem["ddclient/protocol"]["choices"][5]="zoneedit1";
$elem["ddclient/protocol"]["description"]="Dynamic DNS update protocol:
 Select the dynamic DNS update protocol used by your dynamic DNS service
 provider.
";
$elem["ddclient/protocol"]["descriptionde"]="Dynamisches DNS-Aktualisierungs-Protokoll:
 Wählen Sie das Protokoll für die DNS-Aktualisierung aus, das von Ihrem Anbieter des dynamischen DNS-Dienstes verwendet wird.
";
$elem["ddclient/protocol"]["descriptionfr"]="Protocole de mise à jour du DNS dynamique :
 Veuillez choisir le protocole de mise à jour du DNS dynamique utilisé par votre fournisseur de ce service.
";
$elem["ddclient/protocol"]["default"]="dyndns2";
$elem["ddclient/names"]["type"]="string";
$elem["ddclient/names"]["description"]="DynDNS fully qualified domain names:
 Enter the list of fully qualified domain names for your host (like
 \"myname.dyndns.org\" if you have only one host or
 \"myname1.dyndns.org,myname2.dyndns.org\" for two hosts).
";
$elem["ddclient/names"]["descriptionde"]="DynDNS vollständiger Domainname:
 Geben Sie die Liste der vollständigen Domainnamen Ihres Rechners ein (z.B.: »meinname.dyndns.org« falls Sie nur einen Rechner haben oder für zwei Rechner »meinname1.dyndns.org,meinname2.dyndns.org«).
";
$elem["ddclient/names"]["descriptionfr"]="Noms de domaine de DNS dynamique (complètement qualifiés) :
 Veuillez indiquer la liste des noms de domaine complètement qualifiés de votre hôte (p. ex. « myname.dyndns.org » si vous n'avez qu'un hôte ou « myname1.dyndns.org,myname2.dyndns.org » si vous en avez deux).
";
$elem["ddclient/names"]["default"]="";
$elem["ddclient/username"]["type"]="string";
$elem["ddclient/username"]["description"]="Username for dynamic DNS service:
 Enter the username you use to log into the dynamic DNS service.
";
$elem["ddclient/username"]["descriptionde"]="Benutzername für den dynamischen DNS-Dienst:
 Geben Sie den Benutzernamen an, den Sie zum anmelden beim dynamischen DNS-Dienst verwenden.
";
$elem["ddclient/username"]["descriptionfr"]="Identifiant pour le service de DNS dynamique :
 Veuillez indiquez l'identifiant qui sera utilisé pour la connexion au serveur de DNS dynamique.
";
$elem["ddclient/username"]["default"]="";
$elem["ddclient/password"]["type"]="password";
$elem["ddclient/password"]["description"]="Password for dynamic DNS service:
 Enter the password you use to log into the dynamic DNS service.
";
$elem["ddclient/password"]["descriptionde"]="Passwort für den dynamischen DNS-Dienst:
 Geben Sie dass Passwort ein, das Sie zum Anmelden am dynamischen DNS-Dienst verwenden.
";
$elem["ddclient/password"]["descriptionfr"]="Mot de passe pour le service de DNS dynamique :
 Veuillez indiquez le mot de passe qui sera utilisé pour la connexion au serveur de DNS dynamique.
";
$elem["ddclient/password"]["default"]="";
$elem["ddclient/interface"]["type"]="string";
$elem["ddclient/interface"]["description"]="Interface used for dynamic DNS service:
 Enter the interface which is used for using dynamic DNS service.
";
$elem["ddclient/interface"]["descriptionde"]="Schnittstelle für den dynamischen DNS-Dienst:
 Geben Sie die Schnittstelle an, die für den dynamischen DNS-Dienst benutzt wird.
";
$elem["ddclient/interface"]["descriptionfr"]="Interface du service de DNS dynamique :
 Veuillez indiquer l'interface utilisée par le service de DNS dynamique.
";
$elem["ddclient/interface"]["default"]="";
$elem["ddclient/run_ipup"]["type"]="boolean";
$elem["ddclient/run_ipup"]["description"]="Run ddclient on PPP connect?
 Enable this if ddclient should be run every time a PPP connection is
 established.
";
$elem["ddclient/run_ipup"]["descriptionde"]="Ddclient nach Aufbau der PPP-Verbindung ausführen?
 Aktivieren Sie diese Funktion, falls ddclient nach jedem Aufbau einer PPP-Verbindung ausgeführt werden soll.
";
$elem["ddclient/run_ipup"]["descriptionfr"]="Faut-il lancer ddclient lors de la connexion PPP ?
 Veuillez activer cette option si vous souhaitez lancer ddclient à chaque fois qu'une connexion PPP est établie.
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
$elem["ddclient/run_daemon"]["descriptionfr"]="Faut-il utiliser ddclient en tant que démon ?
 Veuillez choisir si vous voulez lancer ddclient comme un démon au moment du démarrage du système.
";
$elem["ddclient/run_daemon"]["default"]="false";
$elem["ddclient/daemon_interval"]["type"]="string";
$elem["ddclient/daemon_interval"]["description"]="ddclient update interval:
 Please choose the delay between interface address checks.
 Values may be given in seconds (e.g. \"5s\"), in minutes (e.g. \"3m\"), in
 hours (e.g. \"7h\") or in days (e.g. \"1d\").
";
$elem["ddclient/daemon_interval"]["descriptionde"]="ddclient Aktualisierungsintervall:
 Bitte wählen Sie die Wartezeit zwischen Schnittstellen-Adressüberprüfungen aus. Werte können in Sekunden (z.B.: »5s«), Minuten (z.B.: »3m«), Stunden (z.B.: »7h«) oder Tagen (z.B.: »1d«) angegeben werden.
";
$elem["ddclient/daemon_interval"]["descriptionfr"]="Intervalle de mise à jour de ddclient :
 Veuillez choisir le délai entre les vérifications par ddclient de l'adresse de l'interface. Les valeurs peuvent être indiquées en secondes (p. ex. « 5s »), en minutes (p. ex. « 3m »), en heures (p. ex. « 7h ») ou en jours (p. ex. « 1d »). Utilisateurs francophones, attention à l'abréviation utilisée pour les jours.
";
$elem["ddclient/daemon_interval"]["default"]="300";
$elem["ddclient/modifiedconfig"]["type"]="note";
$elem["ddclient/modifiedconfig"]["description"]="Modified configuration file
 The config file /etc/ddclient.conf on your system does not consist of
 three entries. The automatic configuration utility (debconf) cannot handle
 this. Maybe you modified the configuration file manually, thus it won't
 be modified. If you want a new config file to be created, please run
 \"dpkg-reconfigure ddclient\".
";
$elem["ddclient/modifiedconfig"]["descriptionde"]="Konfigurationsdatei verändert
 Die Konfigurationsdatei /etc/ddclient.conf auf Ihrem System besteht nicht aus drei Einträgen. Das automatische Konfigurationsprogramm Debconf kann damit leider nicht umgehen. Vielleicht haben Sie die Konfiguration manuell angepasst, deshalb wird die Konfiguration nicht automatisch geändert. Falls Sie möchten, dass die Datei erneut erstellt wird, führen Sie bitte »dpkg-reconfigure ddclient« aus.
";
$elem["ddclient/modifiedconfig"]["descriptionfr"]="Le fichier de configuration a été modifié
 Le fichier de configuration /etc/ddclient.conf de votre système ne comporte pas trois entrées. Cette interface d'automatisation de configuration (debconf) ne peut gérer cela. Vous avez peut-être modifié le fichier de configuration vous-même : en conséquence, il ne sera pas changé. Si vous souhaitez créer un nouveau fichier de configuration, veuillez utiliser la commande « dpkg-reconfigure ddclient ».
";
$elem["ddclient/modifiedconfig"]["default"]="";
PKG_OptionPageTail2($elem);
?>
