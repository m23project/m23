<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("drupal6");

$elem["drupal6/post_install_guidance"]["type"]="note";
$elem["drupal6/post_install_guidance"]["description"]="Post-Install Instructions
 Once Drupal is finished installing, you will still need to perform a few steps.
 .
   - Restart the webserver (i.e. restart apache2)
   - Run installation script via URL http://host/drupal6/install.php
 .
 Be sure to read /usr/share/doc/drupal6/README.Debian for detailed instructions.
";
$elem["drupal6/post_install_guidance"]["descriptionde"]="";
$elem["drupal6/post_install_guidance"]["descriptionfr"]="";
$elem["drupal6/post_install_guidance"]["default"]="";
PKG_OptionPageTail2($elem);
?>
