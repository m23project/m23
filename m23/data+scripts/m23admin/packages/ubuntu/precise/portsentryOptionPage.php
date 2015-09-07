<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("portsentry");

$elem["portsentry/warn_no_block"]["type"]="note";
$elem["portsentry/warn_no_block"]["description"]="PortSentry does not block anything by default.
 Please note that by default PortSentry takes no action against potential
 attackers. It only dumps messages into /var/log/syslog. To change this
 edit /etc/portsentry/portsentry.conf.
 .
  You may also want to check:
  /etc/default/portsentry (daemon startup options) and
  /etc/portsentry/portsentry.ignore.static (hosts/interfaces to ignore)
 .
 For further details see the portsentry(8) and portsentry.conf(5) manpages.
";
$elem["portsentry/warn_no_block"]["descriptionde"]="PortSentry blockt standardmäßig nichts.
 Bitte beachten Sie, dass PortSentry standardmäßig keine Aktionen gegen potenzielle Angreifer durchführt. Er schreibt nur Informationen nach /var/log/syslog. Um dies zu ändern, passen Sie bitte die Datei /etc/portsentry/portsentry.conf entsprechend an.
 .
  Bitte beachten Sie auch folgende Dateien:
  /etc/default/portsentry (Daemon Start-Optionen) und
  /etc/portsentry/portsentry.ignore.static (zu ignorierende Rechner/Schnittstellen)
 .
 Für weitere Informationen lesen Sie bitte die portsentry(8)- und portsentry.conf(5)-Handbuchseiten.
";
$elem["portsentry/warn_no_block"]["descriptionfr"]="PortSentry ne bloque rien par défaut
 Veuillez noter que PortSentry ne prend aucune mesure par défaut contre les attaquants potentiels. Il se contente de dupliquer les messages dans /var/log/syslog. Pour modifier ce comportement, veuillez modifier /etc/portsentry/portsentry.conf.
 .
  Vous devriez également vérifier :
  /etc/default/portsentry (options de démarrage) et
  /etc/portsentry/portsentry.ignore.static (hôtes/interfaces à ignorer)
 .
 Pour davantage de détails, consultez les pages de manuel portsentry(8) et portsentry.conf(5).
";
$elem["portsentry/warn_no_block"]["default"]="";
$elem["portsentry/startup_conf_obsolete"]["type"]="note";
$elem["portsentry/startup_conf_obsolete"]["description"]="startup.conf is obsolete - use /etc/default/portsentry instead
 /etc/portsentry/startup.conf is no longer used and /etc/default/portsentry
 is used instead. In order to ease the transition I'll do my best to
 preserve your settings while copying them over to the new location. 
 Please check /etc/default/portsentry against /etc/portsentry/startup.conf
 and remove it after the installation has finished.
 .
 Sorry for any inconvenience.
";
$elem["portsentry/startup_conf_obsolete"]["descriptionde"]="startup.conf ist überholt - verwenden Sie stattdessen /etc/default/portsentry
 /etc/portsentry/startup.conf wird nicht mehr benutzt und stattdessen wird /etc/default/portsentry verwendet. Um den Übergang zu erleichtern, werde ich mein Bestes tun, Ihre Einstellungen zu bewahren während ich sie an den neuen Ort kopiere. Bitte überprüfen Sie /etc/default/portsentry gegenüber /etc/portsentry/startup.conf und entfernen sie es nachdem die Installation beendet wurde.
 .
 Entschuldigen Sie eventuelle Unannehmlichkeiten.
";
$elem["portsentry/startup_conf_obsolete"]["descriptionfr"]="startup.conf est obsolète - utilisez /etc/default/portsentry à la place
 /etc/portsentry/startup.conf n'est plus utilisé et /etc/default/portsentry est maintenant utilisé en remplacement. Afin de faciliter la transition, vos paramètres seront copiés avec le plus grand soin vers leur nouvel emplacement. Veuillez comparer /etc/default/portsentry et /etc/portsentry/startup.conf puis supprimer ce dernier une fois l'installation terminée.
 .
 Veuillez accepter les excuses du responsable du paquet pour ces désagréments.
";
$elem["portsentry/startup_conf_obsolete"]["default"]="";
PKG_OptionPageTail2($elem);
?>
