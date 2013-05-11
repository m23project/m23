<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vdr-plugin-remote");

$elem["vdr-plugin-remote/install_evdev"]["type"]="boolean";
$elem["vdr-plugin-remote/install_evdev"]["description"]="Try to automatically load the evdev module?
 Enable this, if you want a setup which automatically loads the evdev module,
 needed by the remote-plugin.
 .
 This script will try to load the module evdev and, if this is successful, 
 it will add a new entry for evdev to your /etc/modules.
 .
 If this fails, your kernel maybe does not have evdev support, and you will
 need to rebuild your kernel with the CONFIG_INPUT_EVDEV option enabled.
";
$elem["vdr-plugin-remote/install_evdev"]["descriptionde"]="Soll versucht werden, das Kernel-Modul evdev automatisch zu laden?
 Aktivieren Sie diese Option, wenn Sie wollen, dass das vom Remote-Plugin benötigte Kernel-Modul evdev automatisch geladen wird.
 .
 Dieses Skript wird versuchen, das Modul evdev zu laden. Sollte es gelingen, so wird das Skript für evdev einen neuen Eintrag zur /etc/modules hinzufügen.
 .
 Sollte es misslingen, so könnte das bedeuten, dass Ihr Kernel kein evdev unterstützt. Sie werden Ihren Kernel dann neu bauen müssen, wobei die Option CONFIG_INPUT_EVDEV gesetzt sein muss.
";
$elem["vdr-plugin-remote/install_evdev"]["descriptionfr"]="Faut-il charger automatiquement le module « evdev » ?
 Choisissez cette option si vous souhaitez que le module « evdev » soit chargé automatiquement. Ce module est requis par remote-plugin.
 .
 Ce script est sur le point de charger le module « evdev ». Si le chargement réussit, une nouvelle ligne sera ajoutée à /etc/modules.
 .
 Si le chargement échoue, cela signifie que la gestion de « evdev » n'est pas incluse dans votre noyau. Vous devrez le recompiler en activant l'option CONFIG_INPUT_EVDEV.
";
$elem["vdr-plugin-remote/install_evdev"]["default"]="false";
$elem["vdr-plugin-remote/error-evdev"]["type"]="note";
$elem["vdr-plugin-remote/error-evdev"]["description"]="Error loading evdev module
 The evdev module could not be loaded, probably your kernel has builtin-support
 for evdev, or your kernel is missing evdev support.
";
$elem["vdr-plugin-remote/error-evdev"]["descriptionde"]="Fehler beim Laden des evdev-Moduls.
 Das evdev-Modul konnte nicht geladen werden. Wahrscheinlich ist die evdev-Unterstützung fest in Ihren Kernel eingebaut oder fehlt.
";
$elem["vdr-plugin-remote/error-evdev"]["descriptionfr"]="Erreur lors du chargement du module « evdev »
 Le module « evdev » n'a pu être chargé. Votre noyau gère peut-être déjà « evdev » en interne, ou n'inclut pas la gestion pour « evdev ».
";
$elem["vdr-plugin-remote/error-evdev"]["default"]="";
PKG_OptionPageTail2($elem);
?>
