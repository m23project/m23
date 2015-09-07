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
$elem["tgif/papersize"]["description"]="What size of paper to use.
 What size of paper should Tgif use?
";
$elem["tgif/papersize"]["descriptionde"]="Welche Papiergröße soll verwendet werden?
 Welche Papiergröße soll Tgif verwenden?
";
$elem["tgif/papersize"]["descriptionfr"]="Quelle taille de papier utilisez-vous ?
 Quelle taille de papier Tgif doit-il utiliser ?
";
$elem["tgif/papersize"]["default"]="A4";
$elem["tgif/gridunits"]["type"]="select";
$elem["tgif/gridunits"]["choices"][1]="Metric";
$elem["tgif/gridunits"]["choicesde"][1]="Metrisch";
$elem["tgif/gridunits"]["choicesfr"][1]="Système métrique";
$elem["tgif/gridunits"]["description"]="What units to use for the grid.
 If you turn on the snap-to grid in Tgif, what units do you want it scaled
 in?
";
$elem["tgif/gridunits"]["descriptionde"]="Welche Einheiten sollen für das Gitter verwendet werden?
 Wenn Sie das magnetische (zuschnappende) Gitter in Tgif aktivieren, welche Einheiten sollen als Maßstab verwendet werden?
";
$elem["tgif/gridunits"]["descriptionfr"]="Quelles sont les unités à employer pour la grille ?
 Si vous activez la grille d'ancrage (« snap-to grid ») dans Tgif, en quelles unités souhaitez-vous qu'elle soit graduée ?
";
$elem["tgif/gridunits"]["default"]="Metric";
$elem["tgif/papersize"]["type"]="select";
$elem["tgif/papersize"]["choices"][1]="A4";
$elem["tgif/papersize"]["choicesde"][1]="A4";
$elem["tgif/papersize"]["choicesfr"][1]="A4";
$elem["tgif/papersize"]["description"]="What size of paper to use.
 What size of paper should Tgif use?
";
$elem["tgif/papersize"]["descriptionde"]="Welche Papiergröße soll verwendet werden?
 Welche Papiergröße soll Tgif verwenden?
";
$elem["tgif/papersize"]["descriptionfr"]="Quelle taille de papier utilisez-vous ?
 Quelle taille de papier Tgif doit-il utiliser ?
";
$elem["tgif/papersize"]["default"]="A4";
PKG_OptionPageTail2($elem);
?>
