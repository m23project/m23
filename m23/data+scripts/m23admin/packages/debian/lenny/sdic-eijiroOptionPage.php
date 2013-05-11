<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sdic-eijiro");

$elem["sdic-eijiro/tmpdir"]["type"]="string";
$elem["sdic-eijiro/tmpdir"]["description"]="EIJIRO media/file location:
 Please enter the directory containing the EIJIRO dictionary files.
 .
 If you mounted EIJIRO CD-ROM at /media/cdrom, keep default.

";
$elem["sdic-eijiro/tmpdir"]["descriptionde"]="";
$elem["sdic-eijiro/tmpdir"]["descriptionfr"]="";
$elem["sdic-eijiro/tmpdir"]["default"]="/media/cdrom/eijiro";
PKG_OptionPageTail2($elem);
?>
