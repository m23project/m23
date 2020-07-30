<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ilisp");

$elem["ilisp/fsf-compliant"]["type"]="boolean";
$elem["ilisp/fsf-compliant"]["description"]="Use FSF-compliant keybindings?
 ILISP allows the choice of using FSF-compliant keybindings which start
 with a Control-C character. The older ILISP keybindings use a Control-Z
 character as the prefix.
 .
 In general, the non-FSF compliant keybindings are easier to use: the ILISP
 manual in the Debian package ilisp-doc uses the non-FSF compliant
 keybindings and these keybindings often use fewer keystrokes.
 .
 If you change your mind later, you can run dpkg-reconfigure ilisp and
 change your keybinding selection.
";
$elem["ilisp/fsf-compliant"]["descriptionde"]="FSF-konforme Tastenkürzel benutzen?
 Sie haben die Wahl zwischen FSF-konformen Tastenkürzeln, die mit STRG-c beginnen, oder den alten ILISP-Tastenkürzeln, die mit STRG-z anfangen. 
 .
 Die alten ILISP-Tastenkürzel sind allgemein einfacher zu benutzen, das ILISP- Handbuch im Debian-Paket ilisp-doc verwendet diese auch und diese Tastenkürzel erfordern meist weniger Tastenanschläge.
 .
 Wenn Sie das später andern wollen, starten Sie dpkg-reconfigure ilisp und ändern die Einstellung der Tastenkürzel.
";
$elem["ilisp/fsf-compliant"]["descriptionfr"]="Utiliser des associations de touches conformes aux normes FSF ?
 ILISP vous permet d'utiliser des associations de touches (« keybindings ») conformes aux normes de la FSF pour les combinaisons basées sur Ctrl-C. Les anciennes associations de touches d'ILISP utilisent la séquence Ctrl-Z comme préfixe.
 .
 En général, les associations de touches non conformes aux normes FSF sont plus simples à utiliser : le manuel ILISP du paquet debian ilisp-doc utilise ces associations de touches, qui sont souvent composées de séquences de touches plus courtes.
 .
 Si vous changez d'avis ultérieurement, vous pourrez utiliser la commande « dpkg-reconfigure ilisp » pour modifier le type d'association de touches.
";
$elem["ilisp/fsf-compliant"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
