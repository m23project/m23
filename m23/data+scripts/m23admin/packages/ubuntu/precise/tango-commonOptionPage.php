<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tango-common");

$elem["tango-common/tango-host"]["type"]="string";
$elem["tango-common/tango-host"]["description"]="TANGO host:
 Please specify the name of the host where the TANGO database server is running.
";
$elem["tango-common/tango-host"]["descriptionde"]="TANGO-Rechner:
 Bitte geben Sie den Namen des Rechners an, auf dem der TANGO-Datenbankserver läuft.
";
$elem["tango-common/tango-host"]["descriptionfr"]="Serveur Tango :
 Veuillez indiquer le nom de la machine sur laquelle le serveur de bases de données de Tango est installé.
";
$elem["tango-common/tango-host"]["default"]="localhost:10000";
PKG_OptionPageTail2($elem);
?>
