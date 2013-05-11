<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libphidgets0");

$elem["libphidgets0/group"]["type"]="string";
$elem["libphidgets0/group"]["description"]="Which group should be able to interact with the Phidgets?
 To use the Phidgets, one must be able to read and write to the device
 files corresponding to the Phidgets in /proc/bus/usb. If you have hotplug
 installed, this will be managed automatically. In that case, please enter
 the group that should be given access to the Phidgets.
";
$elem["libphidgets0/group"]["descriptionde"]="Welche Systemgruppe soll die Phidgets verwenden können?
 Um die Phidgets zu verwenden braucht der Benutzer Schreibrechte auf die zugehörigen Dateien in /proc/bus/usb. Wenn auf der Maschine hotplug installiert ist, kann die Rechtevergabe automatisch erfolgen. Bitten nennen Sie eine Systemgruppe, für die der Zugang automatisch hergestellt werden soll.
";
$elem["libphidgets0/group"]["descriptionfr"]="Groupe qui interagira avec les « phidgets » :
 Pour utiliser les « phidgets », il doit être possible de lire et écrire dans le fichier de périphérique correspondant dans /proc/bus/usb. Si hotplug est installé, il gérera cela automatiquement. Dans ce cas, vous devez indiquer le groupe qui aura accès aux « phidgets ».
";
$elem["libphidgets0/group"]["default"]="phidgets";
$elem["libphidgets0/groupcreate"]["type"]="boolean";
$elem["libphidgets0/groupcreate"]["description"]="Should this group be created by the package?
 The package can automatically create the group you requested in the
 previous question. Do you want it to do so?
";
$elem["libphidgets0/groupcreate"]["descriptionde"]="Soll die Systemgruppe automatisch erstellt werden?
 Dieses Paket kann die erforderliche Systemgruppe selbstständig erstellen. Soll es diese Änderung vornehmen?
";
$elem["libphidgets0/groupcreate"]["descriptionfr"]="Faut-il créer le groupe ?
 Les scripts d'installation du paquet peuvent créer automatiquement le groupe que vous avez indiqué.
";
$elem["libphidgets0/groupcreate"]["default"]="true";
$elem["libphidgets0/groupdelete"]["type"]="boolean";
$elem["libphidgets0/groupdelete"]["description"]="Should this group be deleted when the package is removed?
 Upon removal of the package, it can automatically delete the group. All
 membership data will be purged. Do you want the package to delete the group
 upon removal?
";
$elem["libphidgets0/groupdelete"]["descriptionde"]="Soll die Systemgruppe beim Entfernen des Paketes wieder gelöscht werden?
 Beim Entfernen kann das Paket die Systemgruppe automatisch wieder löschen. Dabei geht sämtliche Information zum Mitgliederstatus verloren. Ist das erwünscht?
";
$elem["libphidgets0/groupdelete"]["descriptionfr"]="Faut-il supprimer le groupe lors de la désinstallation du paquet ?
 Lors de la désinstallation du paquet, le groupe peut-être effacé automatiquement. Ne choisissez pas cette option si ce n'est pas ce que vous souhaitez.
";
$elem["libphidgets0/groupdelete"]["default"]="true";
$elem["libphidgets0/grouprenamedelete"]["type"]="boolean";
$elem["libphidgets0/grouprenamedelete"]["description"]="Should the previous group be deleted?
 You chose to rename the group allowed to access to the Phidgets. Should the
 group created during package installation be deleted? You will have the
 option to migrate the membership to the new group.
";
$elem["libphidgets0/grouprenamedelete"]["descriptionde"]="Soll die vorherige Gruppe gelöscht werden?
 Sie wollen die Gruppe umbenennen, die die Phidgets benutzen darf. Soll die alte Gruppe gelöscht werden? Sie haben gleich die Möglichkeit, die bestehenden Mitglieder automatisch in die neue Gruppe aufzunehmen.
";
$elem["libphidgets0/grouprenamedelete"]["descriptionfr"]="Faut-il supprimer l'ancien groupe ?
 Vous avez choisi de changer le nom du groupe autorisé à accéder aux « phidgets ». Veuillez indiquer si le groupe créé à l'installation du paquet doit être supprimé. Si vous choisissez cette option, vous aurez la possibilité de transférer les utilisateurs dans le nouveau groupe.
";
$elem["libphidgets0/grouprenamedelete"]["default"]="true";
$elem["libphidgets0/grouprenamemigrate"]["type"]="boolean";
$elem["libphidgets0/grouprenamemigrate"]["description"]="Should the group membership be migrated to the new group?
 You chose to rename the group allowed to access to the Phidgets. Do you want
 all members of the previous group to be automatically added to the new group?
";
$elem["libphidgets0/grouprenamemigrate"]["descriptionde"]="Sollen alle Mitglieder in die neue Gruppe übernommen werden?
 Sie wollen die Gruppe umbenennen, die die Phidgets benutzen darf. Sollen die Mitglieder der alten Gruppe automatisch der neuen hinzugefügt werden?
";
$elem["libphidgets0/grouprenamemigrate"]["descriptionfr"]="Faut-il transférer les utilisateurs dans le nouveau groupe ?
 Vous avez choisi de changer le nom du groupe autorisé à accéder aux « phidgets ». Veuillez indiquer si les utilisateurs membres de l'ancien groupe doivent être ajoutés au nouveau.
";
$elem["libphidgets0/grouprenamemigrate"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
