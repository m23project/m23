<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libfltk1.1-dev");

$elem["libfltk1.1-dev/header-links"]["type"]="boolean";
$elem["libfltk1.1-dev/header-links"]["description"]="Make .h links to <FL/*.H>?
 For compatibility with some older code, FLTK used to make its C++-specific
 headers available as <FL/*.h> as well as <FL/*.H>. However, the
 lowercase-h names are deprecated and should be eliminated from
 source code.
 .
 Please choose whether such compatibility symlinks should be created.
";
$elem["libfltk1.1-dev/header-links"]["descriptionde"]="Soll *.h auf <FL/*.H> verweisen?
 Für die Verträglichkeit mit älteren Quelltexten macht FLTK seine C++-spezifischen Header-Dateien als <FL/*.h> und <FL/*.H> verfügbar. Allerdings sind die Namen, die mit kleinem »h« enden, veraltet und sie sollten aus Quelltexten entfernt werden.
 .
 Bitte stimmen Sie zu, wenn diese symbolischen Verweise erstellt werden sollen.
";
$elem["libfltk1.1-dev/header-links"]["descriptionfr"]="Faut-il créer des liens des .h vers <FL/*.H> ?
 Pour garantir la compatibilité avec certains codes source plus anciens, FLTK fournissait ses en-têtes spécifiques pour le C++ disponibles sous les deux formes <FL/*.h> et <FL/*.H> ; cependant les noms en .h (en minuscule) sont considérés comme obsolètes, et il est donc recommandé de les remplacer dans le code source.
 .
 Veuillez choisir si des liens symboliques, permettant de préserver la compatibilité, doivent être créés.
";
$elem["libfltk1.1-dev/header-links"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
