<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("discover");

$elem["discover/install_hw_packages"]["type"]="multiselect";
$elem["discover/install_hw_packages"]["description"]="Packages to install:
 Some packages were found to be useful with your hardware.
 Please select those you want to install.
";
$elem["discover/install_hw_packages"]["descriptionde"]="Zu installierende Pakete:
 Es wurden Pakete gefunden, die für Ihre Hardware nützlich sind. Bitte wählen Sie aus, welche Sie installieren wollen.
";
$elem["discover/install_hw_packages"]["descriptionfr"]="Paquets à installer :
 Certains paquets pourraient être utiles avec votre matériel. Veuillez choisir ceux que vous souhaitez installer.
";
$elem["discover/install_hw_packages"]["default"]="";
PKG_OptionPageTail2($elem);
?>
