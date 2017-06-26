<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debian-security-support");

$elem["debian-security-support/ended"]["type"]="text";
$elem["debian-security-support/ended"]["description"]="Ended security support for one or more packages
 Unfortunately, it has been necessary to end security support for some
 packages before the end of the regular security maintenance life cycle.
 .
 The following packages found on this system are affected by this:
 .
 ${MESSAGE}
";
$elem["debian-security-support/ended"]["descriptionde"]="Ende der Versorgung mit Sicherheitsaktualisierungen für eines oder mehrere Pakete
 Leider war es nötig, die Versorgung mit Sicherheitsaktualisierungen für einige Pakete vor dem regulären Ende des Sicherheitswartungszyklus zu beenden.
 .
 Davon sind die folgenden auf diesem System gefundenen Pakete betroffen:
 .
 ${MESSAGE}
";
$elem["debian-security-support/ended"]["descriptionfr"]="Suivi des mises à jour de sécurité terminé pour un ou plusieurs paquets
 Malheureusement, il a été nécessaire d'interrompre le suivi des mises à jour de sécurité pour certains paquets avant la fin du cycle de maintenance théorique.
 .
 Les paquets suivants trouvés sur ce système sont affectés par ceci :
 .
 ${MESSAGE}
";
$elem["debian-security-support/ended"]["default"]="";
$elem["debian-security-support/limited"]["type"]="text";
$elem["debian-security-support/limited"]["description"]="Limited security support for one or more packages
 Unfortunately, it has been necessary to limit security support for some
 packages.
 .
 The following packages found on this system are affected by this:
 .
 ${MESSAGE}
";
$elem["debian-security-support/limited"]["descriptionde"]="Eingeschränkte Versorgung mit Sicherheitsaktualisierungen für eines oder mehrere Pakete
 Leider war es nötig, die Versorgung mit Sicherheitsaktualisierungen für einige Pakete einzuschränken.
 .
 Davon sind die folgenden auf diesem System gefundenen Pakete betroffen:
 .
 ${MESSAGE}
";
$elem["debian-security-support/limited"]["descriptionfr"]="Suivi limité des mises à jour de sécurité pour un ou plusieurs paquets
 Malheureusement, il a été nécessaire de limiter le suivi des mises à jour de sécurité pour certains paquets.
 .
 Les paquets suivants trouvés sur ce système sont affectés par ceci :
 .
 ${MESSAGE}
";
$elem["debian-security-support/limited"]["default"]="";
$elem["debian-security-support/earlyend"]["type"]="text";
$elem["debian-security-support/earlyend"]["description"]="Future end of support for one or more packages
 Unfortunately, it will be necessary to end security support for some
 packages before the end of the regular security maintenance life cycle.
 .
 The following packages found on this system are affected by this:
 .
 ${MESSAGE}
";
$elem["debian-security-support/earlyend"]["descriptionde"]="Zukünftiges Ende der Versorgung mit Sicherheitsaktualisierungen für eines oder mehrere Pakete
 Leider wird es nötig sein, die Versorgung mit Sicherheitsaktualisierungen für einige Pakete vor dem regulären Ende des Sicherheitswartungszyklus zu beenden.
 .
 Davon sind die folgenden auf diesem System gefundenen Pakete betroffen:
 .
 ${MESSAGE}
";
$elem["debian-security-support/earlyend"]["descriptionfr"]="Le suivi des mises à jour de sécurité sera bientôt arrêté pour un ou plusieurs paquets
 Malheureusement, il est nécessaire d'interrompre le suivi des mises à jour de sécurité de certains paquets avant la fin du cycle de maintenance théorique.
 .
 Les paquets suivants trouvés sur ce système sont affectés par ceci :
 .
 ${MESSAGE}
";
$elem["debian-security-support/earlyend"]["default"]="";
PKG_OptionPageTail2($elem);
?>
