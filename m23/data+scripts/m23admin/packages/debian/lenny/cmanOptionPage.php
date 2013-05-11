<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cman");

$elem["cman/upgrade-warning"]["type"]="boolean";
$elem["cman/upgrade-warning"]["description"]="Abort the potentially disruptive upgrade of Red Hat Cluster Suite?
 The new version 2.0 of the Red Hat Cluster Suite is not compatible with
 the currently installed one. Upgrading these packages without stopping
 the complete cluster can cause file system corruption on shared storage
 devices.
 .
 For instructions on how to safely upgrade the Red Hat Cluster Suite to
 version 2.0, please refer to 'http://wiki.debian.org/UpgradeRHCSV1toV2'.
";
$elem["cman/upgrade-warning"]["descriptionde"]="Soll das möglicherweise störende Upgrade der Red Hat Cluster Suite abgebrochen werden?
 Die neue Version 2.0 der Red Hat Cluster Suite ist zu der derzeit installierten nicht kompatibel. Ein Upgrade dieser Pakete ohne Anhalten des kompletten Clusters kann zu Dateisystem-Verfälschungen auf gemeinsam benutzten Speichersystemen führen.
 .
 Für Anweisungen, wie Sie sicher ein Upgrade der Red Hat Cluster Suite auf Version 2.0 durchführen können, lesen Sie bitte http://wiki.debian.org/UpgradeRHCSV1toV2.
";
$elem["cman/upgrade-warning"]["descriptionfr"]="Faut-il interrompre la mise à jour potentiellement perturbatrice de Red Hat Cluster Suite ?
 La nouvelle version 2.0 de Red Hat Cluster Suite n'est pas compatible avec la version déjà installée. La mise à jour de ce paquet sans un arrêt complet de la grappe (« cluster ») pourrait corrompre les systèmes de fichiers sur les périphériques de stockage partagés.
 .
 Pour plus d'informations sur la manière appropriée de mettre Red Hat Cluster Suite version 2.0 à jour, veuillez consulter l'adresse http://wiki.debian.org/UpgradeRHCSV1toV2.
";
$elem["cman/upgrade-warning"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
