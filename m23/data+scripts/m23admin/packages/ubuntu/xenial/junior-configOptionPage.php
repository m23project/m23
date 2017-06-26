<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("junior-config");

$elem["junior-config/group"]["type"]="multiselect";
$elem["junior-config/group"]["description"]="Debian Junior users:
 Please select, among the whole system user list, users who should get
 a Debian Junior user menu.
";
$elem["junior-config/group"]["descriptionde"]="Debian Junior Nutzer:
 Bitte wählen Sie aus der Liste aller Nutzer des Systems diejenigen aus, die ein Debian Junior Nutzermenü erhalten sollen.
";
$elem["junior-config/group"]["descriptionfr"]="Utilisateurs de Debian Junior :
 Veuillez choisir parmi tous les utilisateurs du système ceux qui auront un menu Debian Junior.
";
$elem["junior-config/group"]["default"]="";
$elem["shared/junior-config/usermenus"]["type"]="select";
$elem["shared/junior-config/usermenus"]["choices"][1]="Each package installation";
$elem["shared/junior-config/usermenus"]["choices"][2]="End of installation";
$elem["shared/junior-config/usermenus"]["choicesde"][1]="Paketinstallation";
$elem["shared/junior-config/usermenus"]["choicesde"][2]="Installationsende";
$elem["shared/junior-config/usermenus"]["choicesfr"][1]="À chaque installation de paquet";
$elem["shared/junior-config/usermenus"]["choicesfr"][2]="À la fin de l'installation";
$elem["shared/junior-config/usermenus"]["description"]="Build user menus at:
 The metapackages of the Debian Junior Debian Pure Blend
 contain extra menus that will be auto generated from existing packages.
 If the role based user menu option was choosen these menus will be built
 when a user who is registered to a given role uses the \"update-menus\"
 utility.  This can be done automatically for all users who are registered
 for Debian Junior after installation of each single metapackage,
 at the end of the whole installation process to save time in case
 of installing more than one metapackage or just leave the call of
 \"update-menus\" to the users themselves.
  * Each package installation : Call \"update-menus\" after each metapackage
                               (time consuming);
  * End of installation       : Call \"update-menus\" only once at the end of
                                the whole installation/upgrading process;
  * Never                     : Do not call \"update-menus\" at all.

";
$elem["shared/junior-config/usermenus"]["descriptionde"]="";
$elem["shared/junior-config/usermenus"]["descriptionfr"]="";
$elem["shared/junior-config/usermenus"]["default"]="never";
$elem["shared/junior-config/useusermenus"]["type"]="boolean";
$elem["shared/junior-config/useusermenus"]["description"]="Do you want user menus?
 The menus for the Debian Junior Debian Pure Blend could be
 implemented as user menus which means they are visible only for those
 users that will be selected explicitely.  Be warned that selecting
 the users from a large list does not scale very well so it makes no
 real sense to activate this feature if there are more than 50 users
 on this machine.
";
$elem["shared/junior-config/useusermenus"]["descriptionde"]="";
$elem["shared/junior-config/useusermenus"]["descriptionfr"]="";
$elem["shared/junior-config/useusermenus"]["default"]="";
PKG_OptionPageTail2($elem);
?>
