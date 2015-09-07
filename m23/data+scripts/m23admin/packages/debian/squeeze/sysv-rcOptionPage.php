<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sysv-rc");

$elem["sysv-rc/convert-legacy"]["type"]="boolean";
$elem["sysv-rc/convert-legacy"]["description"]="Migrate legacy boot sequencing to dependency-based sequencing?
 The boot system is prepared to migrate to dependency-based sequencing.
 This is an irreversible step, but one that is recommended: it allows
 the boot process to be optimized for speed and efficiency, and provides
 a more resilient framework for development.
 .
 A full rationale is detailed in /usr/share/doc/sysv-rc/README.Debian.
 If you choose not to migrate now, you can do so later by running
 \"dpkg-reconfigure sysv-rc\".
";
$elem["sysv-rc/convert-legacy"]["descriptionde"]="Veraltete Startreihenfolge auf abhängigkeitsbasierte Reihenfolge umstellen?
 Das Startsystem ist vorbereitet, um auf abhängigkeitsbasierte Reihenfolge umgestellt zu werden. Dieser Schritt ist nicht umkehrbar, wird aber empfohlen: Er ermöglicht die Optimierung des Startprozesses auf Geschwindigkeit und Effizienz und stellt ein robusteres Gerüst für die Entwicklung bereit.
 .
 Eine vollständige Begründung finden Sie detailliert in /usr/share/doc/sysv-rc/README.Debian.gz. Wenn Sie nun nicht umstellen auswählen, können Sie dies später durch Ausführung von »dpkg-reconfigure sysv-rc« tun.
";
$elem["sysv-rc/convert-legacy"]["descriptionfr"]="Migrer vers une séquence de démarrage basée sur des dépendances ?
 Le système de démarrage est prêt pour migrer vers une séquence basée sur des dépendances. Cette étape est irréversible mais elle est recommandée car elle permet d'accélérer le processus de démarrage, de le rendre plus efficace et propose un cadre de développement plus solide.
 .
 Des explications détaillées se trouvent dans le fichier « /usr/share/doc/sysv-rc/README.Debian ». Si vous décidez de ne pas effectuer la migration maintenant, vous pourrez toujours la faire plus tard avec la commande « dpkg-reconfigure sysv-rc ».
";
$elem["sysv-rc/convert-legacy"]["default"]="true";
$elem["sysv-rc/unable-to-convert"]["type"]="note";
$elem["sysv-rc/unable-to-convert"]["description"]="Unable to migrate to dependency-based boot system
 Tests have determined that problems in the boot system exist which
 prevent migration to dependency-based boot sequencing:
 .
 ${PROBLEMATIC}
 .
 If the reported problem is a local modification, it needs to be fixed
 manually. If it's a bug in the package, it should be reported to the
 BTS and fixed in the package. See
 http://wiki.debian.org/LSBInitScripts/DependencyBasedBoot for more
 information about how to fix the problems preventing migration.
 .
 To reattempt the migration process after the problems have been
 fixed, run \"dpkg-reconfigure sysv-rc\".
";
$elem["sysv-rc/unable-to-convert"]["descriptionde"]="Es konnte nicht auf abhängigkeitsbasierte Startreihenfolge umgestellt werden.
 Tests haben ergeben, dass es im Startsystem Probleme gibt, die die Umstellung auf abhängigkeitsbasierte Startreihenfolge verhindern:
 .
 ${PROBLEMATIC}
 .
 Wenn das berichtete Problem eine lokale Änderung ist, muss es manuell behoben werden. Wenn es ein Fehler im Paket ist, sollte es an die Fehlerdatenbank berichtet und im Paket behoben werden. Lesen Sie http://wiki.debian.org/LSBInitScripts/DependencyBasedBoot, um weitere Informationen darüber zu erhalten, wie Probleme behoben werden, die die Umstellung verhindern.
 .
 Um den Umstellungsprozess nach Behebung der Probleme erneut anzustoßen, führen Sie »dpkg-reconfigure sysv-rc« aus.
";
$elem["sysv-rc/unable-to-convert"]["descriptionfr"]="Impossible de migrer vers le nouveau système de démarrage
 Des tests ont montré que des problèmes existent dans le système de démarrage qui empêchent la migration vers la nouvelle séquence de démarrage :
 .
 ${PROBLEMATIC}
 .
 Si le problème indiqué concerne une modification locale, vous devrez le réparer vous-même. Si c'est un bogue dans un paquet, il devrait être signalé dans le système de suivi des bogues (BTS) et corrigé dans le paquet. Veuillez lire « http://wiki.debian.org/LSBInitScripts/DependencyBasedBoot » pour plus d'informations sur les méthodes de résolution des problèmes empêchant la transition.
 .
 Une fois que les problèmes ont été corrigés, vous pouvez réessayer la migration avec la commande « dpkg-reconfigure sysv-rc ».
";
$elem["sysv-rc/unable-to-convert"]["default"]="";
PKG_OptionPageTail2($elem);
?>
