<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nagvis");

$elem["nagvis/monitoring_system"]["type"]="select";
$elem["nagvis/monitoring_system"]["choices"][1]="icinga";
$elem["nagvis/monitoring_system"]["choices"][2]="nagios";
$elem["nagvis/monitoring_system"]["choices"][3]="shinken";
$elem["nagvis/monitoring_system"]["choicesde"][1]="icinga";
$elem["nagvis/monitoring_system"]["choicesde"][2]="nagios";
$elem["nagvis/monitoring_system"]["choicesde"][3]="shinken";
$elem["nagvis/monitoring_system"]["choicesfr"][1]="icinga";
$elem["nagvis/monitoring_system"]["choicesfr"][2]="nagios";
$elem["nagvis/monitoring_system"]["choicesfr"][3]="shinken";
$elem["nagvis/monitoring_system"]["description"]="Monitoring suite used with NagVis:
 The NagVis package supports Icinga as well as
 Nagios, using the check-mk-live broker backend.
 .
 If you would like to use NagVis with a different backend or a different
 monitoring suite, please choose \"other\". You'll have to configure it
 manually.
";
$elem["nagvis/monitoring_system"]["descriptionde"]="Monitoring-Suite zur Verwendung mit NagVis:
 Das NagVis-Paket unterstützt sowohl Icinga als auch Nagios und benutzt das check-mk-live-Vermittlungs-Backend.
 .
 Wenn Sie NagVis mit einem anderen Backend oder einer anderen Monitoring-Suite verwenden wollen, wählen Sie bitte »Andere«. Sie werden es allerdings per Hand konfigurieren müssen.
";
$elem["nagvis/monitoring_system"]["descriptionfr"]="
 Le paquet NagVis gère aussi bien Icinga que Nagios, en utilisant l'interface « chek-mk-live ».
 .
 Si vous souhaitez utiliser Nagvis avec une autre interface de configuration ou un autre logiciel de supervision, veuillez choisir « Autre ». Vous devrez alors configurer NagVis vous-même.
";
$elem["nagvis/monitoring_system"]["default"]="icinga";
$elem["nagvis/delete_on_purge"]["type"]="boolean";
$elem["nagvis/delete_on_purge"]["description"]="Delete NagVis data when purging the package?
 NagVis creates files in /var/{cache,lib}/nagvis and
 /etc/nagvis (for instance background images and map files), including a small
 database for authentification. If you don't need any of these files,
 they can be removed now, or you may want to keep them and clean up by hand
 later.
";
$elem["nagvis/delete_on_purge"]["descriptionde"]="NagVis-Daten beim vollständigen Entfernen des Pakets ebenfalls löschen?
 NagVis erstellt Dateien in /var/{cache,lib}/nagvis und /etc/nagvis (beispielsweise für Hintergründe und Kartendateien), einschließlich einer kleinen Datenbank für die Authentifizierung. Wenn Sie keine dieser Dateien benötigen, können sie jetzt gelöscht werden. Sie können sie auch behalten und später selbst per Hand entfernen.
";
$elem["nagvis/delete_on_purge"]["descriptionfr"]="Faut-il effacer les données de NagVis lors de la purge du paquet ?
 NagVis crée des fichiers de données dans /var/{cache,lib}/nagvis et /etc/nagvis (pour les images d'arrière-plan et les cartes en cours), y compris une petite base de données pour l'authentification. Si vous n'avez pas besoin de ces fichiers, ils peuvent être effacés maintenant ou vous pouvez les conserver et les supprimer manuellement plus tard.
";
$elem["nagvis/delete_on_purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
