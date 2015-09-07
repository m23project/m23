<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas-cluster-controller");

$elem["maas-cluster-controller/maas-url"]["type"]="string";
$elem["maas-cluster-controller/maas-url"]["description"]="Ubuntu MAAS API address:
 The MAAS Cluster Controller needs to contact the MAAS server to
 register its presence.  Set the URL to the MAAS API here, e.g.
 http://192.168.1.1/MAAS
";
$elem["maas-cluster-controller/maas-url"]["descriptionde"]="";
$elem["maas-cluster-controller/maas-url"]["descriptionfr"]="";
$elem["maas-cluster-controller/maas-url"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
