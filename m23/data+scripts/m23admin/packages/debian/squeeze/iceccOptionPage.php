<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icecc");

$elem["icecc/daemon"]["type"]="boolean";
$elem["icecc/daemon"]["description"]="Start the icecc daemon on startup?
 icecc can be run as a daemon, listening for incoming connections.
 .
 You have the option of starting the icecc daemon automatically on the
 computer startup. You need a running daemon on every computer which should
 be part of the compile farm. If you later change your mind, you can run: 
 'dpkg-reconfigure icecc'.
";
$elem["icecc/daemon"]["descriptionde"]="Den Icecc-Daemon beim Systemstart starten?
 Icecc kann als Daemon laufen und auf eingehende Verbindungen warten.
 .
 Sie haben die Möglichkeit, den Icecc-Daemon automatisch beim Hochfahren des Rechners zu starten. Sie benötigen einen laufenden Daemon auf jedem Computer, der Teil der Compile-Farm sein soll. Falls Sie später Ihre Meinung ändern, können Sie »dpkg-reconfigure icecc« ausführen.
";
$elem["icecc/daemon"]["descriptionfr"]="Faut-il lancer le démon icecc au démarrage ?
 Icecc peut être lancé en tant que démon, à l'écoute de connexions entrantes.
 .
 Vous avez la possibilité de lancer automatiquement le démon icecc au démarrage du système. Chaque membre de la ferme de compilation doit avoir un démon actif. Vous pourrez revenir sur ce choix ultérieurement en exécutant la commande « dpkg-reconfigure icecc ».
";
$elem["icecc/daemon"]["default"]="true";
$elem["icecc/scheduler"]["type"]="boolean";
$elem["icecc/scheduler"]["description"]="Start the icecc scheduler on startup?
 The scheduler can be run as a daemon, listening for incoming connections.
 .
 You have the option of starting the icecc scheduler automatically on the
 computer startup. You need one scheduler in your compile farm. If in doubt, 
 you should not start it automatically on startup. If you later change your
 mind, you can run: 'dpkg-reconfigure icecc'.
";
$elem["icecc/scheduler"]["descriptionde"]="Das Icecc-Planprogramm (Scheduler) beim Systemstart starten?
 Das Planprogramm kann als Daemon laufen und auf eingehende Verbindungen warten.
 .
 Sie haben die Möglichkeit, das Planprogramm automatisch beim Systemstart zu starten. Sie benötigen ein Planprogramm in Ihrer Compile-Farm. Im Zweifel sollten Sie es nicht automatisch beim Systemstart starten. Falls Sie später Ihre Meinung ändern, führen Sie »dpkg-reconfigure icecc« aus.
";
$elem["icecc/scheduler"]["descriptionfr"]="Faut-il lancer l'ordonnanceur d'icecc au démarrage ?
 L'ordonnanceur peut être lancé en tant que démon, à l'écoute de connexions entrantes.
 .
 Vous avez la possibilité de lancer automatiquement l'ordonnanceur d'icecc au démarrage du système. Il vous faut un seul ordonnanceur dans votre ferme de compilation. Dans le doute, vous ne devriez pas le lancer automatiquement au démarrage. Vous pourrez revenir sur ce choix ultérieurement en exécutant la commande « dpkg-reconfigure icecc ».
";
$elem["icecc/scheduler"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
