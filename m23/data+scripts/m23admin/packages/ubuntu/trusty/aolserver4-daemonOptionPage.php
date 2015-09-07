<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aolserver4-daemon");

$elem["aolserver4/hostname"]["type"]="string";
$elem["aolserver4/hostname"]["description"]="Server hostname:
 AOLserver needs a hostname to use for redirect page URLs and for
 identifying itself.
 .
 It is generally the fully-qualified DNS hostname of the computer, or
 localhost if it is not networked. Any name valid for a URL string can
 be used.
";
$elem["aolserver4/hostname"]["descriptionde"]="Server-Hostname:
 Der AOL-Server benötigt einen Hostnamen, um Seiten-URLs umzuleiten und zurSelbstidentifikation.
 .
 Im Allgemeinen ist dies der voll-qualifizierte DNS-Hostname des Rechners oder »localhost«, falls er nicht vernetzt ist. Es kann irgendeinen Name verwendet werden, der auch eine gültige URL-Zeichenkette ist.
";
$elem["aolserver4/hostname"]["descriptionfr"]="Nom d'hôte du serveur :
 AOLserver utilise le nom d'hôte pour la redirection des URL de pages ainsi que pour s'identifier lui-même.
 .
 Il s'agit en général du nom DNS complètement qualifié de la machine, ou « localhost », si celle-ci n'est pas reliée au réseau. Tout nom pouvant servir de base à la construction d'une URL valide peut être utilisé.
";
$elem["aolserver4/hostname"]["default"]="localhost";
$elem["aolserver4/address"]["type"]="string";
$elem["aolserver4/address"]["description"]="Server IP address:
 AOLserver needs an IP address to listen to.
 .
 The default is the address of the loopback interface. If the server
 is to be remotely accessible this should be replaced by the address
 of the appropriate network interface.
";
$elem["aolserver4/address"]["descriptionde"]="Server-IP-Adresse:
 AOL-Server benötigt eine IP-Adresse, auf der Anfragen erwartet werden sollen.
 .
 Standardmäßig wird die Adresse der Loopback-Schnittstelle benutzt. Falls der Server über das Netzwerk erreichbar sein soll, sollte diese durch die dazugehörige Adresse der Netz-Schnittstelle ersetzt werden.
";
$elem["aolserver4/address"]["descriptionfr"]="Adresse IP du serveur :
 AOLserver a besoin d'une adresse IP sur laquelle il sera à l'écoute.
 .
 L'adresse par défaut est l'adresse de bouclage (« loopback »). Si le serveur est destiné à être accessible à distance, il est nécessaire de remplacer cette adresse par l'adresse de l'interface réseau concernée.
";
$elem["aolserver4/address"]["default"]="127.0.0.1";
$elem["aolserver4/port"]["type"]="string";
$elem["aolserver4/port"]["description"]="Server TCP port:
 AOLserver needs a port number assigned for its use. This is almost always
 port 80 (the standard HTTP port), but might be different if another
 web server is installed, or some other service is listening on
 that port.
";
$elem["aolserver4/port"]["descriptionde"]="Server-TCP-Port:
 AOL-Server benötigt einen Port um zu funktionieren. Dies ist fast immer Port 80 (der Standard HTTP-Port), es kann aber bei der Verwendung eines weiteren Webservers oder falls ein anderer Dienst diesen Port nutzt auch ein anderer Port sein.
";
$elem["aolserver4/port"]["descriptionfr"]="Port TCP du serveur :
 AOLserver a besoin d'un numéro de port d'écoute pour son fonctionnement. Ce numéro sera presque toujours 80 (le port standard HTTP) mais peut être différent si vous avez installé un autre serveur WWW ou si un autre service est à l'écoute sur ce port.
";
$elem["aolserver4/port"]["default"]="80";
PKG_OptionPageTail2($elem);
?>
