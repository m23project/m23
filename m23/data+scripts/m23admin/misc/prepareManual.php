<?PHP

include("/m23/inc/db.php");
include("/m23/inc/packages.php");
include("/m23/inc/fdisk.php");
include("/m23/inc/hwinfo.php");
include("/m23/inc/client.php");
include("/m23/inc/help.php");
include("/m23/inc/checks.php");
include("/m23/inc/dhcp.php");
include("/m23/inc/preferences.php");
include("/m23/inc/i18n.php");
include("/m23/inc/plugin.php");
include("/m23/inc/remotevar.php");
include("/m23/inc/update.php");
include("/m23/inc/message.php");
include("/m23/inc/distr.php");
include("/m23/inc/sourceslist.php");
include("/m23/inc/capture.php");

dbConnect();

CAPTURE_deActivate(false);
?>