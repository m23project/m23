<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("approx");

$elem["approx/port"]["type"]="string";
$elem["approx/port"]["description"]="TCP port for approx service:
 Please enter the TCP port on which approx should listen for requests.
 The default is the value used by apt-proxy, for compatibility with
 its clients' /etc/apt/sources.list files.
";
$elem["approx/port"]["descriptionde"]="TCP-Port für den Approx-Dienst:
 Bitte geben Sie den TCP-Port ein, auf dem Approx auf Anfragen warten soll. Voreingestellt ist aus Kompatibilität zu den /etc/apt/sources.list-Dateien der Clients der von Apt-proxy verwandte Wert.
";
$elem["approx/port"]["descriptionfr"]="Port TCP pour le service approx :
 Veuillez indiquer le port TCP sur lequel approx sera à l'écoute des connexions entrantes. La valeur par défaut est celle utilisée par apt-proxy, ce qui permet d'utiliser les mêmes fichiers /etc/apt/sources.list sur les machines clientes.
";
$elem["approx/port"]["default"]="9999";
PKG_OptionPageTail2($elem);
?>
