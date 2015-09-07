<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("netdiag");

$elem["netdiag/run_statnetd"]["type"]="boolean";
$elem["netdiag/run_statnetd"]["description"]="Start statnetd at boot time?
 Please specify whether statnetd should be started as part of the boot
 process. This can be changed later by editing /etc/default/netdiag.
";
$elem["netdiag/run_statnetd"]["descriptionde"]="Statnetd im Bootprozess starten?
 Bitte geben Sie an, ob Statnetd als Teil des Bootprozesses gestartet werden soll. Dies kann später in der Datei /etc/default/netdiag geändert werden.
";
$elem["netdiag/run_statnetd"]["descriptionfr"]="Faut-il lancer statnetd au démarrage ?
 Veuillez indiquer si vous désirez démarrer statnetd à l'amorçage de l'ordinateur. Vous pourrez changer ce comportement plus tard en modifiant le fichier /etc/default/netdiag.
";
$elem["netdiag/run_statnetd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
