<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lightdm-kde-greeter");

$elem["shared/lightdm-greeter"]["type"]="select";
$elem["shared/lightdm-greeter"]["description"]="Default LightDM greeter:
 A LightDM greeter is used by LightDM display manager to let the user log in on
 the X Window System.
";
$elem["shared/lightdm-greeter"]["descriptionde"]="";
$elem["shared/lightdm-greeter"]["descriptionfr"]="";
$elem["shared/lightdm-greeter"]["default"]="";
PKG_OptionPageTail2($elem);
?>
