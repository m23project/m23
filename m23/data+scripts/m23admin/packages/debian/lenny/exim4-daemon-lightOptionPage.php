<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("exim4-daemon-light");

$elem["exim4-daemon-light/drec"]["type"]="error";
$elem["exim4-daemon-light/drec"]["description"]="Reconfigure exim4-config instead of this package
 Exim4 has its configuration factored out into a dedicated package,
 exim4-config. To reconfigure Exim4, use 'dpkg-reconfigure exim4-config'.
";
$elem["exim4-daemon-light/drec"]["descriptionde"]="Exim4-config anstelle dieses Pakets neu einrichten
 Die Einstellungen von Exim4 wurden in ein eigenes Paket, exim4-config, ausgelagert. Benutzen Sie den Befehl 'dpkg-reconfigure exim4-config', um Exim4 neu einzurichten.
";
$elem["exim4-daemon-light/drec"]["descriptionfr"]="Reconfiguration d'Exim avec exim4-config
 La configuration d'Exim 4 est gérée par un paquet dédié nommé exim4-config. Si vous souhaitez reconfigurer Exim 4, vous devez utiliser la commande « dpkg-reconfigure exim4-config ».
";
$elem["exim4-daemon-light/drec"]["default"]="";
PKG_OptionPageTail2($elem);
?>
