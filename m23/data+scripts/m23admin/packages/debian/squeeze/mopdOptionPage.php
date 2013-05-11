<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mopd");

$elem["mopd/other_interface"]["type"]="string";
$elem["mopd/other_interface"]["description"]="Interface for mopd:
 Please enter the interface you would like to run mopd on.
";
$elem["mopd/other_interface"]["descriptionde"]="Schnittstelle für Mopd:
 Bitte geben Sie die Schnittstelle ein, an der Mopd laufen soll.
";
$elem["mopd/other_interface"]["descriptionfr"]="Interface réseau pour mopd :
 Veuillez indiquer l'interface sur laquelle vous désirez lancer mopd.
";
$elem["mopd/other_interface"]["default"]="";
$elem["mopd/bad_interface"]["type"]="error";
$elem["mopd/bad_interface"]["description"]="Nonexistent interface for mopd
 The MOP daemon configuration already exists as /etc/mopd.conf.
 .
 However, that configuration file specifies '${cur_iface}' as listening
 interface, which currently does not exist.
 .
 You should resolve this
 situation by manually editing the configuration file appropriately. Until
 this issue is resolved it is likely that mopd will not function correctly.
";
$elem["mopd/bad_interface"]["descriptionde"]="Nichtexistierende Schnittstelle für Mopd
 Der MOP-Daemon ist bereits in /etc/mopd.conf konfiguriert.
 .
 Allerdings spezifiziert diese Konfigurationsdatei die derzeit nicht existierende Schnittstelle »${cur_iface}«, an der auf Anfragen gewartet werden soll.
 .
 Sie sollten diese Situation auflösen, indem Sie die Konfigurationsdatei manuell entsprechend bearbeiten. Wahrscheinlich wird Mopd nicht korrekt funktionieren, bis dieses Problem behoben ist.
";
$elem["mopd/bad_interface"]["descriptionfr"]="Interface pour mopd inexistante
 Le fichier de configuration du démon MOP, /etc/mopd.conf, existe déjà.
 .
 Cependant, ce fichier de configuration indique ${cur_iface} comme interface d'écoute alors que cette interface réseau n'existe pas.
 .
 Vous devriez corriger cela en modifiant vous-même le fichier de configuration. Sans cette correction, mopd ne fonctionnera probablement pas correctement.
";
$elem["mopd/bad_interface"]["default"]="";
$elem["mopd/interface"]["type"]="select";
$elem["mopd/interface"]["choices"][1]="other";
$elem["mopd/interface"]["choices"][2]="all";
$elem["mopd/interface"]["choicesde"][1]="andere";
$elem["mopd/interface"]["choicesde"][2]="alle";
$elem["mopd/interface"]["choicesfr"][1]="autre";
$elem["mopd/interface"]["choicesfr"][2]="toutes";
$elem["mopd/interface"]["description"]="Interface for mopd:
 Please choose the interface you would like to run mopd on, or select
 'other' if the interface is not in this list.
 .
 If you want mopd to listen on all interfaces, please choose 'all'.
";
$elem["mopd/interface"]["descriptionde"]="Schnittstelle für Mopd:
 Bitte wählen Sie die Schnittstelle aus, an der Mopd laufen soll. Wählen Sie »andere«, falls die Schnittstelle nicht in der Liste enthalten ist.
 .
 Falls Sie möchten, dass Mopd auf allen Schnittstellen auf Anfragen wartet, wählen Sie »alle«.
";
$elem["mopd/interface"]["descriptionfr"]="Interface réseau pour mopd :
 Veuillez choisir l'interface sur laquelle vous désirez lancer mopd. Choisissez « autre » si l'interface ne se trouve pas dans cette liste.
 .
 Si vous souhaitez que mopd soit à l'écoute sur toutes les interfaces, choisissez « toutes ».
";
$elem["mopd/interface"]["default"]="";
PKG_OptionPageTail2($elem);
?>
