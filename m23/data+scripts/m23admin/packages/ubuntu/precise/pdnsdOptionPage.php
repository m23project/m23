<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pdnsd");

$elem["pdnsd/conf"]["type"]="select";
$elem["pdnsd/conf"]["choices"][1]="Use resolvconf";
$elem["pdnsd/conf"]["choices"][2]="Use root servers";
$elem["pdnsd/conf"]["choicesde"][1]="Resolvconf verwenden";
$elem["pdnsd/conf"]["choicesde"][2]="Root-Server verwenden";
$elem["pdnsd/conf"]["choicesfr"][1]="Utiliser resolvconf";
$elem["pdnsd/conf"]["choicesfr"][2]="Utiliser les serveurs racine";
$elem["pdnsd/conf"]["description"]="General type of pdnsd configuration:
 Please select the pdnsd configuration method that best meets your needs.
 .
  - Use resolvconf  : use informations provided by resolvconf.
  - Use root servers: make pdnsd behave like a caching, recursive DNS
                      server.
  - Manual          : completely manual configuration. The pdnsd daemon
                      will not start until you edit /etc/pdnsd.conf and
                      /etc/default/pdnsd.
 .
 Note: If you already use a DNS server that listens to 127.0.0.1:53,
 you have to choose \"Manual\".
";
$elem["pdnsd/conf"]["descriptionde"]="Allgemeine Art der pdnsd-Konfiguration:
 Bitte wählen Sie die pdnsd-Konfigurationsmethode aus, die Ihren Bedürfnissen am besten entspricht.
 .
  - Resolvconf verwenden : verwendet Informationen, die von Resolvconf
                           bereitgestellt werden.
  - Root-Server verwenden: pdnsd soll sich wie ein zwischenspeichernder
                           (caching), rekursiver DNS-Server verhalten.
  - Manuell              : komplett manuelle Konfiguration. Der pdnsd-Daemon
                           wird nicht starten, bis Sie /etc/pdnsd.conf und
                           /etc/default/pdnsd bearbeitet haben.
 .
 Hinweis: Falls Sie bereits einen DNS-Server verwenden, der unter 127.0.0.1:53 auf Anfragen wartet, wählen Sie »Manuell«.
";
$elem["pdnsd/conf"]["descriptionfr"]="Type de configuration pour pdnsd :
 Veuillez choisir la méthode de configuration de pdnsd qui est la plus adaptée à vos besoins :
 .
  - Utiliser resolvconf : utiliser les informations fournies par
                          le programme resolvconf ;  - Utiliser les serveurs racine :
                          configurer pdnsd en serveur DNS cache et
                          récursif ;
  - Manuelle            : configuration entièrement manuelle. Le
                          démon pdnsd ne démarrera pas tant que vous
                          n'aurez pas modifié les fichiers /etc/pdnsd.conf
                          et /etc/default/pdnsd.
 .
 Veuillez noter que si vous utilisez déjà un serveur DNS à l'écoute sur 127.0.0.1:53, vous devez choisir la configuration manuelle.
";
$elem["pdnsd/conf"]["default"]="Manual";
PKG_OptionPageTail2($elem);
?>
