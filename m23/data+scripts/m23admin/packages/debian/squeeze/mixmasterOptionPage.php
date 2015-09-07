<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mixmaster");

$elem["mixmaster/stats-update"]["type"]="boolean";
$elem["mixmaster/stats-update"]["description"]="Do you wish to update the reliability statistics now?
 If you choose this option, up to date reliability statistics and keyrings
 will be downloaded from the Internet once Mixmaster has been set up.  Once
 this has happened this option will be disabled to prevent further updates
 when the package will be updated.
";
$elem["mixmaster/stats-update"]["descriptionde"]="Möchten Sie die Zuverlässigkeits-Statistiken jetzt aktualisieren?
 Falls Sie diese Option wählen, werden aktuelle Zuverlässigkeits-Statistiken und Schlüsselringe aus dem Internet heruntergeladen, sobald Mixmaster eingerichtet wurde. Sobald dies passiert ist wird diese Option deaktiviert, um zukünftige Aktualisierungen bei Paket-Aktualisierungen zu verhindern.
";
$elem["mixmaster/stats-update"]["descriptionfr"]="Faut-il mettre à jour les statistiques de fiabilité maintenant ?
 Si vous choisissez cette option, les versions à jour des statistiques de fiabilité et les porte-clés (« keyrings ») seront téléchargés sur l'Internet une fois que Mixmaster aura été configuré. Après cette opération, cette option sera désactivée afin d'éviter de futures mises à jour lors des mises à jour du paquet.
";
$elem["mixmaster/stats-update"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
