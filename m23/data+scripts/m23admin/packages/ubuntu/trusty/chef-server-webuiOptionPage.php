<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chef-server-webui");

$elem["chef-server-webui/admin_password"]["type"]="password";
$elem["chef-server-webui/admin_password"]["description"]="New password for the 'admin' user in the Chef Server WebUI:
  This sets a temporary first-use password to log into the Chef Server WebUI
  as the 'admin' user for the first time. Once logged in, the password should
  be changed immediately.
  .
  Once the chef-server-webui process is running, login using the username
  'admin' using the password set here.
  .
  If a password is not entered, the webui default password for 'admin' will
  be used, which is displayed on the webui home page. The password must be 
  at least 6 characters or the webui will not start properly.
  .
  This will be used in /etc/chef/webui.rb as 'web_ui_admin_default_password'.
  .
";
$elem["chef-server-webui/admin_password"]["descriptionde"]="";
$elem["chef-server-webui/admin_password"]["descriptionfr"]="";
$elem["chef-server-webui/admin_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
