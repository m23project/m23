<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sipml5-web-phone");

$elem["sipml5-web-phone/webserver"]["type"]="boolean";
$elem["sipml5-web-phone/webserver"]["description"]="Automatically configure Apache for SipML5?
 The package will be unavailable until a web server is configured.
 Automatic configuration can be performed for the Apache web server.
";
$elem["sipml5-web-phone/webserver"]["descriptionde"]="Soll Apache automatisch für SipML5 konfiguriert werden?
 Das Paket wird nicht verfügbar sein, bis ein Webserver eingerichtet ist. Für den Apache-Webserver kann eine automatische Konfiguration durchgeführt werden.
";
$elem["sipml5-web-phone/webserver"]["descriptionfr"]="Faut-il configurer apache2 automatiquement ?
 Le paquet sera indisponible jusqu'à ce qu'un serveur web soit configuré. Le serveur web Apache 2 peut être configuré automatiquement.
";
$elem["sipml5-web-phone/webserver"]["default"]="true";
$elem["sipml5-web-phone/reload"]["type"]="boolean";
$elem["sipml5-web-phone/reload"]["description"]="Reload Apache configuration?
 In order to activate the new configuration, the web server needs
 to reload its configuration. If you choose not to do this automatically,
 you should do so manually at the first opportunity.
";
$elem["sipml5-web-phone/reload"]["descriptionde"]="Soll die Apache-Konfiguration neu geladen werden?
 Um die neue Konfiguration zu aktivieren, muss der Webserver seine Konfiguration neu laden. Falls Sie dies nicht automatisch tun möchten, sollten Sie das bei nächster Gelegenheit händisch tun.
";
$elem["sipml5-web-phone/reload"]["descriptionfr"]="Faut-il recharger la configuration d'apache2 ?
 Pour activer la nouvelle configuration, le serveur web doit recharger sa configuration. Si vous choisissez de ne pas le faire de façon automatique, faites-le vous-même à la première occasion.
";
$elem["sipml5-web-phone/reload"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
