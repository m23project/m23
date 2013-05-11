<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tinc");

$elem["tinc/restart_on_upgrade"]["type"]="boolean";
$elem["tinc/restart_on_upgrade"]["description"]="Restart tinc on each upgrade?
 You may choose if you want me to restart the tinc daemon every time you
 install a new version of this package.
 .
 Sometimes you don't want to do this, for example if you are doing the
 upgrade over a tunnel that is created with tinc.  Stopping the daemon
 would probably leave you with a dead connection, and tinc may not be
 started again.
 .
 If you refuse, you have to restart tinc yourself if you upgraded, by
 typing `invoke-rc.d tinc restart' whenever it suits you.
";
$elem["tinc/restart_on_upgrade"]["descriptionde"]="Tinc bei jedem Upgrade neu starten?
 Sie können dies auswählen, falls Sie möchten, dass jedes mal, wenn Sie eine neue Version installieren, Tinc neu gestartet werden soll.
 .
 In manchen Situationen ist dies nicht gewollt, zum Beispiel falls Sie das Upgrade über einen Tunnel durchführen, der mit Tinc erstellt wurde. Würde dann der Daemon beendet, wäre die Kommunikation tot und Tinc könnte sich nicht neu starten.
 .
 Falls Sie hier ablehnen, müssen Sie Tinc selbst neu starten, wenn Sie ein Upgrade durchgeführt haben, indem Sie »invoke-rc.d tinc restart« eingeben, wenn es Ihnen passt.
";
$elem["tinc/restart_on_upgrade"]["descriptionfr"]="Faut-il redémarrer tinc à chaque mise à jour ?
 Vous pouvez choisir de redémarrer le démon tinc à chaque fois que vous installez une nouvelle version de ce paquet.
 .
 Dans certains cas, vous devrez éviter de le faire, par exemple si vous mettez à jour à travers un tunnel créé avec tinc. Arrêter le démon laisserait sans doute une connexion inactive et tinc ne pourrait pas être redémarré.
 .
 Si vous refusez cette option, vous devrez redémarrer tinc vous-même en cas de mise à jour, avec la commande : « invoke-rc.d tinc restart », au moment où cela vous conviendra.
";
$elem["tinc/restart_on_upgrade"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
