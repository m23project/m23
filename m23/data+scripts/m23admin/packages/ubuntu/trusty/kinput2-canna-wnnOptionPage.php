<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kinput2-canna-wnn");

$elem["shared/kinput2/wnn/keybindings"]["type"]="select";
$elem["shared/kinput2/wnn/keybindings"]["choices"][1]="Kinput2";
$elem["shared/kinput2/wnn/keybindings"]["description"]="Default system keybindings of Kinput2 for Wnn
 Debian prepackaged version of Kinput2 provides a functionality to select
 default keybindings of Kinput2 for Wnn from \"Kinput2\" and \"Egg\". Although
 the former is the original keybindings of Kinput2, Egg on Emacs users may
 prefer the latter.
";
$elem["shared/kinput2/wnn/keybindings"]["descriptionde"]="Voreingestellte Tastenbindung von Kinput2 für Wnn
 Debians Version von Kinput2 bietet die Auswahl der voreingestellten Tastenbindung von Kinput2 für Wnn an. Es kann zwischen »Kinput2« und »Egg« gewählt werden. Obwohl die erstere die originale Tastenbindung von Kinput2 ist, könnten Benutzer von Egg auf Emacs die letztere vorziehen.
";
$elem["shared/kinput2/wnn/keybindings"]["descriptionfr"]="Affectation par défaut des touches de Kinput2 pour Wnn
 La version Debian de Kinput2 ajoute une fonction permettant de choisir le système d'affectation des touches (« keybindings ») par défaut pour Kinput2 entre « Kinput2 » et « Egg ». Bien que le premier choix corresponde aux affectations originelles de Kinput2, les utilisateurs d'Egg sur Emacs préféreront peut-être l'autre choix.
";
$elem["shared/kinput2/wnn/keybindings"]["default"]="Egg";
PKG_OptionPageTail2($elem);
?>
