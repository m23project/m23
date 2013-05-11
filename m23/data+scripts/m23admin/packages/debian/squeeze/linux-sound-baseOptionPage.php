<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-sound-base");

$elem["linux-sound-base/sound_system"]["type"]="select";
$elem["linux-sound-base/sound_system"]["choices"][1]="ALSA";
$elem["linux-sound-base/sound_system"]["choices"][2]="OSS";
$elem["linux-sound-base/sound_system"]["choicesde"][1]="ALSA";
$elem["linux-sound-base/sound_system"]["choicesde"][2]="OSS";
$elem["linux-sound-base/sound_system"]["choicesfr"][1]="ALSA";
$elem["linux-sound-base/sound_system"]["choicesfr"][2]="OSS";
$elem["linux-sound-base/sound_system"]["description"]="Sound system to use:
 ALSA and OSS are alternative systems of drivers for
 sound hardware.
 .
 Selecting ALSA or OSS will enforce the use of such a driver
 even in cases where both drivers exist.
 .
 Choosing the \"default\" option will mean this decision is left to the
 hardware detection mechanism, and may depend upon the kernel version.
 Removing the linux-sound-base package effectively puts the system
 into \"default\" mode.
 .
 Choosing the ALSA sound system is strongly recommended.
";
$elem["linux-sound-base/sound_system"]["descriptionde"]="Zu verwendendes Sound-System:
 ALSA und OSS sind zwei verschiedene Systeme für Soundkarten-Treiber.
 .
 Die Auswahl von ALSA oder OSS erzwingt die Verwendung dieses Treibers selbst falls beide Treiber existieren.
 .
 Bei der Auswahl der »Standard«-Option verbleibt die Entscheidung bei dem System zur Hardware-Erkennung und kann von der Kernelversion abhängen. Wird das Paket linux-sound-base entfernt, kommt das System praktisch in den »Standard«-Modus.
 .
 Die Wahl des ALSA-Soundsystems wird nachdrücklich empfohlen.
";
$elem["linux-sound-base/sound_system"]["descriptionfr"]="Système de gestion du son à utiliser :
 ALSA et OSS sont deux systèmes différents de pilotes pour les périphériques de gestion du son.
 .
 Choisir ALSA ou OSS revient à forcer l'utilisation du pilote concerné même lorsque les deux pilotes sont disponibles.
 .
 En choisissant « Système par défaut », le pilote à utiliser sera choisi automatiquement par le mécanisme de détection du matériel et pourra dépendre de la version du noyau. Si le paquet « linux-sound-base » est supprimé, le système utilisera le mode « Système par défaut ».
 .
 Il est conseillé de choisir « ALSA ».
";
$elem["linux-sound-base/sound_system"]["default"]="ALSA";
PKG_OptionPageTail2($elem);
?>
