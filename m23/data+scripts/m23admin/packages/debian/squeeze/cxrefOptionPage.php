<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cxref");

$elem["cxref/cxref-cpp-autoconf"]["type"]="boolean";
$elem["cxref/cxref-cpp-autoconf"]["description"]="Automatically configure cxref-cpp?
 cxref-cpp is a cpp-like program used by cxref for better comment
 processing and support.  Proper operation of cxref-cpp requires
 configuration against the gcc and cpp versions you have installed on your
 system.  These of course may change with each upgrade.  This package can
 attempt to automatically keep track of your installed gcc and cpp versions
 and reconfigure cxref-cpp accordingly, or it can leave such configuration
 up to you.  In the latter case, you can run /usr/bin/cxref-cpp-configure
 as root whenever you wish, and/or you can edit the file
 /etc/cxref/cxref-cpp.defines by hand.  In the former case, the defines
 file will be automatically updated every time the cxref package is
 reconfigured.  In addition, cxref-cpp will detect any gcc version mismatch
 at runtime and regenerate a temporary cxref-cpp.defines file on the fly,
 warning the user of the situation.
";
$elem["cxref/cxref-cpp-autoconf"]["descriptionde"]="cxref-cpp automatisch konfigurieren?
 cxref-cpp ist ein cpp-ähnliches Programm, das von cxref zwecks besserer Kommentarverarbeitung und -unterstützung genutzt wird. Für eine korrekte Funktion von cxref-cpp ist eine Konfiguration passend zu den auf dem System installierten Versionen von gcc und cpp notwendig. Diese können sich natürlich mit jedem Upgrade ändern. Dieses Paket kann versuchen, automatisch die installierten gcc- und cpp-Versionen zu überwachen und cxref-cpp entsprechend neu einzurichten, oder es kann diese Aufgabe Ihnen überlassen. In letzterem Fall können Sie jederzeit /usr/bin/cxref-cpp-configure als root aufrufen und/oder /etc/cxref/cxref-cpp.defines von Hand editieren. Im ersten Fall wird die defines-Datei automatisch bei jeder Neukonfiguration des cxref-Pakets aktualisiert. Zusätzlich wird cxref-cpp jede Versionsabweichung von gcc zur Laufzeit erkennen und direkt eine temporäre cxref-cpp.defines-Datei erzeugen, so dass der Benutzer vor dieser Situtation gewarnt wird.
";
$elem["cxref/cxref-cpp-autoconf"]["descriptionfr"]="Faut-il configurer automatiquement cxref-cpp ?
 Cxref-cpp est un programme de type cpp utilisé par cxref pour améliorer la gestion et le traitement des commentaires. Pour pouvoir fonctionner correctement, il doit être configuré en fonction des versions de gcc et cpp installées sur votre système. Bien entendu, cela peut changer à chaque mise à jour. Le programme d'installation peut essayer de garder une trace des versions de gcc et cpp installées et reconfigurer cxref-cpp en fonction de celles-ci; vous pouvez également préférer le faire vous-même. Dans ce dernier cas, vous pourrez quand vous le souhaitez utiliser la commande « /usr/bin/cxref-cpp-configure » avec les privilèges du superutilisateur, ou modifier directement le fichier « /etc/cxref/cxref-cpp.defines ». Si vous choisissez la configuration automatique, le fichier de définition sera mis à jour automatiquement chaque fois que le paquet cxref sera reconfiguré. De plus, cxref-cpp détectera à l'exécution une éventuelle version inadaptée, regénérera à la volée un fichier « cxref-cpp.defines » temporaire, et vous informera de cette situation.
";
$elem["cxref/cxref-cpp-autoconf"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
