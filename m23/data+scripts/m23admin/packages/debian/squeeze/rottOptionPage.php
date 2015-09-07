<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rott");

$elem["rott/shareware"]["type"]="boolean";
$elem["rott/shareware"]["description"]="Download shareware data files?
 The Rise of the Triad game requires additional data files which are
 not available under a free license and cannot be distributed by
 Debian. You may choose to automatically download the shareware data
 files from the Internet and install them on the system now.
 .
 The installation will require about 15 MB of free disk space.
";
$elem["rott/shareware"]["descriptionde"]="Shareware-Datendateien herunterladen?
 Das Spiel »Rise of the Triad« benötigt zusätzliche Datendateien, die nicht unter einer freien Lizenz verfügbar sind und von Debian nicht vertrieben werden können. Bitte wählen sie, ob die Shareware-Daten jetzt automatisch aus dem Internet heruntergeladen und auf Ihrem System installiert werden sollen.
 .
 Die Installation wird etwa 15 MB freien Festplattenspeicher benötigen.
";
$elem["rott/shareware"]["descriptionfr"]="Faut-il télécharger les fichiers de données du partagiciel ?
 Le jeu « The Rise of the Triad » a besoin de fichiers de données supplémentaires qui ne sont pas disponibles sous une licence libre et ne peuvent pas être distribués par Debian. Vous pouvez les télécharger automatiquement sur l'Internet et les installer maintenant sur le système.
 .
 L'installation a besoin d'environ 15 Mo d'espace disque.
";
$elem["rott/shareware"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
