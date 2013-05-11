<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-apache-server2");

$elem["monoserver2/monoserver2_restartapache"]["type"]="boolean";
$elem["monoserver2/monoserver2_restartapache"]["description"]="Let mono-apache-server2 restart Apache?
 The debian version of mono-apache-server2 includes a
 mono-server2-update script that creates a configuration file for
 apache to start the ASP.NET applications, and mono-server2-update can
 restart apache if there's a new configuration file
 (/etc/mono-server2/mono-server2-hosts.conf). If this is true, then apache will be restarted when there is a new mono-server-hosts.conf file.
";
$elem["monoserver2/monoserver2_restartapache"]["descriptionde"]="";
$elem["monoserver2/monoserver2_restartapache"]["descriptionfr"]="";
$elem["monoserver2/monoserver2_restartapache"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
