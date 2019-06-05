<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mercurial-server");

$elem["mercurial-server/purge_repositories"]["type"]="boolean";
$elem["mercurial-server/purge_repositories"]["description"]="Do you want the repositories to be removed when mercurial-server is purged?
";
$elem["mercurial-server/purge_repositories"]["descriptionde"]="Sollen die Depots entfernt werden, wenn mercurial-server vollständig entfernt wird?
";
$elem["mercurial-server/purge_repositories"]["descriptionfr"]="Faut-il supprimer les dépôts de suivi de version lorsque mercurial-server est purgé ?
";
$elem["mercurial-server/purge_repositories"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
