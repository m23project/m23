<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cups-bsd");

$elem["cups-bsd/setuplpd"]["type"]="boolean";
$elem["cups-bsd/setuplpd"]["description"]="Do you want to set up the BSD lpd compatibility server?
 The CUPS package contains a server that can accept BSD-style print
 jobs and submit them to CUPS. It should only be set up if other
 computers are likely to submit jobs over the network via the \"BSD\" or
 \"LPR\" services, and these computers cannot be converted to use the
 IPP protocol that CUPS uses.
";
$elem["cups-bsd/setuplpd"]["descriptionde"]="Möchten Sie den Kompatibilitäts-Server für BSD lpd einrichten?
 Dieses Paket enthält einen Server, der BSD-artige Druckaufträge entgegennimmt und diese an CUPS weiterleitet. Sie sollten diesen Server nur einsetzen, wenn andere Rechner über Ihren Rechner Druckaufträge via »bsd« oder »lpr« absetzen und diese Rechner nicht auf das von CUPS verwendete IPP-Protokoll umgestellt werden können.
";
$elem["cups-bsd/setuplpd"]["descriptionfr"]="Faut-il installer le serveur compatible avec le démon lpd de BSD ?
 Le paquet de CUPS fournit un serveur capable d'accepter des demandes d'impression au style BSD et de les donner à CUPS. Ne le configurez que si des postes du réseau ne sont capable de communiquer avec le serveur qu'avec les services « BSD » ou « LPR » et ne gèrent pas le protocole IPP utilisé par CUPS.
";
$elem["cups-bsd/setuplpd"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
