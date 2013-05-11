<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("science-config");

$elem["science-config/group"]["type"]="multiselect";
$elem["science-config/group"]["description"]="Debian Science users:
 Please select, among the whole system user list, users who should get
 a Debian Science user menu.
";
$elem["science-config/group"]["descriptionde"]="Debian Science Nutzer:
 Bitte wählen Sie aus der Liste aller Nutzer des Systems diejenigen aus, die ein Debian Science Nutzermenü erhalten sollen.
";
$elem["science-config/group"]["descriptionfr"]="Utilisateurs de Debian Science :
 Veuillez choisir parmi tous les utilisateurs du système ceux qui auront un menu Debian Science.
";
$elem["science-config/group"]["default"]="";
$elem["shared/science-config/usermenus"]["type"]="select";
$elem["shared/science-config/usermenus"]["choices"][1]="Each package installation";
$elem["shared/science-config/usermenus"]["choices"][2]="End of installation";
$elem["shared/science-config/usermenus"]["choicesde"][1]="Paketinstallation";
$elem["shared/science-config/usermenus"]["choicesde"][2]="Installationsende";
$elem["shared/science-config/usermenus"]["choicesfr"][1]="À chaque installation de paquet";
$elem["shared/science-config/usermenus"]["choicesfr"][2]="À la fin de l'installation";
$elem["shared/science-config/usermenus"]["description"]="Build user menus at:
 The meta packages of the Debian Science Custom Debian Distribution
 contain extra menus that will be auto generated from existing packages.
 If the role based user menu option was choosen these menus will be built
 when a user who is registered to a given role uses the \"update-menus\"
 utility.  This can be done automatically for all users who are registered
 for Debian Science after installation of each single meta package,
 at the end of the whole installation process to save time in case
 of installing more than one meta package or just leave the call of
 \"update-menus\" to the users themselves.
  * Each package installation : Call \"update-menus\" after each meta package
                               (time consuming);
  * End of installation       : Call \"update-menus\" only once at the end of
                                the whole installation/upgrading process;
  * Never                     : Do not call \"update-menus\" at all.

";
$elem["shared/science-config/usermenus"]["descriptionde"]="";
$elem["shared/science-config/usermenus"]["descriptionfr"]="";
$elem["shared/science-config/usermenus"]["default"]="never";
$elem["shared/science-config/useusermenus"]["type"]="boolean";
$elem["shared/science-config/useusermenus"]["description"]="Do you want user menus?
 The menus for the Debian Science Custom Debian Distribution could be
 implemented as user menus which means they are visible only for those
 users that will be selected explicitely.  Be warned that selecting
 the users from a large list does not scale very well so it makes no
 real sense to activate this feature if there are more than 50 users
 on this machine.
";
$elem["shared/science-config/useusermenus"]["descriptionde"]="";
$elem["shared/science-config/useusermenus"]["descriptionfr"]="";
$elem["shared/science-config/useusermenus"]["default"]="";
PKG_OptionPageTail2($elem);
?>
