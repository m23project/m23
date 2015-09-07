<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("conserver-client");

$elem["conserver-client/config"]["type"]="boolean";
$elem["conserver-client/config"]["description"]="Do you want to configure console automatically?
 Setting this to true will edit /etc/conserver/console.cf
 and replace CONSERVER_MASTER and CONSERVER_PORT with the
 configured values in the next questions
";
$elem["conserver-client/config"]["descriptionde"]="Möchten Sie die Konsole automatisch konfigurieren?
 Wenn Sie dies auf »wahr« setzen, dann wird /etc/conserver/console.cf bearbeitet und CONSERVER_MASTER und CONSERVER_PORT mit den aus den nächsten Fragen konfigurierten Werten ersetzt.
";
$elem["conserver-client/config"]["descriptionfr"]="Souhaitez-vous configurer la console automatiquement ?
 Si vous choisissez cette option, les valeurs CONSERVER_MASTER et CONSERVER_PORT du fichier « /etc/conserver/console.cf » seront remplacées par les réponses aux questions suivantes.
";
$elem["conserver-client/config"]["default"]="true";
$elem["conserver-client/server"]["type"]="string";
$elem["conserver-client/server"]["description"]="Hostname where your conserver server is installed:
 The conserver hostname is the hostname where the conserver-server
 package is installed. The client, 'console', will use the hostname 'console'
 if left empty. The server name can be changed during runtime with
 the -M option.
";
$elem["conserver-client/server"]["descriptionde"]="Hostnamen des Rechners, auf dem Ihr Conserver-Server installiert ist:
 Der Conserver-Hostname ist der Hostname des Rechners, auf dem das conserver-server-Paket installiert ist. Der Client »console« wird, wenn nichts anderes angegeben ist, den Hostnamen »console« verwenden. Der Servername kann zur Programmlaufzeit mit der Option -M geändert werden.
";
$elem["conserver-client/server"]["descriptionfr"]="Nom de l'hôte où est installé le serveur « conserver » :
 Veuillez indiquer le nom de l'hôte où est installé le paquet conserver-server. Le client, « console », utilisera le nom d'hôte « console » si ce champ est laissé vide. Le nom du serveur peut être modifié en lançant l'exécution avec l'option -M.
";
$elem["conserver-client/server"]["default"]="localhost";
$elem["conserver-client/port"]["type"]="string";
$elem["conserver-client/port"]["description"]="The server port number to connect to:
 Set the conserver server port to connect to. This may be either a port
 number or a service name.
";
$elem["conserver-client/port"]["descriptionde"]="Server-Port, mit dem verbunden werden soll:
 Setzt den Conserver-Server-Port, mit den verbunden werden soll. Dies kann entweder eine Portnummer oder ein Servicename sein.
";
$elem["conserver-client/port"]["descriptionfr"]="Numéro du port de connexion sur le serveur :
 Veuillez choisir le port où le serveur est à l'écoute. Vous pouvez indiquer un numéro de port ou un nom de service.
";
$elem["conserver-client/port"]["default"]="3109";
PKG_OptionPageTail2($elem);
?>
