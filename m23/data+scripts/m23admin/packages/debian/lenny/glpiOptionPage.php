<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("glpi");

$elem["glpi/webserver"]["type"]="multiselect";
$elem["glpi/webserver"]["choices"][1]="apache";
$elem["glpi/webserver"]["choices"][2]="apache-ssl";
$elem["glpi/webserver"]["choices"][3]="apache-perl";
$elem["glpi/webserver"]["choicesde"][1]="Apache";
$elem["glpi/webserver"]["choicesde"][2]="Apache-ssl";
$elem["glpi/webserver"]["choicesde"][3]="Apache-perl";
$elem["glpi/webserver"]["choicesfr"][1]="Apache";
$elem["glpi/webserver"]["choicesfr"][2]="Apache-ssl";
$elem["glpi/webserver"]["choicesfr"][3]="Apache-perl";
$elem["glpi/webserver"]["description"]="Web server to reconfigure automatically:
 If you do not select a web server to reconfigure automatically, glpi will
 not be usable until you reconfigure your webserver to enable glpi.
";
$elem["glpi/webserver"]["descriptionde"]="Webserver, der automatisch konfiguriert werden soll:
 Falls Sie keinen Webserver zum automatischen konfigurieren auswählen, wird Glpi nicht benutzbar sein, bis Sie Ihren Webserver rekonfigurieren, um Glpi zu aktivieren.
";
$elem["glpi/webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Si aucun serveur web n'est automatiquement reconfiguré, glpi restera inutilisable jusqu'à ce que vous en reconfiguriez un vous-même.
";
$elem["glpi/webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["glpi/restart"]["type"]="boolean";
$elem["glpi/restart"]["description"]="Should ${webserver} be restarted?
 Remember that in order to activate the new configuration ${webserver} has
 to be restarted. You can also restart ${webserver} by manually executing
 invoke-rc.d ${webserver} restart.
";
$elem["glpi/restart"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Denken Sie daran, dass ${webserver} neu gestartet werden muss, um die neue Konfiguration zu aktivieren. Sie können ${webserver} auch manuell neu starten, indem Sie »invoke-rc.d ${webserver} restart« ausführen.
";
$elem["glpi/restart"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Afin d'activer la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez également le redémarrer vous-même avec la commande « invoke-rc.d ${webserver} restart ».
";
$elem["glpi/restart"]["default"]="false";
$elem["glpi/configuration"]["type"]="note";
$elem["glpi/configuration"]["description"]="glpi configuration
 Please point your browser to http://<server>/glpi/ to finish the
 configuration.
";
$elem["glpi/configuration"]["descriptionde"]="Glpi-Konfiguration
 Bitte rufen Sie in Ihrem Browser http://<server>/glpi/ auf, um die Konfiguration zu beenden.
";
$elem["glpi/configuration"]["descriptionfr"]="Configuration de glpi
 Veuillez vous rendre à l'adresse http://<serveur>/glpi avec un navigateur web pour terminer l'installation.
";
$elem["glpi/configuration"]["default"]="";
PKG_OptionPageTail2($elem);
?>
