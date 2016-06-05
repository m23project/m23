<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("arb-common");

$elem["arb/group"]["type"]="multiselect";
$elem["arb/group"]["description"]="ARB PT-server administrators
 ARB is preconfigured via /etc/arb/arb_tcp.dat with three private PT servers
 for each user as well as three global PT servers accessible by all users.
 .
 Only members of the system group \"arb\" will be able to build and update
 the shared PT servers. This setting configures the group members.
";
$elem["arb/group"]["descriptionde"]="";
$elem["arb/group"]["descriptionfr"]="";
$elem["arb/group"]["default"]="";
PKG_OptionPageTail2($elem);
?>
