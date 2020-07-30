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
$elem["postgresql-common/ssl"]["type"]="boolean";
$elem["postgresql-common/ssl"]["description"]="Enable SSL by default in new PostgreSQL clusters?
 PostgreSQL supports SSL-encrypted connections. This is usually a good thing.
 However, if the database is solely accessed using TCP connections on
 localhost, SSL can be turned off without introducing security issues.
 .
 UNIX domain socket connections (called \"local\" in pg_hba.conf) are not
 affected by this setting. This setting concerns new PostgreSQL clusters
 created during package install, or by using the pg_createcluster command. It
 does not reconfigure existing clusters.
 .
 If unsure, enable SSL.
";
$elem["postgresql-common/ssl"]["descriptionde"]="SSL standardmäßig in neuen PostgreSQL-Clustern aktivieren?
 PostgreSQL unterstützt SSL-verschlüsselte Verbindungen, was normalerweise benutzt werden sollte. Wenn die Datenbank jedoch ausschließlich über TCP-Verbindungen über localhost benutzt wird, kann SSL abgeschaltet werden, ohne die Sicherheit zu beeinträchtigen.
 .
 Verbindungen über UNIX-Sockets (in der pg_hba.conf \"local\" genannt) sind nicht von dieser Einstellung betroffen. Diese Einstellung betrifft nur neue PostgreSQL-Cluster, die während der Paket-Installation oder durch pg_createcluster angelegt werden. Es konfiguriert bestehende Cluster nicht um.
 .
 Aktivieren Sie SSL im Zweifelsfall.
";
$elem["postgresql-common/ssl"]["descriptionfr"]="Faut-il activer le protocole SSL par défaut pour les nouvelles grappes PostgreSQL ?
 PostgreSQL supporte les connexions chiffrées avec SSL. C'est généralement une bonne chose. Cependant, si la base de données est accédée exclusivement au travers de connexions TCP locales, SSL peut être désactivé sans pour autant introduire des failles de sécurité.
 .
 Les connexions sur le socket de domaine UNIX (nommées « local » dans pg_hba.conf) ne sont pas affectées par ce réglage. Ce paramètre concerne les nouvelles grappes PostgreSQL créées lors de l'installation du paquet ou en utilisant la commande pg_createcluster. Cela ne reconfigure pas les grappes existantes.
 .
 Dans le doute, activez SSL.
";
$elem["postgresql-common/ssl"]["default"]="true";
$elem["postgresql-common/catversion-bump"]["type"]="note";
$elem["postgresql-common/catversion-bump"]["description"]="PostgreSQL ${version} catalog version changed
 The PostgreSQL cluster ${version} ${cluster} was created using catalog
 version ${db_catversion}, but the currently being installed package
 postgresql-${version} is using catalog version ${new_catversion}. You will not
 be able to use this cluster until it was upgraded to the new catalog version.
 .
 The necessary subset of binaries from the old version was saved in
 ${vartmpdir}. To upgrade the cluster, execute these commands:
 .
   pg_renamecluster ${version} ${cluster} ${cluster}.old
   pg_upgradecluster ${version} ${cluster}.old --rename ${cluster} \
     -m upgrade --old-bindir=${vartmpdir}/bin
   pg_dropcluster ${version} ${cluster}.old
   rm -rf ${vartmpdir}
";
$elem["postgresql-common/catversion-bump"]["descriptionde"]="Geänderte Katalogversion in PostgreSQL ${version}
 Der PostgreSQL-Cluster ${version} ${cluster} wurde mit der Katalogversion ${db_catversion} erstellt, aber das gerade installierte Paket postgresql-${version} benutzt Katalogversion ${new_catversion}. Sie werden diesen Cluster erst wieder benutzen können, wenn er auf die neue Katalogversion aktualisiert wurde.
 .
 Die notwendigen Programmdateien der alten Version wurden in ${vartmpdir} gesichert. Benutzen Sie folgende Kommandos um den Cluster zu aktualisieren:
 .
   pg_renamecluster ${version} ${cluster} ${cluster}.old
   pg_upgradecluster ${version} ${cluster}.old --rename ${cluster} \
     -m upgrade --old-bindir=${vartmpdir}/bin
   pg_dropcluster ${version} ${cluster}.old
   rm -rf ${vartmpdir}
";
$elem["postgresql-common/catversion-bump"]["descriptionfr"]="La version du catalogue de PostgreSQL ${version} a changé.
 La grappe${cluster} PostgreSQL ${version} a été créée en utilisant la version de catalogue  ${db_catversion}, mais le paquet postgresql-${version} actuellement installé utilise la version de catalogue ${new_catversion}. Vous ne pourrez pas utiliser cette grappe tant que vous n'aurez pas mis à jour le catalogue vers la nouvelle version.
 .
 L'ensemble des exécutables nécessaires de l'ancienne version ont été sauvegardés dans ${vartmpdir}. Pour mettre à jour la grappe, veuillez exécuter ces commandes :
 .
   pg_renamecluster ${version} ${cluster} ${cluster}.old
   pg_upgradecluster ${version} ${cluster}.old --rename ${cluster} \
     -m upgrade --old-bindir=${vartmpdir}/bin
   pg_dropcluster ${version} ${cluster}.old
   rm -rf ${vartmpdir}
";
$elem["postgresql-common/catversion-bump"]["default"]="";
PKG_OptionPageTail2($elem);
?>
