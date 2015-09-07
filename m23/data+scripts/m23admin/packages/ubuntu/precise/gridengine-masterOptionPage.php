<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gridengine-master");

$elem["shared/gridengineconfig"]["type"]="boolean";
$elem["shared/gridengineconfig"]["description"]="Configure SGE automatically?
 Please choose whether you wish to configure SGE automatically (with
 debconf). If you do not configure it automatically, the daemons or client
 programs will not work until a manual configuration is performed.
";
$elem["shared/gridengineconfig"]["descriptionde"]="SGE automatisch konfigurieren?
 Bitte wählen Sie, ob SGE automatisch (mittels Debconf) konfiguriert werden soll. Falls Sie das Programm nicht automatisch konfigurieren lassen, werden der Daemon und die Clients nicht funktionieren, bevor eine manuelle Konfiguration erstellt wurde.
";
$elem["shared/gridengineconfig"]["descriptionfr"]="Faut-il configurer SGE automatiquement ?
 Veuillez choisir si vous souhaitez configurer SGE automatiquement (avec « debconf »). Si vous ne choisissez pas cette option, les démons et les clients devront être configurés manuellement pour pouvoir fonctionner.
";
$elem["shared/gridengineconfig"]["default"]="true";
$elem["shared/gridenginecell"]["type"]="string";
$elem["shared/gridenginecell"]["description"]="SGE cell name:
 Please provide the SGE cell name for use by client programs and the
 execution daemon.
";
$elem["shared/gridenginecell"]["descriptionde"]="SGE-Zellenname:
 Bitte geben Sie den SGE-Zellennamen ein, der von Clientprogrammen und dem Ausführungs-Daemon verwendet wird.
";
$elem["shared/gridenginecell"]["descriptionfr"]="Nom de la cellule SGE :
 Veuillez indiquer le nom de la cellule SGE, qui sera utilisée par les programmes clients et le démon d'exécution.
";
$elem["shared/gridenginecell"]["default"]="default";
$elem["shared/gridenginemaster"]["type"]="string";
$elem["shared/gridenginemaster"]["description"]="SGE master hostname:
 The execution daemon and the client programs need to know where the cluster
 master is in order to run.
 .
 Please enter the fully qualified domain name of the grid master.
";
$elem["shared/gridenginemaster"]["descriptionde"]="Hostname des SGE-Masters:
 Damit der Ausführungs-Daemon und die Clientprogramme arbeiten können, muss der Master des Clusters bekannt sein.
 .
 Bitte geben Sie den vollständigen Domain-Namen des Grid-Masters ein.
";
$elem["shared/gridenginemaster"]["descriptionfr"]="Nom d'hôte du maître SGE :
 Le démon d'exécution et les programmes clients doivent connaître le nom d'hôte du serveur maître de la grappe.
 .
 Veuillez indiquer le nom complètement qualifié de serveur maître de la grille.
";
$elem["shared/gridenginemaster"]["default"]="";
PKG_OptionPageTail2($elem);
?>
