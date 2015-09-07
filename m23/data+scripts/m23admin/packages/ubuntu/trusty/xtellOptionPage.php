<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xtell");

$elem["xtelld/from_inetd"]["type"]="boolean";
$elem["xtelld/from_inetd"]["description"]="Do you want xtell daemon to run from inetd?
 By default, xtelld runs from inetd.
 .
 However, you can run it as standalone daemon. If you select No, xtell
 daemon will be started automatically at boot time.
 .
 If unsure, select Yes
";
$elem["xtelld/from_inetd"]["descriptionde"]="Möchten Sie den xtell Daemon von inetd aus starten?
 Standardmäßig wird xtelld von inetd aufgerufen.
 .
 Sie können ihn jedoch auch als eigentständigen Daemon laufen lassen. Wenn Sie Nein auswählen, wird der xtell Daemon automatisch beim Booten gestartet.
 .
 Wenn Sie sich nicht sicher sind, wählen Sie Ja.
";
$elem["xtelld/from_inetd"]["descriptionfr"]="Voulez-vous faire fonctionner le démon xtell à partir de inetd ?
 Par défaut, xtelld fonctionne à partir de inetd.
 .
 Cependant vous pouvez le faire fonctionner en mode autonome. Si vous répondez négativement, le démon xtell sera lancé automatiquement lors du démarrage de la machine.
 .
 En cas de doute, acceptez cette option.
";
$elem["xtelld/from_inetd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
