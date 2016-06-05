<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nethack-common");

$elem["nethack-common/recover-setgid"]["type"]="boolean";
$elem["nethack-common/recover-setgid"]["description"]="Use setgid bit with NetHack's recover utility?
 The \"recover\" program in the package nethack-common is traditionally
 installed with the \"setgid\" bit set, so that all users can use it to
 recover their own save files after a crash (with \"games\" group
 privileges). This is a potential source of security problems.
 .
 This package includes a script that runs during system boot, invoking
 recover on any broken save files it finds. This makes it less likely
 that users will need to run it themselves, so the default is to install
 recover without the special permission bits required for that.
 .
 If you choose this option, unprivileged users will be able to run \"recover\".
";
$elem["nethack-common/recover-setgid"]["descriptionde"]="Setgid-Bit für NetHacks »recover«-Hilfswerkzeug verwenden?
 Das Programm »recover« im Paket nethack-common wird traditionell mit gesetztem »setgid«-Bit installiert, so dass es alle Benutzer (mit den Privilegien der Gruppe »games«) für die Wiederherstellung ihrer eigenen, gespeicherten Dateien nach einem Absturz verwenden können. Dies ist eine mögliche Quelle für Sicherheitsprobleme.
 .
 Dieses Paket enthält ein Skript, das während des Systemstarts läuft und »recover« auf jede gefundene defekte Speicherdatei anwendet. Dies reduziert die Wahrscheinlichkeit, dass Benutzer selbst »recover« ausführen müssen, daher wird »recover« standardmäßig ohne die hierzu notwendigen besonderen Rechte-Bits installiert.
 .
 Falls Sie diese Option auswählen, können nicht-privilegierte Benutzer »recover« ausführen.
";
$elem["nethack-common/recover-setgid"]["descriptionfr"]="Faut-il exécuter recover avec les privilèges du groupe « games » ?
 Le programme « recover » du paquet nethack-common est généralement installé avec le bit segid positionné. Ainsi, tous les utilisateurs appartenant au groupe « games » pourront l'utiliser pour récupérer leurs fichiers de sauvegarde après un plantage. Ce réglage comporte toutefois un risque de sécurité potentiel.
 .
 Ce paquet fournit un script qui est exécuté au démarrage du système. Il appelle l'outil de récupération sur tout fichier de sauvegarde corrompu trouvé. Comme il est peu probable que les utilisateurs doivent l'exécuter eux-mêmes, recover est par défaut installé normalement.
 .
 Si vous choisissez cette option, les utilisateurs sans privilège pourront exécuter « recover ».
";
$elem["nethack-common/recover-setgid"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
