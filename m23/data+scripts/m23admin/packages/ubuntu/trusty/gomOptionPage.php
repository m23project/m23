<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gom");

$elem["gom/auto_init"]["type"]="boolean";
$elem["gom/auto_init"]["description"]="Initialize mixer on system startup?
 If you choose this option, \"/etc/init.d/gom start\" (on system
 startup, or if run manually) will set mixer settings to your saved
 configuration.
 .
 You may use upstream's \"gomconfig\" script as root later to fine-tune
 the settings.
";
$elem["gom/auto_init"]["descriptionde"]="Mischpult beim Systemstart initialisieren?
 Falls Sie diese Option wählen, wird »/etc/init.d/gom start« (beim Systemstart oder falls Sie es manuell ausführen) Ihr Mischpult auf die gespeicherte Konfiguration einstellen.
 .
 Sie können später als Benutzer Root das Skript »gomconfig« der Originalautoren verwenden, um Feineinstellungen vorzunehmen.
";
$elem["gom/auto_init"]["descriptionfr"]="Faut-il initialiser la table de mixage au démarrage ?
 Si vous choisissez cette option, la commande « /etc/init.d/gom start » (lancée au démarrage ou manuellement) appliquera votre propre configuration de la table de mixage, préalablement sauvegardée.
 .
 Vous pourrez plus tard utiliser le script « gomconfig » avec les privilèges du superutilisateur pour adapter ces réglages.
";
$elem["gom/auto_init"]["default"]="false";
$elem["gom/valid_sound_devices"]["type"]="string";
$elem["gom/valid_sound_devices"]["description"]="Space-separated list of valid sound devices:
 If none of these device names exists in /proc/devices,
 /etc/init.d/gom will exit silently (so it does not produce errors if
 the system has no sound at all).
 .
 You would usually not touch the default value (\"sound\" is OSS, \"alsa\"
 is ALSA).
";
$elem["gom/valid_sound_devices"]["descriptionde"]="Durch Leerzeichen getrennte Liste gültiger Audiogeräte:
 Wenn keiner dieser Gerätenamen in /proc/devices vorhanden ist, wird sich /etc/init.d/gom still beenden (also keine Fehler ausgeben, wenn das System überhaupt keinen Ton hat).
 .
 Normalerweise werden Sie den Vorgabewert nicht ändern (»sound« steht für OSS, »alsa« für ALSA).
";
$elem["gom/valid_sound_devices"]["descriptionfr"]="Liste (séparés par des espaces) de périphériques audio :
 Si aucun des noms de périphériques n'existe dans /proc/devices, /etc/init.d/gom se terminera silencieusement. Ainsi, aucune erreur ne sera rencontrée au cas où le système ne comporte pas de dispositif sonore.
 .
 Il est en général inutile de modifier la valeur par défaut (utiliser « sound » pour les périphériques OSS et « alsa » pour les périphériques ALSA).
";
$elem["gom/valid_sound_devices"]["default"]="sound alsa";
$elem["gom/purge_etc_gom"]["type"]="boolean";
$elem["gom/purge_etc_gom"]["description"]="Remove /etc/gom completely?
 The /etc/gom directory seems to contain additional local
 customization files. Please choose whether you want to remove it
 entirely.
";
$elem["gom/purge_etc_gom"]["descriptionde"]="/etc/gom komplett entfernen?
 Das Verzeichnis /etc/gom scheint zusätzliche lokale Anpassungsdateien zu enthalten. Bitte wählen Sie, ob Sie es komplett entfernen wollen.
";
$elem["gom/purge_etc_gom"]["descriptionfr"]="Faut-il supprimer complètement /etc/gom ?
 Le répertoire /etc/gom semble contenir des fichiers de paramétrages locaux. Veuillez choisir si vous souhaitez le supprimer complètement.
";
$elem["gom/purge_etc_gom"]["default"]="true";
$elem["gom/remove_obsolete_rcboot"]["type"]="boolean";
$elem["gom/remove_obsolete_rcboot"]["description"]="Remove obsoleted /etc/rc.boot/gom?
 The /etc/rc.boot/gom file is obsoleted but might contain local
 customizations.
";
$elem["gom/remove_obsolete_rcboot"]["descriptionde"]="Veraltete Datei /etc/rc.boot/gom entfernen?
 Die Datei /etc/rc.boot/gom ist veraltet, könnte aber lokale Anpassungen enthalten.
";
$elem["gom/remove_obsolete_rcboot"]["descriptionfr"]="Faut-il supprimer le fichier obsolète /etc/rc.boot/gom ?
 Le fichier /etc/rc.boot/gom n'est plus utilisé mais pourrait contenir des paramétrages locaux.
";
$elem["gom/remove_obsolete_rcboot"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
