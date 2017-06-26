<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("med-config");

$elem["med-config/group"]["type"]="multiselect";
$elem["med-config/group"]["description"]="Debian Med users:
 Please select, among the whole system user list, users who should get
 a Debian Med user menu.
";
$elem["med-config/group"]["descriptionde"]="Debian Med Nutzer:
 Bitte wählen Sie aus der Liste aller Nutzer des Systems diejenigen aus, die ein Debian Med Nutzermenü erhalten sollen.
";
$elem["med-config/group"]["descriptionfr"]="Utilisateurs de Debian Med :
 Veuillez choisir parmi tous les utilisateurs du système ceux qui auront un menu Debian Med.
";
$elem["med-config/group"]["default"]="";
$elem["shared/med-config/usermenus"]["type"]="select";
$elem["shared/med-config/usermenus"]["choices"][1]="Each package installation";
$elem["shared/med-config/usermenus"]["choices"][2]="End of installation";
$elem["shared/med-config/usermenus"]["choicesde"][1]="Paketinstallation";
$elem["shared/med-config/usermenus"]["choicesde"][2]="Installationsende";
$elem["shared/med-config/usermenus"]["choicesfr"][1]="À chaque installation de paquet";
$elem["shared/med-config/usermenus"]["choicesfr"][2]="À la fin de l'installation";
$elem["shared/med-config/usermenus"]["description"]="Build user menus at:
 The metapackages of the Debian Med Debian Pure Blend
 contain extra menus that will be auto generated from existing packages.
 If the role based user menu option was choosen these menus will be built
 when a user who is registered to a given role uses the \"update-menus\"
 utility.  This can be done automatically for all users who are registered
 for Debian Med after installation of each single metapackage,
 at the end of the whole installation process to save time in case
 of installing more than one metapackage or just leave the call of
 \"update-menus\" to the users themselves.
  * Each package installation : Call \"update-menus\" after each metapackage
                               (time consuming);
  * End of installation       : Call \"update-menus\" only once at the end of
                                the whole installation/upgrading process;
  * Never                     : Do not call \"update-menus\" at all.

";
$elem["shared/med-config/usermenus"]["descriptionde"]="";
$elem["shared/med-config/usermenus"]["descriptionfr"]="";
$elem["shared/med-config/usermenus"]["default"]="never";
$elem["shared/med-config/useusermenus"]["type"]="boolean";
$elem["shared/med-config/useusermenus"]["description"]="Do you want user menus?
 The menus for the Debian Med Debian Pure Blend could be
 implemented as user menus which means they are visible only for those
 users that will be selected explicitely.  Be warned that selecting
 the users from a large list does not scale very well so it makes no
 real sense to activate this feature if there are more than 50 users
 on this machine.
";
$elem["shared/med-config/useusermenus"]["descriptionde"]="";
$elem["shared/med-config/useusermenus"]["descriptionfr"]="";
$elem["shared/med-config/useusermenus"]["default"]="";
PKG_OptionPageTail2($elem);
?>
