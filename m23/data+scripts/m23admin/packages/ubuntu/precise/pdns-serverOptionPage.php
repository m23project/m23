<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pdns-server");

$elem["pdns-server/localaddress"]["type"]="string";
$elem["pdns-server/localaddress"]["description"]="IP address where PowerDNS should listen on:
 If you have multiple IPs, the default behaviour of binding to all addresses
 can cause the OS to select the wrong IP for outgoing packets, so it is
 recommended to bind PowerDNS to a specific IP here.
";
$elem["pdns-server/localaddress"]["descriptionde"]="IP-Adresse, an der PowerDNS Anfragen entgegen nimmt.
 Falls sie mehrere IP-Adressen haben, bindet sich PowerDNS standardmäßig an alle Adressen. Möglicherweise wählt das Betriebssystem dadurch aber die falsche Adresse für ausgehende Datenpakete aus. Es wird empfohlen, die IP-Adresse hier explizit anzugeben.
";
$elem["pdns-server/localaddress"]["descriptionfr"]="Adresse IP où PowerDNS doit être à l'écoute :
 Si vous utilisez plusieurs adresses IP, le comportement par défaut est d'écouter sur chacune d'entre-elles, ce qui peut conduire le système d'exploitation à choisir la mauvaise adresse IP pour les paquets sortants. Il est donc recommandé d'associer PowerDNS à une adresse IP spécifique.
";
$elem["pdns-server/localaddress"]["default"]="";
$elem["pdns-server/autostart"]["type"]="boolean";
$elem["pdns-server/autostart"]["description"]="Do you want to start the PowerDNS server automatically?
 If you accept here, an initscript will be used to automatically start the
 PowerDNS authoritative nameserver.
";
$elem["pdns-server/autostart"]["descriptionde"]="Soll der PowerDNS-Server automatisch gestartet werden?
 Wenn Sie hier \"OK\" auswählen, wird im Init-Skript der autoritative Nameserver automatisch mit gestartet.
";
$elem["pdns-server/autostart"]["descriptionfr"]="PowerDNS doit-il être démarré automatiquement ?
 Si vous choisissez cette option, PowerDNS sera lancé automatiquement au démarrage du système.
";
$elem["pdns-server/autostart"]["default"]="true";
$elem["pdns-server/allowrecursion"]["type"]="string";
$elem["pdns-server/allowrecursion"]["description"]="List of subnets that are allowed to recurse:
 Enter here, comma separated, the subnets that are allowed to recurse.
 Allowed values are 127.0.0.1 for an ip address and 192.168.0.0/24 for a
 subnet.
";
$elem["pdns-server/allowrecursion"]["descriptionde"]="Liste der Subnetze, die rekursive Anfragen stellen dürfen:
 Geben Sie hier - durch Kommas getrennt - die Subnetze an, die rekursive Anfragen stellen dürfen. Erlaubte Werte sind z.B. 127.0.0.1 für eine IP-Adresse oder 192.168.0.0/24 für ein Subnetz.
";
$elem["pdns-server/allowrecursion"]["descriptionfr"]="Liste des sous-réseaux pouvant être interrogés :
 Veuillez indiquer la liste des sous-réseaux, séparés par des virgules, qu'il est autorisé de parcourir. Des valeurs autorisées sont 127.0.0.1 pour une adresse IP et 192.168.0.0/24 pour un sous-réseau entier.
";
$elem["pdns-server/allowrecursion"]["default"]="127.0.0.1";
PKG_OptionPageTail2($elem);
?>
