<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("distcc");

$elem["distcc/daemon"]["type"]="boolean";
$elem["distcc/daemon"]["description"]="Start the distcc daemon on startup?
 distcc can be run as a daemon, listening on port 3632 for incoming
 connections.
 .
 You have the option of starting the distcc daemon automatically on the
 computer startup. If in doubt, it's advised not to start it automatically
 on startup. If you later change your mind, you can run: 'dpkg-reconfigure
 distcc'.
";
$elem["distcc/daemon"]["descriptionde"]="Den Distcc-Daemon beim Rechnerstart starten?
 Distcc kann als Daemon betrieben werden, der an Port 3632 auf eingehende Verbindungen wartet.
 .
 Sie haben die Möglichkeit, den Distcc-Daemon beim Rechnerstart automatisch starten zu lassen. Im Zweifelsfall wird empfohlen, dies nicht zu tun. Falls Sie später Ihre Meinung ändern, können Sie »dpkg-reconfigure distcc« aufrufen.
";
$elem["distcc/daemon"]["descriptionfr"]="Faut-il lancer le démon distcc au démarrage ?
 Distcc peut fonctionner avec un démon qui sera à l'écoute des connexions entrantes sur le port 3632.
 .
 Vous pouvez lancer le démon distcc automatiquement au démarrage du système. Dans le doute, vous devriez vous en abstenir. Si vous souhaitez modifier ce réglage plus tard, vous pourrez utiliser la commande « dpkg-reconfigure distcc ».
";
$elem["distcc/daemon"]["default"]="false";
$elem["distcc/daemon-allow"]["type"]="string";
$elem["distcc/daemon-allow"]["description"]="Allowed client networks:
 The distcc daemon implements access control based on the IP address of the
 client, that is trying to connect. Only the hosts or networks listed
 here are allowed to connect.
 .
 You can list multiple hosts and/or networks, separated by spaces. Hosts are
 represented by their IP address, networks have to be in CIDR notation,
 f.e. \"192.168.1.0/24\".
 .
 To change the list at a later point, you can run: 'dpkg-reconfigure distcc'.
";
$elem["distcc/daemon-allow"]["descriptionde"]="Zugelassene Client-Netze:
 Der Distcc-Daemon implementiert die Zugangskontrolle basierend auf der IP-Adresse des Clients, der versucht, sich mit ihm zu verbinden. Nur Verbindungen von Hosts oder Netzen, die hier aufgelistet sind, werden zugelassen.
 .
 Sie können mehrere Hosts und/oder Netze durch Leerzeichen getrennt eingeben. Hosts werden durch deren IP-Adresse repräsentiert. Netze müssen in CIDR-Schreibweise eingegeben werden, z. B. »192.168.1.0/24«.
 .
 Um die Liste zu einem späteren Zeitpunkt zu ändern, rufen Sie »dpkg-reconfigure distcc« auf.
";
$elem["distcc/daemon-allow"]["descriptionfr"]="Réseaux clients autorisés :
 Le démon distcc permet un contrôle d'accès basé sur l'adresse IP des clients qui s'y connectent. Veuillez indiquer ici les hôtes ou réseaux qui seront acceptés.
 .
 Vous pouvez indiquer plusieurs hôtes ou des réseaux entiers, séparés par des espaces. Les hôtes sont représentés par leur adresse IP et les réseaux doivent utiliser la notation CIDR, par exemple « 192.168.1.0/24 ».
 .
 Si vous souhaitez changer la liste des réseaux autorisés plus tard, vous pourrez utiliser la commande « dpkg-reconfigure distcc ».
";
$elem["distcc/daemon-allow"]["default"]="127.0.0.1";
$elem["distcc/daemon-listen"]["type"]="string";
$elem["distcc/daemon-listen"]["description"]="Listen interfaces:
 The distcc daemon can be bound to a specific network interface.
 .
 You probably want to choose the interface of your local network by entering
 it's IP address. If distccd should listen on all interfaces, just enter
 nothing.
 .
 Be sure to protect distccd from unauthorized access, by being careful in
 your choice of the listen interface and allowed networks. distccd should 
 never be accessible from untrusted networks. If that is needed, secureshell
 should be used instead of the daemon.
 .
 To change the address at a later point, you can run: 'dpkg-reconfigure distcc'.
";
$elem["distcc/daemon-listen"]["descriptionde"]="Netzschnittstellen:
 Der Distcc-Daemon kann an eine spezifische Netzschnittstelle gebunden werden.
 .
 Möglicherweise möchten Sie die Netzschnittstelle zu Ihrem lokalen Netz verwenden, indem Sie deren IP-Adresse eingeben. Falls distccd an alle Schnittstellen gebunden werden soll, geben Sie hier nichts ein.
 .
 Stellen Sie sicher, dass distccd vor unberechtigtem Zugang geschützt ist, indem Sie Netzschnittstelle und die erlaubten Netze sorgfältig auswählen. Distccd sollte niemals von nicht vertrauenswürdigen Netzen aus zugänglich sein. Falls dies notwendig ist, sollte Secure-Shell anstatt des Daemons verwendet werden.
 .
 Um die Adresse später zu ändern, können sie »dpkg-reconfigure distcc« ausführen.
";
$elem["distcc/daemon-listen"]["descriptionfr"]="Interfaces d'écoute :
 Le démon distcc peut être à l'écoute d'une interface spécifique.
 .
 Si vous souhaitez utiliser l'interface de votre réseau local, veuillez indiquer son adresse IP ici. Si vous souhaitez que distcc soit à l'écoute de toutes les interfaces, il suffit de laisser ce champ vide.
 .
 Assurez-vous de restreindre les accès à distcc en choisissant avec soin la ou les interfaces d'écoute et le(s) réseau(x) autorisé(s). Le démon distcc ne doit pas pouvoir être atteint depuis des réseaux qui ne sont pas sûrs. Si cela est nécessaire, vous devriez utiliser secureshell plutôt que le démon.
 .
 Si vous souhaitez changer l'adresse plus tard, vous pourrez utiliser la commande « dpkg-reconfigure distcc ».
";
$elem["distcc/daemon-listen"]["default"]="127.0.0.1";
$elem["distcc/daemon-nice"]["type"]="string";
$elem["distcc/daemon-nice"]["description"]="Nice level:
 You can start the distcc daemon with a nice level, to give it a low priority
 compared to other processes. The start script will only accept values between
 0 and 20.
 .
 To change this value at a later point, you can run: 'dpkg-reconfigure distcc'.
";
$elem["distcc/daemon-nice"]["descriptionde"]="Nice-Stufen:
 Sie können den Distcc-Daemon mit einer Nice-Stufe starten, um ihm eine niedrigere Priorität als andere Prozesse zu geben. Das Start-Skript akzeptiert nur Werte zwischen 0 und 20.
 .
 Um diesen Wert zu einem späteren Zeitpunkt zu ändern, rufen Sie »dpkg-reconfigure distcc« auf.
";
$elem["distcc/daemon-nice"]["descriptionfr"]="Niveau de politesse (« nice level ») :
 Il est possible de lancer le démon distcc avec un niveau de politesse permettant qu'il s'exécute avec une priorité inférieure à celle des autres processus. Cette valeur doit être un nombre entier compris entre 0 et 20 inclus.
 .
 Si vous souhaitez changer cette valeur plus tard, vous pourrez utiliser la commande « dpkg-reconfigure distcc ».
";
$elem["distcc/daemon-nice"]["default"]="10";
$elem["distcc/daemon-jobs"]["type"]="string";
$elem["distcc/daemon-jobs"]["description"]="Maximum number of concurrent jobs:
 You can tell the distcc daemon to accept a maximum number of jobs at a time.
 This can be useful on systems that should stay interactive while they serve
 as a distcc server. Usually, you will want to set this to a value matching
 or doubling the number of cores on this system.
 .
 To change this value at a later point, you can run: 'dpkg-reconfigure distcc'.
";
$elem["distcc/daemon-jobs"]["descriptionde"]="Maximale Anzahl von nebenläufigen Aufgaben:
 Sie können dem Distcc-Daemon mitteilen, wieviele Aufgaben maximal zur selben Zeit angenommen werden können. Das kann auf Systemen nützlich sein, die interaktiv benutzbar bleiben sollen, während diese als Distcc-Server genutzt werden. Normalerweise wird dieser Wert auf die einfache oder die doppelte Anzahl der Prozessorkerne des System gesetzt.
 .
 Um diesen Wert zu einem späteren Zeitpunkt zu ändern, rufen Sie »dpkg-reconfigure distcc« auf.
";
$elem["distcc/daemon-jobs"]["descriptionfr"]="Nombre maximal de travaux simultanés :
 Il est possible de limiter le nombre de travaux simultanés traités par le démon distcc. Cela peut être utile sur les systèmes utilisés interactivement tout en étant serveurs pour distcc. Il est en général conseillé de choisir une valeur égale au nombre de coeurs des processeurs du système ou au double de ce nombre.
 .
 Si vous souhaitez changer cette valeur plus tard, vous pourrez utiliser la commande « dpkg-reconfigure distcc ».
";
$elem["distcc/daemon-jobs"]["default"]="Default:";
$elem["distcc/daemon-zeroconf"]["type"]="boolean";
$elem["distcc/daemon-zeroconf"]["description"]="Enable Zeroconf support?
 distcc has Zeroconf support.
 .
 If you enable it here, please read /usr/share/doc/distcc/README.Debian to
 learn how clients must be configured to make use of it. Also note, that
 you need to install the dbus package, if you're going to use Zeroconf.
 .
 To change this value at a later point, you can run: 'dpkg-reconfigure distcc'.
";
$elem["distcc/daemon-zeroconf"]["descriptionde"]="Zeroconf-Unterstützung aktivieren?
 Distcc unterstützt Zeroconf.
 .
 Falls Sie es hier aktivieren, lesen Sie /usr/share/doc/distcc/README.Debian, um herauszufinden, wie die Clients hierzu konfiguriert werden müssen. Beachten Sie auch, dass das Paket »dbus« installiert sein muss, falls Sie Zeroconf nutzen möchten.
 .
 Um diesen Wert zu einem späteren Zeitpunkt zu ändern, rufen Sie »dpkg-reconfigure distcc« auf.
";
$elem["distcc/daemon-zeroconf"]["descriptionfr"]="Faut-il activer la gestion de Zeroconf ?
 Le démon distcc peut gérer Zeroconf.
 .
 Si vous activez cette option, vous devriez lire le fichier /usr/share/doc/distcc/README.Debian pour pouvoir configurer les clients afin qu'ils s'en servent. Veuillez noter que si vous prévoyez d'utiliser Zeroconf, vous devrez installer le paquet dbus.
 .
 Si vous souhaitez changer cette valeur plus tard, vous pourrez utiliser la commande « dpkg-reconfigure distcc ».
";
$elem["distcc/daemon-zeroconf"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
