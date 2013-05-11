<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ure");

$elem["ure/possibly_corrupted_rdbs"]["type"]="note";
$elem["ure/possibly_corrupted_rdbs"]["description"]="Component registries might be corrupted
 You are upgrading from a version which might have corrupted
 service/component registry files (*.rdb), especially
 /var/lib/openoffice/basis3.1/program/services.rdb and the rdb files
 in /var/spool/openoffice/uno_packages/cache for installed extensions.
 .
 If you experience problems with the component manager or segmentation faults
 involving libstore in either unopkg or OpenOffice.org, please check these
 files. Try cleanly reinstalling the packages and/or using a clean user
 profile.
";
$elem["ure/possibly_corrupted_rdbs"]["descriptionde"]="Komponenten-Registrierungen könnten defekt sein
 Sie upgraden von einer Version, die defekte Registrierungs-Dateien (*.rdb) für Services/Komponenten haben könnte - insbesondere /var/lib/openoffice/basis3.1/program/services.rdb und die rdb-Dateien unter /var/spool/openoffice/uno_packages/cache für installierte Erweiterungen.
 .
 Wenn Sie Probleme mit dem Komponenten-Manager oder Speicherzuriffsfehler in entweder unopkg oder OpenOffice.org bekommen, die mit libstore zu tun haben, überprüfen Sie diese bitte. Versuchen Sie eine saubere Neuinstallation der Pakete und/oder benutzen Sie ein sauberes Benutzer-Profil.
";
$elem["ure/possibly_corrupted_rdbs"]["descriptionfr"]="Les registres de composants sont peut-être corrompus
 Vous mettez à jour depuis une version qui peut avoir des fichiers de registre de composants ou de services (*.rdb) corrompus, particulièrement /var/lib/openoffice/basis3.1/program/services.rdb et les fichiers rdb de /var/spool/openoffice/uno_packages/cache contenant les extensions installées.
 .
 Si vous rencontrez des problèmes avec le gestionnaire de composants ou des erreurs de segmentation impliquant « libstore » dans « unopkg » ou OpenOffice.org, vérifiez ces fichiers. Essayez de réinstaller les paquets proprement et d'utiliser un profil utilisateur vierge.
";
$elem["ure/possibly_corrupted_rdbs"]["default"]="";
PKG_OptionPageTail2($elem);
?>
