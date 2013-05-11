<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cmap-adobe-gb1");

$elem["cmap-adobe-gb1/level"]["type"]="multiselect";
$elem["cmap-adobe-gb1/level"]["choices"][1]="standard";
$elem["cmap-adobe-gb1/level"]["choicesde"][1]="Standard";
$elem["cmap-adobe-gb1/level"]["choicesfr"][1]="Standard";
$elem["cmap-adobe-gb1/level"]["description"]="Needed group(s) of CMaps according to their importance.
 The Adobe-GB1 character collection consists of so many CMaps that it takes
 considerable time to register them all, though rarely used ones are also included. By
 unselecting the extra group, those rarely used ones are kept from being
 registered.
";
$elem["cmap-adobe-gb1/level"]["descriptionde"]="Benötigte CMAP-Gruppe(n) entsprechend ihrer Bedeutung.
 Die Adobe-GB1-Schriftsammlung besteht aus so vielen CMaps, dass es beträchtliche Zeit in Anspruch nimmt, diese alle zu registrieren, obwohl selten benutzte auch enthalten sind. Durch Abwählen der Extra-Gruppe wird verhindert, dass diese selten benutzten registriert werden.
";
$elem["cmap-adobe-gb1/level"]["descriptionfr"]="Groupe(s) de CMaps requis, en fonction de leur importance :
 L'ensemble de caractères Adobe-GB1 est composé de tellement de tables de conversion de jeux de caractères (« CMaps ») que les enregistrer prend beaucoup de temps. Cela étant, même ceux qui ne sont que rarement utilisés sont également inclus. Si vous déselectionnez le groupe extra, ceux-ci ne seront pas enregistrés.
";
$elem["cmap-adobe-gb1/level"]["default"]="standard";
PKG_OptionPageTail2($elem);
?>
