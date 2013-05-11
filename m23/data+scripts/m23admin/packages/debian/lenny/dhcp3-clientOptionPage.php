<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dhcp3-client");

$elem["dhcp3-client/dhclient-script_moved"]["type"]="note";
$elem["dhcp3-client/dhclient-script_moved"]["description"]="dhclient-script moved
 As of 3.0.4-2, dhclient-script is installed in /sbin and is no longer
 registered as a configuration file. /etc/dhcp3/dhclient-script
 appears to have been modified at some point, so it has not been
 removed. However it is no longer being used.
 .
 Please consider using the hook infrastructure (see dhclient-script(8)
 for more information) instead of modifying dhclient-script.
";
$elem["dhcp3-client/dhclient-script_moved"]["descriptionde"]="dhclient-script wurde verschoben
 Mit der Version 3.0.4-2 wird die Datei dhclient-script in das Verzeichnis /sbin installiert und ist nicht mehr als Konfigurationsdatei eingetragen. Die Datei /etc/dhcp3/dhclient-script scheint verändert worden zu sein und wurde deshalb nicht gelöscht. Sie wird aber nicht mehr benutzt.
 .
 Bitte benutzen Sie den Hook-Mechanismus (siehe dhclient-script(8) für weitere Informationen) anstatt die Datei dhclient-script zu verändern.
";
$elem["dhcp3-client/dhclient-script_moved"]["descriptionfr"]="Déplacement du script dhclient-script
 Depuis la version 3.0.4-2, le script dhclient-script est installé dans /sbin et n'est plus un fichier de configuration. Ce fichier /etc/dhcp3/dhclient-script a été modifié sans être supprimé mais n'est plus utilisé.
 .
 Veuillez considérer l'utilisation de l'infrastructure de crochet plutôt que de modifier le fichier dhclient-script.
";
$elem["dhcp3-client/dhclient-script_moved"]["default"]="";
$elem["dhcp3-client/dhclient-needs-restarting"]["type"]="note";
$elem["dhcp3-client/dhclient-needs-restarting"]["description"]="dhclient needs restarting
 As always, dhclient is not restarted on upgrade, so you are still running the
 previous version of dhclient. You can restart it by doing an ifdown and ifup
 on the interface(s) that are configured to use DHCP, or by explicitly killing
 and restarting dhclient.
 .
 Naturally, you should exercise caution if you are managing a remote server via
 an interface using DHCP.
";
$elem["dhcp3-client/dhclient-needs-restarting"]["descriptionde"]="dhclient muss neu gestartet werden
 Dhclient wird, wie immer, während der Aktualisierung nicht neu gestartet, deshalb arbeiten Sie noch mit der vorherigen Version von dhclient. Sie können es durch die Kommandos ifdown und ifup an den Schnittstellen, die DHCP benutzen, neu starten oder dhclient ausdrücklich beenden und neu starten.
 .
 Sie sollten vorsichtig sein, falls Sie einen entfernten Rechner über eine Schnittstelle verwalten, die DHCP benutzt.
";
$elem["dhcp3-client/dhclient-needs-restarting"]["descriptionfr"]="Redémarrage nécessaire pour dhclient
 Dhclient n'est jamais redémarré lors d'une mise à jour, et la version précédente est actuellement active. Vous pouvez redémarrer ce script avec les commandes « ifdown » et « ifup » sur la (les) interface(s) configurée(s) pour utiliser DHCP, ou alors tuer le processus et ensuite redémarrer dhclient.
 .
 La prudence est recommandée avec un serveur distant géré via une interface qui utilise elle-même DHCP.
";
$elem["dhcp3-client/dhclient-needs-restarting"]["default"]="";
PKG_OptionPageTail2($elem);
?>
