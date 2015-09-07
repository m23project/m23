<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apparmor");

$elem["apparmor/homedirs"]["type"]="string";
$elem["apparmor/homedirs"]["description"]="Additional home directory locations:
 Please enter a space separated list of any additional locations for user
 home directories. These locations are in addition to those specified in
 /etc/apparmor.d/tunables/home and must end with a '/'.
 .
 Example: if user's directories are stored in /srv/nfs/home and /mnt/homes,
 you should enter \"/srv/nfs/home/ /mnt/homes/\".
";
$elem["apparmor/homedirs"]["descriptionde"]="Zusätzliche Speicherorte für Home-Verzeichnisse:
 Bitte geben Sie eine durch Leerzeichen getrennte Liste zusätzlicher Speicherorte für die Home-Verzeichnisse der Benutzer ein. Diese Speicherorte ergänzen die, die in /etc/apparmor.d/tunables/home angegeben sind und müssen mit einem »/« enden.
 .
 Beispiel: Falls die Verzeichnisse der Anwender in /srv/nfs/home und /mnt/homes gespeichert sind, sollten Sie »/srv/nfs/home/ /mnt/homes/« eingeben.
";
$elem["apparmor/homedirs"]["descriptionfr"]="Emplacement du répertoire personnel supplémentaire :
 Veuillez indiquer, séparés par des espaces, les emplacements des répertoires personnels (« home ») supplémentaires des utilisateurs. Ces répertoires seront ajoutés à ceux qui sont indiqués dans /etc/apparmor.d/tunables/home ; ils doivent se terminer par un « / ».
 .
 Exemple : si les répertoires des utilisateurs sont stockés dans /srv/nfs/home et /mnt/homes, vous devriez entrer « /srv/nfs/home/ /mnt/homes/ ».
";
$elem["apparmor/homedirs"]["default"]="";
PKG_OptionPageTail2($elem);
?>
