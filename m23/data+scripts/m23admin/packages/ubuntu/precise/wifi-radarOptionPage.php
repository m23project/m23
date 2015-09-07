<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wifi-radar");

$elem["wifi-radar/wifi_interface"]["type"]="string";
$elem["wifi-radar/wifi_interface"]["description"]="Wi-Fi interface name:
 Enter the name of the Wi-Fi interface that is to be managed by WiFi
 Radar.  Note that WiFi Radar does not support multiple Wi-Fi interfaces.
";
$elem["wifi-radar/wifi_interface"]["descriptionde"]="Wi-Fi-Schnittstellenname:
 Geben Sie den Namen der Wi-Fi-Schnittstelle ein, die von WiFi Radar verwaltet werden soll. Beachten Sie, dass WiFi Radar nicht mehrere Schnittstellen unterstützt.
";
$elem["wifi-radar/wifi_interface"]["descriptionfr"]="Nom de l'interface Wi-Fi :
 Veuillez indiquer le nom de l'interface Wi-Fi qui sera gérée par WiFi Radar. Celui-ci ne peut pas gérer plusieurs interfaces simultanément.
";
$elem["wifi-radar/wifi_interface"]["default"]="";
PKG_OptionPageTail2($elem);
?>
