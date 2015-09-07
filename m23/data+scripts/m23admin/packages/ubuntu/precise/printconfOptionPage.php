<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("printconf");

$elem["printconf/setup_printers"]["type"]="boolean";
$elem["printconf/setup_printers"]["description"]="Automatically install local printers?
 Most modern printers connected to the USB and parallel interfaces
 of the computer can be automatically detected.
 .
 If you choose this option, any detected printers will be automatically
 set up to work with the Common UNIX Printing System (CUPS). You can
 later customize these printer queues using the Foomatic-GUI tool or
 by accessing the CUPS server at http://localhost:631/.
 .
 If you don't want to set up printers now, you can configure them
 later using the 'printconf' command.
";
$elem["printconf/setup_printers"]["descriptionde"]="Automatisch lokale Drucker installieren?
 Die meisten modernen Drucker, die an der USB- oder parallelen Schnittstelle des Rechners angeschlossen sind, können automatisch erkannt werden.
 .
 Falls Sie diese Option wählen, werden alle erkannten Drucker automatisch so konfiguriert, dass sie mit dem Common UNIX Printing System (CUPS) funktionieren. Sie können diese Drucker-Warteschlangen später mit Hilfe des Programms Foomatic-GUI oder über den Zugang des CUPS-Servers unter http://localhost:631/ anpassen.
 .
 Falls Sie jetzt keine Drucker einrichten wollen, können Sie sie später mittels des Befehls printconf konfigurieren.
";
$elem["printconf/setup_printers"]["descriptionfr"]="Faut-il installer automatiquement les imprimantes locales ?
 La plupart des imprimantes récentes présentes sur les ports USB et parallèles de l'ordinateur peuvent être détectées automatiquement.
 .
 Si vous choisissez cette option, toute imprimante détectée sera automatiquement configurée pour fonctionner avec CUPS (« Common UNIX Printing System »). Il sera par la suite possible de retoucher la configuration avec l'interface graphique de Foomatic (« Foomatic-GUI ») ou avec l'interface web de configuration de CUPS accessible à l'adresse http://localhost:631/.
 .
 Si vous ne souhaitez pas paramétrer d'imprimante maintenant, il vous sera toujours possible de le faire plus tard avec la commande « printconf ».
";
$elem["printconf/setup_printers"]["default"]="true";
$elem["printconf/printconf_run"]["type"]="boolean";
$elem["printconf/printconf_run"]["description"]="(for internal use only)
";
$elem["printconf/printconf_run"]["descriptionde"]="";
$elem["printconf/printconf_run"]["descriptionfr"]="";
$elem["printconf/printconf_run"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
