<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tipcutils");

$elem["tipcutils/configure"]["type"]="boolean";
$elem["tipcutils/configure"]["description"]="Should this TIPC node be configured automatically now?
 If you do not choose this option, you can edit '/etc/default/tipc' or use
 the command line tool 'tipc-config'.
";
$elem["tipcutils/configure"]["descriptionde"]="Soll dieser TIPC-Knoten jetzt automatisch konfiguriert werden?
 Falls Sie diese Option nicht wählen, können Sie »/etc/default/tipc« bearbeiten oder das Kommandozeilen-Werkzeug »tipc-config« verwenden.
";
$elem["tipcutils/configure"]["descriptionfr"]="Faut-il automatiquement configurer ce nœud TIPC maintenant ?
 Si vous ne choisissez pas cette option, vous pourrez modifier /etc/default/tipc ou utiliser l'outil en ligne de commande « tipc-config ».
";
$elem["tipcutils/configure"]["default"]="true";
$elem["tipcutils/address"]["type"]="string";
$elem["tipcutils/address"]["description"]="TIPC address of this node:
 Please enter the TIPC address of this node, in Z.C.N (Zone.Cluster.Node)
 notation.
 .
 Each node in a network should have a unique address.
";
$elem["tipcutils/address"]["descriptionde"]="TIPC-Adresse dieses Knotens:
 Bitte geben Sie die TIPC-Adresse dieses Knotens in der Z.C.K (Zone.Cluster.Knoten)-Notation an.
 .
 Jeder Knoten in einem Netz sollte eine eindeutige Adresse haben.
";
$elem["tipcutils/address"]["descriptionfr"]="Adresse TIPC de ce nœud :
 Veuillez indiquer l'adresse TIPC de ce nœud, en notation Z.C.N (« Zone.Cluster.Node » : Zone.Grappe.Nœud).
 .
 Chaque nœud d'un réseau doit utiliser une adresse unique.
";
$elem["tipcutils/address"]["default"]="1.1.1";
$elem["tipcutils/netid"]["type"]="string";
$elem["tipcutils/netid"]["description"]="Network ID of the TIPC network to join:
 The default setting should be appropriate when there is only
 one local TIPC network.
";
$elem["tipcutils/netid"]["descriptionde"]="Netz-ID des TIPC-Netzes, dem beigetreten werden soll:
 Die Vorgabeeinstellung sollte geeignet sein, wenn es nur ein lokales TIPC-Netz gibt.
";
$elem["tipcutils/netid"]["descriptionfr"]="Identifiant réseau (« Network ID ») du réseau TIPC à rejoindre :
 Le paramètre par défaut devrait convenir si vous n'utilisez qu'un réseau TIPC local.
";
$elem["tipcutils/netid"]["default"]="4711";
$elem["tipcutils/remote_management"]["type"]="boolean";
$elem["tipcutils/remote_management"]["description"]="Enable TIPC remote management?
 Please choose this option if you are sure that network
 management should be enabled for this node.
";
$elem["tipcutils/remote_management"]["descriptionde"]="TIPC-Fernwartung aktivieren?
 Bitte wählen Sie diese Option, falls Sie sicher sind, dass für diesen Knoten die Netzwartung aktiviert werden soll.
";
$elem["tipcutils/remote_management"]["descriptionfr"]="Faut-il activer la gestion à distance de TIPC ?
 Ne choisissez cette option que si vous êtes sûr que la gestion par le réseau doit être activée pour ce nœud.
";
$elem["tipcutils/remote_management"]["default"]="false";
$elem["tipcutils/default_ndd"]["type"]="string";
$elem["tipcutils/default_ndd"]["description"]="Default neighbor detection domain for this TIPC node:
 This setting will define the neighbor detection domain (NDD) if there is
 no setting for a specific bearer.
 .
 Setting the NDD for a specific bearer is not yet possible in
 this package version.
";
$elem["tipcutils/default_ndd"]["descriptionde"]="Die Standard-»Neighbour Detection Domain« für diesen TIPC-Knoten:
 Diese Einstellung definiert die »Neighbour Detection Domain« (NDD) falls es keine Einstellung für einen speziellen Inhaber gibt.
 .
 In dieser Version des Pakets ist es noch nicht möglich, einen NDD für einen speziellen Inhaber zu setzen.
";
$elem["tipcutils/default_ndd"]["descriptionfr"]="Domaine par défaut pour la détection de voisins par ce nœud TIPC :
 Ce paramètre définira le domaine de détection de voisins (NDD : « Neighbour Detection Domain ») à utiliser dans le cas où aucun domaine spécifique n'est défini.
 .
 Configurer un NDD pour chacun des supports n'est pas encore possible dans cette version du paquet.
";
$elem["tipcutils/default_ndd"]["default"]="0.0.0";
$elem["tipcutils/interfaces"]["type"]="string";
$elem["tipcutils/interfaces"]["description"]="Interfaces to use for TIPC:
 Please enter a space-separated list of interfaces to be used for TIPC.
";
$elem["tipcutils/interfaces"]["descriptionde"]="Schnittstellen, die für TIPC verwendet werden sollen:
 Bitte geben Sie eine Liste von Schnittstellen (durch Leerzeichen getrennt) ein, die für TIPC verwenden werden sollen.
";
$elem["tipcutils/interfaces"]["descriptionfr"]="Interfaces à utiliser par TIPC :
 Veuillez indiquer, séparées par des espaces, les interfaces qui seront utilisées par TIPC.
";
$elem["tipcutils/interfaces"]["default"]="eth0";
$elem["tipcutils/script_verbosity"]["type"]="string";
$elem["tipcutils/script_verbosity"]["description"]="Verbosity to use for TIPC scripts:
 This setting defines the verbosity of the TIPC init, if-up and if-down
 scripts.
";
$elem["tipcutils/script_verbosity"]["descriptionde"]="Die Ausgabe-Ausführlichkeit, die für TIPC-Skripte verwendet werden soll:
 Diese Einstellung definiert die Ausgabe-Ausführlichkeit für die Skripte init, if-up und if-down von TIPC.
";
$elem["tipcutils/script_verbosity"]["descriptionfr"]="Niveau de détail à utiliser dans les scripts TIPC :
 Ce choix définit le nombre d'informations affichées par les scripts de démarrage, de lancement du réseau (if-up) et d'arrêt du réseau (if-down).
";
$elem["tipcutils/script_verbosity"]["default"]="0";
PKG_OptionPageTail2($elem);
?>
