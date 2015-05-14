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
$elem["ipvsadm/daemon_method"]["choicesde"][1]="aus";
$elem["ipvsadm/daemon_method"]["choicesde"][2]="Master";
$elem["ipvsadm/daemon_method"]["choicesde"][3]="Datensicherung";
$elem["ipvsadm/daemon_method"]["choicesfr"][1]="Inactif";
$elem["ipvsadm/daemon_method"]["choicesfr"][2]="Maître";
$elem["ipvsadm/daemon_method"]["choicesfr"][3]="Sauvegarde";
$elem["ipvsadm/daemon_method"]["description"]="Daemon method:
 ipvsadm can activate the IPVS synchronization daemon. \"master\" starts this
 daemon in master mode, \"backup\" starts it in backup mode, and \"both\" uses
 master and backup modes at the same time. \"none\" disables the daemon.
 .
 See the ipvsadm(8) man page for more details.
";
$elem["ipvsadm/daemon_method"]["descriptionde"]="Daemon-Methode:
 Ipvsadm kann den IPVS-Synchronisierungs-Daemon aktivieren. »Master« startet diesen Daemon im Master-Modus. »Datensicherung« startet ihn im Datensicherungsmodus und »beides« verwendet die Modi »Master« und »Datensicherung« zur gleichen Zeit. »aus« deaktiviert den Daemon.
 .
 Weitere Einzelheiten finden Sie in der Handbuchseite ipvsadm(8).
";
$elem["ipvsadm/daemon_method"]["descriptionfr"]="Mode de fonctionnement du démon ipvsadm :
 Le démon de synchronisation d'IPVS peut être activé avec ipvsadm.Le choix « Maître » le lance en mode maître, le choix « Sauvegarde » en mode sauvegarde, « Les deux » utilise les deux modes en même temps. Si vous choisissez « Inactif », le démon est désactivé.
 .
 Veuillez consulter la page de manuel d'ipvsadm(8) pour plus d'informations.
";
$elem["ipvsadm/daemon_method"]["default"]="none";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["type"]="error";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["description"]="Kernel does not support IPVS
 ipvsadm is useless with this kernel, since it has been built with CONFIG_IP_VS=n.
 Please use a kernel compiled with IPVS support.
";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["descriptionde"]="Kernel unterstützt kein IPVS
 Ipvsadm ist mit diesem Kernel nutzlos, da er mit »CONFIG_IP_VS=n« gebaut wurde. Bitte verwenden Sie einen Kernel, der mit IPVS-Unterstützung kompiliert wurde.
";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["descriptionfr"]="Pas de prise en charge d'IPVS dans le noyau
 Il est inutile d'utiliser ipvsadm avec ce noyau car il a été compilé avec « CONFIG_IP_VS=n ». Vous devez utiliser un noyau qui gère IPVS.
";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["default"]="";
$elem["ipvsadm/auto_load_rules"]["type"]="boolean";
$elem["ipvsadm/auto_load_rules"]["description"]="Do you want to automatically load IPVS rules on boot?
 If you choose this option, IPVS rules will be loaded from
 /etc/ipvsadm.rules automatically on boot.
";
$elem["ipvsadm/auto_load_rules"]["descriptionde"]="Möchten Sie die IPVS-Regeln automatisch beim Systemstart laden?
 Falls Sie diese Option wählen, werden IPVS-Regeln automatisch beim Systemstart aus /etc/ipvsadm.rules geladen.
";
$elem["ipvsadm/auto_load_rules"]["descriptionfr"]="Voulez-vous charger automatiquement les règles IPVS au démarrage ?
 Si vous choisissez cette option, les règles IPVS seront chargées depuis /etc/ipvsadm.rules au démarrage du système.
";
$elem["ipvsadm/auto_load_rules"]["default"]="false";
$elem["ipvsadm/daemon_multicast_interface"]["type"]="string";
$elem["ipvsadm/daemon_multicast_interface"]["description"]="Multicast interface for ipvsadm:
 Please specify the multicast interface to be used by the synchronization
 daemon.
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["descriptionde"]="Multicast-Schnittstelle für Ipvsadm:
 Bitte geben Sie die Multicast-Schnittstelle an, die vom Synchronisierungs-Daemon benutzt wird.
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["descriptionfr"]="Interface multicast pour ipvsadm :
 Veuillez indiquer l'interface multicast qui doit être utilisée avec le démon de synchronisation.
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
