<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jsmath");

$elem["jsmath/webserver"]["type"]="multiselect";
$elem["jsmath/webserver"]["choices"][1]="apache";
$elem["jsmath/webserver"]["choices"][2]="apache-ssl";
$elem["jsmath/webserver"]["choices"][3]="apache-perl";
$elem["jsmath/webserver"]["description"]="Which web server would you like to reconfigure automatically:
 If you do not select a web server to reconfigure automatically, jsMath
 will not be usable until you reconfigure your webserver to enable
 jsMath.
 .
 Enabled web servers will have jsMath available at /jsMath.
";
$elem["jsmath/webserver"]["descriptionde"]="Welchen Webserver möchten Sie automatisch neukonfigurieren:
 Falls Sie keine Webserver zum automatischen Neukonfigurieren auswählen, wird jsMath nicht verwendbar sein, bis Sie Ihren Webserver neukonfigurieren, um jsMath zu aktivieren.
 .
 Aktivierte Webserver werden jsMath unter /jsMath verfügbar haben.
";
$elem["jsmath/webserver"]["descriptionfr"]="Serveur Web à reconfigurer automatiquement :
 Si vous ne choisissez pas de serveur Web à reconfigurer automatiquement, vous devrez reconfigurer votre serveur Web en activant jsMath avant de pouvoir l'utiliser.
 .
 JsMath sera disponible dans le répertoire /jsMath des serveurs pour lesquels il a été activé.
";
$elem["jsmath/webserver"]["default"]="apache, apache-ssl, apache-perl, apache2";
$elem["jsmath/restart"]["type"]="boolean";
$elem["jsmath/restart"]["description"]="Should web servers be restarted?
 Remember that in order to activate the new configuration
 a web server has to be restarted. You can also restart web servers by
 manually executing invoke-rc.d <webserver> restart.
";
$elem["jsmath/restart"]["descriptionde"]="Sollen die Webserver neu gestartet werden?
 Denken Sie daran, dass ein Webserver neu gestartet werden muss, um die neue Konfiguration zu aktivieren. Sie können Webserver auch manuell neu starten, indem Sie »invoke-rc.d <webserver> restart« ausführen.
";
$elem["jsmath/restart"]["descriptionfr"]="Faut-il redémarrer les serveurs Web ?
 Veuillez noter qu'un serveur Web doit être redémarré afin que sa nouvelle configuration soit prise en compte. Vous pouvez aussi redémarrer les serveurs Web vous-même à l'aide de la commande « invoke-rc.d <webserver> restart ».
";
$elem["jsmath/restart"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
