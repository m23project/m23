<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aspell-no");

$elem["aspell-no/whichvariant"]["type"]="select";
$elem["aspell-no/whichvariant"]["choices"][1]="nynorsk";
$elem["aspell-no/whichvariant"]["choicesde"][1]="nynorsk";
$elem["aspell-no/whichvariant"]["choicesfr"][1]="Nynorsk";
$elem["aspell-no/whichvariant"]["description"]="Norwegian language variant:
 Norwegian has two different written forms: bokmaal and nynorsk.
 .
 Please choose the one you wish to use.
";
$elem["aspell-no/whichvariant"]["descriptionde"]="Norwegische Sprachvariante:
 Norwegisch hat zwei verschiedenen Schriftformen: Bokmål und Nynorsk.
 .
 Bitte wählen Sie aus, welche Sie verwenden möchten.
";
$elem["aspell-no/whichvariant"]["descriptionfr"]="Variante de la langue norvégienne :
 La langue norvégienne possède deux formes écrites : « Nynorsk » et « Bokmål ».
 .
 Veuillez indiquer celle que vous souhaitez utiliser.
";
$elem["aspell-no/whichvariant"]["default"]="bokmaal";
PKG_OptionPageTail2($elem);
?>
