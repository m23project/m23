<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kumofs");

$elem["kumofs/select_components"]["type"]="multiselect";
$elem["kumofs/select_components"]["choices"][1]="kumo-manager";
$elem["kumofs/select_components"]["choices"][2]="kumo-server";
$elem["kumofs/select_components"]["description"]="Kumofs components to run on this host:
 Please choose which components of kumofs should run on this host.
  * kumo-server stores data and replicates it into other servers;
  * kumo-manager monitors and balances the servers;
  * kumo-gateway relays requests from client applications.
";
$elem["kumofs/select_components"]["descriptionde"]="Komponenten von Kumofs, die auf diesem Server laufen sollen:
 Bitte wählen Sie die Komponenten von Kumofs, die auf diesem Rechner laufen sollen.
  * Kumo-server speichert die Daten und repliziert sie in andere Server;
  * Kumo-manager überwacht die Server und erledigt den Lastausgleich;
  * Kumo-gateway leitet Anfragen von Client-Anwendungen weiter.
";
$elem["kumofs/select_components"]["descriptionfr"]="Composants de kumofs à exécuter sur cet hôte :
 Veuillez choisir les composants de kumofs qui doivent être utilisés sur cet hôte.
  - kumo-server gère les données et les réplique sur les autres serveurs ;
  - kumo-manager surveille les serveurs et répartit la charge ;
  - kumo-gateway relaie les requêtes des applications clientes.
";
$elem["kumofs/select_components"]["default"]="";
$elem["kumofs/manager_options"]["type"]="string";
$elem["kumofs/manager_options"]["description"]="Command-line options for kumo-manager:
 Please specify the command-line options to use with kumo-manager.
 .
 The default value is well adapted for a single-node setup.
";
$elem["kumofs/manager_options"]["descriptionde"]="Befehlszeilenoptionen für Kumo-manager:
 Bitte legen Sie die Befehlszeilenoptionen fest, die mit Kumo-manager verwendet werden sollen.
 .
 Die Standardwerte sind gut an die Einrichtung eines einzelnen Rechners angepasst.
";
$elem["kumofs/manager_options"]["descriptionfr"]="Options de ligne de commande pour kumo-manager :
 Veuillez indiquer les options de ligne de commande à utiliser avec kumo-manager.
 .
 La valeur par défaut est bien adapté à un fonctionnement à un seul nœud.
";
$elem["kumofs/manager_options"]["default"]="-l localhost";
$elem["kumofs/server_options"]["type"]="string";
$elem["kumofs/server_options"]["description"]="Command-line options for kumo-server:
 Please specify the command-line options to use with kumo-server.
 .
 The default value is well adapted for a single-node setup.
";
$elem["kumofs/server_options"]["descriptionde"]="Befehlszeilenoptionen für Kumo-server:
 Bitte legen Sie die Befehlszeilenoptionen fest, die mit Kumo-server verwendet werden sollen.
 .
 Die Standardwerte sind gut an die Einrichtung eines einzelnen Rechners angepasst.
";
$elem["kumofs/server_options"]["descriptionfr"]="Options de ligne de commande pour kumo-server :
 Veuillez indiquer les options de ligne de commande à utiliser avec kumo-server.
 .
 La valeur par défaut est bien adapté à un fonctionnement à un seul nœud.
";
$elem["kumofs/server_options"]["default"]="-m localhost -l localhost -s /var/lib/kumofs/kumofs.tch";
$elem["kumofs/gateway_options"]["type"]="string";
$elem["kumofs/gateway_options"]["description"]="Command-line options for kumo-gateway:
 Please specify the command-line options to use with kumo-gateway.
 .
 The default value is well adapted for a single-node setup.
";
$elem["kumofs/gateway_options"]["descriptionde"]="Befehlszeilenoptionen für Kumo-gateway:
 Bitte legen Sie die Befehlszeilenoptionen fest, die mit Kumo-gateway verwendet werden sollen.
 .
 Die Standardwerte sind gut an die Einrichtung eines einzelnen Rechners angepasst.
";
$elem["kumofs/gateway_options"]["descriptionfr"]="Options de ligne de commande pour kumo-gateway :
 Veuillez indiquer les options de ligne de commande à utiliser avec kumo-gateway.
 .
 La valeur par défaut est bien adapté à un fonctionnement à un seul nœud.
";
$elem["kumofs/gateway_options"]["default"]="-m localhost -t 11211";
PKG_OptionPageTail2($elem);
?>
