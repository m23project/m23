<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("couriergraph");

$elem["couriergraph/start_on_boot"]["type"]="boolean";
$elem["couriergraph/start_on_boot"]["description"]="Should CourierGraph start on boot?
 Couriergraph can start on boot time as a daemon. Then it will monitor
 your mail logfile for changes. This is recommended.
 .
 The other method is to call couriergraph.pl by hand with the -l parameter.
";
$elem["couriergraph/start_on_boot"]["descriptionde"]="Soll CourierGraph beim Booten gestartet werden?
 Couriergraph kann zum Bootzeitpunkt als Daemon gestartet werden. Es wird dann Ihre E-Mail-Logdateien auf Änderungen überwachen. Dies wird empfohlen.
 .
 Die andere Methode besteht darin, couriergraph.pl händisch mit dem »-l«-Parameter aufzurufen.
";
$elem["couriergraph/start_on_boot"]["descriptionfr"]="Faut-il lancer CourierGraph au démarrage ?
 CourierGraph peut être lancé en tant que démon au démarrage. Il commencera alors à surveiller vos journaux de courriel. Ce choix est recommandé.
 .
 L'autre méthode est le lancement manuel de couriergraph.pl avec le paramètre -l.
";
$elem["couriergraph/start_on_boot"]["default"]="true";
$elem["couriergraph/logfile"]["type"]="string";
$elem["couriergraph/logfile"]["description"]="Logfile to be used by couriergraph:
 Enter the logfile which should be used to create the databases for
 couriergraph. If unsure, leave default.
";
$elem["couriergraph/logfile"]["descriptionde"]="Logdatei, die von Couriergraph verwendet werden soll:
 Geben Sie die Logdatei ein, die verwendet werden soll, um die Datenbank für Couriergraph zu erstellen. Falls Sie sich unsicher sind, verwenden Sie die Standardeinstellung.
";
$elem["couriergraph/logfile"]["descriptionfr"]="Journal utilisé par CourierGraph :
 Veuillez entrer le journal dont les données serviront à la création des bases de données de CourierGraph. Si vous n'êtes pas sûr, laissez la valeur par défaut.
";
$elem["couriergraph/logfile"]["default"]="/var/log/mail.log";
$elem["couriergraph/stay_on_purge"]["type"]="boolean";
$elem["couriergraph/stay_on_purge"]["description"]="Remove RRD files on purge?
 Couriergraph keeps its database files under /var/lib/couriergraph. State
 whether this directory should be removed completely on purge or not.
";
$elem["couriergraph/stay_on_purge"]["descriptionde"]="RRD-Dateien beim vollständigen Löschen entfernen?
 Couriergraph behält seine Datenbankdateien unter /var/lib/couriergraph. Geben Sie an, ob dieses Verzeichnis komplett entfernt werden soll oder nicht, wenn Sie das Paket vollständig löschen (purge).
";
$elem["couriergraph/stay_on_purge"]["descriptionfr"]="Faut-il supprimer les fichiers RRD lors de la purge ?
 CourierGraph garde ses fichiers de bases de données dans le répertoire /var/lib/couriergraph. Veuillez confirmer s'il faut complètement supprimer ce répertoire lors de la purge.
";
$elem["couriergraph/stay_on_purge"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
