<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("anthy");

$elem["anthy/dictionaries"]["type"]="multiselect";
$elem["anthy/dictionaries"]["description"]="Extra dictionaries to use:
 The anthy package can use add-on dictionaries in addition to the
 system dictionary. The following are currently available:
 .
  - base.t : Anthy-specific words which are compatible with cannadic;
  - extra.t: Anthy-specific words which are not compatible with cannadic;
  - 2ch.t  : Slang used in 2ch, the web's biggest Japanese discussion forum.
";
$elem["anthy/dictionaries"]["descriptionde"]="Zu verwendende zusätzliche Wörterbücher
 Neben dem Systemwörterbuch kann das Anthy-Paket Zusatzwörterbücher verwenden, von denen folgende verfügbar sind:
 .
  - base.t:  Anthy-spezifische Wörter, welche mit Cannadic kompatibel
             sind;
  - extra.t: Anthy-spezifische Wörter, welche nicht mit Cannadic
             kompatibel sind;
 -  2ch.t:   Umgangssprache, die in 2ch, dem größten japanischen
             Diskussions-Forum im Web, verwendet wird.
";
$elem["anthy/dictionaries"]["descriptionfr"]="Dictionnaires supplémentaires à utiliser :
 Le paquet anthy peut ajouter des dictionnaires supplémentaires en plus du dictionnaire système. Les dictionnaires suivants sont disponibles :
 .
  - base.t  : Mots spécifiques à anthy, compatibles avec cannadic ;
  - extra.t : Mots spécifiques à anthy, incompatibles avec cannadic ;
  - 2ch.t   : Jargon utilisé sur 2ch, le plus grand groupe de
            discussions japonais sur le web.
";
$elem["anthy/dictionaries"]["default"]="base.t, extra.t";
PKG_OptionPageTail2($elem);
?>
