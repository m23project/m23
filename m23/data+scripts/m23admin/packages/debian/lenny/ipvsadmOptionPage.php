<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipvsadm");

$elem["ipvsadm/daemon_method"]["type"]="select";
$elem["ipvsadm/daemon_method"]["choices"][1]="none";
$elem["ipvsadm/daemon_method"]["choices"][2]="master";
$elem["ipvsadm/daemon_method"]["choices"][3]="backup";
$elem["ipvsadm/daemon_method"]["choicesde"][1]="keinen";
$elem["ipvsadm/daemon_method"]["choicesde"][2]="Master";
$elem["ipvsadm/daemon_method"]["choicesde"][3]="Backup";
$elem["ipvsadm/daemon_method"]["choicesfr"][1]="Aucun";
$elem["ipvsadm/daemon_method"]["choicesfr"][2]="Maître";
$elem["ipvsadm/daemon_method"]["choicesfr"][3]="Sauvegarde";
$elem["ipvsadm/daemon_method"]["description"]="Daemon method:
 ipvsadm can activate the IPVS synchronization daemon. \"master\" starts this
 daemon in master mode, \"backup\" in backup mode and \"both\" uses master and
 backup mode at the same time. \"none\" disables the daemon.
 .
 See the man page for more details, ipvsadm(8).
";
$elem["ipvsadm/daemon_method"]["descriptionde"]="Daemon-Methode:
 Ipvsadm kann den IPVS-Synchronisationsdaemon aktivieren. »Master« startet diesen Daemon im Master-Modus, »Backup« im Backup-Modus und »beide« verwendet Master- und Backup-Modus gleichzeitig. »keinen« deaktiviert den Daemon.
 .
 Für nähere Informationen lesen Sie die Handbuchseite ipvsadm(8).
";
$elem["ipvsadm/daemon_method"]["descriptionfr"]="Méthode de lancement du démon :
 Ipvsadm peut activer le démon de synchronisation IPVS. Le choix « Maître » lance le démon en mode maître, « Sauvegarde » en mode sauvegarde, « Les deux » utilise les deux modes et « Aucun » désactive le démon.
 .
 Veuillez consulter la page de manuel, ipvsadm(8), pour plus d'informations.
";
$elem["ipvsadm/daemon_method"]["default"]="none";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["type"]="note";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["description"]="Kernel does not support IPVS
 ipvsadm requires IPVS support in the kernel. Please use a kernel with IPVS
 modules, otherwise this software is pretty useless.
";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["descriptionde"]="Der Kernel unterstützt IPVS nicht
 Ipvsadm benötigt IPVS-Unterstützung im Kernel. Bitte benutzen Sie einen Kernel mit IPVS-Modulen, sonst ist diese Software nutzlos.
";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["descriptionfr"]="Pas de gestion IPVS dans le noyau
 Ipvsadm a besoin d'un noyau qui gère IPVS. Veuillez utiliser un noyau qui comporte un module IPVS. Sans cela, ce logiciel ne peut pas être utilisé.
";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["default"]="";
$elem["ipvsadm/auto_load_rules"]["type"]="boolean";
$elem["ipvsadm/auto_load_rules"]["description"]="Do you want to automatically load IPVS rules on boot?
 If you choose this option your IPVS rules will be loaded from
 /etc/ipvsadm.rules automatically on boot.
";
$elem["ipvsadm/auto_load_rules"]["descriptionde"]="Möchten Sie IPVS-Regeln beim Booten automatisch laden?
 Falls Sie diese Option wählen, werden Ihre IPVS-Regeln beim Booten automatisch aus /etc/ipvsadm.rules geladen.
";
$elem["ipvsadm/auto_load_rules"]["descriptionfr"]="Faut-il charger automatiquement les règles d'IPVS au démarrage ?
 Si vous choisissez cette option, les règles IPVS seront automatiquement chargées à chaque démarrage, depuis le fichier /etc/ipvsadm.rules.
";
$elem["ipvsadm/auto_load_rules"]["default"]="false";
$elem["ipvsadm/daemon_multicast_interface"]["type"]="string";
$elem["ipvsadm/daemon_multicast_interface"]["description"]="Multicast interface for ipvsadm:
 Select the multicast interface to be used by synchronization daemon. e.g.
 eth0, eth1...
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["descriptionde"]="Multicast-Schnittstelle für Ipvsadm:
 Wählen Sie die Multicast-Schnittstelle aus, die vom Synchronisationsdaemon verwendet werden soll, z.B. eth0, eth1 usw.
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["descriptionfr"]="Interface multidiffusion pour ipvsadm :
 Veuillez indiquer l'interface de multidiffusion (« multicast ») qui doit être utilisée par le démon de synchronisation. Par exemple : eth0, eth1...
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
