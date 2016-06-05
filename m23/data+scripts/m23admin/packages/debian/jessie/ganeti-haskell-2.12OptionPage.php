<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ganeti-haskell-2.12");

$elem["ganeti-haskell-2.12/abort-removal"]["type"]="boolean";
$elem["ganeti-haskell-2.12/abort-removal"]["description"]="Abort ${package} removal?
 You are attempting to remove ${package}, but it seems that the running Ganeti
 version is still ${version}.
 .
 This can happen if you upgrade the ganeti package to a new minor version, but
 have not run \"gnt-cluster upgrade\" yet. Removing ${package} will cause Ganeti to
 stop functioning correctly.
 .
 It is highly recommended to abort the removal now and upgrade the cluster before
 removing ${package}.
";
$elem["ganeti-haskell-2.12/abort-removal"]["descriptionde"]="Entfernen von ${package} abbrechen?
 Sie versuchen ${package} zu entfernen, aber die ausgeführte Ganeti-Version scheint noch ${version} zu sein.
 .
 Das kann geschehen, wenn Sie das Ganeti-Paket auf eine neue Minor-Version aktualisieren, aber noch nicht »gnt-cluster-upgrade« ausgeführt haben. ${package} zu entfernen, wird dazu führen, dass Ganeti nicht mehr richtig funktioniert. 
 .
 Es wird dringend empfohlen, das Entfernen nun abzubrechen und den Cluster zu aktualisieren, bevor ${package} entfernt wird.
";
$elem["ganeti-haskell-2.12/abort-removal"]["descriptionfr"]="Faut-il abandonner la suppression de ${package} ?
 Vous êtes en train d'essayer de supprimer ${package}, mais il semble que la version installée de Ganeti soit toujours ${version}.
 .
 Cela peut arriver si vous mettez à jour le paquet ganeti vers une nouvelle version mineure, sans avoir au préalable lancé « gnt-cluster upgrade ». La suppression de ${package} empêchera Ganeti de fonctionner correctement.
 .
 Il est fortement recommandé d'abandonner la suppression maintenant et de mettre à jour la grappe avant de désinstaller ${package}.
";
$elem["ganeti-haskell-2.12/abort-removal"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
