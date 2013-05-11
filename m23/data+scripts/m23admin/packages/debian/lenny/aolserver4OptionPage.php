<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aolserver4");

$elem["aolserver4/introduction"]["type"]="note";
$elem["aolserver4/introduction"]["description"]=" Welcome to the AOLserver 4
 AOLserver is a multithreaded, Tcl-enabled, high-performance webserver.
 .
 This software is designed to run multiple domains on a single machine. Just one (main)
 will be setup right now. The configuration file in /etc/aolserver4
 and its init script can be modified for more complicated multi-site configurations.
";
$elem["aolserver4/introduction"]["descriptionde"]="Willkommen zum AOLserver 4
 AOLserver ist ein Tcl-aktivierter Hochleistungs-Webserver mit mehreren Threads.
 .
 Die Software ist entwickelt worden, um mehrere Domänen auf einer einzelnen Maschine zu betreiben. Es wird jetzt nur eine (Haupt-)Domäne eingerichtet. Die Konfigurationsdatei in /etc/aolserver4 und seine Init-Skripte können für kompliziertere Konfigurationen angepasst werden.
";
$elem["aolserver4/introduction"]["descriptionfr"]="Présentation de AOLserver 4
 AOLserver est un serveur web à performances élevées, basé sur des processus légers (« multithread ») et gérant Tcl.
 .
 Il est prévu pour gérer plusieurs domaines sur un seul serveur. Un seul domaine va être automatiquement configuré. Le fichier de configuration situé dans /etc/aolserver4 et le script de lancement peuvent être modifiés pour mettre en place des configurations plus complexes.
";
$elem["aolserver4/introduction"]["default"]="";
$elem["aolserver4/hostname"]["type"]="string";
$elem["aolserver4/hostname"]["description"]=" Server hostname:
 The server needs an hostname to be exposed on redirect pages URL and for
 informative purposes to identify itself.
 .
 It is generally the fully-qualified DNS hostname of the computer or
 localhost, if it is not networked. Any name which can be legally
 considered for a URL string can be used.
";
$elem["aolserver4/hostname"]["descriptionde"]="Server-Hostname:
 Der Server benötigt einen Hostnamen, der auf Umleitungs-Seiten-URL bekanntgegeben und für informative Zwecke zur Selbstidentifikation benötigt wird.
 .
 Im Allgemeinen ist dies der voll-qualifizierte DNS-Hostname des Rechners oder localhost, falls er nicht vernetzt ist. Es kann irgendeinen Name, der in einer URL-Zeichenkette in Ihrer Umgebung rechtlich in Betracht gezogen werden kann, verwendet werden.
";
$elem["aolserver4/hostname"]["descriptionfr"]="Nom d'hôte du serveur :
 Le serveur utilise le nom d'hôte pour la redirection des URL de pages ainsi que pour s'identifier lui-même.
 .
 Il s'agit en général du nom complètement qualifié de votre machine, ou « localhost », si vous n'êtes pas relié au réseau. Tout nom pouvant servir de base à la construction d'une URL valide dans votre environnement peut être utilisé.
";
$elem["aolserver4/hostname"]["default"]="localhost";
$elem["aolserver4/address"]["type"]="string";
$elem["aolserver4/address"]["description"]=" Server IP address number:
 The server needs at least an IP address to listen to.
 It is generally the primary Ethernet interface (or the loopback address,
 if the server will be used just locally).
 .
 The default address is the loopback one, which is not recommended
 for general (network or Internet) use.
";
$elem["aolserver4/address"]["descriptionde"]="Server-IP-Adresszahl:
 Der Server benötigt mindestens eine IP-Adresse, auf der er antworten soll. Im Allgemeinen ist es die primäre Ethernet-Schnittstelle (oder die Loopback-Adresse, falls der Server nur lokal verwendet wird).
 .
 Die Standardadresse ist die Loopback-Adresse, die für den allgemeinen Einsatz (im Netz oder Internet) nicht empfohlen wird.
";
$elem["aolserver4/address"]["descriptionfr"]="Adresse IP du serveur :
 Le serveur doit utiliser au moins une adresse IP, sur laquelle il sera à l'écoute. Le plus souvent, il s'agit de l'interface Ethernet principale (ou l'adresse de bouclage, « loopback », si vous n'utilisez le serveur que localement).
 .
 L'adresse par défaut est l'adresse de bouclage, ce qui est déconseillé pour une utilisation classique (réseau ou Internet).
";
$elem["aolserver4/address"]["default"]="127.0.0.1";
$elem["aolserver4/port"]["type"]="string";
$elem["aolserver4/port"]["description"]=" Server TCP port:
 AOLserver needs a port number assigned for its use. This is almost always
 port 80 (the standard HTTP port), but might be different if another
 web server is installed, or some other service is listening on
 that port.
 .
 It is recommended using the default.
 .
";
$elem["aolserver4/port"]["descriptionde"]="Server-TCP-Port:
 AOLserver benötigt einen Port um zu funktionieren. Dies ist fast immer Port 80 (der Standard HTTP-Port), es kann aber bei der Verwendung eines zweiten Webservers oder falls ein anderer Dienst auf diesem Port liegt auch ein anderer Port sein.
 .
 Es wird die Verwendung des Standardwertes empfohlen.
";
$elem["aolserver4/port"]["descriptionfr"]="Port TCP du serveur :
 AOLserver a besoin d'un numéro de port d'écoute pour son fonctionnement. Ce numéro sera presque toujours 80 (le port standard HTTP) mais peut être différent si vous avez installé un autre serveur WWW ou si un autre service est à l'écoute sur ce port.
 .
 Il est conseillé d'utiliser la valeur par défaut.
";
$elem["aolserver4/port"]["default"]="80";
PKG_OptionPageTail2($elem);
?>
