<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libguestfs0");

$elem["libguestfs/update-appliance"]["type"]="boolean";
$elem["libguestfs/update-appliance"]["description"]="Create or update supermin appliance now?
 A \"supermin appliance\" is mandatory for libguestfs.
 It contains lists of files and directories. These will be
 copied into an ad-hoc file system whenever libguestfs starts
 a virtual machine.
 .
 To generate or update a supermin appliance, network access to a
 package repository is needed.
 .
 This can be done later by using the update-guestfs-appliance(8) utility.
";
$elem["libguestfs/update-appliance"]["descriptionde"]="Supermin-Appliance nun erstellen oder aktualisieren?
 Eine »Supermin-Appliance« ist für Libguestfs zwingend notwendig. Sie enthält Listen von Dateien und Verzeichnissen. Sobald Libguestfs eine virtuelle Maschine startet, werden diese in ein Ad-Hoc-Dateisystem kopiert.
 .
 Um eine Supermin-Appliance zu erstellen oder zu aktualisieren, wird Netzwerkzugriff auf das Paketdepot benötigt.
 .
 Dies kann später durch Benutzung des Hilfswerkzeugs update-guestfs-appliance(8) erledigt werden.
";
$elem["libguestfs/update-appliance"]["descriptionfr"]="Créer ou mettre à jour l'image supermin maintenant ?
 Une « image supermin » est obligatoire pour libguestfs. Elle contient des listes des fichiers et répertoires. Ils seront copiés dans un système de fichiers ad-hoc à chaque fois que libguestfs démarrera une machine virtuelle.
 .
 La création ou la mise à jour d'une image supermin nécessite un accès réseau vers un dépôt de paquets.
 .
 Cela peut être fait ultérieurement en utilisant l'utilitaire update-guestfs-appliance(8).
";
$elem["libguestfs/update-appliance"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
