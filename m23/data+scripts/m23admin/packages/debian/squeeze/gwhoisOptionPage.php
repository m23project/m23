<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gwhois");

$elem["gwhois/inetd"]["type"]="boolean";
$elem["gwhois/inetd"]["description"]="Install gwhois as a whois proxy server?
 If gwhois is installed as a whois proxy server (using inetd) it
 will listen on the standard whois port (43) allowing normal
 whois clients to query it.
 .
 This can be interesting for example if you want to setup a generic whois
 server for your company or coworkers which can then use their standard
 whois-client (e.g. a windows client) and still make use of the intelligent
 features of gwhois.
";
$elem["gwhois/inetd"]["descriptionde"]="Gwhois als whois-Proxy installieren?
 Wenn Gwhois als whois-Proxy (mit inetd) betrieben wird, können Abfragen mit einem normalen whois-Client über den normalen whois-Port (43) vorgenommen werden.
 .
 Dies könnte interessant sein, um einen zentralen whois-Server für Ihre Firma oder Kollegen bereitzustellen. Diese können einen normalen whois-Client (z.B. für Windows) verwenden und dennoch die intelligenten Funktionen von Gwhois nutzen.
";
$elem["gwhois/inetd"]["descriptionfr"]="Faut-il installer gwhois en tant que serveur whois mandataire ?
 Si gwhois est installé, via inetd, en tant que serveur whois mandataire (« proxy »), il écoutera sur le port 43, habituellement dédié à whois, et répondra aux requêtes des clients whois standard.
 .
 Cela peut servir par exemple à mettre en place un serveur whois générique pour une entreprise ou un groupe de travail, qui pourront utiliser tout client standard (p. ex. un client fonctionnant sous Windows), tout en bénéficiant des fonctionnalités avancées de gwhois.
";
$elem["gwhois/inetd"]["default"]="false";
$elem["gwhois/noinetd"]["type"]="error";
$elem["gwhois/noinetd"]["description"]="Inetd or compatible replacement not installed.
 You configured gwhois to act as a whois proxy server. This
 requires inetd or a compatible replacement (in particular the
 'update-inetd' binary) which was not found.
 .
 Please install a package providing inet-superserver and
 reconfigure gwhois or disable proxy operation.
";
$elem["gwhois/noinetd"]["descriptionde"]="Inetd oder Kompatibilitätsersatz nicht installiert.
 Sie haben Gwhois konfiguriert, um als Proxy-Server zu agieren. Dies benötigt inetd oder einen kompatiblen Ersatz (inbesondere das Programm »update-inetd«), der aber nicht gefunden werden konnte.
 .
 Bitte installieren Sie ein Paket, das inet-superserver bereitstellt und konfigurieren Sie Gwhois neu oder deaktivieren Sie den Proxy-Betrieb.
";
$elem["gwhois/noinetd"]["descriptionfr"]="Inetd ou alternative compatible non installé
 Le service gwhois a été configuré en tant que serveur whois mandataire. Cela nécessite la présence d'inetd ou d'une alternative compatible (en particulier le binaire « update-inetd ») qui n'a pas été trouvé.
 .
 Veuillez installer un paquet fournissant inet-superserver et configurer à nouveau gwhois, ou désactiver la fonctionnalité de serveur mandataire.
";
$elem["gwhois/noinetd"]["default"]="";
PKG_OptionPageTail2($elem);
?>
