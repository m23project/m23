<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nginx-naxsi-ui");

$elem["nginx-naxsi-ui/dbhost"]["type"]="string";
$elem["nginx-naxsi-ui/dbhost"]["description"]="Database host for naxsi:
 Please specify the hostname of the server that will host the database
 for the naxsi web application firewall.
";
$elem["nginx-naxsi-ui/dbhost"]["descriptionde"]="Datenbankrechner für Naxsi:
 Bitte geben Sie den Rechnernamen des Servers an, der die Datenbank der Web-Anwendungs-Firewall Naxsi beherbergen soll.
";
$elem["nginx-naxsi-ui/dbhost"]["descriptionfr"]="Serveur hébergeant la base de données pour naxsi :
 Merci de fournir l'adresse du serveur de base de données pour l'application de pare-feu web naxsi.
";
$elem["nginx-naxsi-ui/dbhost"]["default"]="localhost";
PKG_OptionPageTail2($elem);
?>
