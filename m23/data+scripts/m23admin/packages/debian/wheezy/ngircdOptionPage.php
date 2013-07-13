<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ngircd");

$elem["ngircd/conversion-do"]["type"]="boolean";
$elem["ngircd/conversion-do"]["description"]="Convert ngIRCd configuration?
 In version 18, the ngIRCd configuration file format has changed.
 .
 You can choose to update the existing configuration or leave
 it unmodified. The former configuration file format is still
 supported.
";
$elem["ngircd/conversion-do"]["descriptionde"]="Konfiguration von ngIRCd umwandeln?
 In Version 18 hat sich das Format der ngIRCd-Konfigurationsdatei geändert.
 .
 Sie haben die Wahl, die bestehende Konfiguration unverändert zu übernehmen oder sie zu aktualisieren. Das frühere Format der Konfigurationsdatei wird weiterhin unterstützt.
";
$elem["ngircd/conversion-do"]["descriptionfr"]="Convertir la configuration de ngIRCd ?
 Dans la version 18, le format du fichier de configuration de ngIRCd a changé.
 .
 Vous pouvez mettre à jour la configuration existante ou la laisser inchangée. Le format de l'ancien fichier de configuration est toujours pris en charge.
";
$elem["ngircd/conversion-do"]["default"]="";
$elem["ngircd/broken-oldconfig"]["type"]="text";
$elem["ngircd/broken-oldconfig"]["description"]="Configuration conversion failure
 The current configuration file contains errors and cannot
 be converted. 
 .
 You should check the configuration file by running
 \"ngircd --configtest\", fix any errors, and run \"dpkg-reconfigure ngircd\"
 to retry the conversion process.
";
$elem["ngircd/broken-oldconfig"]["descriptionde"]="Umwandlung der Konfiguration fehlgeschlagen
 Die aktuelle Konfigurationsdatei enthält Fehler und kann nicht umgewandelt werden.
 .
 Sie sollten die Konfigurationsdatei mit »ngircd --configtest« prüfen, die gefundenen Fehler beheben und den Umwandlungsprozess mittels »dpkg-reconfigure ngircd« erneut versuchen.
";
$elem["ngircd/broken-oldconfig"]["descriptionfr"]="Échec de la conversion du fichier
 Le fichier de configuration actuel contient des erreurs et ne peut être converti.
 .
 Vous devriez contrôler le fichier de configuration en exécutant « ngircd --configtest », corriger les éventuelles erreurs, puis exécuter « dpkg-reconfigure ngircd » pour réessayer la conversion.
";
$elem["ngircd/broken-oldconfig"]["default"]="";
$elem["ngircd/conversion-fail"]["type"]="text";
$elem["ngircd/conversion-fail"]["description"]="Converted configuration file error
 The converted configuration failed validation checks.
 .
 This should not happen and should therefore be reported as a bug.
 Please include the configuration file in the bug report with
 passwords removed.
 .
 The following difference file may help tracking this issue:
 .
  ${DIFF}
";
$elem["ngircd/conversion-fail"]["descriptionde"]="Fehler beim Umwandeln der Konfigurationsdatei
 Die umgewandelte Konfiguration bestand die Gültigkeitsprüfungen nicht.
 .
 Dies sollte nicht vorkommen und daher als Fehler gemeldet werden. Bitte fügen Sie die Konfigurationsdatei dem Fehlerbericht bei. Denken Sie daran, die Passwörter zu entfernen.
 .
 Die folgende Datei mit Unterschieden könnte bei der Verfolgung dieses Problems helfen:
 .
  ${DIFF}
";
$elem["ngircd/conversion-fail"]["descriptionfr"]="Erreur dans le fichier de configuration converti
 Les tests de validation de la configuration convertie ont échoué.
 .
 Cela ne devrait pas se produire et devrait donc être signalé en tant que bogue. Veuillez inclure le fichier de configuration dans le rapport de bogue sans les mots de passe.
 .
 Le fichier de différences suivant pourrait aider à comprendre le problème :
 .
  ${DIFF}
";
$elem["ngircd/conversion-fail"]["default"]="";
PKG_OptionPageTail2($elem);
?>
