<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas");

$elem["maas/installation-note"]["type"]="note";
$elem["maas/installation-note"]["description"]="Ubuntu MAAS Server
 The Ubuntu MAAS Server has been installed in your system. You
 can access the MAAS Web interface here:
 .
    http://${MAAS_URL}/MAAS
 .
 If the automatically detected address above is not in the same
 network as the MAAS clients, you need to reconfigure it:
 .
    sudo dpkg-reconfigure maas

";
$elem["maas/installation-note"]["descriptionde"]="";
$elem["maas/installation-note"]["descriptionfr"]="";
$elem["maas/installation-note"]["default"]="true";
$elem["maas/default-maas-url"]["type"]="string";
$elem["maas/default-maas-url"]["description"]="Ubuntu MAAS PXE/Provisioning network address:
 The Ubuntu MAAS Server automatically detects the IP address
 that is used for PXE and provisioning. However, it needs to be
 in the same network as the clients. If the automatically
 detected address is not in the same network as the clients, it
 must be changed. 
";
$elem["maas/default-maas-url"]["descriptionde"]="";
$elem["maas/default-maas-url"]["descriptionfr"]="";
$elem["maas/default-maas-url"]["default"]="";
PKG_OptionPageTail2($elem);
?>
