<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sash");

$elem["sash/sashroot-user-detected"]["type"]="error";
$elem["sash/sashroot-user-detected"]["description"]="sashroot user detected
 Previous versions of sash offered to create a root user with shell
 set to /bin/sash.  This system has such a user.
 .
 This can unfortunately not be automatically removed together with the
 package, so you need to manually delete the sashroot user.
";
$elem["sash/sashroot-user-detected"]["descriptionde"]="";
$elem["sash/sashroot-user-detected"]["descriptionfr"]="";
$elem["sash/sashroot-user-detected"]["default"]="";
PKG_OptionPageTail2($elem);
?>
