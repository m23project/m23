<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythtv-frontend");

$elem["mythtv/server_host"]["type"]="string";
$elem["mythtv/server_host"]["description"]="Hostname of the system where the MythTV backend is installed:

";
$elem["mythtv/server_host"]["descriptionde"]="";
$elem["mythtv/server_host"]["descriptionfr"]="";
$elem["mythtv/server_host"]["default"]="localhost";
$elem["mythtv/server_port"]["type"]="string";
$elem["mythtv/server_port"]["description"]="Port number the MythTV server is listening on:
";
$elem["mythtv/server_port"]["descriptionde"]="";
$elem["mythtv/server_port"]["descriptionfr"]="";
$elem["mythtv/server_port"]["default"]="6543";
PKG_OptionPageTail2($elem);
?>
