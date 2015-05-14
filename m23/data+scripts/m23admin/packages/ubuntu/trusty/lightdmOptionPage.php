<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lightdm");

$elem["shared/default-x-display-manager"]["type"]="select";
$elem["shared/default-x-display-manager"]["description"]="Default display manager:
 A display manager is a program that provides graphical login capabilities for
 the X Window System.
 .
 Only one display manager can manage a given X server, but multiple display
 manager packages are installed. Please select which display manager should
 run by default.
 .
 Multiple display managers can run simultaneously if they are configured to
 manage different servers; to achieve this, configure the display managers
 accordingly, edit each of their init scripts in /etc/init.d, and disable the
 check for a default display manager.
";
$elem["shared/default-x-display-manager"]["descriptionde"]="";
$elem["shared/default-x-display-manager"]["descriptionfr"]="";
$elem["shared/default-x-display-manager"]["default"]="";
PKG_OptionPageTail2($elem);
?>
