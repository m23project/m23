<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xprint-common");

$elem["xprint-common/default_printer_resolution"]["type"]="string";
$elem["xprint-common/default_printer_resolution"]["description"]="Default printer resolution:
 By default, Xprint assumes a printer resolution of 600 dpi. This should be
 well suited for the majority of printers.
 .
 On certain 1200 dpi printers, however, the image might appear squashed in the
 corner of the page, or it might be blown up too large on 300 dpi printers. If
 you are experiencing such printing problems, you may want to set
 the default printer resolution to a more appropriate value. See
 /usr/share/doc/xprint-common/README.printing-problems.gz for more details.
";
$elem["xprint-common/default_printer_resolution"]["descriptionde"]="Standard-Druckerauflösung:
 Standardmäßig verwendet Xprint eine Druckerauflösung von 600 dpi. Das funktioniert gut mit den meisten Druckern.
 .
 Trotzdem erscheint der Ausdruck bei bestimmten 1200-dpi-Druckern in die Ecke der Seite gequetscht oder er wird auf 300-dpi-Druckern zu groß dargestellt. Falls bei Ihnen diese Druckprobleme auftreten, sollten Sie die Standard-Druckerauflösung auf einen besser passenden Wert setzen. Einzelheiten finden Sie in der Datei /usr/share/doc/xprint-common/README.printing-problems.gz.
";
$elem["xprint-common/default_printer_resolution"]["descriptionfr"]="Résolution par défaut de l'imprimante :
 Par défaut, XPrint utilise une résolution d'impression de 600 ppp (points par pouce ou « dpi »). Cette valeur convient pour la majorité des imprimantes actuelles.
 .
 Cependant, un document préparé en 600 ppp apparaîtra trop gros sur une imprimante dont la résolution est de 300 ppp ou trop petit (un quart de page occupée) sur une imprimante à 1200 ppp. Si vous rencontrez ce type de problèmes, vous devriez choisir une valeur plus adaptée comme résolution d'impression. Veuillez consulter le fichier /usr/share/doc/xprint-common/README.printing-problems.gz pour plus d'informations.
";
$elem["xprint-common/default_printer_resolution"]["default"]="600";
PKG_OptionPageTail2($elem);
?>
