<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cmap-adobe-japan1");

$elem["cmap-adobe-japan1/level"]["type"]="multiselect";
$elem["cmap-adobe-japan1/level"]["choices"][1]="standard";
$elem["cmap-adobe-japan1/level"]["choices"][2]="optional";
$elem["cmap-adobe-japan1/level"]["choicesde"][1]="Standard";
$elem["cmap-adobe-japan1/level"]["choicesde"][2]="Optional";
$elem["cmap-adobe-japan1/level"]["choicesfr"][1]="Standard";
$elem["cmap-adobe-japan1/level"]["choicesfr"][2]="Optionnels";
$elem["cmap-adobe-japan1/level"]["description"]="Needed group(s) of CMaps? according to their importance.
 The Adobe-Japan1 character collection consists of so many CMaps that it takes
 considerable time to register them all, though rarely used ones are also included. By
 unselecting the extra (and possibly optional) group(s), those rarely used
 ones are kept from being registered.
";
$elem["cmap-adobe-japan1/level"]["descriptionde"]="Benötigte CMap-Gruppe(n) entsprechend ihrer Wichtigkeit.
 Die Adobe-Japan1-Schriftsammlung besteht aus so vielen CMaps, dass es beträchtliche Zeit in Anspruch nimmt, diese alle zu registrieren, da selten benutzte auch enthalten sind. Durch Abwählen der Extra- (und möglicherweise Optional-) Gruppe(n) wird verhindert, dass diese selten benutzten registriert werden.
";
$elem["cmap-adobe-japan1/level"]["descriptionfr"]="Groupe(s) de CMaps requis, en fonction de leur importance :
 L'ensemble de caractères Adobe-Japan1 est composé de tellement de tables de conversion de jeux de caractères (« CMaps ») que les enregistrer prend beaucoup de temps. Cela étant, même ceux qui ne sont que rarement utilisés sont également inclus. Si vous déselectionnez le groupe extra (et éventuellement optionnel), ceux-ci ne seront pas enregistrés.
";
$elem["cmap-adobe-japan1/level"]["default"]="standard, optional, extra";
PKG_OptionPageTail2($elem);
?>
