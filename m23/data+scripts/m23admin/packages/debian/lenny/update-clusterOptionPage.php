<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("update-cluster");

$elem["update-cluster/read_nodes_number"]["type"]="string";
$elem["update-cluster/read_nodes_number"]["description"]="How many nodes do you have ?
 Enter 0 if you do not want to add anything here.
";
$elem["update-cluster/read_nodes_number"]["descriptionde"]="Wieviele Knoten haben Sie?
 Geben Sie 0 ein, wenn Sie nichts hinzufügen wollen.
";
$elem["update-cluster/read_nodes_number"]["descriptionfr"]="Combien de noeuds possédez-vous ?
 Saisissez « 0 » si vous ne souhaitez rien ajouter ici.
";
$elem["update-cluster/read_nodes_number"]["default"]="";
$elem["update-cluster/read_node_info"]["type"]="string";
$elem["update-cluster/read_node_info"]["description"]="Information for node ${node}.
 Enter information for node ${node} in the format shown below. This
 information will be passed to update-cluster-add to create cluster.xml.
 .
 Hostname       IP address      MAC address     notes
";
$elem["update-cluster/read_node_info"]["descriptionde"]="Informationen für Knoten ${node}
 Bitte geben Sie die Informationen für den Knoten ${node} im unten gezeigten Format an. Diese Daten werden an update-cluster-add weitergegeben, um die Datei cluster.xml zu erzeugen.
 .
 Rechnername     IP-Adresse      MAC-Adresse     Notizen
";
$elem["update-cluster/read_node_info"]["descriptionfr"]="Informations pour le noeud ${node}.
 Indiquez les informations pour le noeud ${node} dans le même format que celui affiché ci-dessous. Ces informations seront traitées par « update-cluster-add » afin de créer le fichier cluster.xml.
 .
 Nom de machine       adresse IP        adresse MAC        notes
";
$elem["update-cluster/read_node_info"]["default"]="";
PKG_OptionPageTail2($elem);
?>
