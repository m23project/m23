<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mopd");

$elem["mopd/other_interface"]["type"]="string";
$elem["mopd/other_interface"]["description"]="Enter an interface.
 Please enter the interface you would like to run mopd on.
";
$elem["mopd/other_interface"]["descriptionde"]="Bitte geben Sie das Interface an.
 Bitte geben Sie das Interface ein mit dem mopd laufen soll.
";
$elem["mopd/other_interface"]["descriptionfr"]="Indiquez une interface.
 Veuillez indiquer l'interface sur laquelle vous désirez lancer mopd.
";
$elem["mopd/other_interface"]["default"]="";
$elem["mopd/bad_interface"]["type"]="note";
$elem["mopd/bad_interface"]["description"]="mopd's currently configured interface is unavailable.
 A configuration exists in /etc/mopd.conf.  The interface indicated in that
 file '${cur_iface}' does not appear to be available.  Please resolve the
 situation by manually editing the configuration file appropriately. Until
 this issue is resolved it is likely that mopd will not function correctly.
";
$elem["mopd/bad_interface"]["descriptionde"]="Das für mopd gewähle Interface ist nicht verfügbar.
 In der Datei /etc/mopd.conf existiert eine Konfiguration für mopd. Das darin angegebene Interface '$(cur_iface)' scheint nicht verfügbar zu sein. Bitte editieren Sie die Konfigurationsdatei entsprechend, damit mopd korrekt funktionieren kann.
";
$elem["mopd/bad_interface"]["descriptionfr"]="L'interface configurée pour mopd est indisponible.
 Une configuration antérieure existe dans le fichier /etc/mopd.conf. L'interface « ${cur_iface} » indiquée dans ce fichier semble indisponible. Veuillez corriger cela en modifiant vous-même le fichier de configuration. Sans cette correction, mopd ne fonctionnera probablement pas correctement.
";
$elem["mopd/bad_interface"]["default"]="";
$elem["mopd/interface"]["type"]="select";
$elem["mopd/interface"]["choices"][1]="other";
$elem["mopd/interface"]["choices"][2]="all";
$elem["mopd/interface"]["choicesde"][1]="andere";
$elem["mopd/interface"]["choicesde"][2]="alle";
$elem["mopd/interface"]["choicesfr"][1]="autre";
$elem["mopd/interface"]["choicesfr"][2]="toutes";
$elem["mopd/interface"]["description"]="Choose an interface.
 Please choose the interface you would like to run mopd on, or select
 'other' if the interface is not in this list, select 'all' if you would
 like mopd to listen on all interfaces.
";
$elem["mopd/interface"]["descriptionde"]="Wählen Sie eine Schnittstelle
 Bitte wählen Sie das Interface aus, auf dem mopd laufen soll. Wählen Sie 'andere' wenn das Interface nicht in der Liste enthalten ist. Wählen Sie 'alle', wenn mopd auf allen Interfaces laufen soll.
";
$elem["mopd/interface"]["descriptionfr"]="Veuillez choisir une interface.
 Veuillez choisir l'interface sur laquelle vous désirez lancer mopd. Choisissez « autre » si l'interface ne se trouve pas dans cette liste ou « toutes » si vous voulez que mopd écoute sur toutes les interfaces.
";
$elem["mopd/interface"]["default"]="";
PKG_OptionPageTail2($elem);
?>
