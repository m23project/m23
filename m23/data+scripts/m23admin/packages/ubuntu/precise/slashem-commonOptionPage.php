<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slashem-common");

$elem["slashem-common/backup-incompatible"]["type"]="select";
$elem["slashem-common/backup-incompatible"]["choices"][1]="abort";
$elem["slashem-common/backup-incompatible"]["choices"][2]="backup";
$elem["slashem-common/backup-incompatible"]["choices"][3]="purge";
$elem["slashem-common/backup-incompatible"]["choicesde"][1]="Abbrechen";
$elem["slashem-common/backup-incompatible"]["choicesde"][2]="Sichern";
$elem["slashem-common/backup-incompatible"]["choicesde"][3]="Löschen";
$elem["slashem-common/backup-incompatible"]["choicesfr"][1]="Abandonner l'installation";
$elem["slashem-common/backup-incompatible"]["choicesfr"][2]="Sauvegarder";
$elem["slashem-common/backup-incompatible"]["choicesfr"][3]="Purger";
$elem["slashem-common/backup-incompatible"]["description"]="Should Slash'em back up your old, incompatible save files?
 You are upgrading from a version of Slashe'em whose save files are not
 compatible with the version you are upgrading to. You may either have them
 backed up into /tmp, purge them, ignore this problem completely, or abort
 this installation and manually handle Slashem's save files.
 .
 If you choose to back up, the files will be backed up into a
 gzip-compressed tar archive in /tmp with a random name starting with
 'slash' and ending in '.tar.gz'.
";
$elem["slashem-common/backup-incompatible"]["descriptionde"]="Soll Slash'em Ihre alten, inkompatiblen gespeicherten Dateien sichern?
 Sie führen ein Upgrade von einer Version von Slash'em durch, deren gespeicherte Dateien nicht mit der Version kompatibel sind, die Sie gerade installieren. Sie können diese entweder in /tmp sichern, löschen, das Problem vollständig ignorieren, oder die Installation abbrechen und Slash'ems Dateien manuell verwalten.
 .
 Falls Sie sich entscheiden, die Dateien zu sichern, werden sie in ein gzip-komprimiertes tar-Archiv mit zufälligem Namen, der mit »slash« anfängt und in »tar.gz« endet, in /tmp gesichert.
";
$elem["slashem-common/backup-incompatible"]["descriptionfr"]="Action sur les anciens fichiers de format incompatible :
 L'opération en cours est une mise à niveau de Slash'em à partir d'une version dont les fichiers de sauvegarde ne sont pas compatibles avec cette nouvelle version du logiciel. Vous pouvez les sauvegarder dans /tmp, les purger, ignorer complètement ce problème ou bien abandonner cette installation et gérer vous-même les fichiers de sauvegarde de Slash'em.
 .
 Si vous choisissez de sauvegarder les fichiers, ils le seront sous forme d'archives tar compressées par gzip. Elles seront créées dans /tmp avec un nom aléatoire commençant par « slash » et se terminant par « .tar.gz ».
";
$elem["slashem-common/backup-incompatible"]["default"]="backup";
$elem["slashem-common/do-backup"]["type"]="select";
$elem["slashem-common/do-backup"]["choices"][1]="abort";
$elem["slashem-common/do-backup"]["choices"][2]="backup";
$elem["slashem-common/do-backup"]["choices"][3]="purge";
$elem["slashem-common/do-backup"]["choicesde"][1]="Abbrechen";
$elem["slashem-common/do-backup"]["choicesde"][2]="Sichern";
$elem["slashem-common/do-backup"]["choicesde"][3]="Löschen";
$elem["slashem-common/do-backup"]["choicesfr"][1]="Abandonner l'installation";
$elem["slashem-common/do-backup"]["choicesfr"][2]="Sauvegarder";
$elem["slashem-common/do-backup"]["choicesfr"][3]="Purger";
$elem["slashem-common/do-backup"]["description"]="Should Slash'em back up your old, incompatible save files?
 You are upgrading from a version of Slashe'em whose save files are not
 compatible with the version you are upgrading to. You may either have them
 backed up into /tmp, purge them, ignore this problem completely, or abort
 this installation and manually handle Slashem's save files.
 .
 If you choose to back up, the files will be backed up into a
 gzip-compressed tar archive in /tmp with a random name starting with
 'slash' and ending in '.tar.gz'.
";
$elem["slashem-common/do-backup"]["descriptionde"]="Soll Slash'em Ihre alten, inkompatiblen gespeicherten Dateien sichern?
 Sie führen ein Upgrade von einer Version von Slash'em durch, deren gespeicherte Dateien nicht mit der Version kompatibel sind, die Sie gerade installieren. Sie können diese entweder in /tmp sichern, löschen, das Problem vollständig ignorieren, oder die Installation abbrechen und Slash'ems Dateien manuell verwalten.
 .
 Falls Sie sich entscheiden, die Dateien zu sichern, werden sie in ein gzip-komprimiertes tar-Archiv mit zufälligem Namen, der mit »slash« anfängt und in »tar.gz« endet, in /tmp gesichert.
";
$elem["slashem-common/do-backup"]["descriptionfr"]="Action sur les anciens fichiers de format incompatible :
 L'opération en cours est une mise à niveau de Slash'em à partir d'une version dont les fichiers de sauvegarde ne sont pas compatibles avec cette nouvelle version du logiciel. Vous pouvez les sauvegarder dans /tmp, les purger, ignorer complètement ce problème ou bien abandonner cette installation et gérer vous-même les fichiers de sauvegarde de Slash'em.
 .
 Si vous choisissez de sauvegarder les fichiers, ils le seront sous forme d'archives tar compressées par gzip. Elles seront créées dans /tmp avec un nom aléatoire commençant par « slash » et se terminant par « .tar.gz ».
";
$elem["slashem-common/do-backup"]["default"]="backup";
PKG_OptionPageTail2($elem);
?>
