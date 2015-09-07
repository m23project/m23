<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dhis-client");

$elem["dhis-client/register_with_provider"]["type"]="note";
$elem["dhis-client/register_with_provider"]["description"]="You should register with a DHIS service provider
 If you are using the DHIS client for the first time you should read
 /usr/share/doc/dhis-client/README.Debian for instructions on how to
 register with a DHIS service provider and get the configuration data to
 make your own '/etc/dhid.conf'.
";
$elem["dhis-client/register_with_provider"]["descriptionde"]="Sie sollten sich bei einem DHIS-Serviceprovider anmelden
 Wenn Sie der DHIS Client das erste mal verwenden, dann sollten Sie die Datei /usr/share/doc/dhis-client/README.Debian lesen, um zu erfahren, wie Sie sich bei einem DHIS-Serviceprovider anmelden. Dabei erhalten Sie auch wichtige Konfigurationsangaben, die Sie benötigen, um Ihre eigene Konfigurationsdatei /etc/dhid.conf zu erstellen.
";
$elem["dhis-client/register_with_provider"]["descriptionfr"]="Première installation de dhis-client
 Si vous utilisez le client DHIS pour la première fois, vous devriez lire le fichier /usr/share/doc/dhis-client/README.Debian où vous trouverez les instructions sur la façon d'ouvrir un compte chez un fournisseur de service DHIS et sur les données de configuration nécessaires à l'écriture de votre propre fichier /etc/dhid.conf.
";
$elem["dhis-client/register_with_provider"]["default"]="";
$elem["dhis-client/old_conf_warn"]["type"]="note";
$elem["dhis-client/old_conf_warn"]["description"]="You seem to have a 3.x/4.x config file
 You should read /usr/share/doc/dhis-client/README.Debian for instructions
 on how to update /etc/dhid.conf.
";
$elem["dhis-client/old_conf_warn"]["descriptionde"]="Es scheint, dass eine 3.x/4.x Konfigurationsdatei existiert
 Sie sollten die Datei /usr/share/doc/dhis-client/README.Debian lesen, um zu erfahren, wie Sie die Datei /etc/dhid.conf aktualisieren.
";
$elem["dhis-client/old_conf_warn"]["descriptionfr"]="Fichier de configuration déjà présent
 Il semble qu'un fichier de configuration d'une version 3.x ou 4.x existe sur votre système. Vous devriez lire le fichier /usr/share/doc/dhis-client/README.Debian ; vous y trouverez les instructions sur la manière de mettre votre fichier /etc/dhid.conf à jour.
";
$elem["dhis-client/old_conf_warn"]["default"]="";
PKG_OptionPageTail2($elem);
?>
