<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nsd");

$elem["nsd3/old_confdir_exists"]["type"]="note";
$elem["nsd3/old_confdir_exists"]["description"]="Configuration directory for NSD changed
 NSD 4 has changed the configuration directory from /etc/nsd3 to
 /etc/nsd.
 .
 The old configuration file (/etc/nsd3/nsd.conf) will be moved to
 /etc/nsd/nsd.conf. However, other configuration files in
 /etc/nsd3 will not be moved, so you need to check
 and move your configuration snippets and zone files yourself.
";
$elem["nsd3/old_confdir_exists"]["descriptionde"]="Geändertes Konfigurationsverzeichnis für NSD
 Das NSD-4-Konfigurationsverzeichnis hat sich von /etc/nsd3 in /etc/nsd geändert.
 .
 Die alte Konfigurationsdatei (/etc/nsd3/nsd.conf) wird nach /etc/nsd/nsd.conf verschoben, andere Konfigurationsdateien in /etc/nsd3 jedoch nicht. Daher müssen Sie Ihre Konfigurationsschnipsel und Zonendateien selbst überprüfen und verschieben.
";
$elem["nsd3/old_confdir_exists"]["descriptionfr"]="Déplacement du répertoire de configuration de NSD
 Le répertoire de configuration de NSD 4 a été déplacé de /etc/nsd3 à /etc/nsd.
 .
 L'ancien fichier de configuration (/etc/nsd3/nsd.conf) sera déplacé vers /etc/nsd/nsd.conf. Toutefois, les autres fichiers de configuration présents dans /etc/nsd3 ne seront pas déplacés ; vous devrez donc vérifier et déplacer vos bribes de configuration et vos fichiers de zone vous-même.
";
$elem["nsd3/old_confdir_exists"]["default"]="";
PKG_OptionPageTail2($elem);
?>
