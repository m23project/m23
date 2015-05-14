<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chef");

$elem["chef/chef_server_url"]["type"]="string";
$elem["chef/chef_server_url"]["description"]="URL of Chef Server (e.g., http://chef.example.com:4000):
  This is the full URI that clients will use to connect to the
  server.
  .
  This will be used in /etc/chef/client.rb as 'chef_server_url'.
";
$elem["chef/chef_server_url"]["descriptionde"]="";
$elem["chef/chef_server_url"]["descriptionfr"]="";
$elem["chef/chef_server_url"]["default"]="";
PKG_OptionPageTail2($elem);
?>
