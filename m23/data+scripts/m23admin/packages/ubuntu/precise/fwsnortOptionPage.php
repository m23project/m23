<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fwsnort");

$elem["fwsnort/download"]["type"]="boolean";
$elem["fwsnort/download"]["description"]="Download the rules?
 The latest Snort rules can be downloaded from http://www.emergingthreats.net
 in order to keep fwsnort up-to-date.
";
$elem["fwsnort/download"]["descriptionde"]="Die Regeln herunterladen?
 Um fwsnort aktuell zu halten, können die neuesten Regeln für Snort von http://www.emergingthreats.net heruntergeladen werden.
";
$elem["fwsnort/download"]["descriptionfr"]="Faut-il télécharger les règles ?
 Vous pouvez télécharger les règles Snort les plus récentes sur http://www.emergingthreats.net si vous voulez garder fwsnort à jour.
";
$elem["fwsnort/download"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
