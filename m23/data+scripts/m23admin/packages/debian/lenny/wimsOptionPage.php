<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wims");

$elem["wims/reconfigure-webserver"]["type"]="multiselect";
$elem["wims/reconfigure-webserver"]["choices"][1]="apache";
$elem["wims/reconfigure-webserver"]["choices"][2]="apache2";
$elem["wims/reconfigure-webserver"]["choices"][3]="apache-ssl";
$elem["wims/reconfigure-webserver"]["description"]="List of web servers to reconfigure automatically:
 Wims supports Apache, Apache2, Apache-SSL and Apache-Perl.
";
$elem["wims/reconfigure-webserver"]["descriptionde"]="Liste von Webservern, die automatisch rekonfiguriert werden sollen:
 Wims unterstützt Apache, Apache2, Apache-SSL und Apache-Perl.
";
$elem["wims/reconfigure-webserver"]["descriptionfr"]="Serveurs web à reconfigurer automatiquement :
 Wims gère Apache, Apache2, Apache-SSL et Apache-Perl.
";
$elem["wims/reconfigure-webserver"]["default"]="Default:";
$elem["wims/restart-webserver"]["type"]="boolean";
$elem["wims/restart-webserver"]["description"]="Do you want ${webserver} to be restarted now?
 Remember that in order to activate the new configuration
 ${webserver} has to be restarted. You can also restart ${webserver}
 manually executing /etc/init.d/${webserver} restart
";
$elem["wims/restart-webserver"]["descriptionde"]="Soll ${webserver} jetzt neu gestartet werden?
 Denken Sie daran, dass ${webserver} neu gestartet werden muss, damit die neue Konfiguration aktiviert wird. Sie können ${webserver} auch manuell neu starten, indem Sie »/etc/init.d/${webserver} restart« ausführen.
";
$elem["wims/restart-webserver"]["descriptionfr"]="Faut-il redémarrer ${webserver} maintenant ?
 Rappel : pour activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez également redémarrer ${webserver} vous-même avec la commande /etc/init.d/${webserver} restart
";
$elem["wims/restart-webserver"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
