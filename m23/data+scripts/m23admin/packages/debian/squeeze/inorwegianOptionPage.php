<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("inorwegian");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["inorwegian/languages"]["type"]="text";
$elem["inorwegian/languages"]["description"]="Description:


";
$elem["inorwegian/languages"]["descriptionde"]="";
$elem["inorwegian/languages"]["descriptionfr"]="";
$elem["inorwegian/languages"]["default"]="nynorsk (New Norwegian), bokmål (Bokmal Norwegian)";
$elem["inorwegian/whichvariant"]["type"]="select";
$elem["inorwegian/whichvariant"]["choices"][1]="nynorsk";
$elem["inorwegian/whichvariant"]["choicesde"][1]="nynorsk";
$elem["inorwegian/whichvariant"]["choicesfr"][1]="Nynorsk";
$elem["inorwegian/whichvariant"]["description"]="Norwegian language variant:
 Norwegian has two different written forms: bokmaal and nynorsk.
 .
 Please choose the one you wish to use.
";
$elem["inorwegian/whichvariant"]["descriptionde"]="Norwegische Sprachvariante:
 Norwegisch hat zwei verschiedenen Schriftformen: Bokmål und Nynorsk.
 .
 Bitte wählen Sie aus, welche Sie verwenden möchten.
";
$elem["inorwegian/whichvariant"]["descriptionfr"]="Variante de la langue norvégienne :
 La langue norvégienne possède deux formes écrites : « Nynorsk » et « Bokmål ».
 .
 Veuillez indiquer celle que vous souhaitez utiliser.
";
$elem["inorwegian/whichvariant"]["default"]="bokmaal";
PKG_OptionPageTail2($elem);
?>
