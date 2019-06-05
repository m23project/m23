<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas-common");

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
 in the same network as the clients. If the automatically
 detected address is not in the same network as the clients, it
 must be changed.

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
$elem["maas-rack-controller/maas-url"]["type"]="string";
$elem["maas-rack-controller/maas-url"]["description"]="Ubuntu MAAS API address:
 The MAAS cluster controller and nodes need to contact the MAAS region
 controller API.  Set the URL at which they can reach the MAAS API remotely,
 e.g. \"http://192.168.1.1/MAAS\".
 Since nodes must be able to access this URL, localhost or 127.0.0.1 are not
 useful values here.

";
$elem["maas-rack-controller/maas-url"]["descriptionde"]="";
$elem["maas-rack-controller/maas-url"]["descriptionfr"]="";
$elem["maas-rack-controller/maas-url"]["default"]="";
$elem["maas-rack-controller/shared-secret"]["type"]="password";
$elem["maas-rack-controller/shared-secret"]["description"]="MAAS Rack Controller Shared Secret:
 The MAAS rack controller needs to contact the MAAS region controller
 with the shared secret found in /var/lib/maas/secret on the region controller.
 Set the shared secret here.
";
$elem["maas-rack-controller/shared-secret"]["descriptionde"]="";
$elem["maas-rack-controller/shared-secret"]["descriptionfr"]="";
$elem["maas-rack-controller/shared-secret"]["default"]="";
PKG_OptionPageTail2($elem);
?>
