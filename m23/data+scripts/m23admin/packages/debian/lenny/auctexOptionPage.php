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
$elem["auctex/doauto"]["choicesfr"][2]="Avant-plan";
$elem["auctex/doauto"]["description"]="(La)TeX macros parsing mode:
 To improve the performance of AUCTeX, every currently installed TeX
 macro package and LaTeX style file will be parsed.
 .
 This may take a lot of time, so it should probably be done in the
 background. You may also choose to have it done in the foreground,
 or to skip that step. If you choose 'Background', you will
 find a detailed log of the process in ${LOGFILE}.
 .
 A weekly cron job will also take care of updating the cached data,
 so that no specific action is required whenever you install new
 (La)TeX packages or remove old ones.
 .
 This update can be run manually at any moment by running
 'update-auctex-elisp'.
";
$elem["auctex/doauto"]["descriptionde"]="(La)TeX-Makros Parsing-Modus:
 Zur Beschleunigung von AUCTeX wird jedes derzeit installierte TeX-Makro-Paket und jede LaTeX-Style-Datei ausgewertet werden.
 .
 Das kann eine Weile dauern, daher wird die Bearbeitung im Hintergrund empfohlen. Die Bearbeitung kann allerdings auch im Vordergrund erfolgen und die Auswertung kann auch ganz unterbleiben. Falls Sie »Hintergrund« wählen, finden Sie eine detaillierte Protokollausgabe in ${LOGFILE}.
 .
 Weiterhin wird ein wöchentlicher cron-Job auf die Aktualisierung der zwischengespeicherten Daten achten, so dass bei der Installation von neuen (La)TeX-Paketen oder der Entfernung alter keine weiteren Aktionen notwendig sind.
 .
 Die Aktualisierung kann jederzeit von Hand durch Aufruf von »update-auctex-elisp« erfolgen.
";
$elem["auctex/doauto"]["descriptionfr"]="Mode d'analyse des macros (La)TeX :
 Afin d'améliorer les performances d'AUCTeX, tout paquet installé de macros TeX ainsi que tout fichier de style de LaTeX sera analysé.
 .
 Ceci risque de prendre beaucoup de temps, ainsi il est préférable de le faire en arrière-plan. Toutefois, vous pouvez aussi choisir de le faire en avant-plan ou encore sauter complètement cette étape. Si vous choisissez de le faire en arrière-plan, vous trouverez un rapport détaillé dans le fichier ${LOGFILE}.
 .
 Une tâche cron hebdomadaire s'occupera de mettre à jour les données en mémoire, ainsi vous n'aurez pas besoin de vous en soucier au moment de l'installation de nouveaux paquets (La)TeX ou lorsque vous en supprimerez de vieux.
 .
 Vous pouvez à tout moment les mettre à jour vous-même en exécutant la commande « update-auctex-elisp ».
";
$elem["auctex/doauto"]["default"]="Background";
$elem["auctex/doautofg"]["type"]="select";
$elem["auctex/doautofg"]["choices"][1]="Console";
$elem["auctex/doautofg"]["choicesde"][1]="Konsole";
$elem["auctex/doautofg"]["choicesfr"][1]="Console";
$elem["auctex/doautofg"]["description"]="Parsing output destination:
 You chose to parse TeX macro packages and LaTeX style files in foreground.
 This operation generates a lot of information. Please choose where
 this information should be sent:
 .
  File:    output goes to ${LOGFILE};
  Console: output goes to the current console.
";
$elem["auctex/doautofg"]["descriptionde"]="Ziel der Parsing-Ausgabe:
 Sie wählten die Bearbeitung der Tex-Makros und LaTeX-Styles im Vordergrund. Hierbei wird dabei eine Menge Ausgabe erzeugt. Bitte wählen Sie aus, wohin diese Informationen gesendet werden sollen:
 .
  Datei:   Ausgabe geht in ${LOGFILE};
  Konsole: Ausgabe geht auf die aktuelle Konsole.
";
$elem["auctex/doautofg"]["descriptionfr"]="Analyse de la destination de sortie :
 Vous avez décidé d'analyser les paquets de macros de TeX ainsi que les fichiers style de LaTeX en avant-plan. Ce processus génère beaucoup de texte en sortie. Veuillez choisir où cette information doit être envoyée :
 .
 Fichier : sortie dirigée vers ${LOGFILE} ;
 Console : sortie dirigée vers la console courante.
";
$elem["auctex/doautofg"]["default"]="File";
PKG_OptionPageTail2($elem);
?>
