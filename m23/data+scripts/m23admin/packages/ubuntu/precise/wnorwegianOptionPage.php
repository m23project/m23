<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wnorwegian");

$elem["shared/packages-wordlist"]["type"]="text";
$elem["shared/packages-wordlist"]["description"]="Description:

";
$elem["shared/packages-wordlist"]["descriptionde"]="";
$elem["shared/packages-wordlist"]["descriptionfr"]="";
$elem["shared/packages-wordlist"]["default"]="";
$elem["wnorwegian/languages"]["type"]="text";
$elem["wnorwegian/languages"]["description"]="Description:


";
$elem["wnorwegian/languages"]["descriptionde"]="";
$elem["wnorwegian/languages"]["descriptionfr"]="";
$elem["wnorwegian/languages"]["default"]="nynorsk (Standard Norwegian), bokmål (Bokmal Norwegian)";
$elem["wnorwegian/whichvariant"]["type"]="select";
$elem["wnorwegian/whichvariant"]["choices"][1]="nynorsk";
$elem["wnorwegian/whichvariant"]["choicesde"][1]="nynorsk";
$elem["wnorwegian/whichvariant"]["choicesfr"][1]="Nynorsk";
$elem["wnorwegian/whichvariant"]["description"]="Norwegian language variant:
 Norwegian has two different written forms: bokmaal and nynorsk.
 .
 Please choose the one you wish to use.
";
$elem["wnorwegian/whichvariant"]["descriptionde"]="Norwegische Sprachvariante:
 Norwegisch hat zwei verschiedenen Schriftformen: Bokmål und Nynorsk.
 .
 Bitte wählen Sie aus, welche Sie verwenden möchten.
";
$elem["wnorwegian/whichvariant"]["descriptionfr"]="Variante de la langue norvégienne :
 La langue norvégienne possède deux formes écrites : « Nynorsk » et « Bokmål ».
 .
 Veuillez indiquer celle que vous souhaitez utiliser.
";
$elem["wnorwegian/whichvariant"]["default"]="bokmaal";
PKG_OptionPageTail2($elem);
?>
