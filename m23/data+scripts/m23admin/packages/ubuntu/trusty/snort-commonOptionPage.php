<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snort-common");

$elem["snort/deprecated_config"]["type"]="note";
$elem["snort/deprecated_config"]["description"]="Deprecated options in configuration file
 The Snort configuration file (/etc/snort/snort.conf) uses deprecated
 options no longer available for this Snort release. Snort will not be able to
 start unless you provide a correct configuration file. Either allow the
 configuration file to be replaced with the one provided in this package or fix
 it manually by removing deprecated options.
 .
 The following deprecated options were found in the configuration file:
 ${DEP_CONFIG}
";
$elem["snort/deprecated_config"]["descriptionde"]="Missbilligte Optionen in der Konfigurationsdatei
 Die Snort-Konfigurationsdatei (/etc/snort/snort.conf) benutzt missbilligte Optionen, die ab dieser Version von Snort nicht mehr gültig sind. Snort kann solange nicht starten, bis Sie eine korrekte Konfigurationsdatei bereitstellen. Sie können entweder Ihre Konfigurationsdatei durch die disees Pakets ersetzen oder Sie entfernen die missbilligten Optionen selbst.
 .
 Folgende missbilligte Optionen wurden in der Konfigurationsdatei gefunden: ${DEP_CONFIG}.
";
$elem["snort/deprecated_config"]["descriptionfr"]="Fichier de configuration avec des options obsolètes
 Le fichier de configuration de Snort (/etc/snort/snort.conf) utilise des options qui ne sont plus disponibles dans cette version du logiciel. Snort ne pourra pas démarrer tant que le fichier de configuration ne sera pas corrigé. Vous pouvez remplacer ce fichier par celui fourni avec le paquet ou le corriger vous-même pour supprimer les options obsolètes.
 .
 Liste des options obsolètes dans le fichier de configuration : ${DEP_CONFIG}
";
$elem["snort/deprecated_config"]["default"]="";
$elem["snort/config_error"]["type"]="error";
$elem["snort/config_error"]["description"]="Configuration error
 The current Snort configuration is invalid and will prevent Snort
 starting up normally. Please review and correct it.
 .
 To diagnose errors in your Snort configuration you can run (as root)
 the following: \"/usr/sbin/snort -T -c /etc/snort/snort.conf\"
";
$elem["snort/config_error"]["descriptionde"]="Konfigurationsfehler
 Die aktuelle Konfiguration von Snort ist ungültig und verhindert dessen normalen Start. Bitte kontrollieren und berichtigen Sie diese.
 .
 Führen Sie (als Root) den Befehl »/usr/sbin/snort -T -c /etc/snort/snort.conf« aus, um Fehler in Ihrer Konfiguration von Snort zu finden.
";
$elem["snort/config_error"]["descriptionfr"]="Erreur de configuration
 La configuration actuelle de Snort n'est pas valable et l'empêchera de démarrer. Veuillez la contrôler et la corriger.
 .
 Le diagnostic des erreurs du fichier de configuration de Snort peut se faire (comme superutilisateur) avec la commande « /usr/sbin/snort -T -c /etc/snort/snort.conf ».
";
$elem["snort/config_error"]["default"]="";
$elem["snort/deprecated_file"]["type"]="note";
$elem["snort/deprecated_file"]["description"]="Deprecated configuration file
 Your system has deprecated configuration files which should not be used any
 longer and might contain deprecated options. If included through the standard
 configuration file (/etc/snort/snort.conf), they might prevent Snort from
 starting up properly.
 . 
 Please remove these files as well as any existing references to them in the
 /etc/snort/snort.conf configuration file.
 .
 The following deprecated configuration files were found:
 ${DEP_FILE}
";
$elem["snort/deprecated_file"]["descriptionde"]="Missbilligte Konfigurationsdatei
 Ihr System hat missbilligte Konfigurationsdateien, die nicht länger benutzt werden sollten. Diese könnten missbilligte Optionen enthalten. Falls sie über die Standardkonfigurationsdatei (/etc/snort/snort.conf) eingefügt wurden, können sie verhindern, dass Snort korrekt startet.
 .
 Bitte entfernen Sie diese Dateien ebenso wie bestehende Verweise darauf in der Konfigurationsdatei /etc/snort/snort.conf.
 .
 Die folgenden missbilligten Konfigurationsdateien wurden gefunden: ${DEP_FILE}
";
$elem["snort/deprecated_file"]["descriptionfr"]="Fichier de configuration obsolète
 Le système contient des fichiers de configuration obsolètes qui ne doivent plus être utilisés et pouvant contenir des options obsolètes. S’ils sont utilisés par le fichier de configuration standard (/etc/snort/snort.conf), ils peuvent empêcher Snort de démarrer correctement. 
 .
 Veuillez supprimer ces fichiers ainsi que toutes leurs références dans le fichier de configuration /etc/snort/snort.conf. 
 .
 Liste des fichiers de configuration obsolètes : ${DEP_FILE}
";
$elem["snort/deprecated_file"]["default"]="";
PKG_OptionPageTail2($elem);
?>
