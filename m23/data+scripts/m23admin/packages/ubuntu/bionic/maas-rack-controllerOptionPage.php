<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas-rack-controller");

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
