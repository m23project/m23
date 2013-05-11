<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("canna");

$elem["canna/run_cannaserver"]["type"]="boolean";
$elem["canna/run_cannaserver"]["description"]="Do you want to run the Canna server ?
 This package contains the Canna server and server-related
 utilities. If you are only interested in these utilities,
 you can disable the Canna server here.
";
$elem["canna/run_cannaserver"]["descriptionde"]="Wollen Sie den Canna-Server betreiben? 
 Dieses Paket enthält den Canna-Server und Server-Werkzeuge. Wenn Sie nur an diesen Werkzeugen interessiert sind, können Sie den Canna-Server hier deaktivieren.
";
$elem["canna/run_cannaserver"]["descriptionfr"]="Faut-il lancer le serveur Canna ?
 Ce paquet inclut le serveur Canna et les utilitaires qui l'accompagnent. Si seuls ceux-ci vous intéressent, vous pouvez désactiver le serveur ici.
";
$elem["canna/run_cannaserver"]["default"]="true";
$elem["canna/run_with_inet"]["type"]="boolean";
$elem["canna/run_with_inet"]["description"]="Do you want to connect to the Canna server from a remote host?
 The Canna server only allows connections via UNIX domain
 sockets when the `-inet' option is not specified.  This
 means that when the Canna server is started without the `-inet' option,
 only clients which run on the same host can connect to the server.
 Some clients such as, `egg' and `yc-el', do not support
 UNIX domain socket and require the `-inet' option, even if they run on
 the same host.
 .
 If you want to connect to this Canna server from remote hosts, or
 if you want to use INET-domain-only software, you should run
 the server with the `-inet' option.
";
$elem["canna/run_with_inet"]["descriptionde"]="Wollen Sie sich von entfernten Rechnern mit dem Canna-Server verbinden? 
 Der Canna-Server lässt nur Verbindungen über UNIX-Domain-Sockets zu, wenn die Option »-inet« nicht angegeben wurde. Das bedeutet, wenn der Canna-Server ohne diese Option gestartet wird, können sich nur Clients mit dem Server verbinden, die auf dem selben Rechner laufen. Einige Clients wie »egg« und »yc-el« unterstützen keine UNIX-Domain-Sockets und erfordern die Option »-inet«, sogar wenn sie auf dem selben Rechner laufen.
 .
 Wenn Sie sich von entfernen Rechnern auf diesen Canna-Server verbinden wollen oder Software nutzen, die nur INET-Domains unterstützt, sollten Sie den Server mit der Option »-inet« betreiben.
";
$elem["canna/run_with_inet"]["descriptionfr"]="Souhaitez-vous que des hôtes distants puissent se connecter au serveur Canna ?
 Il n'est possible de se connecter à cette version du serveur Canna que par des « sockets » de domaine UNIX si on n'utilise pas l'option « -inet » (pour améliorer la sécurité). Cela signifie que lorsque le serveur Canna est lancé sans cette option, seuls les clients fonctionnant sur le même hôte que le serveur pourront s'y connecter. Veuillez noter que certains clients comme « egg » et « yc-el » ne gèrent pas les « sockets » de domaine UNIX et imposent d'utiliser l'option « -inet » même s'ils sont utilisés sur le même hôte que le serveur.
 .
 Si vous souhaitez pouvoir vous connecter à ce serveur Canna depuis des hôtes distants ou si vous prévoyez d'utiliser des logiciels ne fonctionnant qu'avec l'option « -inet », le serveur doit utiliser cette option.
";
$elem["canna/run_with_inet"]["default"]="false";
$elem["canna/manage_allow_hosts_with_debconf"]["type"]="boolean";
$elem["canna/manage_allow_hosts_with_debconf"]["description"]="Manage /etc/hosts.canna with debconf ?
 /etc/hosts.canna controls which hosts can connect to this server.
 .
 By default /etc/hosts.canna will be managed with debconf.
 Refuse here if you want to manage /etc/hosts.canna yourself.
";
$elem["canna/manage_allow_hosts_with_debconf"]["descriptionde"]="Die Datei /etc/hosts.canna mit Debconf verwalten?
 Die Datei /etc/hosts.canna legt fest, welcher Rechner sich mit diesem Server verbinden darf.
 .
 Normalerweise wird die Datei /etc/hosts.canna von debconf verwaltet. Lehnen Sie das hier ab, wenn Sie die Datei /etc/hosts.canna selbst verwalten wollen.
";
$elem["canna/manage_allow_hosts_with_debconf"]["descriptionfr"]="Faut-il gérer /etc/hosts.canna avec debconf ?
 Ce fichier gère les autorisations de connexion des hôtes distants au serveur Canna.
 .
 Par défaut, il sera géré par debconf. Refusez ici si vous souhaitez le gérer vous-même.
";
$elem["canna/manage_allow_hosts_with_debconf"]["default"]="true";
$elem["canna/allow_hosts"]["type"]="string";
$elem["canna/allow_hosts"]["description"]="Please enter the name of each host allowed to connect to this server
 Please enter the names of the hosts allowed to connect to this Canna server,
 separated by spaces.
 .
 `unix'  is a special notation for allowing access
 via UNIX domain sockets.
";
$elem["canna/allow_hosts"]["descriptionde"]="Bitte Namen aller Rechner eingeben, die sich mit diesem Server verbinden dürfen
 Bitte geben Sie durch Leerzeichen getrennt die Namen der Rechner ein, die sich mit diesem Canna-Server verbinden dürfen.
 .
 »unix«  ist eine besondere Schreibweise, um den Zugriff über UNIX-Domain-Sockets zu gestatten.
";
$elem["canna/allow_hosts"]["descriptionfr"]="Hôtes autorisés à se connecter à ce serveur??:
 Veuillez indiquer les noms d'hôtes autorisés à se connecter à ce serveur Canna, séparés par des espaces.
 .
 « unix » est une entrée spéciale qui autorise l'accès par les « sockets » de domaine UNIX.
";
$elem["canna/allow_hosts"]["default"]="unix localhost";
PKG_OptionPageTail2($elem);
?>
