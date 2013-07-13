<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("safe-rm");

$elem["safe-rm/abort_upgrade"]["type"]="boolean";
$elem["safe-rm/abort_upgrade"]["description"]="Abort package upgrade?
 WARNING! Your system could become unusable (i.e. you could lose the
 /bin/rm command).
 .
 Due to a bug in previous versions of safe-rm, this package should be
 upgraded separately from other packages. If it is currently part of
 a larger upgrade, you should abort this upgrade now.
 .
 Then, upgrade the safe-rm package all by itself and this problem
 will be resolved. The new version no longer diverts important system
 files and will therefore not be subject to similar problems.
 .
 If you do end up losing the /bin/rm command for whatever reason, you
 should still be able to use /bin/rm.real directly.
";
$elem["safe-rm/abort_upgrade"]["descriptionde"]="Paket-Upgrade abbrechen?
 WARNUNG! Ihr System könnte unbenutzbar werden (d.h. Sie könnten den Befehl /bin/rm verlieren).
 .
 Aufgrund eines Fehlers in vorhergehenden Version von Safe-rm sollte das Upgrade dieses Pakets getrennt von anderen Paketen durchgeführt werden. Falls es derzeit Teil eines größeren Upgrades ist, sollten Sie dieses jetzt abbrechen.
 .
 Führen Sie dann das Upgrade des Safe-rm-Pakets alleine durch und das Problem wird behoben. Die neue Version leitet keine wichtigen Systemdateien mehr um und unterliegt somit nicht ähnlichen Problemen.
 .
 Falls Ihnen aus irgendeinem Grund der Befehl /bin/rm verloren gehen sollte, müsste es weiterhin möglich sein, direkt /bin/rm.real zu benutzen.
";
$elem["safe-rm/abort_upgrade"]["descriptionfr"]="Faut-il interrompre la mise à jour du paquet ?
 Attention, le système pourrait devenir inutilisable par perte de la commande /bin/rm.
 .
 En raison d'un bogue d'une version antérieure du paquet de safe-rm, ce paquet doit être mis à jour séparément des autres paquets. Si la mise à jour actuelle fait partie d'une mise à jour comportant d'autres paquets, vous devriez refuser la mise à jour maintenant.
 .
 Vous pourrez ensuite mettre le paquet safe-rm à jour de manière isolée et le problème sera résolu. La nouvelle version ne dérive plus des fichiers importants du système et, en conséquence, ne souffrira plus de problèmes de ce type.
 .
 Si la commande /bin/rm devenait malgré tout indisponible, vous pourrez toujours utiliser la commande /bin/rm.real à la place.
";
$elem["safe-rm/abort_upgrade"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
