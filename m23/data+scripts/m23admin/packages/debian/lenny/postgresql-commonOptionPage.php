<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postgresql-common");

$elem["postgresql-common/obsolete-major"]["type"]="error";
$elem["postgresql-common/obsolete-major"]["description"]="Obsolete major version ${old}
 The PostgreSQL version ${old} is obsolete, but the server
 or client packages are still installed. Please install the latest packages
 (postgresql-${latest} and postgresql-client-${latest}) and upgrade the
 existing ${oldversion} clusters with pg_upgradecluster (see manpage).
 .
 Please be aware that the installation of postgresql-${latest} will
 automatically create a default cluster ${latest}/main. If you want to upgrade
 the ${old}/main cluster, you need to remove the already existing ${latest}
 cluster (pg_dropcluster --stop ${latest} main, see manpage for
 details).
 .
 The old server and client packages are no longer supported. After the
 existing clusters are upgraded, the postgresql-${old} and
 postgresql-client-${old} packages should be removed.
 .
 Please see /usr/share/doc/postgresql-common/README.Debian.gz for details.
";
$elem["postgresql-common/obsolete-major"]["descriptionde"]="Veraltete Version ${old}
 Die PostgreSQL-Version ${old} ist veraltet, aber die Server-oder Client-Pakete sind noch installiert. Bitte installieren Sie die aktuellen Pakete (postgresql-${latest} und postgresql-client-${latest}) und aktualisieren Sie die existierenden Cluster mit pg_upgradecluster (siehe man-Seite).
 .
 Bitte beachten Sie, dass die Installation des Pakets postgresql-${latest} automatisch einen Standard-Cluster ${latest}/main anlegt. Wenn Sie den Cluster ${old}/main aktualisieren möchten, müssen Sie den schon vorhandenen ${latest} Cluster entfernen (pg_dropcluster --stop ${latest} main, siehe man-Seite für Details).
 .
 Die alten Server- und Client-Pakete werden nicht mehr unterstützt. Nachdem die existierenden Cluster aktualisiert werden, sollten die Pakete postgresql-${old} und postgresql-client-${old} entfernt werden.
 .
 Bitte lesen Sie /usr/share/doc/postgresql-common/README.Debian.gz für Details.
";
$elem["postgresql-common/obsolete-major"]["descriptionfr"]="Version majeure ${old} obsolète
 La version ${old} de PostgreSQL est obsolète, mais le paquet du client ou du serveur est toujours installé. Veuillez installer la version la plus récente des paquets postgresql-${latest} et postgresql-client-${latest} et mettre à niveau les grappes (« clusters ») en version ${oldversion} avec « pg_upgradecluster ». Veuillez consulter la page de manuel pour plus de précisions.
 .
 Veuillez noter que l'installation de postgresql-${latest} créera par défaut une grappe (« cluster ») ${latest}/main. Si vous souhaitez mettre à niveau la grappe ${old}/main, il faudra supprimer la grappe ${latest} en exécutant la commande « pg_dropcluster--stop ${latest} main ». Veuillez consulter la page de manuel pour plus de précisions.
 .
 Les anciennes versions des paquets client et serveur ne sont plus maintenues. Après la mise à niveau des grappes (« clusters »), les paquets postgresql-${old} et postgresql-client-${old} devraient être supprimés.
 .
 Veuillez consulter /usr/share/doc/postgresql-common/README.Debian.gz pour plus de détails.
";
$elem["postgresql-common/obsolete-major"]["default"]="";
PKG_OptionPageTail2($elem);
?>
