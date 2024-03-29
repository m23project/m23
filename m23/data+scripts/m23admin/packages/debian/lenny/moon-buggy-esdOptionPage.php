<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("moon-buggy-esd");

$elem["moon-buggy-esd/sound_hardware"]["type"]="boolean";
$elem["moon-buggy-esd/sound_hardware"]["description"]="Do you have sound hardware installed?
 The moon-buggy-esd package will only work properly if you have sound
 hardware installed (see Bug #76059). If you want to play moon-buggy, but
 do not have sound hardware, install the moon-buggy package instead.
";
$elem["moon-buggy-esd/sound_hardware"]["descriptionde"]="Haben Sie eine Soundkarte installiert?
 Das moon-buggy-esd-Paket wird nur bei installierter Soundkarte richtig funktionieren. Siehe dazu Bug #76059. Wenn Sie moon-buggy spielen wollen, jedoch keine Soundkarte haben, dann installieren Sie stattdessen das Paket moon-buggy.
";
$elem["moon-buggy-esd/sound_hardware"]["descriptionfr"]="Disposez-vous d'une carte son ?
 Le paquet moon-buggy-esd ne fonctionnera correctement que si une carte son est présente (consultez le bogue #76059). Si vous souhaitez jouer à moon-buggy mais que vous n'avez pas de carte son, installez plutôt le paquet moon-buggy à la place.
";
$elem["moon-buggy-esd/sound_hardware"]["default"]="";
$elem["moon-buggy-esd/no_sound_hardware"]["type"]="note";
$elem["moon-buggy-esd/no_sound_hardware"]["description"]="Not installing moon-buggy-esd
 This package will not work properly without sound hardware.
";
$elem["moon-buggy-esd/no_sound_hardware"]["descriptionde"]="moon-buggy-esd wird nicht installiert
 Dieses Paket wird nicht ohne Soundkarte funktionieren.
";
$elem["moon-buggy-esd/no_sound_hardware"]["descriptionfr"]="Refus d'installer moon-buggy-esd
 Ce paquet ne fonctionnera pas correctement sans carte son.
";
$elem["moon-buggy-esd/no_sound_hardware"]["default"]="";
$elem["moon-buggy-esd/old_score_file"]["type"]="note";
$elem["moon-buggy-esd/old_score_file"]["description"]="Old score file detected!
 A score file was detected in the old location (/var/lib/games). It will be
 moved to the new location (/var/games/moon-buggy) as mbscore.old, your
 current score file (if one is present in the new location) will NOT be
 deleted.
 .
 If you want to keep scores from the old scorefile or replace your current
 score file by the old scores, you must do this by-hand. moon-buggy should
 be able to automatically convert old scorefile formats to the new format.
 .
 The directory /var/lib/games will not be deleted (although I think it
 should be deleted when empty).
";
$elem["moon-buggy-esd/old_score_file"]["descriptionde"]="Alte Spielstandsdatei gefunden!
 Eine Spielstandsdatei wurde im alten Verzeichnis /var/lib/games gefunden. Diese Datei wird jetzt in das neue Verzeichnis /var/games/moon-buggy als mbscore.old verschoben. Ihre aktuelle Spielstandsdatei (soweit vorhanden) wird dadurch NICHT gelöscht.
 .
 Wenn Sie die Spielstände der alten Datei behalten wollen, oder damit Ihre aktuellen Spielstände ersetzen wollen, dann müssen Sie dieses manuell tun. moon-buggy ist in der Lage das alte Spielstandsformat in das neue Format zu konvertieren.
 .
 Das Verzeichnis /var/lib/games wird nicht gelöscht (obwohl der maintainer der Meinung ist, dass dieses Verzeichnis gelöscht werden sollte, wenn es leer ist).
";
$elem["moon-buggy-esd/old_score_file"]["descriptionfr"]="Un ancien fichier de scores a été détecté !
 Un fichier de scores a été détecté dans l'ancien répertoire (/var/lib/games). Il sera déplacé vers le nouvel répertoire (/var/games/moon-buggy) sous le nom mbscore.old. Votre fichier de scores actuel (s'il existait déjà dans le nouvel répertoire) ne sera PAS supprimé.
 .
 Si vous souhaitez conserver les scores de votre ancien fichier de scores ou remplacer le fichier de scores actuel par les anciens scores, vous devez le faire vous-même. Moon-buggy devrait être capable de convertir automatiquement d'anciens fichiers de scores vers le nouveau format.
 .
 Le répertoire /var/lib/games ne sera pas supprimé.
";
$elem["moon-buggy-esd/old_score_file"]["default"]="";
PKG_OptionPageTail2($elem);
?>
