<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("amavisd-new");

$elem["amavisd-new/outdated_config_style_warning"]["type"]="note";
$elem["amavisd-new/outdated_config_style_warning"]["description"]="Incompatible configuration file layout detected
 The Debian packages have changed the way they handle configuration files
 for amavisd-new to a better system, which uses multiple files instead of a
 single, monolithic file.
 .
 The old amavisd-new configuration files that are still present in your
 system (named either /etc/amavisd.conf or /etc/amavis/amavisd.conf) are
 incompatible with this new config file layout.
 .
 You should read /usr/share/doc/amavisd-new/README.Debian to understand the
 new configuration layout, and after that you should port your
 configuration to the new layout.
 .
 For your safety, the old configuration files in your system have been
 disabled, and a \".disabled\" postfix was added to their file names.  The
 amavisd-new service will refuse to start until you remove (or rename)
 these \".disabled\" files.
 .
 This safety is in place to avoid starting an unconfigured amavisd-new in
 place of your previously configured one.  Do not remove the \".disabled\"
 files until you have read the /usr/share/doc/amavisd-new/README.Debian
 file and ported your old configuration to the new layout.
";
$elem["amavisd-new/outdated_config_style_warning"]["descriptionde"]="Inkompatible Struktur in der Konfigurationsdatei erkannt
 In den Debian-Paketen wurde der Umgang mit Konfigurationsdateien für Amavisd-new geändert. Es wird jetzt ein besseres System eingesetzt, das mehrere Dateien statt einer einzigen, monolithischen Datei verwendet.
 .
 Die alten Amavisd-new-Konfigurationsdateien, die noch in Ihrem System vorhanden sind (sie heißen entweder /etc/amavisd.conf oder /etc/amavis/amavisd.conf) sind nicht mit dieser neuen Struktur der Konfigurationsdateien kompatibel.
 .
 Sie sollten /usr/share/doc/amavisd-new/README.Debian lesen, um die neue Struktur der Konfiguration zu verstehen. Danach sollten Sie Ihre Konfiguration an die neue Struktur anpassen.
 .
 Zu Ihrer Sicherheit wurden die alten Konfigurationsdateien deaktiviert und eine ».disabled«-Endung wurde ihren Dateinamen hinzugefügt. Der Amavisd-new-Dienst wird nicht starten, bis Sie diese ».disabled«-Dateien entfernt oder umbenannt haben.
 .
 Diese Sicherheitsmaßnahme verhindert, dass Sie ein nicht-konfiguriertes Amavisd-new statt Ihres bisher konfigurierten starten. Entfernen Sie die ».disabled«-Dateien nicht, bevor Sie die Datei /usr/share/doc/amavisd-new/README.Debian gelesen und Ihre Konfigurationsdatei auf die neue Struktur angepasst haben.
";
$elem["amavisd-new/outdated_config_style_warning"]["descriptionfr"]="Organisation incorrecte du fichier de configuration
 La gestion des fichiers de configuration d'amavisd-new a changé et ce paquet utilise désormais plusieurs fichiers à la place d'un seul.
 .
 Les anciens fichiers de configuration d'amavisd-new qui sont toujours présents sur votre système (appelés /etc/amavisd.conf ou /etc/amavis/amavisd.conf) sont incompatibles avec cette nouvelle organisation du fichier de configuration.
 .
 Veuillez consulter le fichier /usr/share/doc/amavisd-new/README.Debian pour comprendre la nouvelle organisation de la configuration. Vous devrez ensuite migrer votre configuration vers la nouvelle organisation.
 .
 Pour votre sécurité, les anciens fichiers de configuration ont été désactivés et une extension « .disabled » a été ajoutée aux noms des fichiers. Le service amavisd-new ne démarrera pas si vous ne supprimez (ou renommez) pas ces fichiers « .disabled ».
 .
 Cette précaution permet d'éviter de démarrer amavisd-new sans qu'il ait été configuré à la place de votre précédente version opérationnelle. Ne supprimez pas les fichiers « .disabled » sans avoir lu le fichier /usr/share/doc/amavisd-new/README.Debian et migré votre ancienne configuration vers la nouvelle organisation.
";
$elem["amavisd-new/outdated_config_style_warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
