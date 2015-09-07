<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snmpd");

$elem["snmpd/upgradefrom521"]["type"]="note";
$elem["snmpd/upgradefrom521"]["description"]="Default parameters changed since version 5.2.1
 The default start parameters of the snmpd agent/daemon have been changed.
 .
 The daemon is now started as user snmp, binds to localhost only and runs
 with SNMP multiplexing (SMUX) support disabled. These parameters can all
 be individually changed in /etc/default/snmpd.
 .
 Please see /usr/share/doc/snmpd/NEWS.Debian.gz for more details.
";
$elem["snmpd/upgradefrom521"]["descriptionde"]="Standardparameter seit Version 5.2.1 geändert
 Die Standard-Startparameter des Snmpd-Agenten/Daemons wurden geändert.
 .
 Der Daemon wird jetzt als Benutzer snmp gestartet, bindet sich nur an localhost und läuft mit deaktiviertem SNMP-Multiplexing (SMUX). Diese Parameter können alle individuell in /etc/default/snmpd geändert werden.
 .
 Bitte lesen Sie /usr/share/doc/snmpd/NEWS.Debian.gz für weitere Details.
";
$elem["snmpd/upgradefrom521"]["descriptionfr"]="Changement des paramètres par défaut dans la version 5.2.1
 Les paramètres par défaut du démarrage de l'agent SNMP snmpd ont été modifiés.
 .
 Le serveur est dorénavant démarré avec les privilèges de l'utilisateur « snmp ». Il n'écoute que sur l'adresse de « localhost » et la gestion du multiplexage SNMP (SMUX) est désactivée. Ces paramètres peuvent tous être changés individuellement dans /etc/default/snmpd.
 .
 Veuillez lire le fichier /usr/share/doc/snmpd/NEWS.Debian.gz pour plus d'informations.
";
$elem["snmpd/upgradefrom521"]["default"]="";
PKG_OptionPageTail2($elem);
?>
