<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("conserver-server");

$elem["conserver-server/port"]["type"]="string";
$elem["conserver-server/port"]["description"]="The master port number for the conserver server:
 Set the TCP port for the master process to listen on for clients. This may
 be either a port number or a service name. The original port number for
 conserver is 782, must be higher than 1024 if running as non-root.
";
$elem["conserver-server/port"]["descriptionde"]="Hauptportnummer des Conserver-Servers:
 Setzt den TCP-Port, auf dem der Hauptprozess auf Clients lauschen soll. Dies kann entweder eine Portnummer oder ein Servicename sein. Die ursprüngliche Portnummer für Conserver ist 782; sie muss höher als 1024 sein, falls er nicht mit root-Rechten läuft.
";
$elem["conserver-server/port"]["descriptionfr"]="Numéro du port maître pour le serveur « conserver » :
 Veuillez choisir le port TCP sur lequel le processus maître sera à l'écoute. Vous pouvez indiquer un numéro de port ou un nom de service.
";
$elem["conserver-server/port"]["default"]="3109";
$elem["conserver-server/base_port"]["type"]="string";
$elem["conserver-server/base_port"]["description"]="The base port number for the conserver children:
 Set the base port for children to listen on. Each child starts looking for
 free ports at this port number and working upward, trying a maximum number
 of ports equal to twice the maximum number of groups. If no free ports are
 available in that range, conserver exits. By default, conserver lets the
 operating system choose a free port.
 Empty input selects the default.
 (Conserver forks a child for each group of consoles it must manage and
 assigns each process a port number to listen on.)
";
$elem["conserver-server/base_port"]["descriptionde"]="Basis-Portnummer der Conserver-Kinder:
 Setzt die Basis-Portnummer, an der die Kinder lauschen sollen. Jedes Kind beginnt an dieser Portnummer mit der Suche nach einem freien Port und arbeitet sich nach oben. Hierbei werden maximal doppelt so viele Ports versucht wie Gruppen existieren. Falls in diesem Bereich keine freien Ports existieren, beendet sich Conserver. Standardmäßig lässt Conserver das Betriebssystem einen freien Port auswählen. Leere Eingabe wählt die Standardeinstellung (Conserver spaltet für jede Konsolen-Gruppe die es verwalten muss ein Kind ab und weist jedem Prozess eine Portnummer zu, auf der er lauschen soll).
";
$elem["conserver-server/base_port"]["descriptionfr"]="Numéro du port de base pour les processus fils « conserver » :
 Veuillez choisir le port de base sur lequel les fils écouteront. Chaque fils cherchera des ports libres à partir de ce numéro de port, en essayant au maximum un nombre de ports égal à deux fois le nombre maximal de groupes. Si aucun port n'est disponible dans cette plage, « conserver » s'arrête. Par défaut, « conserver » laisse le système d'exploitation choisir un port libre. La valeur par défaut sera utilisée si vous laissez ce champ libre. « conserver » crée un fils pour chaque groupe de consoles qu'il doit administrer et assigne à chaque processus un numéro de port sur lequel écouter.
";
$elem["conserver-server/base_port"]["default"]="";
$elem["conserver-server/listen_address"]["type"]="string";
$elem["conserver-server/listen_address"]["description"]="The listen address (defaults to all addresses if empty):
 Set the address to listen on.  This allows conserver to bind to a
 particular IP address (like `127.0.0.1') instead of all interfaces. The
 default is to bind to all interfaces.
";
$elem["conserver-server/listen_address"]["descriptionde"]="Die Adresse, auf der gelauscht werden soll (falls leer wird auf allen Adressen gelauscht):
 Stellt die Adressen ein, auf denen gelauscht werden soll. Dies erlaubt es Conserver, sich auf eine spezielle IP-Adresse (wie »127.0.0.1«) statt auf alle Schnittstellen zu binden. Standardmäßig bindet er sich an alle Schnittstellen.
";
$elem["conserver-server/listen_address"]["descriptionfr"]="Adresse d'écoute (toutes si champ vide) :
 Veuillez choisir l'adresse sur laquelle écouter. « conserver » sera alors à l'écoute sur une seule adresse IP (telle que « 127.0.0.1 ») et non sur toutes les interfaces. Par défaut il sera à l'écoute sur toutes les interfaces.
";
$elem["conserver-server/listen_address"]["default"]="";
$elem["conserver-server/run_as_root"]["type"]="boolean";
$elem["conserver-server/run_as_root"]["description"]="Should conserver run as root?
 Conserver can be configured to run as root or as 'conservr'. It is not
 possible to use the shadow password if running as non-root in
 conserver.passwd. (See the manual for conserver.passwd for more details.)
";
$elem["conserver-server/run_as_root"]["descriptionde"]="Soll Conserver unter Root laufen?
 Conserver kann so konfiguriert werden, dass er unter »root« oder unter »conservr« laufen kann. Es ist nicht möglich, die Shadow-Passwörter in conserver.passwd zu verwenden, falls Conserver nicht unter root läuft (lesen Sie das Handbuch für conserver.passwd für weitere Details).
";
$elem["conserver-server/run_as_root"]["descriptionfr"]="Souhaitez-vous que « conserver » s'exécute en tant que superutilisateur ?
 Le logiciel « conserver » peut être configuré pour s'exécuter avec les privilèges du superutilisateur ou ceux de « conserver ». Il n'est pas possible d'utiliser les mots de passe cachés (« shadow passwords ») avec « conserver » s'il ne s'exécute pas en tant que superutilisateur. Veuillez consulter le manuel de conserver.passwd pour plus de détails.
";
$elem["conserver-server/run_as_root"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
