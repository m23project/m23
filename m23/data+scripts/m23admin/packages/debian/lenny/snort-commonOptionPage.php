<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snort-common");

$elem["snort/deprecated_config"]["type"]="note";
$elem["snort/deprecated_config"]["description"]="Deprecated configuration file
 The Snort configuration file (/etc/snort/snort.conf) uses deprecated
 options no longer available for this Snort release. Snort will not be able to
 start unless you provide a correct configuration file. Either allow the
 configuration file to be replaced with the one provided in this package or fix
 it manually by removing deprecated options.
 .
 The following deprecated options were found in the configuration file:
 ${DEP_CONFIG}
";
$elem["snort/deprecated_config"]["descriptionde"]="Veraltete Konfigurationsdatei
 Die Snort-Konfigurationsdatei (/etc/snort/snort.conf) benutzt veraltete Optionen, die ab dieser Version von Snort nicht mehr gültig sind. Snort kann solange nicht starten, bis Sie eine richtige Konfigurationsdatei erstellen. Sie können entweder Ihre Konfigurationsdatei durch die des Pakets ersetzen oder entfernen die veralteten Optionen selbst.
 .
 Folgende veraltete Optionen wurden in der Konfigurationsdatei gefunden: ${DEP_CONFIG}.
";
$elem["snort/deprecated_config"]["descriptionfr"]="Fichier de configuration obsolète
 Le fichier de configuration de Snort (/etc/snort/snort.conf) utilise des options qui ne sont plus disponibles dans cette version du logiciel. Snort ne pourra pas démarrer tant que le fichier de configuration ne sera pas corrigé. Vous pouvez remplacer ce fichier par celui fourni avec ce paquet ou le corriger vous-même pour supprimer les options obsolètes.
 .
 Liste des options obsolètes dans le fichier de configuration : ${DEP_CONFIG}
";
$elem["snort/deprecated_config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
