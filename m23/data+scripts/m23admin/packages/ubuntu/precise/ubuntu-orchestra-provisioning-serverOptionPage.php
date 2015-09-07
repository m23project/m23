<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ubuntu-orchestra-provisioning-server");

$elem["ubuntu-orchestra-provisioning-server/import-isos"]["type"]="boolean";
$elem["ubuntu-orchestra-provisioning-server/import-isos"]["description"]="Download and import Ubuntu mini ISOs:
 Ubuntu Orchestra Provisioning Server can automatically download
 and import all the latest Ubuntu mini ISOs. Additionally, it
 will also create profiles for juju.
 .
 This process requires Internet access and might impact your
 network during and post-installation of the provisioning server.

";
$elem["ubuntu-orchestra-provisioning-server/import-isos"]["descriptionde"]="";
$elem["ubuntu-orchestra-provisioning-server/import-isos"]["descriptionfr"]="";
$elem["ubuntu-orchestra-provisioning-server/import-isos"]["default"]="true";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-enabled"]["type"]="boolean";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-enabled"]["description"]="Enable Orchestra managed DNS/DHCP:
 Ubuntu Orchestra Provisioning Server can manage address and name
 allocation for provisioned systems.  If you manage your DNS and
 DHCP elsewhere, you should disable this option.

";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-enabled"]["descriptionde"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-enabled"]["descriptionfr"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-enabled"]["default"]="true";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-dhcp-range"]["type"]="string";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-dhcp-range"]["description"]="Set the network range for DHCP Clients:
 Ubuntu Orchestra Provisioning Server manages DHCP for address
 allocation for the provisioned systems.  If the network range
 for the DHCP clients is different from the default
 (192.168.1.5,192.168.1.200), you should set it here.
 .
 An example of how a network range should be specified is as
 follows:
 .
 10.10.10.2,10.10.10.254

";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-dhcp-range"]["descriptionde"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-dhcp-range"]["descriptionfr"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-dhcp-range"]["default"]="";
$elem["ubuntu-orchestra-provisioning-server/default-gateway"]["type"]="string";
$elem["ubuntu-orchestra-provisioning-server/default-gateway"]["description"]="Set default Gateway for DHCP Clients:
 Ubuntu Orchestra Provisioning Server manages DHCP for address
 allocation for the provisioned systems.  If the Provisioning
 Server is NOT the default Gateway for the provisioned systems, 
 you should set the default Gateway here, otherwise leave this
 blank.

";
$elem["ubuntu-orchestra-provisioning-server/default-gateway"]["descriptionde"]="";
$elem["ubuntu-orchestra-provisioning-server/default-gateway"]["descriptionfr"]="";
$elem["ubuntu-orchestra-provisioning-server/default-gateway"]["default"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-domain-name"]["type"]="string";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-domain-name"]["description"]="Set the domain name for DHCP Clients:
 Ubuntu Orchestra Provisioning Server manages DHCP for address
 allocation for the provisioned systems. If these systems are
 required to be under a domain, you should enter it here.
";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-domain-name"]["descriptionde"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-domain-name"]["descriptionfr"]="";
$elem["ubuntu-orchestra-provisioning-server/dnsmasq-domain-name"]["default"]="";
PKG_OptionPageTail2($elem);
?>
