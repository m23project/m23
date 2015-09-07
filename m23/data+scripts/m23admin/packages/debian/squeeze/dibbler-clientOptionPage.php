<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dibbler-client");

$elem["dibbler-client/title"]["type"]="title";
$elem["dibbler-client/title"]["description"]="dibbler-client: DHCPv6 client
";
$elem["dibbler-client/title"]["descriptionde"]="DHCPv6-Client
";
$elem["dibbler-client/title"]["descriptionfr"]="client DHCPv6
";
$elem["dibbler-client/title"]["default"]="";
$elem["dibbler-client/start"]["type"]="boolean";
$elem["dibbler-client/start"]["description"]="Should the Dibbler client be launched when the system starts?
 The Dibbler client can be configured to be launched when the system
 is started. If you choose this option, this host will have a correct
 IPv6 setup after booting. Please ensure that a DHCPv6 server is
 available on the network.
";
$elem["dibbler-client/start"]["descriptionde"]="Soll beim Systemstart auch der Dibbler-Client starten?
 Der Dibbler-Client kann so konfiguriert werden, dass er beim Systemstart auch startet. Falls Sie diese Option wählen, verfügt Ihr Rechner nach dem Booten über ein korrekt konfiguriertes IPv6. Stellen Sie bitte sicher, dass in Ihrem Netz ein DHCPv6-Server verfügbar ist.
";
$elem["dibbler-client/start"]["descriptionfr"]="Faut-il lancer automatiquement le client Dibbler au démarrage du système ?
 Le client Dibbler peut être configuré pour être lancé automatiquement au démarrage du système. Si vous choisissez cette option, IPv6 sera configuré correctement sur votre hôte au démarrage. Assurez-vous qu'un serveur DHCPv6 soit disponible sur votre réseau.
";
$elem["dibbler-client/start"]["default"]="true";
$elem["dibbler-client/interfaces"]["type"]="string";
$elem["dibbler-client/interfaces"]["description"]="Interfaces to be configured:
 Dibbler can configure any or all of a computer's network interfaces.
 .
 More than one interface may be specified by separating the interface names
 with spaces.
";
$elem["dibbler-client/interfaces"]["descriptionde"]="Schnittstellen, die konfiguriert werden sollen:
 Dibbler kann beliebige (auch alle) Netzschnittstellen Ihres Rechners konfigurieren.
 .
 Mehr als eine Schnittstelle kann angegeben werden, indem die Schnittstellennamen durch Leerzeichen getrennt werden.
";
$elem["dibbler-client/interfaces"]["descriptionfr"]="Interfaces à configurer :
 Dibbler peut configurer une interface particulière ou l'ensemble des interfaces réseau d'un ordinateur.
 .
 Vous pouvez indiquer plusieurs interfaces en séparant leurs noms par des espaces.
";
$elem["dibbler-client/interfaces"]["default"]="eth0";
$elem["dibbler-client/options"]["type"]="multiselect";
$elem["dibbler-client/options"]["choices"][1]="dns";
$elem["dibbler-client/options"]["choicesde"][1]="DNS";
$elem["dibbler-client/options"]["choicesfr"][1]="dns";
$elem["dibbler-client/options"]["description"]="Additional parameters to obtain:
 The Dibbler client can request that the DHCPv6 server supplies additional
 configuration parameters.
";
$elem["dibbler-client/options"]["descriptionde"]="Zusätzlichen Parameter die abgefragt werden sollen:
 Der Dibbler-Client kann den DHCPv6-Server bitten, zusätzliche Konfigurationsparameter bereitzustellen.
";
$elem["dibbler-client/options"]["descriptionfr"]="Paramètres supplémentaires à obtenir :
 Le client Dibbler peut demander au serveur DHCPv6 de fournir des paramètres de configuration supplémentaires.
";
$elem["dibbler-client/options"]["default"]="dns";
PKG_OptionPageTail2($elem);
?>
