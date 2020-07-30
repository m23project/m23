<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postgresql-12");

$elem["postgresql-12/postrm_purge_data"]["type"]="boolean";
$elem["postgresql-12/postrm_purge_data"]["description"]="Remove PostgreSQL directories when package is purged?
 Removing the PostgreSQL server package will leave existing database clusters
 intact, i.e. their configuration, data, and log directories will not be
 removed. On purging the package, the directories can optionally be removed.
";
$elem["postgresql-12/postrm_purge_data"]["descriptionde"]="PostgreSQL-Verzeichnisse entfernen, wenn das Paket endgültig gelöscht wird?
 Beim Entfernen der PostgreSQL-Server-Pakete werden existierende Datenbank-Cluster intakt gelassen, d.h. ihre Konfigurations-, Daten- und Log-Verzeichnisse werden nicht entfernt. Beim endgültigen Löschen des Pakets können die Verzeichnisse optional entfernt werden.
";
$elem["postgresql-12/postrm_purge_data"]["descriptionfr"]="Faut-il supprimer les répertoires de PostgreSQL lors de la purge du paquet ?
 La suppression du paquet du serveur PostgreSQL laissera les grappes de bases de données existantes intactes, c'est-à-dire que leurs répertoires de configuration, de données et de journal ne seront pas supprimés. Lors de la purge du paquet, les répertoires peuvent être supprimés de façon optionnelle.
";
$elem["postgresql-12/postrm_purge_data"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
