<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pbuilder");

$elem["pbuilder/mirrorsite"]["type"]="string";
$elem["pbuilder/mirrorsite"]["description"]="Default mirror site:
 Please enter the default mirror you want to be used by pbuilder.
 .
 If you leave this field blank, there will be one attempt to autodetect
 this information. If this attempt fails, you will be prompted again
 to insert some valid mirror information.
 .
 Here is a valid mirror example: http://archive.ubuntu.com/ubuntu

";
$elem["pbuilder/mirrorsite"]["descriptionde"]="";
$elem["pbuilder/mirrorsite"]["descriptionfr"]="";
$elem["pbuilder/mirrorsite"]["default"]="";
$elem["pbuilder/nomirror"]["type"]="error";
$elem["pbuilder/nomirror"]["description"]="Default mirror not found
 Mirror information detection failed and the user provided no mirror information.
 .
 Please enter valid mirror information.
";
$elem["pbuilder/nomirror"]["descriptionde"]="Standard-Spiegelserver nicht gefunden
 Spiegelserver-Informationserkennung schlug fehl und der Benutzer stellte keine Spiegelserver-Informationen bereit.
 .
 Bitte geben Sie gültige Spiegelserver-Informationen ein.
";
$elem["pbuilder/nomirror"]["descriptionfr"]="Miroir introuvable
 La tentative de détection automatique d'un miroir a échoué.
 .
 Veuillez indiquer un miroir valable.
";
$elem["pbuilder/nomirror"]["default"]="";
$elem["pbuilder/rewrite"]["type"]="boolean";
$elem["pbuilder/rewrite"]["description"]="Overwrite current configuration?
 Your system seems to have already pbuilder configuration.
 Proceeding might discard or overwrite part or the entire
 pbuilder's configuration.
";
$elem["pbuilder/rewrite"]["descriptionde"]="Aktuelle Konfiguration überschreiben?
 Es scheint, dass Ihr System bereits über eine Pbuilder-Konfiguration verfügt. Falls Sie fortfahren, könnten die gesamte oder Teile der Pbuilder-Konfiguration verworfen oder überschrieben werden.
";
$elem["pbuilder/rewrite"]["descriptionfr"]="Faut-il écraser la configuration actuelle?
 Des paramètres de configuration de pbuilder semblent déjà exister sur ce système. Veuillez choisir si vous acceptez de perdre tout ou partie de ces informations de configuration.
";
$elem["pbuilder/rewrite"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
