<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas-dhcp");

$elem["maas-dhcp/dnsmasq-dhcp-range"]["type"]="string";
$elem["maas-dhcp/dnsmasq-dhcp-range"]["description"]="Set the network range for DHCP Clients:
 Ubuntu MAAS Server can manage DHCP for address allocation for
 the provisioned systems.  If the network range for the DHCP is
 different from the default (192.168.1.5,192.168.1.200), you
 should set it here.
 .
 An example of how a network range should be specified is:
 .
 10.10.10.2,10.10.10.254

";
$elem["maas-dhcp/dnsmasq-dhcp-range"]["descriptionde"]="";
$elem["maas-dhcp/dnsmasq-dhcp-range"]["descriptionfr"]="";
$elem["maas-dhcp/dnsmasq-dhcp-range"]["default"]="";
$elem["maas-dhcp/dnsmasq-default-gateway"]["type"]="string";
$elem["maas-dhcp/dnsmasq-default-gateway"]["description"]="Set default Gateway for DHCP Clients:
 Ubuntu MAAS Server can manage DHCP for address allocation for
 the provisioned systems.  If the Ubuntu MAAS Server is NOT the
 default Gateway for the provisioned systems, you should set the
 default Gateway here, otherwise leave this blank.

";
$elem["maas-dhcp/dnsmasq-default-gateway"]["descriptionde"]="";
$elem["maas-dhcp/dnsmasq-default-gateway"]["descriptionfr"]="";
$elem["maas-dhcp/dnsmasq-default-gateway"]["default"]="";
$elem["maas-dhcp/dnsmasq-domain-name"]["type"]="string";
$elem["maas-dhcp/dnsmasq-domain-name"]["description"]="Set the domain name for DHCP Clients:
 Ubuntu MAAS Server can manage DHCP for address allocation for
 the provisioned systems. If these systems are required to be
 under a domain, you should enter it here.
";
$elem["maas-dhcp/dnsmasq-domain-name"]["descriptionde"]="";
$elem["maas-dhcp/dnsmasq-domain-name"]["descriptionfr"]="";
$elem["maas-dhcp/dnsmasq-domain-name"]["default"]="";
PKG_OptionPageTail2($elem);
?>
