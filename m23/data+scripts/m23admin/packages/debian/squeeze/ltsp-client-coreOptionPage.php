<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ltsp-client-core");

$elem["ltsp-client/abort-installation"]["type"]="error";
$elem["ltsp-client/abort-installation"]["description"]="Installation aborted
 The ltsp-client package provides the basic structure for an LTSP
 terminal. It cannot be installed on a regular machine.
";
$elem["ltsp-client/abort-installation"]["descriptionde"]="Installation abgebrochen
 Das Paket ltsp-client stellt die Grundstruktur für ein LTSP-Terminal zur Verfügung; es kann nicht auf einem normalen Rechner installiert werden.
";
$elem["ltsp-client/abort-installation"]["descriptionfr"]="Installation interrompue
 Le paquet ltsp-client fournit l'architecture essentielle à un terminal LTSP. Il ne saurait être installé sur une machine classique.
";
$elem["ltsp-client/abort-installation"]["default"]="";
PKG_OptionPageTail2($elem);
?>
