<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pleiades");

$elem["pleiades/eclipse"]["type"]="boolean";
$elem["pleiades/eclipse"]["description"]="Enable Pleiades in Eclipse configuration?
 Eclipse is not currently configured to use Pleiades for Japanese
 language support.
 .
 Please choose whether Pleiades should be activated in the Eclipse
 configuration file (/etc/eclipse.ini).
";
$elem["pleiades/eclipse"]["descriptionde"]="Pleiades in der Eclipse-Konfiguration aktivieren?
 Eclipse ist derzeit nicht konfiguriert, um Pleiades für die Unterstützung der japanischen Sprache zu verwenden.
 .
 Bitte wählen Sie, ob Pleiades in der Eclipse-Konfigurationsdatei (/etc/eclipse.ini) aktiviert werden soll.
";
$elem["pleiades/eclipse"]["descriptionfr"]="Faut-il activer Pleiades dans la configuration d'Eclipse ?
 Actuellement, Eclipse n'est pas configuré pour utiliser Pleiades pour la gestion de la langue japonaise.
 .
 Veuillez choisir si Pleiades devrait être activé dans le fichier de configuration d'Eclipse (/etc/eclipse.ini).
";
$elem["pleiades/eclipse"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
