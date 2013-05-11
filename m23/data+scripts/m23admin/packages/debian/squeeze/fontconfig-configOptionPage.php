<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fontconfig-config");

$elem["fontconfig/hinting_type"]["type"]="select";
$elem["fontconfig/hinting_type"]["choices"][1]="Native";
$elem["fontconfig/hinting_type"]["choices"][2]="Autohinter";
$elem["fontconfig/hinting_type"]["choicesde"][1]="Nativ";
$elem["fontconfig/hinting_type"]["choicesde"][2]="Autohinter";
$elem["fontconfig/hinting_type"]["choicesfr"][1]="Natif";
$elem["fontconfig/hinting_type"]["choicesfr"][2]="Automatique";
$elem["fontconfig/hinting_type"]["description"]="Font tuning method for screen:
 Please select the preferred method for tuning fonts for screen rendering.
 .
 Select 'Native' if you mostly use DejaVu (the default in Debian) or
 any of the Microsoft fonts. Select 'Autohinter' if you mostly use other
 TrueType fonts. Select 'None' if you want blurry text.
";
$elem["fontconfig/hinting_type"]["descriptionde"]="Schriftverbesserung für den Bildschirm:
 Bitte wählen Sie die bevorzugte Art der Schriftverbesserung bei der Bildschirmdarstellung aus.
 .
 Wählen Sie »Nativ« aus, wenn Sie überwiegend DejaVu (Standard in Debian) oder Microsoft-Schriftarten verwenden. Wählen Sie »Autohinter« aus, wenn sie überwiegend True-Type-Schriftarten verwenden. Wählen Sie »Keine« aus, wenn Sie verschwommenen Text wollen.
";
$elem["fontconfig/hinting_type"]["descriptionfr"]="Style de police utilisé pour l'affichage :
 Veuillez choisir la méthode que vous souhaitez utiliser pour l'amélioration de l'affichage des polices à l'écran.
 .
 Veuillez choisir « Natif » si vous utilisez couramment DejaVu (par défaut dans Debian) ou une police de Microsoft. Choisissez plutôt « Automatique » si vous utilisez couramment d'autres polices « TrueType ». Choisissez « Aucun » si vous voulez du texte brut.
";
$elem["fontconfig/hinting_type"]["default"]="Native";
$elem["fontconfig/subpixel_rendering"]["type"]="select";
$elem["fontconfig/subpixel_rendering"]["choices"][1]="Automatic";
$elem["fontconfig/subpixel_rendering"]["choices"][2]="Always";
$elem["fontconfig/subpixel_rendering"]["choicesde"][1]="automatisch";
$elem["fontconfig/subpixel_rendering"]["choicesde"][2]="immer";
$elem["fontconfig/subpixel_rendering"]["choicesfr"][1]="Automatiquement";
$elem["fontconfig/subpixel_rendering"]["choicesfr"][2]="Toujours";
$elem["fontconfig/subpixel_rendering"]["description"]="Enable subpixel rendering for screen:
 Rendering text at a subpixel level generally makes it look a bit better
 on flat (LCD) screens, but can show color artifacts on CRT screens. The
 \"Automatic\" choice will enable it only if a LCD screen is detected.
";
$elem["fontconfig/subpixel_rendering"]["descriptionde"]="Subpixel-Rendering für den Bildschirm einschalten:
 Text-Darstellung auf Subpixel-Ebene verbessert das Aussehen auf Flachbildschirmen (LCD), kann aber Farbfehler auf Röhrenmonitoren (CRT) verursachen. Mit der Einstellung »automatisch« wird es nur eingeschaltet, wenn ein LCD erkannt wurde.
";
$elem["fontconfig/subpixel_rendering"]["descriptionfr"]="Activation du lissage de sous-pixels pour l'affichage :
 Le lissage des sous-pixels donne un meilleur rendu sur un écran plat (LCD), mais peut faire apparaître des artefacts sur les écrans traditionnels (CRT). Si vous choisissez « Automatique », ce rendu sera activé si un écran LCD est détecté.
";
$elem["fontconfig/subpixel_rendering"]["default"]="Automatic";
$elem["fontconfig/enable_bitmaps"]["type"]="boolean";
$elem["fontconfig/enable_bitmaps"]["description"]="Enable bitmapped fonts by default?
 By default, only outline fonts are used by applications which support
 fontconfig.
 .
 Outline fonts are fonts which scale well to various sizes. In
 contrast, bitmapped fonts are often lower quality. Enabling this
 option will affect the systemwide default; this and many other
 fontconfig options may be enabled or disabled on a per-user basis.
";
$elem["fontconfig/enable_bitmaps"]["descriptionde"]="Standardmäßig Bitmap-Schriftarten verwenden?
 Standardmäßig nutzen Anwendungen, die fontconfig unterstützen, nur Outline-Schriftarten.
 .
 Outline-Schriftarten können gut in verschiedene Größen skaliert werden. Bitmap-Schriftarten sind im Gegensatz dazu oft von geringerer Qualität. Wenn Sie hier zustimmen, beeinflussen Sie die systemweite Standardeinstellung; diese und viele andere Einstellungen von Fontconfig können benutzerbezogen ein- und ausgeschaltet werden.
";
$elem["fontconfig/enable_bitmaps"]["descriptionfr"]="Faut-il utiliser par défaut des polices de type « bitmap » ?
 Par défaut, seules les polices de type contour (« outline ») sont utilisées par les applications qui se servent de fontconfig.
 .
 Ces polices gardent toutes leurs qualités dans les différentes tailles. Les polices de type « bitmap », au contraire, ont souvent une qualité moindre. Cette option affectera la valeur par défaut pour tout le système ; chaque utilisateur peut activer ou désactiver cette option ainsi que d'autres options de fontconfig.
";
$elem["fontconfig/enable_bitmaps"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
