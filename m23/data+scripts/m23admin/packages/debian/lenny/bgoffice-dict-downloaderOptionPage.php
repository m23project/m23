<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bgoffice-dict-downloader");

$elem["bgoffice-dict-downloader/dict-list"]["type"]="multiselect";
$elem["bgoffice-dict-downloader/dict-list"]["choices"][1]="Bulgarian-English dual dictionary";
$elem["bgoffice-dict-downloader/dict-list"]["choices"][2]="Dictionary of north-western dialect";
$elem["bgoffice-dict-downloader/dict-list"]["choices"][3]="Polytechnical dictionary";
$elem["bgoffice-dict-downloader/dict-list"]["choicesde"][1]="Bulgarisch-Englisch-/Englisch-Bulgarisch-Wörterbuch";
$elem["bgoffice-dict-downloader/dict-list"]["choicesde"][2]="Wörterbuch für den nordwestlichen Dialekt";
$elem["bgoffice-dict-downloader/dict-list"]["choicesde"][3]="Fachwörterbuch";
$elem["bgoffice-dict-downloader/dict-list"]["choicesfr"][1]="Dictionnaire Bulgare-Anglais / Anglais-Bulgare";
$elem["bgoffice-dict-downloader/dict-list"]["choicesfr"][2]="Dialecte du nord-ouest";
$elem["bgoffice-dict-downloader/dict-list"]["choicesfr"][3]="Dictionnaire Polytechnique";
$elem["bgoffice-dict-downloader/dict-list"]["description"]="Dictionaries to download:
 Several dictionaries for bgoffice cannot be distributed by Debian due to
 license uncertainities. Please select the dictionaries you want to be
 downloaded from Internet. Note that any files in /usr/share/bgoffice that are
 also in downloaded dictionaries will be overwritten.
";
$elem["bgoffice-dict-downloader/dict-list"]["descriptionde"]="Herunterzuladende Wörterbücher:
 Mehrere Wörterbücher für bgoffice können nicht von Debian verteilt werden, da deren Lizenzen unklar sind. Bitte wählen Sie die Wörterbücher aus, die Sie aus dem Internet herunterladen möchten. Bitte beachten Sie, dass die heruntergeladenen Wörterbücher ggf. vorhandene Wörterbücher gleichen Namens in »/usr/share/bgoffice« überschreiben.Wörterbücher, die sich bereits in »/usr/share/bgoffice« befinden und heruntergeladen werden sollen, überschrieben werden.
";
$elem["bgoffice-dict-downloader/dict-list"]["descriptionfr"]="Dictionnaires à télécharger :
 Plusieurs dictionnaires pour bgoffice ne peuvent être distribués directement en raison des incertitudes concernant leur licence. Veuillez choisir les dictionnaires à télécharger directement depuis Internet. Veuilez noter que tout fichier présent dans /usr/share/bgoffice et qui figurerait dans la liste des dictionnaires à télécharger sera écrasé.
";
$elem["bgoffice-dict-downloader/dict-list"]["default"]="";
PKG_OptionPageTail2($elem);
?>
