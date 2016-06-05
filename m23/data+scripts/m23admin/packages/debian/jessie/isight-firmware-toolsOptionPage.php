<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isight-firmware-tools");

$elem["isight-firmware-tools/extract"]["type"]="boolean";
$elem["isight-firmware-tools/extract"]["description"]="Extract firmware from Apple driver?
 If you choose this option, please make sure that you have access to
 the AppleUSBVideoSupport driver file.
";
$elem["isight-firmware-tools/extract"]["descriptionde"]="Firmware aus dem Apple-Treiber auslesen?
 Falls Sie diese Option wählen, stellen Sie sicher, dass Sie auf die AppleUSBVideoSupport-Treiberdatei zugreifen können.
";
$elem["isight-firmware-tools/extract"]["descriptionfr"]="Faut-il extraire le microcode depuis le pilote Apple ?
 Si vous choisissez cette option, veuillez vérifier que vous avez accès au fichier de pilotes AppleUSBVideoSupport.
";
$elem["isight-firmware-tools/extract"]["default"]="true";
$elem["isight-firmware-tools/driver-location"]["type"]="string";
$elem["isight-firmware-tools/driver-location"]["description"]="Apple driver file location:
";
$elem["isight-firmware-tools/driver-location"]["descriptionde"]="Speicherort der Apple-Treiberdatei:
";
$elem["isight-firmware-tools/driver-location"]["descriptionfr"]="Emplacement du pilote Apple:
";
$elem["isight-firmware-tools/driver-location"]["default"]="/MacOSX/System/Library/Extensions/IOUSBFamily.kext/Contents/PlugIns/AppleUSBVideoSupport.kext/Contents/MacOS/AppleUSBVideoSupport";
$elem["isight-firmware-tools/file_not_exist"]["type"]="note";
$elem["isight-firmware-tools/file_not_exist"]["description"]="Apple driver file not found
 The file you specified does not exist. The firmware extraction has been
 aborted.
";
$elem["isight-firmware-tools/file_not_exist"]["descriptionde"]="Apple-Treiberdatei nicht gefunden
 Die von Ihnen angegebene Datei existiert nicht. Das Auslesen der Firmware wurde abgebrochen.
";
$elem["isight-firmware-tools/file_not_exist"]["descriptionfr"]="Fichier de pilote Apple introuvable
 Le fichier que vous avez indiqué n'existe pas. L'extraction du microcode a été abandonnée.
";
$elem["isight-firmware-tools/file_not_exist"]["default"]="";
$elem["isight-firmware-tools/extract_success"]["type"]="text";
$elem["isight-firmware-tools/extract_success"]["description"]="Firmware extracted successfully
 The iSight firmware has been extracted successfully.
";
$elem["isight-firmware-tools/extract_success"]["descriptionde"]="Firmware erfolgreich ausgelesen
 Die iSight-Firmware wurde erfolgreich ausgelesen.
";
$elem["isight-firmware-tools/extract_success"]["descriptionfr"]="Extraction du microcode terminée
 L'extraction du microcode iSight s'est déroulée normalement.
";
$elem["isight-firmware-tools/extract_success"]["default"]="";
$elem["isight-firmware-tools/extract_fail"]["type"]="text";
$elem["isight-firmware-tools/extract_fail"]["description"]="Failed to extract firmware
 The firmware extraction failed. Please check that the file you
 specified is a valid firmware file.
";
$elem["isight-firmware-tools/extract_fail"]["descriptionde"]="Auslesen der Firmware fehlgeschlagen
 Das Auslesen der Firmware ist fehlgeschlagen. Bitte überprüfen Sie, ob die von Ihnen angegebene Datei eine gültige Firmware-Datei ist.
";
$elem["isight-firmware-tools/extract_fail"]["descriptionfr"]="Échec de l'extraction du microcode
 L'extraction du microcode a échoué. Veuillez vérifier que le fichier indiqué est bien un ficher de microcode.
";
$elem["isight-firmware-tools/extract_fail"]["default"]="";
PKG_OptionPageTail2($elem);
?>
