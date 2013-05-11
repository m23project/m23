<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gallery");

$elem["gallery/webserver"]["type"]="multiselect";
$elem["gallery/webserver"]["choices"][1]="apache";
$elem["gallery/webserver"]["choices"][2]="apache-ssl";
$elem["gallery/webserver"]["choices"][3]="apache-perl";
$elem["gallery/webserver"]["description"]="Which web server would you like to reconfigure automatically:
 If you do not select a web server to reconfigure automatically, gallery
 will not be usable until you reconfigure your webserver to enable
 gallery.
";
$elem["gallery/webserver"]["descriptionde"]="Welchen Web-Server automatisch anpassen:
 Wenn Sie keinen Web-Server für für die Anpassung an Gallery auswählen, wird Gallery nicht funktionieren, bis Sie einen Web-Server für Gallery eingerichtet haben.
";
$elem["gallery/webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Si vous ne choisissez pas de serveur web à reconfigurer automatiquement, gallery ne sera pas immédiatement utilisable.
";
$elem["gallery/webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["gallery/restart"]["type"]="boolean";
$elem["gallery/restart"]["description"]="Should ${webserver} be restarted?
 Remember that in order to activate the new configuration
 ${webserver} has to be restarted. You can also restart ${webserver} by
 manually executing invoke-rc.d ${webserver} restart.
";
$elem["gallery/restart"]["descriptionde"]="Soll ${webserver} neu gestartet werden?
 Damit die neuen Einstellungen übernommen werden, muss ${webserver} neu gestartet werden. Sie können ${webserver} auch selbst mit dem Kommando 'invoke-rc.d ${webserver} restart' neu starten.
";
$elem["gallery/restart"]["descriptionfr"]="Faut-il redémarrer ${webserver} ?
 Veuillez noter que, pour mettre en service la nouvelle configuration, ${webserver} doit être redémarré. Vous pouvez effectuer ce redémarrage vous-même avec la commande « invoke-rc.d ${webserver} restart ».
";
$elem["gallery/restart"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
