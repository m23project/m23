<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("virtualbox-ose");

$elem["virtualbox-ose/upstream_version_change"]["type"]="boolean";
$elem["virtualbox-ose/upstream_version_change"]["description"]="Proceed with virtualbox-ose upgrade despite losing snapshots?
 You are currently upgrading virtualbox-ose to a new upstream version. All
 snapshots will be discarded by this upgrade, because snapshots are
 version-specific.
";
$elem["virtualbox-ose/upstream_version_change"]["descriptionde"]="Mit der Aktualisierung fortfahren obwohl alle Snapshots verloren gehen?
 Sie aktualisieren virtualbox-ose gerade auf eine neue Entwicklerversion. Alle Snapshots werden durch diese Aktualisierung unbrauchbar, da Snapshots versionsabhängig sind.
";
$elem["virtualbox-ose/upstream_version_change"]["descriptionfr"]="Faut-il mettre virtualbox-ose à jour malgré une perte possible des sessions enregistrées (« snapshots ») ?
 Vous êtes en train de mettre virtualbox-ose à jour. Toutes les sessions enregistrées (« snapshots ») deviendront inutilisables après cette mise à jour, car celles-ci sont spécifiques à chaque version.
";
$elem["virtualbox-ose/upstream_version_change"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
