<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cryptsetup");

$elem["cryptsetup/prerm_active_mappings"]["type"]="boolean";
$elem["cryptsetup/prerm_active_mappings"]["description"]="Continue with cryptsetup removal?
 This system has unlocked dm-crypt devices: ${cryptmap}
 .
 If these devices are managed with cryptsetup, you might be unable to
 lock the devices after the package removal, though other tools can be
 used for managing dm-crypt devices. Any system shutdown or reboot will
 lock the devices.
 .
 Do not choose this option if you want to lock the dm-crypt devices
 before package removal.
";
$elem["cryptsetup/prerm_active_mappings"]["descriptionde"]="Mit der Entfernung von Cryptsetup fortfahren?
 Dieses System verfügt über entsperrte dm-crypt-Geräte: ${cryptmap}
 .
 Wenn diese Geräte über Cryptsetup verwaltet werden, werden Sie nach der Entfernung des Pakets möglicherweise nicht mehr in der Lage sein, sie zu sperren, obwohl für die Handhabung von dm-crypt-verschlüsselten Geräten auch andere Werkzeuge bereit stehen. Jedes Herunterfahren oder Neustarten wird die Geräte sperren.
 .
 Wählen Sie diese Option nicht, wenn Sie die dm-crypt-verschlüsselten Geräte vor der Entfernung des Pakets sperren wollen.
";
$elem["cryptsetup/prerm_active_mappings"]["descriptionfr"]="Poursuivre la suppression de cryptsetup ?
 Ce système a déverrouillé des périphériques dm-crypt : ${cryptmap}
 .
 Si ces périphériques sont gérés avec cryptsetup, il pourrait devenir impossible de les verrouiller après la suppression du paquet. Cependant, d'autres outils existent pour gérer des périphériques dm-crypt. Dans tous les cas, un arrêt ou redémarrage du système verrouillera les périphériques.
 .
 Ne sélectionnez pas cette option si vous souhaitez verrouiller les périphériques dm-crypt avant la suppression du paquet.
";
$elem["cryptsetup/prerm_active_mappings"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
