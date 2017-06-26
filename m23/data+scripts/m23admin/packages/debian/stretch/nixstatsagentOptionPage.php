<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nixstatsagent");

$elem["nixstatsagent/user"]["type"]="string";
$elem["nixstatsagent/user"]["description"]="User ID:
 Type your user ID at NixStats.com or at your service provider.
 .
 Without this value set, the agent will be operating in the test mode 
 (no data will be sent to your service provider at all).

";
$elem["nixstatsagent/user"]["descriptionde"]="";
$elem["nixstatsagent/user"]["descriptionfr"]="";
$elem["nixstatsagent/user"]["default"]="";
$elem["nixstatsagent/server"]["type"]="string";
$elem["nixstatsagent/server"]["description"]="Server ID:
 Type your server ID at NixStats.com or at your service provider.
 .
 Without this value set, the agent will be operating in the test mode 
 (no data will be sent to your service provider at all).
 .
 This setting will be ignored if you receive a server ID automatically, in 
 which case you may skip setting this value.

";
$elem["nixstatsagent/server"]["descriptionde"]="";
$elem["nixstatsagent/server"]["descriptionfr"]="";
$elem["nixstatsagent/server"]["default"]="";
$elem["nixstatsagent/api_host"]["type"]="string";
$elem["nixstatsagent/api_host"]["description"]="API host name:
 If you're using NixStats.com service, leave it empty. Otherwise type your 
 service provider's API host name.

";
$elem["nixstatsagent/api_host"]["descriptionde"]="";
$elem["nixstatsagent/api_host"]["descriptionfr"]="";
$elem["nixstatsagent/api_host"]["default"]="";
$elem["nixstatsagent/api_path"]["type"]="string";
$elem["nixstatsagent/api_path"]["description"]="API path name:
 If you're using NixStats.com service, leave it empty. Otherwise type your 
 service provider's API path name.

";
$elem["nixstatsagent/api_path"]["descriptionde"]="";
$elem["nixstatsagent/api_path"]["descriptionfr"]="";
$elem["nixstatsagent/api_path"]["default"]="";
$elem["nixstatsagent/server_auto"]["type"]="boolean";
$elem["nixstatsagent/server_auto"]["description"]="Obtain the new server ID automatically?
 If you're using NixStats.com service, you can obtain a new server ID 
 automatically via NixStats.com API.
";
$elem["nixstatsagent/server_auto"]["descriptionde"]="";
$elem["nixstatsagent/server_auto"]["descriptionfr"]="";
$elem["nixstatsagent/server_auto"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
