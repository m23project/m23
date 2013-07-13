<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xfonts-wqy");

$elem["xfonts-wqy/enable_wqy"]["type"]="boolean";
$elem["xfonts-wqy/enable_wqy"]["description"]="Enable WenQuanYi font in fontconfig?
 By default, bitmapped fonts are disabled in fontconfig setting because
 they are often lower quality. Enabling this option will bypass the
 system wide fontconfig setting and allow applications to use WenQuanYi
 font without affecting other bitmapped fonts.
";
$elem["xfonts-wqy/enable_wqy"]["descriptionde"]="WenQuanYi in Fontconfig aktivieren?
 Standardmäßig sind Bitmap-Schriften in den Fontconfig-Einstellungen deaktiviert, da sie oft von niedrigerer Qualität sind. Durch aktivieren dieser Option wird die systemweite Fontconfig-Einstellung umgangen und Anwendungen erlaubt, die WenQuanYi-Schrift zu benutzen, ohne andere Bitmap-Schriften zu beeinflussen.
";
$elem["xfonts-wqy/enable_wqy"]["descriptionfr"]="Faut-il activer les polices WenQuanYi dans fontconfig ?
 Les polices en mode point (« bitmap ») sont désactivées par défaut dans fontconfig, car elles présentent souvent une qualité moindre. L'activation de cette option court-circuitera le paramétrage global de fontconfig. Vos applications pourront alors utiliser une police WenQuanYi sans que cela ait d'incidence sur les autres polices en mode point.
";
$elem["xfonts-wqy/enable_wqy"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
