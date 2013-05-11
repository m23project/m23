<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("python-poker-network");

$elem["python-poker-network/configure"]["type"]="boolean";
$elem["python-poker-network/configure"]["description"]="Do you want to configure and run the poker-network server?
 If you want to configure and run a poker-network server, make sure you
 have administrative rights on a running MySQL server. If you do not want
 to run the poker-network server on this machine, you will be prompted for
 the hostname or the IP address of a running poker-network server.
";
$elem["python-poker-network/configure"]["descriptionde"]="Möchten Sie den Poker-Network-Server konfigurieren und betreiben?
 Falls Sie einen Poker-Network-Server konfigurieren und betreiben wollen, stellen Sie sicher, dass Sie die administrativen Rechte zum Betrieb des MySQL-Servers haben. Falls Sie den Poker-Network-Server auf dieser Maschine nicht ausführen wollen, werden Sie aufgefordert, den Hostname oder die IP-Adresse für den laufenden Poker-Network-Server einzugeben.
";
$elem["python-poker-network/configure"]["descriptionfr"]="Faut-il configurer et démarrer le serveur poker-network ?
 Vous allez configurer et démarrer le serveur poker-network. Assurez-vous de posséder les droits d'administration sur un serveur MySQL opérationnel. Si vous ne souhaitez pas exécuter poker-network en mode serveur sur cette machine, il vous sera demandé le nom d'hôte ou l'adresse IP d'un serveur poker-network actif.
";
$elem["python-poker-network/configure"]["default"]="false";
$elem["python-poker-network/abort"]["type"]="note";
$elem["python-poker-network/abort"]["description"]="Skipping poker-network server installation
 If you want to run poker-network at a later time, you will need to
 configure it by hand or by running dpkg-reconfigure
 python-poker-network.
";
$elem["python-poker-network/abort"]["descriptionde"]="Poker-Network-Server-Installation überspringen
 Falls Sie Poker-Network zu einem späteren Zeitpunkt ausführen wollen, müssen Sie es von Hand konfigurieren oder »dpkg-reconfigure python-poker-network« ausführen.
";
$elem["python-poker-network/abort"]["descriptionfr"]="Annulation de l'installation du serveur poker-network
 Si vous souhaitez exécuter poker-network ultérieurement, vous devrez le configurer vous-même ou utiliser la commande « dpkg-reconfigure python-poker-network ».
";
$elem["python-poker-network/abort"]["default"]="";
$elem["python-poker-network/host"]["type"]="string";
$elem["python-poker-network/host"]["description"]="Hostname or IP address of the default poker-network server:
 The clients based on poker-network installed on the same machine will be
 able to use this poker-network server host as a default, if needed.
";
$elem["python-poker-network/host"]["descriptionde"]="Hostname oder IP-Adresse des Standard-Poker-Network-Servers:
 Die Clients basierend auf dem auf der gleichen Maschine installierten Poker-Network werden in der Lage sein, diesen Poker-Network-Server falls notwendig als Standard zu verwenden.
";
$elem["python-poker-network/host"]["descriptionfr"]="Nom d'hôte ou adresse IP du serveur poker-network par défaut :
 Vous pouvez indiquer le serveur poker-network que les clients installés sur cette même machine pourront utiliser par défaut.
";
$elem["python-poker-network/host"]["default"]="poker.pokersource.info";
$elem["python-poker-network/www"]["type"]="string";
$elem["python-poker-network/www"]["description"]="Hostname or IP address of the default poker-network web server:
 The clients based on poker-network installed on the same machine will be
 able to use this address to connect to the web part of the poker server.
";
$elem["python-poker-network/www"]["descriptionde"]="Hostname oder IP-Adresse des Standard-Poker-Network-Webservers:
 Die Clients basierend auf dem auf der gleichen Maschine installierten Poker-Network, werden in der Lage sein, sich mit dem Webteil des Poker-Servers zu verbinden.
";
$elem["python-poker-network/www"]["descriptionfr"]="Nom d'hôte ou adresse IP du serveur web poker-network par défaut :
 Veuillez indiquer l'adresse que les clients basés sur poker-network, installés sur la même machine, pourront utiliser pour se connecter au serveur web de poker-network.
";
$elem["python-poker-network/www"]["default"]="pokersource.info";
$elem["python-poker-network/bots"]["type"]="boolean";
$elem["python-poker-network/bots"]["description"]="Do you want to run the poker-network robots?
 Robot players are simple minded poker players that can be used to
 exercise the poker server when there are not enough human players
 connected.
";
$elem["python-poker-network/bots"]["descriptionde"]="Möchten Sie die Poker-Network-Roboter betreiben?
 Roboter-Spieler sind einfach-gestrickte Pokerspieler, die den Poker-Server verwenden können, wenn nicht genug menschliche Spieler angebunden sind.
";
$elem["python-poker-network/bots"]["descriptionfr"]="Faut-il lancer les robots poker-network ?
 Les robots sont des joueurs de poker rudimentaires qui peuvent être utilisés si le nombre de joueurs humains connectés n'est pas suffisant.
";
$elem["python-poker-network/bots"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
