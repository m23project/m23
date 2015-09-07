<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("websimba");

$elem["websimba/webserver"]["type"]="select";
$elem["websimba/webserver"]["choices"][1]="Apache";
$elem["websimba/webserver"]["choices"][2]="Apache-SSL";
$elem["websimba/webserver"]["choices"][3]="Apache2";
$elem["websimba/webserver"]["choices"][4]="All";
$elem["websimba/webserver"]["choicesde"][1]="Apache";
$elem["websimba/webserver"]["choicesde"][2]="Apache-SSL";
$elem["websimba/webserver"]["choicesde"][3]="Apache2";
$elem["websimba/webserver"]["choicesde"][4]="Alle";
$elem["websimba/webserver"]["choicesfr"][1]="Apache";
$elem["websimba/webserver"]["choicesfr"][2]="Apache-SSL";
$elem["websimba/webserver"]["choicesfr"][3]="Apache2";
$elem["websimba/webserver"]["choicesfr"][4]="Tous";
$elem["websimba/webserver"]["description"]="Webserver type:
 Simba needs to configure a webserver to correctly function.
 .
 Select \"None\" if you would like to configure your webserver by hand.
";
$elem["websimba/webserver"]["descriptionde"]="Art des Webservers:
 Simba muss zur korrekten Funktion einen Webserver konfigurieren.
 .
 Wählen Sie »Keine« falls Sie Ihren Webserver manuell konfigurieren wollen.
";
$elem["websimba/webserver"]["descriptionfr"]="Type de serveur web :
 Simba nécessite un serveur web configuré pour fonctionner.
 .
 Choisissez « Aucun » si vous souhaitez configurer manuellement le serveur web.
";
$elem["websimba/webserver"]["default"]="Apache";
PKG_OptionPageTail2($elem);
?>
