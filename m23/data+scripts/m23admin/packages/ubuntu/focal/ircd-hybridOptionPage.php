<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ircd-hybrid");

$elem["ircd-hybrid/restart_on_upgrade"]["type"]="boolean";
$elem["ircd-hybrid/restart_on_upgrade"]["description"]="Restart ircd-hybrid on each upgrade?
 Please choose whether the ircd-hybrid daemon should be restarted
 every time a new version of this package is installed.
 .
 Automatic restarts may be problematic if, for instance, the server is
 running with manually loaded modules, which will need to be reloaded
 after the restart.
 .
 If you reject this option, you will have to restart ircd-hybrid via
 \"service ircd-hybrid restart\" when needed.
";
$elem["ircd-hybrid/restart_on_upgrade"]["descriptionde"]="Ircd-hybrid bei jedem Upgrade neu starten?
 Bitte wählen Sie aus, ob der Ircd-hybrid-Daemon bei jeder Installation einer neuen Version dieses Pakets neu gestartet werden soll.
 .
 Automatische Neustarts sind problematisch, falls beispielsweise der Server mit manuell geladenen Modulen ausgeführt wird, die nach jedem Neustart neu geladen werden müssen.
 .
 Falls Sie diese Option ablehnen, müssen Sie Ircd-hybrid bei Bedarf neu starten, indem Sie »service ircd-hybrid restart« eingeben.
";
$elem["ircd-hybrid/restart_on_upgrade"]["descriptionfr"]="Faut-il redémarrer ircd-hybrid à chaque mise à niveau ?
 Veuillez choisir si le démon ircd-hybrid doit être redémarré à chaque installation d'une nouvelle version de ce paquet.
 .
 De tels redémarrages peuvent poser problème si, par exemple, le serveur utilise des modules chargés manuellement. Ces modules doivent alors être relancés après le redémarrage.
 .
 Si vous refusez cette option, vous devrez redémarrer vous-même ircd-hybrid après une mise à jour, en utilisant la commande « service ircd-hybrid restart ».
";
$elem["ircd-hybrid/restart_on_upgrade"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
