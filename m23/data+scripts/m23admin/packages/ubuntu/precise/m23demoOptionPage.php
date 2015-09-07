<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("demo");

//Texteingabe
$elem["demo/text"]["type"]="string";
$elem["demo/text"]["description"]="Text:
 Please enter a text.";
$elem["demo/text"]["descriptionde"]="Text:
 Bitte einen Text eingeben.";
$elem["demo/text"]["default"]="Standard";

//Auswahl
$elem["demo/auswahl"]["type"]="select";
$elem["demo/auswahl"]["description"]="Language:
 Please choose the language.";
$elem["demo/auswahl"]["descriptionde"]="Sprache:
 Bitte Sprache auswaehlen.";
$elem["demo/auswahl"]["choices"][1]="en (English)";
$elem["demo/auswahl"]["choices"][2]="de (German)";

//Mehfachauswahl
$elem["demo/mehrfachauswahl"]["type"]="multiselect";
$elem["demo/mehrfachauswahl"]["description"]="Languages:
 Please choose one or more language(s).";
$elem["demo/mehrfachauswahl"]["descriptionde"]="Sprachen:
 Bitte eine oder mehr Sprache(n) auswaehlen.";
$elem["demo/mehrfachauswahl"]["choices"][1]="en (English)";
$elem["demo/mehrfachauswahl"]["choices"][2]="de (German)";

//Ja/nein-Frage
$elem["demo/janein"]["type"]="boolean";
$elem["demo/janein"]["description"]="Yes or no:
 Please make your choice.";
$elem["demo/janein"]["descriptionde"]="Ja oder nein:
 Was darf es sein?";

PKG_OptionPageTail2($elem);
?>
