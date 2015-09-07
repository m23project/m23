<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("grub");

$elem["grub/update_grub_changeprompt_threeway"]["type"]="select";
$elem["grub/update_grub_changeprompt_threeway"]["choices"][1]="install the package maintainer's version";
$elem["grub/update_grub_changeprompt_threeway"]["choices"][2]="keep the local version currently installed";
$elem["grub/update_grub_changeprompt_threeway"]["choices"][3]="show the differences between the versions";
$elem["grub/update_grub_changeprompt_threeway"]["choices"][4]="show a side-by-side difference between the versions";
$elem["grub/update_grub_changeprompt_threeway"]["choices"][5]="show a 3-way difference between available versions";
$elem["grub/update_grub_changeprompt_threeway"]["choices"][6]="do a 3-way merge between available versions (experimental)";
$elem["grub/update_grub_changeprompt_threeway"]["choicesde"][1]="Version des Paket-Betreuers installieren";
$elem["grub/update_grub_changeprompt_threeway"]["choicesde"][2]="aktuell installierte Version behalten";
$elem["grub/update_grub_changeprompt_threeway"]["choicesde"][3]="Unterschiede zwischen den Versionen anzeigen";
$elem["grub/update_grub_changeprompt_threeway"]["choicesde"][4]="Unterschiede zwischen den Versionen nebeneinander anzeigen";
$elem["grub/update_grub_changeprompt_threeway"]["choicesde"][5]="3-Wege-Differenz der verfügbaren Versionen der Datei anzeigen";
$elem["grub/update_grub_changeprompt_threeway"]["choicesde"][6]="3-Wege-Vereinigung verfügbarer Versionen [experimentell]";
$elem["grub/update_grub_changeprompt_threeway"]["choicesfr"][1]="Installer la version du responsable du paquet";
$elem["grub/update_grub_changeprompt_threeway"]["choicesfr"][2]="Garder la version actuellement installée";
$elem["grub/update_grub_changeprompt_threeway"]["choicesfr"][3]="Montrer les différences entre les versions";
$elem["grub/update_grub_changeprompt_threeway"]["choicesfr"][4]="Montrer côte à côte les différences entre les versions";
$elem["grub/update_grub_changeprompt_threeway"]["choicesfr"][5]="Montrer les différences entre les trois versions du fichier";
$elem["grub/update_grub_changeprompt_threeway"]["choicesfr"][6]="Fusionner les trois versions disponibles du fichier (expérimental)";
$elem["grub/update_grub_changeprompt_threeway"]["description"]="What would you like to do about ${BASENAME}?
 A new version of /boot/grub/menu.lst is available, but the version installed
 currently has been locally modified.
";
$elem["grub/update_grub_changeprompt_threeway"]["descriptionde"]="";
$elem["grub/update_grub_changeprompt_threeway"]["descriptionfr"]="Action souhaitée pour ${BASENAME} :
 Une nouvelle version du fichier /boot/grub/menu.lst est disponible mais la version actuellement utilisée a été modifiée localement.
";
$elem["grub/update_grub_changeprompt_threeway"]["default"]="keep_current";
PKG_OptionPageTail2($elem);
?>
