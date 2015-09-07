<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debian-edu-install");

$elem["debian-edu-install/errors-found"]["type"]="error";
$elem["debian-edu-install/errors-found"]["description"]="Some errors were found during installation
 .
 ${ERRORS}
 .
 Consider reporting them to the Debian Edu developers.
";
$elem["debian-edu-install/errors-found"]["descriptionde"]="Es wurden Fehler während der Installation festgestellt:
 .
 ${ERRORS}
 .
 Bitte berichten Sie diese an die Debian-Edu-Entwickler.
";
$elem["debian-edu-install/errors-found"]["descriptionfr"]="Erreurs rencontrées pendant l'installation
 .
 ${ERRORS}
 .
 Veuillez les signaler aux développeurs de Debian Edu.
";
$elem["debian-edu-install/errors-found"]["default"]="";
$elem["debian-edu-install/no-errors-found"]["type"]="note";
$elem["debian-edu-install/no-errors-found"]["description"]="No errors were found during installation
 This is shown for the development version to make it clear that the
 installation was successfull.

";
$elem["debian-edu-install/no-errors-found"]["descriptionde"]="";
$elem["debian-edu-install/no-errors-found"]["descriptionfr"]="";
$elem["debian-edu-install/no-errors-found"]["default"]="";
$elem["debian-edu-install/run-firstboot"]["type"]="boolean";
$elem["debian-edu-install/run-firstboot"]["description"]="for internal use
 Preseed this during installation to insert the firstboot init.d script
 into the boot sequence.
";
$elem["debian-edu-install/run-firstboot"]["descriptionde"]="";
$elem["debian-edu-install/run-firstboot"]["descriptionfr"]="";
$elem["debian-edu-install/run-firstboot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
