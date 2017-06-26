<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openstack-dashboard-apache");

$elem["horizon/activate_vhost"]["type"]="boolean";
$elem["horizon/activate_vhost"]["description"]="Activate Dashboard and disable default VirtualHost?
 The Apache package sets up a default web site and a default page, configured
 in /etc/apache2/sites-available/default.
 .
 If this option is not selected, Horizon will be installed using /horizon
 instead of the webroot.
 .
 Choose this option to replace that default with the OpenStack Dashboard
 configuration.
";
$elem["horizon/activate_vhost"]["descriptionde"]="";
$elem["horizon/activate_vhost"]["descriptionfr"]="Activer Dashboard et désactiver l'hôte virtuel par défaut ?
 Le paquet Apache installe un site et une page par défaut, configurés dans /etc/apache2/sites-available/default.
 .
 Si cette option n'est pas selectionée, Horizon sera installé sur /horizon plustot que la racine du server web.
 .
 Choisissez cette option pour remplacer le réglage par défaut par la configuration d'OpenStack Dashboard.
";
$elem["horizon/activate_vhost"]["default"]="false";
$elem["horizon/use_ssl"]["type"]="boolean";
$elem["horizon/use_ssl"]["description"]="Should the Dashboard use HTTPS?
 Select this option if you would like Horizon to be served over HTTPS only,
 with a redirection to HTTPS if HTTP is in use.
";
$elem["horizon/use_ssl"]["descriptionde"]="Soll das Dashboard HTTPS verwenden?
 Wählen Sie diese Option, falls Horizon nur über HTTPS bereitgestellt und bei der Nutzung von HTTP auf HTTPS umgeleitet werden soll.
";
$elem["horizon/use_ssl"]["descriptionfr"]="Faut-il utiliser HTTPS pour le Dashboard ?
 Veuillez choisir cette option si vous souhaitez qu'Horizon soit installé sur HTTPS uniquement, avec une redirection vers HTTPS si HTTP est utilisé.
";
$elem["horizon/use_ssl"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
