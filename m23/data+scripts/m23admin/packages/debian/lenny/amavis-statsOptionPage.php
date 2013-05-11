<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("amavis-stats");

$elem["amavis-stats/config_apache"]["type"]="select";
$elem["amavis-stats/config_apache"]["choices"][1]="Apache";
$elem["amavis-stats/config_apache"]["choices"][2]="Apache-SSL";
$elem["amavis-stats/config_apache"]["choices"][3]="Apache2";
$elem["amavis-stats/config_apache"]["choices"][4]="All";
$elem["amavis-stats/config_apache"]["choicesde"][1]="Apache";
$elem["amavis-stats/config_apache"]["choicesde"][2]="Apache-SSL";
$elem["amavis-stats/config_apache"]["choicesde"][3]="Apache2";
$elem["amavis-stats/config_apache"]["choicesde"][4]="Alle";
$elem["amavis-stats/config_apache"]["choicesfr"][1]="Apache";
$elem["amavis-stats/config_apache"]["choicesfr"][2]="Apache-SSL";
$elem["amavis-stats/config_apache"]["choicesfr"][3]="Apache2";
$elem["amavis-stats/config_apache"]["choicesfr"][4]="Tous";
$elem["amavis-stats/config_apache"]["description"]="Web server to reconfigure:
 Amavis-stats supports any web server that php3/php4 does, but this
 automatic configuration process only supports Apache and Apache-SSL.
";
$elem["amavis-stats/config_apache"]["descriptionde"]="Webserver, der erneut konfiguriert werden soll:
 Amavis-stats unterstützt jeden Webserver, der von php3/php4 unterstützt wird. Diese automatische Einrichtung funktioniert jedoch nur für Apache und Apache-SSL.
";
$elem["amavis-stats/config_apache"]["descriptionfr"]="Serveur web à reconfigurer :
 Amavis-stats gère tout serveur web gérant php3 ou php4, mais ce processus de configuration automatique ne fonctionne qu'avec Apache et Apache-SSL.
";
$elem["amavis-stats/config_apache"]["default"]="";
$elem["amavis-stats/stay_on_purge"]["type"]="boolean";
$elem["amavis-stats/stay_on_purge"]["description"]="Remove RRD files on purge?
 Amavis-stats keeps its database files under /var/cache/amavis-stats.
 Choose this option if this directory should be removed completely on purge.
";
$elem["amavis-stats/stay_on_purge"]["descriptionde"]="Sollen die RRD-Dateien beim vollständigen Entfernen ebenfalls gelöscht werden?
 Amavis-stats legt seine Datenbankdateien im Verzeichnis /var/cache/amavis-stats ab. Wählen Sie diese Option, wenn das Verzeichnis beim vollständigen Entfernen (»purge«) gelöscht werden soll.
";
$elem["amavis-stats/stay_on_purge"]["descriptionfr"]="Faut-il supprimer les fichiers RRD lors de la purge ?
 Amavis-stats conserve ses fichiers de bases de données dans /var/cache/amavis-stats. Veuillez indiquer si ce répertoire doit être supprimé complètement lors de la purge du paquet.
";
$elem["amavis-stats/stay_on_purge"]["default"]="";
PKG_OptionPageTail2($elem);
?>
