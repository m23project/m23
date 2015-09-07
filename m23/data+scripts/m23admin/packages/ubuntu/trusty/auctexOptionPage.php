<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("auctex");

$elem["auctex/doauto"]["type"]="select";
$elem["auctex/doauto"]["choices"][1]="Background";
$elem["auctex/doauto"]["choices"][2]="Foreground";
$elem["auctex/doauto"]["choicesde"][1]="Hintergrund";
$elem["auctex/doauto"]["choicesde"][2]="Vordergrund";
$elem["auctex/doauto"]["choicesfr"][1]="Arrière-plan";
$elem["auctex/doauto"]["choicesfr"][2]="Premier plan";
$elem["auctex/doauto"]["description"]="(La)TeX macros parsing mode:
 To improve the performance of AUCTeX, every currently installed TeX macro
 package and LaTeX style file will be parsed.
 .
 This may take a lot of time, so it should probably be done in the
 background.  You may also choose to have it done in the foreground, or to
 skip that step.
 .
 The cached data gets automatically updated via dpkg triggers, so that
 no specific action is required whenever you install new (La)TeX packages or
 remove old ones.
 .
 This update can be run manually at any moment by running
 'update-auctex-elisp'.
";
$elem["auctex/doauto"]["descriptionde"]="Auswertungsmodus für (La)Tex-Makros
 Zur Beschleunigung von AUCTeX wird jedes derzeit installierte TeX-Makro-Paket und jede LaTeX-Style-Datei ausgewertet werden.
 .
 Das kann eine Weile dauern, daher wird die Bearbeitung im Hintergrund empfohlen. Sie kann allerdings auch im Vordergrund erfolgen oder übersprungen werden.
 .
 Die zwischengespeicherten Daten werden automatisch mittels Triggern von Dpkg aktualisiert, so dass bei der Installation von neuen (La)TeX-Paketen oder der Entfernung alter keine weiteren Aktionen notwendig sind.
 .
 Die Aktualisierung kann jederzeit von Hand durch Aufruf von »update-auctex-elisp« erfolgen.
";
$elem["auctex/doauto"]["descriptionfr"]="Mode d'analyse des macros (La)TeX :
 Afin d'améliorer les performances d'AUCTeX, tous les paquets de macros TeX installés ainsi que tous les fichiers de style de LaTeX seront analysés.
 .
 Cela risque de prendre beaucoup de temps, il est donc préférable de le faire en arrière-plan. Toutefois, vous pouvez aussi choisir de le faire au premier plan ou encore sauter complètement cette étape.
 .
 Les données en cache sont automatiquement mises à jour à l'aide des actions différées (« triggers ») de dpkg. Ainsi aucune action spécifique n'est nécessaire quand vous installez de nouveaux paquets (La)TeX ou lorsque vous en supprimerez des anciens.
 .
 Vous pouvez à tout moment les mettre à jour vous-même en exécutant la commande « update-auctex-elisp ».
";
$elem["auctex/doauto"]["default"]="Background";
PKG_OptionPageTail2($elem);
?>
