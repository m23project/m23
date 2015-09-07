<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("check-mk-server");

$elem["check-mk-server/v1.2_upgrade_msg"]["type"]="note";
$elem["check-mk-server/v1.2_upgrade_msg"]["description"]="Convert or delete RRD graphs
 The tcp_conn_stats check now also counts sockets in the state BOUND. From that follows that the check now issues one more performance data value.
 Those who do not use PNP in the \"MULTIPLE\" mode need either to delete or convert their RRD graphs of those checks.
 Otherwise they won't be updated anymore.
 .
 For further information, please read the migration notes provided upstream: http://mathias-kettner.de/checkmk_migration_notes.html .
";
$elem["check-mk-server/v1.2_upgrade_msg"]["descriptionde"]="";
$elem["check-mk-server/v1.2_upgrade_msg"]["descriptionfr"]="";
$elem["check-mk-server/v1.2_upgrade_msg"]["default"]="";
PKG_OptionPageTail2($elem);
?>
