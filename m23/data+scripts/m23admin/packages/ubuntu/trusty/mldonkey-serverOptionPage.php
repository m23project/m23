<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mldonkey-server");

$elem["mldonkey-server/launch_at_startup"]["type"]="boolean";
$elem["mldonkey-server/launch_at_startup"]["description"]="Launch MLDonkey at startup?
 If enabled, each time your machine starts, the MLDonkey server will be started.
 .
 Otherwise, you will need to launch MLDonkey yourself each time you want to
 use it.
";
$elem["mldonkey-server/launch_at_startup"]["descriptionde"]="MLDonkey beim Hochfahren starten?
 Falls Sie dies aktivieren, wird der MLDonkey-Server jedes Mal gestartet, wenn Sie Ihren Computer hochfahren.
 .
 Anderenfalls müssen Sie MLDonkey jedes Mal selbst starten, wenn Sie es nutzen möchten.
";
$elem["mldonkey-server/launch_at_startup"]["descriptionfr"]="Faut-il lancer MLDonkey au démarrage du système ?
 Si vous choisissez cette option, un serveur MLDonkey sera lancé à chaque démarrage de votre machine.
 .
 Dans le cas contraire, vous devrez lancer MLDonkey chaque fois que vous souhaiterez l'utiliser.
";
$elem["mldonkey-server/launch_at_startup"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
