<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("buildbot");

$elem["buildbot/upgrade-on-install"]["type"]="boolean";
$elem["buildbot/upgrade-on-install"]["description"]="Upgrade buildbot master instances when installing new versions?
 Stop, run ``buildbot upgrade-master'' and restart all buildbot master
 instances when installing new versions.
 .
 Please note that the ``buildbot upgrade-master'' operation is potentially
 destructive and it is irreversible. It is not possible to \"downgrade\" an
 upgraded master instance. For these reasons, some users may want to do backups
 before doing it manually.
 .
 However, this operation is mandatory and buildbot will fail to restart
 a master instance if it has not been performed. See buildbot(7) for more
 details.
";
$elem["buildbot/upgrade-on-install"]["descriptionde"]="Upgrade der Buildbot-Masterinstanz bei der Installation einer neuen Version durchführen?
 Stoppt alle Buildbot-Masterinstanzen, führt »buildbot upgrade-master« aus und startet alle Buildbot-Masterinstanzen neu, wenn eine neue Version installiert wird.
 .
 Bitte beachten Sie, dass die Aktion »buildbot upgrade-master« möglicherweise zerstörerisch wirkt und nicht umkehrbar ist. Es ist nicht möglich, ein »Downgrade« einer Masterinstanz durchzuführen, für die ein Upgrade durchgeführt wurde, d.h. eine Rückkehr zu einer alten Version ist nicht möglich. Aus diesem Grund möchten manche Benutzer eine Sicherungskopie anlegen, bevor sie diesen Befehl von Hand ausführen.
 .
 Allerdings ist diese Aktion zwingend notwendig und Buildbot wird keine Masterinstanz neu starten können, falls die Aktion nicht durchgeführt wurde. Siehe buildbot(7) für weitere Details.
";
$elem["buildbot/upgrade-on-install"]["descriptionfr"]="Faut-il mettre à niveau les instances maître de builbot lors de l'installation de nouvelles versions ?
 Arrêter les instances maître de buildbot, exécuter « buildbot upgrade-master » et redémarrer toutes les instances lors de l'installation de nouvelles versions.
 .
 Veuillez noter que l'opération « buildbot upgrade-master » est irréversible et potentiellement destructrice. Il n'est pas possible de revenir à une version précédente (« downgrade ») d'une instance maître mise à niveau. À cause de cela, certains utilisateurs peuvent souhaiter réaliser une sauvegarde avant d'effectuer la mise à niveau manuellement.
 .
 Néanmoins, cette opération est obligatoire et buildbot échouera à redémarrer une instance maître si elle n'a pas été réalisée. Voir buildbot(7) pour davantage de détails.
";
$elem["buildbot/upgrade-on-install"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
