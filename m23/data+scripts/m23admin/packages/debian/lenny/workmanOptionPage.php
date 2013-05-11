<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("workman");

$elem["workman/which_device"]["type"]="string";
$elem["workman/which_device"]["description"]="What is your CDROM device for playing audio CDs ?
 WorkMan needs to know the name of the physical device that you want to use
 to play audio CDs.
";
$elem["workman/which_device"]["descriptionde"]="Welchen Gerätenamen trägt das zu benutzende CD-Laufwerk ?
 WorkMan muss den Gerätenamen des CDROM-Laufwerkes kennen, das für die Wiedergabe von Audio-CDs benutzt werden soll.
";
$elem["workman/which_device"]["descriptionfr"]="Quel périphérique CD-ROM sera utilisé pour lire les CD audios ?
 WorkMan doit connaître le nom du périphérique physique que vous souhaitez utiliser pour lire des CD audios.
";
$elem["workman/which_device"]["default"]="/dev/hdc";
$elem["workman/not_physical"]["type"]="note";
$elem["workman/not_physical"]["description"]="Please, use the real physical device name.
 /dev/cdrom should only be a symbolic link to the physical device name.
 Please, give the name of the physical device that you want to use to play
 audio CDs.
";
$elem["workman/not_physical"]["descriptionde"]="Bitte benutzen Sie den Namen des physikalischen Gerätes.
 /dev/cdrom sollte nur ein symbolischer Verweis auf Ihr tatsächliches CDROM-Laufwerk sein. Bitte geben Sie den physikalischen Gerätenamen dieses CDROM-Laufwerkes an, das für die Wiedergabe von Audio-CDs benutzt werden soll.
";
$elem["workman/not_physical"]["descriptionfr"]="Veuillez utiliser le nom réel du périphérique physique.
 /dev/cdrom n'est en principe qu'un lien symbolique vers le périphérique physique. Veuillez indiquer le nom du périphérique physique que vous souhaitez utiliser pour lire des CD audios.
";
$elem["workman/not_physical"]["default"]="";
$elem["workman/no_block_device"]["type"]="note";
$elem["workman/no_block_device"]["description"]="The given device is no block device.
 The name of the physical device that you gave does not point to
 a currently available block device. This may indicate an errorneous
 input. It might, however, also mean that the device is only
 temporarily not attached or the corresponding kernel module not
 activated.
";
$elem["workman/no_block_device"]["descriptionde"]="Das angegebene Gerät ist kein blockorientiertes Gerät.
 Der angegebene Gerätename zeigt auf kein aktuell verfügbares blockorientiertes Gerät. Dies ist ein Hinweis auf eine fehlerhafte Eingabe. Es  könnte aber auch bedeuten, dass das Gerät nur vorübergehend nicht angeschlossen oder der entspechende Kernel-Treiber nicht geladen ist.
";
$elem["workman/no_block_device"]["descriptionfr"]="Le périphérique indiqué n'est pas un périphérique bloc.
 Le nom du périphérique physique que vous avez indiqué ne correspond à aucun périphérique de bloc valide actuellement. Cela peut être dû à une erreur de saisie. Il est cependant possible que le périphérique ne soit inaccessible que temporairement, parce qu'il n'est pas connecté ou que le module correspondant du noyau n'est pas chargé.
";
$elem["workman/no_block_device"]["default"]="";
$elem["workman/change_block_device"]["type"]="boolean";
$elem["workman/change_block_device"]["description"]="Do you want to correct the device name?
 If you gave a wrong name for the physical device, you can correct it
 now.
";
$elem["workman/change_block_device"]["descriptionde"]="Wollen Sie die Eingabe des Gerätenamens korrigieren?
 Falls der Gerätename tatsächlich falsch war, können Sie ihn jetzt ändern.
";
$elem["workman/change_block_device"]["descriptionfr"]="Souhaitez-vous corriger le nom du périphérique .
 Si vous avez commis une erreur en indiquant le nom du périphérique, vous pouvez la corriger maintenant.
";
$elem["workman/change_block_device"]["default"]="";
$elem["workman/cdrom_link_failed"]["type"]="note";
$elem["workman/cdrom_link_failed"]["description"]="Symbolic linking from your device to /dev/cdrom failed.
 Workman uses /dev/cdrom as a link to its default device. The creation
 of this link failed. Thus you have to create the link by hand or
 Workman must be always called with the -c option.
";
$elem["workman/cdrom_link_failed"]["descriptionde"]="Der symbolische Link vom Gerät nach /dev/cdrom ist fehlgeschlagen.
 Workman benutzt /dev/cdrom als Standardgerät. Diese Datei sollte einen symbolischen Link auf das tatsächliche CDROM-Laufwerk darstellen. Das Setzen dieses Links ist allerdings fehlgeschlagen. Dementsprechend müssen Sie den Link von Hand setzen oder Workman immer mit der -c Option aufrufen.
";
$elem["workman/cdrom_link_failed"]["descriptionfr"]="La création d'un lien symbolique /dev/cdrom vers votre périphérique a échoué.
 Workman utilise /dev/cdrom comme lien vers le périphérique qu'il utilise par défaut. La création de ce lien a échoué. Vous devrez donc créer ce lien vous-même à moins de toujours démarrer Workman avec l'option « -c ».
";
$elem["workman/cdrom_link_failed"]["default"]="";
$elem["workman/cdrom_gid_failed"]["type"]="note";
$elem["workman/cdrom_gid_failed"]["description"]="Changing the group id of the CDROM device failed.
 Workman uses /dev/cdrom as a link to its default device. The group id of
 this device could not be set to cdrom. Thus workman may be unable to
 play CDs on this device because of insufficient privileges. Please,
 check the ownership and permissions of the device by hand.
";
$elem["workman/cdrom_gid_failed"]["descriptionde"]="Die Änderung der Gruppenzugehörigkeit des Gerätes ist fehlgeschlagen.
 Workman benutzt /dev/cdrom als Link auf das eigentliche CDROM-Laufwerk. Die Gruppenzugehörigkeit dieses Laufwerks konnte nicht auf cdrom gesetzt werden. Das kann dazu führen, dass Workman das Laufwerk wegen unzureichender Zugriffsrechte nicht nutzen kann. Bitte überprüfen Sie die Rechte und Gruppenzugehörigkeit der Gerätes.
";
$elem["workman/cdrom_gid_failed"]["descriptionfr"]="Le changement du groupe propriétaire du périphérique CD-ROM a échoué.
 Workman utilise /dev/cdrom comme lien vers le périphérique qu'il utilise par défaut. Le groupe propriétaire de ce périphérique n'a pas pu être changé en « cdrom ». En conséquence, Workman ne pourra probablement pas lire de CD car il ne disposera pas des droits nécessaires. Veuillez donc vérifier vous-même les propriétaires et les droits d'accès à ce périphérique.
";
$elem["workman/cdrom_gid_failed"]["default"]="";
$elem["workman/cdrom_perm_failed"]["type"]="note";
$elem["workman/cdrom_perm_failed"]["description"]="Changing the permissions of the CDROM device failed.
 Workman needs read, write, and execute permissions for the CDROM device.
 The permissions of the device could not be changed. Thus Workman may be
 unable to play CDs on this device because of insufficient privileges.
 Please, check the permissions of the device by hand.
";
$elem["workman/cdrom_perm_failed"]["descriptionde"]="Die Änderung der Zugriffsrechte des Gerätes ist fehlgeschlagen.
 Workman benötigt Lese-, Schreib- und Ausführungsrechte für das CDROM-Laufwerk. Die Zugriffsrechte für des Laufwerks konnten nicht geändert werden. Das kann dazu führen, dass Workman das Laufwerk nicht benutzen kann. Bitte überprüfen Sie die Einstellungen der Zugriffsrechte für das Gerät.
";
$elem["workman/cdrom_perm_failed"]["descriptionfr"]="Le changement des droits d'accès du périphérique CD-ROM a échoué.
 Workman doit posséder les droits de lecture, d'écriture et d'exécution sur le périphérique CD-ROM. Les permissions du périphérique n'ont pas pu être modifiées. En conséquence, Workman ne pourra probablement pas lire de CD car il ne disposera pas des droits nécessaires. Veuillez donc vérifier vous-même les droits d'accès à ce périphérique.
";
$elem["workman/cdrom_perm_failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
