<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("guacamole-tomcat");

$elem["guacamole-tomcat/restart-server"]["type"]="boolean";
$elem["guacamole-tomcat/restart-server"]["description"]="Restart Tomcat server?
 Installation of Guacamole under Tomcat requires restarting the Tomcat
 server, as Tomcat will only read configuration files on startup.
 You can also restart Tomcat manually by running
 invoke-rc.d tomcat6 restart.

";
$elem["guacamole-tomcat/restart-server"]["descriptionde"]="";
$elem["guacamole-tomcat/restart-server"]["descriptionfr"]="";
$elem["guacamole-tomcat/restart-server"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
