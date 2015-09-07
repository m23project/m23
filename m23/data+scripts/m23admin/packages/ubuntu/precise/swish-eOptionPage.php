<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("swish-e");

$elem["swish-e/configuration-note"]["type"]="note";
$elem["swish-e/configuration-note"]["description"]="New incompatible index format
 Swish-e 2.4.5 uses a new format for its indexes which is incompatible with
 previous releases (2.4.3, 2.2, 2.0, ...)
 .
 You will have to re-index your files.
";
$elem["swish-e/configuration-note"]["descriptionde"]="Neues, inkompatibles Index-Format
 Swish-e 2.4.5 verwendet ein neues Format für seine Indexe, die inkompatibel zu älteren Veröffentlichungen (2.4.3, 2.2, 2.0, ...) ist
 .
 Sie müssen Ihre Dateien reindexieren
";
$elem["swish-e/configuration-note"]["descriptionfr"]="Nouveau format d'index incompatible
 Swish-e 2.4.5 utilise un nouveau format pour ses index. Ce format est incompatible avec les versions précédentes (2.4.3, 2.2, 2.0, ...).
 .
 Vous devez réindexer vos fichiers.
";
$elem["swish-e/configuration-note"]["default"]="";
PKG_OptionPageTail2($elem);
?>
