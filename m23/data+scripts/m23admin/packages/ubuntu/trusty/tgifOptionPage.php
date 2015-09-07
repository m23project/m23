<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tgif");

$elem["tgif/papersize"]["type"]="select";
$elem["tgif/papersize"]["choices"][1]="A4";
$elem["tgif/papersize"]["choicesde"][1]="A4";
$elem["tgif/papersize"]["choicesfr"][1]="A4";
$elem["tgif/papersize"]["description"]="Paper size to be used:
 Please select the size of paper to be used by Tgif. This
 selection will be appended to the global Tgif initialization file.
";
$elem["tgif/papersize"]["descriptionde"]="Papiergröße, die benutzt werden soll:
 Bitte wählen Sie die Papiergröße, die von Tgif benutzt werden soll. Diese Auswahl wird an die globale Tgif-Programmstartdatei angehängt.
";
$elem["tgif/papersize"]["descriptionfr"]="Format de papier à utiliser :
 Veuillez choisir le format de papier à utiliser par Tgif. Ce choix sera ajouté au fichier d'initialisation global de Tgif.
";
$elem["tgif/papersize"]["default"]="A4";
$elem["tgif/gridunits"]["type"]="select";
$elem["tgif/gridunits"]["choices"][1]="Centimeters";
$elem["tgif/gridunits"]["choicesde"][1]="Zentimeter";
$elem["tgif/gridunits"]["choicesfr"][1]="Centimètre";
$elem["tgif/gridunits"]["description"]="Units to use for the grid:
 Please select the units to be used by Tgif when rendering the grid. This will also
 determine the scaling when the snap-to-grid option is enabled.
";
$elem["tgif/gridunits"]["descriptionde"]="Einheiten, die für das Gitter verwendet werden:
 Bitte wählen Sie die Einheiten, die von Tgif zur Darstellung des Gitters verwendet werden sollen. Dies wird ausserdem die Skalierung festlegen, wenn die Option »Snap-to-the-grid« eingeschaltet ist.
";
$elem["tgif/gridunits"]["descriptionfr"]="Unité à employer pour la grille :
 Veuillez choisir l'unité utilisée par Tgif pour afficher la grille. Cela déterminera également l'échelle en mode aligné sur la grille (« snap-to-grid »).
";
$elem["tgif/gridunits"]["default"]="Metric";
PKG_OptionPageTail2($elem);
?>
