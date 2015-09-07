<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ganglia-webfrontend");

$elem["ganglia-webfrontend/webserver"]["type"]="boolean";
$elem["ganglia-webfrontend/webserver"]["description"]="Automatically configure apache2?
 The ganglia front-end will be unavailable until a web server is configured.
 Automatic configuration can be performed for the Apache 2 web server.
";
$elem["ganglia-webfrontend/webserver"]["descriptionde"]="Apache2 automatisch konfigurieren?
 Die OberflÃ¤che von Ganglia ist nicht verfÃ¼gbar, solange kein Webserver konfiguriert wurde. Der Webserver Apache 2 kann automatisch konfiguriert werden.
";
$elem["ganglia-webfrontend/webserver"]["descriptionfr"]="Configurer apache2 automatiquement ?
 L'interface ganglia sera indisponible tant qu'aucun serveur web n'aura été configuré. La configuration automatique peut être effectuée pour le serveur web Apache 2.
";
$elem["ganglia-webfrontend/webserver"]["default"]="false";
$elem["ganglia-webfrontend/restart"]["type"]="boolean";
$elem["ganglia-webfrontend/restart"]["description"]="Restart apache2?
 In order to activate the new configuration, the web server needs
 to be restarted. If you choose not to do this automatically, you should
 do so manually at the first opportunity.
";
$elem["ganglia-webfrontend/restart"]["descriptionde"]="Apache2 neustarten?
 Um die neue Konfiguration zu aktivieren, muss der Webserver neu gestartet werden. Falls Sie dies nicht automatisch durchfÃ¼hren lassen, sollten Sie es bei der nÃ¤chsten MÃ¶glichkeit manuell durchfÃ¼hren.
";
$elem["ganglia-webfrontend/restart"]["descriptionfr"]="Redémarrer apache2 ?
 Pour que la nouvelle configuration soit prise en compte, le serveur web doit être redémarré. Si vous décidez de ne pas le faire maintenant, vous devriez le faire vous-même dès que possible.
";
$elem["ganglia-webfrontend/restart"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
