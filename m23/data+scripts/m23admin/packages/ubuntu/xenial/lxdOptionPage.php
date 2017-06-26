<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lxd");

$elem["lxd/setup-bridge"]["type"]="boolean";
$elem["lxd/setup-bridge"]["description"]="Do you want to setup a new bridge for LXD containers?

";
$elem["lxd/setup-bridge"]["descriptionde"]="";
$elem["lxd/setup-bridge"]["descriptionfr"]="";
$elem["lxd/setup-bridge"]["default"]="true";
$elem["lxd/use-existing-bridge"]["type"]="boolean";
$elem["lxd/use-existing-bridge"]["description"]="Do you want to use an existing bridge?

";
$elem["lxd/use-existing-bridge"]["descriptionde"]="";
$elem["lxd/use-existing-bridge"]["descriptionfr"]="";
$elem["lxd/use-existing-bridge"]["default"]="false";
$elem["lxd/bridge-name"]["type"]="string";
$elem["lxd/bridge-name"]["description"]="Bridge interface name:

";
$elem["lxd/bridge-name"]["descriptionde"]="";
$elem["lxd/bridge-name"]["descriptionfr"]="";
$elem["lxd/bridge-name"]["default"]="lxdbr0";
$elem["lxd/bridge-dnsmasq"]["type"]="string";
$elem["lxd/bridge-dnsmasq"]["description"]="Path to dnsmasq config:
 When provided, this is included in the bridge configuration.

";
$elem["lxd/bridge-dnsmasq"]["descriptionde"]="";
$elem["lxd/bridge-dnsmasq"]["descriptionfr"]="";
$elem["lxd/bridge-dnsmasq"]["default"]="";
$elem["lxd/bridge-domain"]["type"]="string";
$elem["lxd/bridge-domain"]["description"]="Domain name:

";
$elem["lxd/bridge-domain"]["descriptionde"]="";
$elem["lxd/bridge-domain"]["descriptionfr"]="";
$elem["lxd/bridge-domain"]["default"]="lxd";
$elem["lxd/bridge-ipv4"]["type"]="boolean";
$elem["lxd/bridge-ipv4"]["description"]="Do you want to setup an IPv4 subnet?

";
$elem["lxd/bridge-ipv4"]["descriptionde"]="";
$elem["lxd/bridge-ipv4"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4"]["default"]="false";
$elem["lxd/bridge-ipv4-address"]["type"]="string";
$elem["lxd/bridge-ipv4-address"]["description"]="IPv4 address:

";
$elem["lxd/bridge-ipv4-address"]["descriptionde"]="";
$elem["lxd/bridge-ipv4-address"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4-address"]["default"]="";
$elem["lxd/bridge-ipv4-netmask"]["type"]="string";
$elem["lxd/bridge-ipv4-netmask"]["description"]="IPv4 netmask:

";
$elem["lxd/bridge-ipv4-netmask"]["descriptionde"]="";
$elem["lxd/bridge-ipv4-netmask"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4-netmask"]["default"]="";
$elem["lxd/bridge-ipv4-dhcp-first"]["type"]="string";
$elem["lxd/bridge-ipv4-dhcp-first"]["description"]="First DHCP address:

";
$elem["lxd/bridge-ipv4-dhcp-first"]["descriptionde"]="";
$elem["lxd/bridge-ipv4-dhcp-first"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4-dhcp-first"]["default"]="";
$elem["lxd/bridge-ipv4-dhcp-last"]["type"]="string";
$elem["lxd/bridge-ipv4-dhcp-last"]["description"]="Last DHCP address:

";
$elem["lxd/bridge-ipv4-dhcp-last"]["descriptionde"]="";
$elem["lxd/bridge-ipv4-dhcp-last"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4-dhcp-last"]["default"]="";
$elem["lxd/bridge-ipv4-dhcp-leases"]["type"]="string";
$elem["lxd/bridge-ipv4-dhcp-leases"]["description"]="Max number of DHCP clients:

";
$elem["lxd/bridge-ipv4-dhcp-leases"]["descriptionde"]="";
$elem["lxd/bridge-ipv4-dhcp-leases"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4-dhcp-leases"]["default"]="";
$elem["lxd/bridge-ipv4-nat"]["type"]="boolean";
$elem["lxd/bridge-ipv4-nat"]["description"]="Do you want to NAT the IPv4 traffic?

";
$elem["lxd/bridge-ipv4-nat"]["descriptionde"]="";
$elem["lxd/bridge-ipv4-nat"]["descriptionfr"]="";
$elem["lxd/bridge-ipv4-nat"]["default"]="true";
$elem["lxd/bridge-ipv6"]["type"]="boolean";
$elem["lxd/bridge-ipv6"]["description"]="Do you want to setup an IPv6 subnet?

";
$elem["lxd/bridge-ipv6"]["descriptionde"]="";
$elem["lxd/bridge-ipv6"]["descriptionfr"]="";
$elem["lxd/bridge-ipv6"]["default"]="false";
$elem["lxd/bridge-ipv6-address"]["type"]="string";
$elem["lxd/bridge-ipv6-address"]["description"]="IPv6 address:

";
$elem["lxd/bridge-ipv6-address"]["descriptionde"]="";
$elem["lxd/bridge-ipv6-address"]["descriptionfr"]="";
$elem["lxd/bridge-ipv6-address"]["default"]="";
$elem["lxd/bridge-ipv6-netmask"]["type"]="string";
$elem["lxd/bridge-ipv6-netmask"]["description"]="IPv6 netmask:

";
$elem["lxd/bridge-ipv6-netmask"]["descriptionde"]="";
$elem["lxd/bridge-ipv6-netmask"]["descriptionfr"]="";
$elem["lxd/bridge-ipv6-netmask"]["default"]="";
$elem["lxd/bridge-ipv6-nat"]["type"]="boolean";
$elem["lxd/bridge-ipv6-nat"]["description"]="Do you want to NAT the IPv6 traffic?

";
$elem["lxd/bridge-ipv6-nat"]["descriptionde"]="";
$elem["lxd/bridge-ipv6-nat"]["descriptionfr"]="";
$elem["lxd/bridge-ipv6-nat"]["default"]="false";
$elem["lxd/bridge-http-proxy"]["type"]="boolean";
$elem["lxd/bridge-http-proxy"]["description"]="Do you want to setup an HTTP proxy?
";
$elem["lxd/bridge-http-proxy"]["descriptionde"]="";
$elem["lxd/bridge-http-proxy"]["descriptionfr"]="";
$elem["lxd/bridge-http-proxy"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
