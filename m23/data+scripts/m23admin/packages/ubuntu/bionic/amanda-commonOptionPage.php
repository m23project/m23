<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("amanda-common");

$elem["amanda-common/merge_amandates"]["type"]="error";
$elem["amanda-common/merge_amandates"]["description"]="Please merge /var/lib/amandates and /var/lib/amanda/amandates
 You have both /var/lib/amandates and /var/lib/amanda/amandates. Please
 review the files, and merge the contents you care about to the
 /var/lib/amanda/amandates location, and remove the old file
 /var/lib/amandates.
";
$elem["amanda-common/merge_amandates"]["descriptionde"]="Bitte vereinigen Sie /var/lib/amandates und /var/lib/amanda/amandates.
 Es existieren die beiden Verzeichnisse /var/lib/amandates und /var/lib/amanda/amandates. Bitte überprüfen Sie die Dateien und verschieben Sie den Inhalt, der Ihnen wichtig ist, nach /var/lib/amanda/amandates und löschen Sie die alte Datei /var/lib/amandates.
";
$elem["amanda-common/merge_amandates"]["descriptionfr"]="Fusion indispensable de /var/lib/amandates et /var/lib/amanda/amandates
 Les deux fichiers /var/lib/amandates et /var/lib/amanda/amandates existent. Veuillez les examiner et fusionner les données importantes dans le fichier /var/lib/amanda/amandates ; supprimez ensuite l'ancien fichier /var/lib/amandates.
";
$elem["amanda-common/merge_amandates"]["default"]="";
PKG_OptionPageTail2($elem);
?>
