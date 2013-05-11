<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nws");

$elem["nws/debconf"]["type"]="boolean";
$elem["nws/debconf"]["description"]="Configure NWS using debconf?
 There are several ways to configure the NWS within Debian.
 .
 The first one is to use debconf, and let the scripts generate a NWS
 configuration file. You can also choose to copy and adapt the file located
 in /usr/share/doc/nws/nws.conf.example.gz
 .
 This second option may be preferable if you want to configure one (or more)
 clusters of hosts since this file is designed to be shared between hosts. It
 is definitivly preferable for experts since some options cannot be accessed
 from the debconf interface.
 .
 In any case, modifications to /etc/nws.conf will be preserved on upgrade
 (using ucf).
";
$elem["nws/debconf"]["descriptionde"]="NWS mittels Debconf konfigurieren?
 Es gibt mehrere Möglichkeiten, NWS in Debian zu konfigurieren.
 .
 Die erste ist, Debconf zu verwenden und dessen Skripte die NWS-Konfigurationsdatei erstellen zu lassen. Sie können sich auch dafür entscheiden, die Datei aus /usr/share/doc/nws/nws.conf.example.gz zu kopieren und anzupassen.
 .
 Die zweite Option könnte bevorzugt werden, falls Sie einen (oder mehrere) Cluster von Rechnern konfigurieren möchten, da diese Datei dafür ausgelegt ist, von mehreren Rechnern gemeinsam benutzt zu werden. Diese Option ist definitiv von Experten zu bevorzugen, da einige Optionen nicht von der Debconf-Oberfläche aus erreichbar sind.
 .
 Auf jeden Fall werden Änderungen an /etc/nws.conf bei Upgrades erhalten (mittels Ucf).
";
$elem["nws/debconf"]["descriptionfr"]="Configurer NWS grâce à debconf ?
 Il y a plusieurs façons de configurer NWS dans Debian.
 .
 La première est d'utiliser debconf, et de laisser les scripts générer un fichier de configuration pour NWS. Vous pouvez aussi choisir de copier et adapter le fichier /usr/share/doc/nws/nws.conf.example.gz.
 .
 Cette second option peut être préférable si vous souhaitez configurer un large parc de machines, puisque ce fichier est conçu pour pouvoir être partagé entre les hôtes. C'est de plus préférable pour les experts, puisque certaines options ne peuvent être utilisées depuis l'interface debconf.
 .
 Dans tous les cas, les modifications apportées à /etc/nws.conf seront préservées lors des mises à jour (grâce à ucf).
";
$elem["nws/debconf"]["default"]="true";
$elem["nws/run_nameserver"]["type"]="boolean";
$elem["nws/run_nameserver"]["description"]="Run a NWS nameserver on this host?
 In order to run, the Network Weather Service must contain one (and only
 one) nameserver.
 .
 If you choose not to run the nameserver on this machine, you will be
 prompted for the location of the nameserver to use.
";
$elem["nws/run_nameserver"]["descriptionde"]="Einen NWS-Nameserver auf diesem Rechner betreiben?
 Um zu funktionieren, muss der »Network Weather Service« einen (oder mehrere) Nameserver enthalten.
 .
 Falls Sie sich entscheiden, den Nameserver nicht auf dieser Maschine zu betreiben, werden Sie gefragt, wo sich der zu verwendende Nameserver befindet.
";
$elem["nws/run_nameserver"]["descriptionfr"]="Lancer un serveur de nom NWS sur cet hôte ?
 Pour pouvoir fonctionner, le Network Weather Service doit contenir un (et un seul) serveur de nom.
 .
 Si vous choisissez de ne pas lancer de serveur de nom sur cet hôte, la localisation du serveur à utiliser vous sera demandé.
";
$elem["nws/run_nameserver"]["default"]="true";
$elem["nws/run_memory"]["type"]="boolean";
$elem["nws/run_memory"]["description"]="Run a NWS memory on this host?
 In order to run, the Network Weather Service must contain one memory
 server. You may run several memory servers, and one per cluster is usually a
 good idea.
 .
 If you choose not to run any memory server on this machine, you will be
 prompted for the location of the server to use.
";
$elem["nws/run_memory"]["descriptionde"]="Soll ein NWS-Speicher auf diesem Rechner betrieben werden?
 Um zu funktionieren, muss der »Network Weather Service« einen Speicher-Server enthalten. Sie können mehrere Speicher-Server betreiben und einer pro Cluster ist gewöhnlich eine gute Idee.
 .
 Falls Sie sich entscheiden, keinen Speicher-Server auf dieser Maschine zu betreiben, werden Sie gefragt, wo sich der zu verwendende Speicher-Server befindet.
";
$elem["nws/run_memory"]["descriptionfr"]="Lancer un serveur de mémoire NWS sur cet hôte ?
 Pour pouvoir fonctionner, le Network Weather Service doit contenir un serveur de mémoire. Il est possible d'utiliser plus d'un tel serveur, et c'est généralement une bonne idée d'en déployer un par grappe de machines.
 .
 Si vous choisissez de ne pas lancer de serveur de mémoire sur cet hôte, la localisation du serveur à utiliser vous sera demandé.
";
$elem["nws/run_memory"]["default"]="true";
$elem["nws/nameserver"]["type"]="string";
$elem["nws/nameserver"]["description"]="Nameserver location:
 Please give the location of the nameserver to use. Simply giving the name
 of the host on which this server runs is enough. You can use the IP adress
 instead of its name. If the server does not listen on the regular
 port (8090), specify it after a colon.
 .
 For example, some valid values are: \"bluehost\", \"192.168.0.1\",
 \"fender.ucsb.edu\" or \"bluehost:890\".
";
$elem["nws/nameserver"]["descriptionde"]="Ort des Nameservers:
 Bitte geben Sie den Ort des zu verwendenden Nameservers an. Es reicht, nur den Namen des Rechners, auf dem der Server läuft, anzugeben. Sie können statt des Namens die IP-Adresse verwenden. Falls der Server nicht auf dem regulären Port (8090) lauscht, geben Sie diesen nach dem Doppelpunkt an.
 .
 Gültige Werte sind z.B.: »bluehost«, »192.168.0.1«, »fender.ucsb.edu« oder »bluehost:890«.
";
$elem["nws/nameserver"]["descriptionfr"]="Localisation du serveur de nom :
 Veuillez indiquer la localisation du serveur de nom à utiliser. Donner simplement le nom de la machine sur lequel ce serveur s'exécute est suffisant. Vous pouvez utiliser l'adresse IP au lieu du nom. Si le serveur n'écoute pas sur le port par défaut (8090), indiquez le port utilisé après deux points («:»).
 .
 Quelques exemples de valeurs correctes : «bluehost», «192.168.0.1», «fender.ucsb,edu», «bluehost:890».
";
$elem["nws/nameserver"]["default"]="";
$elem["nws/memory"]["type"]="string";
$elem["nws/memory"]["description"]="Memory location:
 Please give the location of the memory server to use. Simply giving the name
 of the host on which this server runs is enough. You can use the IP adress
 instead of its name. If the server does not listen on the regular
 port (8060), specify it after a colon.
 .
 For example, some valid values are: \"bluehost\", \"192.168.0.1\",
 \"fender.ucsb.edu\" or \"bluehost:890\".
";
$elem["nws/memory"]["descriptionde"]="Ort des Speichers:
 Bitte geben Sie den Ort des zu verwendenden Speicher-Servers an. Es reicht, nur den Namen des Rechners, auf dem der Server läuft, anzugeben. Sie können statt des Namens die IP-Adresse verwenden. Falls der Server nicht auf dem regulären Port (8060) lauscht, geben Sie diesen nach dem Doppelpunkt an.
 .
 Gültige Werte sind z.B.: »bluehost«, »192.168.0.1«, »fender.ucsb.edu« oder »bluehost:890«.
";
$elem["nws/memory"]["descriptionfr"]="Localisation du serveur de mémoire :
 Veuillez indiquer la localisation du serveur de mémoire à utiliser. Donner simplement le nom de la machine sur lequel ce serveur s'exécute est suffisant. Vous pouvez utiliser l'adresse IP au lieu du nom. Si le serveur n'écoute pas sur le port par défaut (8060), indiquez le port utilisé après deux points («:»).
 .
 Quelques exemples de valeurs correctes : «bluehost», «192.168.0.1», «fender.ucsb,edu», «bluehost:890».
";
$elem["nws/memory"]["default"]="";
$elem["nws/skills"]["type"]="multiselect";
$elem["nws/skills"]["choices"][1]="cpu";
$elem["nws/skills"]["choices"][2]="disk";
$elem["nws/skills"]["choices"][3]="memory";
$elem["nws/skills"]["choices"][4]="tcpConnect";
$elem["nws/skills"]["choicesde"][1]="CPU";
$elem["nws/skills"]["choicesde"][2]="Platte";
$elem["nws/skills"]["choicesde"][3]="Speicher";
$elem["nws/skills"]["choicesde"][4]="TcpConnect";
$elem["nws/skills"]["choicesfr"][1]="processeur";
$elem["nws/skills"]["choicesfr"][2]="disque";
$elem["nws/skills"]["choicesfr"][3]="mémoire";
$elem["nws/skills"]["choicesfr"][4]="tcpConnect";
$elem["nws/skills"]["description"]="Monitors to use:
 cpu: the fraction of CPU available to both newly-started and existing processes.
 .
 disk: the amount of space available on a disk.
 .
 memory: the amount of free memory available on the machine.
 .
 tcpConnect: the time required to establish a TCP connection.
 .
 tcpMessage: TCP bandwidth and latency. Only the clique leader needs to
 specify this, the other members should not select this.
 .
 For more information, see the NWS userguide.
";
$elem["nws/skills"]["descriptionde"]="Zu verwendende Überwachungsanzeigen:
 CPU: der CPU-Anteil, der sowohl neu-gestarteten als auch existierenden Prozessen zur Verfügung steht.
 .
 Platte: die Menge an verfügbaren Plattenplatz.
 .
 Speicher: die Menge an freien Speicher auf der Maschine.
 .
 TcpConnect: die zum Aufbau einer TCP-Verbindung benötigte Zeit.
 .
 TcpMessage: TCP-Bandbreite und Latenzzeit. Nur der Leiter der Clique darf dies angeben, die anderen Mitglieder sollten dies nicht auswählen.
 .
 Für weitere Informationen lesen Sie das NWS-Benutzerhandbuch.
";
$elem["nws/skills"]["descriptionfr"]="Moniteurs à utiliser :
 processeur : fraction du processeur disponible à la fois pour un nouveau processus et pour un processus existant. 
 .
 disque : espace disponible sur un disque.
 .
 mémoire : espace disponible dans la mémoire vive de cette machine.
 .
 tcpConnect : temps requis pour établir une connexion TCP.
 .
 tcpMessage : bande passante et latence TCP. Seul le leader de la clique doit spécifier ceci, les autres membres ne devraient pas le choisir.
 .
 Pour plus d'information, voir le guide de l'utilisateur de NWS.
";
$elem["nws/skills"]["default"]="cpu, memory";
$elem["nws/tcpConnect/members"]["type"]="string";
$elem["nws/tcpConnect/members"]["description"]="Members of this tcpConnect experiment:
 Please give the list (space or comma separated) of all machines between 
 which you want to monitor the tcpConnect time. 
 .
 Please do not list the host on which we are running currently.
";
$elem["nws/tcpConnect/members"]["descriptionde"]="Mitglieder dieses TcpConnect-Experiments:
 Bitte geben Sie die Liste (separiert durch Kommata oder Leerzeichen) aller Maschinen an, von denen Sie die TcpConnect-Zeit überwachen wollen.
 .
 Bitte führen Sie nicht den Rechner auf, auf dem wir derzeit laufen.
";
$elem["nws/tcpConnect/members"]["descriptionfr"]="Membres de cette expérience tcpConnect :
 Veuillez indiquer la liste de toutes les machines (séparées par des espaces ou des virgules) entre lesquelles vous souhaitez mesurer le temps de connextion TCP.
 .
 Veuillez ne pas indiquer la machine sur laquelle nous sommes actuellement.
";
$elem["nws/tcpConnect/members"]["default"]="";
$elem["nws/tcpMessage/members"]["type"]="string";
$elem["nws/tcpMessage/members"]["description"]="Which machines should participate in this tcpMessage experiment?
 Please give the list (space or comma separated) of all machines between 
 which you want to monitor the tcp communication capacities.
 .
 Please do not list the host on which we are running currently.
";
$elem["nws/tcpMessage/members"]["descriptionde"]="Welche Maschinen sollen an dem TcpMessage-Experiment teilnehmen?
 Bitte geben Sie die Liste (separiert durch Kommata oder Leerzeichen) aller Maschinen an, zwischen denen Sie den TCP-Kommunikationsdurchsatz überwachen wollen.
 .
 Bitte führen Sie nicht den Rechner auf, auf dem wir derzeit laufen.
";
$elem["nws/tcpMessage/members"]["descriptionfr"]="Quelles machines doivent prendre part à cette expérience tcpMessage ?
 Veuillez indiquer la liste de toutes les machines (séparées par des espaces ou des virgules) entre lesquelles vous souhaitez mesurer les capacités de communication TCP.
 .
 Veuillez ne pas indiquer la machine sur laquelle nous sommes actuellement.
";
$elem["nws/tcpMessage/members"]["default"]="";
PKG_OptionPageTail2($elem);
?>
