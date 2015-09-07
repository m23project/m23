<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pybit-web");

$elem["pybit-web/rabbitmqhost"]["type"]="string";
$elem["pybit-web/rabbitmqhost"]["description"]="Host machine running RabbitMQ:
 Please specify the server running RabbitMQ with which the web front-end
 and the pyBit controller need to communicate, sending the details of the
 jobs to be built.
";
$elem["pybit-web/rabbitmqhost"]["descriptionde"]="Host, auf dem RabbitMQ ausgeführt wird:
 Bitte geben Sie den Server an, auf dem RabbitMQ läuft. Mit diesem müssen die Web-Oberfläche und die PyBit-Steuerung kommunizieren, um die Einzelheiten der Paketbauaufgaben zu senden.
";
$elem["pybit-web/rabbitmqhost"]["descriptionfr"]="Machine hôte hébergeant RabbitMQ :
 Veuillez indiquer le serveur hébergeant RabbitMQ avec lequel le serveur web frontal communiquera, et qui enverra les détails de la tâche à compiler.
";
$elem["pybit-web/rabbitmqhost"]["default"]="";
$elem["pybit-web/hostname"]["type"]="string";
$elem["pybit-web/hostname"]["description"]="Fully qualified hostname for the web front-end:
 Please specify the host running the web front-end (which will also be
 running the pyBit controller).
 .
 You may choose to use a named Apache virtual host or accept the default
 if all the pyBit clients also run on this one machine.
 .
 The hostname is passed down to the build clients to allow them to post
 failure messages back to the controller.
";
$elem["pybit-web/hostname"]["descriptionde"]="Voll qualifizierter Hostname für die Web-Oberfläche:
 Bitte geben Sie den Host an, auf dem die Web-Oberfläche läuft (dort läuft auch die PyBit-Steuerung).
 .
 Sie können auswählen, eine genannten virtuellen Apache-Host zu verwenden oder die Vorgabe akzeptieren, wenn alle PyBit-Clients ebenfalls auf diesem Rechner laufen.
 .
 Der Hostname wird an die Paketbau-Clients hinuntergereicht, um ihnen die Möglichkeit zu geben, Störungsnachrichten zurück an die Steuerung zu senden.
";
$elem["pybit-web/hostname"]["descriptionfr"]="Nom d'hôte pleinement qualifié pour le serveur web frontal :
 Veuillez indiquer l'hôte hébergeant le serveur web frontal (qui fera également tourner le contrôleur pyBit).
 .
 Vous pouvez choisir d'utiliser un hôte virtuel Apache nommé ou accepter la valeur par défaut, si tous les clients pyBit tournent également sur cette machine.
 .
 Le nom d'hôte est passé aux clients de compilation les autorisant ainsi à émettre des messages d'échec au contrôleur.
";
$elem["pybit-web/hostname"]["default"]="localhost";
$elem["pybit-web/port"]["type"]="string";
$elem["pybit-web/port"]["description"]="Port for web front-end:
 Please specify the port that the web front-end should be available on.
 If it is serving localhost, it is probably easiest to use port 8080.
 .
 If the web front-end is running on a dedicated host or an Apache
 virtual host, it may be preferable to use port 80.
";
$elem["pybit-web/port"]["descriptionde"]="Port der Web-Oberfläche.
 Bitte geben Sie den Port an, auf dem die Web-Oberfläche erreichbar sein soll. Falls sie vom lokalen Host bereitgestellt wird, ist es wahrscheinlich am einfachsten, Port 8080 zu benutzen.
 .
 Falls die Web-Oberfläche auf einem eigenen Host oder einem virtuellen Apache-Host läuft, ist es wahrscheinlich wünschenswert, Port 80 zu verwenden.
";
$elem["pybit-web/port"]["descriptionfr"]="
 Veuillez indiquer le port sur lequel le serveur web frontal sera disponible. Si celui-ci est local, il est probablement plus aisé d'utiliser le port 8080.
 .
 Si le serveur web frontal tourne sur un hôte dédié ou sur un hôte virtuel Apache, il serait préférable d'utiliser le port 80.
";
$elem["pybit-web/port"]["default"]="80";
$elem["pybit-web/missinghost"]["type"]="note";
$elem["pybit-web/missinghost"]["description"]="Missing RabbitMQ hostname!
 If no RabbitMQ host is specified for the pyBit controller, the build
 clients will not receive any messages on the queue or build any packages.
 .
 Please edit /etc/pybit/web/web.conf after configuration.
";
$elem["pybit-web/missinghost"]["descriptionde"]="Fehlender RabbitMQ-Hostname!
 Falls kein RabbitMQ-Host für die PyBit-Steuerung angegeben wurde, werden die Paketbau-Clients keine Nachrichten aus der Warteschlange empfangen und keine Pakete bauen.
 .
 Bitte bearbeiten Sie nach der Konfiguration /etc/pybit/web/web.conf.
";
$elem["pybit-web/missinghost"]["descriptionfr"]="Nom d'hôte pour RabbitMQ manquant !
 Si aucun hôte RabbitMQ n'est indiqué pour le contrôleur pyBit, les clients de compilation ne recevront aucun message sur la file d'attente ou ne compileront aucun paquet.
 .
 Veuillez éditer le fichier /etc/pybit/web/web.conf après la configuration.
";
$elem["pybit-web/missinghost"]["default"]="";
PKG_OptionPageTail2($elem);
?>
