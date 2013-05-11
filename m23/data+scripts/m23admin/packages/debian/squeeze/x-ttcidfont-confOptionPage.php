<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x-ttcidfont-conf");

$elem["x-ttcidfont-conf/tt_backend"]["type"]="hai";
$elem["x-ttcidfont-conf/tt_backend"]["description"]="Backend to use for TrueType handling on X:
 Two backends can handle TrueType fonts: FreeType and X-TT.
 .
 The standard FreeType has simple features, while X-TT
 offers a TrueType fonts decoration mechanism that can create bold and
 oblique faces from a single font.
 .
 If in doubt, you should choose FreeType.
";
$elem["x-ttcidfont-conf/tt_backend"]["descriptionde"]="Zur TrueType-Handhabung unter X zu verwendendes Backend:
 Zwei Backends können mit TrueType-Schriften umgehen: FreeType und X-TT.
 .
 Das Standard-Backend FreeType hat nur einfache Funktionen, während X-TT einen Mechanismus zur Darstellung von TrueType-Schriften anbietet, der fette und schräge Typen aus einer einzigen Schriftart erzeugen kann.
 .
 Wenn Sie nicht sicher sind, sollten Sie FreeType wählen.
";
$elem["x-ttcidfont-conf/tt_backend"]["descriptionfr"]="Interface pour la gestion des polices TrueType sous X :
 Deux interfaces peuvent gérer les polices TrueType : FreeType et X-TT.
 .
 FreeType est une interface simple et standard ; X-TT est une autre possibilité et possède un mécanisme pour décorer les polices : on peut ainsi créer des caractères gras ou penchés à  partir d'une seule police.
 .
 En cas de doute, vous devriez choisir FreeType.
";
$elem["x-ttcidfont-conf/tt_backend"]["default"]="freetype";
$elem["x-ttcidfont-conf/xtt_vl"]["type"]="boolean";
$elem["x-ttcidfont-conf/xtt_vl"]["description"]="Prefer speed over quality while rendering?
 There are two ways for X-TT to calculate the font metrics:
 .
  - user header info:      fast and lightweight but fallible;
  - calculate every glyph: slow and heavyweight but reliable.
 .
 With a fast CPU and enough memory, you should decline this option and
 X-TT will calculate every glyph.
";
$elem["x-ttcidfont-conf/xtt_vl"]["descriptionde"]="Bei der Darstellung Geschwindigkeit gegenüber Qualität bevorzugen?
 X-TT kennt zwei Arten, die Schrift-Metriken zu berechnen:
 .
  - Header-Informationen verwenden: schnell und sparsam, aber Fehl-
    berechnungen möglich;
  - jedes Zeichen berechnen:        langsam und ressourcen-hungrig,
    aber verlässlich.
 .
 Bei einer schnellen CPU und genügend Speicher sollten Sie diese Option ablehnen; X-TT wird dann jedes Zeichen einzeln berechnen.
";
$elem["x-ttcidfont-conf/xtt_vl"]["descriptionfr"]="Préférez-vous la vitesse de la transformation à sa qualité ?
 X-TT peut calculer la métrique d'une police de deux manières :
 .
  - informations d'en-têtes : rapide et léger, mais faillible ;
   - calculer chaque glyphe : lent et lourd, mais fiable.
 .
 Avec un processeur rapide et suffisamment de mémoire, vous ne devriez pas choisir cette option. X-TT calculera ainsi tous les glyphes.
";
$elem["x-ttcidfont-conf/xtt_vl"]["default"]="";
PKG_OptionPageTail2($elem);
?>
