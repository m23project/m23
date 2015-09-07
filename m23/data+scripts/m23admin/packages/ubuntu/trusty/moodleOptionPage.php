<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("moodle");

$elem["moodle/www"]["type"]="string";
$elem["moodle/www"]["description"]="URL for the Moodle site:
 Please enter the URL from which Moodle should serve pages.
 .
 The moodle package does not perform any automatic web server configuration,
 but does provide basic configuration templates for Apache.
 .
 Please leave off the trailing \"/\".
";
$elem["moodle/www"]["descriptionde"]="URL für die Moodle-Site:
 Bitte geben Sie die URL ein, von der Moodle Seiten bereitstellen soll.
 .
 Das Moodle-Paket führt keine automatische Webserver-Konfiguration durch, stellt jedoch einfache Konfigurationsvorlagen für Apache zur Verfügung.
 .
 Bitte lassen Sie das abschließende »/« weg.
";
$elem["moodle/www"]["descriptionfr"]="URL du site Moodle :
 Veuillez indiquer l'adresse Internet (URL) utilisée par Moodle pour afficher les pages.
 .
 Le paquet de Moodle ne configure pas automatiquement le serveur web, mais fournit des modèles de configuration pour Apache.
 .
 Cette adresse ne doit pas se terminer par le caractère « / ».
";
$elem["moodle/www"]["default"]="http://localhost/moodle";
PKG_OptionPageTail2($elem);
?>
