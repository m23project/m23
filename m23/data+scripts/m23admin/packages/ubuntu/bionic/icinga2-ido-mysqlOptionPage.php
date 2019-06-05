<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icinga2-ido-mysql");

$elem["icinga2-ido-mysql/enable"]["type"]="boolean";
$elem["icinga2-ido-mysql/enable"]["description"]="Enable Icinga 2's ido-mysql feature?
 Please specify whether Icinga 2 should use MySQL.
 .
 You may later disable the feature by using the
 \"icinga2 feature disable ido-mysql\" command.
";
$elem["icinga2-ido-mysql/enable"]["descriptionde"]="Soll die Ido-MySQL-Funktionalität von Icinga 2 aktiviert werden?
 Bitte geben Sie an, ob Icinga 2 MySQL verwenden soll.
 .
 Sie können diese Funktionalität später mit dem Befehl »icinga2-disable-feature ido-mysql« deaktivieren.
";
$elem["icinga2-ido-mysql/enable"]["descriptionfr"]="Faut-il activer la fonctionnalité ido-mysql pour Icinga 2 ?
 Veuillez indiquer si Icinga 2 doit utiliser MySQL.
 .
 Vous pouvez à tout moment désactiver cette fonctionnalité en utilisant la commande « icinga2 feature disable ido-mysql ».
";
$elem["icinga2-ido-mysql/enable"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
