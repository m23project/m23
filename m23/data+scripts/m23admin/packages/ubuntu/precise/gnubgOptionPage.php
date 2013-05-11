<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnubg");

$elem["gnubg/build-bearoffs"]["type"]="boolean";
$elem["gnubg/build-bearoffs"]["description"]="Build bearoff database?
 For maximum strength, GNU Backgammon needs a two-sided bearoff database,
 used to evaluate positions in the end-game.  This database takes up
 6.6MB of disk space and requires several minutes to generate on a
 reasonably fast computer.  GNU Backgammon is fully playable without this
 database, but will use weaker heuristics for the end of the game.
";
$elem["gnubg/build-bearoffs"]["descriptionde"]="Bearoff-Datenbank erzeugen?
 Für maximale Stärke braucht GNU Backgammon eine zweiseitige Bearoff-Datenbank, die zur Bewertung von Positionen im Endspiel verwendet wird. Diese Datenbank belegt 6.6 MB Festplattenplatz und braucht einige Minuten zur Erzeugung auf einem mäßig schnellen Rechner. GNU Backgammon ist ohne diese Datenbank vollständig spielbar, wird aber schwächere Heuristiken zum Ende des Spiels verwenden.
";
$elem["gnubg/build-bearoffs"]["descriptionfr"]="Faut-il contruire les bibliothèques de sorties de pions ?
 Pour une performance maximum, GNU Backgammon a besoin d'une bibliothèque de sorties de pions pour les deux camps, utilisée pour évaluer les positions à la fin de la partie. Cette bibliothèque occupe jusqu'à 6,6 Mo d'espace disque et demande plusieurs minutes de calculs à un ordinateur raisonnablement rapide. GNU Backgammon est tout à fait jouable sans cette bibliothèque, mais utilisera des heuristiques plus faibles pour la fin de la partie.
";
$elem["gnubg/build-bearoffs"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
