<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("etckeeper");

$elem["etckeeper/commit_failed"]["type"]="error";
$elem["etckeeper/commit_failed"]["description"]="Commit failed
 An attempt to commit /etc changes to ${VCS} failed.
 .
 You may manually resolve the issues with the uncommitted changes
 before continuing.
";
$elem["etckeeper/commit_failed"]["descriptionde"]="Übergabe (commit) fehlgeschlagen
 Ein Versuch, die Änderungen an /etc an ${VCS} zu übergeben, schlug fehl.
 .
 Sie können das Problem mit den nicht-übergebenen Änderungen manuell beheben, bevor Sie fortfahren.
";
$elem["etckeeper/commit_failed"]["descriptionfr"]="Échec de la synchronisation
 La tentative d'enregistrement (« commit ») des modifications de /etc vers ${VCS} a échoué.
 .
 Avant de poursuivre, vous devriez résoudre vous-même les problèmes liés aux changements non sauvegardés.
";
$elem["etckeeper/commit_failed"]["default"]="";
$elem["etckeeper/purge"]["type"]="boolean";
$elem["etckeeper/purge"]["description"]="Remove etckeeper ${VCS} repository and associated files?
 Etckeeper is being purged from the system, and was used to
 store /etc in a ${VCS} repository. If you choose to remove the
 repository, this will DESTROY all history etckeeper has recorded
 for /etc.
";
$elem["etckeeper/purge"]["descriptionde"]="Das ${VCS}-Depot von Etckeeper und die zugehörigen Dateien entfernen?
 Etckeeper wurde zum Speichern von /etc in einem ${VCS}-Depot verwandt und wird jetzt vollständig vom System gelöscht. Falls Sie entscheiden, das Depot zu entfernen, wird dies den Verlauf, den Etckeeper für /etc aufgezeichnet hat, ZERSTÖREN.
";
$elem["etckeeper/purge"]["descriptionfr"]="Faut-il supprimer le référentiel ${VCS} d'etckeeper et les fichiers associés ?
 Etckeeper est purgé du système, et était utilisé pour stocker /etc dans un référentiel ${VCS}. Si vous choisissez de supprimer ce référentiel, cela va DÉTRUIRE tout l'historique qu'etckeeper a enregistré pour /etc.
";
$elem["etckeeper/purge"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
