<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas-region-controller");

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
    sudo dpkg-reconfigure maas-region-controller

";
$elem["maas/installation-note"]["descriptionde"]="";
$elem["maas/installation-note"]["descriptionfr"]="";
$elem["maas/installation-note"]["default"]="false";
$elem["maas/default-maas-url"]["type"]="string";
$elem["maas/default-maas-url"]["description"]="Ubuntu MAAS PXE/Provisioning network address:
 The Ubuntu MAAS Server automatically detects the IP address
 that is used for PXE and provisioning. However, it needs to be
 reacheable by the clients (e.g L2 or L3 network). If the
 automatically detected address is not reacheable by the clients,
 it needs to be changed.

";
$elem["maas/default-maas-url"]["descriptionde"]="";
$elem["maas/default-maas-url"]["descriptionfr"]="";
$elem["maas/default-maas-url"]["default"]="";
$elem["maas/username"]["type"]="string";
$elem["maas/username"]["description"]="Ubuntu MAAS username
 The Ubuntu MAAS server requires the administrator to create a
 username and password combination.
 .
 Please provide the username for the MAAS account.

";
$elem["maas/username"]["descriptionde"]="";
$elem["maas/username"]["descriptionfr"]="";
$elem["maas/username"]["default"]="";
$elem["maas/password"]["type"]="password";
$elem["maas/password"]["description"]="Ubuntu MAAS password
 The Ubuntu MAAS server requires the administrator to create a
 username and password combination.
 .
 Please provide the password for the MAAS account.
";
$elem["maas/password"]["descriptionde"]="";
$elem["maas/password"]["descriptionfr"]="";
$elem["maas/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
