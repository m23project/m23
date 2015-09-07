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
$elem["tasksel/force-tasks"]["type"]="string";
$elem["tasksel/force-tasks"]["description"]="Which tasks should always be installed
 This can be preseeded to force the installation of additional tasks without
 displaying them. (Normally you should use tasksel/first instead; this is
 for the situation where you want to force installation of some tasks but
 still prompt for others.)

";
$elem["tasksel/force-tasks"]["descriptionde"]="";
$elem["tasksel/force-tasks"]["descriptionfr"]="";
$elem["tasksel/force-tasks"]["default"]="";
$elem["tasksel/limit-tasks"]["type"]="string";
$elem["tasksel/limit-tasks"]["description"]="Which tasks should be shown
 This can be preseeded to only display a subset of the available tasks.

";
$elem["tasksel/limit-tasks"]["descriptionde"]="";
$elem["tasksel/limit-tasks"]["descriptionfr"]="";
$elem["tasksel/limit-tasks"]["default"]="";
$elem["tasksel/skip-tasks"]["type"]="string";
$elem["tasksel/skip-tasks"]["description"]="Which tasks should not be shown or installed
 This can be preseeded to cause certain tasks to be neither shown nor
 installed, as if they were not available.

";
$elem["tasksel/skip-tasks"]["descriptionde"]="";
$elem["tasksel/skip-tasks"]["descriptionfr"]="";
$elem["tasksel/skip-tasks"]["default"]="";
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
$elem["tasksel/terminal"]["type"]="terminal";
$elem["tasksel/terminal"]["description"]="${TITLE}
";
$elem["tasksel/terminal"]["descriptionde"]="";
$elem["tasksel/terminal"]["descriptionfr"]="";
$elem["tasksel/terminal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
