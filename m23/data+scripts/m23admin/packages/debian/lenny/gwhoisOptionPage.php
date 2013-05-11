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
$elem["gwhois/inetd"]["descriptionde"]="gwhois als whois-Proxy installieren?
 Whenn gwhois als whois-Proxy (mit inetd) betrieben wird, können Abfragen mit einem normalen whois-Client über den normalen whois-Port (43) vorgenommen werden.
 .
 Dies könnte interessant sein, um einen zentralen whois-Server für Ihre Firma oder Kollegen bereitzustellen. Diese können einen normalen whois-Client (z.B. für Windows) verwenden und dennoch die intelligenten Funktionen von gwhois nutzen.
";
$elem["gwhois/inetd"]["descriptionfr"]="Faut-il installer gwhois en tant que serveur whois mandataire ?
 Si gwhois est installé en tant que serveur whois mandataire (via inetd), il écoutera sur le port habituellement dédié à whois (43), et répondra aux requêtes des clients whois standard.
 .
 Cela peut servir par exemple à mettre en place un serveur whois générique pour votre entreprise, ou vos collègues, qui pourront utiliser tout client standard (p. ex. un client fonctionnant sous Windows), tout en bénéficiant des fonctionnalités avancées de gwhois.
";
$elem["gwhois/inetd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
