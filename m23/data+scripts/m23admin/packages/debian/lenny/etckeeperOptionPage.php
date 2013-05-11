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
 La tentative d'enregistrement des modifications de /etc vers ${VCS} a échoué.
 .
 Avant de poursuivre, vous devriez résoudre vous-même les problèmes liés aux changements non sauvegardés.
";
$elem["etckeeper/commit_failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
