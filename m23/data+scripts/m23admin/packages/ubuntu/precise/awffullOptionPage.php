<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("awffull");

$elem["awffull/directory"]["type"]="string";
$elem["awffull/directory"]["description"]="Directory to put the output in:
";
$elem["awffull/directory"]["descriptionde"]="Verzeichnis für die Ausgabe:
";
$elem["awffull/directory"]["descriptionfr"]="Répertoire des résultats :
";
$elem["awffull/directory"]["default"]="/var/www/awffull";
$elem["awffull/logfile"]["type"]="string";
$elem["awffull/logfile"]["description"]="Webserver's rotated log filename:
";
$elem["awffull/logfile"]["descriptionde"]="Name der rotierten Logdatei des Webservers:
";
$elem["awffull/logfile"]["descriptionfr"]="Fichier journal du serveur web :
";
$elem["awffull/logfile"]["default"]="/var/log/apache/access.log.1";
PKG_OptionPageTail2($elem);
?>
