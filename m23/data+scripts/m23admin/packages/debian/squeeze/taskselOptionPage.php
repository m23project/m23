<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tasksel");

$elem["tasksel/first"]["type"]="multiselect";
$elem["tasksel/first"]["description"]="Choose software to install:
 At the moment, only the core of the system is installed. To tune the
 system to your needs, you can choose to install one or more of the
 following predefined collections of software.
";
$elem["tasksel/first"]["descriptionde"]="Welche Software soll installiert werden?
 Momentan ist nur das Wichtigste des Systems installiert. Um das System an Ihre Bedürfnisse anzupassen, können Sie eine oder mehrere der folgenden vordefinierten Software-Sammlungen installieren.
";
$elem["tasksel/first"]["descriptionfr"]="Logiciels à installer :
 Actuellement, seul le système de base est installé. Pour adapter l'installation à vos besoins, vous pouvez choisir d'installer un ou plusieurs ensembles prédéfinis de logiciels.
";
$elem["tasksel/first"]["default"]="";
$elem["tasksel/tasks"]["type"]="multiselect";
$elem["tasksel/tasks"]["description"]="Choose software to install:
 You can choose to install one or more of the following predefined
 collections of software.
";
$elem["tasksel/tasks"]["descriptionde"]="Welche Software soll installiert werden?
 Sie können eine oder mehrere der folgenden vordefinierten Software-Sammlungen zur Installation auswählen.
";
$elem["tasksel/tasks"]["descriptionfr"]="Logiciels à installer :
 Vous pouvez choisir d'installer un ou plusieurs des ensembles suivants de logiciels.
";
$elem["tasksel/tasks"]["default"]="";
$elem["tasksel/desktop"]["type"]="multiselect";
$elem["tasksel/desktop"]["choices"][1]="gnome";
$elem["tasksel/desktop"]["choices"][2]="kde";
$elem["tasksel/desktop"]["description"]="The desktop environment to install when the desktop task is selected
 This can be preseeded to change the default.

";
$elem["tasksel/desktop"]["descriptionde"]="";
$elem["tasksel/desktop"]["descriptionfr"]="";
$elem["tasksel/desktop"]["default"]="gnome";
$elem["tasksel/title"]["type"]="title";
$elem["tasksel/title"]["description"]="Software selection
";
$elem["tasksel/title"]["descriptionde"]="Softwareauswahl
";
$elem["tasksel/title"]["descriptionfr"]="Sélection des logiciels
";
$elem["tasksel/title"]["default"]="";
PKG_OptionPageTail2($elem);
?>
