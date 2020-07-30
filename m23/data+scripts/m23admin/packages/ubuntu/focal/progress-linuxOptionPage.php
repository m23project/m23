<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("progress-linux");

$elem["progress-linux/title"]["type"]="title";
$elem["progress-linux/title"]["description"]="Progress Linux: Setup
";
$elem["progress-linux/title"]["descriptionde"]="Einrichtung
";
$elem["progress-linux/title"]["descriptionfr"]="configuration
";
$elem["progress-linux/title"]["default"]="";
$elem["progress-linux/archives"]["type"]="multiselect";
$elem["progress-linux/archives"]["description"]="setup apt archives:
 Please select the apt archives to setup.
";
$elem["progress-linux/archives"]["descriptionde"]="Apt-Archive einrichten:
 Bitte wählen Sie die einzurichtenden Apt-Archive aus.
";
$elem["progress-linux/archives"]["descriptionfr"]="Configurer les archives APT :
 Veuillez choisir les archives APT à configurer.
";
$elem["progress-linux/archives"]["default"]="";
$elem["progress-linux/archive-areas"]["type"]="multiselect";
$elem["progress-linux/archive-areas"]["description"]="setup apt archive areas:
 Please select the apt archive areas to setup.
";
$elem["progress-linux/archive-areas"]["descriptionde"]="Apt-Archivbereiche einrichten:
 Bitte wählen Sie die einzurichtenden Apt-Archivbereiche aus.
";
$elem["progress-linux/archive-areas"]["descriptionfr"]="Configurer les sections de l'archive APT :
 Veuillez choisir les sections de l'archive APT à configurer.
";
$elem["progress-linux/archive-areas"]["default"]="";
$elem["progress-linux/mirror"]["type"]="string";
$elem["progress-linux/mirror"]["description"]="enter apt mirror:
 Please specify the mirror to download packages from.
 .
 If unsure, leave empty which will use the default mirror
 (https://cdn.deb.progress-linux.org/packages).
";
$elem["progress-linux/mirror"]["descriptionde"]="Eingabe APT-Spiegel-Server:
 Bitte legen Sie den Spiegel-Server zum Herunterladen von Paketen fest.
 .
 Falls Sie sich nicht sicher sind, lassen Sie die Eingabe leer und verwenden den Vorgabe-Spiegel-Server (https://cdn.deb.progress-linux.org/packages).
";
$elem["progress-linux/mirror"]["descriptionfr"]="";
$elem["progress-linux/mirror"]["default"]="https://cdn.deb.progress-linux.org/packages";
PKG_OptionPageTail2($elem);
?>
