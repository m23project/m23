<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("initz");

$elem["initz/systemwide"]["type"]="boolean";
$elem["initz/systemwide"]["description"]="Do you want to install a system-wide initz service?
 If you accept here all users in your system can use Initz automatically.
";
$elem["initz/systemwide"]["descriptionde"]="Möchten Sie einen systemweiten Initz-Dienst installieren?
 Falls Sie hier akzeptieren, können alle Benutzer in Ihrem System Initz automatisch verwenden.
";
$elem["initz/systemwide"]["descriptionfr"]="Voulez-vous installer le service initz pour tous les utilisateurs ?
 Si vous choisissez cette option, tous les utilisateurs de votre système pourront utiliser automatiquement initz.
";
$elem["initz/systemwide"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
