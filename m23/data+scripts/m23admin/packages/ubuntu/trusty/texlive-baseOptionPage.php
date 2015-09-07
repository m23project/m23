<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("texlive-base");

$elem["texlive-base/texconfig_ignorant"]["type"]="error";
$elem["texlive-base/texconfig_ignorant"]["description"]="Unmanageable system paper size (${libpaperPaper})
 The currently defined system-wide paper size is ${libpaperPaper}. However, the
 TeX configuration system cannot handle this paper size for ${binary}.
 .
 The setting will remain unchanged.
 .
 The following command can show the list of known paper sizes for
 ${binary}:
 .
 texconfig ${binary_commandline} paper
";
$elem["texlive-base/texconfig_ignorant"]["descriptionde"]="Nicht verwaltbare Systempapiergröße (${libpaperPaper})
 Die derzeit definierte systemweite Papiergröße ist ${libpaperPaper}. Das TeX-Konfigurationssystem kann jedoch nicht mit dieser Papiergröße für ${binary} umgehen.
 .
 Die Einstellung wird unverändert bleiben.
 .
 Der folgende Befehl kann eine Liste der bekannten Papiergrößen für ${binary} anzeigen:
 .
 texconfig ${binary_commandline} paper
";
$elem["texlive-base/texconfig_ignorant"]["descriptionfr"]="Format de papier du système non géré (${libpaperPaper})
 Le format de papier actuel du système est ${libpaperPaper}. Cependant, la configuration TeX du système ne peut pas gérer ce format de papier pour ${binary}.
 .
 Le paramètre restera inchangé.
 .
 La commande suivante affiche la liste des formats de papier gérés par ${binary} :
 .
 texconfig ${binary_commandline} paper
";
$elem["texlive-base/texconfig_ignorant"]["default"]="";
$elem["texlive-base/binary_chooser"]["type"]="multiselect";
$elem["texlive-base/binary_chooser"]["choices"][1]="pdftex";
$elem["texlive-base/binary_chooser"]["choices"][2]="dvips";
$elem["texlive-base/binary_chooser"]["choices"][3]="dvipdfmx";
$elem["texlive-base/binary_chooser"]["description"]="TeX binaries that should use the system paper size:
 This system's TeX binaries currently use different default paper
 sizes. Please choose which of them should get the system paper size
 (${libpaperPaper}) as their default.
";
$elem["texlive-base/binary_chooser"]["descriptionde"]="TeX-Programme, die die Systempapiergröße nutzen sollen:
 Die TeX-Programme dieses Systems benutzen derzeit unterschiedliche Standardpapiergrößen. Bitte wählen Sie, welche davon die Systempapiergröße (${libpaperPaper}) als Vorgabe annehmen soll.
";
$elem["texlive-base/binary_chooser"]["descriptionfr"]="Binaires Tex devant utiliser le format de papier du système :
 Les binaires TeX de ce système utilisent actuellement différents formats de papier par défaut. Veuillez choisir ceux d'entre eux qui utiliseront par défaut le format de papier du système (${libpaperPaper}).
";
$elem["texlive-base/binary_chooser"]["default"]="pdftex, dvips, dvipdfmx, xdvi";
PKG_OptionPageTail2($elem);
?>
