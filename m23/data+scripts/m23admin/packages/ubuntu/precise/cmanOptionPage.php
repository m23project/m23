<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cman");

$elem["cman/upgrade-warning"]["type"]="boolean";
$elem["cman/upgrade-warning"]["description"]="Do you want to abort the Red Hat Cluster Suite upgrade?
 The new version 3 of the Red Hat Cluster Suite is not compatible with
 the currently installed one. Upgrading these packages without stopping
 the complete cluster can cause file system corruption on shared storage
 devices.
";
$elem["cman/upgrade-warning"]["descriptionde"]="Möchten Sie das Upgrade der Red Hat Cluster Suite abbrechen?
 Die neue Version 3 der Red Hat Cluster Suite ist zu der derzeitig installierten Version nicht kompatibel. Ein Upgrade ohne vorher den kompletten Cluster anzuhalten könnte zur Beschädigung des Dateisystems auf gemeinsam genutzten Speichergeräten führen.
";
$elem["cman/upgrade-warning"]["descriptionfr"]="Voulez-vous interrompre la mise à jour de Red Hat Cluster Suite ?
 La nouvelle version 3 de Red Hat Cluster Suite n'est pas compatible avec la version déjà installée. La mise à jour de ce paquet sans un arrêt complet de la grappe (« cluster ») pourrait corrompre les systèmes de fichiers sur les périphériques de stockage partagés.
";
$elem["cman/upgrade-warning"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
