<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pnp4nagios-web");

$elem["pnp4nagios-web/httpd"]["type"]="multiselect";
$elem["pnp4nagios-web/httpd"]["description"]="Web servers to configure for PNP4Nagios:
 Please select which web servers should be configured for PNP4Nagios.
 .
 If you would prefer to perform configuration manually, leave all
 servers unselected.
";
$elem["pnp4nagios-web/httpd"]["descriptionde"]="Für PNP4Nagios einzurichtende Web-Server:
 Bitte wählen Sie, welche Web-Server für PNP4Nagios eingerichtet werden sollen.
 .
 Falls Sie es vorziehen, die Einrichtung manuell durchzuführen, lassen Sie alle Server deselektiert.
";
$elem["pnp4nagios-web/httpd"]["descriptionfr"]="Serveur(s) web à configurer pour PNP4Nagios :
 Veuillez choisir le(s) serveur(s) web à configurer pour PNP4Nagios.
 .
 Si vous préférez configurer vous-même ce paquet, ne sélectionnez aucun serveur.
";
$elem["pnp4nagios-web/httpd"]["default"]="apache2";
PKG_OptionPageTail2($elem);
?>
