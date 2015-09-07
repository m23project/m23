<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bindgraph");

$elem["bindgraph/start_on_boot"]["type"]="boolean";
$elem["bindgraph/start_on_boot"]["description"]="Should bindgraph start on boot?
 Bindgraph can start on boot time as a daemon. Then it will monitor
 your BIND logfile for changes. This is recommended.
 .
 The other method is to call bindgraph.pl by hand with the -l parameter.
";
$elem["bindgraph/start_on_boot"]["descriptionde"]="Soll Bindgraph beim Systemstart gestartet werden?
 Bindgraph kann während des Systemstarts als Daemon starten. In diesem Fall wird es Ihre BIND-Logdatei auf Änderungen hin überwachen. Dies wird empfohlen.
 .
 Die andere Methode ist, bindgraph.pl von Hand mit dem Parameter -l aufzurufen.
";
$elem["bindgraph/start_on_boot"]["descriptionfr"]="Faut-il lancer bindgraph au démarrage?
 Bindgraph peut être lancé en tant que démon au démarrage. Il commencera
 alors à surveiller vos journaux de BIND. Ce choix est recommandé.
 .
 L'autre méthode possible est le lancement manuel de bindgraph.pl avec le paramétre -l.
";
$elem["bindgraph/start_on_boot"]["default"]="true";
$elem["bindgraph/logfile"]["type"]="string";
$elem["bindgraph/logfile"]["description"]="Bindgraph log file:
 Please specify the name of the log file from which data should be
 pulled to create the databases for bindgraph. If unsure, leave the
 default value.
";
$elem["bindgraph/logfile"]["descriptionde"]="Protokolldatei für Bindgraph:
 Bitte geben Sie die Protokolldatei an, von welcher die Daten bezogen werden sollen, um die Datenbanken für Bindgraph zu erzeugen. Falls Sie sich nicht sicher sind, belassen Sie die Voreinstellung.
";
$elem["bindgraph/logfile"]["descriptionfr"]="Fichier journal utilisé par bindgraph :
 Veuillez indiquer le journal dont les données serviront à la création des bases de données de bindgraph. Si vous n'étes pas sûr, laissez la valeur par défaut.
";
$elem["bindgraph/logfile"]["default"]="/var/log/bind9-query.log";
$elem["bindgraph/stay_on_purge"]["type"]="boolean";
$elem["bindgraph/stay_on_purge"]["description"]="Remove RRD files on purge?
 Bindgraph keeps its database files under /var/lib/bindgraph. Please choose
 whether this directory should be removed completely on purge.
";
$elem["bindgraph/stay_on_purge"]["descriptionde"]="RRD-Dateien beim vollständigen Entfernen löschen?
 Bindgraph speichert seine Datenbankdateien unter /var/lib/bindgraph. Bitte wählen Sie, ob dieses Verzeichnis gelöscht werden soll, wenn das Paket vollständig entfernt wird?
";
$elem["bindgraph/stay_on_purge"]["descriptionfr"]="Faut-il supprimer les fichiers RRD lors de la purge??
 Bindgraph garde ses fichiers de bases de données dans le répertoire /var/lib/bindgraph. Veuillez confirmer s'il faut complétement supprimer ce répertoire lors de la purge.
";
$elem["bindgraph/stay_on_purge"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
