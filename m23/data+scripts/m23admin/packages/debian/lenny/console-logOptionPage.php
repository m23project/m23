<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("console-log");

$elem["console-log/upgrade-note/config-file-format-pre-0.8"]["type"]="note";
$elem["console-log/upgrade-note/config-file-format-pre-0.8"]["description"]="New config file format for /etc/console-log.conf
 console-log's config file format has been changed to a format that is much
 more flexible. Since Debian policy explicitly forbids automatic conversion
 of dpkg-conffiles, the conversion must be done manually.
 .
 The script convert-console-log.conf is provided to help with that. See
 convert-console-log.conf(8) for details.
 .
 If you didn't allow dpkg to replace your config file with the new config
 file from the package, your package will stop working.
 .
 Be aware that your console-log package will stop working if you try to
 invoke the new version with and old-style config file.
";
$elem["console-log/upgrade-note/config-file-format-pre-0.8"]["descriptionde"]="Das Format der Konfigurationsdatei /etc/console-log.conf hat sich geändert
 Das Format der Konfigurationsdatei von console-log ist flexibler geworden. Da die Debian-Policy die automatische Konvertierung von dpkg-conffilesausdrücklich verbietet, muss sie manuell vorgenommen werden.
 .
 Das Skript convert-console-log.conf kann Ihnen dabei helfen. Einzelheiten können Sie in der Manpage convert-console-log.conf(8) nachlesen.
 .
 Wenn Sie Ihre Konfigurationsdatei nicht durch diejenige aus diesem Paket ersetzen lassen, wird console-log nicht mehr funktionieren.
 .
 Bitte beachten Sie, dass console-log nicht mehr korrekt arbeiten wird, wenn Sie versuchen die neue Version mit einer Konfigurationsdatei in der alten Syntax zu starten.
";
$elem["console-log/upgrade-note/config-file-format-pre-0.8"]["descriptionfr"]="Nouveau format du fichier de configuration /etc/console-log.conf
 Le format du fichier de configuration de console-log a changé pour un format plus souple. Comme la charte Debian interdit explicitement la conversion automatique des fichiers de configuration gérés par dpkg, celle-ci doit être faite séparément.
 .
 Le script convert-console-log.conf a été inclus à cet effet. Veuillez consulter la page de manuel convert-console-log.conf(8) pour plus d'informations.
 .
 Si vous n'autorisez pas dpkg à remplacer votre fichier de configuration par le nouveau fichier fourni avec le paquet, le logiciel ne fonctionnera plus.
 .
 Console-log cessera de fonctionner si vous cherchez à utiliser la nouvelle version avec un fichier de configuration utilisant l'ancien format.
";
$elem["console-log/upgrade-note/config-file-format-pre-0.8"]["default"]="";
PKG_OptionPageTail2($elem);
?>
