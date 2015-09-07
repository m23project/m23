<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("quagga");

$elem["quagga/really_stop"]["type"]="boolean";
$elem["quagga/really_stop"]["description"]="Do you really want to stop the Quagga daemon?
 WARNING: The Quagga routing daemon has to be stopped to proceed. This
 could lead to BGP flaps or loss of network connectivity.
";
$elem["quagga/really_stop"]["descriptionde"]="Möchten Sie den Quagga-Daemon wirklich beenden?
 Warnung: Um fortzufahren muss der Quagga-Routing-Daemon beendet werden. Dies könnte zu BGP-Flaps oder Verlust der Netzwerkverbindung führen.
";
$elem["quagga/really_stop"]["descriptionfr"]="Faut-il vraiment arrêter le démon Quagga ?
 Veuillez noter que le démon de routage Quagga doit être arrêté avant de poursuivre cette installation. Cela peut provoquer des incohérences BGP ou des pertes de connectivité.
";
$elem["quagga/really_stop"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
