<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nut-cgi");

$elem["nut-cgi/major_template_changes"]["type"]="note";
$elem["nut-cgi/major_template_changes"]["description"]="Please manually copy the new HTML template
 This is a serious advisory. Please take note.
 .
 There have been significant changes by the upstream author to the
 behaviour of this software. Specifically, the HTML templates in
 /etc/nut are different, due to a naming scheme change.
 .
 If you continue with the installation of this package, upsstats*.cgi
 will not work until you manually copy the new HTML template from
 /usr/share/doc/nut-cgi/examples/. Please read the instructions in
 /usr/share/doc/nut-cgi/README.Debian.
";
$elem["nut-cgi/major_template_changes"]["descriptionde"]="";
$elem["nut-cgi/major_template_changes"]["descriptionfr"]="";
$elem["nut-cgi/major_template_changes"]["default"]="";
PKG_OptionPageTail2($elem);
?>
