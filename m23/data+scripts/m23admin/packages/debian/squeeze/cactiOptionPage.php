<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cacti");

$elem["cacti/webserver"]["type"]="select";
$elem["cacti/webserver"]["choices"][1]="Apache";
$elem["cacti/webserver"]["choices"][2]="Apache-SSL";
$elem["cacti/webserver"]["choices"][3]="Apache2";
$elem["cacti/webserver"]["choices"][4]="All";
$elem["cacti/webserver"]["choicesde"][1]="Apache";
$elem["cacti/webserver"]["choicesde"][2]="Apache-SSL";
$elem["cacti/webserver"]["choicesde"][3]="Apache2";
$elem["cacti/webserver"]["choicesde"][4]="alle";
$elem["cacti/webserver"]["choicesfr"][1]="Apache";
$elem["cacti/webserver"]["choicesfr"][2]="Apache-SSL";
$elem["cacti/webserver"]["choicesfr"][3]="Apache2";
$elem["cacti/webserver"]["choicesfr"][4]="Tous";
$elem["cacti/webserver"]["description"]="Webserver type
 Which kind of web server should be used by cacti?
 .
 Select \"None\" if you would like to configure your webserver by hand.
";
$elem["cacti/webserver"]["descriptionde"]="Webserver
 Welche Art von Webserver soll von Cacti verwendet werden?
 .
 Wählen Sie »keiner«, wenn Sie den Webserver von Hand konfigurieren wollen.
";
$elem["cacti/webserver"]["descriptionfr"]="Type de serveur web :
 Veuillez choisir le type de serveur web qu'utilisera Cacti.
 .
 Choisissez « Aucun » si vous préférez configurer vous-même votre serveur web.
";
$elem["cacti/webserver"]["default"]="Apache";
PKG_OptionPageTail2($elem);
?>
