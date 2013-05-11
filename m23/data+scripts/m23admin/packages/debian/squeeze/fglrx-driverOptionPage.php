<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fglrx-driver");

$elem["fglrx-driver/acpi_switch"]["type"]="boolean";
$elem["fglrx-driver/acpi_switch"]["description"]="Enable powersave switching on ACPI events?
 If the graphic card supports POWERplay, fglrx is able to
 clock the GPU down and up on ACPI events like opening or
 closing the lid and turning the AC adapter on or off.
 .
 This saves much battery power on notebooks.
";
$elem["fglrx-driver/acpi_switch"]["descriptionde"]="Aktiviere Wechsel der Energiesparmodi bei ACPI-Ereignissen?
 Falls die Graphikkarte POWERplay unterstützt, kann Fglrx die Taktrate der GPU bei ACPI-Ereignissen wie Öffnen und Schließen des Deckels oder Ein- und Ausstecken des Stromkabels verringern und reduzieren.
 .
 Dies erhöht die Laufzeit von Notebooks beträchtlich.
";
$elem["fglrx-driver/acpi_switch"]["descriptionfr"]="Faut-il activer la gestion de l'économie d'énergie en fonction des événements ACPI ?
 Si la carte graphique gère la fonctionnalité « POWERplay », fglrx peut ralentir ou accélérer l'horloge du processeur graphique en fonction d'événements ACPI comme l'ouverture ou la fermeture de l'écran d'un portable ou la présence ou l'absence d'une alimentation secteur.
 .
 Cette option peut aider à préserver l'autonomie des batteries d'ordinateurs portables.
";
$elem["fglrx-driver/acpi_switch"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
