<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipvsadm");

$elem["ipvsadm/daemon_method"]["type"]="select";
$elem["ipvsadm/daemon_method"]["choices"][1]="__none";
$elem["ipvsadm/daemon_method"]["choices"][2]="master";
$elem["ipvsadm/daemon_method"]["choices"][3]="backup";
$elem["ipvsadm/daemon_method"]["description"]="_Daemon method:
 ipvsadm can activate the IPVS synchronization daemon. \"master\" starts this
 daemon in master mode, \"backup\" in backup mode and \"both\" uses master and
 backup mode at the same time. \"none\" disables the daemon.
 .
 See the man page for more details, ipvsadm(8).

";
$elem["ipvsadm/daemon_method"]["descriptionde"]="";
$elem["ipvsadm/daemon_method"]["descriptionfr"]="";
$elem["ipvsadm/daemon_method"]["default"]="none";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["type"]="note";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["description"]="_Kernel does not support IPVS
 ipvsadm requires IPVS support in the kernel. Please use a kernel with IPVS
 modules, otherwise this software is pretty useless.

";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["descriptionde"]="";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["descriptionfr"]="";
$elem["ipvsadm/kernel_does_not_support_ipvs"]["default"]="";
$elem["ipvsadm/auto_load_rules"]["type"]="boolean";
$elem["ipvsadm/auto_load_rules"]["description"]="_Do you want to automatically load IPVS rules on boot?
 If you choose this option your IPVS rules will be loaded from
 /etc/ipvsadm.rules automatically on boot.

";
$elem["ipvsadm/auto_load_rules"]["descriptionde"]="";
$elem["ipvsadm/auto_load_rules"]["descriptionfr"]="";
$elem["ipvsadm/auto_load_rules"]["default"]="false";
$elem["ipvsadm/daemon_multicast_interface"]["type"]="string";
$elem["ipvsadm/daemon_multicast_interface"]["description"]="_Multicast interface for ipvsadm:
 Select the multicast interface to be used by synchronization daemon. e.g.
 eth0, eth1...
 .
 ${interface_error}
";
$elem["ipvsadm/daemon_multicast_interface"]["descriptionde"]="";
$elem["ipvsadm/daemon_multicast_interface"]["descriptionfr"]="";
$elem["ipvsadm/daemon_multicast_interface"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
