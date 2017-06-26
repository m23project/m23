<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icinga2-ido-pgsql");

$elem["icinga2-ido-pgsql/enable"]["type"]="boolean";
$elem["icinga2-ido-pgsql/enable"]["description"]="Enable Icinga 2's ido-pgsql feature?
 Please specify whether Icinga 2 should use PostgreSQL.
 .
 You may later disable the feature by using the
 \"icinga2 feature disable ido-pgsql\" command.
";
$elem["icinga2-ido-pgsql/enable"]["descriptionde"]="Soll die Ido-PgSQL-Funktionalität von Icinga 2 aktiviert werden?
 Bitte geben Sie an, ob Icinga 2 PostgreSQL verwenden soll.
 .
 Sie können diese Funktionalität später mit dem Befehl »icinga2-disable-feature ido-pgsql« deaktivieren.
";
$elem["icinga2-ido-pgsql/enable"]["descriptionfr"]="Faut-il activer la fonctionnalité ido-pgsql pour Icinga 2 ?
 Veuillez indiquer si Icinga 2 doit utiliser PostgreSQL.
 .
 Vous pouvez à tout moment désactiver cette fonctionnalité en utilisant la commande « icinga2 feature disable ido-pgsql ».
";
$elem["icinga2-ido-pgsql/enable"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
