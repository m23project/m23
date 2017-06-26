<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("memtest86");

$elem["shared/memtest86-run-lilo"]["type"]="boolean";
$elem["shared/memtest86-run-lilo"]["description"]="Run lilo automatically after upgrade (if found)?
 If lilo is installed and its configuration file contains the
 memtest86/memtest86+ image, then it should be re-run in order to
 allow booting the new image.
";
$elem["shared/memtest86-run-lilo"]["descriptionde"]="Soll lilo nach dem Upgrade automatisch ausgeführt werden (falls vorhanden)?
 Falls lilo installiert ist und dessen Konfigurationsdatei das memtest86/memtest86+-Image enthält, dann sollte es erneut ausgeführt werden, damit das Booten des neuen Images möglich ist.
";
$elem["shared/memtest86-run-lilo"]["descriptionfr"]="Faut-il exécuter lilo automatiquement après la mise à jour ?
 Si LILO est installé et que son fichier de configuration fait référence à une image de lancement de memtest86 ou memtest86+, il doit être ré-exécuté afin de pouvoir utiliser la nouvelle image.
";
$elem["shared/memtest86-run-lilo"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
