<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dtc-xen-firewall");

$elem["dtc-xen-firewall/conf_soap_server_allowed_ip"]["type"]="string";
$elem["dtc-xen-firewall/conf_soap_server_allowed_ip"]["description"]="DTC-Xen incoming connection IP address:
 This package will bock all connections incoming connection to the default port
 of DTC-Xen. Only the IP address of your management server holding the DTC web
 panel should be allowed, for security reasons. Please enter the IP address of
 your control panel so it will be allowed to connect.
 .
 By default, all IP will be allowed to connect, which might not be what you
 want as this is quite unsecure.
";
$elem["dtc-xen-firewall/conf_soap_server_allowed_ip"]["descriptionde"]="";
$elem["dtc-xen-firewall/conf_soap_server_allowed_ip"]["descriptionfr"]="";
$elem["dtc-xen-firewall/conf_soap_server_allowed_ip"]["default"]="0.0.0.0";
PKG_OptionPageTail2($elem);
?>
