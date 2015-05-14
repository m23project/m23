<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spamprobe");

$elem["spamprobe/db53_upgrade"]["type"]="note";
$elem["spamprobe/db53_upgrade"]["description"]="Upgrading to Berkeley DB 5.3
 As of spamprobe 1.4d-12.1, the database format changed
 to Berkeley DB 5.3 and spamprobe is no longer able to modify
 databases using an older format.
 .
 Since there is no general way to locate all existing databases, no
 automatic upgrade is attempted. A manual upgrade path using
 spamprobe export/import is outlined in the 'DATABASE MAINTENANCE' section
 of the spamprobe(1) manual page.
 .
 All spamprobe users on this system should be informed of this change
 and advised to read the README.Debian file.
 .
 To avoid this issue at next Berkeley DB migration, converting to
 another data file format, like 'hash', is recommended.  See
 documentation of the -d option in spamprobe(1) man page.
";
$elem["spamprobe/db53_upgrade"]["descriptionde"]="";
$elem["spamprobe/db53_upgrade"]["descriptionfr"]="";
$elem["spamprobe/db53_upgrade"]["default"]="";
PKG_OptionPageTail2($elem);
?>
