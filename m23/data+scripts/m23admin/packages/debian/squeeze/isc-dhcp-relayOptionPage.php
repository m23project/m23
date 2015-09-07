<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isc-dhcp-relay");

$elem["isc-dhcp-relay/servers"]["type"]="string";
$elem["isc-dhcp-relay/servers"]["description"]="Servers the DHCP relay should forward requests to:
 Please enter the hostname or IP address of at least one DHCP server
 to which DHCP and BOOTP requests should be relayed.
 .
 You can specify multiple server names or IP addresses (in a
 space-separated list).
";
$elem["isc-dhcp-relay/servers"]["descriptionde"]="DHCP-Server, zu denen der DHCP-Relay die Anfragen weiterleiten soll:
 Bitte geben Sie den Rechnernamen oder die IP-Adresse mindestens eines DHCP-Servers ein, zu dem die DHCP- und BOOTP-Anfragen weitergeleitet werden sollen.
 .
 Sie können mehrere Servernamen oder IP-Adressen (durch Leerzeichen getrennt) eingeben.
";
$elem["isc-dhcp-relay/servers"]["descriptionfr"]="Serveurs DHCP auxquels faire suivre les requêtes de relais DHCP :
 Veuillez indiquer le nom ou l'adresse IP d'au moins un serveur DHCP auquel faire suivre les requêtes DHCP et BOOTP.
 .
 Vous pouvez indiquer plus d'un serveur. Séparez les noms (ou les adresses IP) des serveurs par un espace.
";
$elem["isc-dhcp-relay/servers"]["default"]="";
$elem["isc-dhcp-relay/interfaces"]["type"]="string";
$elem["isc-dhcp-relay/interfaces"]["description"]="Interfaces the DHCP relay should listen on:
 Please specify which network interface(s) the DHCP relay should
 attempt to configure. Multiple interface names should be entered as a
 space-separated list.
 .
 Leave this field blank to allow for automatic detection and
 configuration of network interfaces by the DHCP relay, in which case
 only broadcast interfaces will be used (if possible).
";
$elem["isc-dhcp-relay/interfaces"]["descriptionde"]="Netzwerkschnittstellen, an denen der DHCP-Relay auf Anfragen lauschen soll:
 Bitte geben Sie die Netzwerkschnittstelle(n) ein, die der DHCP-Relay versuchen soll einzustellen. Mehrere Schnittstellennamen sollten in einer Liste, durch Leerzeichen getrennt, eingegeben werden.
 .
 Geben Sie hier nichts ein, falls der DHCP-Relay die Netzwerkschnittstellen automatisch erkennen und einstellen soll. Dabei werden nur Broadcast-Schnittstellen benutzt (falls möglich).
";
$elem["isc-dhcp-relay/interfaces"]["descriptionfr"]="Interface où le relais DHCP sera à l'écoute :
 Veuillez indiquer, séparés par des espaces, les noms des interfaces réseau que le relais DHCP doit tenter de configurer. 
 .
 Laissez ce champ vide pour permettre la détection et la configuration automatique des interfaces réseaux par le relais DHCP ; dans ce cas, seules les interfaces permettant la diffusion (« broadcast ») seront utilisées.
";
$elem["isc-dhcp-relay/interfaces"]["default"]="";
$elem["isc-dhcp-relay/options"]["type"]="string";
$elem["isc-dhcp-relay/options"]["description"]="Additional options for the DHCP relay daemon:
 Please specify any additional options for the DHCP relay daemon.
 .
 For example: '-m replace' or '-a -D'.
";
$elem["isc-dhcp-relay/options"]["descriptionde"]="Zusätzliche Optionen für den DHCP-Relay-Dienst:
 Bitte geben Sie zusätzliche Optionen für den DHCP-Relay-Dienst ein.
 .
 Beispiel: »-m replace« oder »-a -D«.
";
$elem["isc-dhcp-relay/options"]["descriptionfr"]="Options supplémentaires pour le démon de relais DHCP :
 Vous pouvez ajouter des options supplémentaires pour le démon de relais DHCP.
 .
 Par exemple : « -m replace » ou « -a -D ».
";
$elem["isc-dhcp-relay/options"]["default"]="";
PKG_OptionPageTail2($elem);
?>
