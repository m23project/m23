<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("atftpd");

$elem["atftpd/use_inetd"]["type"]="boolean";
$elem["atftpd/use_inetd"]["description"]="Should the server be started by inetd?
 atftpd can be started by the inetd superserver or as a daemon and handle
 incoming connections by itself. The latter is only recommend for very high
 usage server.
";
$elem["atftpd/use_inetd"]["descriptionde"]="Soll der Server von inetd gestartet werden?
 atftpd kann durch den Hauptserver inetd oder als Daemon gestartet werden, um so selbst externe Verbindungsaufnahmen zu verwalten. Letzteres ist nur bei sehr stark genutzten Servern empfehlenswert.
";
$elem["atftpd/use_inetd"]["descriptionfr"]="Faut-il démarrer le serveur via inetd ?
 Atftpd peut être démarré par le super-serveur inetd ou en serveur indépendant pour qu'il gère lui-même les connexions entrantes. Ce dernier mode n'est recommandé que pour les serveurs fortement sollicités.
";
$elem["atftpd/use_inetd"]["default"]="true";
$elem["atftpd/tftpd-timeout"]["type"]="string";
$elem["atftpd/tftpd-timeout"]["description"]="Server timeout:
 How many seconds the main thread waits before exiting.
";
$elem["atftpd/tftpd-timeout"]["descriptionde"]="Server-Limit für Zeitüberschreitung (engl. »server timeout«).
 Die Zeit in Sekunden, die der Haupt-Thread vor einem Abbruch abwartet.
";
$elem["atftpd/tftpd-timeout"]["descriptionfr"]="Délai d'attente (« timeout ») du serveur :
 Veuillez indiquer le nombre de secondes pendant lesquelles la connexion principale doit être maintenue avant d'être interrompue.
";
$elem["atftpd/tftpd-timeout"]["default"]="300";
$elem["atftpd/retry-timeout"]["type"]="string";
$elem["atftpd/retry-timeout"]["description"]="Retry timeout:
 How many seconds to wait for a reply before retransmitting a packet.
";
$elem["atftpd/retry-timeout"]["descriptionde"]="Server-Limit für Zeitüberschreitung bei neuerlichem Versuch (engl. »Retry timeout«).
 Die Zeit in Sekunden, die der Server verstreichen lässt, bevor das zuletzt gesendete Paket erneut übertragen wird.
";
$elem["atftpd/retry-timeout"]["descriptionfr"]="Délai de relance (« retry timeout ») :
 Veuillez indiquer le délai d'attente d'une réponse, en secondes, avant la retransmission d'un paquet.
";
$elem["atftpd/retry-timeout"]["default"]="5";
$elem["atftpd/maxthread"]["type"]="string";
$elem["atftpd/maxthread"]["description"]="Maximum number of threads:
 Maximum number of concurrent threads that can be running.
";
$elem["atftpd/maxthread"]["descriptionde"]="Maximale Thread-Anzahl:
 Die maximale Anzahl gleichzeitig laufender Threads.
";
$elem["atftpd/maxthread"]["descriptionfr"]="Nombre maximal de connexions :
 Veuillez indiquer le nombre maximal de connexions simultanées.
";
$elem["atftpd/maxthread"]["default"]="100";
$elem["atftpd/verbosity"]["type"]="select";
$elem["atftpd/verbosity"]["choices"][1]="7 (LOG_DEBUG)";
$elem["atftpd/verbosity"]["choices"][2]="6 (LOG_INFO)";
$elem["atftpd/verbosity"]["choices"][3]="5 (LOG_NOTICE)";
$elem["atftpd/verbosity"]["choices"][4]="4 (LOG_WARNING)";
$elem["atftpd/verbosity"]["description"]="Verbosity level:
 Level of logging. 7 logs everything including debug logs. 1 will log only
 the system critical logs. 5 (LOG_NOTICE) is the default value.
";
$elem["atftpd/verbosity"]["descriptionde"]="Niveau der Redseligkeit:
 Intensität des Protokollierens. 7 protokolliert alles inklusive der »debug«-Meldungen. 1 protokolliert lediglich die systemkritischen Meldungen. 5 (LOG_NOTICE) ist der Standardwert.
";
$elem["atftpd/verbosity"]["descriptionfr"]="Niveau de détail souhaité :
 Veuillez choisir le niveau de détail pour les informations enregistrées dans les journaux. « 7 » enregistre des informations de débogage. « 1 » n'enregistre que les informations critiques. La valeur par défaut est « 5 » (LOG_NOTICE).
";
$elem["atftpd/verbosity"]["default"]="5 (LOG_NOTICE)";
$elem["atftpd/timeout"]["type"]="boolean";
$elem["atftpd/timeout"]["description"]="Enable 'timeout' support?
";
$elem["atftpd/timeout"]["descriptionde"]="Aktivieren der Zeitüberschreitungs-Unterstützung (engl. »timeout«)?
";
$elem["atftpd/timeout"]["descriptionfr"]="Faut-il activer la gestion de l'option TFTP « timeout » ?
";
$elem["atftpd/timeout"]["default"]="true";
$elem["atftpd/tsize"]["type"]="boolean";
$elem["atftpd/tsize"]["description"]="Enable 'tsize' support?
";
$elem["atftpd/tsize"]["descriptionde"]="Aktivieren der »tsize«-Unterstützung?
";
$elem["atftpd/tsize"]["descriptionfr"]="Faut-il activer la gestion de l'option TFTP « tsize » ?
";
$elem["atftpd/tsize"]["default"]="true";
$elem["atftpd/blksize"]["type"]="boolean";
$elem["atftpd/blksize"]["description"]="Enable 'block size' support?
";
$elem["atftpd/blksize"]["descriptionde"]="Aktivieren der »block size«-Unterstützung?
";
$elem["atftpd/blksize"]["descriptionfr"]="Faut-il activer la gestion de l'option TFTP « block size » ?
";
$elem["atftpd/blksize"]["default"]="true";
$elem["atftpd/multicast"]["type"]="boolean";
$elem["atftpd/multicast"]["description"]="Enable multicast support?
";
$elem["atftpd/multicast"]["descriptionde"]="Multicast-Unterstützung aktivieren?
";
$elem["atftpd/multicast"]["descriptionfr"]="Faut-il activer la gestion de la multidiffusion (« multicast ») ?
";
$elem["atftpd/multicast"]["default"]="true";
$elem["atftpd/ttl"]["type"]="string";
$elem["atftpd/ttl"]["description"]="TTL for multicast packets:
";
$elem["atftpd/ttl"]["descriptionde"]="TTL für Multicast-Pakete:
";
$elem["atftpd/ttl"]["descriptionfr"]="TTL pour les paquets multicast :
";
$elem["atftpd/ttl"]["default"]="1";
$elem["atftpd/port"]["type"]="string";
$elem["atftpd/port"]["description"]="Port to listen for tftp request:
";
$elem["atftpd/port"]["descriptionde"]="Port, der für tftp-Anfragen überwacht werden soll:
";
$elem["atftpd/port"]["descriptionfr"]="Port d'écoute pour les requêtes tftp :
";
$elem["atftpd/port"]["default"]="69";
$elem["atftpd/mcast_port"]["type"]="string";
$elem["atftpd/mcast_port"]["description"]="Port range for multicast file transfer:
 Multicast transfer will use any available port in a given set. For
 example, \"2000-2003, 3000\" allow atftpd to use port 2000 to 2003 and 3000.
";
$elem["atftpd/mcast_port"]["descriptionde"]="Portbereich für Multicast-Dateiübertragungen:
 Multicast-Transfers werden jeden verfügbaren Port aus der angegebenen Auswahl verwenden. Die Angabe »2000-2003, 3000« erlaubt atftpd beispielsweise, die Ports 2000 bis 2003 sowie 3000 zu benutzen.
";
$elem["atftpd/mcast_port"]["descriptionfr"]="Intervalle de ports pour le transfert de fichiers en multidiffusion :
 Le transfert de fichiers en multidiffusion (« multicast ») utilisera tout port disponible d'un ensemble donné. Par exemple, « 2000-2003, 3000 » permet à atftpd d'utiliser les ports 2000 à 2003 et 3000.
";
$elem["atftpd/mcast_port"]["default"]="1758";
$elem["atftpd/mcast_addr"]["type"]="string";
$elem["atftpd/mcast_addr"]["description"]="Address range for multicast transfer:
 Multicast transfer will use any available addresses from a given set of
 addresses. Syntax is \"a.b.c.d-d,a.b.c.d,...\"
";
$elem["atftpd/mcast_addr"]["descriptionde"]="Adressbereich für den Multicast-Transfer:
 Multicast-Transfers werden jede verfügbare Adresse aus der angegebenen Auswahl verwenden. Die Syntax lautet »a.b.c.d-d,a.b.c.d,...«
";
$elem["atftpd/mcast_addr"]["descriptionfr"]="Intervalle d'adresses pour le transfert en multidiffusion :
 Le transfert en multidiffusion va utiliser n'importe quelle adresse disponible d'un ensemble donné. La syntaxe est « a.b.c.d-d,a.b.c.d,... ».
";
$elem["atftpd/mcast_addr"]["default"]="239.239.239.0-255";
$elem["atftpd/logtofile"]["type"]="boolean";
$elem["atftpd/logtofile"]["description"]="Log to file instead of syslog?
 If your server does intensive tftp file serving, it is a good idea to 
 accept here. That will avoid cluttering your syslog with tftpd logs.
";
$elem["atftpd/logtofile"]["descriptionde"]="In eine Datei anstatt über syslog protokollieren?
 Falls Ihr Server viel bzw. oft Dateien mittels tftp bereitstellt, ist es eine gute Idee, hier zuzustimmen. Dadurch wird Ihr syslog nicht mit tftp-Meldungen überladen.
";
$elem["atftpd/logtofile"]["descriptionfr"]="Faut-il enregistrer les messages dans un fichier à la place de syslog ?
 Si votre serveur est utilisé intensivement comme serveur tftp, il est conseillé de choisir cette option. Ceci évitera d'encombrer le journal syslog avec les journaux tftpd.
";
$elem["atftpd/logtofile"]["default"]="false";
$elem["atftpd/logfile"]["type"]="string";
$elem["atftpd/logfile"]["description"]="Log file:
 A file where atftpd will write its logs. This file will be made writable for
 the user 'nobody' and group 'nogroup'.
";
$elem["atftpd/logfile"]["descriptionde"]="Logdatei:
 Eine Datei, in die atftpd seine Log-Meldungen schreibt. Diese Datei wird für den Benutzer »nobody« und die Gruppe »nogroup« mit Schreibzugriff versehen werden.
";
$elem["atftpd/logfile"]["descriptionfr"]="Fichier journal :
 Veuillez indiquer le fichier dans lequel les informations seront enregistrées. Ce fichier sera modifiable par l'utilisateur « nobody » et le groupe « nogroup ».
";
$elem["atftpd/logfile"]["default"]="/var/log/atftpd.log";
$elem["atftpd/basedir"]["type"]="string";
$elem["atftpd/basedir"]["description"]="Base directory:
 The directory tree from where atftpd can serve files. That directory must
 be world readable.
";
$elem["atftpd/basedir"]["descriptionde"]="Basisverzeichnis:
 Der Verzeichnisbaum, aus dem atftpd Dateien zur Verfügung stellen kann. Dieses Verzeichnis muss für alle Benutzer lesbar sein.
";
$elem["atftpd/basedir"]["descriptionfr"]="Répertoire racine :
 Veuillez indiquer le répertoire à partir duquel atftpd sert les fichiers. Ce répertoire doit pouvoir être lu par tous.
";
$elem["atftpd/basedir"]["default"]="/var/lib/tftpboot";
PKG_OptionPageTail2($elem);
?>
