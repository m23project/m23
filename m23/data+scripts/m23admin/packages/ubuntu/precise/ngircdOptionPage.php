<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ngircd");

$elem["ngircd/conversion-do"]["type"]="boolean";
$elem["ngircd/conversion-do"]["description"]="Convert ngIRCd configuration?
 In version 18, the ngIRCd configuration file format has changed.
 You can choose to have your configuration re-written.
 Don't worry, the old format is still supported.

";
$elem["ngircd/conversion-do"]["descriptionde"]="";
$elem["ngircd/conversion-do"]["descriptionfr"]="";
$elem["ngircd/conversion-do"]["default"]="";
$elem["ngircd/broken-oldconfig"]["type"]="text";
$elem["ngircd/broken-oldconfig"]["description"]="Cannot convert configuration
 The present configuration file contains errors and cannot
 be converted. Please check manually using
    ngircd --configtest
 and run 'dpkg-reconfigure ngircd' to try again.

";
$elem["ngircd/broken-oldconfig"]["descriptionde"]="";
$elem["ngircd/broken-oldconfig"]["descriptionfr"]="";
$elem["ngircd/broken-oldconfig"]["default"]="";
$elem["ngircd/conversion-fail"]["type"]="text";
$elem["ngircd/conversion-fail"]["description"]="Error
 Verification after conversion failed. This is a bug, please report it
 in the Debian bug tracker. Please include your configuration but make
 sure all passwords are removed.
 The diff below might give you some help:
    ${DIFF}
";
$elem["ngircd/conversion-fail"]["descriptionde"]="";
$elem["ngircd/conversion-fail"]["descriptionfr"]="";
$elem["ngircd/conversion-fail"]["default"]="";
PKG_OptionPageTail2($elem);
?>
