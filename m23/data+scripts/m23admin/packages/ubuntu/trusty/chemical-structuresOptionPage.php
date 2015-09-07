<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chemical-structures");

$elem["chemical-structures/restart-webserver"]["type"]="boolean";
$elem["chemical-structures/restart-webserver"]["description"]="Should apache2 be restarted?
 In order to activate the new configuration, apache2 has
 to be restarted. You can also restart apache2 by manually executing
 'invoke-rc.d apache2 restart'.
";
$elem["chemical-structures/restart-webserver"]["descriptionde"]="Soll apache2 jetzt neu gestartet werden?
 Damit die neue Konfiguration aktiviert wird, muss apache2 neu gestartet werden. Sie k??nnen apache2 auch manuell mit dem Befehl ??/etc/init.d/apache2 restart?? neu starten.
";
$elem["chemical-structures/restart-webserver"]["descriptionfr"]="Faut-il redémarrer Apache 2 ?
 Pour activer la nouvelle configuration, il faut redémarrer Apache 2. Vous pouvez aussi redémarrer Apache 2 à la main en lançant  « invoke-rc.d apache2 restart ».
";
$elem["chemical-structures/restart-webserver"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
