<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("desktop-profiles");

$elem["desktop-profiles/replace-old-vars"]["type"]="note";
$elem["desktop-profiles/replace-old-vars"]["description"]="Global gconf path file needs to be changed!
 The include directives used by desktop-profiles have changed (in response to
 bug 309978, see the bug report and corresponding entry in the changelog of
 version 1.4.6 of this package for details).
 .
 To reenable gconf profiles you need to change /etc/gconf/2/path as follows:\n
 - 'include /var/cache/desktop-profiles/\$(USER)_mandatory.path' should be
 'include \$(ENV_MANDATORY_PATH)' and\n
 - 'include /var/cache/desktop-profiles/\$(USER)_defaults.path' should be
 'include \$(ENV_DEFAULTS_PATH)'
   
";
$elem["desktop-profiles/replace-old-vars"]["descriptionde"]="Globale Gconf-Pfad-Datei muss geändert werden!
 Die include-Direktiven, die von desktop-profiles verwendet werden, haben sich geändert (in Reaktion auf Fehler 309978, siehe Fehlerbericht und den korrespondierenden Eintrag im Changelog von Version 1.4.6 dieses Paketes zu Einzelheiten).
 .
 Um die Gconf-Profile zu reaktivieren, müssen Sie die Datei /etc/gconf/2/path wie folgt ändern:
  - »include /var/cache/desktop-profiles/\$(USER)_mandatory.path« sollte
    »include \$(ENV_MANDATORY_PATH)« lauten, und
  - »include /var/cache/desktop-profiles/\$(USER)_defaults.path« sollte
    »include \$(ENV_DEFAULTS_PATH)« lauten
";
$elem["desktop-profiles/replace-old-vars"]["descriptionfr"]="Fichier « path » de gconf modifié pour l'ensemble du système
 Les directives « include » utilisées par desktop-profiles ont changé en réponse au bogue 309978, pour davantage d'informations, veuillez consulter le rapport de bogue et l'entrée correspondante du fichier changelog pour la version 1.4.6 de ce paquet.
 .
 Pour réactiver les profils de gconf, vous devrez modifier /etc/gconf/2/path de la manière suivante :
  - « include /var/cache/desktop-profiles/\$(USER)_mandatory.path » doit être remplacé par « include \($ENV_MANDATORY_PATH) » ;
  - « include /var/cache/desktop-profiles/\$(USER)_default.path » doit être remplacé par « include \$(ENV_DEFAULTS_PATH) ».
";
$elem["desktop-profiles/replace-old-vars"]["default"]="";
PKG_OptionPageTail2($elem);
?>
