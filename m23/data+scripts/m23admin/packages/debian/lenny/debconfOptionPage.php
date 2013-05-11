<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debconf");

$elem["debconf/frontend"]["type"]="select";
$elem["debconf/frontend"]["choices"][1]="Dialog";
$elem["debconf/frontend"]["choices"][2]="Readline";
$elem["debconf/frontend"]["choices"][3]="Gnome";
$elem["debconf/frontend"]["choices"][4]="Kde";
$elem["debconf/frontend"]["choices"][5]="Editor";
$elem["debconf/frontend"]["choicesde"][1]="Dialog";
$elem["debconf/frontend"]["choicesde"][2]="Readline";
$elem["debconf/frontend"]["choicesde"][3]="Gnome";
$elem["debconf/frontend"]["choicesde"][4]="Kde";
$elem["debconf/frontend"]["choicesde"][5]="Editor";
$elem["debconf/frontend"]["choicesfr"][1]="Dialogue";
$elem["debconf/frontend"]["choicesfr"][2]="Readline";
$elem["debconf/frontend"]["choicesfr"][3]="Gnome";
$elem["debconf/frontend"]["choicesfr"][4]="Kde";
$elem["debconf/frontend"]["choicesfr"][5]="Éditeur";
$elem["debconf/frontend"]["description"]="Interface to use:
 Packages that use debconf for configuration share a common look and feel.
 You can select the type of user interface they use.
 .
 The dialog frontend is a full-screen, character based interface, while the
 readline frontend uses a more traditional plain text interface, and both the
 gnome and kde frontends are modern X interfaces, fitting the respective
 desktops (but may be used in any X environment). The editor frontend lets you
 configure things using your favorite text editor. The noninteractive
 frontend never asks you any questions.
";
$elem["debconf/frontend"]["descriptionde"]="Zu benutzende Schnittstelle:
 Pakete, die Debconf für die Konfiguration verwenden, haben ein gemeinsames »look and feel«. Sie können wählen, welche Benutzerschnittstelle sie nutzen.
 .
 Das Dialog-Frontend nutzt eine zeichen-basierte Vollbildschirmdarstellung, während das Readline-Frontend eine eher traditionelle einfache Textschnittstelle verwendet, und sowohl das GNOME- als auch das KDE-Frontend sind moderne X-Schnittstellen, die in den jeweiligen Desktop eingepasst sind (aber in beliebigen X-Umgebungen verwendet werden können). Das Editor-Frontend läßt Sie die Dinge mit Ihrem Lieblingseditor konfigurieren. Das nicht-interaktive Frontend stellt Ihnen niemals Fragen.
";
$elem["debconf/frontend"]["descriptionfr"]="Interface à utiliser :
 Les paquets utilisant debconf pour leur configuration ont une interface et une ergonomie communes. Vous pouvez choisir leur interface utilisateur.
 .
 « Dialogue » est une interface couleur en mode caractère et en plein écran, alors que l'interface « Readline » est une interface plus traditionnelle en mode texte. Les interfaces « Gnome » et « KDE » sont des interfaces X modernes, adaptées respectivement à ces environnements (mais peuvent être utilisées depuis n'importe quel environnement X). L'interface « Éditeur » vous permet de faire vos configurations depuis votre éditeur favori. Si vous choisissez « Non-interactive », le système ne vous posera jamais de question.
";
$elem["debconf/frontend"]["default"]="Dialog";
$elem["debconf/priority"]["type"]="select";
$elem["debconf/priority"]["choices"][1]="critical";
$elem["debconf/priority"]["choices"][2]="high";
$elem["debconf/priority"]["choices"][3]="medium";
$elem["debconf/priority"]["choicesde"][1]="kritisch";
$elem["debconf/priority"]["choicesde"][2]="hoch";
$elem["debconf/priority"]["choicesde"][3]="mittel";
$elem["debconf/priority"]["choicesfr"][1]="critique";
$elem["debconf/priority"]["choicesfr"][2]="élevée";
$elem["debconf/priority"]["choicesfr"][3]="intermédiaire";
$elem["debconf/priority"]["description"]="Ignore questions with a priority less than:
 Debconf prioritizes the questions it asks you. Pick the lowest priority of
 question you want to see:
   - 'critical' only prompts you if the system might break.
     Pick it if you are a newbie, or in a hurry.
   - 'high' is for rather important questions
   - 'medium' is for normal questions
   - 'low' is for control freaks who want to see everything
 .
 Note that no matter what level you pick here, you will be able to see
 every question if you reconfigure a package with dpkg-reconfigure.
";
$elem["debconf/priority"]["descriptionde"]="Ignoriere Fragen mit einer Priorität niedriger als:
 Abhängig von der gewählten Priorität stellt Debconf Ihnen Fragen oder unterdrückt diese. Wählen Sie die niedrigste Prioritätsstufe der Fragen, die Sie sehen möchten:
   - »kritisch« fragt Sie nur, wenn das System beschädigt werden könnte.
     Wählen Sie dies, wenn Sie Linux-Neuling sind oder es eilig haben.
   - »hoch« ist für ziemlich wichtige Fragen.
   - »mittel« ist für normale Fragen.
   - »niedrig« ist für Kontroll-Freaks, die alles sehen möchten.
 .
 Beachten Sie, daß Sie unabhängig von der hier gewählten Stufe jede Frage sehen können, wenn Sie ein Paket mit dpkg-reconfigure neu konfigurieren.
";
$elem["debconf/priority"]["descriptionfr"]="Ignorer les questions de priorité inférieure à :
 Debconf gère les priorités des questions qu'il vous pose. Choisissez la priorité la plus basse des questions que vous souhaitez voir :
   - « critique » n'affiche que les questions pouvant casser le système.
     Choisissez-la si vous êtes peu expérimenté ou pressé ;
   - « élevée » affiche les questions plutôt importantes ;
   - « intermédiaire » affiche les questions normales ;
   - « basse » est destinée à ceux qui veulent tout contrôler.
 .
 Quel que soit le niveau de votre choix, vous pourrez revoir toutes les questions si vous reconfigurez le paquet avec « dpkg-reconfigure ».
";
$elem["debconf/priority"]["default"]="high";
$elem["debconf-apt-progress/title"]["type"]="text";
$elem["debconf-apt-progress/title"]["description"]="Installing packages
";
$elem["debconf-apt-progress/title"]["descriptionde"]="Installiere Pakete
";
$elem["debconf-apt-progress/title"]["descriptionfr"]="Installation des paquets
";
$elem["debconf-apt-progress/title"]["default"]="";
$elem["debconf-apt-progress/preparing"]["type"]="text";
$elem["debconf-apt-progress/preparing"]["description"]="Please wait...
";
$elem["debconf-apt-progress/preparing"]["descriptionde"]="Bitte warten ...
";
$elem["debconf-apt-progress/preparing"]["descriptionfr"]="Veuillez patienter...
";
$elem["debconf-apt-progress/preparing"]["default"]="";
$elem["debconf-apt-progress/info"]["type"]="text";
$elem["debconf-apt-progress/info"]["description"]="${DESCRIPTION}

";
$elem["debconf-apt-progress/info"]["descriptionde"]="";
$elem["debconf-apt-progress/info"]["descriptionfr"]="";
$elem["debconf-apt-progress/info"]["default"]="";
$elem["debconf-apt-progress/media-change"]["type"]="text";
$elem["debconf-apt-progress/media-change"]["description"]="Media change
 ${MESSAGE}
";
$elem["debconf-apt-progress/media-change"]["descriptionde"]="";
$elem["debconf-apt-progress/media-change"]["descriptionfr"]="";
$elem["debconf-apt-progress/media-change"]["default"]="";
PKG_OptionPageTail2($elem);
?>
