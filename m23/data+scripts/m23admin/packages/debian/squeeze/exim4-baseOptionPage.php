<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("exim4-base");

$elem["exim4/purge_spool"]["type"]="boolean";
$elem["exim4/purge_spool"]["description"]="Remove undelivered messages in spool directory?
 There are e-mail messages in the Exim spool directory
 /var/spool/exim4/input/ which have not yet been delivered. Removing
 Exim will cause them to remain undelivered until Exim is re-installed.
 .
 If this option is not chosen, the spool directory is kept, allowing
 the messages in the queue to be delivered at a later date after
 Exim is re-installed.
";
$elem["exim4/purge_spool"]["descriptionde"]="Nicht zugestellte E-Mails im »spool«-Verzeichnis löschen?
 In Exims »spool«-Verzeichnis /var/spool/exim4/input/ befinden sich noch E-Mails, die noch nicht zugestellt wurden. Wenn Sie Exim entfernen, verbleiben sie dort als nicht zugestellt, bis Exim wieder installiert wird.
 .
 Wenn Sie dieser Auswahl nicht zustimmen, bleibt das »spool«-Verzeichnis bestehen. Dadurch können die Mitteilungen in der Warteschlange später zugestellt werden, nachdem Exim wieder installiert wurde.
";
$elem["exim4/purge_spool"]["descriptionfr"]="Faut-il supprimer les courriels non distribués du tampon d'envoi ?
 Des courriels non distribués ont été trouvés dans le tampon d'envoi d'Exim (/var/spool/exim4/input). Si vous supprimez Exim, ils ne seront pas distribués tant qu'il ne sera pas réinstallé.
 .
 Si vous refusez cette option, le tampon d'envoi sera conservé, ce qui permettra de distribuer les messages de la file d'attente lors de la réinstallation d'Exim.
";
$elem["exim4/purge_spool"]["default"]="false";
$elem["exim4-base/drec"]["type"]="error";
$elem["exim4-base/drec"]["description"]="Reconfigure exim4-config instead of this package
 Exim4 has its configuration factored out into a dedicated package,
 exim4-config. To reconfigure Exim4, use 'dpkg-reconfigure exim4-config'.
";
$elem["exim4-base/drec"]["descriptionde"]="Exim4-config anstelle dieses Pakets neu einrichten
 Die Einstellungen von Exim4 wurden in ein eigenes Paket, exim4-config, ausgelagert. Benutzen Sie den Befehl 'dpkg-reconfigure exim4-config', um Exim4 neu einzurichten.
";
$elem["exim4-base/drec"]["descriptionfr"]="Reconfiguration d'Exim avec exim4-config
 La configuration d'Exim 4 est gérée par un paquet dédié nommé exim4-config. Si vous souhaitez reconfigurer Exim 4, vous devez utiliser la commande « dpkg-reconfigure exim4-config ».
";
$elem["exim4-base/drec"]["default"]="";
PKG_OptionPageTail2($elem);
?>
