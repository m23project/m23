<?php
//Exports the DHCP settings of m23 clients that are booting over the network and adds settings for external DHCP servers.

include('/m23/inc/db.php');
include('/m23/inc/dhcp.php');

echo(DHCP_exportDHCPSettingsForExternalDHCPServer());
?>