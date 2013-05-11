<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("maas-provision");

$elem["maas-provision/password"]["type"]="password";
$elem["maas-provision/password"]["description"]="New password for the \"cobbler\" user:
 It is highly recommended that you set a password for the
 administrative \"cobbler\" user.
 .
 You can also run password reconfiguration later by executing
 'dpkg-reconfigure -plow cobbler'.
 .
 Note that you can easily add users to cobbler later with:
  sudo htdigest /etc/cobbler/users.digest \"Cobbler\" USERNAME

";
$elem["maas-provision/password"]["descriptionde"]="";
$elem["maas-provision/password"]["descriptionfr"]="";
$elem["maas-provision/password"]["default"]="";
$elem["maas-provision/server_and_next_server"]["type"]="string";
$elem["maas-provision/server_and_next_server"]["description"]="Set the Boot and PXE server IP address:
 For kickstart and PXE features to work properly, it is
 important to set the correct IP addresses in the fields
 \"server\" and \"next_server\" in  \"/etc/cobbler/settings\".
 .
 The \"server\" field must be set to something other than
 localhost, or kickstart features will not work.  This should
 be a resolvable hostname or IP for the boot server as
 reachable by all machines that will use it.
 .
 The \"next_server\" field must be set to something other than
 127.0.0.1, and should match the IP address of the boot server
 on the PXE network.
 .
 Note that these values will try to be automatically detected,
 however they can be manually edited in \"/etc/cobbler/settings\".
";
$elem["maas-provision/server_and_next_server"]["descriptionde"]="";
$elem["maas-provision/server_and_next_server"]["descriptionfr"]="";
$elem["maas-provision/server_and_next_server"]["default"]="127.0.0.1";
PKG_OptionPageTail2($elem);
?>
