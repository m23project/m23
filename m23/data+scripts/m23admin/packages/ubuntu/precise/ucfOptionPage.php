<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ucf");

$elem["ucf/title"]["type"]="title";
$elem["ucf/title"]["description"]="Modified configuration file
";
$elem["ucf/title"]["descriptionde"]="Geänderte Konfigurationsdatei
";
$elem["ucf/title"]["descriptionfr"]="Fichier de configuration modifié
";
$elem["ucf/title"]["default"]="";
$elem["ucf/changeprompt_threeway"]["type"]="select";
$elem["ucf/changeprompt_threeway"]["choices"][1]="install the package maintainer's version";
$elem["ucf/changeprompt_threeway"]["choices"][2]="keep the local version currently installed";
$elem["ucf/changeprompt_threeway"]["choices"][3]="show the differences between the versions";
$elem["ucf/changeprompt_threeway"]["choices"][4]="show a side-by-side difference between the versions";
$elem["ucf/changeprompt_threeway"]["choices"][5]="show a 3-way difference between available versions";
$elem["ucf/changeprompt_threeway"]["choices"][6]="do a 3-way merge between available versions (experimental)";
$elem["ucf/changeprompt_threeway"]["choicesde"][1]="Version des Paket-Betreuers installieren";
$elem["ucf/changeprompt_threeway"]["choicesde"][2]="aktuell installierte Version behalten";
$elem["ucf/changeprompt_threeway"]["choicesde"][3]="Unterschiede zwischen den Versionen anzeigen";
$elem["ucf/changeprompt_threeway"]["choicesde"][4]="Unterschiede zwischen den Versionen nebeneinander anzeigen";
$elem["ucf/changeprompt_threeway"]["choicesde"][5]="3-Wege-Differenz verfügbarer Versionen der Datei anzeigen";
$elem["ucf/changeprompt_threeway"]["choicesde"][6]="3-Wege-Vereinigung verfügbarer Versionen [experimentell]";
$elem["ucf/changeprompt_threeway"]["choicesfr"][1]="Installer la version du responsable du paquet";
$elem["ucf/changeprompt_threeway"]["choicesfr"][2]="Garder la version actuellement installée";
$elem["ucf/changeprompt_threeway"]["choicesfr"][3]="Montrer les différences entre les versions";
$elem["ucf/changeprompt_threeway"]["choicesfr"][4]="Montrer côte à côte les différences entre les versions";
$elem["ucf/changeprompt_threeway"]["choicesfr"][5]="Montrer les différences entre les trois versions du fichier";
$elem["ucf/changeprompt_threeway"]["choicesfr"][6]="Fusionner les trois versions (« 3-way merge » : expérimental)";
$elem["ucf/changeprompt_threeway"]["description"]="What do you want to do about modified configuration file ${BASENAME}?
 A new version of configuration file ${FILE} is available, but the version installed
 currently has been locally modified.
";
$elem["ucf/changeprompt_threeway"]["descriptionde"]="Wie wollen Sie mit der geänderten Konfigurationsdatei ${BASENAME} verfahren?
 Eine neue Version der Konfigurationsdatei ${FILE} ist verfügbar, aber die installierte Version wurde verändert.
";
$elem["ucf/changeprompt_threeway"]["descriptionfr"]="Action souhaitée pour le fichier de configuration modifié ${BASENAME} :
 Une nouvelle version du fichier de configuration ${FILE} est disponible mais la version actuellement utilisée a été modifiée localement.
";
$elem["ucf/changeprompt_threeway"]["default"]="keep_current";
$elem["ucf/changeprompt"]["type"]="select";
$elem["ucf/changeprompt"]["choices"][1]="install the package maintainer's version";
$elem["ucf/changeprompt"]["choices"][2]="keep the local version currently installed";
$elem["ucf/changeprompt"]["choices"][3]="show the differences between the versions";
$elem["ucf/changeprompt"]["choices"][4]="show a side-by-side difference between the versions";
$elem["ucf/changeprompt"]["choicesde"][1]="Version des Paket-Betreuers installieren";
$elem["ucf/changeprompt"]["choicesde"][2]="aktuell installierte Version behalten";
$elem["ucf/changeprompt"]["choicesde"][3]="Unterschiede zwischen den Versionen anzeigen";
$elem["ucf/changeprompt"]["choicesde"][4]="Unterschiede zwischen den Versionen nebeneinander anzeigen";
$elem["ucf/changeprompt"]["choicesfr"][1]="Installer la version du responsable du paquet";
$elem["ucf/changeprompt"]["choicesfr"][2]="Garder la version actuellement installée";
$elem["ucf/changeprompt"]["choicesfr"][3]="Montrer les différences entre les versions";
$elem["ucf/changeprompt"]["choicesfr"][4]="Montrer côte à côte les différences entre les versions";
$elem["ucf/changeprompt"]["description"]="What do you want to do about modified configuration file ${BASENAME}?
 A new version of configuration file ${FILE} is available, but the version installed
 currently has been locally modified.
";
$elem["ucf/changeprompt"]["descriptionde"]="Wie wollen Sie mit der geänderten Konfigurationsdatei ${BASENAME} verfahren?
 Eine neue Version der Konfigurationsdatei ${FILE} ist verfügbar, aber die installierte Version wurde verändert.
";
$elem["ucf/changeprompt"]["descriptionfr"]="Action souhaitée pour le fichier de configuration modifié ${BASENAME} :
 Une nouvelle version du fichier de configuration ${FILE} est disponible mais la version actuellement utilisée a été modifiée localement.
";
$elem["ucf/changeprompt"]["default"]="keep_current";
$elem["ucf/show_diff"]["type"]="note";
$elem["ucf/show_diff"]["description"]="Line by line differences between versions
 ${DIFF}
";
$elem["ucf/show_diff"]["descriptionde"]="Unterschiede zwischen den Versionen zeilenweise anzeigen
 ${DIFF}
";
$elem["ucf/show_diff"]["descriptionfr"]="Montrer, ligne par ligne, les différences entre les versions
 ${DIFF}
";
$elem["ucf/show_diff"]["default"]="";
$elem["ucf/conflicts_found"]["type"]="error";
$elem["ucf/conflicts_found"]["description"]="Conflicts found in three-way merge
 Conflicts found during three-way merge! Please edit `${dest_file}' and sort
 them out manually.
 .
 The file `${dest_file}.${ERR_SUFFIX}' has a record of the failed merge of
 the configuration file.
";
$elem["ucf/conflicts_found"]["descriptionde"]="Bei der 3-Wege-Vereinigung wurden Konflikte festgestellt
 Es wurden Konflikte bei der 3-Wege-Vereinigung festgestellt! Bitte beheben Sie diese selbst in der Datei »${dest_file}«.
 .
 Die fehlgeschlagene Vereinigung der Konfigurationsdatei wurde in der Datei »${dest_file}.${ERR_SUFFIX}« abgespeichert.
";
$elem["ucf/conflicts_found"]["descriptionfr"]="Conflits pendant la fusion des 3 versions
 Des conflits ont été trouvés pendant la fusion des trois versions (« 3-way merge »). Veuillez ouvrir « ${dest_file} » et les corriger vous-même.
 .
 Le fichier « ${dest_file}.${ERR_SUFFIX} » contient une trace de la fusion qui a échoué.
";
$elem["ucf/conflicts_found"]["default"]="";
PKG_OptionPageTail2($elem);
?>
