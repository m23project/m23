<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cardstories");

$elem["cardstories/reconfigure-webserver"]["type"]="multiselect";
$elem["cardstories/reconfigure-webserver"]["choices"][1]="nginx";
$elem["cardstories/reconfigure-webserver"]["description"]="Web server to reconfigure automatically:
 Please choose the web server that should be automatically configured
 to run cardstories. If the web server provides http://www.example.org/,
 cardstories can then be played at http://www.example.org/cardstories/.
";
$elem["cardstories/reconfigure-webserver"]["descriptionde"]="Webserver, der automatisch neu konfiguriert werden soll:
 Bitte wählen Sie den Webserver, der automatisch konfiguriert werden soll, um cardstories laufen zu lassen. Wenn der Webserver http://www.example.org/ bereitstellt, kann cardstories unter http://www.example.org/cardstories/ gespielt werden.
";
$elem["cardstories/reconfigure-webserver"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Veuillez choisir le serveur web à configurer automatiquement pour lancer cardstories. Si le serveur web fournit une adresse du type http://www.example.org/, alors cardstories pourra être affiché à l'adresse http://www.example.org/cardstories/.
";
$elem["cardstories/reconfigure-webserver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
