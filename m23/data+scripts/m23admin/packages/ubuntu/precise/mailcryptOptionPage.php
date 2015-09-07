<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailcrypt");

$elem["mailcrypt/default"]["type"]="boolean";
$elem["mailcrypt/default"]["description"]="Should Mailcrypt be auto-loaded by default at your site?
 Mailcrypt will globally (i.e., for all users on this site) overload certain
 Emacs functions and key-bindings if you answer affirmatively to this
 question.
 .
 This is generally a good thing, since Mailcrypt is a very useful package;
 however you may not want it to happen, and instead let single users at your
 site decide by themselves if they should load this package.
 .
 If you answer negatively, people who desire to use it will have to put the
 string \"(require 'mailcrypt-init)\" in their personal Emacs configuration
 file (e.g., \"~/.emacs\" or \"~/.emacs.el\") to load it.
";
$elem["mailcrypt/default"]["descriptionde"]="Soll Mailcrypt bei Ihnen standardmäßig automatisch geladen werden?
 Mailcrypt wird Global (d.h., für alle Ihre Benutzer) einige Emacs-Funktionenund Tastenkürzel überschreiben, wenn Sie dieser Frage zustimmen.
 .
 Generell ist das in Ordnung, denn Mailcrypt ist ein sehr nützliches Paket; jedoch möchten Sie vielleicht nicht, das das passiert, statt dessen möchtenSie vielleicht, dass jeder einzelne Benutzer selbst entscheiden kann, ob das Paket geladen werden soll oder nicht.
 .
 Wenn Sie ablehnend antworten, müssen die Leute, die das Paket benutzen möchten, in ihre persönliche Emacs-Konfigurationsdatei (z.B. »~/.emacs« oder »~/.emacs.el«) die folgende Zeichenkette eintragen, um es zu laden: »(require 'mailcrypt-init)«.
";
$elem["mailcrypt/default"]["descriptionfr"]="Faut-il charger Mailcrypt par défaut pour votre site ?
 Avec cette option, Mailcrypt va globalement (c'est-à-dire pour tous les utilisateurs de ce site) remplacer certaines fonctions et raccourcis-clavier d'Emacs.
 .
 C'est en général une bonne initiative puisque Mailcrypt est un paquet très utile. Néanmoins, vous pouvez refuser et laisser le choix aux utilisateurs de votre site de charger ce paquet.
 .
 En refusant cette option, les utilisateurs désireux d'utiliser ce paquet devront entrer la chaîne « (require 'mailcrypt-init) » dans leur fichier de configuration d'Emacs (e.g. ~/.emacs ou ~/.emacs.el) pour le charger.
";
$elem["mailcrypt/default"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
